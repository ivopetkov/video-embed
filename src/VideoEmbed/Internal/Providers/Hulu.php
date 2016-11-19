<?php

/*
 * Video embed
 * https://github.com/ivopetkov/video-embed
 * Copyright 2016, Ivo Petkov
 * Free to use under the MIT license.
 */

namespace IvoPetkov\VideoEmbed\Internal\Providers;

final class Hulu extends \IvoPetkov\VideoEmbed\Internal\Provider
{

    public static function load($url, $result)
    {
        $response = parent::readUrl('http://hulu.com/api/oembed.json?url=' . urlencode($url));
        $result->rawResponse = $response;
        $data = json_decode($response, true);
        if (is_array($data)) {
            $result->html = parent::getStringValueOrNull($data, 'html');
            $result->width = parent::getIntValueOrNull($data, 'width');
            $result->height = parent::getIntValueOrNull($data, 'height');
            $result->duration = parent::getIntValueOrNull($data, 'duration');
            $result->title = parent::getStringValueOrNull($data, 'title');
            $result->description = parent::getStringValueOrNull($data, 'description');
            $result->thumbnail['url'] = parent::getStringValueOrNull($data, 'large_thumbnail_url');
            $result->thumbnail['width'] = parent::getIntValueOrNull($data, 'large_thumbnail_width');
            $result->thumbnail['height'] = parent::getIntValueOrNull($data, 'large_thumbnail_height');
            $result->author['name'] = parent::getStringValueOrNull($data, 'author_name');
            $result->author['url'] = parent::getStringValueOrNull($data, 'author_url');
            $result->provider['name'] = parent::getStringValueOrNull($data, 'provider_name');
            $result->provider['url'] = parent::getStringValueOrNull($data, 'provider_url');
        }
    }

}
