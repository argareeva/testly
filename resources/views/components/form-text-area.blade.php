@include('components.form._form-label')
<textarea placeholder="{{$placeholder}}" name="{{$name}}" class="w-full p-1 rounded-lg border border-gray-200 @error($name) border-red-500 @enderror" rows="5">{{old($name,$value)}}</textarea>
@include('components.form._form-error-handling')
<br/><br/>
