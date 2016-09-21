<?php

/*
 * Video embed
 * https://github.com/ivopetkov/video-embed
 * Copyright 2016, Ivo Petkov
 * Free to use under the MIT license.
 */

namespace IvoPetkov\VideoEmbed\Internal;

class Provider
{

    static function getStringValueOrNull($array, $key)
    {
        return isset($array[$key]) ? (string) $array[$key] : null;
    }

    static function getIntValueOrNull($array, $key)
    {
        return isset($array[$key]) ? (int) $array[$key] : null;
    }

    static function readUrl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $response = curl_exec($ch);
//        $info = curl_getinfo($ch);
//        if (!is_array($info) || !isset($info['http_code']) || $info['http_code'] !== 200) {
//            print_r($info);
//            exit;
//        }
        curl_close($ch);
        return $response;
    }

}
