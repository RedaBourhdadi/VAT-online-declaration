<?php

namespace App\Http\Controllers;

use App\Models\Societe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SocietesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $societes = Societe::where('user_id', Auth::user()->id)->get()->first();
        if ($societes != null) {
            return view('societe.show', compact('societes'));
        } else {
            return view('societe.create');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Societe::insert(
            [
                'raisonSociale' => $request->raisonSociale,
                'identifiantFiscale' => $request->identifiantFiscale,
                'periode' => $request->periode,
                'ICE' => $request->ICE,
                'regime' => $request->regime,
                'user_id' => Auth::user()->id,
                'created_at' => now(),
            ]
        );
        return redirect()->route('ShowSociete');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $societes = Societe::where('user_id', Auth::user()->id)->get()->first();
        return view('societe.show', compact('societes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $societes = Societe::where('user_id', Auth::user()->id)->get()->first();
        // dd($societes);
        return view('societe.edit', compact('societes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('societes')
            ->where('user_id', Auth::user()->id)
            ->update(
                [
                    'raisonSociale' => $request->raisonSociale,
                    'identifiantFiscale' => $request->identifiantFiscale,
                    'periode' => $request->periode,
                    'ICE' => $request->ICE,
                    'regime' => $request->regime,
                ]
            );

        return redirect()->route('ShowSociete');
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