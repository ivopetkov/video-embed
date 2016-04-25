<?php

/*
 * Video embed
 * https://github.com/ivopetkov/video-embed
 * Copyright 2016, Ivo Petkov
 * Free to use under the MIT license.
 */

namespace IvoPetkov\VideoEmbed;

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

}
