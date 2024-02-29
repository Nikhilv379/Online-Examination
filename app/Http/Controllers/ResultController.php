<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Result;
use Illuminate\Http\Request;
use carbon\carbon;

// class ResultController extends Controller
// {
//     public function index(){
//         if (Auth::user()->role=='teacher'){
//             return view('student.result-page')->with('results',Result::join('quizzes','results.quiz_id','quizzes.id')
//                 ->join('users','results.user_id','users.id')
//                 ->paginate(7));
//         }
//         elseif(Auth::user()->role=='admin'){
//             return view('student.result-page')->with('results',Result::join('quizzes','results.quiz_id','quizzes.id')
//             ->join('users','results.user_id','users.id')
//             ->paginate(7));
//         }
//         else{
//         return view('student.result-page')->with('results',Result::join('quizzes','results.quiz_id','quizzes.id')
//             // ->where('user_id',session('user_id'))
//             ->paginate(7));
//         }
//     }
// }

class ResultController extends Controller
{
    public function index()
    {
        $results = Result::join('quizzes', 'results.quiz_id', 'quizzes.id')->join('users', 'results.user_id', 'users.id')->orderBy('quizzes.created_at', 'desc');
        // ->select('quizzes.created_at as quiz_ended_time');

        if (Auth::user()->role == 'teacher' || Auth::user()->role == 'admin') {
            // For teachers and admins
            $results = $results->paginate(7);
        } else {
            // For students
            $results = $results->where('user_id', Auth::id())->paginate(7);
        }

        // dd($results);

        return view('student.result-page', ['results' => $results]);
    }
}

