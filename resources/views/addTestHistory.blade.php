<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Test Result Entry') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="card-container mb-6">
                        <div class="rounded-md shadow-md sm:w-96 dark:bg-gray-900 dark:text-gray-100">
                            <div class="p-4 space-y-2 show-pump-info-test">
                                <p class="font-bold">Pump Name: {{ $pump->name }}</p>
                                <p class="font-bold">Source Identifications: {{ $pump->source_identification }}</p>
                                <p class="font-bold">Location: {{ $pump->location_of_pump }}</p>
                                <p class="font-bold">DMA: {{ $pump->dma }}</p>
                                <p class="font-bold">Zone: {{ $pump->zone }}</p>
                                <p class="font-bold">Installation Year: {{ $pump->year_of_installation }}</p>
                                <p class="font-bold">Depth(ft): {{ $pump->depth }}</p>
                                <p class="font-bold">Running Condition: {{ $pump->pump_running_condition }}</p>
                                <p class="font-bold">Chlorination Unit Status: {{ $pump->chlorination_unit_condition }}</p>
                            </div>
                        </div>
                    </div>

                    <livewire:pamp.AddTestHistory :pump="$pump"/>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
