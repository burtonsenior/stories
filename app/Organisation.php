<?php

namespace Stories;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    public function stakeholders()
    {
      return $this->belongsToMany(Stakeholder::class, 'organisation_stakeholder');
    }
  
    public function parent()
    {
      return $this->belongsTo(Organisation::class, 'parent_id');
    }
  
    public function children()
    {
      return $this->hasMany(Organisation::class, 'parent_id');
    }
}
