<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinksController extends Controller
{
    private $link;

    /**
     * LinksController constructor.
     */
    public function __construct(Link $link)
    {
        $this->link = $link;

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
        $this->validate($request, [
            'href' => 'required',
            'answer_id' => 'integer'
        ]);

        $link = new Link($request->all());
        $link->save();

        return response()->json([
            'success' => true,
            'link' => $link
        ]);
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
            'href' => 'required',
            'answer_id' => 'integer'
        ]);

        $link = $this->link->find($id);
        if ($link) {
            $link->href = $request->href;
            if (isset($request->text)) {
                $link->text = $request->text;
            }
            if (isset($request->answer_id)) {
                $link->answer_id = $request->answer_id;
            }
            $link->save();
            return response()->json([
                'success' => true,
                'link' => $link
            ]);
        }

        return response()->json([
            'message' => 'Question not found'
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
        $link = $this->link->find($id);
        if ($link) {
            $this->link->destroy($id);
            return response()->json([
                'success' => true,
                'link' => $link
            ]);
        }

        return response()->json([
            'message' => 'Question not found'
        ], 404);
    }
}
