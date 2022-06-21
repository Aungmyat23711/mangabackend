<?php
 namespace App\repositories;

 use App\interfaces\GenreInterface;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;

 class GenreRepository implements GenreInterface{
   public function createGenre($genre){
      $data=new Genre();
      $data->name=$genre->genre;
      $data->save();
      return response(['message'=>'Genre Created Successfully']);
   }
   public function fetchGenre(){
    $data=DB::table('genres')->orderBy('id','desc')->paginate(request('page')=='undefined' ? 1000:5);
    return $data;
   }
   public function updateGenre($genre, $id)
   {
     $data=Genre::find($id);
     $data->name=$genre->genre;
     $data->save();
     return response(['message'=>'Genre Updated Successfully']);
   }
   public function deleteGenre($id)
   {
    $data=Genre::find($id);
    $data->delete();
    return response(['message'=>'Genre Deleted Successfully']);
   }
 }