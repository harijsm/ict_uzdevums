<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class ProductAttribute extends Model
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
        'product_id',
        'key',
        'value',
    ];

    public $timestamps = false;
}