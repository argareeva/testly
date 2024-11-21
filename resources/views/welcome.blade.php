<x-site-layout>

    @foreach($applications as $application)
        <div>
            <h2>{{$application -> name}}</h2>
            <p>{{$application -> description}}</p>
        </div>

    @endforeach

</x-site-layout>
