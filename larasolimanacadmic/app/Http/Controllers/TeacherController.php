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
        return view('incu.teacher.index', compact('teachers'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
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
        if ($request->ajax()) {
            $teacher->name = $request->name;
            if ($request->address != null) {
                $teacher->address = $request->address;
            }
            $teacher->phone = $request->phone;
            $teacher->sex = $request->sex;
            $teacher->salary = $request->salary;
            $teacher->salary_get = $request->salary_get;
            $teacher->work_date = $request->work_date;
            $teacher->type_id = 1;
            $teacher->save();
            $teacher->Incusubjects()->attach($request->incusubjects);
        }
        return response($teacher);

    }
    // Send information to Edit Form of (Incu teacher) by ajax and make values of the inputs as the Incustudent Information
    //in ajax File style.js
    public function getUpdateIncuTeacher(Request $request)
    {
        if ($request->ajax()) {
            $Update_Student = Student::find($request->id);
            $Update_Statuses = Status::all();
            $Update_Classes = Classroom::all();
            $Update_Shifts = Shift::all();
            $Update_Payment = Payment::where('student_id', $request->id)->first();
            //$payments = Payment::all();
            $data = compact('Update_Student', 'Update_Statuses', 'Update_Classes', 'Update_Shifts', 'Update_Payment');
            return Response($data);
        }
    }

    public
    function newUpdateIncuTeacher(Request $request)
    {
        if ($request->ajax()) {
            $nStudent = Student::find($request->id);
            /**
             * @var $nStudent App\Student
             * @var $nPayment App\Payment
             */
            $nStudent->first_name = $request->first_name;
            $nStudent->middle_name = $request->middle_name;
            $nStudent->last_name = $request->last_name;
            $nStudent->phone = $request->phone;
            $nStudent->status_id = $request->status_id;
            $nStudent->shift_id = $request->shift_id;
            $nStudent->classroom_id = $request->classroom_id;

            //update new price
            $nPayment = Payment::find($request->payment_id);
            $nPayment->price = $request->payment;

            //update new Parent
            $nParent = Parents::find($nStudent->parents_id);
            $nParent->father_name = $request->middle_name . ' ' . $request->last_name;

            $nStudent->save();
            $nPayment->save();
            $nParent->save();
            return Response($nStudent);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id, Request $request)
    {
        if ($request->ajax()) {
            $teacher = Teacher::find($id);
            Teacher::destroy($id);
            $teacher->Incusubjects()->detach($request->incusubjects);
            return Response($teacher);
        }

    }
}
