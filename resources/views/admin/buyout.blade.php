@extends('admin.layouts.master')
@section('title', 'Boy out')
@section('content')
    <!-- Page Heading -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Buy out</h1>
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
                    @forelse ($images as $image)
                        <tr>
                            <th scope="row">{{ $image->id }}</th>
                            <td><img class="img-fluid img-thumbnail" width="200px" src="{{ asset('uploads'.'/'.$image->image) }}" alt=""></td>
                            <td>{{ $image->user->user_name }}</td>
                            <td>{{ date('Y-m-d',strtotime($image->created_at)) }}</td>
                            <td>
                                <form class="form-inline" action="{{ route('admin.buyout.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="image_id" value="{{ $image->id }}">
                                    <select class="form-control" name="status" id="">
                                        <option value="buy_out">Buy-out</option>
                                        <option value="approve_unsellable">Unsellable</option>
                                    </select>
                                    <input class="form-control" name="rate" type="number" step=".01" placeholder="Amount">
                                    <input class="btn btn-sm btn-success" type="submit" value="save">
                                </form>    
                            </td>
                        </tr>
                    @empty
                    <td class="text-center" colspan="5">Data not fount</td>
                    @endforelse
                    </tbody>
                </table>
                {{ $images->links() }}
            </div>
        </div>
    </div>
@endsection