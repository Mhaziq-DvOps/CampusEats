<?php

namespace App\Http\Controllers;

use App\Models\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $term = Term::all();
        return view('admin-layouts.tnc',['terms'=>$term]);
    }
    public function view()
    {
        //
        $term = Term::all();
        return view('terms',['terms'=>$term]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $term = Term::all();
        return view('admin-layouts.createTerms', ['terms' => $term]);
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
        Term::create($request->all());

        return redirect()->route('term.index');
    }

    public function edit(Term $term)
    {
        //
        //$tnc=Term::where('T_Id',$term)->get();
        //return view('admin-layouts.editTerms')->with('term',$tnc);
        return view('admin-layouts.editTerms',compact('term'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Term $term)
    {
        //
        $term->update($request->all());

        return redirect()->route('term.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Term $term)
    {
        //
        $term->delete();
        return redirect()->back();
    }
}
