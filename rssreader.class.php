<?php
/**
 * Created by PhpStorm.
 * User: SNP
 * Date: 30-5-2016
 * Time: 20:42
 */
class RssItem {
    public function __construct($title, $author, $pubDate, $description, $link) {
        $this->title = $title;
        $this->author = $author;
        $this->pubDate = $pubDate;
        $this->description = $description;
        $this->link = $link;
    }

    public $title;
    public $author;
    public $pubDate;
    public $description;
    public $link;

    public function ToHTMLString() {
        $out = '<h2>' . $this->title . '</h2>';
        $out .= '<p>Created: ' . $this->pubDate . '</p>';
        $out .= '<p>Author: ' . $this->author . '</p>';
        $out .= '<p>' . $this->description . '</p>';
        $out .= '<p><a href="' . $this->link . '">Read more: ' . $this->title . '</a></p>';
        return $out;
    }
}

class RssReader {

    public $rssfeed;

    function __construct($rss) {
        $this->rssfeed = $rss;
    }

    // reads all items (step 1) and creates RssItem objects (step 2)
    function GetAllItems() {
        $curl = curl_init();
        curl_setopt_array($curl, Array(
            CURLOPT_URL            => 'http://www.nu.nl/rss/Algemeen',
            CURLOPT_USERAGENT      => 'spider',
            CURLOPT_TIMEOUT        => 120,
            CURLOPT_CONNECTTIMEOUT => 30,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_ENCODING       => 'UTF-8'
        ));
        $data = curl_exec($curl);
        curl_close($curl);

        // step 2
        $items = array();           // store all items in $items
        $xml = simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOCDATA);        // xml will hold an object for every xml item
        foreach ($xml->channel->item as $item) {     // get one xml item
            $ri = new RssItem(
                (string) $item->title,
                (string) $item->children('dc', TRUE),     // some items have a creator child element. get it.,
                (string) $item->pubDate,
                (string) $item->description,
                (string) $item->link  );        // now create a new RssItem
            array_push($items, $ri);         // ... and store it in the array
        }

        return $items;
    }
}