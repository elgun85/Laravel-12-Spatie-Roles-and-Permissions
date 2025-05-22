<div>
    <div>
        <div class="relative mb-6 w-full">
            <flux:heading size="xl" level="1">{{ __('Role') }}</flux:heading>
            <flux:subheading size="lg" class="mb-6">{{ __('Edit this Role') }}</flux:subheading>
            <flux:separator variant="subtle" />
        </div>
    
        <a href="{{route("roles.index")}}" class="text-white bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            Back</a>
    
       
    <form wire:submit.prevent="save" class="w-150 center mx-auto ">
        <div class="mt-2">  <flux:input wire:model="name" label="Name" placeholder="Name" /></div>
<div class="mt-4">
    
    <flux:checkbox.group wire:model="permissions" >
       @forelse ($allpermissions as $permission)
       <flux:checkbox label="{{$permission->name}}" value="{{$permission->name}}"  />    
       
           
       @empty
       <p>no permissions </p>
       @endforelse
    </flux:checkbox.group>

</div>

            
        <flux:button variant="primary" type="submit" class="mt-6 ">Submit</flux:button>

    </form>
    
    </div>
    
</div>
