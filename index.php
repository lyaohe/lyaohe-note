<?php  
header("Content-Type: text/html; charset=UTF-8");
  
require 'phpQuery.php';

$url = "http://mp.weixin.qq.com/profile?src=3&timestamp=1480073506&ver=1&signature=MUSDGJJxtRtyUKW7l3N2CtW*mCm45XHGwZLjnPkmhMX7X7*sBZueBpJomRuErfnuuf*BgCpKOmfSgfPk1K-7Wg==";

$html = file_get_contents($url);

preg_match_all('/msgList\s*=\s*({.*});/i', $html, $match);

//var_dump($match);
//echo $match[1][0];

$lists = json_decode($match[1][0], true);

var_dump($lists);

//$html = phpQuery::newDocumentFile($url);

//echo $html->html();


/*
$trs = pq(".withgrid>tr");

$i = 0;
foreach($trs as $tr){
    $i++;
    //echo $i;

    if($i<3 || $i>7){
        continue;
    }
    echo pq($tr)->html()."<br>";
} 
*/


 

 