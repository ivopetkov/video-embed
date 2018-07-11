<?php

/*
 * Video embed
 * https://github.com/ivopetkov/video-embed
 * Copyright (c) Ivo Petkov
 * Free to use under the MIT license.
 */

$classes = array(
    'IvoPetkov\VideoEmbed' => 'src/VideoEmbed.php',
    'IvoPetkov\VideoEmbed\Internal\Provider' => 'src/VideoEmbed/Internal/Provider.php',
    'IvoPetkov\VideoEmbed\Internal\Providers\CollegeHumor' => 'src/VideoEmbed/Internal/Providers/CollegeHumor.php',
    'IvoPetkov\VideoEmbed\Internal\Providers\Dailymotion' => 'src/VideoEmbed/Internal/Providers/Dailymotion.php',
    'IvoPetkov\VideoEmbed\Internal\Providers\Facebook' => 'src/VideoEmbed/Internal/Providers/Facebook.php',
    'IvoPetkov\VideoEmbed\Internal\Providers\Flickr' => 'src/VideoEmbed/Internal/Providers/Flickr.php',
    'IvoPetkov\VideoEmbed\Internal\Providers\FunnyOrDie' => 'src/VideoEmbed/Internal/Providers/FunnyOrDie.php',
    'IvoPetkov\VideoEmbed\Internal\Providers\Hulu' => 'src/VideoEmbed/Internal/Providers/Hulu.php',
    'IvoPetkov\VideoEmbed\Internal\Providers\Kickstarter' => 'src/VideoEmbed/Internal/Providers/Kickstarter.php',
    'IvoPetkov\VideoEmbed\Internal\Providers\NYTimes' => 'src/VideoEmbed/Internal/Providers/NYTimes.php',
    'IvoPetkov\VideoEmbed\Internal\Providers\Ted' => 'src/VideoEmbed/Internal/Providers/Ted.php',
    'IvoPetkov\VideoEmbed\Internal\Providers\Ustream' => 'src/VideoEmbed/Internal/Providers/Ustream.php',
    'IvoPetkov\VideoEmbed\Internal\Providers\Vbox7' => 'src/VideoEmbed/Internal/Providers/Vbox7.php',
    'IvoPetkov\VideoEmbed\Internal\Providers\Vimeo' => 'src/VideoEmbed/Internal/Providers/Vimeo.php',
    'IvoPetkov\VideoEmbed\Internal\Providers\Vine' => 'src/VideoEmbed/Internal/Providers/Vine.php',
    'IvoPetkov\VideoEmbed\Internal\Providers\YouTube' => 'src/VideoEmbed/Internal/Providers/YouTube.php'
);

spl_autoload_register(function ($class) use ($classes) {
    if (isset($classes[$class])) {
        require __DIR__ . '/' . $classes[$class];
    }
}, true);
