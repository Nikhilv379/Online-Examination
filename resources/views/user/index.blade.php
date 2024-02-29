{{-- @extends('user.layout') --}}
@extends('layouts.app')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }
</style>
{{-- <h1>User Management</h1> --}}
<div class="content-wrapper">
    <section class="content">
        <div class="push-top">
            @if(session('completed'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('completed') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div><br />
            @endif
            <div style="text-align: right; margin-top: 4rem; margin-bottom: 1rem;">
                <a href="{{ route('users.create') }}" class="btn btn-success">Create New User</a>
            </div>



            <table class="table">
                <thead>
                    <tr class="table-warning">
                        <td>Name</td>
                        <td>Email</td>
                        <td>Role</td>
                        <td class="text-center">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $users)
                        <tr>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->role }}</td>
                            <td class="text-center">
                                <a href="{{ route('users.edit', $users->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                {{-- <form action="{{ route('users.destroy', $users->id) }}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form> --}}
                                <form action="{{ route('users.destroy', $users->id) }}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirmDelete()">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$user->links('pagination::bootstrap-4')}}
        </div>
    </section>
</div>

<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this user?');
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.querySelectorAll('ul.nav-sidebar a').forEach(function(link) {
    if (link.id === 'allusers') {
        link.classList.add('active');
    }
});
</script>

@endsection
