<?php
namespace App\interfaces;

interface ImageInterface {
    public function createImages($imageData,$id);
    public function getImageCount($id);
}