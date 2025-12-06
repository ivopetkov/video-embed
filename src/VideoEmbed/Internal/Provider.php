<?php

/*
 * Video embed
 * https://github.com/ivopetkov/video-embed
 * Copyright (c) Ivo Petkov
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
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $response = curl_exec($ch);
        //        $info = curl_getinfo($ch);
        //        if (!is_array($info) || !isset($info['http_code']) || $info['http_code'] !== 200) {
        //            print_r($info);
        //            exit;
        //        }
        $error = curl_error($ch);
        if (version_compare(PHP_VERSION, '8.5.0', '<')) {
            curl_close($ch);
        }
        if ($error !== '') {
            throw new \Exception('Read URL error: ' . $error);
        }
        return $response;
    }
}
