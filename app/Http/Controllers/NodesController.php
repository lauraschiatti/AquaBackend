<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Nodes;
use App\Http\Controllers\Input;


class NodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    //url: /nodes
    public function index()
    {
        $nodes=Nodes::all(); //json data
        return view('nodes.index',compact('nodes')); //pass json data to index view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    //url: /nodes/create
    public function create()
    {
        return view('nodes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $nodes=Request::all();
        Nodes::create($nodes);
        return redirect('nodes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $node=Nodes::find($id);
        return view('nodes.show',compact('node'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $node=Nodes::find($id);
        return view('nodes.edit',compact('node'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $nodeUpdate=Request::all();
        $node=Nodes::find($id);
        $node->update($nodeUpdate);
        return redirect('nodes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Nodes::find($id)->delete();
        return redirect('nodes');
    }
}
