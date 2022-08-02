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
        $societes = Societe::where('user_id', Auth::user()->id)->get();
        return view('societe.create', compact('societes'));
    }


    public function afficher()
    {
        $societes = Societe::where('user_id', Auth::user()->id)->get();
        return view('societe.afficher', compact('societes'));
    }

    public function store(Request $request)
    {
        $Societe = new Societe();
        $Societe->raisonSociale = $request->raisonSociale;
        $Societe->identifiantFiscale = $request->identifiantFiscale;
        $Societe->periode = $request->periode;
        $Societe->ICE = $request->ICE;
        $Societe->regime = $request->regime;
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
            $Societe->profile_image = $filename;
        }
        $Societe->user_id = Auth::user()->id;
        $Societe->created_at = now();
        $Societe->save();
        return redirect()->route('ShowSociete', ['id' => $Societe->id]);
    }

    public function show($id)
    {
        $societes = Societe::find($id);
        return view('societe.show', compact('societes'));
    }

    public function edit($id)
    {
        $societes = Societe::find($id);
        return view('societe.edit', compact('societes'));
    }

    public function update(Request $request, $id)
    {
        $Societe = Societe::find($id);
        $Societe->raisonSociale = $request->raisonSociale;
        $Societe->identifiantFiscale = $request->identifiantFiscale;
        $Societe->periode = $request->periode;
        $Societe->ICE = $request->ICE;
        $Societe->regime = $request->regime;
        if ($request->hasFile('profile_image')) {
            $destination = 'images/' . $Societe->profile_image;
            if (file_exists($destination)) {
                unlink($destination);
            }
            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
            $Societe->profile_image = $filename;
        }
        $Societe->user_id = Auth::user()->id;
        $Societe->created_at = now();
        $Societe->save();
        return redirect()->route('ShowSociete', compact('Societe', 'id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Societe::destroy($id);
        return redirect()->route('societe');
    }
}
