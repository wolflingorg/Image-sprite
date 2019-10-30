<?php

namespace src\Image;

abstract class AbstractImage
{
    /**
     * @var resource
     */
    private $resource;

    /**
     * @var string|null
     */
    private $filename;

    protected function __construct()
    {
    }

    /**
     * @param $filename
     *
     * @return AbstractImage
     */
    static public function createFromFilename($filename)
    {
        $image = (new static());
        $image->filename = $filename;
        $image->resource = $image->createResource($filename);

        return $image;
    }

    /**
     * @param string $filename
     *
     * @return resource
     * @throws \RuntimeException
     */
    abstract protected function createResource($filename);

    /**
     * @param $resource
     *
     * @return AbstractImage
     */
    static function createFromResource($resource)
    {
        $image = (new static());
        $image->resource = $resource;

        return $image;
    }

    /**
     * @return string|null
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @return resource
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @return int
     * @throws \RuntimeException
     */
    public function getWidth()
    {
        $w = imagesx($this->resource);

        if ($w === false) {
            throw new \RuntimeException('Could not get image size');
        }

        return $w;
    }

    /**
     * @return int
     * @throws \RuntimeException
     */
    public function getHeight()
    {
        $h = imagesy($this->resource);

        if ($h === false) {
            throw new \RuntimeException('Could not get image size');
        }

        return $h;
    }

    /**
     * @param $w
     * @param $h
     *
     * @return AbstractImage
     * @throws \RuntimeException
     */
    public function resize($w, $h = -1)
    {
        $this->resource = imagescale($this->resource, $w, $h);

        if (false === $this->resource) {
            throw new \RuntimeException('Could not resize image');
        }

        return $this;
    }

    /**
     * @param string $filename
     *
     * @return void
     * @throws \RuntimeException
     */
    abstract public function save($filename);
}
