<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogMonitoring;
use App\Alat;

class ApiController extends Controller
{
    public function kirim_data(Request $request)
    {
        $kode = $request->input('kodeAlat');
        $suhu = $request->input('suhu');
        $kelembaban = $request->input('kelembaban');
        $hujan = $request->input('hujan');
        $gelap = $request->input('gelap');

        $alat = Alat::where('kode', $kode)->first();

        if ($suhu >= $alat->suhu_min && $suhu <= $alat->suhu_max) {
            $statusJemur = 1;
        } else {
            $statusJemur = 0;
        }

        LogMonitoring::create([
            'kode' => $kode,
            'suhu' => $suhu,
            'kelembaban' => $kelembaban,
            'hujan' => $hujan,
            'gelap' => $gelap,
            'status_jemur' => $statusJemur,
        ]);

        if ($statusJemur == 1) {
            $alat->update(['status_jemur' => 1]);
        } else {
            $alat->update(['status_jemur' => 0]);
        }

        return 'create data success';
    }

    public function status_jemur(Request $request)
    {
        $kode = $request->input('kodeAlat');

        $alat = Alat::where('kode', $kode)->first();
        $data = $alat->status_jemur;

        return response()->json($data, 200);
    }
}
