<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktuellCategory extends Model
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
    protected $table = 'aktuell_categories';

    
    /**
     * Display the specified resource.
     *
     * @return  \App\Models\Aktuell
     */
    public function aktuell()
    {
        return $this->hasMany(Aktuell::class)->limit(100)->orderBy("date",'DESC')->orderBy("sort",'DESC');
    }

}
