<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calon;
use App\Mahasiswa;

class PageController extends Controller
{
    public function index(Request $request)
    {
    	if (!empty($request->kode) or !is_null($request->kode)) {
            $mhs = Mahasiswa::where([['status', false], ['kode', $request->kode]])->first();
    	} else {
    		$mhs = null;
    	}
    	$calons = Calon::get();
    	return view('pemilu', compact('calons', 'mhs'));
    }

    public function dashboard()
    {
        $mahasiswa = Mahasiswa::whereNull('kode')->whereNull('status')->get();
        $onprogres = Mahasiswa::whereNotNull('kode')->where([['status', false]])->orderBy('updated_at', 'asc')->get();
        $selesai = Mahasiswa::whereNotNull('kode')->where([['status', true]])->orderBy('updated_at', 'desc')->get();
        return view('home', compact('mahasiswa', 'onprogres', 'selesai'));
    }

    public function antri(Request $request, $id)
    {
        Mahasiswa::find($id)->update($request->all());
        return redirect()->back();
    }

    public function proses(Request $request, $id)
    {
        Mahasiswa::find($id)->update($request->all());
        return redirect()->back();
    }

    public function memilih(Request $request, $calon, $mhs)
    {
        Mahasiswa::find($mhs)->update(['status' => true]);
        Calon::find($calon)->mahasiswas()->associate(Mahasiswa::find($mhs));
        return redirect()->route('home');
    }

    public function golput(Request $request)
    {
        dd($request->all());
    }
}
