<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modify User
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

				@if ($errors->any())
					<div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
						<ul class="list-disc list-inside">
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

                <form method="POST" action="{{ route('users.update', $user) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label>Name</label>
                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $user->name) }}"
                            class="w-full border rounded px-3 py-2"
                        >
                    </div>

                    <div class="mb-4">
                        <label>Email</label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $user->email) }}"
                            class="w-full border rounded px-3 py-2"
                        >
                    </div>

                    <div class="mb-4">
                        <label>Password</label>
                        <input
                            type="password"
                            name="password"
                            class="w-full border rounded px-3 py-2"
                        >
                    </div>

                    <div class="mb-4">
                        <label>Role</label>

                        <select
                            name="role"
                            class="w-full border rounded px-3 py-2"
                        >
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}" @selected($user->hasRole($role->name))>
                                    {{ ucfirst($role->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button
                        type="submit"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700"
                    >
                        Update
                    </button>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>