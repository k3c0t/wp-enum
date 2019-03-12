<?php
error_reporting(0);
$blue = "\e[34m";
$lblue = "\e[36m";
$cln = "\e[0m";
$green = "\e[92m";
$fgreen = "\e[32m";
$red = "\e[91m";
$bold = "\e[1m";
echo "
\033[1;31m###################################################
\033[1;31m#                                                 #
\033[1;33m#                                                 #
\033[1;31m#                                                 #
\033[1;33m#                                                 #
\033[1;31m#                                                 #
\033[1;33m#                                                 #
\033[1;31m#                                                 #
\033[1;33m#                                                 #
\033[1;31m#                 Powered By k3c0t                #               
\033[1;34m###################################################\n
";
echo $red . "Sites using http / https Ex : http://localhost/\n\033[0m";
echo "Enter : ";
$url= trim(fgets(STDIN));
$get=@file_get_contents($url);
$zot=preg_match('/content="WordPress....../i',$get,$z);
$re=str_replace('content="WordPress', '', $z[0]);
$payload="wp-json/wp/v2/users/";
$urli = file_get_contents($url.$payload);
$json = json_decode($urli, true);
if($json){
   echo $green . "\n\033[0m";
   echo $green . "\n\033[0m";
   echo $red . "INFO\n\033[0m";
   echo $green . "Host : ".$url."\n\033[0m";
   echo $green . "WP Version : ".$re."\n\033[0m";
   echo $red . "List User\n\033[0m";

foreach($json as $users){
   echo $green . "ID : ".$users['id']."\n\033[0m";
   echo $green . "Name : ".$users['name']."\n\033[0m";
   echo $green . "User : ".$users['slug']."\n\033[0m";

}
}
else{
echo $red . "Tidak Ketemu :v\n\033[0m";
}




function get_plugins($url){
$green = "\e[92m";
$red = "\e[91m";
$source = @file_get_contents($url);
preg_match_all("#/plugins/(.*?)/#i", $source, $f);
$plugins=array_unique($f[1]);
echo $red . "List Plugins\n\033[0m";
if(count($plugins)==0){ 
        echo $red . "Tidak Ketemu :v\n\033[0m";
}

foreach($plugins as $plugin){

         echo $green . "Plugins : ".$plugin."\n\033[0m";
 

}

}

function get_themes($url){
$green = "\e[92m";
$red = "\e[91m";
$source = @file_get_contents($url);
preg_match_all("#/wp-content/themes/(.*?)/#i", $source, $f);
$themes=array_unique($f[1]);
echo $red . "List Themes\n\033[0m";
if(count($themes)==0){ 
        echo $red . "Tidak Ketemu :v\n\033[0m";
}

foreach($themes as $theme){

         echo $green . "Themes : ".$theme."\n\033[0m";
         

}

}




get_plugins($url);

get_themes($url);
?>