<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class SoapController extends Controller
{
    public function getLowFareSearch()
    {
        $xmlFilePath = storage_path('app/public/SearchResponse.xml');

        $xmlString = File::get($xmlFilePath);

        // Convert XML string to SimpleXMLElement
        $xml = new \SimpleXMLElement($xmlString);

        // Register the 'air' namespace
        $xml->registerXPathNamespace('air', 'http://www.travelport.com/schema/air_v52_0');

        // Use xpath to query the XML for FlightDetails elements
        $flightDetails = $xml->xpath('//air:FlightDetails');

        // Initialize an array to store flight details
        $flightDetailsArray = [];

        // Iterate through FlightDetails elements
        foreach ($flightDetails as $flightDetail) {
            // Extract relevant information
            $flightDetailsArray[] = [
                'key' => (string) $flightDetail['Key'],
                'origin' => (string) $flightDetail['Origin'],
                'destination' => (string) $flightDetail['Destination'],
                'departureTime' => (string) $flightDetail['DepartureTime'],
                'arrivalTime' => (string) $flightDetail['ArrivalTime'],
                'flightTime' => (int) $flightDetail['FlightTime'],
                'travelTime' => (int) $flightDetail['TravelTime'],
                'equipment' => (string) $flightDetail['Equipment'],
                'originTerminal' => isset($flightDetail['OriginTerminal']) ? (string) $flightDetail['OriginTerminal'] : null,
                'destinationTerminal' => isset($flightDetail['DestinationTerminal']) ? (string) $flightDetail['DestinationTerminal'] : null,
            ];
        }

        return view('livewire.fligt-details', compact('flightDetailsArray'));
    }
}
