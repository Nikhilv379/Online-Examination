@extends('user.layout')
@section('content')
    <style>
        .container {
            max-width: 450px;
        }

        .push-top {
            margin-top: 50px;
        }

        .button {}

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
                    <h1 style=text-align:center;>Add User</h1>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <br />
                    @endif

                    <form method="post" action="{{ route('users.store') }}">
                        <div class="form-group">
                            @csrf
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" />
                        </div>
                        {{-- <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" />
                        </div> --}}
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" />
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="togglePasswordVisibility()">
                                        <i id="eyeIcon" class="fas fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="radio-group">
                            <label for="Role">Role</label><br>
                            <label>
                                <input type="radio" name="role" value="admin">
                                admin
                            </label><br>

                            <label>
                                <input type="radio" name="role" value="student">
                                student
                            </label><br>

                            <label>
                                <input type="radio" name="role" value="teacher">
                                teacher
                            </label><br>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">Create User</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
<script>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
<script>
    function togglePasswordVisibility() {
        var passwordField = document.getElementById('password');
        var eyeIcon = document.getElementById('eyeIcon');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }
</script>

</script>
