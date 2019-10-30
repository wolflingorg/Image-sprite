<?php
require_once 'vendor/autoload.php';

$sprite = new \src\Sprite\JpegSpriteBuilder();

foreach (glob('./images/*.{jpg,gif,png}', GLOB_BRACE) as $file) {
    try {
        $image = \src\ImageFactory::create($file);
        $image = new \src\Image\PosterDecorator($image);

        $sprite->appendPart($image);
    } catch (\InvalidArgumentException $e) {
        echo $e->getMessage();
    }
}

try {
    $image = $sprite->create(200);
    $image->save('./sprite.jpg');
} catch (\RuntimeException $e) {
    echo $e->getMessage();
}
