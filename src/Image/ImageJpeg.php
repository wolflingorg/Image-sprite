<?php

namespace src\Image;

class ImageJpeg extends AbstractImage
{
    /**
     * @inheritDoc
     */
    public function save($filename)
    {
        $result = imagejpeg($this->getResource(), $filename);

        if ($result === false) {
            throw new \RuntimeException('Could not save image');
        }
    }

    /**
     * @inheritDoc
     */
    protected function createResource($filename)
    {
        $resource = imagecreatefromjpeg($filename);

        if (false === $resource) {
            throw new \RuntimeException('Could not read image');
        }

        return $resource;
    }
}
