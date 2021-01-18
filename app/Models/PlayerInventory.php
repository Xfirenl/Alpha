<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerInventory extends Model
{
    //disables created_at and updated_at in the model
    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'player_inventory';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id', 'item_id'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'item_id', 'amount'
    ];


    public function items()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
