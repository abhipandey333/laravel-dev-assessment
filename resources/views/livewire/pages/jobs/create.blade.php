<div>
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Create new job posting</h1>
        </div>

        <div class="bg-white shadow rounded-lg p-6">
            <form wire:submit.prevent="save" class="space-y-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" id="title" wire:model="jobModel.title"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Job posting title">
                    @error('jobModel.title')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" wire:model="jobModel.description"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Job posting description"></textarea>
                    @error('jobModel.description')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="experience" class="block text-sm font-medium text-gray-700">Experience</label>
                        <input type="text" id="experience" wire:model="jobModel.experience"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Eg. 1-3 Yrs">
                        @error('jobModel.experience')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="salary" class="block text-sm font-medium text-gray-700">Salary</label>
                        <input type="text" id="salary" wire:model="jobModel.salary"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            placeholder="Eg. 2.75-5 Lacs PA">
                        @error('jobModel.salary')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                        <input type="text" id="location" wire:model="jobModel.location"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            placeholder="Eg. Remote / Pune">
                        @error('jobModel.location')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="extra_info" class="block text-sm font-medium text-gray-700">Extra Info</label>
                        <input type="text" id="extra_info" wire:model="jobModel.extra_info"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            placeholder="Eg. Full Time, Urgent">
                        <span class="text-grey-600 text-sm">Please use comma to separate values</span>
                        @error('jobModel.extra_info')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name</label>
                    <input type="text" id="company_name" wire:model="jobModel.company_name"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    @error('jobModel.company_name')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="logo" class="block text-sm font-medium text-gray-700">Logo</label>
                    <input type="file" id="logo" wire:model="logo"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" accept="image/*">
                    @error('logo')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>

                    <label for="skills" class="block text-sm font-medium text-gray-700">Skills</label>
                    <div wire:ignore>
                        <select id="skills" wire:model="jobModel.skills" multiple
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @foreach ($availableSkills as $key => $skill)
                                <option value="{{ $key }}">{{ $skill }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('jobModel.skills')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md shadow hover:bg-blue-600">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@script
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            $('#skills').select2({
                placeholder: "Select skills",
                allowClear: true,
                multiple: true
            });
        });

        Livewire.on('alert', (event) => {
            Swal.fire({
                icon: event[0].type,
                title: event[0].message,
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location.href = event[0].route;
            });
        })
    </script>
@endscript
