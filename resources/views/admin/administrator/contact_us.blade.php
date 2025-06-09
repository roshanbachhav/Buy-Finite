<!DOCTYPE html>
<html lang="en">
@extends('layouts.adminApp')

<body>
    @include('admin.sideMenu')
    <div class="p-6 sm:ml-64">

        <main class="flex-1 p-4 sm:p-6 overflow-hidden">
            <div class="mb-6 bg-white rounded-lg shadow p-4">
                <div
                    class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4">
                    <div class="flex-1">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" id="search"
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                placeholder="Search by name, email or subject...">
                        </div>
                    </div>
                    <form method="get" action="{{ route('admin.ContactUs') }}">
                        <div class="flex flex-wrap items-center gap-2">
                            <select name="read"
                                class="block w-full md:w-auto px-3 py-2 text-sm border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">All Messages</option>
                                <option value="read" {{ request('read' == 'read' ? 'selected' : '') }}>Read
                                </option>
                                <option value="unread" {{ request('read') == 'unread' ? 'selected' : '' }}>Unread
                                </option>
                            </select>
                            <select name="status"
                                class="block w-full md:w-auto px-3 py-2 text-sm border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">All Status</option>
                                <option value="resolved" {{ request('status' == 'resolved' ? 'selected' : '') }}>
                                    Resolved</option>
                                <option value="unresolved" {{ request('status' == 'unresolved' ? 'selected' : '') }}>
                                    Unresolved</option>
                            </select>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Apply Filters
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Subject</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody id="messages-table" class="bg-white divide-y divide-gray-200 text-sm">
                            @forelse ($messages as $message)
                                <tr
                                    class="{{ is_null($message->read_at) ? 'bg-gray-50' : '' }} hover:bg-gray-100 transition">
                                    <td class="px-6 py-4 font-medium text-gray-800">{{ $message->id }}</td>
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-gray-900 text-sm">{{ $message->first_name }}
                                            {{ $message->last_name }}</div>
                                        <div class="text-xs text-gray-400">{{ $message->phone_no }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-700">{{ Str::limit($message->email, 10) }}</td>
                                    <td class="px-6 py-4 text-gray-700">{{ $message->subject }}</td>

                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-full {{ $message->is_resolved ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ $message->is_resolved ? 'Resolved' : 'Unresolved' }}
                                        </span>
                                        <div class="mt-1 text-xs text-gray-500">
                                            {{ $message->read_at ? 'Read: ' . $message->read_at->format('Y-m-d H:i') : 'Unread' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">
                                        {{ $message->created_at->format('Y-m-d') }}
                                    </td>
                                    <td class="px-6 py-4 text-right relative" x-data="{ open: false }">

                                        <button @click="open = !open"
                                            class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-gray-100 hover:bg-gray-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 4v16m8-8H4" />
                                            </svg>
                                        </button>

                                        <div x-show="open" @click.outside="open = false"
                                            class="absolute right-0 mt-2 flex gap-3 bg-white border border-gray-200 shadow-lg rounded-full px-4 py-2 z-50 transition-all duration-200"
                                            style="min-width: max-content;">
                                            <a href="{{ route('messages.show', $message) }}" title="View"
                                                class="text-indigo-600 hover:text-indigo-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-scan-eye-icon lucide-scan-eye">
                                                    <path d="M3 7V5a2 2 0 0 1 2-2h2" />
                                                    <path d="M17 3h2a2 2 0 0 1 2 2v2" />
                                                    <path d="M21 17v2a2 2 0 0 1-2 2h-2" />
                                                    <path d="M7 21H5a2 2 0 0 1-2-2v-2" />
                                                    <circle cx="12" cy="12" r="1" />
                                                    <path
                                                        d="M18.944 12.33a1 1 0 0 0 0-.66 7.5 7.5 0 0 0-13.888 0 1 1 0 0 0 0 .66 7.5 7.5 0 0 0 13.888 0" />
                                                </svg>
                                            </a>

                                            <form method="POST" action="{{ route('messages.markRead', $message) }}">
                                                @csrf
                                                <button type="submit" title="Mark as Read"
                                                    class="text-blue-600 hover:text-blue-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                        height="18" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="lucide lucide-check-icon lucide-check">
                                                        <path d="M20 6 9 17l-5-5" />
                                                    </svg>
                                                </button>
                                            </form>

                                            <form method="POST" action="{{ route('messages.resolve', $message) }}">
                                                @csrf
                                                <button type="submit" title="Resolve"
                                                    class="text-green-600 hover:text-green-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                        height="18" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="lucide lucide-circle-check-big-icon lucide-circle-check-big">
                                                        <path d="M21.801 10A10 10 0 1 1 17 3.335" />
                                                        <path d="m9 11 3 3L22 4" />
                                                    </svg>
                                                </button>
                                            </form>

                                            <form method="POST" action="{{ route('messages.destroy', $message) }}"
                                                onsubmit="return confirm('Are you sure you want to delete this message?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Delete"
                                                    class="text-red-600 hover:text-red-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                        height="18" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="lucide lucide-circle-x-icon lucide-circle-x">
                                                        <circle cx="12" cy="12" r="10" />
                                                        <path d="m15 9-6 6" />
                                                        <path d="m9 9 6 6" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-6 py-4 text-center text-gray-500">No messages found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

                <div class="flex items-center justify-between p-4 border-t border-blue-gray-50">
                    <a href="{{ $messages->previousPageUrl() }}">
                        <button
                            class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="button" {{ $messages->onFirstPage() ? 'disabled' : '' }}
                            wire:click="previousPage">
                            Previous
                        </button>
                    </a>

                    <div class="flex flex-col items-center gap-2 paginate-integers">
                        {{ $messages->links() }}
                    </div>

                    <a href="{{ $messages->nextPageUrl() }}">
                        <button
                            class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="button" {{ $messages->hasMorePages() ? '' : 'disabled' }} wire:click="nextPage">
                            Next
                        </button>
                    </a>
                </div>
            </div>
        </main>

    </div>

    <script>
        document.getElementById('search').addEventListener('input', function(e) {
            const term = e.target.value.toLowerCase();
            document.querySelectorAll('#messages-table tr').forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(term) ? '' : 'none';
            });
        })
    </script>
</body>

</html>
