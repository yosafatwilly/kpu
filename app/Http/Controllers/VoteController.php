<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Pemilu;
use App\Paslon;
use DB;
use Auth;
use App\User;
use App\Vote;

class VoteController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware(['auth', 'clearance'])->except('index');
    }

    public function index() {
        $pemilu = Pemilu::orderby('id', 'desc')->paginate(5); //show only 5 items at a time in descending order
        return view('vote.index', compact('pemilu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id) {
        $check = DB::table('user_has_pemilu')
                ->where('user_id', '=', Auth::user()->id)
                ->where('pemilu_id', '=', $id)
                ->first();
        if (is_null($check)) { //not exist
            return redirect()->route('vote.index', $id)->with('flash_message_danger', 'Anda tidak terdaftar sebagai pemilih di pemilu ini. Klik ' . '<a href="pemilu/' . $id . '">disini</a>' . ' untuk daftar');
        } else { //exist
            $validation = Validator::make($request->all(), [
                        'paslon_id' => 'required',
                        'token' => 'required|string|min:10|max:10'
            ]);
            if ($validation->fails()) {
                return redirect()->back()->with('flash_message_danger', 'Validation Error');
            }
            DB::table('Vote')->insert(
                    [
                        'paslon_id' => $request->paslon_id,
                        'pemilu_id' => $id,
                    ]
            );
            DB::table('user_has_pemilu')
                    ->where('user_id', Auth::user()->id)
                    ->where('pemilu_id', $id)
                    ->update(['token' => null]);
            return redirect()->route('vote.index')->with('flash_message', 'Terimakasih sudah memberikan suara');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $pemilu = Pemilu::findOrFail($id); //Find post of id = $id
        $check = DB::table('user_has_pemilu')
                ->where('user_id', '=', Auth::user()->id)
                ->where('pemilu_id', '=', $id)
                ->first();
        if (\Carbon\Carbon::today()->gte(\Carbon\Carbon::parse($pemilu->start_pemilu)) AND ( \Carbon\Carbon::parse($pemilu->end_pemilu)->gte(\Carbon\Carbon::today()))) {
            if (is_null($check)) { //not exist
                if (\Carbon\Carbon::today()->gte(\Carbon\Carbon::parse($pemilu->start_daftar)) AND ( \Carbon\Carbon::parse($pemilu->end_daftar)->gte(\Carbon\Carbon::today()))) {
                    return redirect()->back()->with('flash_message_danger', 'Anda tidak terdaftar sebagai pemilih di pemilu ini. Klik ' . '<a href="pemilu/' . $id . '">disini</a>' . ' untuk daftar');
                } else if (\Carbon\Carbon::today()->gte(\Carbon\Carbon::parse($pemilu->start_daftar))) {
                    return redirect()->back()->with('flash_message_danger', 'Anda tidak terdaftar sebagai pemilih di pemilu ini.');
                } else {
                    return redirect()->back()->with('flash_message_danger', 'Anda belum terdaftar sebagai pemilih di pemilu ini. Pendaftaran sebagai pemilih belum dibuka.');
                }
            } else { //exist
                if (is_null($check->token)) { //jika null
                    return redirect()->back()->with('flash_message_danger', 'Maaf, anda sudah melakukan pemilihan untuk pemilu ini.');
                }
                $paslon = DB::table('paslon')->where('id_pemilu', $id)->get();
                return view('vote.show', compact(['pemilu', 'paslon']));
            }
        } else if (\Carbon\Carbon::today()->gte(\Carbon\Carbon::parse($pemilu->start_pemilu))) {
            if (is_null($check)) { //not exist
                return redirect()->back()->with('flash_message_danger', $pemilu->tema_pemilu . ' sudah selesai. Anda tidak terdaftar sebagai pemilih.');
            } else { //exist
                return redirect()->back()->with('flash_message_danger', $pemilu->tema_pemilu . ' sudah selesai');
            }
        } else { //blm dimulai
            if (is_null($check)) { //not exist
                if (\Carbon\Carbon::today()->gte(\Carbon\Carbon::parse($pemilu->start_daftar)) AND ( \Carbon\Carbon::parse($pemilu->end_daftar)->gte(\Carbon\Carbon::today()))) {
                    return redirect()->back()->with('flash_message_danger', 'Pemilu belum dimulai. Anda tidak terdaftar sebagai pemilih di pemilu ini. Klik ' . '<a href="pemilu/' . $id . '">disini</a>' . ' untuk daftar');
                } else if (\Carbon\Carbon::today()->gte(\Carbon\Carbon::parse($pemilu->start_daftar))) {
                    return redirect()->back()->with('flash_message_danger', 'Pemilu belum dimulai. Anda tidak terdaftar sebagai pemilih di pemilu ini.');
                } else {
                    return redirect()->back()->with('flash_message_danger', 'Pemilu belum dimulai. Silahkan mendaftar sesuai tanggal yang ditentukan.');
                }
            } else { //exist
                return redirect()->back()->with('flash_message_danger', 'Pemilu belum dimulai. Silahkan memilih sesuai tanggal yang ditentukan.');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
