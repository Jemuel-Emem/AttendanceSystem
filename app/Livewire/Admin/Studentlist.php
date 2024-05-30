<?php

namespace App\Livewire\Admin;
use App\Models\User as user;
use Livewire\Component;

class Studentlist extends Component
{
    public $search;
    public function render()
    {
        $search = '%' .$this->search. '%';
        return view('livewire.admin.studentlist',[
            'quest' => user::where('name', 'like', $search)->paginate(3),
        ]);
 
    }
}
