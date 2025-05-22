<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __($this->name) }}</flux:heading>
        {{-- <flux:subheading size="lg" class="mb-6">{{ __(' Edit ')  .  $this->name }}</flux:subheading> --}}
        <flux:separator variant="subtle" /> 
    </div>
    <a href="{{route("users.index")}}" class="text-white bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
        Back</a>


    <form wire:submit.prevent="save" class="w-150 center mx-auto ">
        <div class="mt-2">  <flux:input wire:model="name" label="Name" placeholder="Name" /></div>
        <div class="mt-2">  <flux:input wire:model="email" label="Email" placeholder="Email" type="email" /></div>    
        <div class="mt-2">  <flux:input wire:model="password" label="Password" placeholder="Password" type="password" /></div>
        <div class="mt-2">  <flux:input wire:model="password_confirmation" label="Comfirm Password" placeholder="Comfirm Password" type="password" />  </div> 
        <div class="mt-4">    
            <flux:checkbox.group wire:model="roles" >
               @forelse ($allRoles as $role)
               <flux:checkbox label="{{$role->name}}" value="{{$role->name}}"  />           
               @empty
               <p>no Role </p>
               @endforelse
            </flux:checkbox.group>
        </div>
        <flux:button variant="primary" type="submit" class="mt-6 ">Submit</flux:button>
    </form>
    
</div>
