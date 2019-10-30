<?php

namespace src\Sprite;

use src\Image\AbstractImage;

abstract class AbstractSprite
{
    /**
     * @var AbstractImage[]
     */
    private $parts = [];

    /**
     * @var resource
     */
    protected $sprite;

    /**
     * @param  AbstractImage  $image
     *
     * @return $this
     */
    public function appendPart(AbstractImage $image)
    {
        $this->parts[] = $image;

        return $this;
    }

    /**
     * @param $w
     *
     * @return AbstractImage
     * @throws \RuntimeException
     */
    public function create($w)
    {
        $h = 0;
        foreach ($this->parts as $image) {
            $image->resize($w);
            $h += $image->getHeight();
        }

        $this->sprite = imagecreatetruecolor($w, $h);

        $h = 0;
        foreach ($this->parts as $image) {
            imagecopy($this->sprite, $image->getResource(), 0, $h, 0, 0, $w, $image->getHeight());
            $h += $image->getHeight();
        }

        return $this->createImage();
    }

    /**
     * @return AbstractImage
     */
    abstract protected function createImage();
}
