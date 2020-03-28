<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\metric;

class MetricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metrics = metric::with('submetric')->get();
        return response()->json($metrics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $metrics = new Metric();
        $metrics->metric_name = $request->get('metric_name');
        $metrics->save();
        return response()->json($metrics);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
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
        // $metrics = Metric::find($id);
        // $metrics->submetric_name = $request->get('submetric_name');
        // $metrics->purpose = $request->get('purpose');
        // $metrics->method = $request->get('method');
        // $metrics->measurement = $request->get('measurement');
        // $metrics->scale = $request->get('scale');
        // $metrics->type = $request->get('type');
        // $metrics->input = $request->get('input');
        // $metrics->target = $request->get('target');
        // $metrics->iso = $request->get('iso');
        // $metrics->update();
        // return response()->json($metrics);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $metrics = Metric::find($id);
        $metrics->delete();
        return response()->json($metrics);
    }
}
