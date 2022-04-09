<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use InterventionImage;


class ImageService
{
    public static function upload($imageFile, $folderName)
    {
        $fileName = uniqid(rand() . '_');
        $extension = $imageFile->extension();
        $fileNameToTag = $fileName . '.' . $extension;
        $resizedImage = InterventionImage::make($imageFile)->resize(256, 256)->encode();
        Storage::put('public/' . $folderName . '/' . $fileNameToTag, $resizedImage);

        return $fileNameToTag;
    }
}
