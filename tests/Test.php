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
    public function testFacebook()
    {
        $videoEmbed = new IvoPetkov\VideoEmbed('https://www.facebook.com/SpaceX/videos/10157486010400131/');
        $this->assertTrue($videoEmbed->url === 'https://www.facebook.com/SpaceX/videos/10157486010400131/');
        $this->assertTrue($videoEmbed->title === null);
        $videoEmbed->setSize(800, 600);
        $this->assertTrue($videoEmbed->html === '<iframe src="https://www.facebook.com/video/embed?video_id=10157486010400131" width="800" height="600" frameborder="0"></iframe>');
    }

    /**
     * 
     */
    public function testFlickr()
    {
        $videoEmbed = new IvoPetkov\VideoEmbed('https://www.flickr.com/photos/udono/3343551781/');
        $this->assertTrue($videoEmbed->url === 'https://www.flickr.com/photos/udono/3343551781/');
        $this->assertTrue($videoEmbed->title === 'P1080929');
        $videoEmbed->setSize(800, 600);
        $this->assertTrue($videoEmbed->html === '<a data-flickr-embed="true" href="https://www.flickr.com/photos/udono/3343551781/" title="P1080929 by udono, on Flickr"><img src="https://farm4.staticflickr.com/3600/3343551781_832eb9d5d5_z.jpg?zz=1" width="800" height="600" alt="P1080929"></a><script async src="https://embedr.flickr.com/assets/client-code.js" charset="utf-8"></script>');
    }

    /**
     * 
     */
    public function testFunnyOrDie()
    {
        
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
    public function testKickstarter()
    {
        
    }

    /**
     * 
     */
    public function testNYTimes()
    {
        
    }

    /**
     * 
     */
    public function testOnAol()
    {
        
    }

    /**
     * 
     */
    public function testTed()
    {
        
    }

    /**
     * 
     */
    public function testUstream()
    {
        
    }

    /**
     * 
     */
    public function testViddler()
    {
        
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
    public function testVine()
    {
        
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
