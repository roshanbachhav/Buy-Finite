@extends('layouts.adminApp')

@include('admin.sideMenu')
<div class="p-6 sm:ml-64">
    <div class="p-6 bg-white shadow-lg rounded-xl border border-gray-200 dark:bg-gray-800 dark:border-gray-700">

        <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">
            Message from {{ $message->first_name }} {{ $message->last_name }}
        </h2>


        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-700 dark:text-gray-300">
            <p><strong>Email:</strong> {{ $message->email }}</p>
            <p><strong>Phone:</strong> {{ $message->phone_no }}</p>
            <p class="col-span-2"><strong>Subject:</strong> {{ $message->subject }}</p>
        </div>


        <div class="mt-6">
            <p class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Message:</p>
            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{{ $message->message }}</p>
        </div>


        <p class="mt-6 text-sm text-gray-500 dark:text-gray-400">
            Submitted on: {{ $message->created_at->format('F j, Y \a\t g:i A') }}
        </p>

        <div class="mt-6 flex flex-wrap gap-3">
            @if ($message->read_at)
                <button type="button" disabled
                    class="inline-flex items-center justify-center h-10 px-5 py-2.5 text-sm font-medium text-white bg-gray-400 cursor-not-allowed rounded-md shadow">
                    ✅ Mark as Read
                </button>
            @else
                <form method="POST" action="{{ route('messages.markRead', $message) }}">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center justify-center h-10 px-5 py-2.5 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-md shadow transition-all">
                        ✅ Mark as Read
                    </button>
                </form>
            @endif

            @if ($message->is_resolved)
                <button type="button" disabled
                    class="inline-flex items-center justify-center h-10 px-5 py-2.5 text-sm font-medium text-white bg-gray-400 cursor-not-allowed rounded-md shadow">
                    ✅ Resolved
                </button>
            @else
                <form method="POST" action="{{ route('messages.resolve', $message) }}">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center justify-center h-10 px-5 py-2.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-md shadow">
                        ✔️ Resolve
                    </button>
                </form>
            @endif


            <form method="POST" action="{{ route('messages.destroy', $message) }}"
                onsubmit="return confirm('Are you sure you want to delete this message?')" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="inline-flex items-center justify-center h-10 px-5 py-2.5 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-md shadow transition-all">

                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-trash-icon lucide-trash mx-2">
                        <path d="M3 6h18" />
                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                    </svg>
                    Delete
                </button>
            </form>


            <a href="mailto:{{ $message->email }}">
                <button
                    class="inline-flex items-center justify-center h-10 px-5 py-2.5 text-sm font-medium text-white bg-sky-500 hover:bg-sky-700 rounded-md shadow transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-send-icon lucide-send mx-2">
                        <path
                            d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z" />
                        <path d="m21.854 2.147-10.94 10.939" />
                    </svg>

                    {{ $message->email }}
                </button>
            </a>


            <a href="{{ route('dashboard') }}"
                class="inline-flex items-center h-10 justify-center px-5 py-2.5 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-md shadow transition-all dark:text-white dark:bg-gray-700 dark:hover:bg-gray-600">
                🏠 Go to Dashboard
            </a>
        </div>
    </div>
</div>
