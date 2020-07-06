<?php
require_once './vendor/autoload.php';

use Symfony\Component\DomCrawler\Crawler;

// put url 

// $url = 'https://www.phucanh.vn/man-hinh-asus-be229qlb-21.5inch-ips.html';


//go get the data from url 

$client = new \GuzzleHttp\Client();
$res = $client->request('GET', $url);
$html = '' . $res->getBody();

$crawler = new Crawler($html);


//loop through the data  
$data  = $crawler->filter('.tbl-technical > table > tbody > tr > td:last-child ')->each(function (Crawler $node, $i) {
    // search for values that i want

    // echo $node->html();
    $ele = $node->text();
    // echo "<br> ";
    return $ele;
});

// echo "<pre>";
// print_r($data);
// die();

$url_image = $crawler->filter('.MagicZoom > img')->each(function (Crawler $node, $i) {
    // search for values that i want
    echo "<pre>";
    return $node->filter('img')->attr('src');
});

// var_dump($url_image[0]);
// die();

$giaban = $crawler->filter('.detail-product-best-price')->each(function (Crawler $node, $i) {
    // search for values that i want

    // echo $node->html();
    return $node->text();
});

$giaban = $giaban[0];
// die();

$tenmonitor = $crawler->filter('.container > h1')->each(function (Crawler $node, $i) {
    // search for values that i want

    return $node->text();
});

$tenmonitor = $tenmonitor[0];

// echo back out to the screen


function DownloadImage($url_image, $des)
{
    $url_to_image = $url_image;
    $my_save_dir = $des . '/';
    $filename = basename($url_to_image);
    $complete_save_loc = $my_save_dir . $filename;
    file_put_contents($complete_save_loc, file_get_contents($url_to_image));
}

DownloadImage($url_image[0], './imagesMonitor');

$imgLocation = "./images/" . $tenmonitor . ".jpg";


// require_once 'DBconnection.php';

// $db = new DBconnection();

// $conn = $db::$connectionInstance;

$sql = "INSERT INTO `detailmonitor`(
    `tenmonitor`,
    `giaban`,
    `url_image`,
    `sanpham`,
    `tenhang`,
    `model`,
    `kieumanhinh`,
    `kichthuocmanhinh`,
    `dosang`,
    `tyletuongphan`,
    `dophangiai`,
    `thoigiandapung`,
    `gocnhin`,
    `conggiaotiep`,
    `xuatxu`
)
VALUES(
    '$tenmonitor',
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
   '$data[8]',
   '$data[9]',
   '$data[10]',
    '$data[11]'
)" . ";";

$myfile = fopen("databaseMonitor.txt", "a") or die("Unable to open file!");
$txt =   $sql . "\n\n";
fwrite($myfile, $txt);
fclose($myfile);
