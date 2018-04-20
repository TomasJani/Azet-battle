<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('employee');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("questions.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $company)
    {
        $this->validate(request(), [
            'name' => 'required|min:3|max:50',
            'body' => 'required|min:5',
            'tags' => 'required'
        ]);

        $question = new Question;
        $question->user_id = auth()->user()->id;
        $question->company_id = auth()->user()->company_id;
        $question->name = request('name');
        $question->body = request('body');
        $question->tags = request('tags');

        $question->save();

        return redirect(auth()->user()->company_id.'company/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($company,Question $question)
    {
        $question->views += 1;
        $question->save();

        return view("questions.show",compact("question"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($company,Question $question)
    {
         return view("questions.edit",compact("question"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $company, Question $question)
    {
         if (auth()->user()->id() === $question->user_id){

            $this->validate(request(), [
                'name' => 'required|min:3|max:50',
                'body' => 'required|min:5',
                'tags' => 'required'
            ]);

            $question->name = request('name');
            $question->body = request('body');
            $question->tags = request('tags');

            $question->save();

            return redirect('company/'.auth()->user()->company_id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($company,Question $question)
    {
         if (auth()->user()->id() === $question->user_id){
            Question::destroy($id);
        }
    }
}
