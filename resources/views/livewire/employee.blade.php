<div>
    <div class="container">
        @if ($errors->any())
        <div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
            
        @endif

        @if (session()->has('message'))
            <div class="pt-3">
                <div class="alert alert-success">{{ session()->get('message') }}</div> 
            </div>
        @endif
        <!-- START FORM -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <form>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10"> 
                        <input type="text" class="form-control" wire:model="nama">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" wire:model="email">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" wire:model="alamat">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        @if ($updateData)
                            <button type="button" class="btn btn-success" name="submit" wire:click="update()">Update</button>
                        @else
                            <button type="button" class="btn btn-primary" name="submit" wire:click="store()">SIMPAN</button>
                        @endif
                        
                    </div>
                </div>
            </form>
        </div>
        <!-- AKHIR FORM -->

        <!-- START DATA -->
        
        <div class="my-3 p-3 bg-body rounded shadow-sm">
          <h1>Data Pegawai</h1>
          <div class="pb-3 pt-3">
            <input type="text" class="form-control mb-3 w-25" placeholder="Searching..." wire:model.live="katakunci">
          </div>
          @if ($employee_selected_id)
              @php
                print_r($employee_selected_id)
              @endphp
              <a wire:click="deleteSelected('')" wire:confirm="Apakah anda yakin akan menghapus {{ count($employee_selected_id) }} data ini?"  class="btn btn-danger btn-sm my-2">Delete {{ count($employee_selected_id) }} data</a>
          @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-1">#</th>
                        <th class="col-md-1">No</th>
                        <th class="col-md-4">Nama</th>
                        <th class="col-md-3">Email</th>
                        <th class="col-md-2">Alamat</th>
                        <th class="col-md-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataEmployee as $item)
                        
                    
                    <tr>
                        <td> <input type="checkbox" wire:key="{{ $item->id }}" value="{{ $item->id }}" name="" id="" wire:model.live="employee_selected_id"></td>
                        <td>{{ $dataEmployee->firstItem() + $loop->index }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>
                            <a wire:click="edit({{$item->id}})"   class="btn btn-warning btn-sm">Edit</a>
                            <a wire:click="deleted({{$item->id}})" wire:confirm="Apakah anda yakin akan menghapus data {{ $item->nama }} ini?"  class="btn btn-danger btn-sm ">Del</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $dataEmployee->links() }}
        </div>
        <!-- AKHIR DATA -->
    </div>
</div>
