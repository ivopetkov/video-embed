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
class ProvidersTest extends VideoEmbedTestCase
{

    /**
     * 
     */
    public function testCollegeHumor()
    {
        $videoEmbed = new IvoPetkov\VideoEmbed('http://www.collegehumor.com/video/6972370/the-guy-whos-never-seen-game-of-thrones');
        $this->assertEquals( 'http://www.collegehumor.com/video/6972370/the-guy-whos-never-seen-game-of-thrones', $videoEmbed->url );
        $this->assertEquals( 'The Guy Who\'s Never Seen Game of Thrones', $videoEmbed->title );
        $videoEmbed->setSize(800, 600);
        $this->assertEquals( '<iframe src="http://www.collegehumor.com/e/6972370" width="800" height="600" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>', $videoEmbed->html );
    }

    /**
     * 
     */
    public function testDailymotion()
    {
        $videoEmbed = new IvoPetkov\VideoEmbed('http://www.dailymotion.com/video/x4cdcq4_temps-forts-nadal-v-groth-roland-garros-2016-1t_sport');
        $this->assertEquals( 'http://www.dailymotion.com/video/x4cdcq4_temps-forts-nadal-v-groth-roland-garros-2016-1t_sport', $videoEmbed->url );
        $this->assertEquals( 'Temps forts Nadal v Groth Roland-Garros 2016 / 1T', $videoEmbed->title );
        $videoEmbed->setSize(800, 600);
        $this->assertEquals( '<iframe frameborder="0" width="800" height="600" src="http://www.dailymotion.com/embed/video/x4cdcq4" allowfullscreen></iframe>', $videoEmbed->html );
    }

    /**
     * 
     */
    public function testFacebook()
    {
        $videoEmbed = new IvoPetkov\VideoEmbed('https://www.facebook.com/SpaceX/videos/10157486010400131/');
        $this->assertEquals( 'https://www.facebook.com/SpaceX/videos/10157486010400131/', $videoEmbed->url );
        $this->assertEquals( null, $videoEmbed->title );
        $videoEmbed->setSize(800, 600);
        $this->assertEquals( '<iframe src="https://www.facebook.com/video/embed?video_id=10157486010400131" width="800" height="600" frameborder="0"></iframe>', $videoEmbed->html );
    }

    /**
     * 
     */
    public function testFlickr()
    {
        $videoEmbed = new IvoPetkov\VideoEmbed('https://www.flickr.com/photos/udono/3343551781/');
        $this->assertEquals( 'https://www.flickr.com/photos/udono/3343551781/', $videoEmbed->url );
        $this->assertEquals( 'P1080929', $videoEmbed->title );
        $videoEmbed->setSize(800, 600);
        $this->assertEquals( '<a data-flickr-embed="true" href="https://www.flickr.com/photos/udono/3343551781/" title="P1080929 by udono, on Flickr"><img src="https://farm4.staticflickr.com/3600/3343551781_832eb9d5d5_z.jpg?zz=1" width="800" height="600" alt="P1080929"></a><script async src="https://embedr.flickr.com/assets/client-code.js" charset="utf-8"></script>', $videoEmbed->html );
    }

    /**
     * 
     */
    public function testFunnyOrDie()
    {
        $videoEmbed = new IvoPetkov\VideoEmbed('http://www.funnyordie.com/videos/2e67428bc7/new-white-iphone-4-commercial');
        $this->assertEquals( 'http://www.funnyordie.com/videos/2e67428bc7/new-white-iphone-4-commercial', $videoEmbed->url );
        $this->assertEquals( 'New White iPhone 4 Commercial', $videoEmbed->title );
        $videoEmbed->setSize(800, 600);
        $this->assertEquals( '<iframe src="//www.funnyordie.com/embed/2e67428bc7" width="800" height="600" frameborder="0" allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe><div style="text-align:left;font-size:x-small;margin-top:0;width:800px;"><a href="http://www.funnyordie.com/videos/2e67428bc7/new-white-iphone-4-commercial" title="from Funny Or Die, Brian Lane">New White iPhone 4 Commercial</a> from <a href="http://www.funnyordie.com/funnyordie">Funny Or Die</a></div>', $videoEmbed->html );
    }

