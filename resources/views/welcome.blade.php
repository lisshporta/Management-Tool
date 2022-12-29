<x-layout>
<x-flash />
@unless(count($tasks) == 0)

<div style="display:flex; 
gap: 20px;
margin: 40px 20px; 
height: 100%;
width: 25%;">

<div style="border:2px solid black;padding:15px;border-radius:10px ">
    <p class="font-bold">Active Tasks:</p>
@foreach($tasks as $task)
<h1>{{$task->title}}</h1>
<h3>{{$task->description}} - {{$task->type}}</h3>
@endforeach
</div>
@else 
<p>No Upcomming Tasks!</p>
@endunless
</div>
<a class=" outline-black hover:bg-gray-300 ml-5 border-solid border-2 p-1 border-black rounded font-bold" href="/tasks/create">CREATE TASK</a>

</x-layout>
