@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbarNavv">

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/"> &larr; Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('MainController.store')}}"> All items page </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{{route('MainController.create')}}"> Create items </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{{route('MainController.showAllModerators')}}"> View all Moderators </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('ShowAllModeratorsController.showAllAdmins')}}"> View all Admins </a>
                </li>

                @can('view', auth()->user())
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.users.index')}}"> ADMINS PAGE </a>
                </li>
                @endcan

            </ul>
        </div>
    </nav>



    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
