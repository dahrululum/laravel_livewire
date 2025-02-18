<div class="p-4">
  {{-- <h1>{{ $username }}</h1>
  {{ count($users) }}
  <button class="btn btn-primary" wire:click="createUser">Create New User</button> --}}

  @if(session()->has('success'))
   <span class="w-100 bg-green-500 text-white rounded px-3 py-1">{{ session()->get('success') }}</span>  
  @endif
  <form wire:submit="createUser" action="" class="p-4">
    <input wire:model="name" type="text" class="block rounded border border-gray-100 px-3 py-3 mb-1"  placeholder="Name">
    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    <input wire:model="email" type="text" class="block rounded border border-gray-100 px-3 py-3 mb-1"  placeholder="email">
    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    <input wire:model="password" type="password" class="block rounded border border-gray-100 px-3 py-1 mb-1"  placeholder="password">
    @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    <button class="block rounded px-3 py-1 bg-blue-500 text-white mb-2">Create</button>
  </form>
  <hr>
  @foreach ($users as $user)
  <div>
    <h3>{{ $user->name }}</h3>
    <p>{{ $user->email }}</p>
  </div>
  @endforeach
  {{ $users->links('vendor.livewire.test') }}
</div>
