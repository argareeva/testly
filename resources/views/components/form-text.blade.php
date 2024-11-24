@include('components.form._form-label')
<input name="{{$name}}" value="{{old($name, $value)}}" placeholder="{{$placeholder}}" class="w-2/3 p-1 rounded-lg border border-gray-200 @error($name) border-red-500 @enderror">
@include('components.form._form-error-handling')
<br/><br/>
