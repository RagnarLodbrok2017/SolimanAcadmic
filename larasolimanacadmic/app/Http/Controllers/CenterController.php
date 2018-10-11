<?php

namespace App\Http\Controllers;

use App\Student;
use App\Superadminbudget;
use App\Teacher;
use Illuminate\Http\Request;

class CenterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numberOfStudents = Student::all()->where('type_id', 2 )->count();
        $numberOfTeachers = Teacher::all()->where('type_id', 2 )->count();
        $students = Student::all()->where('type_id', 2 );
        $allPayments = $students->map(function ($student) {
            return $student->payment->price;
        });
        $totalPayments = $allPayments->sum();
        $budgets = Superadminbudget::all()->where('type_id', 2);
        $allBudgets =$budgets->map(function ($budget){
            return $budget->salary;
        });
        $totalBudgets = $allBudgets->sum();
        return view('center.center',compact('numberOfStudents','numberOfTeachers','totalPayments','totalBudgets'));
    }
}
