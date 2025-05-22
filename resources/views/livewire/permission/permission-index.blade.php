<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Permissinon') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Permission list') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

   @can('permissions.create')
   <a href="{{route("permissions.create")}}" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
    Create</a>
   @endcan



<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6">
    <div class="flex justify-end items-end pb-4 mr-2 mt-1 ">
        <div class="w-80">
            <flux:input wire:model.live="search" kbd="⌘K" icon="magnifying-glass" placeholder="Search..." />
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>



                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$item->name}}
                </th>

                <td class="px-6 py-4 text-right">

                    @can('permissions.edit')
                    <a href="{{ route('permissions.edit', $item->id) }}" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:underline"
                      >Edit</a>
                    @endcan
                    @can('permissions.delete')
                    <button type="button" class="px-3 py-2 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 hover:underline"
                    wire:click="delete({{ $item->id }})" onclick="confirm('Are you sure you want to delete this {{$item->name}}') || event.stopImmediatePropagation()"
                    >Delete</button>
                    @endcan


                                  </td>
            </tr>

            @empty
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td colspan="4" class="px-6 py-4 text-center">
                    No users found.
                </td>
            </tr>

            @endforelse


        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="px-6 py-4 text-center">
                    {{ $data->links() }}
                </td>
            </tr>
        </tfoot>
    </table>

</div>


</div>
</div>
