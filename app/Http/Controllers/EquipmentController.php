<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
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
    public function addEquipment(Request $request)
    {
        $request->validate(
            [
                'machine_type' => 'required',
                'property_type' => 'required',
                'quantity' => 'required',
                'notes' => 'required',

            ],
            [
                'machine_type.required' => 'يجب اضافة نوع الآلة',
                'property_type.required' => 'يجب ادخال نوع الملكية',
                'quantity.required' => 'يجب ادخال الكمية',
                'notes.required' => 'يجب ادخال ملاحظات ',
            ]
        );

        Equipment::create([
            'farmer_id' => $request->farmer_id,
            'machine_type' => $request->machine_type,
            'property_type' => $request->property_type,
            'quantity' => $request->quantity,
            'notes' => $request->notes,
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function updateEquipment(Request $request)
    {
        $request->validate(
            [
                'edit_machine_type' => 'required',
                'edit_property_type' => 'required',
                'edit_quantity' => 'required',
                'edit_notes' => 'required',
            ],
            [
                'edit_machine_type.required' => 'يجب اضافة نوع الآلة',
                'edit_property_type.required' => 'يجب ادخال نوع الملكية',
                'edit_quantity.required' => 'يجب ادخال الكمية',
                'edit_notes.required' => 'يجب ادخال ملاحظات ',
            ]
        );

        Equipment::where('id', $request->edit_id)->update([
            'farmer_id' => $request->farmer_id,
            'machine_type' => $request->edit_machine_type,
            'property_type' => $request->edit_property_type,
            'quantity' => $request->edit_quantity,
            'notes' => $request->edit_notes,

        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function deleteEquipment(Request $request)
    {
        Equipment::find($request->equipment_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }
}
