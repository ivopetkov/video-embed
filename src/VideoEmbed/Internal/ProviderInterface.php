<?php

namespace IvoPetkov\VideoEmbed\Internal;


interface ProviderInterface {

    /**
     * Get all urls registered by provider
     *
     * @return array
     */
    public static function getRegisteredHostnames();


    /**
     * @param string $url
     *
     * @return EmbedResponse
     */
    public function load( $url );
}