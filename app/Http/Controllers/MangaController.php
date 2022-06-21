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
}
