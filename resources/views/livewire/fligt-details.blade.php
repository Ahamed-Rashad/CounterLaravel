<div>
    @if(count($flightDetailsArray) > 0)
    <table>
        <thead>
            <tr>
                <th>Key</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>Departure Time</th>
                <th>Arrival Time</th>
                <th>Flight Time</th>
                <th>Travel Time</th>
                <th>Equipment</th>
                <th>Origin Terminal</th>
                <th>Destination Terminal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($flightDetailsArray as $flightDetail)
            <tr>
                <td>{{ $flightDetail['key'] }}</td>
                <td>{{ $flightDetail['origin'] }}</td>
                <td>{{ $flightDetail['destination'] }}</td>
                <td>{{ $flightDetail['departureTime'] }}</td>
                <td>{{ $flightDetail['arrivalTime'] }}</td>
                <td>{{ $flightDetail['flightTime'] }}</td>
                <td>{{ $flightDetail['travelTime'] }}</td>
                <td>{{ $flightDetail['equipment'] }}</td>
                <td>{{ $flightDetail['originTerminal'] ?? '-' }}</td>
                <td>{{ $flightDetail['destinationTerminal'] ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No flight details available.</p>
    @endif
</div>