    /**
     * 
     */
    public function testHulu()
    {
        $videoEmbed = new IvoPetkov\VideoEmbed('http://www.hulu.com/watch/20807/late-night-with-conan-obrien-wed-may-21-2008');
        $this->assertEquals( 'http://www.hulu.com/watch/20807/late-night-with-conan-obrien-wed-may-21-2008', $videoEmbed->url );
        $this->assertEquals( 'Wed, May 21, 2008 (Late Night With Conan O\'Brien)', $videoEmbed->title );
        $videoEmbed->setSize(800, 600);
        $this->assertEquals( '<iframe width="800" height="600" src="//www.hulu.com/embed.html?eid=0-njKp22bl4GivFXH0lh5w" frameborder="0" scrolling="no" webkitAllowFullScreen mozallowfullscreen allowfullscreen> </iframe>', $videoEmbed->html );
    }

    /**
     * 
     */
    public function testKickstarter()
    {
        $videoEmbed = new IvoPetkov\VideoEmbed('https://www.kickstarter.com/projects/8220280/kello-the-sleep-revolution-device-that-upgrades-yo');
        $this->assertEquals( 'https://www.kickstarter.com/projects/8220280/kello-the-sleep-revolution-device-that-upgrades-yo', $videoEmbed->url );
        $this->assertEquals( 'Kello: The Sleep Revolution Device That Upgrades Your Day', $videoEmbed->title );
        $videoEmbed->setSize(800, 600);
        $this->assertEquals( '<iframe frameborder="0" height="600" scrolling="no" src="https://www.kickstarter.com/projects/8220280/kello-the-sleep-revolution-device-that-upgrades-yo/widget/video.html" width="800"></iframe>', $videoEmbed->html );
    }

    /**
     * 
     */
    public function testNYTimes()
    {
        $videoEmbed = new IvoPetkov\VideoEmbed('http://www.nytimes.com/video/technology/100000004574648/china-internet-wechat.html');
        $this->assertEquals( 'http://www.nytimes.com/video/technology/100000004574648/china-internet-wechat.html', $videoEmbed->url );
        $this->assertEquals( 'How China Is Changing Your Internet', $videoEmbed->title );
        $videoEmbed->setSize(800, 600);
        $this->assertEquals( '<iframe width="800" height="600" frameborder="0" scrolling="no" allowfullscreen="true" marginheight="0" marginwidth="0" id="nyt_video_player" title="New York Times Video - Embed Player" src="https://static01.nyt.com/video/players/offsite/index.html?videoId=100000004574648"></iframe>', $videoEmbed->html );
    }

    /**
     * 
     */
    public function testTed()
    {
        $videoEmbed = new IvoPetkov\VideoEmbed('http://www.ted.com/talks/simon_sinek_why_good_leaders_make_you_feel_safe');
        $this->assertEquals( 'http://www.ted.com/talks/simon_sinek_why_good_leaders_make_you_feel_safe', $videoEmbed->url );
        $this->assertEquals( 'Simon Sinek: Why good leaders make you feel safe', $videoEmbed->title );
        $videoEmbed->setSize(800, 600);
        $this->assertEquals( '<iframe src="https://embed.ted.com/talks/simon_sinek_why_good_leaders_make_you_feel_safe" width="800" height="600" frameborder="0" scrolling="no" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>', $videoEmbed->html );
    }

    /**
     * 
     */
    public function testUstream()
    {
        $videoEmbed = new IvoPetkov\VideoEmbed( 'http://www.ustream.tv/recorded/92820906' );
        $this->assertEquals( 'http://www.ustream.tv/recorded/92820906', $videoEmbed->url );
        $this->assertEquals( 'ISS HD Earth Viewing Experiment', $videoEmbed->title );
        $videoEmbed->setSize(800, 600);
        $this->assertEquals( '<iframe width="800" height="600" src="http://www.ustream.tv/embed/recorded/92820906" scrolling="no" frameborder="0" style="border: 0px none transparent;"></iframe><br />', $videoEmbed->html );
    }

