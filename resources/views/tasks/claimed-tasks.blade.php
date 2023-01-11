<x-layout>
<x-flash />
    @unless (count($claimedTasks) == 0)
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table class="min-w-full">
                <thead class="border-b">
                  <tr>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                      ID
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                      Task Title
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                      Task Description
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                        Task Type
                      </th>
                      <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                        Task Status
                      </th>
                  </tr>
                </thead>
                <tbody>
        @foreach ($claimedTasks as $task)
                      <tr style="background-color:#c0c0c0" class="bg-white border-b">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$task->id}}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                          {{$task->title}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                          {{$task->description}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{$task->type}}
                          </td>
                          <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            @if ($task->status == 'Finished')
                            @else
                            <form action="{{ route('tasks.finish', $task) }}" method="POST">
                              @csrf
                              <button type="submit" class="text-gray-900 btn btn-primary border-solid border-2 p-1 border-black hover:bg-gray-400 rounded font-bold" 
                              onclick="return confirm('Are you sure?')">Finish Task</button>
                              @endif
                              @if ($task->status == 'Finished')
                              <form method="POST" action="{{ route('tasks.delete', $task) }}">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="text-gray-900 btn btn-primary border-solid border-2 p-1 border-black hover:bg-gray-400 rounded font-bold" 
                              onclick="return confirm('This will permanently remove the task! Are you sure?')">Remove</button>
                                </form>
                                @endif
                                <a class="text-gray-900 border-solid border-2 p-1 border-black hover:bg-gray-400 rounded font-bold" href="/tasks/{{$task->id}}/edit">Edit Task</a>
                          </form>
                              <p>{{$task->status}}  @if ($task->status == 'Claimed')
                                - {{$task->claimed_at->diffForHumans()}} 
                                @elseif ($task->status == 'Finished')
                                - {{$task->finished_at->diffForHumans()}} 
                                @endif</p>
                          </td>
                      </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
</div>
</div>


@else 
<p> No Claimed Tasks !</p>
@endunless
<a style="border-color:#7d7d7d" class="hover:bg-gray-500 ml-2 border-solid border-2 p-1 rounded font-bold outline-black" href="/">GO BACK</a>
<a style="border-color:#7d7d7d" class="hover:bg-gray-500 ml-2 border-solid border-2 p-1 rounded font-bold outline-black" href="/profile">PROFILE</a>

</x-layout>
