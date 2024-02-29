<?php

namespace App\Http\Controllers;
use App\Models\ExamCandidate;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Result;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class QuizController extends Controller
{
    public function index()
{
    $loggedInUser = \Auth::user();

    if ($loggedInUser->role === 'teacher' || $loggedInUser->role === 'admin') {
        // Fetch quizzes for teacher or admin sorted by creation timestamp in descending order
        $quizzes = Quiz::orderBy('created_at', 'desc')->paginate(7);
        return view('quiz-list')->with('quiz_list', $quizzes);
    }

    // Fetch quizzes for students joined with questions, distinct by quiz ID, and sorted by creation timestamp in descending order
    $quizzes = Quiz::join('questions', 'quizzes.id', '=', 'questions.quiz_id')
        ->distinct('quizzes.id')
        ->select('quizzes.id as quiz_id', 'quizzes.*')
        ->orderBy('quizzes.created_at', 'desc')
        ->paginate(7);

    return view('student.quiz-list')->with('quiz_list', $quizzes);
}


    public function addQuiz(){
        return view('add-quiz');
    }

            public function storeQuiz(Request $request){
                // Validation rules
        $rules = [
            'title' => 'required|unique:quizzes',
            'from_time' => 'required|date|after_or_equal:now',
            'to_time' => 'required|date|after:from_time',
            'duration' => 'required|numeric|min:1',
        ];

        // Custom error messages
        $messages = [
            'from_time.after_or_equal' => 'The Valid From time must be a future date and time.',
            'to_time.after' => 'The Valid Till time must be after the Valid From time.',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (Quiz::create([
            'title'=>$request->title,
            'from_time'=>$request->from_time,
            'to_time'=>$request->to_time,
            'duration'=>$request->duration,
                ])){
                    return redirect()->route('list.quiz')->with('success', 'Quiz: ' . $request->title . ' added successfully!');

                }
                return redirect()->back()->with('error','Quiz: '.$request->title.' was not added. Something wrong!');
            }

            public function joinQuiz($id){

                $currentTimeUTC = Carbon::now();

                $quiz = Quiz::find($id);
                $user_id = session('user_id', null);
                if (ExamCandidate::where('quiz_id',$id)->where('user_id', $user_id)->exists()){

                    return redirect()->back()->with('error','You already participated this quiz');
                }

                if (now()>=Carbon::parse(Quiz::where('id',$id)->value('to_time'))){

                    return redirect()->back()->with('error','Quiz is no longer available');
                }
                ExamCandidate::create([

                   'user_id'=>\Auth::user()->id,
                   'quiz_id'=>$id
                ]);

                return view('student.give-quiz')->with('quiz',Quiz::where('id',$id)->first())
                    ->with('questions',Question::where('quiz_id',$id)->get())
                    ->with('start_time',Carbon::now());
            }
}
