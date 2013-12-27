<?php

class Parser {

    public static function stringToInteger($string){
        return preg_replace('/[^0-9+]/', '', $string);
    }

    //source: http://css-tricks.com/snippets/php/find-urls-in-text-make-links/
    public static function linkUrlsInText($text){
        // URL starting with http://
        $reg_exUrl = "/(^|\A|\s)((http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,4}(\/\S*)?)/";
            if(preg_match($reg_exUrl, $text, $url)) {
           // make the urls hyper links
           $textesult=preg_replace( $reg_exUrl, "$1<a href=\"$2\">$2</a> ", $text );
        } else {
           // if no urls in the text just return the text
            $textesult=$text;
        }   
        // URL starting www.
        $reg_exUrl = "/(^|\A|\s)((www\.)[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,4}(\/\S*)?)/";
        if(preg_match($reg_exUrl, $textesult, $url)) {
           // make the urls hyper links
           $textesult=preg_replace( $reg_exUrl, "$1<a href=\"http://$2\">$2</a>", $textesult );
        }
        return $textesult;
    }

}