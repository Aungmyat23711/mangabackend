<?php
namespace App\interfaces;

interface EpisodeInterface{
    public function createEpisode($episode);
    public function fetchEpisode($id);
    public function deleteEpisode($id);
}