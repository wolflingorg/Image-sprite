<?php

namespace src\Sprite;

use src\Image\ImageJpeg;

class JpegSpriteBuilder extends AbstractSpriteBuilder
{
    /**
     * @inheritDoc
     */
    protected function createImage()
    {
        return ImageJpeg::createFromResource($this->sprite);
    }
}
