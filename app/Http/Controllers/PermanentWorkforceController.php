<?php

namespace App\Http\Controllers;

use App\Models\PermanentWorkforce;
use Illuminate\Http\Request;

class PermanentWorkforceController extends Controller
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
    public function addPermanentWorkforce(Request $request)
    {
        $request->validate(
            [
                'id_NO' => 'required',
                'phone_NO' => 'required',
                'firstname' => 'required',
                'secondname' => 'required',
                'thirdname' => 'required',
                'fourthname' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'from_family' => 'required',

            ],
            [
                'id_NO.required' => 'يجب اضافة رقم الهوية',
                'phone_NO.required' => 'يجب ادخال رقم الجوال',
                'firstname.required' => 'يجب ادخال الاسم الأول',
                'secondname.required' => 'يجب ادخال الاسم الثاني',
                'thirdname.required' => 'يجب ادخال الاسم الثالث',
                'fourthname.required' => 'يجب ادخال الاسم الرابع',
                'gender.required' => 'يجب ادخال الجنس',
                'address.required' => 'يجب ادخال عنوان السكن',
                'from_family.required' => 'يجب تأكيد اذا كان من الأسرة ام لا',
            ]
        );

        PermanentWorkforce::create([
            'farmer_id' => $request->farmer_id,
            'id_NO' => $request->id_NO,
            'phone_NO' => $request->phone_NO,
            'firstname' => $request->firstname,
            'secondname' => $request->secondname,
            'thirdname' => $request->thirdname,
            'fourthname' => $request->fourthname,
            'gender' => $request->gender,
            'address' => $request->address,
            'from_family' => $request->from_family,
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
     * @param  \App\Models\PermanentWorkforce  $permanentWorkforce
     * @return \Illuminate\Http\Response
     */
    public function show(PermanentWorkforce $permanentWorkforce)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PermanentWorkforce  $permanentWorkforce
     * @return \Illuminate\Http\Response
     */
    public function edit(PermanentWorkforce $permanentWorkforce)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PermanentWorkforce  $permanentWorkforce
     * @return \Illuminate\Http\Response
     */
    public function updatePermanentWorkforce(Request $request)
    {
        $request->validate(
            [
                'edit_id_no' => 'required',
                'edit_phone_no' => 'required',
                'edit_firstname' => 'required',
                'edit_secondname' => 'required',
                'edit_thirdname' => 'required',
                'edit_fourthname' => 'required',
                'edit_gender' => 'required',
                'edit_address' => 'required',
                'edit_from_family' => 'required',

            ],
            [
                'edit_id_no.required' => 'يجب اضافة رقم الهوية',
                'edit_phone_no.required' => 'يجب ادخال رقم الجوال',
                'edit_firstname.required' => 'يجب ادخال الاسم الأول',
                'edit_secondname.required' => 'يجب ادخال الاسم الثاني',
                'edit_thirdname.required' => 'يجب ادخال الاسم الثالث',
                'edit_fourthname.required' => 'يجب ادخال الاسم الرابع',
                'edit_gender.required' => 'يجب ادخال الجنس',
                'edit_address.required' => 'يجب ادخال عنوان السكن',
                'edit_from_family.required' => 'يجب تأكيد اذا كان من الأسرة ام لا',
            ]
        );

        PermanentWorkforce::where('id', $request->edit_id)->update([
            'farmer_id' => $request->farmer_id,
            'id_NO' => $request->edit_id_no,
            'phone_NO' => $request->edit_phone_no,
            'firstname' => $request->edit_firstname,
            'secondname' => $request->edit_secondname,
            'thirdname' => $request->edit_thirdname,
            'fourthname' => $request->edit_fourthname,
            'gender' => $request->edit_gender,
            'address' => $request->edit_address,
            'from_family' => $request->edit_from_family,

        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PermanentWorkforce  $permanentWorkforce
     * @return \Illuminate\Http\Response
     */
    public function deletePermanentWorkforce(Request $request)
    {
        PermanentWorkforce::find($request->permanentWorkforce_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }
}
