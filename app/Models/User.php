<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
   
   protected $table = 'users';
   protected $hidden = [
      'password'
   ];

   protected $casts = [
      'email_verified_at' => 'datetime',
      'password' => 'hashed',
   ];

   // Di dalam model User
   public function role()
   {
      return $this->belongsTo(Role::class, 'roleId');
   }
}
