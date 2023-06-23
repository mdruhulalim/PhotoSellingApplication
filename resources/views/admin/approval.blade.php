@extends('admin.layouts.master')
@section('title', 'Approval')
@section('content')
    <!-- Page Heading -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Approval</h1>
        </div>
    
        <!-- Content Row -->
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Image ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">User</th>
                        <th scope="col">Uploaded date</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($pendingImages as $image)
                        <tr>
                            <th scope="row">{{ $image->id }}</th>
                            <td><img class="img-fluid img-thumbnail" width="200px" src="{{ asset('uploads'.'/'.$image->image) }}" alt=""></td>
                            <td>{{ $image->user->user_name }}</td>
                            <td>{{ date('Y-m-d',strtotime($image->created_at)) }}</td>
                            <td>
                                <a class="btn btn-success" onclick="return confirm('Are you sure?')" href="{{ route('admin.approval.update',[$image->id,'approved']) }}">Approve</a>
                                <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ route('admin.approval.update',[$image->id,'declined']) }}">Decline</a>
                            </td>
                        </tr>
                    @empty
                    <td class="text-center" colspan="5">Data not fount</td>
                    @endforelse
                    </tbody>
                </table>
                {{ $pendingImages->links() }}
            </div>
        </div>
    </div>
@endsection