<?php 
namespace App\repositories;

use App\interfaces\FeedbackInterface;
use App\Models\Feedback;
use Illuminate\Support\Facades\DB;

class FeedbackRepository implements FeedbackInterface{
    public function addFeedback($feedback,$mangaId,$userId)
    {
        $data=new Feedback();
        $data->description=$feedback->description;
        $data->user_id=$userId;
        $data->manga_id=$mangaId;
        $data->save();
        return response(['message'=>'Thanks for feedback']);
    }
    public function getFeedback()
    {
        $data=DB::table('feedbacks')->join('auths','feedbacks.user_id','auths.id')->select('feedbacks.*','auths.*')->get();
        return $data;
    }
}