<?php

namespace App\Http\Controllers;

use App\Models\Vegetable;
use Illuminate\Http\Request;

class VegetableController extends Controller
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
    public function addVegetable(Request $request)
    {
        $request->validate(
            [
                'vegetable_name' => 'required',
                'vegetable_history' => 'required',
                'vegetable_area' => 'required',
                'vegetable_status' => 'required',
                'vegetable_irrigation' => 'required',
                'vegetable_recession' => 'required',
            ],
            [
                'vegetable_name.required' => 'يجب ادخال اسم المحصول',
                'vegetable_history.required' => 'يجب ادخال تاريخ الزراعة',
                'vegetable_area.required' => 'يجب ادخال مساحة المحصول',
                'vegetable_status.required' => 'يجب ادخال حالة المحصول',
                'vegetable_irrigation.required' => 'يجب ادخال طريقة الري',
                'vegetable_recession.required' => 'يجب ادخال الكساد',
            ]
        );

        Vegetable::create([
            'land_id' => $request->land_id,
            'vegetable_name' => $request->vegetable_name,
            'vegetable_history' => $request->vegetable_history,
            'vegetable_area' => $request->vegetable_area,
            'vegetable_status' => $request->vegetable_status,
            'vegetable_irrigation' => $request->vegetable_irrigation,
            'vegetable_recession' => $request->vegetable_recession,
            'vegetable_protection' => $request->vegetable_protection,
            'vegetable_protectionType' => $request->vegetable_protectionType,
            'vegetable_recession_reason' => $request->vegetable_recession_reason,
            'vegetable_endDate' => $request->vegetable_endDate,
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vegetable  $vegetable
     * @return \Illuminate\Http\Response
     */
    public function show(Vegetable $vegetable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vegetable  $vegetable
     * @return \Illuminate\Http\Response
     */
    public function edit(Vegetable $vegetable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vegetable  $vegetable
     * @return \Illuminate\Http\Response
     */
    public function updateVegetable(Request $request)
    {
        $request->validate(
            [
                'edit_vegetable_name' => 'required',
                'edit_vegetable_history' => 'required',
                'edit_vegetable_area' => 'required',
                'edit_vegetable_status' => 'required',
                'edit_vegetable_irrigation' => 'required',
                'edit_vegetable_recession' => 'required',
            ],
            [
                'edit_vegetable_name.required' => 'يجب ادخال اسم المحصول',
                'edit_vegetable_history.required' => 'يجب ادخال تاريخ الزراعة',
                'edit_vegetable_area.required' => 'يجب ادخال مساحة المحصول',
                'edit_vegetable_status.required' => 'يجب ادخال حالة المحصول',
                'edit_vegetable_irrigation.required' => 'يجب ادخال طريقة الري',
                'edit_vegetable_recession.required' => 'يجب ادخال الكساد',
            ]
        );
        Vegetable::where('id', $request->edit_id)->update([
            'land_id' => $request->land_id,
            'vegetable_name' => $request->edit_vegetable_name,
            'vegetable_history' => $request->edit_vegetable_history,
            'vegetable_area' => $request->edit_vegetable_area,
            'vegetable_status' => $request->edit_vegetable_status,
            'vegetable_irrigation' => $request->edit_vegetable_irrigation,
            'vegetable_recession' => $request->edit_vegetable_recession,
            'vegetable_protection' => $request->edit_vegetable_protection,
            'vegetable_protectionType' => $request->edit_vegetable_protectionType,
            'vegetable_recession_reason' => $request->edit_vegetable_recession_reason,
            'vegetable_endDate' => $request->edit_vegetable_endDate,
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vegetable  $vegetable
     * @return \Illuminate\Http\Response
     */
    public function deleteVegetable(Request $request)
    {
        Vegetable::find($request->vegetable_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }
}
