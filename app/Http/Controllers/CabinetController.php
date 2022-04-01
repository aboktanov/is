<?php

namespace App\Http\Controllers;

use App\Models\FeedBack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CabinetController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public static function index()
    {
        $feedbacks= FeedBack::where('user_id', Auth::id())->get();
        return view('cabinet', ['feedbacks'=>$feedbacks]);
    }

    public function feedbackStore(Request $request){

        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'phone' => ['required', 'string', 'min:11'],
            'feedback_text' => ['required', 'string', 'min:10'],
        ], [] , ['name'=>'Имя', 'phone'=>'Телефон', 'feedback_text'=>'Сообщение']);

        $file_attach=$request->file_attach;
        if($file_attach) {
            $fileContent = $file_attach->openFile()->fread($file_attach->getSize());
            $fileName = $file_attach->getClientOriginalName();
        }
        else{
            $fileContent=null;
            $fileName=null;
        }
        $feedback = new FeedBack();
        $feedback->user_id = Auth::id();

        $feedback->name = $request->name;
        $feedback->phone = $request->phone;
        $feedback->company = $request->company;
        $feedback->feedback_title = $request->feedback_title;
        $feedback->feedback_text = $request->feedback_text;

        $feedback->file_name = $fileName;
        $feedback->file_content = $fileContent;

        $feedback->save();

        $feedbacks= FeedBack::where('user_id', Auth::id())->get();
        return view('cabinet', ['success'=>true, 'feedbacks'=>$feedbacks]);
    }
}
