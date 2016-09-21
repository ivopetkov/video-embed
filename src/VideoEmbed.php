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

    /**
     *
     * @var string The video url
     */
    public $url = null;

    /**
     *
     * @var string The video html code
     */
    public $html = null;

    /**
     *
     * @var string|int The video width
     */
    public $width = null;

    /**
     *
     * @var string|int The video height
     */
    public $height = null;

    /**
     *
     * @var int The video duration
     */
    public $duration = null;

    /**
     *
     * @var string The video title
     */
    public $title = null;

    /**
     *
     * @var string The video description
     */
    public $description = null;

    /**
     *
     * @var array An array containing an url and sizes for the video thumbnail image
     */
    public $thumbnail = ['url' => null, 'width' => null, 'height' => null];

    /**
     *
     * @var array An array containing the name and the url of the author
     */
    public $author = ['name' => null, 'url' => null];

    /**
     *
     * @var array An array containing the name and the url of the provider
     */
    public $provider = ['name' => null, 'url' => null];

    /**
     *
     * @var string The raw response from the provider embed endpoint
     */
    public $rawResponse = null;

    /**
     * 
     * @var array Providers list
     */
    static private $providers = [
        'CollegeHumor' => ['collegehumor.com'],
        'Dailymotion' => ['dailymotion.com'],
        'Facebook' => ['facebook.com'],
        'Flickr' => ['flickr.com', '*.flickr.com', 'flic.kr'],
        'FunnyOrDie' => ['funnyordie.com'],
        'Hulu' => ['hulu.com'],
        'Kickstarter' => ['kickstarter.com'],
        'NYTimes' => ['nytimes.com'],
        'Ted' => ['ted.com'],
        'Ustream' => ['ustream.com', 'ustream.tv', '*.ustream.tv'],
        'Vbox7' => ['vbox7.com', '*.vbox7.com'],
        'Vimeo' => ['vimeo.com', 'player.vimeo.com'],
        'Vine' => ['vine.co'],
        'YouTube' => ['youtube.com', 'youtu.be']
    ];

    /**
     * Creates a new VideoEmbed object and load it if an url is specified
     * 
     * @param string $url
     */
    public function __construct($url = null)
    {
        if ($url !== null) {
            $this->load($url);
        }
    }

    /**
     * Loads the data for the url specified
     * 
     * @param string $url The video url
     * @throws \Exception
     * @throws \InvalidArgumentException
     * @return void No value is returned
     */
    public function load($url)
    {
        if (!is_string($url)) {
            throw new \InvalidArgumentException('The url argument must be of type string');
        }
        $this->url = $url;

        // Converts PHP errors and warnings to Exceptions
        set_error_handler(function() {
            throw new \Exception(func_get_arg(1));
        });

        $errorReason = '';
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
            $errorReason = $e->getMessage();
        }

        restore_error_handler();
        if ($this->html === null) {
            throw new \Exception('Cannot retrieve information about ' . $this->url . ' (reason: ' . (isset($errorReason{0}) ? $errorReason : 'unknown') . ')');
        }
    }

    /**
     * Sets new width and height in the video html code
     * 
     * @param string|int $width Thew new width
     * @param string|int $height Thew new height
     * @throws \InvalidArgumentException
     * @return void No value is returned
     */
    public function setSize($width, $height)
    {
        if (!is_string($width) && !is_int($width)) {
            throw new \InvalidArgumentException('The width argument must be of type string or integer');
        }
        if (!is_string($height) && !is_int($height)) {
            throw new \InvalidArgumentException('The height argument must be of type string or integer');
        }
        $this->html = preg_replace("/ width([ ]?)=([ ]?)[\"\']([0-9\.]+)[\"\']/", " width=\"" . $width . "\"", $this->html);
        $this->html = preg_replace("/ height([ ]?)=([ ]?)[\"\']([0-9\.]+)[\"\']/", " height=\"" . $height . "\"", $this->html);
        $this->html = preg_replace("/width:([0-9\.]+)px/", "width:" . (is_numeric($width) ? $width . 'px' : '') . "", $this->html);
        $this->html = preg_replace("/height:([0-9\.]+)px/", "height:" . (is_numeric($height) ? $height . 'px' : '') . "", $this->html);
        $this->html = preg_replace("/ width([ ]?)=([ ]?)([0-9\.]+)/", " width=" . $width, $this->html);
        $this->html = preg_replace("/ height([ ]?)=([ ]?)([0-9\.]+)/", " height=" . $height, $this->html);
        $this->width = $width;
        $this->height = $height;
    }

}
