<?php

/*
 * Video embed
 * https://github.com/ivopetkov/video-embed
 * Copyright 2016, Ivo Petkov
 * Free to use under the MIT license.
 */

namespace IvoPetkov;

class VideoEmbed
{

    public $url = null;
    public $html = null;
    public $width = null;
    public $height = null;
    public $duration = null;
    public $title = null;
    public $description = null;
    public $thumbnail = ['url' => null, 'width' => null, 'height' => null];
    public $author = ['name' => null, 'url' => null];
    public $provider = ['name' => null, 'url' => null];
    public $rawResponse = null;

    public function __construct($url)
    {
        $this->url = $url;
        $this->load();
    }

    private function handleErrors($errorNumber, $errorMessage)
    {
        throw new \Exception($errorMessage);
    }

    private function load()
    {

        set_error_handler([$this, 'handleErrors']);

        $providers = [
            '//youtube.com' => 'YouTube',
            '//youtu.be' => 'YouTube',
            '//www.youtube.com' => 'YouTube',
            '//www.youtu.be' => 'YouTube',
            '//vimeo.com' => 'Vimeo',
            '//vimeo.com' => 'Vimeo',
        ];
        foreach ($providers as $match => $name) {
            if (strpos($this->url, $match)) {
                call_user_func(['\IvoPetkov\VideoEmbed\Providers\\' . $name, 'load'], $this->url, $this);
            }
        }

        restore_error_handler();
        if ($this->html === null) {
            throw new \Exception('');
        }
    }

    public function setSize($width, $height)
    {
        $this->html = preg_replace("/width([ ]?)=([ ]?)[\"\']([0-9]+)[\"\']/", "width=\"" . $width . "\"", $this->html);
        $this->html = preg_replace("/height([ ]?)=([ ]?)[\"\']([0-9]+)[\"\']/", "height=\"" . $height . "\"", $this->html);
        $this->html = preg_replace("/width:([0-9]+)px/", "width:" . $width . "", $this->html);
        $this->html = preg_replace("/height:([0-9]+)px/", "height:" . $height . "", $this->html);
        $this->html = preg_replace("/width([ ]?)=([ ]?)([0-9]+)/", "width=" . $width, $this->html);
        $this->html = preg_replace("/height([ ]?)=([ ]?)([0-9]+)/", "height=" . $height, $this->html);
        $this->width = $width;
        $this->height = $height;
        return $this->html;
    }

}
