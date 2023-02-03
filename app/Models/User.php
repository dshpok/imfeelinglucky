<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone_number',
    ];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function getId()
    {
        return $this->id;
    }
}
