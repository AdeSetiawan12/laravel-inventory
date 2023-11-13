<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKategoriModel extends Model
{
    use HasFactory;
    protected $table = 'master_kategori';
    public $timestamps = false;
    protected $guarded = ['id'];
}


