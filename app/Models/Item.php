<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'items';


    public function playerInventory()
    {
        return $this->hasMany(PlayerInventory::class);
    }
}
