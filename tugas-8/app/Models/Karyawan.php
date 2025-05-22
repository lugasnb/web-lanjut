<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Karyawan extends Model 
{ 
    use HasFactory; 
 
    protected $table = 'karyawans'; 
    protected $primaryKey = 'id'; 
     
    protected $fillable = [
        'kode_karyawan', 
        'nama_karyawan', 
        'email', 
        'no_telp', 
        'alamat',
        'jabatan',
        'tanggal_masuk'
    ]; 
 
    protected static function boot() 
    { 
        parent::boot(); 
 
        static::creating(function ($model) { 
            if (empty($model->kode_karyawan)) { 
                $model->kode_karyawan = strtolower(substr(uniqid(), -6)); 
            } 
        }); 
    } 
}