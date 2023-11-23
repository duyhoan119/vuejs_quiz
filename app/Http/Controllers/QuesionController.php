<?php

namespace App\Http\Controllers;

use App\Models\Quesion;
use Illuminate\Http\Request;

class QuesionController extends Controller
{
    public function index()
    {
        return Quesion::query()->select(['id', 'quiz_id', 'content', 'point'])->with('quiz')->get();
    }

    public function findId($id)
    {
        return Quesion::find($id);
    }

    public function findByQuizId($id)
    {
        return Quesion::query()->select('id', 'quiz_id', 'content', 'point')->with('quiz')->where('quiz_id', $id)->get();
    }

    public function findByQuizedId($id)
    {
        return Quesion::query()->select('id', 'quiz_id', 'content', 'point')->with('answer')->where('quiz_id', $id)->get();
    }

    public function store(Request $request)
    {
        $createData = $request->all();

        if (Quesion::create($createData)) {
            return json_decode('tao thanh cong');
        }
        return json_decode('taoj that bai');
    }

    public function save(Request $request, int $id)
    {
        $saveData = $request->all();
        $quesion = $this->findId($id);
        if ($quesion->update($saveData)) {
            return true;
        }
        return false;
    }

    public function destroy($id)
    {
        if (Quesion::destroy($id)) {
            return true;
        }
        return false;
    }
}
