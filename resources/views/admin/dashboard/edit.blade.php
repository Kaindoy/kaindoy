@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Edit Reservation #{{ $reservation->id }}</h2>

    {{-- Validation errors --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="guest_name" class="form-label">Guest Name</label>
            <input type="text" class="form-control" id="guest_name" name="guest_name" value="{{ old('guest_name', $reservation->guest_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="room_number" class="form-label">Room Number</label>
            <input type="number" class="form-control" id="room_number" name="room_number" value="{{ old('room_number', $reservation->room_number) }}" required>
        </div>

        <div class="mb-3">
            <label for="check_in" class="form-label">Check-in Date</label>
            <input type="date" class="form-control" id="check_in" name="check_in" value="{{ old('check_in', $reservation->check_in->format('Y-m-d')) }}" required>
        </div>

        <div class="mb-3">
            <label for="check_out" class="form-label">Check-out Date</label>
            <input type="date" class="form-control" id="check_out" name="check_out" value="{{ old('check_out', $reservation->check_out->format('Y-m-d')) }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="pending" {{ (old('status', $reservation->status) == 'pending') ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ (old('status', $reservation->status) == 'confirmed') ? 'selected' : '' }}>Confirmed</option>
                <option value="cancelled" {{ (old('status', $reservation->status) == 'cancelled') ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Reservation</button>
        <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
