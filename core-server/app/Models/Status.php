<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'description'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'statuses';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id'; 

    /**
     * Get the user that owns the status.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
