<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Subject;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function getAll()
    {
        return Quiz::query()->with(['quesion', 'subject'])->get();
    }

    public function findId($id)
    {
        return Quiz::query()->with(['quesion', 'quesion.answer'])->where('id', $id)->first();
    }
    public function findBySubjectId($id)
    {
        return Quiz::query()->select('id', 'subject_id','name')->with('subject')->where('subject_id', $id)->get();
    }
    public function store(Request $request)
    {
        $createData = $request->all();

        if (Quiz::create($createData)) {
            return true;
        }
        return false;
    }

    public function save(Request $request, int $id)
    {
        $saveData = $request->all();
        $quiz = $this->findId($id);
        if ($quiz->update($saveData)) {
            return true;
        }
        return false;
    }

    public function destroy($id)
    {
        if (Quiz::destroy($id)) {
            return true;
        }
        return false;
    }
}
