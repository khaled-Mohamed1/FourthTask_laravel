<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Enterprise;
use App\Models\Individual;
use App\Models\Land;
use App\Models\Region;
use Illuminate\Http\Request;

class LandController extends Controller
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
    public function addLand(Request $request)
    {
        $request->validate(
            [
                'land_piece_number' => 'required',
                'land_coupon_number' => 'required',
                'land_contract_type' => 'required',
                'land_holding_type' => 'required',
                'land_owner_type' => 'required',
                'land_city' => 'required',
                'land_region' => 'required',
                'land_nearest_place' => 'required',
            ],
            [
                'land_piece_number.required' => 'يجب ادخال رقم القسيمة',
                'land_coupon_number.required' => 'يجب ادخال رقم القسيمة',
                'land_contract_type.required' => 'يجب ادخال نوع التعاقد',
                'land_holding_type.required' => 'يجب ادخال نوع الحياز',
                'land_owner_type.required' => 'يجب ادخال نوع المالك',
                'land_city.required' => 'يجب ادخال المحافظة',
                'land_region.required' => 'يجب ادخال المنطقة',
                'land_nearest_place.required' => 'يجب ادخال اقرب معلم',
            ]
        );

        $land_id = Land::insertGetId([
            'farmer_id' => $request->farmer_id,
            'piece_number' => $request->land_piece_number,
            'coupon_number' => $request->land_coupon_number,
            'area_number_for_tenure_purposes' => $request->land_area_number_for_tenure_purposes,
            'area_number_for_non_acquisition_purposes' => $request->land_area_number_for_non_acquisition_purposes,
            'permanent_fallow_area_number' => $request->land_permanent_fallow_area_number,
            'temporary_fallow_area_number' => $request->land_temporary_fallow_area_number,
            'cultivated_land_area_number' => $request->land_cultivated_land_area_number,
            'forest_trees_area_number' => $request->land_forest_trees_area_number,
            'total_land_area_number' => $request->land_total_land_area_number,
            'far_from_armistice_line_number' => $request->land_far_from_armistice_line_number,
            'contract_type' => $request->land_contract_type,
            'holding_type' => $request->land_holding_type,
            'owner_type' => $request->land_owner_type,
            'city' => $request->land_city,
            'region' => $request->land_region,
            'nearest_place' => $request->land_nearest_place,
            'notes' => $request->land_notes,
            // 'latitude' => $request->lat,
            // 'longitude' => $request->lng,
        ]);

        if ($request->land_owner_type === 'فرد') {
            Individual::create([
                'land_id' => $land_id,
                'owner_ID_number' => $request->land_owner_ID_number,
                'owner_firstname' => $request->land_owner_firstname,
                'owner_secondname' => $request->land_owner_secondname,
                'owner_thirdname' => $request->land_owner_thirdname,
                'owner_fourthname' => $request->land_owner_fourthname,
            ]);
        } else {
            Enterprise::create([
                'land_id' => $land_id,
                'enterprise_type' => $request->land_enterprise_type,
                'enterprise_number' => $request->land_enterprise_number,
                'enterprise_name' => $request->land_enterprise_name,
                'enterprise_owner_ID_number' => $request->land_enterprise_owner_ID_number,
                'enterprise_owner_name' => $request->land_enterprise_owner_name,
            ]);
        }
        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Land  $land
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $land = Land::findorFail($id);

        return view('farmers.lands.show', compact('land'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Land  $land
     * @return \Illuminate\Http\Response
     */
    public function edit(Land $land)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Land  $land
     * @return \Illuminate\Http\Response
     */
    public function updateLand(Request $request)
    {
        $request->validate(
            [
                'edit_land_piece_number' => 'required',
                'edit_land_coupon_number' => 'required',
                'edit_land_contract_type' => 'required',
                'edit_land_holding_type' => 'required',
                'edit_land_owner_type' => 'required',
                'edit_land_city' => 'required',
                'edit_land_region' => 'required',
                'edit_land_nearest_place' => 'required',
            ],
            [
                'edit_land_piece_number.required' => 'يجب ادخال رقم القسيمة',
                'edit_land_coupon_number.required' => 'يجب ادخال رقم القسيمة',
                'edit_land_contract_type.required' => 'يجب ادخال نوع التعاقد',
                'land_holding_type.required' => 'يجب ادخال نوع الحياز',
                'edit_land_owner_type.required' => 'يجب ادخال نوع المالك',
                'edit_land_city.required' => 'يجب ادخال المحافظة',
                'edit_land_region.required' => 'يجب ادخال المنطقة',
                'edit_land_nearest_place.required' => 'يجب ادخال اقرب معلم',
            ]
        );

        Land::where('id', $request->edit_land_id)->update([
            'farmer_id' => $request->farmer_id,
            'piece_number' => $request->edit_land_piece_number,
            'coupon_number' => $request->edit_land_coupon_number,
            'area_number_for_tenure_purposes' => $request->edit_land_area_number_for_tenure_purposes,
            'area_number_for_non_acquisition_purposes' => $request->edit_land_area_number_for_non_acquisition_purposes,
            'permanent_fallow_area_number' => $request->edit_land_permanent_fallow_area_number,
            'temporary_fallow_area_number' => $request->edit_land_temporary_fallow_area_number,
            'cultivated_land_area_number' => $request->edit_land_cultivated_land_area_number,
            'forest_trees_area_number' => $request->edit_land_forest_trees_area_number,
            'total_land_area_number' => $request->edit_land_total_land_area_number,
            'far_from_armistice_line_number' => $request->edit_land_far_from_armistice_line_number,
            'contract_type' => $request->edit_land_contract_type,
            'holding_type' => $request->edit_land_holding_type,
            'owner_type' => $request->edit_land_owner_type,
            'city' => $request->edit_land_city,
            'region' => $request->edit_land_region,
            'nearest_place' => $request->edit_land_nearest_place,
            'notes' => $request->edit_land_notes,
            // 'latitude' => $request->lat,
            // 'longitude' => $request->lng,
        ]);

        if ($request->edit_land_owner_type === 'فرد') {
            Individual::where('id', $request->edit_individual_id)->update([
                'land_id' => $request->edit_land_id,
                'owner_ID_number' => $request->edit_land_owner_id_number,
                'owner_firstname' => $request->edit_land_owner_firstname,
                'owner_secondname' => $request->edit_land_owner_secondname,
                'owner_thirdname' => $request->edit_land_owner_thirdname,
                'owner_fourthname' => $request->edit_land_owner_fourthname,
            ]);
        } else {
            Enterprise::where('id', $request->edit_enterprise_id)->update([
                'land_id' => $request->edit_land_id,
                'enterprise_type' => $request->edit_land_enterprise_type,
                'enterprise_number' => $request->edit_land_enterprise_number,
                'enterprise_name' => $request->edit_land_enterprise_name,
                'enterprise_owner_ID_number' => $request->edit_land_enterprise_owner_id_number,
                'enterprise_owner_name' => $request->edit_land_enterprise_owner_name,
            ]);
        }

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Land  $land
     * @return \Illuminate\Http\Response
     */
    public function deleteLand(Request $request)
    {
        Land::find($request->land_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }


    public function getRegionLand()
    {
        $cityregion = City::with('regions')->get();
        if (count($cityregion) > 0) {
            return response()->json($cityregion);
        }
    }
}
