<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Http\Requests\StoreEpisodeRequest;
use App\Http\Requests\UpdateEpisodeRequest;
use App\interfaces\EpisodeInterface;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    protected EpisodeInterface $episodeInterface;
    public function __construct(EpisodeInterface $episodeInterface)
    {
        $this->episodeInterface=$episodeInterface;
    }
    public function creatingEpisode(StoreEpisodeRequest $request)
    {
       return $this->episodeInterface->createEpisode($request);
    }
    public function fetchingEpisode($id)
    {
        return $this->episodeInterface->fetchEpisode($id);
    }
    public function deletingEpisode($id)
    {
        return $this->episodeInterface->deleteEpisode($id);
    }
}
