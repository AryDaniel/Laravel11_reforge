<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// To turn a PHP class into an Eloquent model, extend the class.
// We remove everything because Eloquent has its own API.
class Job extends Model{
    //Now Eloquen will asociete the class Job with the table
    // _create_job_listing_table and not _create_jobs_table
    protected $table = 'job_listing';

    protected $fillable = [
        'title',
        'salary'
    ];
}