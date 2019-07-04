<?php

namespace App\Http\Controllers\Dashboard;

use App\Grade;
use App\Subject;
use App\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class TeachersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subject_id = Input::get('subjectID');
        if ($subject_id)
        {
            $subject = Subject::find($subject_id);
            $teachers = $subject->teachers()->where('subject_id', $subject_id)->get();
            return view('dashboard.teachers.index', compact('teachers', 'subject'));
        }
        $teachers = Teacher::with('createdBy', 'subjects')->get();
        return view('dashboard.teachers.index', compact('teachers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::with('subject_en', 'subject_ar')->get();
        $grades = Grade::with('grade_en', 'grade_ar')->get();
        return view('dashboard.teachers.create', compact('subjects', 'grades'));
    }






    public function store(Request $request)
    {

        $input = $request->all();
        $teacherSubjects = $request->subjects;
        $teachersGrades = $request->grades;
        $input['created_by'] = Auth::id();

        $this->validate($request,[
            'name'        =>    'required|max:200',
            'email'       =>    'required|email|unique:teachers|max:200',
            'phone'       =>    'required|max:200',
            'address'     =>    'required|max:200',
            'subjects.*'  =>    'required',
            'grades.*'    =>    'required',
        ],[],[
            'name'        =>    ' Name',
            'email'       =>    ' Email',
            'phone'       =>    ' Phone',
            'address'     =>    ' Address',
        ]);

        //Save Teacher to subjects table
        $teacher = new Teacher();
        $teacher->created_by = $input['created_by'];
        $teacher->name = $input['name'];
        $teacher->email = $input['email'];
        $teacher->phone = $input['phone'];
        $teacher->address = $input['address'];
        $teacher->save();

        //Save Subject ID and related Teacher ID to subject_teachers table
        $teacher->subjects()->attach($teacherSubjects);
        //Save Subject ID and related Grade ID to subject_teachers table
        $teacher->grades()->attach($teachersGrades);

        Session::flash('create', 'Teacher  Has Been Created Successfully');
        return redirect('admin/teachers');
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
        $teacher = Teacher::with('grades', 'subjects')->findOrFail($id);
        $subjects = Subject::with('subject_en', 'subject_ar')->get();
        $grades = Grade::with('grade_en', 'grade_ar')->get();
        return view('dashboard.teachers.edit', compact('subjects', 'grades', 'teacher'));
    }






    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        $input = $request->all();
        $teacherSubjects = $request->subjects;
        $teachersGrades = $request->grades;
        $input['created_by'] = Auth::id();

        $this->validate($request,[
            'name'        =>    'required|max:200',
            'email'       =>    'required|email|unique:teachers,id,'. $id .'|max:200',
            'phone'       =>    'required|max:200',
            'address'     =>    'required|max:200',
            'subjects.*'  =>    'required',
            'grades.*'    =>    'required',
        ],[],[
            'name'        =>    ' Name',
            'email'       =>    ' Email',
            'phone'       =>    ' Phone',
            'address'     =>    ' Address',
        ]);

        //Save Teacher to teachers table
        $teacher->created_by = $input['created_by'];
        $teacher->name = $input['name'];
        $teacher->email = $input['email'];
        $teacher->phone = $input['phone'];
        $teacher->address = $input['address'];
        $teacher->save();


        //Save Subject ID and related Teacher ID to subject_teachers table
        $teacher->subjects()->sync($teacherSubjects);
        //Save Subject ID and related Grade ID to subject_teachers table
        $teacher->grades()->sync($teachersGrades);


        Session::flash('update', 'Teacher  Has Been Updated Successfully');
        return redirect('admin/teachers');
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
