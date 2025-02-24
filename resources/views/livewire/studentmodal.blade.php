<div wire:ignore.self class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="studentModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="saveStudent">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="">Student Name</label>
                    <input type="text" wire:model="name" class="form-control">
                    @error('name')
                           <span class="error  text-danger">{{ $message }}</span> 
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Student Email</label>
                    <input type="text" wire:model="email" class="form-control">
                    @error('email')
                           <span class="error  text-danger">{{ $message }}</span> 
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Student Course</label>
                    <input type="text" wire:model="course" class="form-control">
                    @error('course')
                           <span class="error text-danger">{{ $message }}</span> 
                    @enderror
                </div>

                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form> 
      </div>
    </div>
  </div>