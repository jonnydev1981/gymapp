<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Workouts') }}
    </h2>
</x-slot>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    @if (session()->has('message'))
        <div id="alert" class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-500">
            <span class="inline-block align-middle mr-8">
                {{ session('message') }}
            </span>
            <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="document.getElementById('alert').remove();">
                <span>×</span>
            </button>
        </div>
    @endif
    <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-10">Create New Workout</button>
    @if (count($workouts)>0)
        <div class="py-10">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-black bg-black text-left text-xs font-semibold text-white uppercase tracking-wider">
                                {{ __('Name') }}
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-black bg-black text-left text-xs font-semibold text-white uppercase tracking-wider">
                                {{ __('Performed') }}
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-black bg-black text-left text-xs font-semibold text-white uppercase tracking-wider">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($workouts as $workout)
                            <tr>
                                <td class="px-5 py-5 bg-white text-sm @if (!$loop->last) border-gray-200 border-b @endif">
                                    {{ Str::limit($workout->name, 25) }}
                                </td>
                                <td class="px-5 py-5 bg-white text-sm @if (!$loop->last) border-gray-200 border-b @endif">
                                    {{ Str::limit($workout->performed, 25) }}
                                </td>
                                <td class="px-5 py-5 bg-white text-sm @if (!$loop->last) border-gray-200 border-b @endif text-right">
                                    <div class="inline-block whitespace-no-wrap">
                                        <button wire:click="edit({{ $workout->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                                        <button wire:click="$emit('triggerDelete',{{ $workout->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    @if($isOpen)
        <div class="fixed z-100 w-full h-full bg-gray-500 opacity-75 top-0 left-0"></div>
        <div class="fixed z-101 w-full h-full top-0 left-0 overflow-y-auto">
            <div class="table w-full h-full py-6">
                <div class="table-cell text-center align-middle">
                    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="bg-white rounded-lg text-left overflow-hidden shadow-xl">
                            <form>
                                <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label for="nameInput" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nameInput" placeholder="Enter Name" wire:model="name">
                                    @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label for="performedInput" class="block text-gray-700 text-sm font-bold mb-2">Performed:</label>
                                    <input type="datetime-local" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="performedInput" placeholder="Choose performed date/time" wire:model="performed">
                                    @error('performed') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <table>
                                        <th>Set No</th>
                                        <th>Reps</th>
                                        <th>Weight (KG)</th>
                                        <th>Notes</th>
                                        <th>Exercise</th>
                                        @foreach($workout->lines as $line)
                                            <tr>
                                                <td><input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="setnoInput" value="{{ $line->set_no }}"  maxlength="2" size="2"></td>
                                                <td><input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="repsInput" value="{{ $line->reps }}"  maxlength="2" size="2"></td>
                                                <td><input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="weightkgInput" value="{{ $line->weight_kg }}" maxlength="3" size="3"></td>
                                                <td><input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="notesInput" value="{{ $line->notes }}" maxlength="80" size="40"></td>
                                                <td>{{ $line->exercise->name }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                </div>
                                <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <span class="flex w-full sm:ml-3 sm:w-auto">
                                    <button wire:click.prevent="store()" type="button" class="inline-flex bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                                </span>
                                <span class="mt-3 flex w-full sm:mt-0 sm:w-auto">
                                    <button wire:click="closeModal()" type="button" class="inline-flex bg-white hover:bg-gray-200 border border-gray-300 text-gray-500 font-bold py-2 px-4 rounded">Cancel</button>
                                </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {

        @this.on('triggerDelete', workoutId => {
            Swal.fire({
                title: 'Are You Sure?',
                text: 'Workout record will be deleted!',
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Delete!'
            }).then((result) => {
                if (result.value) {
                    @this.call('delete',workoutId)
                } else {
                    console.log("Canceled");
                }
            });
        });
    })
</script>
@endpush
