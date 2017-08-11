<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calon;
use App\Mahasiswa;
use App\Setting;

class PageController extends Controller
{
    public function index(Request $request)
    {
    	if (!empty($request->kode)) {
            $mhs = Mahasiswa::where([['status', false], ['kode', $request->kode]])->whereGolput(false)->first();
            if (empty($mhs)) {
                $data = Mahasiswa::where('kode', $request->kode)->whereGolput(false)->first();
                session()->flash('error', 'Mohon reload browser');
                if (empty($data)) {
                    session()->flash('error', 'Kode salah');
                }
            }
    	} else {
    		$mhs = null;
    	}
    	$calons = Calon::get();
    	return view('pemilu', compact('calons', 'mhs'));
    }

    public function dashboard()
    {
        $mahasiswa = Mahasiswa::whereNull('kode')->get();
        $onprogres = Mahasiswa::whereNotNull('kode')->whereNull('status')->orderBy('updated_at', 'asc')->get();
        $kode = Mahasiswa::whereNotNull('kode')->where([['status', false]])->orderBy('updated_at', 'asc')->get();
        $selesai = Mahasiswa::whereNotNull('kode')->where([['status', true]])->orderBy('updated_at', 'desc')->get();
        return view('home', compact('mahasiswa', 'kode', 'onprogres', 'selesai'));
    }

    public function antri(Request $request, $id)
    {
        $mhs = Mahasiswa::find($id);
        $kode = strtolower(str_random(3));
        do {
            $kode = Mahasiswa::whereKode($kode)->first() ? strtolower(str_random(3)) : $kode;
        } while (count(Mahasiswa::whereKode($kode)->first()) == 1);
        $mhs->kode = $kode;
        $mhs->save();
        return redirect()->back();
    }

    public function proses(Request $request, $id)
    {
        $mhs = Mahasiswa::find($id)->update(['status' => false]);
        return redirect()->back();
    }

    public function memilih(Request $request, $calon, $mhs)
    {
        Mahasiswa::find($mhs)->update(['status' => true]);
        Mahasiswa::find($mhs)->calon()->associate(Calon::find($calon))->save();
        return redirect()->route('home');
    }

    public function golput(Request $request)
    {
        $mhs = Mahasiswa::find($request->id)->update(['golput' => true, 'status' => true]);
        dd($mhs);
    }

    public function quick(Request $request)
    {
        $memilih = Calon::withCount(['mahasiswas'])->get();
        $golput = Mahasiswa::whereGolput(true)->get()->count();
        return view('quick', compact('memilih', 'golput'));
    }
}
