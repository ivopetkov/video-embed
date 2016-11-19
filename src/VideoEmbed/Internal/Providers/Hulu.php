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

final class Hulu extends Provider implements ProviderInterface {

    public function load( $url ) {
        $response = $this->readUrl( 'http://hulu.com/api/oembed.json?url=' . urlencode( $url ) );

        $data     = $this->parseResponse( $response );
        $response = $this->buildResponse( $data )->setRawResponse( $response );
        $response->setThumbnailUrl( $this->getStringValueOrNull( $data, 'large_thumbnail_url' ) );
        $response->setThumbnailWidth( $this->getIntValueOrNull( $data, 'large_thumbnail_width' ) );
        $response->setThumbnailHeight( $this->getIntValueOrNull( $data, 'large_thumbnail_height' ) );

        return $response;

    }

    /**
     * Get all urls registered by provider
     *
     * @return array
     */
    public static function getRegisteredHostnames() {
        return [ 'hulu.com' ];
    }
}
