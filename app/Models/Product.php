<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Product extends Model
{
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'description',
    ];

    public $timestamps = false;
}