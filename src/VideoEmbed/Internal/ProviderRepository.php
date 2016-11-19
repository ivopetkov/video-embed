<?php

namespace IvoPetkov\VideoEmbed\Internal;


class ProviderRepository {
    /**
     * Providers list
     *
     * @var array
     */
    static private $providers = [
        Providers\CollegeHumor::class,
        Providers\Dailymotion::class,
        Providers\Facebook::class,
        Providers\Flickr::class,
        Providers\FunnyOrDie::class,
        Providers\Hulu::class,
        Providers\Kickstarter::class,
        Providers\NYTimes::class,
        Providers\Ted::class,
        Providers\Ustream::class,
        Providers\Vbox7::class,
        Providers\Vimeo::class,
        Providers\Vine::class,
        Providers\YouTube::class
    ];


    public static function registerProvider( $provider ) {

    }

    /**
     * @param string $video_url
     *
     * @return ProviderInterface
     * @throws \Exception
     *
     */
    public static function find( $video_url ) {

        $hostname = self::getHostname( $video_url );

        /** @var ProviderInterface $provider */
        foreach ( self::$providers as $provider ) {
            $hostnames = $provider::getRegisteredHostnames();

            if ( self::matchDomain( $hostname, $hostnames ) ) {
                return new $provider;
            }
        }

        throw new \RuntimeException( 'No Available provider found for this URL' );

    }

    protected static function matchDomain( $hostname, $provider_hostnames ) {
        $provider_hostnames = array_map( function ( $domain ) {
            return str_replace( [ '.', '*' ], [ '\.', '.*' ], $domain );
        }, $provider_hostnames );


        if ( preg_match( '/^(' . implode( '|', $provider_hostnames ) . ')$/', $hostname ) ) {
            return true;
        }

        return false;
    }

    protected static function getHostname( $url ) {
        $urlData = parse_url( $url );

        if ( ! isset( $urlData['host'] ) ) {
            throw new \InvalidArgumentException( 'Invalid url passed for embeding' );
        }

        return preg_replace( '/^(www.)/ui', '', $urlData['host'] );
    }
}
