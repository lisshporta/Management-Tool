<x-layout>
<form method="POST" action="/tasks/store" enctype="multipart/form-data">
@csrf
</div>
    <label for="title" class="inline-block text-lg mb-2"
        >Task Title</label>
    <input
        type="text"
        class="border border-gray-200 rounded p-2 w-full"
        name="title"
        placeholder="Task title..."/>
        
    @error('title')
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
@enderror
<label for="description" class="inline-block text-lg mb-2"
>Task description</label>
<input
type="text"
class="border border-gray-200 rounded p-2 w-full"
name="description"
placeholder="Task description..."/>

@error('description')
<p class="text-red-500 text-xs mt-1">{{$message}}</p>
@enderror


     Task Type: <select name="type" id="type">
    <option disabled selected hidden>Choose..</option>
        <option>Frontend</option>
        <option>Backend</option>
   </select>

@error('type')
<p class="text-red-500 text-xs mt-1">{{$message}}</p>
@enderror

<button type="submit">Create</button>
</form>

<a href="/">GO BACK </a>
</x-layout>







