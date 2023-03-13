<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

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
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "wid",
        "start",
        "col",
        "duration",
        "maintainer",
        "creator_id",
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
     * The order belong to user.
     *
     * @return  \App\Models\User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'maintainer')->select("id", "first_name", "last_name");
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

    /**
     * Get the col.
     */
    protected function col(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => $this->modifyCol($value),
            get: fn (string $value) => $this->reverseModifyCol($value),
        );
    }

    /**
     * Modify the col.
     */
    protected function modifyCol($value = null)
    {
        if ($value == "a") {
            return 0;
        } elseif ($value == "b") {
            return 1;
        } elseif ($value == "h") {
            return 3;
        } elseif ($value == "d") {
            return 4;
        }
    }


    /**
     * Reverse the col.
     */
    protected function reverseModifyCol($value = null)
    {
        if ($value == 0) {
            return "a";
        } elseif ($value == 1) {
            return "b";
        } elseif ($value == 3) {
            return "h";
        } elseif ($value == 4) {
            return "d";
        }
    }


    // /**
    //  * Return the js access able time.
    //  *
    //  * @return string
    //  */
    // public function getStartAttribute()
    // {
    //     // return date("Y-m-d H:i:s", $this->attributes['start'] + $this->attributes['duration']);
    //     // return $this->attributes['start'] * 1000;
    // }

    // /**
    //  * Return the js access able time.
    //  *
    //  * @return string
    //  */
    // public function getDurationAttribute()
    // {
    //     return $this->attributes['duration'] * 1000;
    // }
}
