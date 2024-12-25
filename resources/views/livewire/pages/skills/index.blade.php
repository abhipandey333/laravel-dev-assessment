<div>
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Skills</h1>
        </div>

        <div class="bg-white shadow rounded-lg mb-6">
            <table class="min-w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="text-left py-3 px-6 font-medium text-gray-600">Name</th>
                        <th class="py-3 px-6"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($skills as $skill)
                        <tr class="border-b">
                            <td class="py-3 px-6">{{ $skill->name }}</td>
                            <td class="py-3 px-6 text-right">
                                <button class="text-blue-500 hover:underline"
                                    wire:click="edit({{ $skill->id }})">Edit</button>
                                <button class="text-red-500 hover:underline ml-4"
                                    onclick="confirmDelete({{ $skill->id }})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-4">Add new skill</h2>
            <form wire:submit.prevent="save">
                <div class="mb-4">
                    <label for="skill_name" class="block text-gray-700 font-medium mb-2">Name</label>
                    <input type="text" id="skill_name" placeholder="Enter Skill name" wire:model="name"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Save</button>
            </form>
        </div>
    </div>
</div>

<script>
    const confirmDelete = (skillId) => {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('delete', {
                    id: skillId
                });
                Swal.fire(
                    'Deleted!',
                    'Your skill has been deleted.',
                    'success'
                );
            }
        });
    }
</script>
