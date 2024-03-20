<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $table = '_schedule_appointment';
    protected $fillable = ['date','start_time','end_time','status'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
