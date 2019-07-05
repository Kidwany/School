<?php

namespace App\Http\Controllers\Dashboard;

use App\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LevelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::with('level_'.currentLang(), 'createdBy')->get();
        return view('dashboard.levels.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.levels.create', compact('levels'));
    }





    public function store(Request $request)
    {
        $input = $request->all();
        $input['created_by'] = Auth::id();
        $this->validate($request,[
            'level_name_en'         => 'required|max:200',
            'level_name_ar'         => 'required|max:200',
        ], [], [
            'level_name_en'         => 'Level Name in English',
            'level_name_ar'         => 'Level Name in Arabic',
        ]);

        // Add Grade to main table of grades
        $level = new Level;
        $level->created_by = $input['created_by'];
        $level->save();

        $level->level_en()->create(['level_id' => $level->id, 'name' => $request->level_name_en]);
        $level->level_ar()->create(['level_id' => $level->id, 'name' => $request->level_name_ar]);

        Session::flash('create', 'Level Has Been Created Successfully');

        return redirect('admin/levels');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $level = Level::with('level_en', 'level_ar', 'createdBy')->find($id);
        return view('dashboard.levels.edit', compact('level'));
    }






    public function update(Request $request, $id)
    {
        $level = Level::find($id);
        $input = $request->all();
        $input['created_by'] = Auth::id();
        $this->validate($request,[
            'level_name_en'         => 'required|max:200',
            'level_name_ar'         => 'required|max:200',
        ], [], [
            'level_name_en'         => 'Level Name in English',
            'level_name_ar'         => 'Level Name in Arabic',
        ]);

        // Update Level to main table of grades
        //$level->update(['level_id' => $request->level_id, 'created_by' => $input['created_by']]);

        $level->level_en()->update(['level_id' => $level->id, 'name' => $request->level_name_en]);
        $level->level_ar()->update(['level_id' => $level->id, 'name' => $request->level_name_ar]);

        Session::flash('create', 'Level Has Been Updated Successfully');

        return redirect('admin/levels');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $level = Level::find($id);

        // Delete Image From Related Path
        try
        {
            $level->level_en()->delete();
            $level->level_ar()->delete();
            $level->delete();
        }

        catch (\Exception $e)
        {
            Session::flash('exception', 'Error, Can\'t Delete Grade Because There are related Tables');
            return redirect()->back();
        }

        Session::flash('delete', 'Level Has Been Deleted Successfully');
        return redirect('admin/levels');
    }
}
