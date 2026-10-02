<div class="min-h-screen bg-gray-100">

    <!-- Page Header -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">

        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800">
                Employee
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Create and manage employee records.
            </p>
        </div>

        <!-- Success Message -->
        @if (session()->has('message'))
            <div class="mb-5 rounded-lg bg-green-50 border border-green-200 px-4 py-3 text-sm text-green-700">
                {{ session('message') }}
            </div>
        @endif

        <!-- Add Employee Card -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">

            <div class="px-6 py-5 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">
                    Add Employee
                </h2>
            </div>

            <form wire:submit="addEmployee">

                <div class="px-6 py-7">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">

                        <!-- Employee Number -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Employee Number
                            </label>

                            <input
                                type="text"
                                wire:model="employee_number"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            >

                            @error('employee_number')
                                <span class="text-sm text-red-600">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Position -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Position
                            </label>

                            <input
                                type="text"
                                wire:model="position"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            >

                            @error('position')
                                <span class="text-sm text-red-600">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- First Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                First Name
                            </label>

                            <input
                                type="text"
                                wire:model="first_name"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            >

                            @error('first_name')
                                <span class="text-sm text-red-600">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Last Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Last Name
                            </label>

                            <input
                                type="text"
                                wire:model="last_name"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            >

                            @error('last_name')
                                <span class="text-sm text-red-600">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Email
                            </label>

                            <input
                                type="email"
                                wire:model="email"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            >

                            @error('email')
                                <span class="text-sm text-red-600">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Phone
                            </label>

                            <input
                                type="text"
                                wire:model="phone"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            >

                            @error('phone')
                                <span class="text-sm text-red-600">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Hire Date -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Hire Date
                            </label>

                            <input
                                type="date"
                                wire:model="hire_date"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            >

                            @error('hire_date')
                                <span class="text-sm text-red-600">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                    </div>

                </div>

                <!-- Button Footer -->
                <div class="bg-gray-50 px-6 py-4 flex justify-end">

                    <button
                        type="submit"
                        class="px-5 py-2.5 bg-slate-900 text-white text-sm font-semibold rounded-md hover:bg-slate-800 transition"
                    >
                        ADD EMPLOYEE
                    </button>

                </div>

            </form>

        </div>


        <!-- Employee List -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden mt-7 mb-10">

            <div class="px-6 py-5 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">
                    Employees
                </h2>
            </div>

            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <thead class="bg-white border-b border-gray-200">

                        <tr class="text-left text-xs uppercase text-gray-500">

                            <th class="px-6 py-3 font-medium">
                                Employee Number
                            </th>

                            <th class="px-6 py-3 font-medium">
                                Name
                            </th>

                            <th class="px-6 py-3 font-medium">
                                Email
                            </th>

                            <th class="px-6 py-3 font-medium">
                                Position
                            </th>

                            <th class="px-6 py-3 font-medium">
                                Hire Date
                            </th>

                            <th class="px-6 py-3 font-medium text-right">
                                Actions
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @forelse ($employees as $employee)

                            <tr class="text-sm text-gray-700">

                                <td class="px-6 py-4">
                                    {{ $employee->employee_number }}
                                </td>

                                <td class="px-6 py-4 font-medium">
                                    {{ $employee->first_name }}
                                    {{ $employee->last_name }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $employee->email }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $employee->position }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $employee->hire_date->format('m/d/Y') }}
                                </td>

                                <td class="px-6 py-4 text-right">

                                    <div class="flex justify-end gap-3">
                                        <button
                                            type="button"
                                            wire:click="editEmployee({{ $employee->id }})"
                                            class="text-blue-600 hover:text-blue-800 font-medium"
                                        >
                                            Edit
                                        </button>

                                        <button
                                            type="button"
                                            wire:click="deleteEmployee({{ $employee->id }})"
                                            wire:confirm="Are you sure you want to delete this employee?"
                                            class="text-red-600 hover:text-red-800 font-medium"
                                        >
                                            Delete
                                        </button>
                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="6"
                                    class="px-6 py-8 text-center text-sm text-gray-500"
                                >
                                    No employees yet.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>