<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketModel extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural of the model name
    protected $table = 'ticket_models';

    // Specify the fillable attributes
    protected $fillable = [
        'user_id',
        'seat_model_id',
        'price',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the SeatModel
    public function seat()
    {
        return $this->belongsTo(SeatModel::class, 'seat_model_id');
    }
}