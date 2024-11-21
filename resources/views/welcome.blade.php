<x-site-layout title="Testly">

    @foreach($applications as $application)
        <div class="mt-4">
            <h2 class="font-bold text-lg">{{$application -> name}}</h2>
            <div>
                {{\Carbon\Carbon::parse($application->published_at) -> toDateString()}}
                |
                {{$application->author->name}}
            </div>
            <p class="text-sm">{{$application -> description}}</p>
        </div>

    @endforeach

</x-site-layout>
