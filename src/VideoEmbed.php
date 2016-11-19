<?php

/*
 * Video embed
 * https://github.com/ivopetkov/video-embed
 * Copyright 2016, Ivo Petkov
 * Free to use under the MIT license.
 */

namespace IvoPetkov;

use IvoPetkov\VideoEmbed\Internal\EmbedResponse;
use IvoPetkov\VideoEmbed\Internal\ProviderInterface;
use IvoPetkov\VideoEmbed\Internal\ProviderRepository;

class VideoEmbed {

    /**
     * Current library version
     */
    const VERSION = '0.1.0';

    /**
     * The video url
     *
     * @var string
     */
    public $url = null;

    /**
     * The video html code
     *
     * @var string
     */
    public $html = null;

    /**
     * The video width
     *
     * @var string|int
     */
    public $width = null;

    /**
     * The video height
     *
     * @var string|int
     */
    public $height = null;

    /**
     * The video duration
     *
     * @var int
     */
    public $duration = null;

    /**
     * The video title
     *
     * @var string
     */
    public $title = null;

    /**
     * The video description
     *
     * @var string
     */
    public $description = null;

    /**
     * An array containing an url and sizes for the video thumbnail image
     *
     * @var array
     */
    public $thumbnail = [ 'url' => null, 'width' => null, 'height' => null ];

    /**
     * An array containing the name and the url of the author
     *
     * @var array
     */
    public $author = [ 'name' => null, 'url' => null ];

    /**
     * An array containing the name and the url of the provider
     *
     * @var array
     */
    public $provider = [ 'name' => null, 'url' => null ];

    /**
     * The raw response from the provider embed endpoint
     *
     * @var string
     */
    public $rawResponse = null;


    /**
     * Creates a new VideoEmbed object and load it if an url is specified
     *
     * @param string $url The video url
     */
    public function __construct( $url = null ) {
        if ( $url !== null ) {
            $this->load( $url );
        }
    }

    /**
     * Loads the data for the url specified
     *
     * @param string $url The video url
     *
     * @throws \Exception
     * @throws \InvalidArgumentException
     * @return VideoEmbed
     * @throws \RuntimeException
     */
    public function load( $url ) {
        if ( ! is_string( $url ) ) {
            throw new \InvalidArgumentException( 'The url argument must be of type string' );
        }
        $this->url = $url;

        $errorReason = '';
        $response    = new EmbedResponse();

        try {
            /** @var ProviderInterface $provider */
            $provider = ProviderRepository::find( $this->url );
            /** @var EmbedResponse $response */
            $response = $provider->load( $this->url );

            $this->bindProperties( $response );
        } catch ( \Exception $e ) {
            $errorReason = $e->getMessage();
        }

        if ( $response->getHtml() === null || empty( $response->getHtml() ) ) {
            throw new \RuntimeException( 'Cannot retrieve information about ' . $this->url . ' (reason: ' . ( isset( $errorReason{0} ) ? $errorReason : 'unknown' ) . ')' );
        }


        return $this;
    }

    /**
     * Sets new width and height in the video html code
     *
     * @param string|int $width Thew new width
     * @param string|int $height Thew new height
     *
     * @throws \InvalidArgumentException
     * @return VideoEmbed
     */
    public function setSize( $width, $height ) {
        if ( ! is_string( $width ) && ! is_int( $width ) ) {
            throw new \InvalidArgumentException( 'The width argument must be of type string or integer' );
        }
        if ( ! is_string( $height ) && ! is_int( $height ) ) {
            throw new \InvalidArgumentException( 'The height argument must be of type string or integer' );
        }
        $this->html   = preg_replace( "/ width([ ]?)=([ ]?)[\"\']([0-9\.]+)[\"\']/", " width=\"" . $width . "\"", $this->html );
        $this->html   = preg_replace( "/ height([ ]?)=([ ]?)[\"\']([0-9\.]+)[\"\']/", " height=\"" . $height . "\"", $this->html );
        $this->html   = preg_replace( "/width:([0-9\.]+)px/", "width:" . ( is_numeric( $width ) ? $width . 'px' : '' ) . "", $this->html );
        $this->html   = preg_replace( "/height:([0-9\.]+)px/", "height:" . ( is_numeric( $height ) ? $height . 'px' : '' ) . "", $this->html );
        $this->html   = preg_replace( "/ width([ ]?)=([ ]?)([0-9\.]+)/", " width=" . $width, $this->html );
        $this->html   = preg_replace( "/ height([ ]?)=([ ]?)([0-9\.]+)/", " height=" . $height, $this->html );
        $this->width  = $width;
        $this->height = $height;

        return $this;
    }

    private function bindProperties( $response ) {
        foreach ( get_object_vars( $this ) as $key => $var ) {

            if ( is_array( $var ) ) {
                foreach ( array_keys( $var ) as $val ) {
                    if ( method_exists( $response, 'get' . ucfirst( $key ) . ucfirst( $val ) ) ) {
                        $this->$key[ $val ] = $response->{'get' . ucfirst( $key ) . ucfirst( $val )}();
                    }
                }
                continue;
            }
            if ( method_exists( $response, 'get' . ucfirst( $key ) ) ) {
                $this->$key = $response->{'get' . ucfirst( $key )}();
            }


        }

    }

}
