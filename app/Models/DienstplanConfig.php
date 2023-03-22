<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DienstplanConfig extends Model
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
        "filluser",
        "delete_border",
        "editable_profile",
        "apply_week",
        "allnumbers",
        "show_h",
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
    protected $table = 'dienstplan_config';
    
    /**
     * The order belong to user.
     *
     * @return  \App\Models\User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'filluser')->where('firma_id', 250)->select("id", "first_name", "last_name","wid","username");
    }
}
