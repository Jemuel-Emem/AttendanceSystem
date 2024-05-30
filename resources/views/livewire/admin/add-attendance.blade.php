<div>

    <x-button label="Create Attendance " dark icon="plus" wire:click="$set('add_modal', true)" />

    <div class="relative overflow-x-auto mt-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                     Code
                    </th>
                    <th scope="col" class="px-6 py-3">
                    Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                     Action
                    </th>
                </tr>
            </thead>
            <tbody class=" bg-white">
                  @forelse($quest as $q)
                <tr>
                    <td class="px-6 py-4 ">{{ $q->code }}</td>
                    <td class="px-6 py-4 ">{{ $q->date }}</td>
                   <td class="">
                        <x-button class="w-16 h-6" label="edit" icon="pencil-alt"  wire:click="edit({{ $q->id }})" positive />
                        <x-button class="w-16 h-6" label="delete" icon="trash"  wire:click="Delete({{ $q->id }})" negative />
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10">No data</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div>
         {{-- {{ $quest->links() }} --}}
        </div>
    </div>



    <x-modal wire:model.defer="add_modal">
        <x-card title="Create Attendace">
            <div class="space-y-3">
                <x-input label="Code " placeholder="" wire:model="code" />
                <x-datetime-picker
                label=" Date"
                placeholder="Date"
                wire:model.defer="date"
                without-time
            />
            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close"  negative/>
                    <x-button positive label="Submit" wire:click="submit" spinner="submit" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>


    <x-modal wire:model.defer="edit_modal">
        <x-card title="Add Instructions">
            <div class="space-y-3">
                <x-input label="Code " placeholder="" wire:model="code" />
                <x-input label="Date " placeholder="" wire:model="date" />

            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close"  negative/>
                    <x-button positive label="Submit" wire:click="update" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>



</div>

