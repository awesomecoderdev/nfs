<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DienstplanBooked extends Model
{
    use HasFactory;

     /**
     * The database connection that should be used by the model.
     *
     * @var string
     */
    protected $connection = 'cake';

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dienstplan_booked';
    
    /**
     * The order belong to user.
     *
     * @return  \App\Models\User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'maintainer');
    }


    /**
     * The order belong to user.
     *
     * @return  \App\Models\User
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
    
}
