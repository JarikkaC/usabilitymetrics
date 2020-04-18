<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\submetric;
use App\metric;

class SubmetricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $submetrics = submetric::all();
        return response()->json($submetrics);
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
        $submetrics = new Submetric();
        $submetrics->submetric_name = $request->get('submetric_name');
        $submetrics->purpose = $request->get('purpose');
        $submetrics->method = $request->get('method');
        $submetrics->measurement = $request->get('measurement');
        $submetrics->scale = $request->get('scale');
        $submetrics->type = $request->get('type');
        $submetrics->input = $request->get('input');
        $submetrics->target = $request->get('target');
        $submetrics->iso = $request->get('iso');

        $metrics = Metric::orderBy('created_at', 'desc')->first();
        $submetrics->metric_id = $metrics->id;

        $submetrics->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $submetrics = new Submetric();
        $submetrics->submetric_name = $request->get('submetric_name');
        $submetrics->purpose = $request->get('purpose');
        $submetrics->method = $request->get('method');
        $submetrics->measurement = $request->get('measurement');
        $submetrics->scale = $request->get('scale');
        $submetrics->type = $request->get('type');
        $submetrics->input = $request->get('input');
        $submetrics->target = $request->get('target');
        $submetrics->iso = $request->get('iso');
        $submetrics->update();
        return response()->json($submetrics);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $submetrics = Submetric::find($id);
        $submetrics->delete();
        return response()->json($submetrics);
    }
}
