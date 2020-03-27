<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\metricmodel;
use App\metric;
use App\submetric;
class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelmetrics = metricmodel::with('metric')->with('submetric')->get();
        return response()->json($modelmetrics);
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
    public function store(Request $request)
    {
        $metricmodels = new Metricmodel();
        $metricmodels ->project_id = $request->get('project_id');
        $metricmodels ->submetric_id= $request->get('submetric_id');
        $metricmodels ->metric_id= $request->get('metric_id');
        $metricmodels->picture_path = $request->get('picture_path');

        $file_data = $request->get('image');
        $file_name = $request->get('picture_path');

        @list($type, $file_data) = explode(';', $file_data);
        @list(, $file_data) = explode(',', $file_data);
        if ($file_data != "") { // storing image in storage/app/public Folder
            \Storage::disk('public')->put($file_name, base64_decode($file_data));
        }

        $metricmodels->picture_path = $file_name;


        $metricmodels ->save();
        return response()->json($metricmodels );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $metricmodels = Metricmodel::where('project_id', '=', $id)->with('metric')->with('submetric')->get();
        return response()->json($metricmodels);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
