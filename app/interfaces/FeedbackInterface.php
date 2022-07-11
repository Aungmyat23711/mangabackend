<?php
namespace App\interfaces;

interface FeedbackInterface{
    public function addFeedback($feedback,$mangaId,$userId);
    public function getFeedback();
}

