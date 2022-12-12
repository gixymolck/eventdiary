<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEvent extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'user_id',
    ];
    
    /**
     * Get the event that owns the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
