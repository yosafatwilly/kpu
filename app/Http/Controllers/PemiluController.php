<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Pemilu;
use App\Paslon;
use App\User;
use DB;
use Auth;
use Mail;
use App\Mail\TokenPemilu;

class PemiluController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware(['auth', 'clearance'])->except('index', 'show');
    }

    public function index() {
        $pemilu = Pemilu::orderby('id', 'desc')->paginate(5);
        return view('pemilu.index', compact('pemilu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('pemilu.create');
    }

    public function profile() {
        $pemilu = Pemilu::whereIn('id', function($query) {
                    $query->select('pemilu_id')
                            ->from('user_has_pemilu')
                            ->where('user_id', Auth::user()->id);
                })->get();
//        dd($pemilu);
        return view('profile.index', compact('pemilu'));
    }

    public function reg(Request $data, $id) {
        $validation = Validator::make($data->all(), ['password' => 'required|string|min:6|confirmed']);
        if ($validation->fails()) {
            return redirect()->route('pemilu.show', $id)->withErrors($validation->errors())->with('flash', '');
        }
        if (Auth::attempt(['nim' => Auth::user()->nim, 'password' => $data->password])) {
            $check = DB::table('user_has_pemilu')
                    ->where('user_id', '=', Auth::user()->id)
                    ->where('pemilu_id', '=', $id)
                    ->first();

            if (is_null($check)) {//not exist
                $pemilu = Pemilu::findOrFail($id);
                $token = str_random(10);
                Mail::to(Auth::user()->email)->send(new TokenPemilu($token, $pemilu));
                $userhaspemilu = [
                    'user_id' => Auth::user()->id,
                    'pemilu_id' => $id,
                    'token' => $token,
                ];
                DB::table('user_has_pemilu')->insert($userhaspemilu);
                return redirect()->route('pemilu.show', $id)->with('flash_message', 'Silahkan check email ' . Auth::user()->email);
            } else {//exist
                return redirect()->route('pemilu.show', $id)->with('flash_message_danger', 'Anda sudah terdaftar sebagai pemilih di pemilu ini.');
            }
        } else {
            return redirect()->route('pemilu.show', $id)->with('flash_message_danger', 'Password Anda Salah');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected $validationPemiluRules = [
        'tema_pemilu' => 'required',
        'penyelenggara' => 'required',
        'periode' => 'required',
        'start_daftar' => 'required|date',
        'end_daftar' => 'required|date|after:start_daftar',
        'start_pemilu' => 'required|date|after:start_daftar',
        'end_pemilu' => 'required|date|after:start_pemilu',
    ];
    protected $validationPaslonRules = [
        'nama_ketua.*' => 'required',
        'nim_ketua.*' => 'required|min:9|max:9',
        'angkatan_ketua.*' => 'required',
        'jurusan_ketua.*' => 'required',
        'nama_wakil.*' => 'required',
        'nim_wakil.*' => 'required|min:9|max:9',
        'angkatan_wakil.*' => 'required',
        'jurusan_wakil.*' => 'required',
        'visi.*' => 'required',
        'misi.*' => 'required',
    ];

    public function store(Request $data) {
        $Pemiluvalidation = Validator::make($data->all(), $this->validationPemiluRules);
        $Paslonvalidation = Validator::make($data->all(), $this->validationPaslonRules);
        if ($Paslonvalidation->fails()) {
            return redirect()->back()->withErrors($Paslonvalidation->errors())->withInput();
        }
        if ($Pemiluvalidation->fails()) {
            return redirect()->back()->withErrors($Pemiluvalidation->errors())->withInput();
        }

        $id = $this->storePemilu($data);
        $this->storePaslon($data, $id);
        return redirect()->route('pemilu.index')
                        ->with('flash_message', 'Pemilu berhasil dibuat.');
//        dd($data);
    }

    public function storePemilu(Request $data) {
        $logo = "";
        if ($data->hasFile('logo')) {
            $dest = public_path().'/logo';
            $file = $data->logo;
            $extension = $file->getClientOriginalExtension();
            $fileName = rand(1111, 9999) . "." . $extension;
            $file->move($dest, $fileName);
            $logo = $fileName;
        }
        $id = DB::table('pemilu')->insertGetId(
                ['tema_pemilu' => $data->tema_pemilu,
                    'penyelenggara' => $data->penyelenggara,
                    'periode' => $data->periode,
                    'start_daftar' => \Carbon\Carbon::parse($data->start_daftar)->format('Y-m-d'),
                    'end_daftar' => \Carbon\Carbon::parse($data->end_daftar)->format('Y-m-d'),
                    'start_pemilu' => \Carbon\Carbon::parse($data->start_pemilu)->format('Y-m-d'),
                    'end_pemilu' => \Carbon\Carbon::parse($data->end_pemilu)->format('Y-m-d'),
                    'logo' => $logo
                ]
        );
        return $id;
    }

    public function storePaslon(Request $data, $id) {
        $nama_ketua = $data->nama_ketua;
        $nama_wakil = $data->nama_wakil;
        $nim_ketua = $data->nim_ketua;
        $nim_wakil = $data->nim_wakil;
        $angkatan_ketua = $data->angkatan_ketua;
        $angkatan_wakil = $data->angkatan_wakil;
        $jurusan_ketua = $data->jurusan_ketua;
        $jurusan_wakil = $data->jurusan_wakil;
        $foto_paslon = $data->foto_paslon;
        $visi = $data->visi;
        $misi = $data->misi;

        $count = count($nama_ketua);
        $data = [];
        $dest = public_path().'/foto_paslon';

        for ($i = 0; $i < $count; $i++) {
            $file = $foto_paslon[$i];
            $extension = $file->getClientOriginalExtension();
            $fileName = rand(1111, 9999) . "." . $extension;
            $file->move($dest, $fileName);
            $data[] = [
                'nomor_urut' => ($i + 1),
                'nama_ketua' => $nama_ketua[$i],
                'nama_wakil' => $nama_wakil[$i],
                'nim_ketua' => $nim_ketua[$i],
                'nim_wakil' => $nim_wakil[$i],
                'angkatan_ketua' => $angkatan_ketua[$i],
                'angkatan_wakil' => $angkatan_wakil[$i],
                'jurusan_ketua' => $jurusan_ketua[$i],
                'jurusan_wakil' => $jurusan_wakil[$i],
                'foto_paslon' => $fileName,
                'visi' => $visi[$i],
                'misi' => $misi[$i],
                'id_pemilu' => $id,
            ];
        }

        DB::table('paslon')->insert($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $pemilu = Pemilu::findOrFail($id); //Find post of id = $id
        $paslon = DB::table('paslon')->where('id_pemilu', $id)->get();
        return view('pemilu.show', compact(['pemilu', 'paslon']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $pemilu = Pemilu::findOrFail($id);
        return view('pemilu.edit', compact('pemilu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $Pemiluvalidation = Validator::make($request->all(), $this->validationPemiluRules);
        if ($Pemiluvalidation->fails()) {
            return redirect()->back()->withErrors($Pemiluvalidation->errors());
        }
        $pemilu = Pemilu::findOrFail($id);
        $pemilu->tema_pemilu = $request->tema_pemilu;
        $pemilu->penyelenggara = $request->penyelenggara;
        $pemilu->periode = $request->periode;
        $pemilu->start_daftar = \Carbon\Carbon::parse($request->start_daftar)->format('Y-m-d');
        $pemilu->end_daftar = \Carbon\Carbon::parse($request->end_daftar)->format('Y-m-d');
        $pemilu->start_pemilu = \Carbon\Carbon::parse($request->start_pemilu)->format('Y-m-d');
        $pemilu->end_pemilu = \Carbon\Carbon::parse($request->end_pemilu)->format('Y-m-d');
        $logo = "";
        if ($request->hasFile('logo')) {
            $dest = public_path().'/logo';
            $file = $request->logo;
            $extension = $file->getClientOriginalExtension();
            $fileName = rand(1111, 9999) . "." . $extension;
            $file->move($dest, $fileName);
            $logo = $fileName;

            $pemilu->logo = $logo;
            $pemilu->save();
        } else {
            $pemilu->save();
        }

        return redirect()->route('pemilu.show', $pemilu->id)->with('flash_message', 'Pemilu berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $pemilu = Pemilu::findOrFail($id);
        $pemilu->delete();
        return redirect()->route('pemilu.index')
                        ->with('flash_message', 'Pemilu berhasil dihapus.');
    }
}
