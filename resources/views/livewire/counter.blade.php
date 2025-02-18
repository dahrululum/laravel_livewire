<div>
     <h1>Counter Livewire</h1>
        <button class="btn btn-primary" wire:click="up">+</button>
        <span class="mx-3">{{ $count }}</span>
        <button class="btn btn-danger" wire:click="down">-</button>
     
</div>
