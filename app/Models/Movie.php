<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Movie
 * @package App\Models
 * @version October 23, 2021, 1:59 pm UTC
 *
 * @property string $title
 * @property string $description
 * @property string $date_release
 * @property string $director
 */
class Movie extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'movies';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'description',
        'date_release',
        'director'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'date_release' => 'date',
        'director' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'date_release' => 'required',
        'director' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
