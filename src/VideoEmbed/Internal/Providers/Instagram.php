<?php

/*
 * Video embed
 * https://github.com/ivopetkov/video-embed
 * Copyright (c) Ivo Petkov
 * Free to use under the MIT license.
 */

namespace IvoPetkov\VideoEmbed\Internal\Providers;

final class Instagram extends \IvoPetkov\VideoEmbed\Internal\Provider
{

    static function load($url, $result, $config)
    {
        if (!isset($config['facebookAppID'])) {
            throw new \Exception('The facebookAppID config option is missing!');
        }
        if (!isset($config['facebookAppSecret'])) {
            throw new \Exception('The facebookAppSecret config option is missing!');
        }
        $response = parent::readUrl('https://graph.facebook.com/v18.0/instagram_oembed?url=' . urlencode($url) . '&access_token=' . $config['facebookAppID'] . '|' . $config['facebookAppSecret']);
        $result->rawResponse = $response;
        $data = json_decode($response, true);
        if (is_array($data) && isset($data['html'])) {
            $matches = null;
            preg_match('/\/reel\/([0-9a-zA-Z\-\_]+)\//', $data['html'], $matches);
            $videoID = isset($matches[1]) ? $matches[1] : null;
            if ($videoID !== null) {
                $result->width = parent::getIntValueOrNull($data, 'width');
                $result->height = parent::getIntValueOrNull($data, 'width');
                $result->html = '<iframe src="https://www.instagram.com/reel/' . $videoID . '/embed/captioned" width="' . $result->width . '" height="' . $result->height . '" frameborder="0"></iframe>';
                $result->thumbnail['url'] = parent::getStringValueOrNull($data, 'thumbnail_url');
                $result->thumbnail['width'] = parent::getIntValueOrNull($data, 'thumbnail_width');
                $result->thumbnail['height'] = parent::getIntValueOrNull($data, 'thumbnail_height');
                $result->author['name'] = parent::getStringValueOrNull($data, 'author_name');
                $result->provider['name'] = parent::getStringValueOrNull($data, 'provider_name');
                $result->provider['url'] = parent::getStringValueOrNull($data, 'provider_url');
            }
        }
    }
}
