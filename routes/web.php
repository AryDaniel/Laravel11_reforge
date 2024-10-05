<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function() {
    return view('about');
});

Route::get('/contact', function() {
    return view('contact');
});

Route::get('/jobs', function() {
    return view('jobs',[
        'jobs' => [[
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
        ]
    ]);
});

Route::get('/job/{id}', function($id) {
    //This is not suitable (having two lists of jobs) for real-world use; it's just for educational purposes.
    $jobs = [
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
    //Arr give access to methods to interact with arrays
    //first allow find the first item that matches the $id
    /*
    Arr::first($jobs, function ($job) use ($id){
        return $job['id'] ==$id;
    });
    */
    
    //This line do the same as the one above
    $job = Arr::first($jobs, fn($job) =>$job['id'] == $id);

    return view('job', ['job' => $job]);
});
