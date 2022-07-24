<?php

namespace App\Http\Controllers;

use App\Models\Cattle;
use Illuminate\Http\Request;

class CattleController extends Controller
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
    public function addCattle(Request $request)
    {
        $request->validate(
            [
                'cattle_type' => 'required',
                'cattle_gender' => 'required',
                'cattle_number' => 'required',
                'cattle_age' => 'required',
                'cattle_healthCondition' => 'required',
            ],
            [
                'cattle_type.required' => 'يجب ادخال صنف الماشية',
                'cattle_gender.required' => 'يجب ادخال جنس الماشية',
                'cattle_number.required' => 'يجب ادخال عدد الماشية',
                'cattle_age.required' => 'يجب ادخال عمر الماشية',
                'cattle_healthCondition.required' => 'يجب ادخال الحالة الصحية للماشية',
            ]
        );

        Cattle::create([
            'land_id' => $request->land_id,
            'cattle_type' => $request->cattle_type,
            'cattle_gender' => $request->cattle_gender,
            'cattle_number' => $request->cattle_number,
            'cattle_age' => $request->cattle_age,
            'cattle_healthCondition' => $request->cattle_healthCondition,
            'cattle_notes' => $request->cattle_notes,
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cattle  $cattle
     * @return \Illuminate\Http\Response
     */
    public function show(Cattle $cattle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cattle  $cattle
     * @return \Illuminate\Http\Response
     */
    public function edit(Cattle $cattle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cattle  $cattle
     * @return \Illuminate\Http\Response
     */
    public function updateCattle(Request $request)
    {
        $request->validate(
            [
                'edit_cattle_type' => 'required',
                'edit_cattle_gender' => 'required',
                'edit_cattle_number' => 'required',
                'edit_cattle_age' => 'required',
                'edit_cattle_healthcondition' => 'required',
            ],
            [
                'edit_cattle_type.required' => 'يجب ادخال صنف الماشية',
                'edit_cattle_gender.required' => 'يجب ادخال جنس الماشية',
                'edit_cattle_number.required' => 'يجب ادخال عدد الماشية',
                'edit_cattle_age.required' => 'يجب ادخال عمر الماشية',
                'edit_cattle_healthcondition.required' => 'يجب ادخال الحالة الصحية للماشية',
            ]
        );

        Cattle::where('id', $request->edit_id)->update([
            'land_id' => $request->land_id,
            'cattle_type' => $request->edit_cattle_type,
            'cattle_gender' => $request->edit_cattle_gender,
            'cattle_number' => $request->edit_cattle_number,
            'cattle_age' => $request->edit_cattle_age,
            'cattle_healthCondition' => $request->edit_cattle_healthcondition,
            'cattle_notes' => $request->edit_cattle_notes,
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cattle  $cattle
     * @return \Illuminate\Http\Response
     */
    public function deleteCattle(Request $request)
    {
        Cattle::find($request->cattle_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }
}
