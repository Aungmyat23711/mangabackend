<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use App\Http\Requests\StoreMangaRequest;
use App\Http\Requests\UpdateMangaRequest;
use App\interfaces\MangaInterface;
use Illuminate\Http\Request;

class MangaController extends Controller
{
   protected MangaInterface $mangaInterface;
   public function __construct(MangaInterface $mangaInterface)
   {
     $this->mangaInterface=$mangaInterface;
   }
   public function creatingManga(Request $request)
   {
     return $this->mangaInterface->createManga($request);
   }
   public function fetchingManga()
   {
    return $this->mangaInterface->fetchManga();
   }
   public function fetchingByMangaId($id)
   {
    return $this->mangaInterface->fetchByMangaId($id);
   }
   public function updatingManga(Request $request,$id)
   {
    return $this->mangaInterface->updateManga($request,$id);
   }
   public function deletingManga($id,$image)
   {
    return $this->mangaInterface->deleteManga($image,$id);
   }
   public function fetchingMangaByGenreId($id)
   {
    return $this->mangaInterface->fetchMangaByGenreId($id);
   }
   public function fetchingLatestManga()
   {
    return $this->mangaInterface->fetchLatestManga();
   }
}
