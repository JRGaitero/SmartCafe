<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Student::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student();

        $student->name = $request->name;
        $student->surname = $request->surname;
        $student->course = $request->course;
        $student->birthday = $request->birthday;
        $student->school_id = $request->school_id;
        $student->user_id = auth()->user()->id;

        $student->save();
        return $student->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Student::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        if ($request->name) {
            $student->name = $request->name;
        }
        if ($request->surname) {
            $student->surname = $request->surname;
        }
        if ($request->course) {
            $student->course = $request->course;
        }
        if ($request->birthday) {
            $student->birthday = $request->birthday;
        }
        if ($request->school_id) {
            $student->school_id = $request->school_id;
        }

        $student->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::destroy($id);
        return $student;
    }
}
