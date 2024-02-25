<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jabatan;
use App\Models\User;
use App\Models\Geofencing;


class Pegawai extends Model
{
   protected $table = 'employee';
   public function jabatan()
   {
      return $this->belongsTo(Jabatan::class, 'jabatan_id');
   }
   public function geofencing()
   {
      return $this->belongsTo(Geofencing::class, 'geofencing_id');
   }
   public function users()
   {
      return $this->belongsTo(User::class, 'users_id');
   }
}
