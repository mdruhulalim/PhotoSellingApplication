@extends('admin.layouts.master')
@section('title', 'User Cashout')
@section('content')
    <!-- Page Heading -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">User Cashout</h1>
        </div>
    
        <!-- Content Row -->
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Cashout date</th>
                        <th scope="col">User</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($cashouts as $cashout)
                        <tr>
                            <th scope="row">{{ date('Y-m-d',strtotime($cashout->created_at)) }}</th>
                            <td>{{ $cashout->user->user_name }}</td>
                            <td>{{ $cashout->amount }}</td>
                            <td>
                                @if ($cashout->status == 'pending')
                                <a class="btn btn-success" onclick="return confirm('Are you sure?')" href="{{ route('admin.cashout.update',[$cashout->id,'approved']) }}">Approve</a>
                                <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ route('admin.cashout.update',[$cashout->id,'declined']) }}">Decline</a>
                                @else
                                    {{ $cashout->status }}
                                @endif
                            </td>
                        </tr>
                    @empty
                    <td class="text-center" colspan="5">Data not fount</td>
                    @endforelse
                    </tbody>
                </table>
                {{ $cashouts->links() }}
            </div>
        </div>
    </div>
@endsection