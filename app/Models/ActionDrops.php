<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActionDrops extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'action_drops';

    public function locations()
    {
        return $this->belongsTo(Action::class);
    }
}
