<?php

/*
 * Video embed
 * https://github.com/ivopetkov/video-embed
 * Copyright 2016, Ivo Petkov
 * Free to use under the MIT license.
 */

namespace IvoPetkov\VideoEmbed\Internal\Providers;

final class Vbox7 extends \IvoPetkov\VideoEmbed\Internal\Provider
{

    public static function load($url, $result)
    {
        $response = parent::readUrl('http://www.vbox7.com/etc/oembed/?url=' . urlencode($url));
        $result->rawResponse = $response;
        $domDocument = new \DOMDocument();
        $domDocument->loadXML($response);
        if ($domDocument->childNodes->item(0)->nodeName === 'oembed') {
            $properties = [];
            $findProperty = function($name) use ($domDocument, &$properties) {
                $elements = $domDocument->getElementsByTagName($name);
                if ($elements->length === 1) {
                    $properties[$name] = trim((string) $elements->item(0)->textContent);
                }
            };
            $findProperty('title');
            $findProperty('author_name');
            $findProperty('author_url');
            $findProperty('provider_name');
            $findProperty('provider_url');
            $findProperty('width');
            $findProperty('height');
            $findProperty('url');
            $urlParts = explode('play:', $properties['url']);
            if (isset($urlParts[1])) {
                $result->width = parent::getIntValueOrNull($properties, 'width');
                $result->height = parent::getIntValueOrNull($properties, 'height');
                $result->html = '<iframe src="https://www.vbox7.com/emb/external.php?vid=' . $urlParts[1] . '" frameborder="0" allowfullscreen style="width:' . $result->width . 'px;height:' . $result->height . 'px;"></iframe>';
                $result->title = parent::getStringValueOrNull($properties, 'title');
                $result->thumbnail['url'] = parent::getStringValueOrNull($properties, 'thumbnail_url');
                $result->thumbnail['width'] = parent::getIntValueOrNull($properties, 'thumbnail_width');
                $result->thumbnail['height'] = parent::getIntValueOrNull($properties, 'thumbnail_height');
                $result->author['name'] = parent::getStringValueOrNull($properties, 'author_name');
                $result->author['url'] = parent::getStringValueOrNull($properties, 'author_url');
                $result->provider['name'] = parent::getStringValueOrNull($properties, 'provider_name');
                $result->provider['url'] = parent::getStringValueOrNull($properties, 'provider_url');
            }
        }
    }

}
