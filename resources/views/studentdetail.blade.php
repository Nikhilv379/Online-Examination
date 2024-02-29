@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content">
    <h1 style=text-align:center;>Result List</h1>

    <div style="text-align: right; margin-bottom: 1rem;">
        <a href="/studentlist" class="btn btn-primary">Back</a>
    </div>
    <div class="text-center">
        <table class="table" border="2">
            <thead>
            <tr>
                <th scope="col">Sno</th>
                <th scope="col">Exam Name</th>
                <th scope="col">Quiz Score</th>
                    <th scope="col">User Score</th>
                    {{-- <th scope="col">Name</th> --}}
                <th scope="col">Date</th>
            </tr>
            </thead>
            <tbody>
            @php
                $sl=1;
            @endphp
            @foreach($results as $result)
                <tr>
                    <th scope="row">{{$sl++}}</th>
                    <td>{{$result->title}}</td>
                    <td>{{$result->quiz_score}}</td>
                    <td>{{$result->achieved_score}}</td>
                    {{-- <td>{{$result->name}}</td> --}}
                    <td>{{$result->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</section>
</div>
@endsection
