<?php

namespace App\Http\Controllers;

use App\Models\Quesion;
use Illuminate\Http\Request;

class QuesionController extends Controller
{
    public function findId($id)
    {
        return Quesion::find($id);
    }

    public function store(Request $request)
    {
        $createData = $request->all();

        if (Quesion::create($createData)) {
            return true;
        }
        return false;
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
