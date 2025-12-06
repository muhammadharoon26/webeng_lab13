<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Message -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <!-- LAB TASK: Display Session Data -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <!-- Card 1: User Session Details -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-bold text-blue-600 dark:text-blue-400 mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">User Session Info</h3>
                    <ul class="space-y-3">
                        <li class="flex justify-between">
                            <span class="font-medium text-gray-600 dark:text-gray-400">Username:</span>
                            <span class="text-gray-900 dark:text-gray-100">{{ session('username') }}</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="font-medium text-gray-600 dark:text-gray-400">Role:</span>
                            <span class="bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200 text-xs font-semibold px-2.5 py-0.5 rounded">
                                {{ session('role') }}
                            </span>
                        </li>
                        <li class="flex justify-between">
                            <span class="font-medium text-gray-600 dark:text-gray-400">Last Login:</span>
                            <span class="text-gray-900 dark:text-gray-100 text-sm">{{ session('last_login_time') }}</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="font-medium text-gray-600 dark:text-gray-400">Login Counter:</span>
                            <span class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-xs font-semibold px-2.5 py-0.5 rounded">
                                {{ session('login_counter') }}
                            </span>
                        </li>
                    </ul>
                </div>

                <!-- Card 2: JSON Data Retrieval -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-bold text-green-600 dark:text-green-400 mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">Academic Data (From JSON)</h3>
                    
                    @php
                        // 1. Retrieve JSON string from session
                        $jsonString = session('academic_data_json');

                        // 2. Decode JSON back to an Object (or Array)
                        // json_decode($string) returns an object
                        // json_decode($string, true) returns an associative array
                        $academicInfo = json_decode($jsonString);
                    @endphp

                    @if($academicInfo)
                        <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-md border border-green-200 dark:border-green-800">
                            <p class="mb-2">
                                <span class="font-bold text-gray-700 dark:text-gray-300">Course:</span> 
                                <span class="text-gray-900 dark:text-gray-100">{{ $academicInfo->course }}</span>
                            </p>
                            <p class="mb-2">
                                <span class="font-bold text-gray-700 dark:text-gray-300">Semester:</span> 
                                <span class="text-gray-900 dark:text-gray-100">{{ $academicInfo->semester }}</span>
                            </p>
                            <p>
                                <span class="font-bold text-gray-700 dark:text-gray-300">Year:</span> 
                                <span class="text-gray-900 dark:text-gray-100">{{ $academicInfo->year }}</span>
                            </p>
                        </div>
                        <div class="mt-4 text-xs text-gray-400 dark:text-gray-500">
                            <strong>Raw JSON:</strong> {{ $jsonString }}
                        </div>
                    @else
                        <p class="text-red-500 dark:text-red-400">No JSON data found in session.</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
