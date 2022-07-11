<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\interfaces\FeedbackInterface;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
   protected FeedbackInterface $feedbackInterface;
   public function __construct(FeedbackInterface $feedbackInterface)
   {
      $this->feedbackInterface=$feedbackInterface;
   }
   public function addingFeedback(Request $request,$mangaId,$userId)
   {
      return $this->sendFeedback($request,$mangaId,$userId);
   }
   public function gettingFeedback()
   {
      return $this->feedbackInterface->getFeedback();
   }
}
