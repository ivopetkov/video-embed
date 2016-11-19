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
     * @param array $response
     */
    public function buildResponse( $response ) {

    }

}
