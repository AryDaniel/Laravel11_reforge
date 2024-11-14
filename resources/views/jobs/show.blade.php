<!-- the view for displaying or showing a single resource or record is call show-->
 <x-layout>
    <x-slot:heading>
        Job Page!
    </x-slot:heading>
    <!-- Accessing model attributes as an array keys -->
    <h2 class="font-bold text-lg" >{{ $job['title'] }}</h2>

    <p>
        This job pays {{ $job['salary'] }} per year
    </p>

    <p class="mt-6">
        <!-- Accessing model attributes as properties -->
        <x-buttom href="/jobs/{{ $job->id }}/edit">Edit Job</x-buttom>
    </p>

</x-layout> 