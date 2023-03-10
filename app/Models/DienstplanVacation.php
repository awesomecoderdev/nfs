<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DienstplanVacation extends Model
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
    protected $table = 'dienstplan_vacation';

     /**
     * The order belong to user.
     *
     * @return  \App\Models\User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->select("id", "username","title","first_name","last_name");
    }

     /**
     *
     * @return  int
     */
    public function endAttribute()
    {
        return $this->start + $this->duration;
    }

}
