<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Models\Tour;
use App\Models\Agricultural;
use App\Models\Animal;
use App\Models\Disease;
use App\Models\Farmer;
use App\Models\Pest;
use App\Models\VFarmer;
use Illuminate\Http\Request;

class VisitController extends Controller
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
    public function addVisit(Request $request)
    {
        $request->validate(
            [
                'visit_date' => 'required',
                'farmer_cardid' => 'required',
                'visit_status' => 'required',
                'visit_description' => 'required',
                'guidance_description' => 'required',
            ],
            [
                'visit_date.required' => 'يجب ادخال تاريخ الزيارة',
                'farmer_cardid.required' => 'يجب ادخال بطاقة المزارع',
                'visit_status.required' => 'يجب ادخال حالة الزيارة',
                'visit_description.required' => 'يجب ادخال وصف الزيارة',
                'guidance_description.required' => 'يجب ادخال وصف الإرشاد',
            ]
        );

        $visit_id = Visit::create([
            'tour_id' => $request->tour_id,
            'visit_date' => $request->visit_date,
            'farmer_cardid' => $request->farmer_cardid,
            'visit_status' => $request->visit_status,
            'visit_description' => $request->visit_description,
            'guidance_description' => $request->guidance_description,
            'note' => $request->note,
        ]);

        $visit_id = $visit_id->id;

        if ($request->filled('agricultural_class')) {
            if ($request->type == 'زراعة') {

                $files = [];
                if ($request->file('pest_image')) {
                    foreach ($request->file('pest_image') as $key => $file) {
                        $fileName = time() . rand(1, 99) . '.' . $file->extension();
                        $file->move(public_path('uploads/pest_image'), $fileName);
                        $files[]['name'] = $fileName;
                    }
                }

                foreach ($request->agricultural_class as $key => $insert) {
                    Pest::create([
                        'visit_id' => $visit_id,
                        'agricultural_class' => $request->agricultural_class[$key],
                        'pest_name' => $request->pest_name[$key],
                        'pest_image' => 'uploads/pest_image/' . $files[$key]['name'],
                        'pest_image_description' => $request->pest_image_description[$key],
                    ]);
                }
            }
        } else {
            if ($request->filled('animal_class')) {

                $files = [];
                if ($request->file('disease_image')) {
                    foreach ($request->file('disease_image') as $key => $file) {
                        $fileName = time() . rand(1, 99) . '.' . $file->extension();
                        $file->move(public_path('uploads/disease_image'), $fileName);
                        $files[]['name'] = $fileName;
                    }
                }

                foreach ($request->animal_class as $key => $insert) {

                    Disease::create([
                        'visit_id' => $visit_id,
                        'animal_class' => $request->animal_class[$key],
                        'disease_name' => $request->disease_name[$key],
                        'disease_image' => 'uploads/disease_image/' . $files[$key]['name'],
                        'disease_image_description' => $request->disease_image_description[$key],
                    ]);
                }
            }
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function show(Visit $visit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function edit(Visit $visit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visit $visit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function deleteVisit(Request $request)
    {
        Visit::find($request->visit_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function fetch(Request $request)
    {

        $res = VFarmer::select("farmer_cardId")->where("tour_id", "LIKE", "%{$request->tour_id}%")
            ->get();

        // $res = Farmer::select("card_id")
        //     ->where("card_id", "LIKE", "%{$request->term}%")
        //     ->get();

        return response()->json($res);
    }


    public function getAgricultural()
    {
        $pestAgricultural = Agricultural::with('agriculturalpests')->get();
        if (count($pestAgricultural) > 0) {
            return response()->json($pestAgricultural);
        }
    }

    public function getAnimal()
    {
        $diseaseAnimal = Animal::with('animaldiseases')->get();
        if (count($diseaseAnimal) > 0) {
            return response()->json($diseaseAnimal);
        }
    }


    public function search(Request $request)
    {

        if (
            $request->filled('search_visitType') || $request->filled('search_class')
            || $request->filled('search_type') || $request->filled('search_city')
            || $request->filled('search_region') || $request->filled('search_datefrom')
            || $request->filled('search_dateto')
        ) {

            $visits = Visit::query();
            if ($request->filled('search_visitType')) {
                $search_visitType = $request->search_visitType;
                $visits = $visits->whereHas('TourVisit', function ($q) use ($search_visitType) {
                    $q->where('visit_type', 'LIKE', '%' . $search_visitType . '%');
                });
            }

            if ($request->filled('search_class') && $request->search_visitType == 'زراعة') {
                $search_class = $request->search_class;
                $visits = $visits->whereHas('pests', function ($q) use ($search_class) {
                    $q->where('agricultural_class', 'like', '%' . $search_class . '%');
                });
            }

            if ($request->filled('search_type') && $request->search_visitType == 'زراعة') {
                $search_type = $request->search_type;
                $visits = $visits->whereHas('pests', function ($q) use ($search_type) {
                    $q->where('pest_name', 'like', '%' . $search_type . '%');
                });
            }

            if ($request->filled('search_class') && $request->search_visitType == 'بيطرة') {
                $search_class = $request->search_class;
                $visits = $visits->whereHas('diseases', function ($q) use ($search_class) {
                    $q->where('animal_class', 'like', '%' . $search_class . '%');
                });
            }

            if ($request->filled('search_type') && $request->search_visitType == 'بيطرة') {
                $search_type = $request->search_type;
                $visits = $visits->whereHas('diseases', function ($q) use ($search_type) {
                    $q->where('disease_name', 'like', '%' . $search_type . '%');
                });
            }

            if ($request->filled('search_city')) {
                $search_city = $request->search_city;
                $visits = $visits->whereHas('TourVisit', function ($q) use ($search_city) {
                    $q->where('city', 'LIKE', '%' . $search_city . '%');
                });
            }

            if ($request->filled('search_region')) {
                $search_region = $request->search_region;
                $visits = $visits->whereHas('TourVisit', function ($q) use ($search_region) {
                    $q->where('region', 'LIKE', '%' . $search_region . '%');
                });
            }

            if ($request->filled('search_datefrom') && $request->filled('search_dateto')) {
                $search_datefrom = $request->search_datefrom;
                $search_dateto = $request->search_dateto;
                $visits = $visits->where('visit_date', '>=', $search_datefrom)->where('visit_date', '<=', $search_dateto);
            }

            $visits = $visits->with('FarmerVisit')->latest()->get();
        } else {
            return redirect()->back();
        }
        return view('tours.searchvisit', compact('visits'));
    }
}
