<x-site-layout title="Testly">
    @foreach($applications as $application)
        <a href="{{route('applications.show',$application->id )}}" class="mt-4">
            <h2 class="font-bold text-lg">{{$application->name}}</h2>
            <div>
                {{\Carbon\Carbon::parse($application->published_at)->format('Y-m-d')}} |
                {{$application->author?->name ?? 'Unknown'}}
            </div>

            <div>
                @foreach($application->categories as $category)
                    <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-xs">{{$category->title}}</span>
                @endforeach
            </div>
            <p class="text-sm">{{$application->summary(50)}}</p>
        </a>
    @endforeach
</x-site-layout>
