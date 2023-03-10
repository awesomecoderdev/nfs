<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktuellConfig extends Model
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
    protected $table = 'aktuell_configs';

    /**
     * The order belong to user.
     *
     * @return  \App\Models\AktuellCategory
     */
    // public function category()
    // {
    //     return $this->belongsTo(AktuellCategory::class, 'aktuell_category_id');
    // }

}
