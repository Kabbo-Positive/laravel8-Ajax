<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return view('teacher.index');
    }
    //------- All Data ----//
    public function allData()
    {
        $data = Teacher::orderBy('id','DESC')->get();
        return response()->json($data);
    }

    //------- Store Data ----//
    public function storeData(Request $request)
    {
        $data = Teacher::insert([
            'name' => $request->name,
            'title' => $request->title,
            'institute' => $request->institute
        ]);
        return response()->json($data);
    }
}
