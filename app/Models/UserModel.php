<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $fillable =["username","password"];
    public $timestamps=false;
    protected function casts(): array
    {
        return [
            'Password' => 'hashed',
        ];
    }
}
