<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paslon extends Model {

    protected $table = 'paslon';
    protected $fillable = [
        'nomor_urut', 
        'nama_ketua', 
        'nama_wakil', 
        'nim_ketua', 
        'nim_wakil', 
        'angkatan_ketua', 
        'angkatan_wakil', 
        'jurusan_ketua', 
        'jurusan_wakil', 
        'visi', 
        'misi', 
        'foto_paslon', 
        'id_pemilu'];

}
