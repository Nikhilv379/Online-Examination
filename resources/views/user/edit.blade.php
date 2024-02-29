@extends('user.layout')
@section('content')
<style>
    .container {
      max-width: 300px;
    }
    .push-top {
      margin-top: 50px;
    }
    .radio-group {
    display: flex;
    gap: 10px;
}

.radio-group label {
    margin-right: 5px;
}

</style>
<div class="content-wrapper">
    <section class="content">
<div class="card push-top">
  <div class="card-header">
    <h1 style=text-align:center;>Edit & Update</h1>
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('users.update', $user->id) }}">
        <form action="{{ route('update.password', ['id' => $user->id]) }}" method="POST">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" value="{{ $user->name }}"/>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" value="{{ $user->email }}"/>
          </div>
            <div class="radio-group">
                <label for="Role">Role</label><br>
                <label>
                    <input type="radio" name="role" value="admin" {{ $user->role === 'admin' ? 'checked' : '' }}>
                    admin
                </label><br>

                <label>
                    <input type="radio" name="role" value="student" {{ $user->role === 'student' ? 'checked' : '' }}>
                    student
                </label><br>

                <label>
                    <input type="radio" name="role" value="teacher" {{ $user->role === 'teacher' ? 'checked' : '' }}>
                    teacher
                </label><br>
            </div>

          <button type="submit" class="btn btn-block btn-primary">Update User</button>
            </div>
      </form>
  </div>
</div>
</section>
</div>
@endsection



