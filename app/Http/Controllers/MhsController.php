<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class MhsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::get();
        return view('mhs.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mhs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('mhs')) {
            $data = \Excel::load($request->mhs, function () {})->get();
            foreach ($data->toArray() as $res) {
                if (is_null(Mahasiswa::whereNim($res['nim'])->first())) {
                    Mahasiswa::create($res);
                }
            }
            session()->flash('message', 'Berhasil Import data mahasiswa');
        } else {
            $this->validate($request, [
                'name' => 'required',
                'nim' => 'required',
            ]);
            $mhs = Mahasiswa::create($request->all());
            session()->flash('message', 'Berhasil simpan data mahasiswa');
        }
        return redirect()->route('mhs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mhs = Mahasiswa::find($id);
        return view('mhs.show', compact('mhs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mhs = Mahasiswa::find($id);
        return view('mhs.edit', compact('mhs'));
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
            'nim' => 'required',
        ]);
        $mhs = Mahasiswa::find($id)->update($request->all());
        return redirect()->route('mhs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mhs = Mahasiswa::destroy($id);
        return redirect()->route('mhs.index');
    }
}
