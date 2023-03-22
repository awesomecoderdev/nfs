<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
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
    protected $table = 'contact_data';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "webmodul_id",
        "employee_id",
        "anrede",
        "vorname",
        "nachname",
        "unternehmen",
        "strasse",
        "ort",
        "telefon",
        "fax",
        "email",
        "betreff",
        "nachricht",
        "themen",
        "datennutzung",
        "created",
        "modified",
    ];


    /**
     * Disable timestamps to the model.
     *
     * @var boolval
     */
    public $timestamps = false;
     
    /**
     * Display the specified resource.
     *
     * @return  \App\Models\ContactFile
     */
    public function files()
    {
        return $this->hasMany(ContactFile::class, 'contact_id');
    }
}
