<?php

namespace src\Sprite;

use src\Image\ImageJpeg;

class JpegSprite extends AbstractSprite
{
    /**
     * @inheritDoc
     */
    protected function createImage()
    {
        return ImageJpeg::createFromResource($this->sprite);
    }
}
