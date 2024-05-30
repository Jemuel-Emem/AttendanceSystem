<?php

namespace App\Livewire\User;
use App\Models\User as user;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
class Profile extends Component
{
    use WithFileUploads;
    public $search, $name, $section, $year, $photo;
    public $userId;
    public function render()
    {
        $user = Auth::user();
        return view('livewire.user.profile', [
            'user' => $user
        ]);

    }
    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->section = $user->section;
        $this->year = $user->year;
    }
    public function update($id)
    {



        $user = User::find($id);

        if ($user) {

            if (!is_null($this->name)) {
                $user->name = $this->name;
            }
            if (!is_null($this->section)) {
                $user->section = $this->section;
            }
            if (!is_null($this->year)) {
                $user->year = $this->year;
            }

            if ($this->photo) {
                $photoPath = $this->photo->store('photos', 'public');
                $user->photo = $photoPath;
            }

            $user->save();


        } else {
            session()->flash('error', 'User not found.');
        }
    }


}
