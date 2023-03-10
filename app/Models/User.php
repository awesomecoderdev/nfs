<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable // implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The database connection that should be used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "id",
        "wid",
        "firma_id",
        'title',
        'first_name',
        'last_name',
        'email',
        'username',
        'password',
        'telephone',
        'mobile',
        'fax',
        'plain',
        'salutation',
        'birthdate',
        'street',
        'house_number',
        'zip_code',
        'place',
        'anrede',
        'gebdate',
        'strasse',
        'hausnummer',
        'plz',
        'ort',
        'avatar',
        "isAdmin",
        "active",
        "visible",
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Return the user full name.
     *
     * @return string
     */
    public function admin(): bool
    {
        return ($this->isAdmin != null && $this->isAdmin == 1) ? true : $this->props->is_admin ?? false ;
    }

     /**
     * Return the user full name.
     *
     * @return string
     */
    public function fullname()
    {
        return ucfirst($this->first_name != null ? ( $this->last_name != null ? "$this->first_name $this->last_name" : "$this->first_name") : $this->username);
    }

     /**
     * The user has props.
     *
     * @return  \App\Models\DienstplanUserProps
     */
    public function props()
    {
        return $this->hasOne(DienstplanUserProps::class, 'user_id');
    }


      /**
     * Return the user wid name.
     *
     * @return string
     */
    public function getWidAttribute($value)
    {
       return $value ?? ($this->props->wid ?? $value);
    }



}
