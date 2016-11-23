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

final class Vine extends Provider implements ProviderInterface
{

    public function load($url)
    {
        $response = $this->readUrl('https://vine.co/oembed.json?url=' . urlencode($url));

        $data     = $this->parseResponse($response);
        $response = $this->buildResponse($data)->setRawResponse($response);

        return $response;
    }

    /**
     * Get all urls registered by provider
     *
     * @return array
     */
    public static function getRegisteredHostnames()
    {
        return ['vine.co'];
    }
}
