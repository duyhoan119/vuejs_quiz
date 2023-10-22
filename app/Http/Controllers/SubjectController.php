<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function getAll()
    {
        return Subject::all();
    }

    public function findId($id)
    {
        return Subject::find($id);
    }

    public function store(Request $request)
    {
        $createData = $request->all();

        if (Subject::create($createData)) {
            return true;
        }
        return false;
    }

    public function save(Request $request, int $id)
    {
        $saveData = $request->all();
        $subject = $this->findId($id);
        if ($subject->update($saveData)) {
            return true;
        }
        return false;
    }

    public function destroy($id)
    {
        if (Subject::destroy($id)) {
            return true;
        }
        return false;
    }
}
