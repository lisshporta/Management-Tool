<!DOCTYPE html>
<html>
<body>

<p>Hello World!</p>

@unless(count($tasks) == 0)

@foreach($tasks as $task)

<h1>{{$task->title}}</h1>
<h3>{{$task->description}}</h3>
@endforeach

@else 
<p>No Upcomming Tasks!</p>
@endunless



</body>
</html>