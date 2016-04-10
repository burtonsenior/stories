<?php

namespace Stories;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable = ['name'];

    public function stakeholders()
    {
      return $this->belongsToMany(Stakeholder::class, 'project_stakeholder');
    }
  
    public function newPivot(Model $parent, array $attributes, $table, $exists) {
        if ($parent instanceof Stakeholder) {
            return new ProjectStakeholder($parent, $attributes, $table, $exists);
        }
        return parent::newPivot($parent, $attributes, $table, $exists);
    }
  
    public function stories()
    {
      return $this->hasMany(Story::class);
    }
  
  
}
