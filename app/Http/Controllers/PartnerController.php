<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
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
    public function addPartner(Request $request)
    {
        $request->validate(
            [
                'partner_idnumber' => 'required',
                'partner_name' => 'required',
                'partner_type' => 'required',
                'partner_ratio' => 'required',

            ],
            [
                'partner_idnumber.required' => 'يجب ادخال رقمية هوية الشريك',
                'partner_name.required' => 'يجب ادخال اسم الشريك',
                'partner_type.required' => 'يجب ادخال نوع الشراكة',
                'partner_ratio.required' => 'يجب ادخال نسبة الشراكة',
            ]
        );

        Partner::create([
            'land_id' => $request->land_id,
            'partner_idnumber' => $request->partner_idnumber,
            'partner_name' => $request->partner_name,
            'partner_type' => $request->partner_type,
            'partner_ratio' => $request->partner_ratio,
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function updatePartner(Request $request, Partner $partner)
    {
        $request->validate(
            [
                'edit_partner_idnumber' => 'required',
                'edit_partner_name' => 'required',
                'edit_partner_type' => 'required',
                'edit_partner_ratio' => 'required',

            ],
            [
                'edit_partner_idnumber.required' => 'يجب ادخال رقمية هوية الشريك',
                'edit_partner_name.required' => 'يجب ادخال اسم الشريك',
                'edit_partner_type.required' => 'يجب ادخال نوع الشراكة',
                'edit_partner_ratio.required' => 'يجب ادخال نسبة الشراكة',
            ]
        );

        Partner::where('id', $request->edit_id)->update([
            'land_id' => $request->land_id,
            'partner_idnumber' => $request->edit_partner_idnumber,
            'partner_name' => $request->edit_partner_name,
            'partner_type' => $request->edit_partner_type,
            'partner_ratio' => $request->edit_partner_ratio,
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function deletePartner(Request $request)
    {
        Partner::find($request->partner_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }
}
