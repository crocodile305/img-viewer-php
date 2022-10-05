<?php
testimg();
function mainfunc($response){
    $res = json_decode($response, TRUE);
    $img_url = isset($res) && isset($res['img_src']) ? $res['img_src'] : null;
    $my_img_link = "";
    if($img_url !== null){
      $my_img_name = getimagename($img_url);
      $my_img_link = downloadimagefromurl($img_url,$my_img_name);
    }
    $res["img_src"] = $my_img_link;
    return json_encode($res);
  }
  
  function getimagename($url=''){
    $params = explode($url);
    if(count($params) >0){
      return $params[count($params) - 1];
    }
    else {
      return "";
    }
  }
  function downloadimagefromurl($url="",$name=""){
    $direct = "/";
    $main_domain_url = "https://****/";
    $my_img_url = "";
    if($url !=="" && isset($url) && $name !=="" && isset($name)){
      $content = file_get_contents($url);
      file_put_contents($direct.$name, $content);
    }
    $my_img_url = $main_domain_url.$direct.$name;
    return $my_img_url;
  }
  
  function testimg(){
    $url = "https://www.webuyanycar.com/wbacimages/5071_647_650_648_2003_2006.jpg";
    $content = file_get_contents($url);
    file_put_contents("aaa.jpg", $content);
    echo "ok";
  }
?>