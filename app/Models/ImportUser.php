<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportUser extends Model
{
    use HasFactory;

     /**
     * The database connection that should be used by the model.
     *
     * @var string
     */
    protected $connection = 'cake';
    // protected $connection = 'mysql';
    

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';
}
