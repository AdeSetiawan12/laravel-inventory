<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterKategoriModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MasterKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $kategori = MasterKategoriModel::where('status', 1)->get();
        return view('master/kategori/index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        {
            return view('master/kategori/form-tambah');
         }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //aturan untuk inputan master Kategori
         $aturan =[
             'html_kode' => 'required|min:3|max:7|alpha_dash|unique:master_kategori,kode',
             'html_nama_kategori' => 'required|min:10|max:25',
             'html_deskripsi' => 'required|max:255',
         ];
         //membuat pesan bhs indonesia
         $pesan_indo = [
             'required' => 'Wajib di isi Bos!',
             'min' => 'Minimal :min Karakter',
             'unique' => 'Kode Barang tidak boleh sama',
         ];
         $validator = validator::make($request->all(), $aturan, $pesan_indo);
         try {
             // jika inputan user tidak sesuai dengan aturan validasi
             if ($validator->fails()) {
                 return redirect()
                 ->route('master-kategori-tambah')
                 ->withErrors($validator)->withInput();
             } else {
                 // jika inputan user sesuai
                 //simpan ke database
                 $insert = MasterKategoriModel::create([
                     'kode'              => strtoupper($request->html_kode),
                     'nama_kategori'     => $request->html_nama_kategori,
                     'deskripsi'         => $request->html_deskripsi,
                     'status'            => 1,
                     'id_kategori'       => null,
                     'id_gudang'         => null,
                     'dibuat_kapan'      => date('Y-m-d H:i:s'),
                     'dibuat_oleh'       => Auth::user()->id,
                     'diperbarui_kapan'  => null,
                     'diperbarui_oleh'   => null,
                 ]);
             // jika proses insert berhasil 
             if ($insert) {
                 return redirect()
                 ->route('master-kategori')
                 ->with('success', 'Berhasil menambahkan kategori baru!');
             }
             }
        
         } catch(\Throwable $th) {
             return redirect()
             ->route('master-kategori-tambah')
             ->with('danger', $th->getMessage());
         }
     }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
        $kategori = DB::select(
            "SELECT
            mkg.*,
            u1.name as dibuat_nama, u1.email as dibuat_email,
            u2.name as diperbarui_nama, u2.email as diperbarui_email
            FROM master_kategori as mkg
            LEFT JOIN users as u1 ON mkg.dibuat_oleh = u1.id
            LEFT JOIN users as u2 ON mkg.diperbarui_oleh = u2.id
            WHERE mkg.id = ?;", 
            [$id] 
        );           
        return view('master/kategori/detail', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = DB::select(
            "SELECT
            mkg.*,
            u1.name as dibuat_nama, u1.email as dibuat_email,
            u2.name as diperbarui_nama, u2.email as diperbarui_email
            FROM master_kategori as mkg
            LEFT JOIN users as u1 ON mkg.dibuat_oleh = u1.id
            LEFT JOIN users as u2 ON mkg.diperbarui_oleh = u2.id
            WHERE mkg.id = ?;", 
            [$id] 
        );           
        return view('master/kategori/form-edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        {
            //aturan untuk inputan master kategori
            $aturan =[
                'html_nama_kategori' => 'required|min:10|max:25',
                'html_deskripsi' => 'required|max:255',
            ];
            //membuat pesan bhs indonesia
            $pesan_indo = [
                'required' => 'Wajib di isi Bos!',
                'min' => 'Minimal :min Karakter',
                'unique' => 'Kode Barang tidak boleh sama',
            ];
            $validator = validator::make($request->all(), $aturan, $pesan_indo);
            try {
                // jika inputan user tidak sesuai dengan aturan validasi
                if ($validator->fails()) {
                    return redirect()
                    ->route('master-kategori-edit', $id)
                    ->withErrors($validator)->withInput();
                } else {
                    // jika inputan user sesuai
                    // update ke database
                    $update = MasterKategoriModel::where('id',$id)->update([
                        'nama_kategori'     => $request->html_nama_kategori,
                        'deskripsi'         => $request->html_deskripsi,
                        'diperbarui_kapan'  => date('Y-m-d H:i:s'),
                        'diperbarui_oleh'   => Auth::user()->id,
                    ]);
                // jika proses update berhasil 
                if ($update) {
                    return redirect()
                    ->route('master-kategori')
                    ->with('success', 'Berhasil Perbarui data Kategori!');
                }
                }
           
            } catch(\Throwable $th) {
                return redirect()
                ->route('master-kategori-update', $id)
                ->with('danger', $th->getMessage());
            }
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_kategori)
    {
        try {
            $update = MasterKategoriModel::
            where(['id' => $id_kategori])
            ->update([
                'status' => 0,
            ]);
                    
            //jika proses update berhasil
            if ($update) {
                return redirect()
                ->route('master-kategori')
                ->with('success', 'Berhasil menghapus data kategori!');
            }
        } 
        catch(\Throwable $th) {
            return redirect()
            ->route('master-barang')
            ->with('danger', $th->getMessage());
        }
    }
}
