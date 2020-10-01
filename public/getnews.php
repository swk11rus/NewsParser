<?php
    global $title;
    global $imgUrl;
    global $description;
    global $link;
    global $item;

    function getNews($items, $iditem) {
        global $title, $imgUrl, $description, $item, $link;

        $item = $items -> channel -> item[(int)$iditem];
        $title = $item -> title;
        $description = $item -> description;
        $imgUrl = $item -> enclosure['url'];
        $link = $item -> link;
    }

    function getItems($url) {
        $content = file_get_contents($url);
        $items = new SimpleXmlElement($content);
        return $items;
    }
?>