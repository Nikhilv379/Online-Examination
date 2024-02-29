<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Result;
class StudentlistController extends Controller
{
    public function index(){
        $users = User::where('role', 'student')->paginate(7);
        return view('studentlist', compact('users'));
    }
    public function details($user_id){
        $userResults = Result::join('quizzes', 'results.quiz_id', 'quizzes.id')
            ->join('users', 'results.user_id', 'users.id')
            ->where('results.user_id', $user_id)
            ->get();

        return view('studentdetail')->with('results', $userResults);
    }

}
