<!DOCTYPE html>
<html lang="en">
@extends('layouts.adminApp')

<body>
    @include('admin.sideMenu')
    <div class="p-4 sm:ml-64 bg-gradient-to-r from-indigo-200 via-pink-300 to-yellow-200">
        <div class="p-8">
            <div id="toast-container" class="fixed top-5 right-5 z-50 space-y-3 w-80">
                <div class="toast-template hidden">
                    <div
                        class="flex items-start p-4 rounded-lg shadow-lg border-l-4 transform transition-all duration-300 translate-x-full">
                        <div class="toast-icon flex-shrink-0 w-6 h-6 mt-0.5"></div>
                        <div class="ml-3 flex-1">
                            <p class="text-sm font-medium toast-message"></p>
                        </div>
                        <button class="ml-4 close-btn opacity-70 hover:opacity-100 transition-opacity">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div
                class="relative flex flex-col p-2 w-full h-full text-gray-700 bg-white bg-opacity-30 backdrop-blur-lg border-2 border-white border-opacity-20 rounded-xl">
                <div class="p-6 border-b">
                    <h1 class="text-2xl font-semibold text-gray-800">Orders</h1>
                </div>

                <div class="p-6 flex justify-between items-center">
                    <input type="text" id="searchInput" placeholder="Search..."
                        class="px-4 py-2 border border-transparent rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white bg-opacity-20 backdrop-blur-lg shadow-md text-black placeholder-gray-400">

                    <button id="deleteSelected" style="display: none;"
                        class="px-4 py-2 bg-gradient-to-r from-red-500 via-pink-500 to-yellow-500 text-white font-semibold rounded-lg shadow-md 
                        transition-all duration-600 ease-in-out transform  hover:from-red-600 hover:via-pink-700 hover:to-orange-500
                        active:from-yellow-600 active:via-red-600 active:to-pink-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400">
                        Delete Selected
                    </button>

                </div>

                <div class="overflow-x-auto my-5 p-2 rounded-xl ">
                    <table class="w-full border border-gray-500 rounded-xl overflow-hidden">
                        <thead class="bg-gray-100">
                            <tr>
                                <th
                                    class="py-3 px-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <input type="checkbox" id="selectAll" class="rounded border-gray-300">
                                </th>
                                <th class="py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Order ID</th>
                                <th class="py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer sort-header"
                                    data-column="1">
                                    Ship to ▲▼
                                </th>
                                <th class="py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email</th>
                                <th class="py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Phone No</th>
                                <th class="py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th class="py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Payment</th>
                                <th class="py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Amount</th>
                                <th
                                    class="py-3 flex justify-center text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Purchase Date</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($orders as $o)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-4 px-2 whitespace-nowrap">
                                        <input type="checkbox" value="{{ $o->id }}"
                                            class="row-checkbox rounded border-gray-300">
                                    </td>
                                    <td class="py-4 whitespace-nowrap text-xs text-center">
                                        <a href="{{ route('orderShow', $o->id) }}"
                                            class="text-blue-600 hover:text-blue-900 underline">
                                            #orderId{{ $o->id }}
                                        </a>
                                    </td>
                                    <td class="py-4 whitespace-nowrap text-xs text-center">{{ $o->name }}</td>
                                    <td class="py-4 whitespace-nowrap text-xs text-center">{{ $o->email }}</td>
                                    <td class="py-4 whitespace-nowrap text-xs text-center">{{ $o->mobile_number }}</td>
                                    <td class="py-4 whitespace-nowrap text-xs text-center">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold">
                                            <div
                                                class="text-xs truncate relative flex items-center gap-2 px-2 py-1 font-sans font-bold uppercase rounded-full select-none whitespace-nowrap max-w-fit inline-block
                                                {{ $o->status === 'completed'
                                                    ? 'bg-green-500/20 text-green-900'
                                                    : ($o->status === 'processing'
                                                        ? 'bg-blue-500/20 text-blue-900'
                                                        : ($o->status === 'canceled'
                                                            ? 'bg-red-500/20 text-red-900'
                                                            : 'bg-amber-500/20 text-amber-900')) }}">

                                                @if ($o->status === 'pending')
                                                    <svg class="w-4 h-4 text-amber-900" fill="none"
                                                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M12 6v6l4 2"></path>
                                                    </svg>
                                                @elseif ($o->status === 'processing')
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                        height="14" viewBox="0 0 24 24" fill="none"
                                                        stroke="#1e3a8a" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="lucide lucide-loader">
                                                        <path d="M12 2v4" />
                                                        <path d="m16.2 7.8 2.9-2.9" />
                                                        <path d="M18 12h4" />
                                                        <path d="m16.2 16.2 2.9 2.9" />
                                                        <path d="M12 18v4" />
                                                        <path d="m4.9 19.1 2.9-2.9" />
                                                        <path d="M2 12h4" />
                                                        <path d="m4.9 4.9 2.9 2.9" />
                                                    </svg>
                                                @elseif ($o->status === 'completed')
                                                    <svg class="w-4 h-4 text-green-900" fill="none"
                                                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                @elseif ($o->status === 'canceled')
                                                    <svg class="w-4 h-4 text-red-900" fill="none"
                                                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                @endif

                                                <span>{{ ucfirst($o->status) }}</span>
                                            </div>
                                        </span>
                                    </td>
                                    <td class="py-4 whitespace-nowrap text-xs text-center">
                                        <span>{{ $o->payment_status === 'paid' ? 'Paid' : 'Unpaid' }}</span>
                                    </td>
                                    <td class="py-4 whitespace-nowrap text-xs text-center">
                                        ₹ {{ number_format($o->total_amount, 2) }}</td>
                                    <td class="py-4 flex justify-center whitespace-nowrap text-xs">
                                        {{ $o->created_at->format('d M, Y') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="flex items-center justify-between p-4 border-t border-blue-gray-50">
                        <a href="{{ $orders->previousPageUrl() }}">
                            <button
                                class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button" {{ $orders->onFirstPage() ? 'disabled' : '' }}
                                wire:click="previousPage">
                                Previous
                            </button>
                        </a>

                        <div class="flex flex-col items-center paginate-integers">
                            {{ $orders->links() }}
                        </div>

                        <a href="{{ $orders->nextPageUrl() }}">
                            <button
                                class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button" {{ $orders->hasMorePages() ? '' : 'disabled' }} wire:click="nextPage">
                                Next
                            </button>
                        </a>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const selectAll = document.getElementById('selectAll');
                    const checkboxes = document.querySelectorAll('.row-checkbox');
                    const deleteBtn = document.getElementById('deleteSelected');
                    const sortHeader = document.querySelector('.sort-header');
                    let sortAsc = true;

                    selectAll.addEventListener('change', function() {
                        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
                        toggleDeleteButton();
                    });

                    checkboxes.forEach(checkbox => {
                        checkbox.addEventListener('change', () => {
                            toggleDeleteButton();
                            selectAll.checked = [...checkboxes].every(cb => cb.checked);
                        });
                    });

                    function toggleDeleteButton() {
                        const anyChecked = [...checkboxes].some(cb => cb.checked);
                        deleteBtn.style.display = anyChecked ? 'inline-block' : 'none';
                    }

                    sortHeader.addEventListener('click', () => {
                        const table = document.querySelector('tbody');
                        const rows = [...table.rows];
                        const index = sortHeader.dataset.column;

                        rows.sort((a, b) => {
                            const aVal = a.cells[index].textContent;
                            const bVal = b.cells[index].textContent;
                            return sortAsc ? aVal.localeCompare(bVal) : bVal.localeCompare(aVal);
                        });

                        sortAsc = !sortAsc;
                        sortHeader.innerHTML = `Ship to ${sortAsc ? '▲' : '▼'}`;
                        table.append(...rows);
                    });

                    deleteBtn.addEventListener('click', function() {
                        const selectedIds = [...checkboxes]
                            .filter(cb => cb.checked)
                            .map(cb => cb.value);

                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You are about to delete selected orders.",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, delete them!',
                            cancelButtonText: 'Cancel',
                            buttonsStyling: false,
                            customClass: {
                                confirmButton: 'bg-green-500 text-white font-medium py-2 px-4 rounded hover:bg-black hover:text-white',
                                cancelButton: 'bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 ml-2',
                                popup: 'rounded-lg shadow-lg border border-gray-200',
                                title: 'text-lg font-semibold text-gray-800',
                                htmlContainer: 'text-sm text-gray-600',
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: "{{ route('order.deleteMultiple') }}",
                                    type: 'DELETE',
                                    data: JSON.stringify({
                                        ids: selectedIds
                                    }),
                                    contentType: 'application/json',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    success: function(data) {
                                        if (data.status) {
                                            location.reload();
                                            showToast(data.message, 'success');
                                        } else {
                                            showToast(data.message, 'error');
                                        }
                                    }
                                });
                            }
                        });
                    })

                    function showToast(message, type = 'success') {
                        const container = document.getElementById('toast-container');
                        const template = container.querySelector('.toast-template');
                        const newToast = template.cloneNode(true);

                        newToast.classList.remove('toast-template', 'hidden');

                        const colors = {
                            success: {
                                bg: 'bg-green-50',
                                border: 'border-green-500',
                                icon: `<svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                   </svg>`
                            },
                            error: {
                                bg: 'bg-red-50',
                                border: 'border-red-500',
                                icon: `<svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                   </svg>`
                            }
                        };

                        const toastBody = newToast.querySelector('div');
                        toastBody.classList.add(colors[type].bg, colors[type].border);
                        newToast.querySelector('.toast-icon').innerHTML = colors[type].icon;
                        newToast.querySelector('.toast-message').textContent = message;

                        newToast.querySelector('.close-btn').addEventListener('click', () => {
                            toastBody.classList.add('translate-x-full', 'opacity-0');
                            setTimeout(() => newToast.remove(), 300);
                        });

                        container.appendChild(newToast);

                        setTimeout(() => {
                            toastBody.classList.remove('translate-x-full');
                            toastBody.classList.add('translate-x-0');
                        }, 10);

                        setTimeout(() => {
                            toastBody.classList.add('translate-x-full', 'opacity-0');
                            setTimeout(() => newToast.remove(), 300);
                        }, 5000);
                    }

                    document.getElementById('searchInput').addEventListener('input', function(e) {
                        const term = e.target.value.toLowerCase();
                        document.querySelectorAll('tbody tr').forEach(row => {
                            const text = row.textContent.toLowerCase();
                            row.style.display = text.includes(term) ? '' : 'none';
                        });
                    });
                });
            </script>
        </div>
    </div>

    @livewireScripts
</body>
