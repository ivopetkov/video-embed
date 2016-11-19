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

final class Dailymotion extends Provider implements ProviderInterface {

    public function load( $url ) {
        $response = $this->readUrl( 'http://www.dailymotion.com/services/oembed?url=' . urlencode( $url ) . '&format=json' );
        $result   = new EmbedResponse();
        $result->setRawResponse( $response );
        $data = $this->parseResponse( $response );
        $result->setHtml( $this->getStringValueOrNull( $data, 'html' ) );
        $result->setWidth( $this->getIntValueOrNull( $data, 'width' ) );
        $result->setHeight( $this->getIntValueOrNull( $data, 'height' ) );
        $result->setDuration( $this->getIntValueOrNull( $data, 'duration' ) );
        $result->setTitle( $this->getStringValueOrNull( $data, 'title' ) );
        $result->setDescription( $this->getStringValueOrNull( $data, 'description' ) );
        $result->setThumbnailUrl( $this->getStringValueOrNull( $data, 'thumbnail_url' ) );
        $result->setThumbnailWidth( $this->getIntValueOrNull( $data, 'thumbnail_width' ) );
        $result->setThumbnailHeight( $this->getIntValueOrNull( $data, 'thumbnail_height' ) );
        $result->setAuthorName( $this->getStringValueOrNull( $data, 'author_name' ) );
        $result->setAuthorUrl( $this->getStringValueOrNull( $data, 'author_url' ) );
        $result->setProviderName( $this->getStringValueOrNull( $data, 'provider_name' ) );
        $result->setProviderUrl( $this->getStringValueOrNull( $data, 'provider_url' ) );

        return $result;
    }

    /**
     * Get all urls registered by provider
     *
     * @return array
     */
    public static function getRegisteredHostnames() {
        return [ 'dailymotion.com' ];
    }
}
