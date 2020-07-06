<?php
require_once './vendor/autoload.php';

use Symfony\Component\DomCrawler\Crawler;

///url 

$url = 'https://www.thegioididong.com/chuot-may-tinh/chuot-khong-day-logitech-m185';


//go get the data from url 

$client = new \GuzzleHttp\Client();
$res = $client->request('GET', $url);
$html = '' . $res->getBody();


$crawler = new Crawler($html);


//loop through the data  
$data  = $crawler->filter('.parameter > li > div > i ')->each(function (Crawler $node, $i) {
    // search for values that i want

    // echo $node->html();
    $ele = $node->text();
    // echo "<br> ";
    return $ele;
});

// print_r($data);

// die();
$url_image = $crawler->filter('.icon-position')->each(function (Crawler $node, $i) {
    // search for values that i want

    // echo $node->html();
    return $node->filter('img')->attr('src');
});



$giaban = $crawler->filter('.area_price > strong')->each(function (Crawler $node, $i) {
    // search for values that i want

    // echo $node->html();
    return $node->text();
});

$giaban = $giaban[0];

$Mouse_name = $crawler->filter('.rowtop > h1')->each(function (Crawler $node, $i) {
    // search for values that i want

    // echo $node->html();
    return $node->text();
});

$Mouse_name = $Mouse_name[0];

// echo back out to the screen


function DownloadImage($url_image, $des)
{
    $url_to_image = $url_image;
    $my_save_dir = $des . '/';
    $filename = basename($url_to_image);
    $complete_save_loc = $my_save_dir . $filename;
    file_put_contents($complete_save_loc, file_get_contents($url_to_image));
}

DownloadImage($url_image[0], './imagesMouse');

$imgLocation = "./images/" . $Mouse_name . ".jpg";


// require_once 'DBconnection.php';

// $db = new DBconnection();

// $conn = $db::$connectionInstance;

$sql = "INSERT INTO `detailmouse`(
    `tenchuot`,
    `giaban`,
    `url_image`,
    `tuongthich`,
    `dophangiai`,
    `cachketnoi`,
    `dodaidai`,
    `loaipin`,
    `kichthuoc`,
    `trongluong`,
    `thuonghieu`,
    `sanxuat`
)
VALUES(
    '$Mouse_name',
   '$giaban',
    '$imgLocation',
    '$data[0]',
   '$data[1]',
    '$data[2]',
   '$data[3]',
   '$data[4]',
   '$data[5]',
   '$data[6]',
    '$data[7]',
   '$data[8]'
)";

$myfile = fopen("databaseMouse.txt", "a") or die("Unable to open file!");
$txt =   $sql . "\n\n";
fwrite($myfile, $txt);
fclose($myfile);
