<?php

/*
 * Video embed
 * https://github.com/ivopetkov/video-embed
 * Copyright 2016, Ivo Petkov
 * Free to use under the MIT license.
 */

namespace IvoPetkov\VideoEmbed\Internal\Providers;

use IvoPetkov\VideoEmbed\Internal\Provider;
use IvoPetkov\VideoEmbed\Internal\ProviderInterface;

final class Facebook extends Provider implements ProviderInterface
{

    public function load($url)
    {
        $response = $this->readUrl('https://www.facebook.com/plugins/video/oembed.json/?url=' . urlencode($url));

        $data     = $this->parseResponse($response);
        $urlParts = explode('/', trim($url, '/'));
        $videoID  = $urlParts[count($urlParts) - 1];
        if (is_numeric($videoID)) {
            $response = $this->buildResponse($data)->setRawResponse($response);
            $response->setHtml('<iframe src="https://www.facebook.com/video/embed?video_id=' . $videoID . '" width="' . $response->getWidth() . '" height="' . $response->getHeight() . '" frameborder="0"></iframe>');
        }

        return $response;
    }

    /**
     * Get all urls registered by provider
     *
     * @return array
     */
    public static function getRegisteredHostnames()
    {
        return ['facebook.com'];
    }
}
