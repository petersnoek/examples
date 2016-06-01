<?php
/**
 * Created by PhpStorm.
 * User: SNP
 * Date: 30-5-2016
 * Time: 20:48
 */
require_once 'rssreader.class.php';

$reader = new RssReader('http://www.nu.nl/rss/Algemeen');
$items = $reader->GetAllItems();

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>
<body>

<?php
    foreach ($items as $item) {
        echo $item->ToHTMLString();
    }
?>

</body>
</html>