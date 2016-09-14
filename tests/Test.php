<?php

/*
 * Video embed
 * https://github.com/ivopetkov/video-embed
 * Copyright 2016, Ivo Petkov
 * Free to use under the MIT license.
 */

/**
 * @runTestsInSeparateProcesses
 */
class Test extends VideoEmbedTestCase
{

    /**
     * 
     */
    public function testCollegeHumor()
    {
        $videoEmbed = new IvoPetkov\VideoEmbed('http://www.collegehumor.com/video/6972370/the-guy-whos-never-seen-game-of-thrones');
        $this->assertTrue($videoEmbed->url === 'http://www.collegehumor.com/video/6972370/the-guy-whos-never-seen-game-of-thrones');
        $this->assertTrue($videoEmbed->title === 'The Guy Who\'s Never Seen Game of Thrones');
        $videoEmbed->setSize(800, 600);
        $this->assertTrue($videoEmbed->html === '<iframe src="http://www.collegehumor.com/e/6972370" width="800" height="600" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>');
    }

    /**
     * 
     */
    public function testDailymotion()
    {
        $videoEmbed = new IvoPetkov\VideoEmbed('http://www.dailymotion.com/video/x4cdcq4_temps-forts-nadal-v-groth-roland-garros-2016-1t_sport');
        $this->assertTrue($videoEmbed->url === 'http://www.dailymotion.com/video/x4cdcq4_temps-forts-nadal-v-groth-roland-garros-2016-1t_sport');
        $this->assertTrue($videoEmbed->title === 'Temps forts Nadal v Groth Roland-Garros 2016 / 1T');
        $videoEmbed->setSize(800, 600);
        $this->assertTrue($videoEmbed->html === '<iframe frameborder="0" width="800" height="600" src="http://www.dailymotion.com/embed/video/x4cdcq4" allowfullscreen></iframe>');
    }

    /**
     * 
     */
    public function testYouTube()
    {
        $videoEmbed = new IvoPetkov\VideoEmbed('https://www.youtube.com/watch?v=Pwe-pA6TaZk');
        $this->assertTrue($videoEmbed->url === 'https://www.youtube.com/watch?v=Pwe-pA6TaZk');
        $this->assertTrue($videoEmbed->title === 'Where the Hell is Matt? 2012');
        $videoEmbed->setSize(800, 600);
        $this->assertTrue($videoEmbed->html === '<iframe width="800" height="600" src="https://www.youtube.com/embed/Pwe-pA6TaZk?feature=oembed" frameborder="0" allowfullscreen></iframe>');
    }

    /**
     * 
     */
    public function testVimeo()
    {
        $videoEmbed = new IvoPetkov\VideoEmbed('https://vimeo.com/29950141');
        $this->assertTrue($videoEmbed->url === 'https://vimeo.com/29950141');
        $this->assertTrue($videoEmbed->title === 'Landscapes: Volume Two');
        $videoEmbed->setSize(800, 600);
        $this->assertTrue($videoEmbed->html === '<iframe src="https://player.vimeo.com/video/29950141" width="800" height="600" frameborder="0" title="Landscapes: Volume Two" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>');
    }

    /**
     * 
     */
    public function testHulu()
    {
        $videoEmbed = new IvoPetkov\VideoEmbed('http://www.hulu.com/watch/20807/late-night-with-conan-obrien-wed-may-21-2008');
        $this->assertTrue($videoEmbed->url === 'http://www.hulu.com/watch/20807/late-night-with-conan-obrien-wed-may-21-2008');
        $this->assertTrue($videoEmbed->title === 'Wed, May 21, 2008 (Late Night With Conan O\'Brien)');
        $videoEmbed->setSize(800, 600);
        $this->assertTrue($videoEmbed->html === '<iframe width="800" height="600" src="http://www.hulu.com/embed.html?eid=0-njKp22bl4GivFXH0lh5w" frameborder="0" scrolling="no" webkitAllowFullScreen mozallowfullscreen allowfullscreen> </iframe>');
    }

    /**
     * 
     */
    public function testInvalidProvider1()
    {
        $this->setExpectedException('\Exception');
        $videoEmbed = new IvoPetkov\VideoEmbed('https://example.com/');
    }

    /**
     * 
     */
    public function testInvalidProvider2()
    {
        $this->setExpectedException('\Exception');
        IvoPetkov\VideoEmbed::$providers[] = 'invalid';
        $videoEmbed = new IvoPetkov\VideoEmbed('http://invalid/');
    }

}
