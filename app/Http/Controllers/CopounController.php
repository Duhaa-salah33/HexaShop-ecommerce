<?php

namespace App\Http\Controllers;

use App\Models\Copoun;
use Illuminate\Http\Request;

class CopounController extends Controller
{
    
    // public function index(Request $request)
    // {
    //     $cop = $request->copoun;
    //     $copoun = Copoun::where('copoun',$cop)->first();
    //     $cop_discount = $copoun->discount_percentage;
        
    //     return redirect()->back()->with('cop_discount');
    // }

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
        $copoun = new Copoun();
        $copoun->copoun = $request->copoun;
        $copoun->discount_percentage = $request->discount_percentage;
        $copoun->save();
        return redirect()->back()->with('message','You add a new copoun successfully!');
    }


    public function show()
    {
        $copouns = Copoun::all();
        return view('admin.copouns',compact('copouns'));

    }

  
    public function edit(Copoun $copoun)
    {
        //
    }

  
    public function update(Request $request, Copoun $copoun)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Copoun  $copoun
     * @return \Illuminate\Http\Response
     */
    public function destroy(Copoun $copoun)
    {
        //
    }
}
