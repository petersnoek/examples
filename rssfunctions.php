<?php

function getFeed($feed_url) {

    $content = file_get_contents($feed_url);
    $x = new SimpleXmlElement($content);

    $out = "<ul>";

    // rss feed looks like this:  <channel> .... <item><link></link><title></title> .... </item>  ... <item>  ...  </item>  </channel>
    // rss is sent in xml format
    foreach($x->channel->item as $item) {
        $out .= "<li><a href='$item->link' title='$item->title'>" . $item->title . "</a></li>";
    }
    $out .= "</ul>";

    return $out;
}