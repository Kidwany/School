<?php

namespace App\Http\Controllers\Dashboard;

use App\Grade;
use App\Level;
use App\Subject;
use App\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class GradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subject_id = Input::get('subjectID');
        $teacher_id = Input::get('teacherID');

        //Get Grades Related to Subject
        if($subject_id)
        {
            $subject = Subject::find($subject_id);
            $grades = $subject->grades()->where('subject_id', $subject_id)->get();
            return view('dashboard.grades.index', compact('grades', 'subject'));
        }

        //Get Grades Related to Subject
        elseif($teacher_id)
        {
            $teacher = Teacher::find($teacher_id);
            $grades = $teacher->grades()->where('teacher_id', $teacher_id)->get();
            return view('dashboard.grades.index', compact('grades', 'teacher'));
        }

        else
        {
            $grades = Grade::with('grade_en', 'grade_ar','createdBy', 'level', 'classes')->get();
            return view('dashboard.grades.index', compact('grades'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::with('level_en', 'level_ar')->get();
        return view('dashboard.grades.create', compact('levels'));
    }



    public function store(Request $request)
    {
        $input = $request->all();
        $input['created_by'] = Auth::id();
        $this->validate($request,[
            'grade_name_en'         => 'required|max:200',
            'grade_name_ar'         => 'required|max:200',
            'level_id'              => 'required|int:10|max:200',
        ], [], [
            'grade_name_en'         => 'Grade Name in English',
            'grade_name_ar'         => 'Grade Name in Arabic',
            'level_id'              => 'Grade',
        ]);

        // Add Grade to main table of grades
        $grade = new Grade;
        $grade->level_id = $request->level_id;
        $grade->created_by = $input['created_by'];
        $grade->save();

        $grade->grade_en()->create(['grade_id' => $grade->id, 'grade_name' => $request->grade_name_en]);
        $grade->grade_ar()->create(['grade_id' => $grade->id, 'grade_name' => $request->grade_name_ar]);

        Session::flash('create', 'Grade ' . $grade->grade_en->grade_name . ' Has Been Created Successfully');

        return redirect('admin/grades');
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
        $grade = Grade::with('grade_en', 'grade_ar', 'createdBy', 'level')->find($id);
        $levels = Level::with('level_en', 'level_ar')->get();
        return view('dashboard.grades.edit', compact('levels', 'grade'));
    }





    public function update(Request $request, $id)
    {
        $grade = Grade::find($id);
        $input = $request->all();
        $input['created_by'] = Auth::id();
        $this->validate($request,[
            'grade_name_en'         => 'required|max:200',
            'grade_name_ar'         => 'required|max:200',
            'level_id'              => 'required|int:10|max:200',
        ], [], [
            'grade_name_en'         => 'Grade Name in English',
            'grade_name_ar'         => 'Grade Name in Arabic',
            'level_id'              => 'Grade',
        ]);

        // Add Grade to main table of grades
        $grade->update(['level_id' => $request->level_id, 'created_by' => $input['created_by']]);


        $grade->grade_en()->update(['grade_id' => $grade->id, 'grade_name' => $request->grade_name_en]);
        $grade->grade_ar()->update(['grade_id' => $grade->id, 'grade_name' => $request->grade_name_ar]);

        Session::flash('update', 'Grade Has Been Updated Successfully');

        return redirect('admin/grades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grade = Grade::find($id);

        // Delete Image From Related Path
        try
        {
            $grade->grade_en()->delete();
            $grade->grade_ar()->delete();
            $grade->delete();
        }

        catch (\Exception $e)
        {
            Session::flash('exception', 'Error, Can\'t Delete Grade Because There are related Images');
            return redirect()->back();
        }

        Session::flash('delete', 'Grade Has Been Deleted Successfully');
        return redirect('admin/grades');
    }
}
