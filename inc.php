<?
#
# set defines
$URLFOTDEFINE = str_replace("www.","",$_SERVER['HTTP_HOST']);
$URLFOTDEFINE = "http://".str_replace("/","",$URLFOTDEFINE);
$SUBFOLDER = substr( dirname($_SERVER['SCRIPT_NAME']),1,strlen(dirname($_SERVER['SCRIPT_NAME'])) );
if(strlen($SUBFOLDER)!=0) $URLFOTDEFINE .= "/".$SUBFOLDER;
define('_URL',$URLFOTDEFINE);
#
# sync and include
$dir_name = "components";
if(!$dp=opendir($dir_name)){
	die("Error in opening directory");
} else while($component = readdir($dp)){ // :: component
	if(!is_dir($dir_name."/".$component)){
		// it its not a directory
		continue;
	} else if(substr($component,0,1)=='.'){
		// its disabled
		continue;
	} else if(!$dp0 = opendir($dir_name."/".$component)){
		die("Error in opening directory");
	} else while($file = readdir($dp0)){ // :: component / file
			#
			# include
			if(substr($file,0,1)=='.'){
				continue;
			} else if(in_array(strtolower(strrchr($file,".")),array(".jpg",".jpeg",".png",".gif"))){
				$GLOBALS['include_all_image'][$file] = $dir_name."/".$component."/".$file;
			} else if(substr($file,-13)=='.template.htm'){
				$GLOBALS['include_all_template'][$file] = $dir_name."/".$component."/".$file;
			} else if(strrchr($file,'.')=='.css'){
				$GLOBALS['include_all_css'][] = $dir_name."/".$component."/".$file;
			} else if(strrchr($file,'.')=='.js'){
				$GLOBALS['include_all_js'][] = $dir_name."/".$component."/".$file;
			} else if(strrchr($file,'.')=='.sql'){
				$GLOBALS['include_all_sql'][] = $dir_name."/".$component."/".$file;
			} else if($file=='htaccess.txt'){
				$GLOBALS['include_all_htaccess'][] = $dir_name."/".$component."/".$file;
			} else if( (strrchr($file,'.')!='.php') and (strrchr($file,'.')!='.inc') ){
				continue;
			} else {
				$files_to_include[] = $dir_name."/".$component."/".$file;
			}
		}	
	closedir($dp0);
}
closedir($dp);
sort($files_to_include);
foreach($files_to_include as $k => $file_to_include){
	include_once($file_to_include);
}