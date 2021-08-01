<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogMonitoring extends Model
{
    protected $table = 'log_monitorings';
    protected $fillable = ['kode','suhu','kelembaban','hujan','gelap','status_jemur'];
}
