<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use App\interfaces\GenreInterface;
use Illuminate\Http\Request;

class GenreController extends Controller
{
   protected GenreInterface $genreInterface;
   public function __construct(GenreInterface $genreInterface)
   {
      $this->genreInterface=$genreInterface;
   }
   public function creatingGenre(Request $request)
   {
    return $this->genreInterface->createGenre($request);
   }
   public function fetchingGenre()
   {
    return $this->genreInterface->fetchGenre();
   }
   public function updatingGenre(Request $request,$id)
   {
      return $this->genreInterface->updateGenre($request,$id);
   }
   public function deleteGenre($id)
   {
      return $this->genreInterface->deleteGenre($id);
   }
}
