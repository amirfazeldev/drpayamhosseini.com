<?

# jalal7h@gmail.com
# 2016/12/21
# 2.0

$GLOBALS['do_action'][] = "seo_sitemap_mega";

function seo_sitemap_mega(){


    header('Content-Type: text/xml, charset=utf-8');


    ################################################
    # cache open
    #
    $cache_key = __FUNCTION__;
    if( $cache_hit = cache( "hit", $cache_key, "24hours" ) ){
        echo $cache_hit;

    } else {
    #
    ################################################    



        ################################################
        # limits
        #
        if( defined('seo_sitemap_count_in_page') ){
            $tdd = seo_sitemap_count_in_page;
        } else {
            $tdd = 5;
        }
        #
        ################################################



        ################################################
        # xml start
        #
        $the_box.= '<?xml version="1.0" encoding="UTF-8"?>'."\n".
    	'<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";
        #
        ################################################



        ################################################
        # sitemap list
        #
        foreach ($GLOBALS['seo_sitemap'] as $id => $info) {

            $query = $info['query'];
            $query = string_between_replace( $query, "SELECT ", " FROM ", function(){
                return "COUNT(*)";
            });

            $count_in_query = dbr( dbq( $query ), 0, 0 );
            $count_of_pages = ceil( $count_in_query / $tdd );

            // echo $count_in_query."\n";
            // echo $count_of_pages."\n";

            $query = $info['query'];
            // $query = explode(' LIMIT ', $query )[0];
            // $query = " ".trim($query)." LIMIT 1 ";
            // $query = str_replace(" ASC LIMIT 1 ", " ASC LIMIT 1 ", $query);

            if(! $rs = dbq($query) ){
                //
            } else if(! $rw = dbf($rs) ){
                //
            } else if(! $date = $rw['date'] ){
                //
            } else if(! $date = $rw['date_created'] ){
                //
            }
            if(! $date ){
                $date = U();
            }

            $date = date('c', $date);

            for( $j=0; $j<$count_of_pages; $j++ ){
                if( $j == 0 ){
                    $link = _URL.'/sitemap/'.$id.'.xml';
                } else {
                    $link = _URL.'/sitemap/'.$id.'-'.$j.'.xml';                
                }
                $the_box.= 
        		"\t<sitemap>\n".
        		"\t\t<loc>$link</loc>\n".
        		"\t\t<lastmod>$date</lastmod>\n".
        		"\t</sitemap>\n";
            }


    	}
        #
        ################################################



        ################################################
        # xml end
        #
    	$the_box.= "</sitemapindex>";
        #
        ################################################
        

        
    ################################################
    # cache close
    # 
        echo cache( "make", $cache_key, $the_box );
    }
    #
    ################################################

}
