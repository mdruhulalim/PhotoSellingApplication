@extends('layouts.master')
{{-- title --}}
@section('title', 'Financial')
{{-- main content --}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="text-center">{{ Auth::user()->user_name }} financial status</h2>
                <hr>
                <div>
                    <h2>My banace: {{ $myFinancial->blance }}$</h2>
                    <a class="btn btn-success mb-5 {{ $myFinancial->blance > 10? '':'disabled' }}" href="{{ route('user.financial.cashout') }}">withdraw</a>
                </div>
                {{-- status table --}}
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Financial ID</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Cashout date</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($myCashouts as $myCashout)
                        <tr>
                            <th scope="row">{{ $myCashout->id }}</th>
                            <td>{{ $myCashout->amount }}</td>
                            <td>{{ $myCashout->created_at }}</td>
                            <td>{{ strtoupper($myCashout->status) }}</td>
                        </tr>
                    @empty
                    <td class="text-center" colspan="5">Data not fount</td>
                    @endforelse
                    </tbody>
                </table>
                {{-- {{ $myCashouts->links() }} --}}
            </div>
        </div>
    </div>
@endsection
{{-- js --}}
@push('js')
    {{-- <script>
        alert('hello')
    </script> --}}
@endpush