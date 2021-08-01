<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    protected $table = 'alats';
    protected $fillable = ['kode','nama','suhu_min','suhu_max','status_jemur'];
}
