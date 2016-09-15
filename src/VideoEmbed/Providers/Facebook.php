<?php

/*
 * Video embed
 * https://github.com/ivopetkov/video-embed
 * Copyright 2016, Ivo Petkov
 * Free to use under the MIT license.
 */

namespace IvoPetkov\VideoEmbed\Providers;

class Facebook extends \IvoPetkov\VideoEmbed\Provider
{

    static function load($url, $result)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, 'https://www.facebook.com/plugins/video/oembed.json/?url=' . urlencode($url));
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36');
        $response = curl_exec($ch);
        curl_close($ch);
        if (is_string($response)) {
            $result->rawResponse = $response;
            $data = json_decode($response, true);
            if (is_array($data)) {
                $urlParts = explode('/', trim($url, '/'));
                $videoID = $urlParts[sizeof($urlParts) - 1];
                if (is_numeric($videoID)) {
                    $result->width = parent::getIntValueOrNull($data, 'width');
                    $result->height = parent::getIntValueOrNull($data, 'height');
                    $result->html = '<iframe src="https://www.facebook.com/video/embed?video_id=' . $videoID . '" width="' . $result->width . '" height="' . $result->height . '" frameborder="0"></iframe>';
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

}
