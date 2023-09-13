<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'Department_ID', 'TeamLead_ID'];

    public function department()
    {
        return $this->belongsTo(Department::class, 'Department_ID');
    }

    public function teamLead()
    {
        return $this->belongsTo(User::class, 'TeamLead_ID');
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'TeamMembers', 'Team_ID', 'User_ID');
    }

}
