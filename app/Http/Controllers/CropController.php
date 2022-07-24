<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\Request;

class CropController extends Controller
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
    public function addCrop(Request $request)
    {
        $request->validate(
            [
                'crop_name' => 'required',
                'crop_history' => 'required',
                'crop_area' => 'required',
                'crop_status' => 'required',
                'crop_irrigation' => 'required',
                'crop_recession' => 'required',
            ],
            [
                'crop_name.required' => 'يجب ادخال اسم المحصول',
                'crop_history.required' => 'يجب ادخال تاريخ الزراعة',
                'crop_area.required' => 'يجب ادخال مساحة المحصول',
                'crop_status.required' => 'يجب ادخال حالة المحصول',
                'crop_irrigation.required' => 'يجب ادخال طريقة الري',
                'crop_recession.required' => 'يجب ادخال الكساد',
            ]
        );

        Crop::create([
            'land_id' => $request->land_id,
            'crop_name' => $request->crop_name,
            'crop_history' => $request->crop_history,
            'crop_area' => $request->crop_area,
            'crop_status' => $request->crop_status,
            'crop_irrigation' => $request->crop_irrigation,
            'crop_recession' => $request->crop_recession,
            'crop_recession_reason' => $request->crop_recession_reason,
            'crop_endDate' => $request->crop_endDate,
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Crop  $crop
     * @return \Illuminate\Http\Response
     */
    public function show(Crop $crop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Crop  $crop
     * @return \Illuminate\Http\Response
     */
    public function edit(Crop $crop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Crop  $crop
     * @return \Illuminate\Http\Response
     */
    public function updateCrop(Request $request)
    {
        $request->validate(
            [
                'edit_crop_name' => 'required',
                'edit_crop_history' => 'required',
                'edit_crop_area' => 'required',
                'edit_crop_status' => 'required',
                'edit_crop_irrigation' => 'required',
                'edit_crop_recession' => 'required',
            ],
            [
                'edit_crop_name.required' => 'يجب ادخال اسم المحصول',
                'edit_crop_history.required' => 'يجب ادخال تاريخ الزراعة',
                'edit_crop_area.required' => 'يجب ادخال مساحة المحصول',
                'edit_crop_status.required' => 'يجب ادخال حالة المحصول',
                'edit_crop_irrigation.required' => 'يجب ادخال طريقة الري',
                'edit_crop_recession.required' => 'يجب ادخال الكساد',
            ]
        );

        Crop::where('id', $request->edit_id)->update([
            'land_id' => $request->land_id,
            'crop_name' => $request->edit_crop_name,
            'crop_history' => $request->edit_crop_history,
            'crop_area' => $request->edit_crop_area,
            'crop_status' => $request->edit_crop_status,
            'crop_irrigation' => $request->edit_crop_irrigation,
            'crop_recession' => $request->edit_crop_recession,
            'crop_recession_reason' => $request->edit_crop_recession_reason,
            'crop_recession_reason' => $request->edit_crop_recession_reason,
            'crop_endDate' => $request->edit_crop_enddate,
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Crop  $crop
     * @return \Illuminate\Http\Response
     */
    public function deleteCrop(Request $request)
    {
        Crop::find($request->crop_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }
}
