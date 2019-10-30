<?php
namespace src;

use src\Image\AbstractImage;
use src\Image\ImageJpeg;
use src\Image\ImagePng;

class ImageFactory
{
    /**
     * @param $filename
     *
     * @return AbstractImage
     * @throws \InvalidArgumentException
     */
    public static function create($filename)
    {
        switch (exif_imagetype($filename)) {
            case IMAGETYPE_JPEG:
            case IMAGETYPE_JPEG2000:
            case IMAGETYPE_JPC:
            case IMAGETYPE_JP2:
            case IMAGETYPE_JPX:
                return ImageJpeg::createFromFilename($filename);
            case IMAGETYPE_PNG:
                return ImagePng::createFromFilename($filename);
            default:
                throw new \InvalidArgumentException('Unsupported file type');
        }
    }
}
