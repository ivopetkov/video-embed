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
    static public $providers = [
        'CollegeHumor' => ['collegehumor.com'],
        'Dailymotion' => ['dailymotion.com'],
        'Facebook' => ['facebook.com'],
        'Flickr' => ['flickr.com', '*.flickr.com', 'flic.kr'],
        'FunnyOrDie' => ['funnyordie.com'],
        'Hulu' => ['hulu.com'],
        'Kickstarter' => ['kickstarter.com'],
        'NYTimes' => ['nytimes.com'],
        'OnAol' => ['on.aol.com'],
        'Ted' => ['ted.com'],
        'Ustream' => ['ustream.com', '*.ustream.tv'],
        'Viddler' => ['viddler.com'],
        'Vimeo' => ['vimeo.com', 'player.vimeo.com'],
        'Vine' => ['vine.co'],
        'YouTube' => ['youtube.com', 'youtu.be']
    ];

    public function __construct($url)
    {
        $this->url = $url;
        $this->load();
    }

    private function load()
    {

        // Converts PHP errors and warnings to Exceptions
        set_error_handler(function($errorNumber, $errorMessage) {
            throw new \Exception($errorMessage);
        });

        try {
            $urlData = parse_url($this->url);
            if (isset($urlData['host'])) {
                $hostname = $urlData['host'];
                if (substr($hostname, 0, 4) === 'www.') {
                    $hostname = substr($hostname, 4);
                }
                foreach (self::$providers as $name => $domains) {
                    $done = false;
                    foreach ($domains as $domain) {
                        if (preg_match('/^' . str_replace(['.', '*'], ['\.', '.*'], $domain) . '$/', $hostname)) {
                            include_once __DIR__ . DIRECTORY_SEPARATOR . 'VideoEmbed' . DIRECTORY_SEPARATOR . 'Providers' . DIRECTORY_SEPARATOR . $name . '.php';
                            call_user_func(['\IvoPetkov\VideoEmbed\Providers\\' . $name, 'load'], $this->url, $this);
                            $done = true;
                            break;
                        }
                    }
                    if ($done) {
                        break;
                    }
                }
            }
        } catch (\Exception $e) {
            
        }

        restore_error_handler();
        if ($this->html === null) {
            throw new \Exception('Cannot retrieve information about ' . $this->url);
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