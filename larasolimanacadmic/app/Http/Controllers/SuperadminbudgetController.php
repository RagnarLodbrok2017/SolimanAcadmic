<?php

namespace App\Http\Controllers;

use App\Superadminbudget;
use App\Type;
use App\User;
use Auth;
use Illuminate\Http\Request;

class SuperadminbudgetController extends Controller
{
    public function __construct()
    {
        $this->middleware('superAdmin');
    }

    public function index()
    {
        $types = Type::all();
        $budgets = Superadminbudget::all();
        if ($budgets != null){
            $Total_Budgets_Count = $budgets->count();
            $Total_Budgets_Salary = 0;
            $Total_Budget_Count_Type1 = 0;
            $Total_Budget_Count_Type2 = 0;
            $Total_Budget_Count_Type3 = 0;
            $Total_Budget_Count_Type4 = 0;
            $Total_Budget_Count_Type5 = 0;
            $Total_Budget_Salary_Type1 = 0;
            $Total_Budget_Salary_Type2 = 0;
            $Total_Budget_Salary_Type3 = 0;
            $Total_Budget_Salary_Type4 = 0;
            $Total_Budget_Salary_Type5 = 0;
            foreach ($budgets as $budget){
                $Total_Budgets_Salary = $Total_Budgets_Salary + $budget->salary;
                if ($budget->type_id == 1){
                    $Total_Budget_Count_Type1 ++;
                    $Total_Budget_Salary_Type1 = $Total_Budget_Salary_Type1 + $budget->salary;
                }
                elseif ($budget->type_id == 2){
                    $Total_Budget_Count_Type2 ++;
                    $Total_Budget_Salary_Type2 = $Total_Budget_Salary_Type2 + $budget->salary;
                }
                elseif ($budget->type_id == 3){
                    $Total_Budget_Count_Type3 ++;
                    $Total_Budget_Salary_Type3 = $Total_Budget_Salary_Type3 + $budget->salary;
                }
                elseif ($budget->type_id == 4){
                    $Total_Budget_Count_Type4 ++;
                    $Total_Budget_Salary_Type4 = $Total_Budget_Salary_Type4 + $budget->salary;
                }
                elseif ($budget->type_id == 5){
                    $Total_Budget_Count_Type5 ++;
                    $Total_Budget_Salary_Type5 = $Total_Budget_Salary_Type5 + $budget->salary;
                }
            }
        }
/*       $totalBudgetCounts = $budgets->count();
        $totalBudgetSalary = 0;
        //Details
        //Total Count and salary Of all Budgets
        foreach ($budgets as $budget){
            $salary = $budget->salary;
            $totalBudgetSalary = $totalBudgetSalary + $salary;
        }
        //Count and salary of budgets that has type_id = 1
        $budgetsIn_Type1_Counts = Superadminbudget::where('type_id',1)->get();
        $BudgetSalaryOfType1 = 0;
        foreach ($budgetsIn_Type1_Counts as $budgetsIn_Type1_Count){
            $salary1 = $budgetsIn_Type1_Count->salary;
            $BudgetSalaryOfType1 = $BudgetSalaryOfType1 + $salary1;
        }
        //Count and salary of budgets that has type_id = 2
        $budgetsIn_Type2_Counts = Superadminbudget::where('type_id',2)->get();
        $BudgetSalaryOfType2 = 0;
        foreach ($budgetsIn_Type2_Counts as $budgetsIn_Type2_Count){
            $salary2 = $budgetsIn_Type2_Count->salary;
            $BudgetSalaryOfType2 = $BudgetSalaryOfType2 + $salary2;
        }
        //Count and salary of budgets that has type_id = 3
        $budgetsIn_Type3_Counts = Superadminbudget::where('type_id',3)->get();
        $BudgetSalaryOfType3 = 0;
        foreach ($budgetsIn_Type3_Counts as $budgetsIn_Type3_Count){
            $salary3 = $budgetsIn_Type3_Count->salary;
            $BudgetSalaryOfType3 = $BudgetSalaryOfType3 + $salary3;
        }
        //Count and salary of budgets that has type_id = 4
        $budgetsIn_Type4_Counts = Superadminbudget::where('type_id',4)->get();
        $BudgetSalaryOfType4 = 0;
        foreach ($budgetsIn_Type4_Counts as $budgetsIn_Type4_Count){
            $salary4 = $budgetsIn_Type4_Count->salary;
            $BudgetSalaryOfType4 = $BudgetSalaryOfType4 + $salary4;
        }
        //Count and salary of budgets that has type_id = 5
        $budgetsIn_Type5_Counts = Superadminbudget::where('type_id',5)->get();
        $BudgetSalaryOfType5 = 0;
        foreach ($budgetsIn_Type5_Counts as $budgetsIn_Type5_Count){
            $salary5 = $budgetsIn_Type5_Count->salary;
            $BudgetSalaryOfType5 = $BudgetSalaryOfType5 + $salary5;
        }*/

        return view('incu.budget.index', compact('types','budgets','Total_Budgets_Count','Total_Budgets_Salary','Total_Budget_Count_Type1','Total_Budget_Salary_Type1'
            ,'Total_Budget_Count_Type2','Total_Budget_Salary_Type2','Total_Budget_Count_Type3','Total_Budget_Salary_Type3'
            ,'Total_Budget_Count_Type4','Total_Budget_Salary_Type4','Total_Budget_Count_Type5','Total_Budget_Salary_Type5'
        ));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $budget = new Superadminbudget();
        if ($request->ajax()){
            $budget->salary = $request->salary;
            if ($request->description !== null) {
                $budget->description = $request->description;
            }
            $budget->type_id = $request->type_id;
            $budget->day = $request->day;
            $budget->user_id = Auth::user()->getId();
            $budget->save();
            return Response($budget);
        }
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
    public function edit($id ,Request $request)
    {
        $Budget = new Superadminbudget();
        if($request->ajax()) {
            $Budget = Superadminbudget::find($id);
        }
        return Response($Budget);

    }


    public function newUpdateBudget(Request $request)
    {
        $Budget = Superadminbudget::find($request->id);
        if ($request->ajax()){
            $Budget->salary = $request->salary;
            $Budget->type_id = $request->type_id;
            $Budget->description = $request->description;
            $Budget->save();
        }
        return Response($Budget);
    }


    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        if ($request->ajax()) {
            $Budget = Superadminbudget::find($id);
            Superadminbudget::destroy($id);
            return Response($Budget);
        }
    }
}
