<?php

namespace App\Http\Controllers;

use App\Incusubject;
use Illuminate\Http\Request;

class IncusubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('superAdmin');
    }

    public function index()
    {
        $Incu_Subjects = Incusubject::all();
        return view('incu.incusubject.index',compact('Incu_Subjects'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            //required incusubject Information
            'name' => 'required | max:20 | string',
            'code' => 'nullable |max:15']);
        $incusubject = new Incusubject();
        if ($request->ajax()) {
            $incusubject->name = $request->name;
            if ($request->code != null) {
                $incusubject->code = $request->code;
            }
            $incusubject->save();
        }
        return Response($incusubject);
    }

    public function show($id)
    {
        //
    }


    public function edit($id, Request $request)
    {
        $IncuSubject = new Incusubject();
        if($request->ajax()) {
            $IncuSubject = Incusubject::find($id);
        }
        return Response($IncuSubject);
    }
    public function update($id, Request $request){

    }
    public function newUpdateSubject(Request $request)
    {
        $NewIncuSubject = Incusubject::find($request->id);
        if ($request->ajax()){
            $NewIncuSubject->name = $request->name;
            $NewIncuSubject->code = $request->code;
            $NewIncuSubject->save();
        }
        return Response($NewIncuSubject);
    }

    public function destroy($id, Request $request)
    {
        if ($request->ajax()) {
            $Incu_Subject = Incusubject::find($id);
            Incusubject::destroy($id);
            return Response($Incu_Subject);
        }
    }
}
