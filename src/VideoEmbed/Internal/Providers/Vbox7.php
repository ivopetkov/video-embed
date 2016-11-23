<?php

/*
 * Video embed
 * https://github.com/ivopetkov/video-embed
 * Copyright 2016, Ivo Petkov
 * Free to use under the MIT license.
 */

namespace IvoPetkov\VideoEmbed\Internal\Providers;

use IvoPetkov\VideoEmbed\Internal\EmbedResponse;
use IvoPetkov\VideoEmbed\Internal\Provider;
use IvoPetkov\VideoEmbed\Internal\ProviderInterface;

final class Vbox7 extends Provider implements ProviderInterface {

    public function load( $url ) {
        $response = $this->readUrl( 'http://www.vbox7.com/etc/oembed/?url=' . urlencode( $url ) );
        $result   = new EmbedResponse();
        $result->setRawResponse( $response );

        $data     = $this->parseResponse( $response );
        $urlParts = explode( 'play:', $data['url'] );
        if ( isset( $urlParts[1] ) ) {
            $response = $this->buildResponse( $data )->setRawResponse( $response );
            $response->setHtml( '<iframe src="https://www.vbox7.com/emb/external.php?vid=' . $urlParts[1] . '" frameborder="0" allowfullscreen style="width:' . $response->getWidth() . 'px;height:' . $response->getHeight() . 'px;"></iframe>' );
        }

        return $response;
    }


    protected function parseResponse( $rawResponse ) {
        $propertiesNames = [
            'title',
            'author_name',
            'author_url',
            'provider_name',
            'provider_url',
            'width',
            'height',
            'url',
            'thumbnail_url',
            'thumbnail_width',
            'thumbnail_height',
        ];

        $domDocument = new \DOMDocument();
        $domDocument->loadXML( $rawResponse );
        if ( $domDocument->childNodes->item( 0 )->nodeName !== 'oembed' ) {
            throw new  \RuntimeException( 'Failed to parse resposne' );
        }

        $properties = [];
        foreach ( $propertiesNames as $propertyName ) {
            $elements = $domDocument->getElementsByTagName( $propertyName );
            if ( $elements->length === 1 ) {
                $properties[ $propertyName ] = trim( (string) $elements->item( 0 )->textContent );
            }
        }

        return $properties;

    }


    /**
     * Get all urls registered by provider
     *
     * @return array
     */
    public static function getRegisteredHostnames() {
        return [ 'vbox7.com', '*.vbox7.com' ];
    }
}
