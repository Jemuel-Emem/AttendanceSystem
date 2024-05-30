<div class="">
    <div class="flex justify-center mt-4">

        <div class="grid  md:grid-cols-3 grid-col-1 gap-4 ">
            @foreach($quest as $cot)
            <x-card  title="Attendance {{ $cot->code }}" class="w-80 text-amber-700 " >
               <div class="">
                {{-- <img src="{{ asset(Storage::url($cot->photo)) }}" alt="Valid ID" class="ml-12 w-52 h-32 rounded"> --}}
               </div>

               <div class="mt-4 flex text-black gap-2">
               <span>Date: </span>
               <p class="text-red-700">{{ $cot->date }} </p>
               </div>
                <x-slot name="footer">
                    <div class="flex justify-between items-center">

                        <x-button label="View" amber wire:click="edit({{ $cot->id }})" class="w-full"/>

                    </div>
            </x-slot>
            </x-card>
            @endforeach
          </div>


    </div>

    <div class="mt-4 flex justify-center">
        {{ $quest->links() }}
      </div>


      <x-modal wire:model.defer="edit_modal">
         <x-card title="Attendace">
             <div class="space-y-3">
                <img src="{{ asset(Storage::url($photo)) }}" alt="No Photo" width="100" class="mb-2 mr-28">
                 <x-input label="Date" placeholder="" wire:model="date" />
                 <x-input label="Code" placeholder="" wire:model="code" />
                 <x-input label="Name" placeholder="Enter name " wire:model="name" />
                 <x-input label="Year" placeholder="Enter year " wire:model="year" />
                 <x-input label="Section" placeholder="Enter section " wire:model="section" />

             </div>

             <x-slot name="footer">
                 <div class="flex justify-end gap-x-4">
                     <x-button flat label="Cancel" x-on:click="close"  negative/>
                     <x-button positive label="Present" wire:click="submit"  />
                 </div>
             </x-slot>
         </x-card>
     </x-modal>
</div>
