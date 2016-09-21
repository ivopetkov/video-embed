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
        $videoEmbed = new IvoPetkov\VideoEmbed('http://www.funnyordie.com/videos/2e67428bc7/new-white-iphone-4-commercial');
        $this->assertTrue($videoEmbed->url === 'http://www.funnyordie.com/videos/2e67428bc7/new-white-iphone-4-commercial');
        $this->assertTrue($videoEmbed->title === 'New White iPhone 4 Commercial');
        $videoEmbed->setSize(800, 600);
        $this->assertTrue($videoEmbed->html === '<iframe src="//www.funnyordie.com/embed/2e67428bc7" width="800" height="600" frameborder="0" allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe><div style="text-align:left;font-size:x-small;margin-top:0;width:800px;"><a href="http://www.funnyordie.com/videos/2e67428bc7/new-white-iphone-4-commercial" title="from Funny Or Die, Brian Lane">New White iPhone 4 Commercial</a> from <a href="http://www.funnyordie.com/funnyordie">Funny Or Die</a></div>');
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
        $videoEmbed = new IvoPetkov\VideoEmbed('https://www.kickstarter.com/projects/8220280/kello-the-sleep-revolution-device-that-upgrades-yo');
        $this->assertTrue($videoEmbed->url === 'https://www.kickstarter.com/projects/8220280/kello-the-sleep-revolution-device-that-upgrades-yo');
        $this->assertTrue($videoEmbed->title === 'Kello: The Sleep Revolution Device That Upgrades Your Day');
        $videoEmbed->setSize(800, 600);
        $this->assertTrue($videoEmbed->html === '<iframe frameborder="0" height="600" scrolling="no" src="https://www.kickstarter.com/projects/8220280/kello-the-sleep-revolution-device-that-upgrades-yo/widget/video.html" width="800"></iframe>');
    }

    /**
     * 
     */
    public function testNYTimes()
    {
        $videoEmbed = new IvoPetkov\VideoEmbed('http://www.nytimes.com/video/technology/100000004574648/china-internet-wechat.html');
        $this->assertTrue($videoEmbed->url === 'http://www.nytimes.com/video/technology/100000004574648/china-internet-wechat.html');
        $this->assertTrue($videoEmbed->title === 'How China Is Changing Your Internet');
        $videoEmbed->setSize(800, 600);
        $this->assertTrue($videoEmbed->html === '<iframe width="800" height="600" frameborder="0" scrolling="no" allowfullscreen="true" marginheight="0" marginwidth="0" id="nyt_video_player" title="New York Times Video - Embed Player" src="https://static01.nyt.com/video/players/offsite/index.html?videoId=100000004574648"></iframe>');
    }

    /**
     * 
     */
    public function testTed()
    {
        $videoEmbed = new IvoPetkov\VideoEmbed('http://www.ted.com/talks/simon_sinek_why_good_leaders_make_you_feel_safe');
        $this->assertTrue($videoEmbed->url === 'http://www.ted.com/talks/simon_sinek_why_good_leaders_make_you_feel_safe');
        $this->assertTrue($videoEmbed->title === 'Simon Sinek: Why good leaders make you feel safe');
        $videoEmbed->setSize(800, 600);
        $this->assertTrue($videoEmbed->html === '<iframe src="https://embed.ted.com/talks/simon_sinek_why_good_leaders_make_you_feel_safe" width="800" height="600" frameborder="0" scrolling="no" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>');
    }

    /**
     * 
     */
    public function testUstream()
    {
        $videoEmbed = new IvoPetkov\VideoEmbed('http://www.ustream.tv/recorded/91509675');
        $this->assertTrue($videoEmbed->url === 'http://www.ustream.tv/recorded/91509675');
        $this->assertTrue($videoEmbed->title === 'Autorecord from 20/09/2016 4:15PM EDT');
        $videoEmbed->setSize(800, 600);
        $this->assertTrue($videoEmbed->html === '<iframe width="800" height="600" src="http://www.ustream.tv/embed/recorded/91509675" scrolling="no" frameborder="0" style="border: 0px none transparent;"></iframe><br />');
    }

    /**
     * 
     */
    public function testVbox7()
    {
        $videoEmbed = new IvoPetkov\VideoEmbed('http://www.vbox7.com/play:4bd8b90e');
        $this->assertTrue($videoEmbed->url === 'http://www.vbox7.com/play:4bd8b90e');
        $this->assertTrue($videoEmbed->title === 'David Guetta feat Kid Cudi - Memories ( Official Video )');
        $videoEmbed->setSize(800, 600);
        $this->assertTrue($videoEmbed->html === '<iframe src="https://www.vbox7.com/emb/external.php?vid=4bd8b90e" frameborder="0" allowfullscreen style="width:800px;height:600px;"></iframe>');
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

        $videoEmbed = new IvoPetkov\VideoEmbed('https://vine.co/v/OxDiBYVluin');
        $this->assertTrue($videoEmbed->url === 'https://vine.co/v/OxDiBYVluin');
        $this->assertTrue($videoEmbed->title === 'Sunset launch of #Falcon9 and #DSCOVR last week (3x speed).');
        $videoEmbed->setSize(800, 600);
        $this->assertTrue($videoEmbed->html === '<iframe class="vine-embed" src="https://vine.co/v/OxDiBYVluin/embed/simple" width="800" height="600" frameborder="0"></iframe><script async src="//platform.vine.co/static/scripts/embed.js"></script>');
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
        new IvoPetkov\VideoEmbed('https://example.com/');
    }

    /**
     * 
     */
    public function testInvalidProvider2()
    {
        $this->setExpectedException('\Exception');
        IvoPetkov\VideoEmbed::$providers[] = 'invalid';
        new IvoPetkov\VideoEmbed('http://invalid/');
    }

}
