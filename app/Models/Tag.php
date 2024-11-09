<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    public function jobs(){
        // All the jobs that are associated with
        return $this->belongsToMany(Job::class, relatedPivotKey: 'job_listing_id');
        

    }
}
//in Tinker

//$tag = App\Models\Tag::find(1) // Retrieve the tag with ID 1
// $tag->jobs; // This will return all jobs related to the tag with ID 1

// $tag->jobs()->attach(App\Models\Job::find(7));
// $tag->jobs()->get()->pluck('title');