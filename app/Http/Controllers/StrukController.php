<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Struk;
use Illuminate\Support\Facades\DB;

class StrukController extends Controller
{
    public function create()
    {
        return view('struks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'raw_receipt_text' => 'required|string'
        ]);

        $rawText = $request->input('raw_receipt_text');

        $parsedData = [
            'store_name' => 'Indomaret PENS',
            'receipt_date' => '2026-04-19',
            'total_amount' => 35000,
            'items' => [
                ['item_name' => 'Kopi Kapal Api', 'quantity' => 2, 'unit_price' => 5000, 'subtotal' => 10000],
                ['item_name' => 'Roti Aoka', 'quantity' => 5, 'unit_price' => 5000, 'subtotal' => 25000],
            ]
        ];

        try {
            DB::beginTransaction();

            $struk = Struk::create([
                'store_name' => $parsedData['store_name'],
                'receipt_date' => $parsedData['receipt_date'],
                'total_amount' => $parsedData['total_amount'],
            ]);

            foreach ($parsedData['items'] as $item) {
                $struk->items()->create([
                    'item_name' => $item['item_name'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'subtotal' => $item['subtotal'],
                ]);
            }

            DB::commit();

            return back()->with('success', 'Struk berhasil diproses dan disimpan!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal memproses struk: ' . $e->getMessage());
        }
    }
}