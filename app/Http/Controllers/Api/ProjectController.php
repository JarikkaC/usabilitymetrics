<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = project::all();
        return response()->json($projects);
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
        $projects = new Project();
        $projects->project_name = $request->get('project_name');
        $projects->description = $request->get('description');
        $projects->user_id = $request->get('user_id');
        $projects->save();
        return response()->json($projects);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projects = Project::find($id);
        return response()->json($projects);
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
       

        if($request->get('Delete')) {
            $projects = Project::find($id);
            $projects->update();
            return response()->json($projects);
        } else {
            $projects = Project::find($id);
            $projects->project_name = $request->get('project_name');
            $projects->description = $request->get('description');
            $projects->update();
            return response()->json($projects);
        }


        // if ($request->get('Delete')) {
        //     $product = Product::find($id);
        //     $product->available = $request->get('availableVal');
        //     $product->update();
        //     return response()->json($product);
        // } else {
        //     $product = Product::find($id);
        //     $product->name = $request->get('name');
        //     $product->price = $request->get('price');
        //     $product->update();
        //     return response()->json($product);
        // }
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
