<?php

$img_url = isset($_GET['url']) ? $_GET['url'] : null;

if($img_url !== null){
    $my_img_name = getimagename($img_url);
    $my_img_link = downloadimagefromurl($img_url,$my_img_name);
    echo $my_img_link;
    
    function downloadimagefromurl($url="",$name=""){
        $main_domain_url = "https://img-viewer-3325.herokuapp.com/";
        $my_img_url = "";
        if($url !=="" && isset($url) && $name !=="" && isset($name)){
          $content = file_get_contents($url);
          file_put_contents($name, $content);
        }
        $my_img_url = $main_domain_url.$name;
        return $my_img_url;
    }
    
    function getimagename($url=''){
        $params = explode("/",$url);
        if(count($params) >0){
          return $params[count($params) - 1];
        }
        else {
          return "";
        }
      }
}

?>