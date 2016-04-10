<?php

namespace Stories;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function project()
    {
      return $this->belongsTo(Project::class);
    }
}
