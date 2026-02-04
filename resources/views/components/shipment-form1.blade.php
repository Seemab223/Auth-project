<h1 class="text-2xl font-bold mb-6 text-center">Shipment Details</h1>

<!-- Textarea to input raw data and parse button -->
<div class="mb-6">
    <label class="block font-medium text-gray-700">Enter Shipment Data</label>
    <textarea id="rawData" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-white" rows="12" placeholder="Paste your shipment data here..."></textarea>
    <button type="button" id="parseBtn" class="mt-2 px-4 py-2 bg-blue-600  rounded-md hover:bg-blue-700">Parse</button>
</div>


<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <div>
        <label class="block font-medium text-gray-700">Appt Date</label>
        <input type="text" id="appt_date" readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-50">
    </div>

    <div>
        <label class="block font-medium text-gray-700">PO / REF #</label>
        <input type="text" id="po_ref" readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-50">
    </div>

    <div>
        <label class="block font-medium text-gray-700">Destination</label>
        <input type="text" id="destination" readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-50">
    </div>

    <div>
        <label class="block font-medium text-gray-700">Client</label>
        <input type="text" id="client" readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-50">
    </div>

    <div>
        <label class="block font-medium text-gray-700">BOL</label>
        <input type="text" id="bol" readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-50">
    </div>

    <div>
        <label class="block font-medium text-gray-700">Pallet Positions</label>
        <input type="text" id="pallet_positions" readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-50">
    </div>

    <div>
        <label class="block font-medium text-gray-700">Cartons</label>
        <input type="text" id="cartons" readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-50">
    </div>

    <div>
        <label class="block font-medium text-gray-700">Weight</label>
        <input type="text" id="weight" readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-50">
    </div>

    <div class="sm:col-span-2">
        <label class="block font-medium text-gray-700">Notes</label>
        <textarea id="notes" readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-50" rows="3"></textarea>
    </div>
</div>

<script>
document.addEventListener('paste', (e) => {
    // This gets the REAL table data, including empty cells
    const html = e.clipboardData.getData('text/html');
    if (html.includes('<td')) {
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');
        const cells = Array.from(doc.querySelectorAll('td')).map(td => td.innerText.trim());

        if (cells.length >= 9) {
            const data = cells.length >= 18 ? cells.slice(9) : cells;
            const fields = ['appt_date', 'po_ref', 'destination', 'client', 'bol', 'pallet_positions', 'cartons', 'weight', 'notes'];
            
            fields.forEach((id, i) => {
                if(document.getElementById(id)) document.getElementById(id).value = data[i] || '';
            });
            
            // Optional: prevent the raw text from filling the textarea
            e.preventDefault(); 
        }
    }
});
</script>
