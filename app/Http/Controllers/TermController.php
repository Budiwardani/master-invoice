<?php

namespace App\Http\Controllers;

use App\Models\Term;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Term::get();
        return view('pages.terms.index',[
            'terms'      => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = '';
        // $name .= $request->value;
        if($request->unit == 'week'){
            if($request->condition == 'cur_date'){
                $name .= $request->value.' Week later';
            } else
            if($request->condition == 'eom'){
                $name .= $request->value.' Week After End of Month';
            }
        } else
        if($request->unit == 'month'){
            if($request->condition == 'cur_date'){
                $name .= $request->value.' Month later';
            } else
            if($request->condition == 'eom'){
                $name .= 'End of '.$request->value.' Month later';
            }
        }

        $input = Term::create([
            'name'      => $name,
            'value'     => $request->value,
            'periode'   => $request->unit,
            'random_id' => md5(Carbon::now()),
            'term_condition'    => $request->condition,
        ]);

        if($input){
            return redirect('master-terms/index')->with('success','created');
        }
        // dd($name,$request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Term $term)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Term $term)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Term $term)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Term $term)
    {
        //
    }
}
