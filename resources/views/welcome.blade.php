<x-layout>
    <x-flash />
    @if(count($tasks) > 0)
        <div class="flex justify-center items-center mx-40 my-40">
            <div class="p-15 border-2 border-black rounded-lg">
                <p class="text-xl font-bold">Active Tasks:</p>
                @foreach($tasks as $task)
                    <div class="my-5">
                        <h1 class="text-lg">{{$task->title}}:</h1>
                        <h3 class="text-s text-black-600">{{$task->description}} - {{$task->type}}</h3>
                        @if ($task->user_id != null)
                            <p class="border-2 p-1 border-black rounded-lg font-bold">{{$task->status}} by {{$task->user->name}}</p>
                        @else
                            <form action="{{ route('tasks.claim', $task) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary border-solid hover:bg-gray-300 border-2 p-1 border-black rounded-lg font-bold"> Claim Task</button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @else 
        <p class="text-center text-lg font-medium">No Upcoming Tasks!</p>
    @endif
    <div class="text-center my-5">
        <a href="/tasks/create" class="btn btn-primary border-solid hover:bg-gray-300 border-2 p-1 border-black rounded-lg font-bold">CREATE TASK</a>
<a href="/claimed-tasks" class="btn btn-primary border-solid hover:bg-gray-300 border-2 p-1 border-black rounded-lg font-bold">CLAIMED TASKS</a>

    </div>
</x-layout>
