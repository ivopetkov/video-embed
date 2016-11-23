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
        if ( ! in_array( 'IvoPetkov\\VideoEmbed\\Internal\\ProviderInterface', class_implements( $provider ), true )) {
            throw new \RuntimeException('Given provider is should implement ProviderInterface');
        }
        static::$providers[] = $provider;
    }

    /**
     * @param string $videoUrl
     *
     * @return ProviderInterface
     * @throws \Exception
     *
     */
    public static function find( $videoUrl ) {

        $hostname = self::getHostname( $videoUrl );

        /** @var ProviderInterface $provider */
        foreach ( self::$providers as $provider ) {
            $hostnames = $provider::getRegisteredHostnames();

            if ( self::matchDomain( $hostname, $hostnames ) ) {
                return new $provider;
            }
        }

        throw new \RuntimeException( 'No Available provider found for this URL' );

    }

    protected static function matchDomain( $hostname, $providerHostnames ) {
        $providerHostnames = array_map( function ( $domain ) {
            return str_replace( [ '.', '*' ], [ '\.', '.*' ], $domain );
        }, $providerHostnames );


        if ( preg_match( '/^(' . implode( '|', $providerHostnames ) . ')$/', $hostname ) ) {
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
