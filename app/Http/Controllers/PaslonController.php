<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Pemilu;
use App\Paslon;
use DB;

class PaslonController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware(['auth', 'clearance'])->except('index', 'show');
    }

    public function index() {
        $paslon = Paslon::orderby('id', 'desc')->paginate(5);
        return view('paslon.index', compact('paslon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id) {
        $pemilu = Pemilu::findOrFail($id);
        return view('paslon.create', compact('pemilu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected $validationRules = [
        'nama_ketua' => 'required',
        'nim_ketua' => 'required|min:9|max:9',
        'angkatan_ketua' => 'required|date_format:"Y"',
        'jurusan_ketua' => 'required',
        'nama_wakil' => 'required',
        'nim_wakil' => 'required|min:9|max:9',
        'angkatan_wakil' => 'required|date_format:"Y"',
        'jurusan_wakil' => 'required',
        'visi' => 'required',
        'misi' => 'required',
    ];

    public function store(Request $data) {
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
        $id_pemilu = $data->id;

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
                'id_pemilu' => $id_pemilu,
            ];
        }

        DB::table('paslon')->insert($data);
        return redirect()->route('pemilu.show', $id_pemilu)
                        ->with('flash_message', 'Pemilu berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $paslon = Paslon::findOrFail($id);

        return view('paslon.edit', compact('paslon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $validation = Validator::make($request->all(), $this->validationRules);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors());
        }
        $paslon = Paslon::findOrFail($id);
        $paslon->nama_ketua = $request->nama_ketua;
        $paslon->nama_wakil = $request->nama_wakil;
        $paslon->nim_ketua = $request->nim_ketua;
        $paslon->nim_wakil = $request->nim_wakil;
        $paslon->angkatan_ketua = $request->angkatan_ketua;
        $paslon->angkatan_wakil = $request->angkatan_wakil;
        $paslon->jurusan_ketua = $request->jurusan_ketua;
        $paslon->visi = $request->visi;
        $paslon->misi = $request->misi;

        if ($request->hasFile('foto_paslon')) {
            $foto_paslon = "";
            $dest = public_path().'/foto_paslon';
            $file = $request->foto_paslon;
            $extension = $file->getClientOriginalExtension();
            $fileName = rand(1111, 9999) . "." . $extension;
            $file->move($dest, $fileName);
            $foto_paslon = $fileName;

            $paslon->foto_paslon = $foto_paslon;
            $paslon->save();
        } else {
            $paslon->save();
        }

        return redirect()->route('pemilu.show', $paslon->id_pemilu)->with('flash_message', 'Pemilu berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $paslon = Paslon::findOrFail($id);
        $id = $paslon->id_pemilu;
        $paslon->delete();

        return redirect()->route('pemilu.show', $id)
                        ->with('flash_message', 'Paslon berhasil dihapus.');
    }

}
