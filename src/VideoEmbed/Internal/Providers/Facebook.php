<?php

/*
 * Video embed
 * https://github.com/ivopetkov/video-embed
 * Copyright (c) Ivo Petkov
 * Free to use under the MIT license.
 */

namespace IvoPetkov\VideoEmbed\Internal\Providers;

final class Facebook extends \IvoPetkov\VideoEmbed\Internal\Provider
{

    static function load($url, $result, $config)
    {
        if (!isset($config['facebookAppID'])) {
            throw new \Exception('The facebookAppID config option is missing!');
        }
        if (!isset($config['facebookAppSecret'])) {
            throw new \Exception('The facebookAppSecret config option is missing!');
        }
        $response = parent::readUrl('https://graph.facebook.com/v26.0/oembed_video?url=' . urlencode($url) . '&access_token=' . $config['facebookAppID'] . '|' . $config['facebookAppSecret']);
        $result->rawResponse = $response;
        $data = json_decode($response, true);
        if (is_array($data) && isset($data['html'])) {
            if (strpos($data['html'], 'fb-video')) {
                $result->width = parent::getIntValueOrNull($data, 'width');
                $result->height = parent::getIntValueOrNull($data, 'height');
                $result->html = $data['html'];
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
