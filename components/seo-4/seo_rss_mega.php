<?

# jalal7h@gmail.com
# 2015/12/20
# 1.0


$GLOBALS['do_action'][] = "seo_rss_mega";

function seo_rss_mega(){
	
	echo layout_open();

	?>
	<style>
		body {
			background-color: #eee;
		}
		.seo_rss_mega {
			direction: rtl;
			padding: 50px;
		}
		.seo_rss_mega .head {
			font-size: 24px;
		    color: #666;
		    border-bottom: 1px dashed #ccc;
		    margin-bottom: 20px;
		    padding-bottom: 17px;
		}
		.seo_rss_mega a {
			display: inline-block;
			margin: 6px;
			font-family: IRANSans,Tahoma;
			font-size: 18px;
			color: #555;
			background-color: #ddd;
			border-radius: 5px;
			padding: 10px 20px;
			text-decoration: none;
			line-height: 30px !important;
		}
		.seo_rss_mega a:hover {
			color: #000;
			background-color: #ccc;
		}
	</style>

	<?

	echo "<div class=\"seo_rss_mega\">";
	echo "<div class=\"head\">".__('لیست rss های سایت :‌ ')."</div>";

    foreach( $GLOBALS['seo_rss'] as $id => $info ){

    	if( $lmtc = lmtc($id) ){
    		$name = $lmtc[1];
    	} else {
    		$name = $id;
    	}

        $link = _URL.'/rss/'.$id.'.xml';
        echo "<a href=\"$link\">$name</a>";

	}

	echo "</div>";
	echo layout_close();

}




