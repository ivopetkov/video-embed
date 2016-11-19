<?php

/*
 * Video embed
 * https://github.com/ivopetkov/video-embed
 * Copyright 2016, Ivo Petkov
 * Free to use under the MIT license.
 */

namespace IvoPetkov\VideoEmbed\Internal;

class Provider {

    protected function getStringValueOrNull( $array, $key ) {
        return isset( $array[ $key ] ) ? (string) $array[ $key ] : null;
    }

    protected function getIntValueOrNull( $array, $key ) {
        return isset( $array[ $key ] ) ? (int) $array[ $key ] : null;
    }

    protected function readUrl( $url ) {
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $ch, CURLOPT_URL, $url );
        curl_setopt( $ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36' );
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
        $response = curl_exec( $ch );
        $info     = curl_getinfo( $ch );
        if ( ! is_array( $info ) || ! isset( $info['http_code'] ) || $info['http_code'] !== 200 ) {
            throw new \RuntimeException( 'Server responded with error', $info['http_code'] );
        }
        curl_close( $ch );

        return $response;
    }


    protected function parseResponse( $raw_response ) {
        $response = json_decode( $raw_response, true );

        if ( ! $response ) {
            throw new  \RuntimeException( 'Failed to parse resposne' );
        }

        return $response;
    }

    /**
     * @param array $result
     *
     * @return EmbedResponse
     */
    public function buildResponse( $result ) {
        $response = new EmbedResponse();

        $response->setHtml( $this->getStringValueOrNull( $result, 'html' ) );
        $response->setWidth( $this->getIntValueOrNull( $result, 'width' ) );
        $response->setHeight( $this->getIntValueOrNull( $result, 'height' ) );
        $response->setDuration( $this->getIntValueOrNull( $result, 'duration' ) );
        $response->setTitle( $this->getStringValueOrNull( $result, 'title' ) );
        $response->setDescription( $this->getStringValueOrNull( $result, 'description' ) );
        $response->setThumbnailUrl( $this->getStringValueOrNull( $result, 'thumbnail_url' ) );
        $response->setThumbnailWidth( $this->getIntValueOrNull( $result, 'thumbnail_width' ) );
        $response->setThumbnailHeight( $this->getIntValueOrNull( $result, 'thumbnail_height' ) );
        $response->setAuthorName( $this->getStringValueOrNull( $result, 'author_name' ) );
        $response->setAuthorUrl( $this->getStringValueOrNull( $result, 'author_url' ) );
        $response->setProviderName( $this->getStringValueOrNull( $result, 'provider_name' ) );
        $response->setProviderUrl( $this->getStringValueOrNull( $result, 'provider_url' ) );

        return $response;
    }

}
