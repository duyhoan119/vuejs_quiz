<?php

namespace App\Http\Controllers;

use App\Models\UserQuiz;
use Illuminate\Http\Request;

class UserQuizController extends Controller
{
    public function index(){
        return UserQuiz::query()->select('user_id','quiz_id','quesion_answered','score')->with('quiz')->where('user_id',1)->get();
    }

    public function store(Request $request){
        $data = $request->all();
       return UserQuiz::create($data);
    }
}
