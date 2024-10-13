<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationModel extends Model
{
    use HasFactory;

    // Specify the table associated with the model (optional if following conventions)
    protected $table = 'reservation_models';

    // Specify the primary key if it's not 'id'
    protected $primaryKey = 'ReservationID';

    // Allow mass assignment for the specified fields
    protected $fillable = [
        'UserID',
        'ReservationDate',
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(UserModel::class, 'UserID');
    }
}
