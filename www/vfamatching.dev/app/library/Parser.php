<?php

class Parser {

    public static function stringToInteger($string){
        return preg_replace('/[^0-9+]/', '', $string);
    }

    //source: http://css-tricks.com/snippets/php/find-urls-in-text-make-links/
    public static function linkUrlsInText($text){
        // The Regular Expression filter
        $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
        // Check if there is a url in the text
        if(preg_match($reg_exUrl, $text, $url)) {
               // make the urls hyper links
               return preg_replace($reg_exUrl, "<a href=" . $url[0] . ">" . $url[0] . "</a> ", $text);
        } else {
            return $text;
        }
    }

}