<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __($user->name) }}</flux:heading>
        {{-- <flux:subheading size="lg" class="mb-6">{{ __(' Edit ')  .  $this->name }}</flux:subheading> --}}
        <flux:separator variant="subtle" /> 
    </div>


<div class="">
    <a href="{{route("users.index")}}" class="text-white bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
        Back</a>
<div class="w-150 mt-6">
    <p class="mt-2"><strong>Name: </strong> {{$user->name}}</p>
    <p class="mt-2"><strong>Email: </strong> {{$user->email}}</p>
   
    
        @forelse ($user->roles as $role)
        <p><span class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full dark:bg-green-900 dark:text-green-300">
            {{$role->name}}
        </span>
    </p>
        @empty
        <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full dark:bg-red-900 dark:text-red-300">
            No Role
        </span>
        @endforelse
    
</div>
</div>
</div>
