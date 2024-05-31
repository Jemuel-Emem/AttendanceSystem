<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    use WithFileUploads;

    public $name, $section, $year, $photo;
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
        $this->userId = $user->id; // Store the user's ID
        $this->name = $user->name;
        $this->section = $user->section;
        $this->year = $user->year;
    }

    public function update()
    {
        $this->validate([
            'photo' => 'nullable|image|max:1024',
        ]);

        $user = User::find($this->userId);

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

            session()->flash('message', 'Profile updated successfully.');
        } else {
            session()->flash('error', 'User not found.');
        }
    }
}
