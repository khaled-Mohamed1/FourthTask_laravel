<?php

namespace App\Http\Controllers;

use App\Models\WaterSource;
use Illuminate\Http\Request;

class WaterSourceController extends Controller
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
    public function addWaterSource(Request $request)
    {
        $request->validate(
            [
                'sources_type' => 'required',
            ],
            [
                'sources_type.required' => 'يجب ادخال طريقة الري',
            ]
        );

        WaterSource::create([
            'land_id' => $request->land_id,
            'sources_type' => $request->sources_type,
            'well_number' => $request->well_number,
            'well_depth' => $request->well_depth,
            'well_impetus' => $request->well_impetus,
            'well_electro' => $request->well_electro,
            'tank_storage_capacity' => $request->tank_storage_capacity,
            'tank_Height' => $request->tank_Height,
            'groundWater_depth' => $request->groundWater_depth,
            'groundWater_storage_capacity' => $request->groundWater_storage_capacity,
            'groundWater_pond_type' => $request->groundWater_pond_type,
        ]);

        return response()->json([
            'status' => 'success',
        ]);    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WaterSource  $waterSource
     * @return \Illuminate\Http\Response
     */
    public function show(WaterSource $waterSource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WaterSource  $waterSource
     * @return \Illuminate\Http\Response
     */
    public function edit(WaterSource $waterSource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WaterSource  $waterSource
     * @return \Illuminate\Http\Response
     */
    public function updateWaterSource(Request $request)
    {
        WaterSource::where('id', $request->edit_id)->update([
            'land_id' => $request->land_id,
            'sources_type' => $request->edit_sources_type,
            'well_number' => $request->edit_well_number,
            'well_depth' => $request->edit_well_depth,
            'well_impetus' => $request->edit_well_impetus,
            'well_electro' => $request->edit_well_electro,
            'tank_storage_capacity' => $request->edit_tank_storage_capacity,
            'tank_Height' => $request->edit_tank_Height,
            'groundWater_depth' => $request->edit_groundWater_depth,
            'groundWater_storage_capacity' => $request->edit_groundWater_storage_capacity,
            'groundWater_pond_type' => $request->edit_groundWater_pond_type,
        ]);

        return response()->json([
            'status' => 'success',
        ]);    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WaterSource  $waterSource
     * @return \Illuminate\Http\Response
     */
    public function deleteWaterSource(Request $request)
    {
        WaterSource::find($request->waterSource_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);    }
}
