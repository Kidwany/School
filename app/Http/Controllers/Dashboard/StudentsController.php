<?php

namespace App\Http\Controllers\Dashboard;

use App\Classes;
use App\Grade;
use App\Level;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('classes', 'createdBy')->get();
        return view('dashboard.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::all();
        return view('dashboard.students.create', compact('levels'));
    }


    //Ajax Grades Depend on Level
    public function studentGrade($id)
    {
        $grades = Grade::with('grade_en', 'grade_ar')->where('level_id', $id)->get();
        return json_encode($grades);
    }

    //Ajax Class Depend on Grade
    public function studentClass($id)
    {
        $class = Classes::where('grade_id', $id)->get();
        return json_encode($class);
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $input['created_by'] = Auth::id();
        $this->validate($request,[
            'name'             => 'required|max:200',
            'email'            => 'required|unique:students|email|max:200',
            'phone'            => 'required|max:15',
            'address'          => 'required|max:200',
            'class_id'         => 'required|int:10',
            'grade_id'         => 'required|int:10',
            'level_id'         => 'required|int:10',
        ], [], [
            'name'             => 'Name',
            'email'            => 'Email',
            'phone'            => 'Phone',
            'address'          => 'Address',
            'class_id'         => 'Class',
            'grade_id'         => 'Grade',
            'level_id'         => 'Level',
        ]);

        // Add Grade to main table of grades
        $student = new Student();
        $student->name          = $request->name;
        $student->email         = $request->email;
        $student->phone         = $request->phone;
        $student->address       = $request->address;
        $student->class_id      = $request->class_id;
        $student->grade_id      = $request->grade_id;
        $student->level_id      = $request->level_id;
        $student->created_by    = $input['created_by'];
        $student->save();


        Session::flash('create', 'Student ' . $student->name . ' Has Been Created Successfully');

        return redirect('admin/students');
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
        $student = Student::with('grade', 'level', 'createdBy', 'classes')->find($id);
        $levels = Level::with('level_en', 'level_ar')->get();
        $grades = Grade::with('grade_en', 'grade_ar')->get();
        $classes = Classes::all();
        return view('dashboard.students.edit', compact('levels', 'student', 'grades', 'classes'));
    }







    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $input = $request->all();
        $input['created_by'] = Auth::id();
        $this->validate($request,[
            'name'             => 'required|max:200',
            'email'            => 'required|unique:students,id,'. $id .'|email|max:200',
            'phone'            => 'required|max:15',
            'address'          => 'required|max:200',
            'class_id'         => 'required|int:10',
            'grade_id'         => 'required|int:10',
            'level_id'         => 'required|int:10',
        ], [], [
            'name'             => 'Name',
            'email'            => 'Email',
            'phone'            => 'Phone',
            'address'          => 'Address',
            'class_id'         => 'Class',
            'grade_id'         => 'Grade',
            'level_id'         => 'Level',
        ]);

        // Add Grade to main table of grades
        $student->name          = $request->name;
        $student->email         = $request->email;
        $student->phone         = $request->phone;
        $student->address       = $request->address;
        $student->class_id      = $request->class_id;
        $student->grade_id      = $request->grade_id;
        $student->level_id      = $request->level_id;
        $student->created_by    = $input['created_by'];
        $student->save();


        Session::flash('update', 'Student ' . $student->name . ' Has Been Updated Successfully');

        return redirect('admin/students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);

        // Delete Image From Related Path
        try
        {
            $student->delete();
        }

        catch (\Exception $e)
        {
            Session::flash('exception', 'Error, Can\'t Delete Student Because There are related Tables');
            return redirect()->back();
        }

        Session::flash('delete', 'Student Has Been Deleted Successfully');
        return redirect('admin/students');
    }
}
