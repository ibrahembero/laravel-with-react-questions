<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    //show method to show question
    public function show(string $id)
    {
        $question = Question::find($id);
        if($question){
            return response()->json([
                "message" => "Question Displayed Successfully",
                "question"=> $question
            ],200);
        }else{
            return response()->json([
                "message" => "Question Not Found",
            ],404);
        }
       
        //return view('question', compact('question'));
        //return "hello from question controller".$id;
    }
    /**
     *  show all questions
     */
    public function showAllQuestions(Request $request)
    {
        $questions = Question::all();
        return view('questions.index', compact('questions'));
    }
     /**
     *  form create question
     */
    public function createQuestion(Request $request): View
    {
        return view('questions.create');
    }
    /**
     *  store question
     */
    public function storeQuestion(Request $request)
    {
        $image = $request->file('image');

        if ($image) {
            $imageName = Str::random(32) . '.' . $image->getClientOriginalExtension();

            $question = Question::create([
                "question_title"=>$request->question_title,
                "image" => $imageName,
            ]);
            // Save Image in Storage Folder
            Storage::disk('public')->put( $imageName, file_get_contents($request->image) );
        }else{
            $question = Question::create([
                "question_title"=>$request->question_title,
                "image" => $request->image,
            ]);
        }
        
        return redirect()->route('dashboard')->with('success', 'Question created successfully!');
        // return response()->json([
        //     "status" => true,
        //     "message"=>"Question Created Successfully",
        //     "question_title"=>$request->question_title,
        // ],200);
    }
}
