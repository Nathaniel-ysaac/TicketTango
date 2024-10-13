<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketModel extends Model
{
    use HasFactory;

    protected $table = 'ticket_models'; // Ensure the table name is correct
    protected $primaryKey = 'TicketID'; // Specify the primary key
    public $timestamps = true; // Set to true if you want created_at and updated_at fields

    // Fillable fields for mass assignment
    protected $fillable = [
        'TicketType',
        'Price',
        'ReservationID',
    ];

    // Define a relationship to the ReservationModel if needed
    public function reservation()
    {
        return $this->belongsTo(ReservationModel::class, 'ReservationID');
    }
}
