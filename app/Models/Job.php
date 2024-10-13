<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model{
    //this trait affords us that factory method call 
    use HasFactory;
    
    //Now Eloquen will asociete the class Job with the table
    // _create_job_listing_table and not _create_jobs_table
    protected $table = 'job_listing';

    protected $fillable = [
        'title',
        'salary'
    ];
}