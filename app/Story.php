<?php

namespace Stories;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{

    protected $with = ['role', 'status'];

    public function project()
    {
      return $this->belongsTo(Project::class);
    }
  
    public function stakeholders()
    {
      return $this->belongsToMany(Stakeholder::class, 'story_stakeholder');
    }
  
    public function status()
    {
      return $this->belongsTo(Status::class);
    }
  
    public function role()
    {
      return $this->belongsTo(Role::class);
    }

    public function getActorAttribute()
    {
      return $this->role;
    }

    public function getSentenceAttribute()
    {
      return 'As a ' . $this->role->name . PHP_EOL . 'I want to ' . $this->goal . PHP_EOL . 'So that ' . $this->value;
    }
}
