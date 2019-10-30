<?php
require_once 'vendor/autoload.php';

use src\Decorators\PosterDecorator;
use src\ImageFactory;
use src\Sprite\JpegSprite;

$sprite = new JpegSprite();

foreach (glob('./images/*.{jpg,png}', GLOB_BRACE) as $file) {
    try {
        $image = new PosterDecorator(
            ImageFactory::create($file)
        );

        $sprite->appendPart($image);
    } catch (\InvalidArgumentException $e) {
        exit($e->getMessage());
    }
}

try {
    $sprite->create(200)
        ->save('./sprite.jpg');
} catch (\RuntimeException $e) {
    exit($e->getMessage());
}
