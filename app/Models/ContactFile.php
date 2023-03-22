<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactFile extends Model
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
    protected $table = 'contact_files';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     "wid",
    //     "start",
    //     "col",
    //     "duration",
    //     "maintainer",
    //     "creator_id",
    //     "modified",
    //     "created",
    // ];


    /**
     * Disable timestamps to the model.
     *
     * @var boolval
     */
    public $timestamps = false;

     
    /**
     * The order belong to contact.
     *
     * @return  \App\Models\Contact
     */
    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }


}

