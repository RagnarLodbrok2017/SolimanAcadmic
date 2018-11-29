<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Exports\CenterStudentExport;
use App\Exports\IncuStudentExport;
use App\Level;
use App\Parents;
use App\Shift;
use App\Stage;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Student;
use App\Status;
use App\Payment;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('superAdmin')->except(['downloadIncuStudents','downloadCenterStudents']);
    }

    public function debug_to_console($data)
    {
        if (is_array($data))
            $output = "<script>console.log( 'Debug Objects: " . implode(',', $data) . "' );</script>";
        else
            $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
        echo $output;
    }

    //show all Incustudents and there Information
    public function index()
    {
        $students = Student::all()->where('type_id', 1);
        $statuss = Status::all();
        $classes = Classroom::all();
        $levels = Level::all();
        $shifts = Shift::all();
        //total payment
        $Total_Payment = 0;
        foreach ($students as $student) {
            $payment = $student->payment->price;
            $Total_Payment = $Total_Payment + $payment;
        }
        //number of student that price = 0
        $Total_Students_Payment_Zero = 0;
        foreach ($students as $student) {
            if ($student->payment->price == 0) {
                $Total_Students_Payment_Zero++;
            }
        }
        //number of student that price > 0
        $Total_Students_Payment_Not_Zero = 0;
        foreach ($students as $student) {
            if ($student->payment->price !== 0) {
                $Total_Students_Payment_Not_Zero++;
            }
        }
        //number of student that the father or mother is dead > 0
        $Total_Students_Parents_Dead = 0;
        foreach ($students as $student) {
            if ($student->status_id !== 1) {
                $Total_Students_Parents_Dead++;
            }
        }

        return view('incu.incustudent.index', compact('students', 'statuss', 'classes', 'levels', 'shifts',
            'Total_Payment', 'Total_Students_Payment_Zero', 'Total_Students_Payment_Not_Zero', 'Total_Students_Parents_Dead'));
    }


    public function create()
    {
        $statuss = Status::all();
        $classes = Classroom::all();
        $levels = Level::all();
        $shifts = Shift::all();
        //$payment = Payment::all();
        return view('incu.incustudent.create', compact('statuss', 'classes', 'levels', 'shifts'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            //required Student Information
            'first_name' => 'required | max:15 | string',
            'middle_name' => 'required | max:15 | string',
            'last_name' => 'required | max:15 | string',
            'address' => 'required | max:80 | string',
            'phone' => 'required | digits:11',
            'sex' => 'required | integer',
            'dob' => 'required |date',
            'status_id' => 'required | integer',
            'classroom_id' => 'required | integer',
            'level_id' => 'required | integer',
            'shift_id' => 'required | integer',
            'payment' => 'required | integer | digits_between:0,5',
            //Parents Information
            'FPhone' => 'nullable |integer | digits:11',
            'LPhone' => 'nullable |integer | digits:11',
            'father_name' => 'nullable | max:15 | string',
            'mother_name' => 'nullable | max:15 | string',
            'job' => 'nullable | max:25 | string',
            'email' => 'nullable | email | max:255 | string',
        ]);
        // Parent Information
        $parent = new Parents();
        if (empty($request->father_name) || is_null($request->father_name)) {
            $parent->father_name = $request->middle_name . ' ' . $request->last_name;
        } else {
            $parent->father_name = $request->father_name;
        }
        if (!empty($request->mother_name) || !is_null($request->mother_name)) {
            $parent->mother_name = $request->mother_name;
        }
        if (!empty($request->job) || !is_null($request->job)) {
            $parent->job = $request->job;
        }
        if (!empty($request->FPhone) || !is_null($request->FPhone)) {
            $parent->FPhone = $request->FPhone;
        }
        if (!empty($request->email) || !is_null($request->email)) {
            $parent->email = $request->email;
        }
        /**
         * @var $student App\Student
         */
        $student = new Student();
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->last_name = $request->last_name;
        $student->address = $request->address;
        $student->sex = $request->sex;
        $student->dob = $request->dob;
        $student->phone = $request->phone;
        $student->status_id = $request->status_id;
        $student->classroom_id = $request->classroom_id;
        $student->level_id = $request->level_id;
        $student->shift_id = $request->shift_id;
        $student->type_id = 1;
        $student->stage_id = NULL;
        $parent->save();

        // add parent first to get the id to add it to student table
        $newParentId = Parents::where('father_name', $parent->father_name)->first()->id;
        $student->parents_id = $newParentId;
        $student->save();

        //add price in payment
        $newStudentId = Student::where([
            ['first_name', $student->first_name],
            ['middle_name', $student->middle_name],
            ['last_name', $student->last_name],
            ['address', $student->address],
        ])->first()->id;
        $payment = new Payment();
        $payment->price = $request->payment;
        $payment->student_id = $newStudentId;
        $payment->save();
        session()->flash('message', 'تم اضافة الطالب !');
        return response()->json(['message' => 'تم اضافة الطالب !', 'success' => true]);
//        return redirect()->back()->with('message', 'تم اضافة الطالب');
//        return back()->with('message', 'تم اضافة الطالب');
    }


    public
    function show($id)
    {
        //
    }

    public
    function edit($id)
    {

    }
    // Send information to Edit Form of IncuStudent by ajax and make values of the inputs as the Incustudent Information
    //in ajax File style.js
    public function getUpdate(Request $request)
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
    function newUpdate(Request $request)
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

    public
    function update(Request $request, $id)
    {

    }


    public
    function destroy($id, Request $request)
    {
        if ($request->ajax()) {
            $Student = Student::find($id);
            Student::destroy($id);
            //remove incustudent parents
            if ($Student->parents_id !== 0 || $Student->parents_id != null) {
                Parents::destroy($Student->parents_id);
            }
            //remove incustudent payments
            $payment = Payment::where('student_id', $Student->id)->first();
            if ($payment->id != null) {
                Payment::destroy($payment->id);
            }
            return Response($Student);
        }
    }


    public function downloadIncuStudents()
    {
        return Excel::download(new IncuStudentExport, 'غياب حضانة.xlsx');
    }

    /* Actions in details of Incu Students */
    public function changepaymentsgetto0incustudent(Request $request)
    {
        if ($request->ajax()) {
            if ($request->action == 0) {
//                Payment::all()->student()->where('type_id', '=', 1)->update(['price' => 0]);
//                Student::where('type_id', '=', 1)->payment()->update(['price' => 0]);
                $students = Student::all()->where('type_id', '=', 1);
                $allStudents = $students->map(function ($student) {
                    return $student->payment->update(['price' => 0]);
                });
            }
        }
        return Response($request);
    }

    public function changepaymentsgetto1incustudent(Request $request)
    {
        if ($request->ajax()) {
            if ($request->action == 1) {
                $students = Student::all()->where('type_id', '=', 1);
                $allStudents = $students->map(function ($student) {
                    return $student->payment->update(['price' => 300]);
                });
            }
        }
        return Response($request);
    }


    /* **************************************** Center Functions ************************************* */
    public function centerIndex()
    {
        $students = Student::all()->where('type_id', 2);
        //$statuss = Status::all();
        $classes = Classroom::all();
        //$levels = Level::all();
        $stages = Stage::all();
        $shifts = Shift::all();
        //total payment
        $Total_Payment = 0;
        foreach ($students as $student) {
            $payment = $student->payment->price;
            $Total_Payment = $Total_Payment + $payment;
        }
        //number of student that price = 0
        $Total_Students_Payment_Zero = 0;
        foreach ($students as $student) {
            if ($student->payment->price == 0) {
                $Total_Students_Payment_Zero++;
            }
        }
        //number of student that price > 0
        $Total_Students_Payment_Not_Zero = 0;
        foreach ($students as $student) {
            if ($student->payment->price !== 0) {
                $Total_Students_Payment_Not_Zero++;
            }
        }
        //number of student that the father or mother is dead > 0
        $Total_Students_Parents_Dead = 0;
        foreach ($students as $student) {
            if ($student->status_id !== 1) {
                $Total_Students_Parents_Dead++;
            }
        }
        return view('center.student.index', compact('students', 'classes', 'stages', 'shifts',
            'Total_Payment', 'Total_Students_Payment_Zero', 'Total_Students_Payment_Not_Zero', 'Total_Students_Parents_Dead'));
    }

    public function createStudent()
    {
        $stages = Stage::all();
        //$payment = Payment::all();
        return view('center.student.create', compact('stages'));
    }

    public function storeStudentCenter(Request $request)
    {
        $this->validate($request, [
            //required Student Information
            'first_name' => 'required | max:15 | string',
            'middle_name' => 'required | max:15 | string',
            'last_name' => 'required | max:15 | string',
            'phone' => 'nullable | digits:11',
            'stage_id' => 'required | integer',
            'payment' => 'required | integer | digits_between:0,5',
        ]);
        $student = new Student();
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->last_name = $request->last_name;
        $student->sex = $request->sex;
        $student->classroom_id = 1;
//        $student->phone = $request->phone;
        if (strlen($request->phone) != 0 && $request->phone != null) {
            $student->phone = $request->phone;
        }
        if (strlen($request->addess) != 0 && $request->address != null) {
            $student->address = $request->address;
        }
        $student->dob = Carbon::now();
        $student->stage_id = $request->stage_id;
        $student->type_id = 2;
        $student->save();

        //add price in payment
        $newStudentId = Student::where([
            ['first_name', $student->first_name],
            ['middle_name', $student->middle_name],
            ['last_name', $student->last_name],
            ['phone', $student->phone],
            ['type_id', 2],
        ])->first()->id;
        $payment = new Payment();
        $payment->price = $request->payment;
        $payment->student_id = $newStudentId;
        $payment->save();
        return Response($student);

//        session()->flash('message', 'تم اضافة الطالب !');
//        return response()->json(['message' => 'تم اضافة الطالب !', 'success' => true]);
//        return redirect()->back()->with('message', 'تم اضافة الطالب');
//        return redirect()->back();
//        return back()->with('message', 'تم اضافة الطالب');
    }

    public function getUpdateStudentCenter(Request $request)
    {
        if ($request->ajax()) {
            $Update_Student = Student::find($request->id);
            $Update_Payment = Payment::where('student_id', $request->id)->first();
            $data = compact('Update_Student', 'Update_Payment');
            return Response($data);
        }
    }

    public
    function newUpdateStudentCenter(Request $request)
    {
        if ($request->ajax()) {
            $this->validate($request, [
                //required Student Information
                'first_name' => 'required | max:15 | string',
                'middle_name' => 'required | max:15 | string',
                'last_name' => 'required | max:15 | string',
                'phone' => 'nullable | digits:11',
                'stage_id' => 'required | integer',
                'payment' => 'required | integer | digits_between:0,5',
            ]);
            $student = Student::find($request->id);
            /**
             * @var $nStudent App\Student
             * @var $nPayment App\Payment
             */
            $student->first_name = $request->first_name;
            $student->middle_name = $request->middle_name;
            $student->last_name = $request->last_name;
            $student->stage_id = $request->stage_id;
            $student->sex = $request->sex;
            if (strlen($request->phone) != 0 && $request->phone != null) {
                $student->phone = $request->phone;
            }
            if (strlen($request->addess) != 0 && $request->address != null) {
                $student->address = $request->address;
            }

            //update new price
            $nPayment = Payment::find($request->payment_id);
            $nPayment->price = $request->payment;

            $student->save();
            $nPayment->save();
            return Response($student);
        }
    }

    public function downloadCenterStudents()
    {
        return Excel::download(new CenterStudentExport(), 'غياب السنتر.xlsx');
    }

    /* Actions in details of Center Students */
    public function changepaymentsgetto0centerstudent(Request $request)
    {
        if ($request->ajax()) {
            if ($request->action == 0) {
//                Payment::all()->student()->where('type_id', '=', 1)->update(['price' => 0]);
//                Student::where('type_id', '=', 1)->payment()->update(['price' => 0]);
                $students = Student::all()->where('type_id', '=', 2);
                $allStudents = $students->map(function ($student) {
                    return $student->payment->update(['price' => 0]);
                });
            }
        }
        return Response($request);
    }

    public function changepaymentsgetto1centerstudent(Request $request)
    {
        if ($request->ajax()) {
            if ($request->action == 1) {
                $students = Student::all()->where('type_id', '=', 2);
                $allStudents = $students->map(function ($student) {
                    return $student->payment->update(['price' => 300]);
                });
            }
        }
        return Response($request);
    }


}

