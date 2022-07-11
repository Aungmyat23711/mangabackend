<?php

namespace App\repositories;

use App\interfaces\MangaInterface;
use App\Models\Manga;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class MangaRepository implements MangaInterface{
    public function createManga($manga){
        // if (!is_string($manga->thumbnail)) {
        //     $file = $manga->thumbnail;
        //     $ext = $file->getClientOriginalExtension();
        //     $photo = time() . '.' . $ext;
        //     $path = $file->move('images/posters/',$photo);
        // } else {
        //     $photo = $manga->thumbnail;
        // }
        if (!is_string($manga->thumbnail)) {
            $file = $manga->thumbnail;
            $ext = $file->getClientOriginalExtension();
            $photo = time() . '.' . $ext;
            $path = $file->storeAs('public/mangaposter', $photo);
            $store=$file->move('images/posters/',$photo);
            $photoUrl = asset(Storage::url($path));
        } else {
            $photoUrl = $manga->thumbnail;
        }
        
        $data = new Manga();
        $data->author_name=$manga->author_name;
        $data->name=$manga->name;
        $data->genre_id=$manga->genre_id;
        $data->release_date=$manga->release_date;
        $data->description=$manga->description;
        $data->thumbnail_path=$photoUrl;
        $data->thumbnail=$photo;
        $data->publish_status=true;
        $data->save();
        return response(['message'=>'Manga Created Successfully']);
    }
    public function fetchManga()
    {
        // $data=DB::table('mangas')->orderBy('id','desc')->paginate(request('page')=='undefined' ? 1000:5);
        if(request('search')=='undefined' || request('search')=='null'){
            $data=DB::table('mangas')->orderBy('id','desc')->paginate(request('page')=='undefined' ? 1000:6);
        }else{

            $data=DB::table('mangas')->when(request('search'),function($query){
                $query->where('name','like','%'.request('search').'%')->get();
            })->orderBy('id','desc')->paginate(request('page')=='undefined' ? 1000:6);
        }
        return $data;
    }
    public function fetchByMangaId($id)
    {
        $data=Manga::where('id',$id)->get();
        return $data;
    }
    public function updateManga($manga,$id)
    {
        if (!is_string($manga->thumbnail)) {
            File::delete("images/posters/$manga->current_thumbnail");
            File::delete("storage/mangaposter/$manga->current_thumbnail");
            $file = $manga->thumbnail;
            $ext = $file->getClientOriginalExtension();
            $photo = time() . '.' . $ext;
            $path = $file->storeAs('public/mangaposter', $photo);
            $store=$file->move('images/posters/',$photo);
            $photoUrl = asset(Storage::url($path));
        } else {
            $photoUrl = $manga->current_thumbnail_path;
            $photo=$manga->current_thumbnail;
        }
        
        $data=Manga::find($id);
        $data->author_name=$manga->author_name;
        $data->name=$manga->name;
        $data->genre_id=$manga->genre_id;
        $data->release_date=$manga->release_date;
        $data->description=$manga->description;
        $data->thumbnail_path=$photoUrl;
        $data->thumbnail=$photo;
        $data->publish_status=true;
        $data->save();
        return response(['message'=>'Manga Updated Successfully']);
    }
    public function deleteManga($image,$id)
    {
        $data=Manga::find($id);
        $data->delete();
        File::delete("images/posters/$image");
        File::delete("storage/mangaposter/$image");
        return response(['message'=>'Manga Deleted Successfully']);
    }
    public function fetchMangaByGenreId($id)
    {
        $data=DB::table('mangas')->join('genres','mangas.genre_id','genres.id')
        ->where("genres.id",$id)
        ->select("mangas.*")
        ->orderBy("id","desc")->get();
        return $data;
    }
    public function fetchLatestManga()
    {
        $data=DB::table('mangas')->orderBy('release_date','desc')->paginate(6);
        return $data;
    }
}