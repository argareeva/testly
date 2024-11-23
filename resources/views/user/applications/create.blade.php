<x-site-layout title="Create new application">
    <form action="{{route('user.applications.store')}}" method="post">
        @csrf
        <br/><label for="name">Name</label><br/>
        <input name="name" value="{{old('name')}}">
        @error('name')<div class="text-red-500">{{$message}}</div> @enderror
        <br/><br/>

        <br/><label for="description">Description</label><br/>
        <textarea name="description">{{old('description')}}</textarea>
        @error('description')<div class="text-red-500">{{$message}}</div> @enderror
        <br/><br/>

        <div>
            <a href="{{route('user.applications.index')}}">Undo</a>
            <button type="submit">Create application</button>
        </div>
    </form>
</x-site-layout>
