<?php

namespace App\Http\Controllers\Dashboard;

use App\Classes;
use App\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classes::with('grade', 'createdBy')->get();
        return view('dashboard.classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::with('grade_en', 'grade_ar')->get();
        return view('dashboard.classes.create' , compact('grades'));
    }





    public function store(Request $request)
    {
        $input = $request->all();
        $input['created_by'] = Auth::id();
        $this->validate($request,[
            'name'       => 'required|max:200',
            'grade_id'      => 'required|int:10|max:200',
        ], [], [
            'name_en'       => 'Name',
            'grade_id'      => 'Grade',
        ]);

        $class = Classes::create($input);
        Session::flash('create', 'Class ' . $class->name . ' Has Been Created Successfully');

        return redirect('admin/classes');
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
        $class = Classes::with('grade', 'createdBy')->find($id);
        $grades = Grade::with('grade_en', 'grade_ar')->get();
        return view('dashboard.classes.edit' , compact('grades', 'class'));
    }




    public function update(Request $request, $id)
    {
        $class = Classes::find($id);
        $input = $request->all();
        $input['created_by'] = Auth::id();
        $this->validate($request,[
            'name'       => 'required|max:200',
            'grade_id'      => 'required|int:10|max:200',
        ], [], [
            'name_en'       => 'Name',
            'grade_id'      => 'Grade',
        ]);

        $class->update($input);
        Session::flash('update', 'Class ' . $class->name . ' Has Been Updated Successfully');

        return redirect('admin/classes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = Classes::find($id);

        // Delete Image From Related Path
        try
        {
            $class->delete();
        }

        catch (\Exception $e)
        {
            Session::flash('exception', 'Error, Can\'t Delete Class Because There are related Images');
            return redirect()->back();
        }

        Session::flash('delete', 'Class ' . $class->name . ' Has Been Deleted Successfully');
        return redirect('admin/classes');
    }
}
