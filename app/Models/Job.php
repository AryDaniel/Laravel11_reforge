<?php
namespace App\Models;

use Illuminate\Support\Arr;

class Job {
    //: arrar putting this allow us to specify the type to the data that we're returning
    //and make error detection easier
    public static function all(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '$50,000'
            ],
            [
                'id' => 2,
                'title' => 'Programmer',
                'salary' => '$10,000'
            ],
            [
                'id' => 3,
                'title' => 'Teacher',
                'salary' => '$40,000'
            ]
        ];
    }

    public static function find(int $id): array
    {
        //in this case we change Job::all() but we already are in the class so we change it with static::all()
        $job = Arr::first(static::all(), fn($job) =>$job['id'] == $id);        
        
        if(!$job){
            abort(404);
        }
    }
}