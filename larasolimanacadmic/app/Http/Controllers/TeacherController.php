<?php

namespace App\Http\Controllers;

use App\Status;
use App\Teacher;
use App\Incusubject;
use App\Student;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all()->where('type_id', 1);
        return view('incu.teacher.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $incusubjects = Incusubject::all();
        return view('incu.teacher.create', compact('incusubjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate( $request, [
        //required Student Information
        'name' => 'required | max:100 | string',
        'address' => 'max:100 | string',
        'phone' => 'required | digits:11',
        'sex' => 'required | integer',
        'salary' => 'required',
        'salary_get' => 'required | integer',
        'incusubjects' => 'required',
    ]);
        $teacher = new Teacher();
        if ($request->ajax()){
            $teacher->name = $request->name;
            if ($request->address != null)
            {
                $teacher->address = $request->address;
            }
            $teacher->phone = $request->phone;
            $teacher->sex = $request->sex;
            $teacher->salary = $request->salary;
            $teacher->salary_get = $request->salary_get;
            $teacher->type_id = 1;
            $teacher->save();
            $teacher->Incusubjects()->attach($request->incusubjects);
        }
        return response($teacher);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
