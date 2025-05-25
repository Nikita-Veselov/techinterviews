<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function providers()
    {
        return $this->hasMany(ServiceProviders::class, 'category_id');
    }
}
