<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
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
    public function addBuilding(Request $request)
    {
        $request->validate(
            [
                'building_type' => 'required',
                'building_area' => 'required',
                'building_ownership' => 'required',
                'building_notes' => 'required',
            ],
            [
                'building_type.required' => 'يجب ادخال نوع المبنى',
                'building_area.required' => 'يجب ادخال مساحة المبنى',
                'building_ownership.required' => 'يجب ادخال نوع الملكية',
                'building_notes.required' => 'يجب ادخال الملاحظات',
            ]
        );

        Building::create([
            'land_id' => $request->land_id,
            'building_type' => $request->building_type,
            'building_area' => $request->building_area,
            'building_ownership' => $request->building_ownership,
            'building_notes' => $request->building_notes,
            'building_farm_type' => $request->building_farm_type,
            'building_farm_roof_type' => $request->building_farm_roof_type,
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function show(Building $building)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit(Building $building)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function updateBuilding(Request $request)
    {
        $request->validate(
            [
                'edit_building_type' => 'required',
                'edit_building_area' => 'required',
                'edit_building_ownership' => 'required',
                'edit_building_notes' => 'required',
            ],
            [
                'edit_building_type.required' => 'يجب ادخال نوع المبنى',
                'edit_building_area.required' => 'يجب ادخال مساحة المبنى',
                'edit_building_ownership.required' => 'يجب ادخال نوع الملكية',
                'edit_building_notes.required' => 'يجب ادخال الملاحظات',
            ]
        );

        Building::where('id', $request->edit_id)->update([
            'land_id' => $request->land_id,
            'building_type' => $request->edit_building_type,
            'building_area' => $request->edit_building_area,
            'building_ownership' => $request->edit_building_ownership,
            'building_notes' => $request->edit_building_notes,
            'building_farm_type' => $request->edit_building_farm_type,
            'building_farm_roof_type' => $request->edit_building_farm_roof_type,
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function deleteBuilding(Request $request)
    {
        Building::find($request->building_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }
}
