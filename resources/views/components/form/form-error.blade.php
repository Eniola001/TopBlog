@props(['name'])

@error($name)
  <p class="text-xs text-red-600 font-normal mt-1">{{$message}}</p>
@enderror