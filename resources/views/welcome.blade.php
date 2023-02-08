<x-layout>
    <x-flash />
    @guest
    <div class="text-center my-5">
        <a href="/login" style="border-color:#7d7d7d" class="btn btn-primary border-solid float-right p-1 ml-2 mr-2 hover:bg-gray-400 border-2  rounded-lg font-bold">LOGIN</a>
        <a href="/register" style="border-color:#7d7d7d" class="btn btn-primary border-solid float-right p-1 ml-2 hover:bg-gray-400 border-2  rounded-lg font-bold">REGISTER</a>
        @endguest
        @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="/logout" style="border-color:#7d7d7d" class="btn mr-2 btn-primary border-solid float-right p-1 hover:bg-gray-400 border-2  rounded-lg font-bold"
            onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out ') }}
        </a>
    </form>
    @endauth
</div>
<div class="mt-5">

    <a href="{{ route('home') }}" style="border-color:#7d7d7d" class="btn btn-primary border-solid hover:bg-gray-400 border-2 p-1 ml-2 rounded-lg font-bold">HOME</a>
    <a href="{{ route('unclaimed.sort') }}"style="border-color:#7d7d7d" class="btn btn-primary  border-solid hover:bg-gray-400 border-2 ml-2 p-1 rounded-lg font-bold">SHOW UNCLAIMED TASKS</a>
    <a href="{{ route('finished.sort') }}"style="border-color:#7d7d7d" class="btn btn-primary  border-solid hover:bg-gray-400 border-2 ml-2 p-1 rounded-lg font-bold">SHOW FINISHED TASKS</a>
    <div>

        @if(count($tasks) > 0)
        <div class="flex justify-center items-center mx-40 my-20">
            <div style="border-color:#7d7d7d" class="p-15 border-2 rounded-lg p-3">
                @if(Request::is('/'))
                <p class="text-xl font-bold"> All Tasks: </p>
                @elseif(Request::is('tasks/sort/unclaimed'))
                <p class="text-xl font-bold"> Unclaimed Tasks: </p>
                @elseif(Request::is('tasks/sort/finished'))
                <p class="text-xl font-bold"> Finished Tasks: </p>
                @endif

                @foreach($tasks as $task)
                    <div class="my-5">
                        <h1 class="text-lg">{{$task->title}}:</h1>
                        <h3 class="text-s text-gray-400-600">{{$task->description}} - {{$task->type}}</h3>
                        @if ($task->user_id != null)
                            <p style="border-color:#7d7d7d" class="border-2 p-1 rounded-lg font-bold">{{$task->status}}
                                @if ($task->status == 'Claimed')
                                - {{$task->claimed_at->diffForHumans()}}
                                @elseif ($task->status == 'Finished')
                                - {{$task->finished_at->diffForHumans()}}
                                @endif
                                by {{$task->user->name}}</p>
                        @else
                            <form action="{{ route('tasks.claim', $task) }}" method="POST">
                                @csrf
                                <button type="submit" style="border-color:#7d7d7d" class="btn btn-primary border-solid hover:bg-gray-400 border-2 p-1 rounded-lg font-bold"> Claim Task</button>
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
        <a href="/tasks/create" style="border-color:#7d7d7d" class="btn btn-primary border-solid hover:bg-gray-400 border-2 p-1 rounded-lg font-bold">CREATE TASK</a>
<a href="/claimed-tasks" style="border-color:#7d7d7d" class="btn btn-primary border-solid hover:bg-gray-400 border-2 p-1 rounded-lg font-bold">CLAIMED TASKS</a>

    </div>
</x-layout>
