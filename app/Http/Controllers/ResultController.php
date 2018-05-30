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

class ResultController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware(['auth', 'clearance'])->except('index', 'show', 'result');
    }

    public function index() {
        $sql = "SELECT * FROM pemilu WHERE id IN (SELECT DISTINCT pemilu_id FROM vote) ORDER BY start_pemilu DESC";
        $pemilu = DB::select($sql);
        return view('result.index', compact('pemilu'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $pemilu = Pemilu::findOrFail($id);
        
        $sql = "SELECT COUNT(*) AS count FROM user_has_pemilu WHERE pemilu_id = ".$id;
        $tmp = DB::select($sql);
        $jumlah_pemilih = $tmp[0]->count;
        
        $sql1 = "SELECT COUNT(*) AS count FROM VOTE WHERE pemilu_id = ".$id;
        $tmp1 = DB::select($sql1);
        $jumlah_vote = $tmp1[0]->count;
        
        $sql2 =     "SELECT *, COUNT(id) AS count
                    FROM vote 
                    JOIN paslon ON paslon.id = vote.paslon_id 
                    WHERE pemilu_id = ".$id." GROUP BY id";
        $paslon = DB::select($sql2);
        
        return view('result.show', compact(['pemilu', 'paslon', 'jumlah_pemilih', 'jumlah_vote']));
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
    public function store(Request $request) {
        //
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
