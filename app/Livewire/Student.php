<?php

namespace App\Livewire;

use App\Models\Student as StudentModel;
use Livewire\Component;

class Student extends Component
{
    public $name,$email,$course;
    protected function rules() 
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'course'    => 'required'
        ];
    }
    public function updated($fields){
        $this->validateOnly($fields);
    }
    public function saveStudent()
    {
        $validateData = $this->validate();
        StudentModel::create($validateData);
        session()->flash('message','Student Added Successfully');

        $this->resetInput();
        $this->dispatch('close-modal');
    }
    public function resetInput(){
        $this->name = '';
        $this->email = '';
        $this->course = '';
    }
    public function render()
    {
        return view('livewire.student');
    }
}
