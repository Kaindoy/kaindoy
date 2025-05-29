@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Reservation Details #{{ $reservation->id }}</h2>

    <table class="table table-bordered">
        <tr>
            <th>Guest Name</th>
            <td>{{ $reservation->guest_name }}</td>
        </tr>
        <tr>
            <th>Room Number</th>
            <td>{{ $reservation->room_number }}</td>
        </tr>
        <tr>
            <th>Check-in Date</th>
            <td>{{ $reservation->check_in->format('Y-m-d') }}</td>
        </tr>
        <tr>
            <th>Check-out Date</th>
            <td>{{ $reservation->check_out->format('Y-m-d') }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ ucfirst($reservation->status) }}</td>
        </tr>
    </table>

    <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Back to List</a>
    <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-warning">Edit</a>
</div>
@endsection
