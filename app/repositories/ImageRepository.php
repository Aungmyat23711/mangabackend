<?php
namespace App\repositories;

use App\interfaces\ImageInterface;
use App\Models\MangaImages;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageRepository implements ImageInterface{
    public function createImages($imageDatas,$id){
        if(!File::exists("images/$id"))
        {
            File::makeDirectory("images/$id");
        }
        if(!File::exists("storage/$id"))
        {
            File::makeDirectory("storage/$id");
        }
     foreach($imageDatas->images as $key=>$img)
     {
       
        $img_name=$img->getClientOriginalName();
         $data=new MangaImages();
         $path = $img->storeAs("public/$id", $img_name);
         $store=$img->move("images/$id",$img_name);
         $photoUrl = asset(Storage::url($path));
         $data->episode_id=$id;
         $data->image=$img_name;
         $data->image_path=$photoUrl;
         $data->save();   
     }
     return response(['message'=>'Created Successfully']);
    }
    public function getImageCount($id){
        $data=DB::table('mangas')->join('episodes','mangas.id','episodes.manga_id')
        ->join('mangaimages','episodes.id','mangaimages.episode_id')
        ->select('mangaimages.*')->get();
        return $data;
    }
}