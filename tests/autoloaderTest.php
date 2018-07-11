<?php

/*
 * Video embed
 * https://github.com/ivopetkov/video-embed
 * Copyright (c) Ivo Petkov
 * Free to use under the MIT license.
 */

/**
 * @runTestsInSeparateProcesses
 */
class AutoloaderTest extends VideoEmbedAutoloaderTestCase
{

    /**
     * 
     */
    public function testClasses()
    {
        $this->assertTrue(class_exists('IvoPetkov\VideoEmbed'));
        $this->assertTrue(class_exists('IvoPetkov\VideoEmbed\Internal\Provider'));
        $this->assertTrue(class_exists('IvoPetkov\VideoEmbed\Internal\Providers\CollegeHumor'));
        $this->assertTrue(class_exists('IvoPetkov\VideoEmbed\Internal\Providers\Dailymotion'));
        $this->assertTrue(class_exists('IvoPetkov\VideoEmbed\Internal\Providers\Facebook'));
        $this->assertTrue(class_exists('IvoPetkov\VideoEmbed\Internal\Providers\Flickr'));
        $this->assertTrue(class_exists('IvoPetkov\VideoEmbed\Internal\Providers\FunnyOrDie'));
        $this->assertTrue(class_exists('IvoPetkov\VideoEmbed\Internal\Providers\Hulu'));
        $this->assertTrue(class_exists('IvoPetkov\VideoEmbed\Internal\Providers\Kickstarter'));
        $this->assertTrue(class_exists('IvoPetkov\VideoEmbed\Internal\Providers\NYTimes'));
        $this->assertTrue(class_exists('IvoPetkov\VideoEmbed\Internal\Providers\Ted'));
        $this->assertTrue(class_exists('IvoPetkov\VideoEmbed\Internal\Providers\Ustream'));
        $this->assertTrue(class_exists('IvoPetkov\VideoEmbed\Internal\Providers\Vbox7'));
        $this->assertTrue(class_exists('IvoPetkov\VideoEmbed\Internal\Providers\Vimeo'));
        $this->assertTrue(class_exists('IvoPetkov\VideoEmbed\Internal\Providers\Vine'));
        $this->assertTrue(class_exists('IvoPetkov\VideoEmbed\Internal\Providers\YouTube'));
    }

}
