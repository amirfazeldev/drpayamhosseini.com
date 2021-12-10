<?
$GLOBALS['do_action'][] = "include_all_js";
function include_all_js(){
	@header("Content-disposition: filename=scripts.js");
	@header("Content-type: application/x-javascript");
	if(!$GLOBALS['include_all_js']){
		echo "/*** no other js found ***/";
		return true;
	} else{
		asort($GLOBALS['include_all_js']);
		foreach($GLOBALS['include_all_js'] as $file){
			$this_file = implode("",file($file));		
			$displayFlag = false;
			if(trim($this_file)==''){
				continue;
			} else if(strstr($file,"footer")){
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
				echo "\n/* * * * * * * * * * * * * * * * * * * * * * * js : ".$file."  * * * * * * * */\n";
				echo $this_file;
				echo "\n/* * * * * * * */\n\n";
			}
		}	
	}
}