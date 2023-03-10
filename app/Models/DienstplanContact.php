<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DienstplanContact extends Model
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
        "wid",
        "anrede",
        "vorname",
        "nachname",
        "email",
        "strasse",
        "plz",
        "ort",
        "telefon",
        "telefon_priv",
        "mobil",
        "notmobil",
        "funktion",
        "modified",
        "created",	
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
    protected $table = 'dienstplan_contact';
}
