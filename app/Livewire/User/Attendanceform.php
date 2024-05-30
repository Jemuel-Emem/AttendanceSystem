<?php

namespace App\Livewire\User;
use App\Models\addattendance as attendance;
use App\Models\attendancelist as lists;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Attendanceform extends Component
{
    public $attendanceId, $name, $photo, $year, $section;
    public $code, $search;
    public $date;
    public $edit_modal = false;
     public $attendanceDetails = [];

    public function showAttendanceDetails($attendanceId, $code, $date)
    {
        $this->attendanceDetails = [
            'attendanceId' => $attendanceId,
            'code' => $code,
            'date' => $date,
        ];
    }
    public function render()
    {
        $search = '%' .$this->search. '%';
        return view('livewire.user.attendanceform', [
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
                        $this->photo = Auth::user()->photo;
                        $this->year = Auth::user()->year;
                        $this->section = Auth::user()->section;
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
            'year' => $this->year,
            'section' => $this->section,
            'attendance' => "Present",

        ]);
        $this->edit_modal = false;
        $this->reset([
            'code', 'date','name'
        ]);
       }
}
