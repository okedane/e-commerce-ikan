<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function generatePDF()
    {
        $transaksi = Transaksi::with(['user', 'produk'])->get();

        $data = [
            'title' => 'Laporan Transaksi',
            'date' => date('m/d/Y'),
            'transaksi' => $transaksi, // Pastikan nama variabelnya "transaksi"
        ];

        $pdf = Pdf::loadView('backend.transaksi.pdf', $data);

        return $pdf->download('laporan_transaksi.pdf');
    }
}