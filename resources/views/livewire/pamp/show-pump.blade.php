<div>
    <div class="pump-show-search-form">
        <div class="p-4">
            <div class="flex justify-between items-center">
                <div>
                    <x-input-label for="name" :value="__('Pump Name')" />
                    <x-text-input wire:model="searchName" id="searchName" name="searchName" type="text" class="mt-1 block w-full"   autofocus autocomplete="searchName" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
            </div>
        </div>

        <div>
            <label for="zone" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Zone</label>
            <div class="mt-1">
                <select id="zone" name="zone" autocomplete="zone" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option>Zone-1</option>
                    <option>Zone-2</option>
                    <option>Zone-3</option>
                    <option>Zone-4</option>
                    <option>Zone-5</option>
                    <option>Zone-6</option>
                    <option>Zone-7</option>
                    <option>Zone-8</option>
                    <option>Zone-9</option>
                    <option>Zone-10</option>
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
                <select id="pumpcondition" name="pumpcondition" autocomplete="pumpcondition" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option>Running</option>
                    <option>Not running</option>
                </select>
            </div>
        </div>

        <div class="">
            <div class="flex justify-center">
                <x-primary-button>{{ __('Search') }}</x-primary-button>
            </div>
        </div>
    </div>

    <div class="mt-6">
        <div class=" mx-auto rounded-md sm:p-4 dark:text-gray-100 dark:bg-gray-900">
            <div class="p-4">
                <div class="flex justify-between items-center">
                    <h2 class="mb-3 text-2xl font-semibold leadi">All pump</h2>
                    <div>
                        <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full"   autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                </div>
            </div>

            <x-action-message class="me-3" on="pump_updated">
                {{ __('deleted.') }}
            </x-action-message>

            <div class="overflow-x-auto mb-4">
                <table class="min-w-full text-xs w-full">
                    <thead class="rounded-t-lg dark:bg-gray-700">
                    <tr class="text-left">
                        <th title="Ranking" class="p-3 text-left">#</th>
                        <th title="Team name" class="p-3 text-left">Name</th>
                        <th title="Wins" class="p-3">Source Identification</th>
                        <th title="Losses" class="p-3">Pump Location</th>
                        <th title="Win percentage" class="p-3">DMA</th>
                        <th title="Games behind" class="p-3">Zone</th>
                        <th title="Home games" class="p-3">Installation Year</th>
                        <th title="Away games" class="p-3">Depth</th>
                        <th title="Last 10 games" class="p-3">Chlorination Unit Status</th>
                        <th title="Current streak" class="p-3">Pump Running Status</th>
                        <th title="Current streak" class="p-3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pumps as $pump)
                        <tr class="text-left border-b border-opacity-20 dark:border-gray-700 dark:bg-gray-800">
                            <td class="px-3 py-2 text-left">
                                <span>{{ $loop->index + 1 }}</span>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <span>{{$pump->name}}</span>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <span>{{$pump->source_identification}}</span>
                            </td>
                            <td class="px-3 py-2">
                                <span>{{$pump->location_of_pump}}</span>
                            </td>
                            <td class="px-3 py-2">
                                <span>{{$pump->dma}}</span>
                            </td>
                            <td class="px-3 py-2">
                                <span>{{$pump->zone}}</span>
                            </td>
                            <td class="px-3 py-2 text-right">
                                <span>{{$pump->year_of_installation}}</span>
                            </td>
                            <td class="px-3 py-2">
                                <span>{{$pump->depth}}</span>
                            </td>
                            <td class="px-3 py-2">
                                <span>{{$pump->chlorination_unit_condition}}</span>
                            </td>
                            <td class="px-3 py-2">
                                <span>{{$pump->pump_running_condition}}</span>
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
                                            <x-dropdown-link :href="route('test', ['pump' => $pump->id])" wire:navigate>
                                                {{ __('Test History') }}
                                            </x-dropdown-link>

                                            <x-dropdown-link :href="route('addTestHistory', ['pump' => $pump->id])" wire:navigate>
                                                {{ __('Add Test History') }}
                                            </x-dropdown-link>

                                            <x-dropdown-link :href="route('updatePump', ['pump' => $pump->id])" wire:navigate>
                                                {{ __('Edit') }}
                                            </x-dropdown-link>

                                            <button
                                                wire:click="deletePump({{ $pump->id }})"
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
            {{ $pumps->links() }}
        </div>
    </div>
</div>
