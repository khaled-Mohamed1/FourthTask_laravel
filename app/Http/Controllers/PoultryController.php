<?php

namespace App\Http\Controllers;

use App\Models\Poultry;
use Illuminate\Http\Request;

class PoultryController extends Controller
{
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
    public function addPoultry(Request $request)
    {
        $request->validate(
            [
                'poultry_type' => 'required',
                'poultry_number' => 'required',
                'poultry_aged' => 'required',
                'poultry_agem' => 'required',
            ],
            [
                'poultry_type.required' => 'يجب ادخال صنف الداجنة',
                'poultry_number.required' => 'يجب ادخال عدد الدواجن',
                'poultry_aged.required' => 'يجب ادخال عمر الدواجن بالأيام',
                'poultry_agem.required' => 'يجب ادخال عمر الدواجن بالأشهر',
            ]
        );

        Poultry::create([
            'land_id' => $request->land_id,
            'poultry_type' => $request->poultry_type,
            'poultry_number' => $request->poultry_number,
            'poultry_ageD' => $request->poultry_aged,
            'poultry_ageM' => $request->poultry_agem,
            'poultry_notes' => $request->poultry_notes,
        ]);

        return response()->json([
            'status' => 'success',
        ]);    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poultry  $poultry
     * @return \Illuminate\Http\Response
     */
    public function show(Poultry $poultry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poultry  $poultry
     * @return \Illuminate\Http\Response
     */
    public function edit(Poultry $poultry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Poultry  $poultry
     * @return \Illuminate\Http\Response
     */
    public function updatePoultry(Request $request)
    {
        $request->validate(
            [
                'edit_poultry_type' => 'required',
                'edit_poultry_number' => 'required',
                'edit_poultry_aged' => 'required',
                'edit_poultry_agem' => 'required',
            ],
            [
                'edit_poultry_type.required' => 'يجب ادخال صنف الداجنة',
                'edit_poultry_number.required' => 'يجب ادخال عدد الدواجن',
                'edit_poultry_aged.required' => 'يجب ادخال عمر الدواجن بالأيام',
                'edit_poultry_agem.required' => 'يجب ادخال عمر الدواجن بالأشهر',
            ]
        );

        Poultry::where('id', $request->edit_id)->update([
            'land_id' => $request->land_id,
            'poultry_type' => $request->edit_poultry_type,
            'poultry_number' => $request->edit_poultry_number,
            'poultry_ageD' => $request->edit_poultry_aged,
            'poultry_ageM' => $request->edit_poultry_agem,
            'poultry_notes' => $request->edit_poultry_notes,
        ]);

        return response()->json([
            'status' => 'success',
        ]);    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poultry  $poultry
     * @return \Illuminate\Http\Response
     */
    public function deletePoultry(Request $request)
    {
        Poultry::find($request->poultry_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);    }
}
