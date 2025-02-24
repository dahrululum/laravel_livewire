<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employee as ModelsEmployee;
use Livewire\WithPagination;    

class Employee extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $nama;
    public $email;
    public $alamat;
    public $updateData = false;
    public $employee_id;
    public $katakunci;
    public $employee_selected_id = [];
    public $sortColumn = 'nama' ;
    public $sortDirection = 'asc';


    
    
    public function render()
    {
        if($this->katakunci != null){
            $data= ModelsEmployee::where('nama','like','%'.$this->katakunci.'%')
                ->orwhere('email','like','%'.$this->katakunci.'%')
                ->orwhere('alamat','like','%'.$this->katakunci.'%')
                ->orderby($this->sortColumn,$this->sortDirection)
                ->paginate(10);
        }else{
            $data= ModelsEmployee::orderby($this->sortColumn,$this->sortDirection)->paginate(5);
        }


      
        return view('livewire.employee',['dataEmployee'=>$data]);
    }
    public function edit($id){
        $data = ModelsEmployee::find($id);
        $this->id = $data->id;
        $this->nama = $data->nama;
        $this->email = $data->email;
        $this->alamat = $data->alamat;

        $this->updateData = true;
        $this->employee_id = $id;
        
    }
    public function store(){
        $pesan = [
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email salah',
            'alamat.required' => 'Alamat harus diisi',    
        ];

          $this->validate([
              'nama' => 'required',
              'email' => 'required|email',
              'alamat' => 'required',
          ],$pesan);
          
          $data = [
              'nama' => $this->nama,
              'email' => $this->email,
              'alamat' => $this->alamat,
          ];
          ModelsEmployee::create($data); 
          session()->flash('message', 'Data berhasil disimpan');
          $this->reset();

    }
    public function update(){
        $pesan = [
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email salah',
            'alamat.required' => 'Alamat harus diisi',    
        ];  

        $datavalid = $this->validate([
                        'nama' => 'required',
                        'email' => 'required|email',
                        'alamat' => 'required',
                    ],$pesan);
        $data = ModelsEmployee::find($this->employee_id);
        $data->update($datavalid); 
        session()->flash('message', 'Data berhasil dirubah');
    }

    public function deleted($id){

       
            ModelsEmployee::find($id)->delete();
        

       
        
        session()->flash('message', 'Data berhasil dihapus');
        
    }
    public function deleteSelected($id){
    //   dd($this->employee_selected_id);
       if(count($this->employee_selected_id)){
            for($x=0; $x<count($this->employee_selected_id); $x++){
                ModelsEmployee::find($this->employee_selected_id[$x])->delete();
            }
        }
        session()->flash('message', 'Data berhasil dihapus');

    }

    public function sort($columnName){
        $this->sortColumn = $columnName;
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'desc';
    }

}
