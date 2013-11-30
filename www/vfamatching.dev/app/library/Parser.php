<?php

class Parser {

    public static function stringToInteger($string){
        return preg_replace('/[^0-9+]/', '', $string);
    }

}