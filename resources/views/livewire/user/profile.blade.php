<div class="mt-4 p-2 bg-gray-200">
    <div class="border-2 border-gray-200">
        <div class="flex flex-col items-end mt-4">
            @if($user->photo)
                <img src="{{ asset(Storage::url($user->photo)) }}" alt="User Photo" width="100" class="mb-2 mr-28">
            @endif
            <x-input wire:model.defer="photo" label="Update Photo" type="file" class="w-64" accept="image/*"/>
        </div>

        <div class="flex justify-around mb-4">
            <div class="">
                <x-input wire:model="name" label="Name" placeholder="Name" class="w-80"/>
            </div>

            <div class="">
                <x-input wire:model="section" label="Section" placeholder="Section" class="w-80"/>
            </div>

            <div class="">
                <x-input wire:model="year" label="Year" placeholder="Year" class="w-80"/>
            </div>
        </div>

        <div class="text-end mb-4">
            <x-button info label="Update Profile" wire:click="update" />
        </div>
    </div>
</div>
