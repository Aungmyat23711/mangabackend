<?php
namespace App\repositories;

use App\interfaces\EpisodeInterface;
use App\Models\Episode;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class EpisodeRepository implements EpisodeInterface{
    public function createEpisode($episode)
    {
        // if(!File::exists("images/$episode->mangaId"))
        // {
        //     File::makeDirectory("images/$episode->mangaId");
        // }
        // if(!File::exists("storage/$episode->mangaId"))
        // {
        //     File::makeDirectory("storage/$episode->mangaId");
        // }
        $data=new Episode();
        $data->name=$episode->name;
        $data->manga_id=$episode->mangaId;
        $data->save();
        
    }
    public function fetchEpisode($id)
    {
        $data=Episode::orderByRaw('LENGTH(name) desc ')->orderBy("name",'desc')->where('manga_id',$id)->get();
        return $data;
    }
    public function deleteEpisode($id)
    {
        $data=Episode::find($id);
        $data->delete();
        return response(['message'=>'Episode Deleted Successfully']);
    }
}