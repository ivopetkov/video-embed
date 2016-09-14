<?php

/*
 * Video embed
 * https://github.com/ivopetkov/video-embed
 * Copyright 2016, Ivo Petkov
 * Free to use under the MIT license.
 */

namespace IvoPetkov\VideoEmbed\Providers;

class OnAol extends \IvoPetkov\VideoEmbed\Provider
{

    static function load($url, $result)
    {
        $response = file_get_contents('http://on.aol.com/api?url=' . urlencode($url).'&format=json');
        if (is_string($response)) {
            $result->rawResponse = $response;
            $data = json_decode($response, true);
            if (is_array($data)) {
                $result->html = parent::getStringValueOrNull($data, 'html');
                $result->width = parent::getIntValueOrNull($data, 'width');
                $result->height = parent::getIntValueOrNull($data, 'height');
                $result->duration = parent::getIntValueOrNull($data, 'duration');
                $result->title = parent::getStringValueOrNull($data, 'title');
                $result->description = parent::getStringValueOrNull($data, 'description');
                $result->thumbnail['url'] = parent::getStringValueOrNull($data, 'thumbnail_url');
                $result->thumbnail['width'] = parent::getIntValueOrNull($data, 'thumbnail_width');
                $result->thumbnail['height'] = parent::getIntValueOrNull($data, 'thumbnail_height');
                $result->author['name'] = parent::getStringValueOrNull($data, 'author_name');
                $result->author['url'] = parent::getStringValueOrNull($data, 'author_url');
                $result->provider['name'] = parent::getStringValueOrNull($data, 'provider_name');
                $result->provider['url'] = parent::getStringValueOrNull($data, 'provider_url');
            }
        }
    }

}
