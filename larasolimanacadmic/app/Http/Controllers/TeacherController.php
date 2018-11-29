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
        $this->middleware('superAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /*   ************************* Incu Functions on Teachers *****************************   */

    public function index()
    {
        $teachers = Teacher::all()->where('type_id', 1);

        //send it to the UpdateList of Teacher
        $incusubjects = Incusubject::all();

        $TotalIncuTeachers = Teacher::all()->where('type_id', 1)->count();
        $TotalSalaries = Teacher::all()->where('type_id', 1)->sum('salary');
        $TotalSalaries_done = Teacher::all()->where('type_id', 1)->where('salary_get', 1)->sum('salary');
        $TotalSalaries_not_done = Teacher::all()->where('type_id', 1)->where('salary_get', 0)->sum('salary');

        return view('incu.teacher.index', compact('teachers', 'incusubjects', 'TotalSalaries', 'TotalSalaries_done', 'TotalSalaries_not_done', 'TotalIncuTeachers'));
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
            $Update_Teacher = Teacher::find($request->id);
            $incusubjects = $Update_Teacher->Incusubjects;
            $T_incusubjects_id = $incusubjects->pluck('id');

            //implode change $incusubjects names from array to string
            $T_incusubjects_name = $incusubjects->pluck('name')->implode(',');

            /*$T_incusubjects = $incusubjects->map(function ($incusubject) {
                return $incusubject->only(['id'])->value();
            });*/
            $data = compact('Update_Teacher', 'T_incusubjects_id', 'T_incusubjects_name');
            return Response($data);
        }
    }

    public
    function newUpdateIncuTeacher(Request $request)
    {
        if ($request->ajax()) {
            $nTeacher = Teacher::find($request->id);
            $nTeacher->name = $request->name;
            $nTeacher->phone = $request->phone;
            $nTeacher->salary = $request->salary;
            $nTeacher->salary_get = $request->salary_get;
            $nTeacher->address = $request->address;
            $nTeacher->sex = $request->sex;
            $nTeacher->work_date = $request->work_date;
            $nTeacher->Incusubjects()->sync($request->incusubjects);
            $nTeacher->save();
            return Response($nTeacher);
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

    /* Actions in details of Incu teachers */
    public function changesalarygetto0(Request $request)
    {
        if ($request->ajax()) {
            if ($request->action == 0) {
                Teacher::where('type_id', '=', 1)->update(['salary_get' => 0]);
            }
        }
        return Response($request);
    }
    public function changesalarygetto1(Request $request)
    {
        if ($request->ajax()) {
            if ($request->action == 1) {
                Teacher::where('type_id', '=', 1)->update(['salary_get' => 1]);
            }
        }
        return Response($request);
    }

    /*   ************************* Center Functions on Teachers *****************************   */
    public function indexOfCenterTeachers()
    {
        $teachers = Teacher::all()->where('type_id', 2);

        $TotalIncuTeachers = Teacher::all()->where('type_id', 2)->count();
        $TotalSalaries = Teacher::all()->where('type_id', 2)->sum('salary');
        $TotalSalaries_done = Teacher::all()->where('type_id', 2)->where('salary_get', 1)->sum('salary');
        $TotalSalaries_not_done = Teacher::all()->where('type_id', 2)->where('salary_get', 0)->sum('salary');

        return view('center.teacher.index', compact('teachers', 'TotalSalaries', 'TotalSalaries_done', 'TotalSalaries_not_done', 'TotalIncuTeachers'));
    }
    public function createTeacher()
    {
        return view('center.teacher.create');
    }
    public function storeTeacherOfCenter(Request $request)
    {
        $this->validate($request, [
            //required Student Information
            'name' => 'required | max:100 | string',
            'address' => 'max:100 | string',
            'phone' => 'required | digits:11',
            'sex' => 'required | integer',
            'salary' => 'required',
            'salary_get' => 'required | integer',
            'subject' => 'string',
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
            $teacher->subject = $request->subject;
            $teacher->type_id = 2;
            $teacher->save();
        }
        return response($teacher);

    }
    // Send information to Edit Form of (Center teacher) by ajax and make values of the inputs as the CenterTeacher Information
    //in ajax File style.js
    public function getUpdateCenterTeacher(Request $request)
    {
        if ($request->ajax()) {
            $Update_Teacher = Teacher::find($request->id);
            /*$T_incusubjects = $incusubjects->map(function ($incusubject) {
                return $incusubject->only(['id'])->value();
            });*/
            $data = compact('Update_Teacher');
            return Response($data);
        }
    }

    public
    function newUpdateCenterTeacher(Request $request)
    {
        if ($request->ajax()) {
            $nTeacher = Teacher::find($request->id);
            $nTeacher->name = $request->name;
            $nTeacher->phone = $request->phone;
            $nTeacher->salary = $request->salary;
            $nTeacher->salary_get = $request->salary_get;
            $nTeacher->address = $request->address;
            $nTeacher->sex = $request->sex;
            $nTeacher->work_date = $request->work_date;
            $nTeacher->subject = $request->subject;
            $nTeacher->save();
            return Response($nTeacher);
        }
    }
    public
    function destroyCenterTeacher(Request $request)
    {
        if ($request->ajax()) {
            $teacher = Teacher::find($request->id);
            Teacher::destroy($request->id);
            return Response($teacher);
        }
    }

    /* Actions in details of Center teachers */
    public function changecentersalarygetto0(Request $request)
    {
        if ($request->ajax()) {
            if ($request->action == 0) {
                Teacher::where('type_id', '=', 2)->update(['salary_get' => 0]);
            }
        }
        return Response($request);
    }
    public function changecentersalarygetto1(Request $request)
    {
        if ($request->ajax()) {
            if ($request->action == 1) {
                Teacher::where('type_id', '=', 2)->update(['salary_get' => 1]);
            }
        }
        return Response($request);
    }





}
