<?php

namespace App\Http\Controllers\Dashboard;

use App\Grade;
use App\Subject;
use App\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher_id = Input::get('teacherID');
        if ($teacher_id)
        {
            $teacher = Teacher::find($teacher_id);
            $subjects = $teacher->subjects()->where('teacher_id', $teacher_id)->get();
            return view('dashboard.subjects.index', compact('subjects', 'teacher'));
        }
        else
        {
            $subjects = Subject::with('subject_en', 'subject_ar','createdBy', 'grades')->get();
            return view('dashboard.subjects.index', compact('subjects'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::with('grade_en', 'grade_ar')->get();
        $teachers = Teacher::all();
        return view('dashboard.subjects.create', compact('teachers', 'grades'));
    }




    public function store(Request $request)
    {
        $input = $request->all();
        $subjectGrades = $input['grades'];
        $subjectTeachers = $request->teachers;
        $input['created_by'] = Auth::id();

        $this->validate($request,[
            'name_en'         => 'required|max:200',
            'name_ar'         => 'required|max:200',
        ], [], [
            'name_en'         => ' Name in English',
            'name_ar'         => ' Name in Arabic',
        ]);

        //Save Subject to subjects table
        $subject = new Subject();
        $subject->created_by = $input['created_by'];
        $subject->save();

        //Save Subject and related grade to subject_grades table
        $subject->subject_en()->create(['subject_id' => $subject->id, 'name' =>  $request->name_en ]);
        $subject->subject_ar()->create(['subject_id' => $subject->id, 'name' =>  $request->name_ar ]);

        //Save Subject ID and related grade ID to subject_grades table
        $subject->grades()->attach($subjectGrades);
        //Save Subject ID and related Teacher ID to subject_teachers table
        $subject->teachers()->attach($subjectTeachers);

        Session::flash('create', 'Subject  Has Been Created Successfully');
        return redirect('admin/subjects');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::with('subject_en', 'subject_ar')->find($id);
        $grades = Grade::with('grade_en', 'grade_ar')->get();
        $teachers = Teacher::with('subjects')->get();
        return view('dashboard.subjects.edit', compact('teachers', 'grades', 'subject'));
    }




    public function update(Request $request, $id)
    {
        $subject = Subject::find($id);
        $input = $request->all();
        $subjectGrades = $input['grades'];
        $subjectTeachers = $request->teachers;
        $input['created_by'] = Auth::id();

        $this->validate($request,[
            'name_en'         => 'required|max:200',
            'name_ar'         => 'required|max:200',
        ], [], [
            'name_en'         => ' Name in English',
            'name_ar'         => ' Name in Arabic',
        ]);

        //Save Subject to subjects table
        $subject->created_by = $input['created_by'];
        $subject->update(['created_by' => $input['created_by']]);

        $subject->subject_en()->update(['subject_id' => $id, 'name' =>  $request->name_en ]);
        $subject->subject_ar()->update(['subject_id' => $id, 'name' =>  $request->name_ar ]);

        //Update Subjects Grades Table;
        $subject->grades()->sync($subjectGrades);

        //Update Subjects Teachers Table;
        $subject->teachers()->sync($subjectTeachers);

        Session::flash('create', 'Subject  Has Been Updated Successfully');
        return redirect('admin/subjects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);

        try
        {
            $subject->delete();
        }

        catch (\Exception $e)
        {
            Session::flash('exception', 'Error, Can\'t Delete Subject Because There are related Tables');
            return redirect()->back();
        }

        Session::flash('delete', 'Subject Has Been Deleted Successfully');
        return redirect('admin/subjects');
    }
}
