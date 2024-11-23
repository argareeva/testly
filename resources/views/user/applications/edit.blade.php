<x-site-layout title="Update application">
    <form action="{{route('user.applications.update', $application)}}" method="post">
        @method('PUT')
        @csrf
        <br><label for="name">Name</label><br/>
        <input name="name" value="{{old('name', $application->name)}}">
        @error('name')<div class="text-red-500">{{$message}}</div> @enderror

        <br/><br/>

        <br><label for="description">Description</label><br/>
        <textarea name="description">{{old('description', $application->description)}}</textarea>
        @error('description')<div class="text-red-500">{{$message}}</div> @enderror

        <br/><br/>
        <div>
            <a href="{{route('user.applications.index')}}">Undo</a>
            <button type="submit">Save changes</button>
        </div>
    </form>
</x-site-layout>
