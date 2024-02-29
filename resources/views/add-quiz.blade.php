@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <title>Dashboard</title>
            <div class="container mt-5">
                <h1 class="text-center mb-4">Add New Quiz</h1>
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                @if (session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div><br />
                @endif
                <div class="text-center">
                    <div>
                        <form method="post" action="{{ route('store.quiz') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" placeholder="Quiz Title" name="title" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="fromTime">Valid From</label>
                                <input id="fromTime" name="from_time" type="datetime-local" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="toTime">Valid Till</label>
                                <input id="toTime" name="to_time" type="datetime-local" class="form-control">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Duration in Minutes" name="duration" type="number"
                                    required>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>document.querySelectorAll('ul.nav-sidebar a').forEach(function(link) {
        if (link.id === 'addquiz') {
            link.classList.add('active');
        }
    });</script>
@endsection
