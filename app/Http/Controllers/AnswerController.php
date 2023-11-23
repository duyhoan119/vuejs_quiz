<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index()
    {
        return Answer::query()->select(['id','quesion_id','content','is_corect'])->with('quesion')->get();
    }
    public function findId($id)
    {
        return Answer::find($id);
    }

    public function store(Request $request)
    {
        $createData = $request->all();

        if (Answer::create($createData)) {
            return json_decode('tao thanh cong');
        }
        return json_decode('tao that bai');
    }

    public function save(Request $request, int $id)
    {
        $saveData = $request->all();
        $answer = $this->findId($id);
        if ($answer->update($saveData)) {
            return true;
        }
        return false;
    }

    public function destroy($id)
    {
        if (Answer::destroy($id)) {
            return true;
        }
        return false;
    }
}
