<?php

namespace Stories;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function projectStakeholders()
    {
      return $this->hasMany(ProjectStakeholder::class);
    }
}
