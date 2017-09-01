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
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }
    	if (!empty($request->kode)) {
            $mhs = Mahasiswa::where([['status', false], ['kode', $request->kode]])->whereGolput(false)->first();
            if (empty($mhs)) {
                $data = Mahasiswa::where('kode', $request->kode)->whereGolput(false)->first();
                session()->flash('error', 'Mohon Hubungi Panitia');
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

    public function dashboard(Request $request)
    {
        $mahasiswa = Mahasiswa::whereNull('kode')->get();
        $onprogres = Mahasiswa::whereNotNull('kode')->whereNull('status')->orderBy('updated_at', 'asc')->get();
        $kode = Mahasiswa::whereNotNull('kode')->where('status', false)->orderBy('updated_at', 'asc')->get();
        $selesai = Mahasiswa::whereNotNull('kode')->where('status', true)->orderBy('updated_at', 'desc')->get();
        if (request()->ajax()) {
            $no = 1;
            foreach ($mahasiswa->toArray() as $r) {
                $r['no'] = $no++;
                $r['action'] = "<form method='POST' action='". route('antri', $r['id']) ."' accept-charset='UTF-8'><input name='_token' type='hidden' value='". csrf_token() ."'> <input class='btn btn-xs btn-info' type='submit' value='Antri'> </form> ";
                $mhs[] = (object) $r;
            }
            $data = collect($mhs);
            return response()->json(compact('data'));
        }
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

    public function antrian()
    {
        $onprogres = Mahasiswa::whereNotNull('kode')->whereNull('status')->orderBy('updated_at', 'asc')->limit(8)->get();
        if (request()->ajax()) {
            return response()->json($onprogres, 200);
        }
        return view('antrian', compact('onprogres'));
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
        return session()->flash('error', 'Terima Kasih sudah Golput');
    }

    public function quick(Request $request)
    {
        $memilih = Calon::withCount(['mahasiswas'])->get();
        $golput = Mahasiswa::whereGolput(true)->get()->count();
        return view('quick', compact('memilih', 'golput'));
    }

    public function count()
    {
        $fake = \Faker\Factory::create('id_ID');
        $mhs = new Mahasiswa;
        $calons = Calon::orderBy('nomor')->get();
        return view('count', compact('mhs', 'calons', 'fake'));
    }
}
