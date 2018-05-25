<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemilu extends Model {

    protected $table = 'pemilu';
    protected $fillable = ['tema_pemilu', 'penyelenggara', 'periode', 'start_daftar','end_daftar', 'start_pemilu', 'end_pemilu', 'logo'];

}
