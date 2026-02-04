<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShipmentForm extends Component
{
    public $searchCode = ''; // The code user types
    public $shipment = [     // Fields in the form
        'appt_date' => '',
        'po_ref' => '',
        'destination' => '',
        'client' => '',
        'bol' => '',
        'pallet_positions' => '',
        'cartons' => '',
        'weight' => '',
        'notes' => '',
    ];

    // Hardcoded data
    public $allShipments = [
        '010341117256' => [
            'appt_date' => 'Jan 15 - 00:00',
            'po_ref' => '010341117256 0620744',
            'destination' => 'COSTCO AIRDRIE DEPOT',
            'client' => 'CB Powell',
            'bol' => '475892',
            'pallet_positions' => '46080',
            'cartons' => 'TBD',
            'weight' => 'TBD',
            'notes' => 'TBD JAN 17 HEAT REQUIRED',
        ],
    ];

    public function fetchShipment()
    {
        if (isset($this->allShipments[$this->searchCode])) {
            $this->shipment = $this->allShipments[$this->searchCode];
        } else {
            $this->shipment = array_map(fn($v) => '', $this->shipment);
        }
    }

    public function render()
    {
        return view('livewire.shipment-form');
    }
}
