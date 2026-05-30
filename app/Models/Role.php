<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // Hangi sütunların dışarıdan doldurulabileceğine izin veriyoruz
    protected $fillable = ['name', 'description'];

    // Bu role sahip tüm kullanıcıları getirecek bağlantı
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}