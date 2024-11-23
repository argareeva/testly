<x-site-layout title="Applications">
    <a href="{{route('user.applications.create')}}">create application</a>

    @if(session()->has('success'))
        <div class="bg-green-100 text-green-500 p-2">
            {!! session()->get('success') !!}
        </div>
    @endif

    <ul class="list-disc pl-4">
        @foreach($applications as $application)
            <li>
                {{$application->name}}
                <a href="{{route('user.applications.edit', $application)}}">edit</a>
                <form action="{{route('user.applications.destroy', $application)}}" method="post">@method('delete')
                    @csrf
                    <button type="submit">delete</button></form>
            </li>
        @endforeach
    </ul>

</x-site-layout>
