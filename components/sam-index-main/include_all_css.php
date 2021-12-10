<?
$GLOBALS['do_action'][] = "include_all_css";
function include_all_css(){
	asort($GLOBALS['include_all_css']);
	@header("Content-disposition: filename=styles.css");
	@header("Content-type: text/css");
	if(!$GLOBALS['include_all_css']){
		echo "/*** no other css found ***/";
		return true;
	} else{
		asort($GLOBALS['include_all_css']);
		foreach($GLOBALS['include_all_css'] as $file){
			$css = implode('',file($file));
			$displayFlag = false;
			if(trim($css)==''){
				continue;
			} else if(strstr($file,"admin")){
				if($_REQUEST['page']=='admin'){
					$displayFlag = true;
				}
			} else if(strstr($file,"duo")){			
				$displayFlag = true;
			} else {
				if(@$_REQUEST['page']!='admin'){
					$displayFlag = true;
				}
			}
			// $css = trim(str_replace(array("/*admin*/","/*index*/"), "", $css));
			if($displayFlag){
				echo "\n/* * * * * * * * * * * * * * * * * * * * * * * css : ".$file."  * * * * * * * */\n";
				echo $css;
				echo "\n/* * * * * * * */\n\n";
			}
		}	
	}
}
