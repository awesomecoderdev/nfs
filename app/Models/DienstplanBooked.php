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
        // return $this->belongsTo(User::class, 'maintainer');
        return $this->belongsTo(User::class, 'maintainer')->select("id", "first_name", "last_name", "username", "mobile", "telephone");
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
        $reverse = [
            "a" => 0,
            "b" => 1,
            "h" => 2,
            "d" => 3,
        ];

        $modify = [
            0 => "a",
            1 => "b",
            2 => "h",
            3 => "d",
        ];

        return Attribute::make(
            set: fn (string $value) => $reverse[$value] ?? $value,
            get: fn (string $value) => $modify[$value] ?? $value,
        );
    }

    /**
     * Return the user full name.
     *
     * @return string
     */
    // public function getEndAttribute()
    // {
    //     return  $this->start;
    // }


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
