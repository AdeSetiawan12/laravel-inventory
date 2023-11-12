<?php

namespace App\Http\Controllers;
use App\Models\MasterBarangModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class DeleteHistoryController extends Controller
{
    public function index() {
        $barang = MasterBarangModel::where('status', 0) -> get();
        return view('master/barang/delete-history', compact('barang'));
    }

    public function update($id_barang)
    {
        try {
                $update = MasterBarangModel::
                where(['id' => $id_barang])->update([
                    'status' => 1,
                ]);
        
                if($update) {
                    return redirect()
                    ->route('delete-history')
                    ->with('success', 'berhasil restore item barang');
                }
            }
            catch (\Throwable $th) 
            { 
                return redirect()
                ->route('delete-history')
                ->with('danger', $th->getMessage());
            }
        
    }
}
