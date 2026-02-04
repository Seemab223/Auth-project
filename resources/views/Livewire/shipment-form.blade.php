<div class="p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-xl font-bold mb-4">Shipment Lookup</h2>

    <!-- Search Box -->
    <form wire:submit.prevent="fetchShipment" class="mb-6">
        <label class="block font-medium text-gray-700">Enter PO / REF #</label>
        <input type="text" wire:model="searchCode" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" placeholder="Enter PO / REF #">
        <button type="submit" class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Fetch</button>
    </form>

    <!-- Auto-filled fields -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        @foreach($shipment as $label => $value)
            @php
                $formattedLabel = ucwords(str_replace('_', ' ', $label));
            @endphp

            @if($label === 'notes')
                <div class="sm:col-span-2">
                    <label class="block font-medium text-gray-700">{{ $formattedLabel }}</label>
                    <textarea readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-50" rows="3">{{ $value }}</textarea>
                </div>
            @else
                <div>
                    <label class="block font-medium text-gray-700">{{ $formattedLabel }}</label>
                    <input type="text" readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-50" value="{{ $value }}">
                </div>
            @endif
        @endforeach
    </div>
</div>
