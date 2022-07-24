<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\City;
use App\Models\App;

class FarmerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $farmers = Farmer::with('lands')->latest()->paginate(10);
        $cities = City::with('regions')->get();
        return view('farmers.index', compact('farmers', 'cities'));
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
    public function addFarmer(Request $request)
    {
        $card_id = Helper::IDGenerator(new Farmer(), 'card_id', 2, 'F');

        $request->validate(
            [
                'id_NO' => 'required',
                'firstname' => 'required',
                'secondname' => 'required',
                'thirdname' => 'required',
                'fourthname' => 'required',
                'city' => 'required',
                'region' => 'required',
                'nearest_place' => 'required',
                'gender' => 'required',
            ],
            [
                'id_NO.required' => 'يجب اضافة رقم الهوية',
                'firstname.required' => 'يجب ادخال الإسم الأول',
                'secondname.required' => 'يجب ادخال الإسم الثاني',
                'thirdname.required' => 'يجب ادخال الإسم الثالث',
                'fourthname.required' => 'يجب ادخال الإسم الرابع',
                'city.required' => 'يجب ادخال المدينة',
                'region.required' => 'يجب ادخال المنقطة',
                'nearest_place.required' => 'يجب ادخال اقرب معلم',
                'gender.required' => 'يجب ادخال الجنس',
            ]
        );

        Farmer::create([
            'card_id' => $card_id,
            'entry_date' => $request->entry_date,
            'id_NO' => $request->id_NO,
            'date_of_birth' => $request->date_of_birth,
            'firstname' => $request->firstname,
            'secondname' => $request->secondname,
            'thirdname' => $request->thirdname,
            'fourthname' => $request->fourthname,
            'phone_NO' => $request->phone_NO,
            'email' => $request->email,
            'city' => $request->city,
            'region' => $request->region,
            'nearest_place' => $request->nearest_place,
            'status' => $request->status,
            'gender' => $request->gender,
            'qualification' => $request->qualification,
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $farmer = Farmer::findorFail($id);
        $cities = City::with('regions')->get();
        $tests = App::all();
        $app = App::where('farmer_id', $id)->first();
        return view('farmers.show', compact('farmer', 'cities', 'tests', 'app'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function edit(Farmer $farmer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function updateFarmer(Request $request)
    {
        $request->validate(
            [
                'edit_idnumber' => 'required',
                'edit_firstname' => 'required',
                'edit_secondname' => 'required',
                'edit_thirdname' => 'required',
                'edit_fourthname' => 'required',
                'edit_city' => 'required',
                'edit_region' => 'required',
                'edit_nearest_place' => 'required',
                'edit_gender' => 'required',
            ],
            [
                'edit_idnumber.required' => 'يجب اضافة رقم الهوية',
                'edit_firstname.required' => 'يجب ادخال الإسم الأول',
                'edit_secondname.required' => 'يجب ادخال الإسم الثاني',
                'edit_thirdname.required' => 'يجب ادخال الإسم الثالث',
                'edit_fourthname.required' => 'يجب ادخال الإسم الرابع',
                'edit_city.required' => 'يجب ادخال المدينة',
                'edit_region.required' => 'يجب ادخال المنقطة',
                'edit_nearest_place.required' => 'يجب ادخال اقرب معلم',
                'edit_gender.required' => 'يجب ادخال الجنس',
            ]
        );

        Farmer::where('id', $request->edit_id)->update([
            'id_NO' => $request->edit_idnumber,
            'date_of_birth' => $request->edit_date_of_birth,
            'firstname' => $request->edit_firstname,
            'secondname' => $request->edit_secondname,
            'thirdname' => $request->edit_thirdname,
            'fourthname' => $request->edit_fourthname,
            'phone_NO' => $request->edit_phone,
            'email' => $request->edit_email,
            'city' => $request->edit_city,
            'region' => $request->edit_region,
            'nearest_place' => $request->edit_nearest_place,
            'status' => $request->edit_status,
            'gender' => $request->edit_gender,
            'qualification' => $request->edit_qualification,
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function deleteFarmer(Request $request)
    {
        Farmer::find($request->farmer_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }

    // public function pagination(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $farmers = Farmer::latest()->paginate(3);
    //         return view('farmers.pagination_index', compact('farmers'))->render();
    //     }
    // }

    public function search(Request $request)
    {
        if (
            $request->filled('search_card_id') || $request->filled('search_number_id')
            || $request->filled('search_land_piece') || $request->filled('search_land_coupon')
            || $request->filled('search_firstname') || $request->filled('search_secondname')
            || $request->filled('search_thirdname') || $request->filled('search_fourthname')
            || $request->filled('search_city') || $request->filled('search_region')
        ) {
            $farmers = Farmer::query();
            if ($request->filled('search_card_id')) {
                $farmers = $farmers->where('card_id', 'LIKE', '%' . $request->search_card_id . '%');
            }
            if ($request->filled('search_number_id')) {
                $farmers = $farmers->where('id_NO', 'LIKE', '%' . $request->search_number_id . '%');
            }
            if ($request->filled('search_land_piece')) {
                $search_land_piece = $request->search_land_piece;
                $farmers = $farmers->whereHas('lands', function ($q) use ($search_land_piece) {
                    $q->where('piece_number', 'like', '%' . $search_land_piece . '%');
                });
            }
            if ($request->filled('search_land_coupon')) {
                $search_land_coupon = $request->search_land_coupon;
                $farmers = $farmers->whereHas('lands', function ($q) use ($search_land_coupon) {
                    $q->where('coupon_number', 'like', '%' . $search_land_coupon . '%');
                });
            }
            if ($request->filled('search_firstname')) {
                $farmers = $farmers->where('firstname', 'LIKE', '%' . $request->search_firstname . '%');
            }
            if ($request->filled('search_secondname')) {
                $farmers = $farmers->where('secondname', 'LIKE', '%' . $request->search_secondname . '%');
            }
            if ($request->filled('search_thirdname')) {
                $farmers = $farmers->where('thirdname', 'LIKE', '%' . $request->search_thirdname . '%');
            }
            if ($request->filled('search_fourthname')) {
                $farmers = $farmers->where('fourthname', 'LIKE', '%' . $request->search_fourthname . '%');
            }
            if ($request->filled('search_city')) {
                $farmers = $farmers->where('city', 'LIKE', '%' . $request->search_city . '%');
            }
            if ($request->filled('search_region')) {
                $farmers = $farmers->where('region', 'LIKE', '%' . $request->search_region . '%');
            }
            $farmers = $farmers->get();
        } else {
            return redirect()->back();
        }
        return view('farmers.search', compact('farmers'));
    }


    public function getRegion()
    {
        $cityregion = City::with('regions')->get();
        if (count($cityregion) > 0) {
            return response()->json($cityregion);
        }
    }
}
