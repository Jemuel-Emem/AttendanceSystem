<div>

    <div class="flex gap-2 justify-end mt-2 p-4">
        <x-input label="" placeholder="Search name" wire:model="search" class="w-32" />
    <div>
        <x-button  label="Search " wire:click.prevent="asss" green />
    </div>

    </div>

    <div class="relative overflow-x-auto mt-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                   Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                   Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                    Section
                    </th>
                </th>

                    <th scope="col" class="px-6 py-3">
                      Year
                   </th>

                    <th scope="col" class="px-6 py-3text-center">
                       photo
                    </th>
                </tr>
            </thead>
            <tbody class=" bg-white">
                  @forelse($quest as $q)
                <tr>

                    <td class="px-6 py-4 ">{{ $q->name }}</td>
                    <td class="px-6 py-4 ">{{ $q->email }}</td>
                    <td class="px-6 py-4 ">{{ $q->section }}</td>
                    <td class="px-6 py-4 ">{{ $q->year }}</td>

                    <td class="px-6 py-4 "><img src="{{ asset(Storage::url($q->photo)) }}" alt="User Photo" width="100" class="mb-2 mr-28"></td>

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






</div>

