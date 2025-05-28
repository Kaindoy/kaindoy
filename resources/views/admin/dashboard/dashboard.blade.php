@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 p-0 bg-dark vh-100">
            <div class="sidebar">
                <div class="sidebar-header text-center py-4 text-white">
                    <h3>Dashboard</h3>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <!-- Display User's Name in Profile Section -->
                        <a class="nav-link text-white" href="#">
                            <i class="fas fa-user"></i> {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <i class="fas fa-cogs"></i> Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main content -->
        <div class="col-md-9 col-lg-10">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" height="30">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('/home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Dashboard Content -->
            <div class="card mt-3">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>

                

                <!-- User Form Modal -->
                <div class="modal" id="userFormModal">
                    <div class="modal-content">
                        <h3 id="formTitle">Add User</h3>
                        <input type="hidden" id="userId">
                        <input type="text" id="name" placeholder="Name">
                        <input type="email" id="email" placeholder="Email">
                        <button onclick="saveUser()">Save</button>
                        <button onclick="closeForm()">Cancel</button>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                    <div class="row">
                        <!-- Sidebar -->
                        <nav class="col-md-3 col-lg-2 d-md-block bg-dark text-white sidebar py-4 vh-100">
                            <div class="text-center mb-4">
                                <h4>Admin Panel</h4>
                            </div>
                            <ul class="nav flex-column px-3">
                                <li class="nav-item mb-2">
                                    <a class="nav-link text-white" href="#">Dashboard</a>
                                </li>
                                <li class="nav-item mb-2">
                                    <a class="nav-link text-white" href="#">Users</a>
                                </li>
                                <li class="nav-item mb-2">
                                    <a class="nav-link text-white" href="#">Settings</a>
                                </li>
                            </ul>
                        </nav>

                        <!-- Main Content -->
                        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h2>User Management</h2>
                                <button class="btn btn-primary" onclick="openForm()">+ Add User</button>
                            </div>

                            <!-- User Table -->
                            <div class="card">
                                <div class="card-header bg-light">
                                    <strong>User List</strong>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-hover mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th style="width: 120px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="userTable">
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection