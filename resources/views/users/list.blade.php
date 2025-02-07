<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-700">
                                {{ __('Name') }}
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-700">
                                {{ __('Email') }}
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-700">
                                {{ __('Roles') }}
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-700">
                                {{ __('Actions') }}
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $user->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $user->roles->pluck('name')->join(', ') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <x-primary-button x-on:click="$dispatch('open-modal', { name: 'change-role', userId: {{ $user->id }} })">
                                        Change Role
                                    </x-primary-button>
                                    <x-danger-button x-on:click.prevent="$dispatch('open-modal', { 'remove-user', userId: {{ $user->id }} })" class="text-red-500">
                                        Remove
                                    </x-danger-button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Change Member Role Dialog -->
    <x-modal name="change-role" focusable>
        <x-slot name="title">Change Member Role</x-slot>
        <x-slot name="content">
            <form id="changeRoleForm">
                <input type="hidden" id="userId" name="user_id">
                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                <select id="role" name="role" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </form>
        </x-slot>
        <x-slot name="footer">
            <x-primary-button @click="submitChangeRoleForm">Save</x-primary-button>
            <x-secondary-button @click="$dispatch('close-modal', { id: 'change-role' })">Cancel</x-secondary-button>
        </x-slot>
    </x-modal>

    <x-modal name="remove-user" focusable>
        <x-slot name="title">Remove User</x-slot>
        <x-slot name="content">
            <p>Are you sure you want to remove this user?</p>
        </x-slot>
        <x-slot name="footer">
            <x-danger-button @click="removeUser">Yes</x-danger-button>
            <x-secondary-button @click="$dispatch('close-modal', { id: 'remove-user' })">No</x-secondary-button>
        </x-slot>
    </x-modal>
</x-app-layout>
