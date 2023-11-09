<?php

namespace App\Http\Controllers;

use App\Models\UserQuiz;
use Illuminate\Http\Request;

class UserQuizController extends Controller
{
    public function index(){
        return 'getall';
    }

    public function store(Request $request){
        $data = $request->all();
        // dd($request);
       return UserQuiz::create($data);
    }
}
