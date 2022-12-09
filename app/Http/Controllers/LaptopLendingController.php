<?php

namespace App\Http\Controllers;

use App\Models\LaptopLending;
use Illuminate\Http\Request;

class LaptopLendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $returnToday = LaptopLending::where('return_date', \Carbon\Carbon::now()->format ("Y-m-d"))->get();
        $loanedToday = LaptopLending::where([
            ['date', \Carbon\Carbon::now()->format ("Y-m-d")],
            ['return_date', 'NULL'],
        ])->get();
        return view('index', compact('returnToday', 'loanedToday'));
    }

    public function data()
    {
        $allData = LaptopLending::all();
        return view('data', compact('allData'));
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
        $request->validate([
            'name' => 'required|min:4',
            'nis' => 'required|min:8',
            'region' => 'required',
            'purposes' => 'required|min:5',
            'ket' => 'required|min:5',
            'date' => 'required',
            'teacher' => 'required|min:3',
        ]);

        LaptopLending::create([
            'name' => $request->name,
            'nis' => $request->nis,
            'region' => $request->region,
            'purposes' => $request->purposes,
            'ket' => $request->ket,
            'date' => $request->date,
            'teacher' => $request->teacher,
        ]);

        return redirect()->back()->with('add', 'Success add new data lending!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LaptopLending  $laptopLending
     * @return \Illuminate\Http\Response
     */
    public function show(LaptopLending $laptopLending)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LaptopLending  $laptopLending
     * @return \Illuminate\Http\Response
     */
    public function edit(LaptopLending $laptopLending)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LaptopLending  $laptopLending
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        LaptopLending::where('id', $id)->update([
            'return_date' => \Carbon\Carbon::now(),
        ]);
        return redirect()->back()->with('update', 'Succes returned laptop!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaptopLending  $laptopLending
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LaptopLending::where('id', $id)->delete();
        return redirect()->back()->with('delete', 'Success deleted data!');
    }
}
