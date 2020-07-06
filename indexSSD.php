<?php

echo $HOSTNAME;
// require_once './vendor/autoload.php';

// use Symfony\Component\DomCrawler\Crawler;

// ///url 

// $url = 'https://h2gaming.vn/SSD-Seagat-%20BarraCuda-120-500GB-SATA';


// //go get the data from url 

// $client = new \GuzzleHttp\Client();
// $res = $client->request('GET', $url);
// $html = '' . $res->getBody();


// $crawler = new Crawler($html);


// //loop through the data  
// $data  = $crawler->filter('.tab > table > tbody > tr > td:nth-child(2)')->each(function (Crawler $node, $i) {
//     // search for values that i want

//     // echo $node->html();
//     $ele = $node->text();
//     // echo "<br> ";
//     return $ele;
// });

// $url_image = $crawler->filter('.img-main > div')->each(function (Crawler $node, $i) {
//     // search for values that i want

//     // echo $node->html();
//     return $node->filter('img')->attr('src');
// });

// $giaban = $crawler->filter('.product-right > p')->each(function (Crawler $node, $i) {
//     // search for values that i want

//     // echo $node->html();
//     return $node->text();
// });

// $giaban = str_replace("Giá: ", '', $giaban[0]);


// // echo back out to the screen


// function DownloadImage($url_image, $des)
// {
//     $url_to_image = $url_image;
//     $my_save_dir = $des . '/';
//     $filename = basename($url_to_image);
//     $complete_save_loc = $my_save_dir . $filename;
//     file_put_contents($complete_save_loc, file_get_contents($url_to_image));

//     return basename($url_to_image, '.jpg');
// }

// $tenssd = DownloadImage($url_image[0], './images');

// $imgLocation = "./images/" . $tenssd . ".jpg";

// function getData($checkdata)
// {
//     if (isset($checkdata)) {
//         return $checkdata;
//     }
//     return "";
// }


// // require_once 'DBconnection.php';

// // $db = new DBconnection();

// // $conn = $db::$connectionInstance;

// $sql = "INSERT INTO `detaissd`(
//     `thuonghieu`,
//     `dong`,
//     `mapart`,
//     `loai`,
//     `phankhuc`,
//     `chuankichco`,
//     `dungluong`,
//     `loaichipnho`,
//     `giaotiep`,
//     `tocdodoctoida`,
//     `tocdoghitoida`,
//     `mtbf`,
//     `doday`,
//     `chieungang`,
//     `chieudoc`,
//     `trongluong`,
//     `tenssd`,
//     `giaban`,
//     `url_image`
// )
// VALUES (
//     '$data[0]',
//     '$data[1]',
//    '$data[2]',
//    '$data[3]',
//    '$data[4]',
//    '$data[5]',
//    '$data[6]',
//   '$data[7]',
//    '$data[8]',
//    '$data[9]',
//    '$data[10]',
//    '$data[11]',
//   '$data[12]',
//    '$data[13]',
//    '$data[14]',
//    '$data[15]',
//    '$tenssd',
//    '$giaban',
//    '$imgLocation`'
// )";

// $myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
// $txt =   $sql . "\n\n";
// fwrite($myfile, $txt);
// fclose($myfile);
