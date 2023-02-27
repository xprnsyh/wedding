<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'no_invoice', 'nama_pengirim', 'rekening_pengirim',
        'bank_pengirim', 'tanggal_transfer', 'jumlah_transfer', 'path_bukti_transfer'
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
