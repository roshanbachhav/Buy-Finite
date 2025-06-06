@extends('layouts.adminApp')

@include('admin.sideMenu')
<div class="p-6 sm:ml-64">
    <div class="p-6 bg-white shadow rounded-lg">
        <h2 class="text-2xl font-semibold mb-4">Message from {{ $message->first_name }} {{ $message->last_name }}</h2>
        <p><strong>Email:</strong> {{ $message->email }}</p>
        <p><strong>Phone:</strong> {{ $message->phone_no }}</p>
        <p><strong>Subject:</strong> {{ $message->subject }}</p>
        <p class="mt-4"><strong>Message:</strong></p>
        <p class="mt-2 text-gray-700">{{ $message->message }}</p>
        <p class="mt-4 text-sm text-gray-500">Submitted on: {{ $message->created_at->format('Y-m-d H:i') }}</p>
    </div>
</div>
