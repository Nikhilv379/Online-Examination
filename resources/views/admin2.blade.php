@extends('layouts.app')

@section('content')


  <div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
        </div>
      </div>
    </div>

<form action="{{ route('logout') }}" method="POST">
    @csrf
    {{-- <button type="submit">Logout</button> --}}
</form>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    You are a teacher.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
