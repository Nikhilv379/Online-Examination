@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content">
    <h1 style=text-align:center;>Result List</h1>
    <div class="text-center">
        <table class="table" border="2">
            <thead>
            <tr>
                <th scope="col">Sno</th>
                <th scope="col">Exam Name</th>
                <th scope="col">Quiz Score</th>
                @if(Auth::user()->role=='teacher'||Auth::user()->role=='admin')
                    <th scope="col">User Score</th>
                    <th scope="col">Name</th>
                @else
                    <th scope="col">My Score</th>
                @endif
                <th scope="col">Date</th>
            </tr>
            </thead>
            <tbody>
            @php
                $sl=1;
            @endphp
            @foreach($results as $result)
            {{-- @dump($result->created_at); --}}
                <tr>
                    <th scope="row">{{$sl++}}</th>
                    <td>{{$result->title}}</td>
                    <td>{{$result->quiz_score}}</td>
                    <td>{{$result->achieved_score}}</td>
                    @if(Auth::user()->role=='admin'||Auth::user()->role=='teacher')
                        <td>{{$result->name}}</td>
                    @endif
                    {{-- <td>{{$result->created_at}}</td> --}}
                    <td>{{ \Carbon\Carbon::parse($result->created_at)->format('Y-m-d H:i:s') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$results->links('pagination::bootstrap-4')}}
    </div>
</section>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>document.querySelectorAll('ul.nav-sidebar a').forEach(function(link) {
    if (link.id === 'results') {
        link.classList.add('active');
    }
});</script>
@endsection
