<?php

namespace App\repositories;

use App\interfaces\MangaInterface;
use App\Models\Manga;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MangaRepository implements MangaInterface{
    public function createManga($manga){
        if (!is_string($manga->thumbnail)) {
            $file = $manga->thumbnail;
            $ext = $file->getClientOriginalExtension();
            $photo = time() . '.' . $ext;
            $path = $file->storeAs('public/mangaposter', $photo);
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
        $data->thumbnail=$photoUrl;
        $data->publish_status=true;
        $data->save();
    }
    public function fetchManga()
    {
        $data=DB::table('mangas')->orderBy('id','desc')->paginate(request('page')=='undefined' ? 1000:5);
        return $data;
    }
}