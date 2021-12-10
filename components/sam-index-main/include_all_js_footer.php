<?
$GLOBALS['do_action'][] = "include_all_js_footer";

function include_all_js_footer(){
	@header("Content-disposition: filename=scripts_footer.js");
	@header("Content-type: application/x-javascript");
	if(!$GLOBALS['include_all_js']){
		echo "/*** no other js found on footer ***/";
		return true;
	} else{
		asort($GLOBALS['include_all_js']);
		foreach($GLOBALS['include_all_js'] as $file){
			$this_file = implode("",file($file));
			$displayFlag = false;
			if(trim($this_file)==''){
				continue;
			} else if(!strstr($file,"footer")){
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
			if($displayFlag){	
				echo "\n/* * * * * * * * * * * * * * * * * * * * * * * js-footer : ".$file."  * * * * * * * */\n";
				echo $this_file;
				echo "\n/* * * * * * * */\n\n";
			}
		}	
	}
}



