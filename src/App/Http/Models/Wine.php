<?php

namespace App\Http\Models;

use App\Http\Models\Model;

class Wine extends Model
{
    protected $fillable;

    public function __construct()
    {
        parent::__construct(['name', 'description'], [
            'name' => 'required',
            'description' => 'required|string',
        ]);
    }
}
