<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Satuan extends Model
{
    use SoftDeletes;

    protected $table = 'satuan';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'kode_satuan',
        'nama_satuan',
        'deskripsi',
        'status',
    ];

    protected static function booted()
    {
        static::creating(function ($satuan) {
            if (!$satuan->id) {
                $satuan->id = (string) Str::uuid();
            }
        });
    }

    public function toggleStatus()
    {
        $this->status = !$this->status;
        return $this->save();
    }
}
