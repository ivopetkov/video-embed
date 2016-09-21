<?php

/*
 * Video embed
 * https://github.com/ivopetkov/video-embed
 * Copyright 2016, Ivo Petkov
 * Free to use under the MIT license.
 */

namespace IvoPetkov\VideoEmbed\Internal\Providers;

final class Facebook extends \IvoPetkov\VideoEmbed\Internal\Provider
{

    static function load($url, $result)
    {
        $response = parent::readUrl('https://www.facebook.com/plugins/video/oembed.json/?url=' . urlencode($url));
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
