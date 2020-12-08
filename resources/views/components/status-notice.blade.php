@props(['status'])

@if ($status)
<div class="p-4 bg-gray-300 font-bold">{{ $status }}</div>
@endif