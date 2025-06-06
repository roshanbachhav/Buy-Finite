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
                    <div class="flex flex-wrap items-center gap-2">
                        <select
                            class="block w-full md:w-auto px-3 py-2 text-sm border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">All Messages</option>
                            <option value="read">Read</option>
                            <option value="unread">Unread</option>
                        </select>
                        <select
                            class="block w-full md:w-auto px-3 py-2 text-sm border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">All Status</option>
                            <option value="resolved">Resolved</option>
                            <option value="unresolved">Unresolved</option>
                        </select>
                        <button
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Apply Filters
                        </button>
                    </div>
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
                                    Message</th>
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
                        <tbody class="bg-white divide-y divide-gray-200 text-sm">
                            @forelse ($messages as $message)
                                <tr
                                    class="{{ is_null($message->read_at) ? 'bg-gray-50' : '' }} hover:bg-gray-100 transition">
                                    <td class="px-6 py-4 font-medium text-gray-800">{{ $message->id }}</td>
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-gray-900">{{ $message->first_name }}
                                            {{ $message->last_name }}</div>
                                        <div class="text-xs text-gray-400">{{ $message->phone_no }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-700">{{ $message->email }}</td>
                                    <td class="px-6 py-4 text-gray-700">{{ $message->subject }}</td>
                                    <td class="px-6 py-4 text-gray-600 max-w-xs truncate"
                                        title="{{ $message->message }}">
                                        {{ Str::limit($message->message, 30) }}
                                    </td>
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
                                    <td class="px-6 py-4 text-right flex flex-col space-x-1 whitespace-nowrap">
                                        <span>

                                            <a href="{{ route('messages.show', $message) }}" title="View"
                                                class="inline-flex items-center px-2 py-1 text-xs text-indigo-600 hover:text-indigo-900 font-medium">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-eye-icon lucide-eye">
                                                    <path
                                                        d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                                                    <circle cx="12" cy="12" r="3" />
                                                </svg>
                                            </a>
                                        </span>
                                        <form method="POST" action="{{ route('messages.markRead', $message) }}"
                                            class="inline">
                                            @csrf
                                            <button type="submit" title="Mark Read"
                                                class="inline-flex items-center px-2 py-1 text-xs text-blue-600 hover:text-blue-900 font-medium">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-circle-check-big-icon lucide-circle-check-big">
                                                    <path d="M21.801 10A10 10 0 1 1 17 3.335" />
                                                    <path d="m9 11 3 3L22 4" />
                                                </svg>
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('messages.resolve', $message) }}"
                                            class="inline">
                                            @csrf
                                            <button type="submit" title="resolve"
                                                class="inline-flex items-center px-2 py-1 text-xs text-green-600 hover:text-green-800 font-medium">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-square-check-big-icon lucide-square-check-big">
                                                    <path
                                                        d="M21 10.5V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h12.5" />
                                                    <path d="m9 11 3 3L22 4" />
                                                </svg>
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('messages.destroy', $message) }}"
                                            onsubmit="return confirm('Are you sure you want to delete this message?')"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center px-2 py-1 text-xs text-red-600 hover:text-red-800 font-medium">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-trash-icon lucide-trash">
                                                    <path d="M3 6h18" />
                                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                                </svg>
                                            </button>
                                        </form>
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

</body>

</html>
