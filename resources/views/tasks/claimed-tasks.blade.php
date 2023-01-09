<x-layout>
    @unless (count($claimedTasks) == 0)
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table class="min-w-full">
                <thead class="border-b">
                  <tr>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                      ID
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                      Task Title
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                      Task Description
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                        Task Type
                      </th>
                  </tr>
                </thead>
                <tbody>
        @foreach ($claimedTasks as $task)
                      <tr class="bg-white border-b">
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
<a class=" hover:bg-gray-300 ml-2 border-solid border-2 p-1 border-black rounded font-bold outline-black" href="/">GO BACK</a>

</x-layout>
