<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DienstplanUserProps extends Model
{
    use HasFactory;

     /**
     * The database connection that should be used by the model.
     *
     * @var string
     */
    protected $connection = 'cake';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'wid',
        'user_id',
        'pager',
        'funktion',
        'is_maintainer',
        'is_admin',
        'dienstplan_access',
        'hour_overview_access',
        'contact_maintainer',
        'created',
        'modified'
    ];
    
     /**
     * Disable timestamps to the model.
     *
     * @var boolval
     */
    public $timestamps = false;
   

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dienstplan_user_props';
    
    /**
     * The order belong to user.
     *
     * @return  \App\Models\User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
