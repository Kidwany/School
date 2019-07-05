<?php

namespace App\Http\Controllers\Dashboard;

use App\Classes;
use App\Student;
use App\Subject;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /*Return Index Page*/
    public function index()
    {
        $students   = Student::all()->count();
        $teachers   = Teacher::all()->count();
        $classes    = Classes::all()->count();
        $subjects   = Subject::all()->count();
        $users      = User::with('image')->get();
        return view('dashboard.welcome', compact('students', 'teachers', 'classes', 'subjects', 'users'));
    }
}
