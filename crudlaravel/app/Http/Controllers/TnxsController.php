<?php

namespace LoginWithCRUD\Http\Controllers;

use Illuminate\Http\Request;
use LoginWithCRUD\Http\Controllers\Controller;
use LoginWithCRUD\Tnxs;

class TnxsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $tnxs = Tnxs::orderBy('created_at','ASEC')->paginate(5);
        return view('tnxs.index',compact('tnxs'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tnxs.create');
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
        $this->validate($request, [
        'type' => 'required',
        'origin' => 'required',
        'description' => 'required',
        'amount' => 'required',
        ]);

        Tnxs::create($request->all());
        return redirect()->route('tnxs.index')
                        ->with('success','Transaction created successfully');
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
        $tnxs = Tnxs::find($id);
        return view('tnxs.show',compact('tnxs'));
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
        $tnxs = Tnxs::find($id);
        return view('tnxs.edit',compact('tnxs'));
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
        $this->validate($request, [
        'type' => 'required',
        'origin' => 'required',
        'description' => 'required',
        'amount' => 'required',
        ]);

        Tnxs::find($id)->update($request->all());
        return redirect()->route('tnxs.index')
                        ->with('success','Transaction updated successfully');

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
        Tnxs::find($id)->delete();
        return redirect()->route('tnxs.index')
                        ->with('success','Transaction deleted successfully');
    }
}
