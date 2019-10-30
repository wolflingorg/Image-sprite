<?php

namespace src\Image;

class ImageJpeg extends AbstractImage
{
    /**
     * @inheritDoc
     */
    public function save($filename)
    {
        $result = imagejpeg($this->resource, $filename);

        if ($result === false) {
            throw new \RuntimeException('Could not save image');
        }
    }

    /**
     * @inheritDoc
     */
    protected function createResource($filename)
    {
        $this->resource = imagecreatefromjpeg($filename);

        if (false === $this->resource) {
            throw new \RuntimeException('Could not read image');
        }
    }
}
