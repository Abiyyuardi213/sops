<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dermaga extends Model
{
    use SoftDeletes;

    protected $table = 'dermaga';

    protected $fillable = [
        'kode_dermaga',
        'nama_dermaga',
        'tipe_dermaga',
        'panjang_m',
        'lebar_m',
        'kedalaman_min_lws',
        'kedalaman_max_lws',
        'latitude',
        'longitude',
        'fasilitas',
        'status',
        'catatan_operasional'
    ];

    protected $casts = [
        'fasilitas' => 'array',
        'panjang_m' => 'float',
        'lebar_m' => 'float',
        'kedalaman_min_lws' => 'float',
        'kedalaman_max_lws' => 'float',
    ];

    public static function getTipeOptions()
    {
        return ['Beton', 'Floating', 'Kayu', 'Ponton'];
    }

    public static function getStatusOptions()
    {
        return ['Tersedia', 'Penuh', 'Perbaikan', 'Non-Aktif'];
    }

    public static function getFasilitasOptions()
    {
        return ['Refuelling (BBM)', 'Air Bersih', 'Listrik (Shore Power)', 'Crane', 'Pangkalan Data', 'Sanitasi'];
    }

    public static function generateUniqueCode()
    {
        $prefix = 'DMG-';
        $lastDermaga = self::latest('id')->first();

        if (!$lastDermaga) {
            return $prefix . '001';
        }

        $lastNumber = intval(str_replace($prefix, '', $lastDermaga->kode_dermaga));
        $nextNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);

        $newCode = $prefix . $nextNumber;

        // Ensure uniqueness just in case
        while (self::where('kode_dermaga', $newCode)->exists()) {
            $lastNumber++;
            $nextNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
            $newCode = $prefix . $nextNumber;
        }

        return $newCode;
    }
}
