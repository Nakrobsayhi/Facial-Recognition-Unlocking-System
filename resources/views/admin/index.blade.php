@extends('layouts.admin')

@section('title', 'หน้าแรก')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        @yield('title')
    </h1>

</div>
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            User</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $userCount }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            ESP32-CAM</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-camera fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">สถานะเปิด-ปิดประตู
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="far fa-check-square fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-business-time fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<h1 class="h3 mb-0 text-gray-800">
    ESP32-CAM
</h1><br>

<!-- placeholder for ESP32-CAM -->
<video controls width="250">
    <source src="movie.mp4" type="video/mp4">
</video>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">
                001
            </th>
            <td>
                test
            </td>
            <td>
                2/2/2026
            </td>
            <td>
                13:00
            </td>
        </tr>
        <!--
        @foreach ($users as $key => $user)
        <tr>
            <th scope="row">
                {{ $key + 1 }}
            </th>
            <td>
                {{ $user->name }}
            </td>
            <td>
                {{ $user->email }}
            </td>
            <td>
                {{ $user->created_at }}
            </td>
            <td>
                {{ $user->updated_at }}
            </td>
-->
        <!-- No need for edit and delete for dashboard -->

        <!--  <td class="text-left align-middle">
                <a href="{{ route('admin.user.edit', $user->id) }}"
                    class="btn btn-warning btn-sm mr-2">
                    Edit
                </a>

                <button class="btn btn-danger btn-sm">
                    Delete
                </button>
            </td> 

        </tr>
@endforeach -->

    </tbody>
</table>
@endsection