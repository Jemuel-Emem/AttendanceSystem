<?php

namespace App\Livewire\User;
use App\Models\addattendance as attendance;
use App\Models\attendancelist as lists;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $edit_modal = false;
    public $code, $date, $search, $id, $name;
    public $attendanceDetails = [];
    public function takeAttendance($id, $code, $date)
    {
        $this->attendanceDetails = [
            'attendanceId' => $id,
            'code' => $code,
            'date' => $date
        ];
    }
    public function render()
    {
        $search = '%' .$this->search. '%';
        return view('livewire.user.index', [
            'quest' => Attendance::where('code', 'like', $search)->paginate(3)
        ]);
    }

   public function edit($id){
    $this->render();
    $data = attendance::where('id', $id)->first();
        if ($data) {

                    $this->date = $data->date;
                    $this->code = $data->code;
                    $this->name = Auth::user()->name; 
                    $this->edit_modal = true;

                }
    $this->edit_modal = true;
   }


   public function submit(){
    $this->validate([
        'code' => 'required',
       'date' => 'required',
       'name' => 'required',
     ]);

    lists::create([
        'name' => $this->name,
        'date' => $this->date,
        'code' => $this->code,
        'attendance' => "Present",

    ]);
    $this->edit_modal = false;
    $this->reset([
        'code', 'date','name'
    ]);
   }

}
