@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <h1 style=text-align:center;>Student List</h1>
        <div class="text-center">
            <table class="table" border="2">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user['name']}}</td>
                            <td>{{$user['email']}}</td>
                            <td>{{$user['role']}}</td>
                            <td class="text-center">
                                <a href="{{ route('student.detail', ['id' => $user->id]) }}" class="btn btn-primary btn-sm">Details</a>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$users->links('pagination::bootstrap-4')}}
        </div>
    </section>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>document.querySelectorAll('ul.nav-sidebar a').forEach(function(link) {
    if (link.id === 'studentlist') {
        link.classList.add('active');
    }
});</script>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

