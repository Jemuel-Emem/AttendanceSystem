<?php

namespace App\Livewire\Admin;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\addattendance as attendance;
use WireUi\Traits\Actions;
use Livewire\Component;

class AddAttendance extends Component
{
    use Actions;
    use  WithPagination;
    use WithFileUploads;
    public $code, $date, $search,$attendanceId ;
    public $add_modal = false;
    public $edit_modal = false;
    public function render()
    {
        $search = '%' .$this->search. '%';
        return view('livewire.admin.add-attendance',[
            'quest' => attendance::where('code', 'like', $search)->paginate(3),
        ]);


    }

    public function submit(){
        $this->validate([
            'code' => 'required',
           'date' => 'required',
         ]);

        attendance::create([
            'code' => $this->code,
            'date' => $this->date,
        ]);

        $this->reset([
            'code', 'date',
        ]);
    }

    public function edit($id){
        $data = Attendance::findOrFail($id);

        $this->attendanceId = $data->id;
        $this->date = $data->date;
        $this->code = $data->code;
        $this->edit_modal = true;
    }

    public function update(){
        $this->validate([
            'code' => 'required',
            'date' => 'required',
        ]);

        $data = Attendance::findOrFail($this->attendanceId );

        $data->update([
            'date' => $this->date,
            'code' => $this->code,
        ]);
        $this->edit_modal = false;
        $this->reset([
            'code', 'date'
        ]);
       }

       public function Delete($id){
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();
       }
}
