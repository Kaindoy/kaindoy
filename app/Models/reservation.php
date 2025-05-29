<?php
// app/Models/Reservation.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['guest_name', 'room_number', 'check_in', 'check_out', 'status'];

    protected $dates = ['check_in', 'check_out']; 
}
