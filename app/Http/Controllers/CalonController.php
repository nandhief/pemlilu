<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calon;
use App\Http\Controllers\Traits\FileUploadTrait;

class CalonController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calons = Calon::get();
        return view('calons.index', compact('calons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('calons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image',
        ]);
        $request = $this->saveFiles($request);
        $calon = Calon::create($request->all());
        return redirect()->route('calons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $calon = Calon::find($id);
        return view('calons.show', compact('calon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calon = Calon::find($id);
        return view('calons.edit', compact('calon'));
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
        $this->validate($request, [
            'name' => 'required',
        ]);
        $request = $this->saveFiles($request);
        $calon = Calon::find($id);
        $calon->name = $request->name;
        $calon->wname = $request->wname;
        if (!empty($request->image)) {
            $calon->image = $request->image;
        }
        if (!empty($request->wimage)) {
            $calon->wimage = $request->wimage;
        }
        $calon->save();
        return redirect()->route('calons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calon = Calon::destroy($id);
        return redirect()->route('calons.index');
    }
}
