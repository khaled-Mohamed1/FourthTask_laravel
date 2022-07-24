<?php

namespace App\Http\Controllers;

use App\Models\TemporaryWorkforce;
use Illuminate\Http\Request;

class TemporaryWorkforceController extends Controller
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
    public function addTemporaryWorkforce(Request $request)
    {
        $request->validate(
            [
                'males_number' => 'required',
                'males_number_family' => 'required|numeric|max:' . $request->males_number,
                'females_number' => 'required',
                'females_number_family' => 'required|numeric|max:' . $request->females_number,

            ],
            [
                'males_number.required' => 'يجب اضافة عدد الذكور',
                'males_number_family.required' => 'يجب ادخال عدد ذكور من الأسرة',
                'males_number_family.max' => 'يجد ان يكون عدد الذكور من الأسرة اقل من عدد الذكور الكلي',
                'females_number.required' => 'يجب ادخال عدد الإناث',
                'females_number_family.required' => 'يجب ادخال عدد الإناث من الأسرة',
                'females_number_family.max' => 'يجب ان يكون عدد الإناث من الأسرةاقل من عدد الإناث الكلي',
            ]
        );

        TemporaryWorkforce::create([
            'farmer_id' => $request->farmer_id,
            'males_number' => $request->males_number,
            'males_number_family' => $request->males_number_family,
            'females_number' => $request->females_number,
            'females_number_family' => $request->females_number_family,
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TemporaryWorkforce  $temporaryWorkforce
     * @return \Illuminate\Http\Response
     */
    public function show(TemporaryWorkforce $temporaryWorkforce)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TemporaryWorkforce  $temporaryWorkforce
     * @return \Illuminate\Http\Response
     */
    public function edit(TemporaryWorkforce $temporaryWorkforce)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TemporaryWorkforce  $temporaryWorkforce
     * @return \Illuminate\Http\Response
     */
    public function updateTemporaryWorkforce(Request $request)
    {
        $request->validate(
            [
                'edit_males_number' => 'required',
                'edit_males_number_family' => 'required|numeric|max:' . $request->edit_males_number,
                'edit_females_number' => 'required',
                'edit_females_number_family' => 'required|numeric|max:' . $request->edit_females_number,

            ],
            [
                'edit_males_number.required' => 'يجب اضافة عدد الذكور',
                'edit_males_number_family.required' => 'يجب ادخال عدد ذكور من الأسرة',
                'edit_males_number_family.max' => 'يجد ان يكون عدد الذكور من الأسرة اقل من عدد الذكور الكلي',
                'edit_females_number.required' => 'يجب ادخال عدد الإناث',
                'edit_females_number_family.required' => 'يجب ادخال عدد الإناث من الأسرة',
                'edit_females_number_family.max' => 'يجب ان يكون عدد الإناث من الأسرةاقل من عدد الإناث الكلي',
            ]
        );

        TemporaryWorkforce::where('id', $request->edit_id)->update([
            'farmer_id' => $request->farmer_id,
            'males_number' => $request->edit_males_number,
            'males_number_family' => $request->edit_males_number_family,
            'females_number' => $request->edit_females_number,
            'females_number_family' => $request->edit_females_number_family,

        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TemporaryWorkforce  $temporaryWorkforce
     * @return \Illuminate\Http\Response
     */
    public function deleteTemporaryWorkforce(Request $request)
    {
        TemporaryWorkforce::find($request->temporaryWorkforce_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }
}
