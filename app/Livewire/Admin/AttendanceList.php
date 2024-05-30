<?php

namespace App\Livewire\Admin;
use App\Models\attendancelist as lists;
use Livewire\Component;

class AttendanceList extends Component
{
    public $search;
    public function render()
    {
        $search = '%' .$this->search. '%';
        return view('livewire.admin.attendance-list',[
            'quest' => lists::where('code', 'like', $search)->paginate(3),
        ]);

    }

   
}
