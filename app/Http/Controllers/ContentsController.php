<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contents;
use Session;
use Redirect;

class ContentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Contents::latest()->paginate(25);
        return view('admin.index', ['contents' => $contents]);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $sel = Contents::select('*')
                    ->where('contents', 'LIKE', "%$search%")
                    ->get();
        return view('search', compact('sel','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        try {
            // $request->validate([
            //     'contents' => 'required'
            // ]);

            Contents::create([
                'contents' => strtoupper(request('content')),
                'createdBy' => strtoupper(request('createdBy')),
                'updatedBy' => strtoupper(request('updatedBy')),
            ]);

            return redirect()->route('admin.index')
                ->with('success', 'Content created successfully');

        } catch(\Illuminate\Database\QueryException $ex){
            dd($ex->getMessage()); 
               // Note any method of class PDOException can be called on $ex.
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $content = Contents::find($id);
            $content->delete();
            return redirect()->route('admin.index')
                ->with('success-del', 'Content deleted successfully');
        } catch(\Illuminate\Database\QueryException $ex){
            dd($ex->getMessage()); 
               // Note any method of class PDOException can be called on $ex.
        }
    }
}
