<?php
namespace App\interfaces;

interface MangaInterface{
    public function createManga($manga);
    public function fetchManga();
    public function fetchByMangaId($id);
    public function updateManga($manga,$id);
    public function deleteManga($image,$id);
    public function fetchMangaByGenreId($id);
    public function fetchLatestManga();
}