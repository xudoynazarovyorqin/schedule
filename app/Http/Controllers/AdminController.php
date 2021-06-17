<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Subject;


class AdminController extends Controller
{
    public function teacher()
    {
        $teachers = Teacher::all();
        return view('admin.teacher', compact('teachers'));
    }
    public function addTeacher()
    {
        $subjects = Subject::all();
        return view('admin.add-teacher',compact('subjects'));
    }
    public function addTeacherPost(Request $request)
    {
        Teacher::create([
            'name'=>$request->name,
            'surname'=>$request->surname,
            'subject'=>$request->subject
        ]);
        return redirect()->route('admin-teacher');
        // return view('admin.add-tea cher');
    }
    public function editTeacher(Request $request, $id)
    {
        $teacher = Teacher::where('id', $id)->first();
        $subjects = Subject::all();
        return view('admin.update-teacher', compact('teacher','subjects'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $teacher = Teacher::find($id);
        $teacher ->update($data);
        return redirect()->route('admin-teacher');
    }
    public function destroyTeacher($id)
    {
        Teacher::find($id)->delete();
        // $data->destroy();
        return redirect()->route('admin-teacher');


    }
}
