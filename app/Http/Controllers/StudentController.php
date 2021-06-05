<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    function main(){
        return view('student.main');
    }
    function create(){
        return view('student.create');
    }
    function save(Request $request){
        $request->validate([
            'name'=>'required|min:3',
            'surname'=>'required',
            'department'=>'required'
        ]);

        $student= new Student();
        $student->name=$request->name;
        $student->surname=$request->surname;
        $student->department=$request->department;
        $save=$student->save();

        if($save){
            return back()->with('success','Student created succesfully');
        }
        else{
            return back()->with('fail','Fail. Try again.');
        }
    }
}
