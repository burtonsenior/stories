<?php

namespace Stories;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectStakeholder extends Pivot
{
    protected $table = 'project_stakeholder';
  
    protected $with = ['status'];
  
    public function stakeholder()
    {
      return $this->belongsTo(Stakeholder::class);
    }
  
    public function project()
    {
      return $this->belongsTo(Project::class);
    }
  
    public function status()
    {
      return $this->belongsTo(Status::class);
    }
  
    public function roles()
    {
      return $this->belongsToMany(Role::class, 'project_stakeholder_role');
    }
}
