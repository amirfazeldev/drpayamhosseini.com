<?
function include_all_css_index(){
	if (isset($GLOBALS['include_all_css'])) {	
		asort($GLOBALS['include_all_css']);
		$c="";
		foreach($GLOBALS['include_all_css'] as $file){

			if(strstr($file,"admin")){
				continue;								
				
			} else {
				$c.= '<link href="'._URL.'/'.$file.'" rel="stylesheet" type="text/css" />'."\n\t";
				
			}	
		
		}	

		echo  $c;
	}

}
function include_all_css_admin(){
	if (isset($GLOBALS['include_all_css'])) {	
		asort($GLOBALS['include_all_css']);
		$c="";
		foreach($GLOBALS['include_all_css'] as $file){

			if(!strstr($file,"admin")){
				continue;								
				
			} else {
				$c.= '<link href="'._URL.'/'.$file.'" rel="stylesheet" type="text/css" />'."\n\t";
				
			}	
		
		}	

		echo  $c;
	}

}
// در هردو حالت مدیریت و ایندکس اینکلود می کند
function include_all_css_duo(){
	if (isset($GLOBALS['include_all_css'])) {	
		asort($GLOBALS['include_all_css']);
		$c="";
		foreach($GLOBALS['include_all_css'] as $file){

			if(!strstr($file,"duo")){
				continue;								
				
			} else {
				$c.= '<link href="'._URL.'/'.$file.'" rel="stylesheet" type="text/css" />'."\n\t";
				
			}	
		
		}	

		echo  $c;
	}

}
function include_all_js_echotags(){
	if (isset($GLOBALS['include_all_js'])) {
		asort($GLOBALS['include_all_js']);
		$js="";
		foreach($GLOBALS['include_all_js'] as $file){

			if($f=strstr($file,"footer")){
				continue;
			} else if($a=strstr($file,"admin")){
				continue;
			} else {

				$js.='<script  src= "'._URL.'/'.$file.'" type="text/javascript" ></script>'."\n\t";	
			}		

		}	

		echo $js;
	}

}
function include_all_js_echotags_admin(){
	if (isset($GLOBALS['include_all_js'])) {
		asort($GLOBALS['include_all_js']);
		$js="";
		foreach($GLOBALS['include_all_js'] as $file){

			if($f=strstr($file,"footer")){
				continue;
			} else if(! $a=strstr($file,"admin")){
				continue;
			} else {

				$js.='<script  src= "'._URL.'/'.$file.'" type="text/javascript" ></script>'."\n\t";	
			}		

		}	

		echo $js;
	}

}
function include_all_js_echotags_duo(){
	if (isset($GLOBALS['include_all_js'])) {
		asort($GLOBALS['include_all_js']);
		$js="";
		foreach($GLOBALS['include_all_js'] as $file){

			if($f=strstr($file,"footer")){
				continue;
			} else if(! $a=strstr($file,"duo")){
				continue;
			} else {

				$js.='<script  src= "'._URL.'/'.$file.'" type="text/javascript" ></script>'."\n\t";	
			}		

		}	

		echo $js;
	}

}
function include_all_jsfooter_echotags(){
	if (isset($GLOBALS['include_all_js'])) {
		asort($GLOBALS['include_all_js']);
		$js2="";
		foreach($GLOBALS['include_all_js'] as $file){

			if(!strstr($file,"footer")){
				continue;								
				
			} else {
				$js2.='<script  src= "'._URL.'/'.$file.'" type="text/javascript" ></script>'."\n\t";
				
			}		

		}	

		echo  $js2;
	}

}

