# Video Embed

Simple library that returns embed information for a given video url.

Supported video services: CollegeHumor, Dailymotion, Facebook, Flickr, Funny Or Die, Hulu, Kickstarter, The New York Times, Ted, Ustream, Vimeo, Vine, YouTube.

[![Build Status](https://travis-ci.org/ivopetkov/video-embed.svg)](https://travis-ci.org/ivopetkov/video-embed)
[![Latest Stable Version](https://poser.pugx.org/ivopetkov/video-embed/v/stable)](https://packagist.org/packages/ivopetkov/video-embed)
[![codecov.io](https://codecov.io/github/ivopetkov/video-embed/coverage.svg?branch=master)](https://codecov.io/github/ivopetkov/video-embed?branch=master)
[![License](https://poser.pugx.org/ivopetkov/video-embed/license)](https://packagist.org/packages/ivopetkov/video-embed)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/5c6e4b99e3b4440692d5885c21730e8a)](https://www.codacy.com/app/ivo_2/video-embed)

## Install via Composer

```shell
composer require ivopetkov/video-embed
```

## Usage

```php
$videoEmbed = new IvoPetkov\VideoEmbed('https://www.youtube.com/watch?v=Pwe-pA6TaZk');

// IvoPetkov\VideoEmbed Object
// (
//     [url] => https://www.youtube.com/watch?v=Pwe-pA6TaZk
//     [html] => <iframe width="480" height="270" src="https://www.youtube.com/embed/Pwe-pA6TaZk?feature=oembed" frameborder="0" allowfullscreen></iframe>
//     [width] => 480
//     [height] => 270
//     [duration] => 
//     [title] => Where the Hell is Matt? 2012
//     [description] => 
//     [thumbnail] => Array
//         (
//             [url] => https://i.ytimg.com/vi/Pwe-pA6TaZk/hqdefault.jpg
//             [width] => 480
//             [height] => 360
//         )
//     [author] => Array
//         (
//             [name] => Matt Harding
//             [url] => https://www.youtube.com/user/mattharding2718
//         )
//     [provider] => Array
//         (
//             [name] => YouTube
//             [url] => https://www.youtube.com/
//         )
//     [rawResponse] => {"html": "\u003ciframe width=\"480\" height=\"270\" ...
// )
```
## License
Video Embed is open-sourced software. It's free to use under the MIT license. See the [license file](https://github.com/ivopetkov/video-embed/blob/master/LICENSE) for more information.

## Author
This library is created by Ivo Petkov. Feel free to contact me at [@IvoPetkovCom](https://twitter.com/IvoPetkovCom) or [ivopetkov.com](https://ivopetkov.com).
