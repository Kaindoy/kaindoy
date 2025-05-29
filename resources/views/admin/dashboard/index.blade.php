@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Hotel Reservation Dashboard</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('reservations.create') }}" class="btn btn-primary mb-3">Add New Reservation</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Guest Name</th>
                <th>Room Number</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->guest_name }}</td>
                    <td>{{ $reservation->room_number }}</td>
                    <td>{{ $reservation->check_in->format('Y-m-d') }}</td>
                    <td>{{ $reservation->check_out->format('Y-m-d') }}</td>
                    <td>{{ ucfirst($reservation->status) }}</td>
                    <td>
                        <a href="{{ route('reservations.show', $reservation->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this reservation?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center">No reservations found.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">{{ $reservations->links() }}</div>
</div>
@endsection
