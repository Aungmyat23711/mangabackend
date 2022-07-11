<?php

namespace App\Http\Controllers;

use App\Models\MangaImages;
use App\Http\Requests\StoreMangaImagesRequest;
use App\Http\Requests\UpdateMangaImagesRequest;
use App\interfaces\ImageInterface;

class MangaImagesController extends Controller
{
    protected ImageInterface $imageInterface;
    public function __construct(ImageInterface $imageInterface)
    {
        $this->imageInterface=$imageInterface;
    }
    public function creatingImages(StoreMangaImagesRequest $request,$id)
    {
        return $this->imageInterface->createImages($request,$id);
    }
    public function gettingImageCount($id)
    {
        return $this->imageInterface->getImageCount($id);
    }
}
