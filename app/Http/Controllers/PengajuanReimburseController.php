<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PengajuanReimburseController extends Controller
{
    public function create()
    {
        return view('reimburse.create');
    }

    public function store(Request $request)
    {
        $processDefKey = 'reimburse-process';
        Http::post("http://localhost:8090/engine-rest/process-definition/key/$processDefKey/start", [
            'variables' => [
                'nama' => [
                    'value' => $request->nama,
                    'type' => 'String'
                ],
                'alamat' => [
                    'value' => $request->alamat,
                    'type' => 'String'
                ],
                'jumlah' => [
                    'value' => $request->jumlah,
                    'type' => 'String'
                ]
            ]
        ]);

        return redirect()->back();
    }
}
