<?php

/*
 * Video embed
 * https://github.com/ivopetkov/video-embed
 * Copyright (c) Ivo Petkov
 * Free to use under the MIT license.
 */

namespace IvoPetkov;

class VideoEmbed
{

    /**
     * Current library version
     */
    const VERSION = '0.2.2';

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
    public $thumbnail = ['url' => null, 'width' => null, 'height' => null];

    /**
     * An array containing the name and the url of the author
     * 
     * @var array
     */
    public $author = ['name' => null, 'url' => null];

    /**
     * An array containing the name and the url of the provider
     * 
     * @var array
     */
    public $provider = ['name' => null, 'url' => null];

    /**
     * The raw response from the provider embed endpoint
     * 
     * @var string
     */
    public $rawResponse = null;

    /**
     * Providers list
     * 
     * @var array
     */
    static private $providers = [
        //'CollegeHumor' => ['collegehumor.com'],
        'Dailymotion' => ['dailymotion.com'],
        'Facebook' => ['facebook.com', 'fb.watch'],
        'Instagram' => ['instagram.com'],
        'Flickr' => ['flickr.com', '*.flickr.com', 'flic.kr'],
        //'FunnyOrDie' => ['funnyordie.com'],
        'Hulu' => ['hulu.com'],
        'Kickstarter' => ['kickstarter.com'],
        'NYTimes' => ['nytimes.com'],
        'Ted' => ['ted.com'],
        'Vbox7' => ['vbox7.com', '*.vbox7.com'],
        'Vimeo' => ['vimeo.com', 'player.vimeo.com'],
        'Vine' => ['vine.co'],
        'YouTube' => ['youtube.com', 'youtu.be']
    ];

    /**
     * Creates a new VideoEmbed object and load it if an url is specified
     * 
     * @param string $url The video url
     * @param array $config Configuration options. Currently supported: facebookAppID and facebookAppSecret
     */
    public function __construct($url = null, $config = [])
    {
        if ($url !== null) {
            $this->load($url, $config);
        }
    }

    /**
     * Loads the data for the url specified
     * 
     * @param string $url The video url
     * @param array $config Configuration options. Currently supported: facebookAppID and facebookAppSecret
     * @throws \Exception
     * @throws \InvalidArgumentException
     * @return void No value is returned
     */
    public function load($url, $config = [])
    {
        if (!is_string($url)) {
            throw new \InvalidArgumentException('The url argument must be of type string');
        }
        if (!is_array($config)) {
            throw new \InvalidArgumentException('The config argument must be of type array');
        }
        $this->url = $url;

        // Converts PHP errors and warnings to Exceptions
        set_error_handler(function () {
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
                            include_once __DIR__ . DIRECTORY_SEPARATOR . 'VideoEmbed' . DIRECTORY_SEPARATOR . 'Internal' . DIRECTORY_SEPARATOR . 'Providers' . DIRECTORY_SEPARATOR . $name . '.php';
                            call_user_func(['\IvoPetkov\VideoEmbed\Internal\Providers\\' . $name, 'load'], $this->url, $this, $config);
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
            throw new \Exception('Cannot retrieve information about ' . $this->url . ' (reason: ' . (isset($errorReason[0]) ? $errorReason : 'unknown') . ')');
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
        $this->html = preg_replace("/width:([0-9\.]+)px/", "width:" . (is_numeric($width) ? $width . 'px' : $width) . "", $this->html);
        $this->html = preg_replace("/height:([0-9\.]+)px/", "height:" . (is_numeric($height) ? $height . 'px' : $height) . "", $this->html);
        $this->html = preg_replace("/ width([ ]?)=([ ]?)([0-9\.]+)/", " width=" . $width, $this->html);
        $this->html = preg_replace("/ height([ ]?)=([ ]?)([0-9\.]+)/", " height=" . $height, $this->html);
        $this->width = $width;
        $this->height = $height;
    }
}
