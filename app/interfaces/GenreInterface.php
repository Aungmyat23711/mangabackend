<?php
namespace App\interfaces;
interface GenreInterface{
    public function createGenre($genre);
    public function fetchGenre();
    public function updateGenre($genre,$id);
    public function deleteGenre($id);
}