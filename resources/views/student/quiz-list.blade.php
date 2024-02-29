@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content">
    <h1 style=text-align:center;>Quiz List</h1>
    <div class="text-center">
    <div class="show-alert">
        @if (session('error'))
            <div class="alert alert-danger d-flex align-items-center"
                style="background-color: #f8d7da; color: #721c24; border-color: #f5c6cb; padding: 0.75rem 1.25rem; border-radius: 0.25rem; margin-bottom: 1rem;">
                <div>
                    {{ session('error') }}
                </div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

        <table class="table" border="2">
            <thead>
            <tr>
                {{-- <th scope="col">Sno</th> --}}
                <th scope="col">Exam Name</th>
                <th scope="col">From</th>
                <th scope="col">To</th>
                <th scope="col">Duration</th>
            </tr>
            </thead>
            <tbody>
            @php
                $sl=1;
            @endphp

            @foreach($quiz_list as $quiz)
                <tr>
                    {{-- <th scope="row">{{$sl++}}</th> --}}
                    <td><a href="give-quiz/{{$quiz->id}}">{{$quiz->title}}</a></td>
                    <td>{{$quiz->from_time}}</td>
                    <td>{{$quiz->to_time}}</td>
                    <td>{{$quiz->duration}} minutes</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$quiz_list->links('pagination::bootstrap-4')}}
    </div>
</section>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>document.querySelectorAll('ul.nav-sidebar a').forEach(function(link) {
    if (link.id === 'quizlist') {
        link.classList.add('active');
    }
});</script>
@endsection
