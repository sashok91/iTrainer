<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswersController extends Controller
{
    private $answer;

    /**
     * AnswersController constructor.
     */
    public function __construct(Answer $answer)
    {
        $this->answer = $answer;

        $this->middleware('admin');
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'question_id' => 'integer'
        ]);

        $answer = $this->answer->find($id);
        if ($answer) {
            if (isset($request->long_answer)) {
                $answer->long_answer = $request->long_answer;
            }
            if (isset($request->short_answer)) {
                $answer->short_answer = $request->short_answer;
            }
            if (isset($request->question_id)) {
                $answer->question_id = $request->question_id;
            }
            $answer->save();
            return response()->json([
                'success' => true,
                'answer' => $answer
            ]);
        }

        return response()->json([
            'message' => 'Answer not found'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
