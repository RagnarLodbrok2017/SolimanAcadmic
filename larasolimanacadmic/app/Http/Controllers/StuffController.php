<?php

namespace App\Http\Controllers;

use App\Stuff;
use App\Type;
use Illuminate\Http\Request;

class StuffController extends Controller
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
    public function index()
    {
        $stuffs = Stuff::all();

        //send it to the UpdateList of Teacher
        $types = Type::all();

        $TotalStuffs = Stuff::all()->count();
        $TotalSalaries = Stuff::all()->sum('salary');
        $TotalSalaries_done = Stuff::all()->where('salary_get', 1)->sum('salary');
        $TotalSalaries_not_done = Stuff::all()->where('salary_get', 0)->sum('salary');

        return view('incu.stuff.index', compact('stuffs', 'types', 'TotalSalaries', 'TotalSalaries_done', 'TotalSalaries_not_done', 'TotalStuffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('incu.stuff.create', compact('types'));
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
            'name' => 'required | max:150 | string',
            'job' => 'max:100 | string',
            'phone' => 'required | digits:11',
            'shift' => 'required',
            'salary' => 'required',
            'salary_get' => 'required | integer',
            'types' => 'required',
        ]);
        $stuff = new Stuff();
        if ($request->ajax()) {
            $stuff->name = $request->name;
            $stuff->job = $request->job;
            $stuff->phone = $request->phone;
            $stuff->shift = $request->shift;
            $stuff->salary = $request->salary;
            $stuff->salary_get = $request->salary_get;
            $stuff->work_date = $request->work_date;
            $stuff->save();
            $stuff->types()->attach($request->types);
        }
        return response($stuff);

    }
    // Send information to Edit Form of (Incu teacher) by ajax and make values of the inputs as the Incustudent Information
    //in ajax File style.js
    public function getUpdateStuff(Request $request)
    {
        if ($request->ajax()) {
            $stuff = Stuff::find($request->id);
            $types = $stuff->types;
            $types_ids = $types->pluck('id');

            //implode change $types names from array to string
            $types_names = $types->pluck('name')->implode(',');

            $data = compact('stuff', 'types_ids', 'types_names');
            return Response($data);
        }
    }

    public
    function newUpdateStuff(Request $request)
    {
        if ($request->ajax()) {
            $stuff = Stuff::find($request->id);
            $stuff->name = $request->name;
            $stuff->phone = $request->phone;
            $stuff->salary = $request->salary;
            $stuff->salary_get = $request->salary_get;
            $stuff->job = $request->job;
            $stuff->shift = $request->shift;
            $stuff->work_date = $request->work_date;
            $stuff->types()->sync($request->types);
            $stuff->save();
            return Response($stuff);
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
            $stuff = Stuff::find($id);
            Stuff::destroy($id);
            $stuff->types()->detach($request->types);
            return Response($stuff);
        }

    }

    /* Actions in details of Incu teachers */
    public function changesalarygetto0stuff(Request $request)
    {
        if ($request->ajax()) {
            if ($request->action == 0) {
                $stuffs = Stuff::all();
                $stuffs->each(function ($item) {
                    $item->update(['salary_get'=>0]);
                });
            }
        }
        return Response($request);
    }
    public function changesalarygetto1stuff(Request $request)
    {
        if ($request->ajax()) {
            if ($request->action == 1) {
                $stuffs = Stuff::all();
                $stuffs->each(function ($item) {
                    $item->update(['salary_get'=>1]);
                });
            }
        }
        return Response($request);
    }
}
