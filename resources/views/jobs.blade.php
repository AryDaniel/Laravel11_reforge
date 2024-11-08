<x-layout>
    <x-slot:heading>
        Jobs Page!
    </x-slot:heading>
    
    <div class="space-y-4">
        @foreach($jobs as $job )    
            <a href="/job/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="font-bold text-blue-500 text-sm">
                    {{ $job->employer->name }}
                </div>
                <div>
                    <strong>{{ $job['title'] }}</strong>: Pays {{ $job['salary'] }} per year.
                </div>
            </a>
        @endforeach
        <!-- That's what you can do if you're using tailwind-->
        <div> 
            {{ $jobs->links() }} 
        </div>

        <!-- 
        `php artisan vendor:publish`
            - `vendor` refers to any package that has been installed via Composer.
            - `publish` allows you to publish package assets, routes, config files, or views to your application's directory, 
            enabling manual control and customization.

            Laravel Pagination
                - Copies pagination view files from the `vendor` folder (where all Composer packages are installed).
                - Publishes these pagination views to `resources/views/vendor/pagination`, 
                allowing you to customize them as needed.
            -->

    </div>

</x-layout> 