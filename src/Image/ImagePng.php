<?php

namespace src\Image;

class ImagePng extends AbstractImage
{
    /**
     * @inheritDoc
     */
    public function save($filename)
    {
        $result = imagepng($this->resource, $filename);

        if ($result === false) {
            throw new \RuntimeException('Could not save image');
        }
    }

    /**
     * @inheritDoc
     */
    protected function createResource($filename)
    {
        $this->resource = imagecreatefrompng($filename);

        if (false === $this->resource) {
            throw new \RuntimeException('Could not read image');
        }
    }
}
