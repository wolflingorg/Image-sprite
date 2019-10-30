<?php

namespace src\Image;

class ImagePng extends AbstractImage
{
    /**
     * @inheritDoc
     */
    public function save($filename)
    {
        $result = imagepng($this->getResource(), $filename);

        if ($result === false) {
            throw new \RuntimeException('Could not save image');
        }
    }

    /**
     * @inheritDoc
     */
    protected function createResource($filename)
    {
        $resource = imagecreatefrompng($filename);

        if (false === $resource) {
            throw new \RuntimeException('Could not read image');
        }

        return $resource;
    }
}
