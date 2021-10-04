<?php

namespace App\Http\Controllers;

use App\Models\Commercial;
use App\Models\Category;
use Illuminate\Http\Request;

class CommercialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commercial = Commercial::get();

        return
            view('commercial.index', compact('commercial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $commercial = new Commercial();
        $category = Category::parent()->with('children')->get();

        return view('commercial.manage', compact('commercial', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|int',
            'name' => 'required|string',
            'content' => 'required|string',
            'type' => 'required|in:'.implode(',', Commercial::TYPES),
        ]);

        Commercial::create($request->only(['name', 'content', 'type', 'category_id']));

        return redirect()->route('commercial.index')
            ->with('success', 'New commercial ad created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commercial  $commercial
     * @return \Illuminate\Http\Response
     */
    public function show(Commercial $commercial)
    {
        return view('commercial.show', compact('commercial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commercial  $commercial
     * @return \Illuminate\Http\Response
     */
    public function edit(Commercial $commercial)
    {
        $category = Category::parent()->with('children')->get();

        return view('commercial.manage', compact('commercial', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commercial  $commercial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commercial $commercial)
    {
        $request->validate([
            'category_id' => 'required|int',
            'name' => 'required|string',
            'content' => 'required|string',
            'type' => 'required|in:'.implode(',', Commercial::TYPES),
        ]);

        $commercial->update($request->only(['name', 'content', 'type', 'category_id']));

        return redirect()->route('commercial.index')
            ->with('success', 'Commercial ad updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commercial  $commercial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commercial $commercial)
    {
        $commercial->delete();

        return redirect()->route('commercial.index')
            ->with('success', 'Commercial ad deleted successfully');
    }
}
