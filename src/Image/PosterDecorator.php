<?php

namespace src\Image;

class PosterDecorator extends AbstractImage
{
    /**
     * @var AbstractImage
     */
    private $image;

    public function __construct(AbstractImage $image)
    {
        $this->image = $image;

        parent::__construct();
    }

    /**
     * @inheritDoc
     */
    static public function createFromFilename($filename)
    {
        throw new \LogicException('Could not create decorator from filename');
    }

    /**
     * @inheritDoc
     */
    static function createFromResource($resource)
    {
        throw new \LogicException('Could not create decorator from resource');
    }

    /**
     * @inheritDoc
     */
    public function getWidth()
    {
        return $this->image->getWidth();
    }

    /**
     * @inheritDoc
     */
    public function getHeight()
    {
        return $this->image->getHeight();
    }

    /**
     * @inheritDoc
     */
    public function resize($w, $h = -1)
    {
        if (preg_match('/poster\_/', $this->image->getFilename())) {
            return $this->image->resource;
        }

        return $this->image->resize($w, $h);
    }

    /**
     * @inheritDoc
     */
    public function save($filename)
    {
        $this->image->save($filename);
    }

    /**
     * @inheritDoc
     */
    protected function createResource($filename)
    {
        $this->image->createResource($filename);
    }

    /**
     * @inheritDoc
     */
    public function getFilename()
    {
        return $this->image->getFilename();
    }

    /**
     * @inheritDoc
     */
    public function getResource()
    {
        return $this->image->getResource();
    }
}
