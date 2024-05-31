<div>
    <div class="flex gap-2 justify-end mt-2 p-4">
        <x-input label="" placeholder="Search code" wire:model="search" class="w-32" />
        <div>
            <x-button label="Search" wire:click.prevent="asss" green />
        </div>
    </div>

    <div class="relative overflow-x-auto mt-4" id="printContent">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Code</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Year</th>
                    <th scope="col" class="px-6 py-3">Section</th>
                    <th scope="col" class="px-6 py-3">Date</th>
                    <th scope="col" class="px-6 py-3">Attendance</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @forelse($quest as $q)
                <tr>
                    <td class="px-6 py-4">{{ $q->code }}</td>
                    <td class="px-6 py-4">{{ $q->name }}</td>
                    <td class="px-6 py-4">{{ $q->year }}</td>
                    <td class="px-6 py-4">{{ $q->section }}</td>
                    <td class="px-6 py-4">{{ $q->date }}</td>
                    <td class="px-6 py-4 text-green-700">{{ $q->attendance }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center">No data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div>
            {{ $quest->links() }}
        </div>
    </div>

    <div class="flex justify-end mr-12 mt-2">
        <x-button secondary label="Print" class="w-64" id="printButton" />
    </div>

    <x-modal wire:model.defer="add_modal">
        <x-card title="Create Attendance">
            <div class="space-y-3">
                <x-input label="Code" placeholder="" wire:model="code" />
                <x-datetime-picker label="Date" placeholder="Date" wire:model.defer="date" without-time />
            </div>
            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" negative />
                    <x-button positive label="Submit" wire:click="submit" spinner="submit" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>

    <script>
        function printPage() {
            var printContent = document.getElementById("printContent").innerHTML;
            var originalContent = document.body.innerHTML;

            var header = "<h1 style='text-align: center;'>ATTENDANCE</h1>";
            printContent = header + printContent;

            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = originalContent;
            window.location.reload();
        }

        document.getElementById("printButton").addEventListener("click", printPage);
    </script>

    <style>
        @media print {
            body > *:not(#printContent) {
                display: none !important;
            }
        }
    </style>
</div>
