<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User List
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
				@if(session('success'))
					<div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
						{{ session('success') }}
					</div>
				@endif

				@if(session('error'))
					<div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
						{{ session('error') }}
					</div>
				@endif

                <div class="mb-4">
                    <a href="{{ route('users.create') }}">
						<x-primary-button>
                        	Create User
						</x-primary-button>
                    </a>
                </div>

                <table class="w-full border">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Name</th>
                            <th class="border px-4 py-2">Email</th>
                            <th class="border px-4 py-2">Role</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="border px-4 py-2">{{ $user->id }}</td>
                                <td class="border px-4 py-2">{{ $user->name }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2">
                                    {{ $user->getRoleNames()->join(', ') }}
                                </td>
                                <td class="border px-4 py-2">
                                  <a href="{{ route('users.edit', $user) }}" class="text-blue-600">
                                    Edit
                                  </a>
                                  <form
                                    action="{{ route('users.destroy', $user) }}"
                                    method="POST"
                                    class="inline"
                                  >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                      type="submit"
                                      onclick="return confirm('Delete this user?')"
                                      class="text-red-600"
                                    >
                                      Delete
                                    </button>
                                  </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

				<div class="mt-4">
					{{ $users->links() }}
				</div>

            </div>
        </div>
    </div>
</x-app-layout>