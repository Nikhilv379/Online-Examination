@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


        <h1 class="text-center">Quiz List</h1>
        <div class="text-center">
            {{-- <div class="row justify-content-center"> --}}
                {{-- <div class="col-md-10"> --}}
                    <table class="table" border="3">
                        <thead>
                            <tr>
                                {{-- <th scope="col">Sno</th> --}}
                                <th scope="col">Exam Name</th>
                                <th scope="col">From</th>
                                <th scope="col">To</th>
                                <th scope="col">Duration</th>
                                {{-- <th scope="col">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sl = 1;
                            @endphp
                            @foreach($quiz_list as $quiz)
                                <tr>
                                    {{-- <td>{{ $sl++ }}</td> --}}
                                    <td><a href="/add-question/{{ $quiz->id }}" target="_blank">{{ $quiz->title }}</a></td>
                                    <td>{{ $quiz->from_time }}</td>
                                    <td>{{ $quiz->to_time }}</td>
                                    <td>{{ $quiz->duration }} minutes</td>

                                      {{-- <td><a href={{"delete/".$quiz['id']}}>Delete</a><td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$quiz_list->links('pagination::bootstrap-4')}}
                {{-- </div> --}}
            {{-- </div> --}}
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
