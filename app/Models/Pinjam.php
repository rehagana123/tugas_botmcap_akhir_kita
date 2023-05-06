<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;
    protected $table = 'pinjam';
    protected $fillable = ['kode_pinjam', 'tanggal_pinjam', 'tanggal_kembali', 'denda', 'users_id', 'buku_id'];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id', 'id', 'buku');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id', 'users');
    }

    public function getDenda()
    {
        return $this->attributes['denda'];
    }

    public function setDenda($denda)
    {
        $this->attributes['denda'] = $denda;
    }
}