    /**
     * 
     */
    public function testVbox7()
    {
        $videoEmbed = new IvoPetkov\VideoEmbed('http://www.vbox7.com/play:4bd8b90e');
        $this->assertEquals( 'http://www.vbox7.com/play:4bd8b90e', $videoEmbed->url );
        $this->assertEquals( 'David Guetta feat Kid Cudi - Memories ( Official Video )', $videoEmbed->title );
        $videoEmbed->setSize(800, 600);
        $this->assertEquals( '<iframe src="https://www.vbox7.com/emb/external.php?vid=4bd8b90e" frameborder="0" allowfullscreen style="width:800px;height:600px;"></iframe>', $videoEmbed->html );
    }

    /**
     * 
     */
    public function testVimeo()
    {
        $videoEmbed = new IvoPetkov\VideoEmbed('https://vimeo.com/29950141');
        $this->assertEquals( 'https://vimeo.com/29950141', $videoEmbed->url );
        $this->assertEquals( 'Landscapes: Volume Two', $videoEmbed->title );
        $videoEmbed->setSize(800, 600);
        $this->assertEquals( '<iframe src="https://player.vimeo.com/video/29950141" width="800" height="600" frameborder="0" title="Landscapes: Volume Two" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', $videoEmbed->html );
    }

    /**
     * 
     */
    public function testVine()
    {

        $videoEmbed = new IvoPetkov\VideoEmbed('https://vine.co/v/OxDiBYVluin');
        $this->assertEquals( 'https://vine.co/v/OxDiBYVluin', $videoEmbed->url );
        $this->assertEquals( 'Sunset launch of #Falcon9 and #DSCOVR last week (3x speed).', $videoEmbed->title );
        $videoEmbed->setSize(800, 600);
        $this->assertEquals( '<iframe class="vine-embed" src="https://vine.co/v/OxDiBYVluin/embed/simple" width="800" height="600" frameborder="0"></iframe><script async src="//platform.vine.co/static/scripts/embed.js"></script>', $videoEmbed->html );
    }

    /**
     * 
     */
    public function testYouTube()
    {
        $videoEmbed = new IvoPetkov\VideoEmbed('https://www.youtube.com/watch?v=Pwe-pA6TaZk');
        $this->assertEquals( 'https://www.youtube.com/watch?v=Pwe-pA6TaZk', $videoEmbed->url );
        $this->assertEquals( 'Where the Hell is Matt? 2012', $videoEmbed->title );
        $videoEmbed->setSize(800, 600);
        $this->assertEquals( '<iframe width="800" height="600" src="https://www.youtube.com/embed/Pwe-pA6TaZk?feature=oembed" frameborder="0" allowfullscreen></iframe>', $videoEmbed->html );
    }

    /**
     * 
     */
    public function testInvalidProvider1()
    {
        $this->setExpectedException('\Exception');
        new IvoPetkov\VideoEmbed('https://example.com/');
    }

    /**
     * 
     */
    public function testInvalidProvider2()
    {
        $this->setExpectedException('\Exception');
        new IvoPetkov\VideoEmbed('http://invalid/');
    }

    public function testNeProvider() {
        \IvoPetkov\VideoEmbed\Internal\ProviderRepository::registerProvider(\IvoPetkov\VideoEmbed\Internal\Providers\YouTube::class);

    }
    public function testNewProviderException() {
        $this->setExpectedException('\Exception');
        \IvoPetkov\VideoEmbed\Internal\ProviderRepository::registerProvider(stdClass::class);
    }

    public function testExceptionWithWrongWidth() {
        $this->setExpectedException('\Exception');
        $videoEmbed = new IvoPetkov\VideoEmbed('https://www.youtube.com/watch?v=Pwe-pA6TaZk');
        $videoEmbed->setSize(false,100);
    }

    public function testExceptionWithWrongHeight() {
        $this->setExpectedException('\Exception');
        $videoEmbed = new IvoPetkov\VideoEmbed('https://www.youtube.com/watch?v=Pwe-pA6TaZk');
        $videoEmbed->setSize( 100, false );
    }

    public function testWrongUrl() {
        $this->setExpectedException('\RuntimeException');
        new IvoPetkov\VideoEmbed('some not url');
    }

    public function testEmptyUrl() {
        $this->setExpectedException('\InvalidArgumentException');
        new IvoPetkov\VideoEmbed(0);
    }
}
