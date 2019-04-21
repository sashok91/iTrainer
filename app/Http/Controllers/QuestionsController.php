<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    private $question;

    /**
     * QuestionsController constructor.
     */
    public function __construct(Question $question)
    {
        $this->question = $question;

        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = $this->question->all();
        return response()->json($questions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'text' => 'required',
            'state' => 'in:draft,active'
        ]);

        $question = new Question($request->all());
        $question->save();

        return response()->json([
            'success' => true,
            'question' => $question
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = $this->question->with('answers.links')->find($id);
        return response()->json($question);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'text' => 'required',
            'state' => 'in:draft,active'
        ]);

        $question = $this->question->find($id);
        if ($question) {
            if (isset($request->text)) {
                $question->text = $request->text;
            }
            if (isset($request->state)) {
                $question->state = $request->state;
            }
            $question->save();
            return response()->json([
                'success' => true,
                'question' => $question
            ]);
        }

        return response()->json([
            'message' => 'Question not found'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $question = $this->question->find($id);
        if ($question) {
            $this->question->destroy($id);
            return response()->json([
                'success' => true,
                'question' => $question
            ]);
        }

        return response()->json([
            'message' => 'Question not found'
        ], 404);
    }
}
