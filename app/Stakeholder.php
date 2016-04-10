<?php

namespace Stories;

use Illuminate\Database\Eloquent\Model;

class Stakeholder extends Model
{
    public function projects()
    {
      return $this->belongsToMany(Project::class, 'project_stakeholder')->withTimestamps()
        ->withPivot(['status_id', 'influence', 'interest', 'involvement']);
    }
  
    public function newPivot(Model $parent, array $attributes, $table, $exists) {
        if ($parent instanceof Project) {
            return new ProjectStakeholder($parent, $attributes, $table, $exists);
        }
        return parent::newPivot($parent, $attributes, $table, $exists);
    }
  
    public function organisations()
    {
      return $this->belongsToMany(Organisation::class, 'organisation_stakeholder')->withTimestamps();
    }
  
    public function stories()
    {
      return $this->belongsToMany(Story::class, 'story_stakeholder')->withTimestamps();
    }
}
