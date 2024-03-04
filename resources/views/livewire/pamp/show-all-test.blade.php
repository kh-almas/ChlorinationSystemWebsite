<div>
    <div class="pump-show-search-form">
        <div>
            <label for="zone" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Zone</label>
            <div class="mt-1">
                <select wire:model="selectedZone" wire:change="applyFilter" id="zone" name="zone" autocomplete="zone" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value="">Select a zone</option>
                    @foreach($this->allZone as $zone)
                        <option value={{ $zone->zone }}>{{ $zone->zone }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <label for="month" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Test Month</label>
            <div class="mt-1">
                <select wire:model="selectedMonth" wire:change="applyFilter" id="month" name="month" autocomplete="zone" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value="">Select a Month</option>
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
            <label for="installation-year" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Test Pump</label>
            <div class="mt-1">
                <select wire:model="selectedPumpName" wire:change="applyFilter" id="installation-year" name="installation-year" autocomplete="installation-year" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value="">Select a pump</option>
                    @foreach($this->allPump as $pump)
                        <option value={{ $pump->id }}>{{ $pump->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <x-primary-button wire:click="downloadTestData">{{ __('Export Test Data') }}</x-primary-button>
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
                    <thead class="rounded-t-lg dark:bg-gray-700" style="height: 50px">
                    <tr class="text-left">
                        <th class="p-3 text-left">#</th>
                        <th class="p-3">Name</th>
                        <th class="p-3">Phone</th>
                        <th class="p-3">Test Time</th>
                        <th class="p-3" style="white-space: nowrap; cursor: pointer;" wire:click="testDateOrderFN">
                            <div style="display: flex;align-items: center ">
                                Test Date
                                <p style="display: flex; flex-direction: column; padding-left: 6px">
                                    {!! $testDateOrder !== 'asc' ? '<i class="fa-solid fa-angle-up" style="font-size: 8px;"></i>' : '' !!}
                                    {!! $testDateOrder !== 'desc' ? '<i class="fa-solid fa-angle-down" style="font-size: 8px;"></i>' : '' !!}
                                </p>
                            </div>
                        </th>
                        <th class="p-3 text-left">Running Status</th>
                        <th class="p-3">Water Production</th>
                        <th class="p-3">Free Residual Chlorine</th>
                        <th class="p-3">Total Residual Chlorine</th>
                        <th class="p-3">Combined Residual Chlorine</th>
                        <th class="p-3">Action</th>
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
                                <span>{{ \Carbon\Carbon::parse($test->test_time)->format('g:i A') }}</span>
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
                                            <x-dropdown-link :href="route('testUpdate', ['pump' => $test->pump_id, 'test' => $test->id,])" wire:navigate>
                                                {{ __('Edit') }}
                                            </x-dropdown-link>
                                            {{--                                            <x-dropdown-link :href="route('report', ['pump' => $this->pumpId, 'test' => $test->id])" wire:navigate="route('report', ['pump' => $this->pumpId, 'test' => $test->id])" target="_blank">--}}
                                            {{--                                                {{ __('Report') }}--}}
                                            {{--                                            </x-dropdown-link>--}}

                                            <a href="{{ route('report') }}" target="_blank" class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out">
                                                {{ __('Report') }}
                                            </a>

                                            <button wire:click="deletePump({{ $test->id }})"
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