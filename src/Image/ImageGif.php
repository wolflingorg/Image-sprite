<?php

namespace src\Image;

class ImageGif extends AbstractImage
{
    /**
     * @inheritDoc
     */
    public function save($filename)
    {
        $result = imagegif($this->resource, $filename);

        if ($result === false) {
            throw new \RuntimeException('Could not save image');
        }
    }

    /**
     * @inheritDoc
     */
    protected function createResource($filename)
    {
        $this->resource = imagecreatefromgif($filename);

        if (false === $this->resource) {
            throw new \RuntimeException('Could not read image');
        }
    }
}
