<?php

namespace src\Decorators;

class PosterDecorator extends AbstractImageDecorator
{
    /**
     * @inheritDoc
     */
    public function resize($w, $h = -1)
    {
        if (preg_match('/poster\_/', $this->image->getFilename())) {
            return $this->image->getResource();
        }

        return $this->image->resize($w, $h);
    }
}
