<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    /** @use HasFactory<\Database\Factories\EmployerFactory> */
    use HasFactory;

    public function jobs(){
        //One to Many / hasMany
        return $this->hasMany(Job::class);
        //$employer = Employer::first();
        //$employer->jobs; //here we are get all the jobs associaded with a specific employer

        //$employer->jobs[0]; //you can interac with it like and array 
        //$employer->jobs->first(); //or like a collection 
    }
}
