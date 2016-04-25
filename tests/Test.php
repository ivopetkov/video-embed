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
        $videoEmbed = new IvoPetkov\VideoEmbed('https://vimeo.com/channels/top/29950141');
        $this->assertTrue($videoEmbed->url === 'https://vimeo.com/channels/top/29950141');
        $this->assertTrue($videoEmbed->title === 'Landscapes: Volume Two');
        $videoEmbed->setSize(800, 600);
        $this->assertTrue($videoEmbed->html === '<iframe src="https://player.vimeo.com/video/29950141" width="800" height="600" frameborder="0" title="Landscapes: Volume Two" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>');
    }

}
