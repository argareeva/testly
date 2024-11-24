@include('components.form._form-label')
<select name="{{$name}}">
    @foreach ($options as $key => $option)
        <option value="{{ $key }}" {{ old($name, $value) == $key ? 'selected' : '' }} >{{ $option }}</option>
    @endforeach
</select>
@include('components.form._form-error-handling')

<br/>
<br/>
