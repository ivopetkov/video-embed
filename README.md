# Video Embed

Simple library that returns embed information for a given video url.

Supported video services: Dailymotion, Facebook, Flickr, Hulu, Kickstarter, The New York Times, Ted, Vimeo, Vine, YouTube.

[![Build Status](https://travis-ci.org/ivopetkov/video-embed.svg)](https://travis-ci.org/ivopetkov/video-embed)
[![Latest Stable Version](https://poser.pugx.org/ivopetkov/video-embed/v/stable)](https://packagist.org/packages/ivopetkov/video-embed)
[![codecov.io](https://codecov.io/github/ivopetkov/video-embed/coverage.svg?branch=master)](https://codecov.io/github/ivopetkov/video-embed?branch=master)
[![License](https://poser.pugx.org/ivopetkov/video-embed/license)](https://packagist.org/packages/ivopetkov/video-embed)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/5c6e4b99e3b4440692d5885c21730e8a)](https://www.codacy.com/app/ivo_2/video-embed)

## Download and install

* Install via Composer

```shell
composer require ivopetkov/video-embed
```

* Download the zip file

Download the [latest release](https://github.com/ivopetkov/video-embed/releases) from our GitHub page, unzip and include the `autoload.php` file.

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

$videoEmbed->setSize(800, 600); // will set a new width and height in the video html code
```

## Documentation

### Classes

#### IvoPetkov\VideoEmbed
##### Constants

`const string VERSION`

##### Properties

`public string $url`

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The video url

`public string $html`

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The video html code

`public string|int $width`

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The video width

`public string|int $height`

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The video height

`public int $duration`

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The video duration

`public string $title`

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The video title

`public string $description`

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The video description

`public array $thumbnail`

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;An array containing an url and sizes for the video thumbnail image

`public array $author`

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;An array containing the name and the url of the author

`public array $provider`

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;An array containing the name and the url of the provider

`public string $rawResponse`

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The raw response from the provider embed endpoint

##### Methods

```php
public __construct ( [ string $url ] )
```

Creates a new VideoEmbed object and load it if an url is specified

_Parameters_

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`$url`

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The video url

_Returns_

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No value is returned.

```php
public void load ( string $url )
```

Loads the data for the url specified

_Parameters_

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`$url`

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The video url

_Returns_

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No value is returned

```php
public void setSize ( string|int $width , string|int $height )
```

Sets new width and height in the video html code

_Parameters_

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`$width`

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thew new width

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`$height`

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thew new height

_Returns_

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No value is returned

## License
Video Embed is open-sourced software. It's free to use under the MIT license. See the [license file](https://github.com/ivopetkov/video-embed/blob/master/LICENSE) for more information.

## Author
This library is created by Ivo Petkov. Feel free to contact me at [@IvoPetkovCom](https://twitter.com/IvoPetkovCom) or [ivopetkov.com](https://ivopetkov.com).
