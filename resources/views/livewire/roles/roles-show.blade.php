<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Role') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __($role->name.' Role Show') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <a href="{{route("roles.index")}}" class="text-white bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
        Back</a>

    <div class="grid grid-cols-1 gap-4 mt-6">
        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">{{$role->name}}</h3>
                @forelse ($role->permissions as $permission)
                <p class="mt-1 max-w-2 text-sm text-gray-500">
                <flux:badge variant="solid" size="sm" color="zinc">{{$permission->name}}</flux:badge>
            </p>
                @empty
                <p class="mt-1 max-w-2 text-sm text-gray-500">
                    <flux:badge variant="solid" size="sm" color="zinc">No Permissions</flux:badge>
                </p>
                @endforelse
            </div>
        </div>
    </div>
</div>
