<?php

class Uploader {

    public static function processInputFilename($filename){
        return time() . '-' . preg_replace('/\s+/', '-', $filename);
    }

}