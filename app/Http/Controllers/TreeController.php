<?php

namespace App\Http\Controllers;

use App\Models\Tree;
use Illuminate\Http\Request;

class TreeController extends Controller
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
    public function addTree(Request $request)
    {
        $request->validate(
            [
                'tree_name' => 'required',
                'tree_history' => 'required',
                'tree_area' => 'required',
                'tree_number' => 'required',
                'tree_irrigation' => 'required',
                'tree_recession' => 'required',
            ],
            [
                'tree_name.required' => 'يجب ادخال اسم الشجرة',
                'tree_history.required' => 'يجب ادخال تاريخ الزراعة',
                'tree_area.required' => 'يجب ادخال مساحة الأشجار المزروعة',
                'tree_number.required' => 'يجب ادخال عدد الأشجار',
                'tree_irrigation.required' => 'يجب ادخال طريقة الري',
                'tree_recession.required' => 'يجب ادخال الكساد',
            ]
        );

        Tree::create([
            'land_id' => $request->land_id,
            'tree_name' => $request->tree_name,
            'tree_history' => $request->tree_history,
            'tree_area' => $request->tree_area,
            'tree_number' => $request->tree_number,
            'tree_irrigation' => $request->tree_irrigation,
            'tree_recession' => $request->tree_recession,
            'tree_protection' => $request->tree_protection,
            'tree_recession_reason' => $request->tree_recession_reason,
            'tree_endDate' => $request->tree_enddate,
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tree  $tree
     * @return \Illuminate\Http\Response
     */
    public function show(Tree $tree)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tree  $tree
     * @return \Illuminate\Http\Response
     */
    public function edit(Tree $tree)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tree  $tree
     * @return \Illuminate\Http\Response
     */
    public function updateTree(Request $request)
    {
        $request->validate(
            [
                'edit_tree_name' => 'required',
                'edit_tree_history' => 'required',
                'edit_tree_area' => 'required',
                'edit_tree_number' => 'required',
                'edit_tree_irrigation' => 'required',
                'edit_tree_recession' => 'required',
            ],
            [
                'edit_tree_name.required' => 'يجب ادخال نوع الشجرة',
                'edit_tree_history.required' => 'يجب ادخال تاريخ الزراعة',
                'edit_tree_area.required' => 'يجب ادخال مساحة الأشجار المزروعة',
                'edit_tree_number.required' => 'يجب ادخال عدد الأشجار',
                'edit_tree_irrigation.required' => 'يجب ادخال طريقة الري',
                'edit_tree_recession.required' => 'يجب ادخال الكساد',
            ]
        );

        Tree::where('id', $request->edit_id)->update([
            'land_id' => $request->land_id,
            'tree_name' => $request->edit_tree_name,
            'tree_history' => $request->edit_tree_history,
            'tree_area' => $request->edit_tree_area,
            'tree_number' => $request->edit_tree_number,
            'tree_irrigation' => $request->edit_tree_irrigation,
            'tree_recession' => $request->edit_tree_recession,
            'tree_protection' => $request->edit_tree_protection,
            'tree_recession_reason' => $request->edit_tree_recession_reason,
            'tree_endDate' => $request->edit_tree_enddate,
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tree  $tree
     * @return \Illuminate\Http\Response
     */
    public function deleteTree(Request $request)
    {
        Tree::find($request->tree_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }
}
