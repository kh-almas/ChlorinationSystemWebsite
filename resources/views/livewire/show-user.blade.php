<div>
    <div class="mt-6">
        <div class=" mx-auto rounded-md sm:p-4 dark:text-gray-100 dark:bg-gray-900">
            <div class="p-4">
                <div class="flex justify-between items-center">
                    <h2 class="mb-3 text-2xl font-semibold leading">All Users</h2>
                    {{--                    <div>--}}
                    {{--                        <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full"   autofocus autocomplete="name" />--}}
                    {{--                        <x-input-error class="mt-2" :messages="$errors->get('name')" />--}}
                    {{--                    </div>--}}
                </div>
            </div>

            <x-action-message class="me-3" on="test_deleted">
                {{ __('deleted.') }}
            </x-action-message>

            <div class="overflow-x-auto mb-4">
                <table class="min-w-full text-xs w-full">
                    <thead class="rounded-t-lg dark:bg-gray-700">
                    <tr class="text-left">
                        <th class="p-3 text-left">#</th>
                        <th class="p-3">Name</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Father Name</th>
                        <th class="p-3">Blood Group</th>
                        <th class="p-3">Birthday</th>
                        <th class="p-3">Joining Date</th>
                        <th class="p-3">Phone Number</th>
                        <th class="p-3">Present Address</th>
                        <th class="p-3">Permanent Address</th>
                        <th class="p-3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr class=" text-center border-b border-opacity-20 dark:border-gray-700 dark:bg-gray-800">
                            <td class="px-3 py-2">
                                <span>{{ $loop->index + 1 }}</span>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <span>{{$user->name}}</span>
                            </td>
                            <td class="px-3 py-2">
                                <span>{{$user->email}}</span>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <span>{{$user->father_name}}</span>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <span>{{$user->blood_group}}</span>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <span>{{$user->birthday}}</span>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <span>{{$user->joining_date}}</span>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <span>{{$user->phone_no_one}}</span>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <span>{{$user->present_address}}</span>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <span>{{$user->permanent_address}}</span>
                            </td>
                            <td class="px-3 py-2" style="max-width: 50px !important;">
                                <div>
                                    <x-dropdown align="right" class="w-20">
                                        <x-slot name="trigger">
                                            <button class="inline-flex items-center px-2 py-1 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                                Action
                                            </button>
                                        </x-slot>

                                        <x-slot name="content">
                                            <button
                                                wire:click="deletePump({{ $user->id }})"
                                                onclick="confirm('Are you sure you want to delete this pump?') || event.stopImmediatePropagation()"
                                                class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out"
                                            >
                                                {{ __('Delete') }}
                                            </button>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="py-7">
            {{ $users->links() }}
        </div>
    </div>
</div>
