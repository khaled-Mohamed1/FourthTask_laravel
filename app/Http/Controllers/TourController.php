<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\VEmployee;
use App\Models\Agricultural;
use App\Models\Animal;
use App\Models\City;
use App\Models\VFarmer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTourRequest;
use App\Models\Farmer;
use App\Models\Visit;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::latest()->paginate(10);
        $cities = City::with('regions')->get();
        $agriculturals = Agricultural::get();
        $animals = Animal::get();
        return view('tours.index', compact('tours', 'cities', 'agriculturals', 'animals'));
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
    public function addTour(Request $request)
    {
        $request->validate(
            [
                'city' => 'required',
                'region' => 'required',
                'required_date' => 'required',
                'visit_type' => 'required',
            ],
            [
                'city.required' => 'يجب ادخال المحافظة',
                'region.required' => 'يجب ادخال المنطقة',
                'required_date.required' => 'يجب ادخال التاريخ المطلوب',
                'visit_type.required' => 'يجب ادخال نوع الزيارة',
            ]
        );

        $tour_id = Tour::create([
            'city' => $request->city,
            'region' => $request->region,
            'required_date' => $request->required_date,
            'visit_type' => $request->visit_type,
            'note' => $request->note,
        ]);

        $tour_id = $tour_id->id;

        if ($request->filled('employee_name')) {
            foreach ($request->employee_name as $key => $insert) {
                VEmployee::create([
                    'tour_id' => $tour_id,
                    'employee_name' => $request->employee_name[$key],
                ]);
            }
        }

        if ($request->filled('farmer_name')) {
            foreach ($request->farmer_name as $key => $insert) {

                $farmers = Farmer::query();
                $splitName = explode(' ', $request->farmer_name[$key]);
                $first_name = $splitName[0];
                $secondname = !empty($splitName[1]) ? $splitName[1] : '';
                $thirdname = !empty($splitName[2]) ? $splitName[2] : '';
                $fourthname = !empty($splitName[3]) ? $splitName[3] : '';

                $farmers = $farmers->where('firstname', 'LIKE', '%' . $first_name . '%')
                    ->where('secondname', 'LIKE', '%' . $secondname . '%')
                    ->where('thirdname', 'LIKE', '%' . $thirdname . '%')
                    ->where('fourthname', 'LIKE', '%' . $fourthname . '%');

                $farmers = $farmers->pluck('card_id');

                if ($key > 0) {
                    if ($request->farmer_name[$key - 1] != $request->farmer_name[$key]) {
                        VFarmer::create([
                            'tour_id' => $tour_id,
                            'farmer_name' => $request->farmer_name[$key],
                            'farmer_cardId' => $farmers[0],
                        ]);
                    }
                } else {
                    VFarmer::create([
                        'tour_id' => $tour_id,
                        'farmer_name' => $request->farmer_name[$key],
                        'farmer_cardId' => $farmers[0],
                    ]);
                }
            }
        }

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tour = Tour::findorFail($id);
        $agriculturals = Agricultural::get();
        $animals = Animal::get();
        $farmers = Farmer::get();
        return view('tours.show', compact('tour', 'agriculturals', 'animals', 'farmers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function edit(Tour $tour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function updateTour(Request $request)
    {
        $request->validate(
            [
                'edit_city' => 'required',
                'edit_region' => 'required',
                'edit_required_date' => 'required',
                'edit_visit_type' => 'required',
            ],
            [
                'edit_city.required' => 'يجب ادخال المحافظة',
                'edit_region.required' => 'يجب ادخال المنطقة',
                'edit_required_date.required' => 'يجب ادخال التاريخ المطلوب',
                'edit_visit_type.required' => 'يجب ادخال نوع الزيارة',
            ]
        );

        Tour::where('id', $request->edit_id)->update([
            'city' => $request->edit_city,
            'region' => $request->edit_region,
            'required_date' => $request->edit_required_date,
            'visit_type' => $request->edit_visit_type,
            'note' => $request->edit_note,
        ]);

        VFarmer::where('tour_id', $request->edit_id)->delete();
        VEmployee::where('tour_id', $request->edit_id)->delete();

        if ($request->filled('edit_employee_name')) {
            foreach ($request->edit_employee_name as $key => $insert) {
                VEmployee::create([
                    'tour_id' => $request->edit_id,
                    'employee_name' => $request->edit_employee_name[$key],
                ]);
            }
        }

        if ($request->filled('edit_farmer_name')) {
            foreach ($request->edit_farmer_name as $key => $insert) {

                $farmers = Farmer::query();
                $splitName = explode(' ', $request->edit_farmer_name[$key]);
                $first_name = $splitName[0];
                $secondname = !empty($splitName[1]) ? $splitName[1] : '';
                $thirdname = !empty($splitName[2]) ? $splitName[2] : '';
                $fourthname = !empty($splitName[3]) ? $splitName[3] : '';

                $farmers = $farmers->where('firstname', 'LIKE', '%' . $first_name . '%')
                    ->where('secondname', 'LIKE', '%' . $secondname . '%')
                    ->where('thirdname', 'LIKE', '%' . $thirdname . '%')
                    ->where('fourthname', 'LIKE', '%' . $fourthname . '%');

                $farmers = $farmers->pluck('card_id');

                if ($key > 0) {
                    if ($request->edit_farmer_name[$key - 1] != $request->edit_farmer_name[$key]) {
                        VFarmer::create([
                            'tour_id' => $request->edit_id,
                            'farmer_name' => $request->edit_farmer_name[$key],
                            'farmer_cardId' => $farmers[0],
                        ]);
                    }
                } else {
                    VFarmer::create([
                        'tour_id' => $request->edit_id,
                        'farmer_name' => $request->edit_farmer_name[$key],
                        'farmer_cardId' => $farmers[0],
                    ]);
                }
            }
        }



        return response()->json([
            'status' => 'success',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function deleteTour(Request $request)
    {
        Tour::find($request->tour_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function getRegion()
    {
        $cityregion = City::with('regions')->get();
        if (count($cityregion) > 0) {
            return response()->json($cityregion);
        }
    }

    public function fetchname(Request $request)
    {

        $res = Farmer::select("firstname", "secondname", "thirdname", "fourthname")
            ->where("firstname", "LIKE", "%{$request->term}%")
            ->get();

        return response()->json($res);
    }

    public function search(Request $request)
    {

        if (
            $request->filled('tour_search_visitType') || $request->filled('tour_number')
            || $request->filled('tour_search_city') || $request->filled('tour_search_region')
            || $request->filled('tour_search_datefrom') || $request->filled('tour_search_dateto')
        ) {
            $tours = Tour::query();

            if ($request->filled('tour_search_visitType')) {
                $tours = $tours->where('visit_type', 'LIKE', '%' . $request->tour_search_visitType . '%');
            }

            if ($request->filled('tour_number')) {
                $tours = $tours->where('id', 'LIKE', '%' . $request->tour_number . '%');
            }

            if ($request->filled('tour_search_city')) {
                $tours = $tours->where('city', 'LIKE', '%' . $request->tour_search_city . '%');
            }

            if ($request->filled('tour_search_region')) {
                $tours = $tours->where('region', 'LIKE', '%' . $request->tour_search_region . '%');
            }

            if ($request->filled('tour_search_datefrom') && $request->filled('tour_search_dateto')) {
                $tours = $tours->where('required_date', '>=', $request->tour_search_datefrom)
                    ->where('required_date', '<=', $request->tour_search_dateto);
            }

            $tours = $tours->latest()->get();
        } else {
            return redirect()->back();
        }
        return view('tours.searchtour', compact('tours'));
    }
}
