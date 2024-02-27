<div>
    <div class="pump-show-search-form">
        <div>
            <div>
                <x-input-label for="name" :value="__('Pump Name')" />
                <x-text-input wire:model.debounce.100ms="searchName" wire:keydown="applyFilter" id="searchName" name="searchName" type="text" class="mt-1 block w-full"   autofocus autocomplete="searchName" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
        </div>

        <div>
            <label for="month" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Month</label>
            <div class="mt-1">
                <select wire:model="selectedMonth" wire:change="applyFilter" id="month" name="month" autocomplete="zone" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
        </div>

        <div>
            <label for="installation-year" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Year of Installation</label>
            <div class="mt-1">
                <select id="installation-year" name="installation-year" autocomplete="installation-year" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    @for($year = 2024; $year >= 1970; $year--)
                        <option>{{ $year }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div>
            <label for="pumpcondition" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Pump Running Condition</label>
            <div class="mt-1">
                <select wire:model="pumpCondition" wire:change="applyFilter" id="pumpcondition" name="pumpcondition" autocomplete="pumpcondition" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option>Running</option>
                    <option>Not running</option>
                </select>
            </div>
        </div>
    </div>

    <div class="mt-6">
        <div class=" mx-auto rounded-md sm:p-4 dark:text-gray-100 dark:bg-gray-900">
            <div class="p-4">
                <div class="flex justify-between items-center">
                    <h2 class="mb-3 text-2xl font-semibold leading">All tests</h2>
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
                        <th title="Ranking" class="p-3 text-left">#</th>
                        <th title="Last 10 games" class="p-3">Name</th>
                        <th title="Current streak" class="p-3">Phone</th>
                        <th title="Home games" class="p-3">Test Time</th>
                        <th title="Away games" class="p-3">Test Date</th>
                        <th title="Team name" class="p-3 text-left">Running Status</th>
                        <th title="Wins" class="p-3">Water Production</th>
                        <th title="Losses" class="p-3">Free Residual Chlorine</th>
                        <th title="Win percentage" class="p-3">Total Residual Chlorine</th>
                        <th title="Games behind" class="p-3">Combined Residual Chlorine</th>
                        <th title="Current streak" class="p-3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tests as $test)
                        <tr class="text-left border-b border-opacity-20 dark:border-gray-700 dark:bg-gray-800">
                            <td class="px-3 py-2 text-left">
                                <span>{{ $loop->index + 1 }}</span>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <span>{{$test->name}}</span>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <span>{{$test->phone}}</span>
                            </td>
                            <td class="px-3 py-2">
                                <span>{{$test->test_time}}</span>
                            </td>
                            <td class="px-3 py-2">
                                <span>{{$test->test_date}}</span>
                            </td>
                            <td class="px-3 py-2">
                                <span>{{$test->running_status}}</span>
                            </td>
                            <td class="px-3 py-2 text-right">
                                <span>{{$test->water_production}}</span>
                            </td>
                            <td class="px-3 py-2">
                                <span>{{$test->free_residual_chlorine}}</span>
                            </td>
                            <td class="px-3 py-2">
                                <span>{{$test->total_residual_chlorine}}</span>
                            </td>
                            <td class="px-3 py-2">
                                <span>{{$test->combined_residual_chlorine}}</span>
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
                                            <x-dropdown-link :href="route('testUpdate', ['pump' => $this->pumpId, 'test' => $test->id,])" wire:navigate>
                                                {{ __('Edit') }}
                                            </x-dropdown-link>

                                            <button
                                                wire:click="deletePump({{ $test->id }})"
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
            {{ $tests->links() }}
        </div>
    </div>
</div>
