<x-site-layout title="Testly">

    @foreach($applications as $application)
        <div class="mt-4">
            <h2 class="font-bold text-lg">{{$application->name}}</h2>
            <div>
                {{\Carbon\Carbon::parse($application->published_at)->format('Y-m-d')}} |
                {{$application->author->name}} ({{$application->author->email}})
            </div>
            <p class="text-sm">{{$application->summary(50)}}</p>
        </div>

    @endforeach

</x-site-layout>
