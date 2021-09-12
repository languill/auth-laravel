@extends('layout')

@section('title', 'Users')

@section('content')

<main id="js-page-content" role="main" class="page-content mt-3">

    @if (session('newUser'))
        <div class="alert alert-success">
            {{ session('newUser') }}
        </div>
    @endif

    @if (session('updatedUser'))
        <div class="alert alert-success">
            {{ session('updatedUser') }}
        </div>
    @endif

        @if (session('deleteUser'))
            <div class="alert alert-warning">
                {{ session('deleteUser') }}
            </div>
        @endif

    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-users'></i> A list of users
        </h1>
        <div>
            <h3>Hello, {{ $loggedInUser->name }}!</h3>
            <a class="btn btn-default mt-2" href="{{ route('private') }}">View all users</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">

            @if ($status == 'admin')
                <a class="btn btn-success" href="{{ route('create_user') }}">Add user</a>
            @endif

            <div class="border-faded bg-faded p-3 mb-g d-flex mt-3">

                <div class="col-md-12">
                    <form action="{{ route('search') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" id="js-filter-contacts" name="name" class="form-control form-control-lg"
                                   placeholder="Find user by name">
                            <span class="input-group-btn">
                                <button type="submit" class="btn-lg btn-success">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>


                <div class="btn-group btn-group-lg btn-group-toggle hidden-lg-down ml-3" data-toggle="buttons">
                    <label class="btn btn-default active">
                        <input type="radio" name="contactview" id="grid" checked="" value="grid"><i class="fas fa-table"></i>
                    </label>
                    <label class="btn btn-default">
                        <input type="radio" name="contactview" id="table" value="table"><i class="fas fa-th-list"></i>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="js-contacts">

        @foreach($users as $user)
        <div class="col-xl-4">
            <div id="c_1" class="card border shadow-0 mb-g shadow-sm-hover" data-filter-tags="{{$user->user_name}}">

                @if($loggedInUser->id == $user->id)
                    <div class="p-3"><i class="fa fa-check text-success" aria-hidden="true"></i> Your profile</div>
                @endif

                <div class="card-body border-faded border-top-0 border-left-0 border-right-0 rounded-top">
                    <div class="d-flex flex-row align-items-center">

                                @if($user->state->state_title == 'On-line')
                                    <span class="status status-success mr-3">
                                @elseif($user->state->state_title == 'Away')
                                   <span class="status status-warning mr-3">
                                 @else
                                    <span class="status status-danger mr-3">
                                @endif

                                    @if($user->avatar->avatar_title)
                                    <span class="rounded-circle profile-image d-block"
                                        style="
                                            background-image:url('{{$user->avatar->avatar_title}}');
                                            background-size: cover;
                                            border: 1px solid @if($user->gender == 'male') blue @else magenta @endif;">
                                    </span>
                                    @else
                                        <span class="rounded-circle profile-image d-block"
                                              style="
                                              background-image:url('/uploads/avatar.png');
                                              background-size: cover;
                                              border: 1px solid @if($user->gender == 'male') blue @else magenta @endif;">
                                        </span>
                                    @endif
                                </span>
                        <div class="info-card-text flex-1">
                         <a href="{{ route('user', ['id' => $user->id]) }}" class="fs-xl text-truncate text-truncate-lg text-info">{{$user->name}}</a>

                            @if(($loggedInUser->id == $user->id) || ($loggedInUser->status == 'admin'))
                            <a href="javascript:void(0);" class="fs-xl text-truncate text-truncate-lg text-info" data-toggle="dropdown" aria-expanded="false">
                                <i class="fal fas fa-cog fa-fw d-inline-block ml-1 fs-md"></i>
                                <i class="fal fa-angle-down d-inline-block ml-1 fs-md"></i>
                            </a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('edit', ['id' => $user->id]) }}">
                                    <i class="fa fa-edit"></i>
                                    Edit profile</a>
                                <a class="dropdown-item" href="{{ route('security', ['id' => $user->id]) }}">
                                    <i class="fa fa-lock"></i>
                                    Security</a>
                                <a class="dropdown-item" href="{{ route('status', ['id' => $user->id]) }}">
                                    <i class="fa fa-sun"></i>
                                    Set status</a>
                                <a class="dropdown-item" href="{{ route('avatar', ['id' => $user->id]) }}">
                                    <i class="fa fa-camera"></i>
                                    Upload avatar</a>
                                <a class="dropdown-item" href="{{ route('socials', ['id' => $user->id]) }}">
                                    <i class="fa fa-link"></i>
                                    Social links</a>
                                <a href="{{ route('delete', ['id' => $user->id]) }}" class="dropdown-item" onclick="return confirm('are you sure?');">
                                    <i class="fa fa-window-close"></i>
                                    Delete
                                </a>
                            </div>
                            @endif
                            <span class="text-truncate text-truncate-xl">{{$user->record->job_title}}</span>
                        </div>
                        <button class="js-expand-btn btn btn-sm btn-default d-none" data-toggle="collapse" data-target="#c_1 > .card-body + .card-body" aria-expanded="false">
                            <span class="collapsed-hidden">+</span>
                            <span class="collapsed-reveal">-</span>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0 collapse show">
                    <div class="p-3">
                        @if($user->gender == 'male')
                            <p class="text-info">
                                <i class="fa fa-male" aria-hidden="true"></i>
                                {{ $user->gender }}
                            </p>
                        @else
                            <p class="text-danger">
                                <i class="fa fa-female text-danger" aria-hidden="true"></i>
                                {{ $user->gender }}
                            </p>
                        @endif

                            <a href="tel:+13174562564" class="mt-1 d-block fs-sm fw-400 text-dark">
                            <i class="fas fa-mobile-alt text-muted mr-2"></i> {{$user->record->phone}}</a>
                        <a href="mailto:oliver.kopyov@smartadminwebapp.com" class="mt-1 d-block fs-sm fw-400 text-dark">
                            <i class="fas fa-mouse-pointer text-muted mr-2"></i> {{$user->email}}</a>
                        <address class="fs-sm fw-400 mt-4 text-muted">
                            <i class="fas fa-map-pin mr-2"></i> {{$user->record->address}}</address>
                        <div class="d-flex flex-row">
                            <a href="{{$user->social->vk}}" class="mr-2 fs-xxl" style="color:#4680C2">
                                <i class="fab fa-vk"></i>
                            </a>
                            <a href="{{$user->social->tg}}" class="mr-2 fs-xxl" style="color:#38A1F3">
                                <i class="fab fa-telegram"></i>
                            </a>
                            <a href="{{$user->social->inst}}" class="mr-2 fs-xxl" style="color:#E1306C">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="{{$user->social->fb}}" class="mr-2 fs-xxl" style="color:#E1306C">
                                <i class="fab fa-facebook"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</main>

<!-- BEGIN Page Footer -->
<footer class="page-footer" role="contentinfo">
    <div class="d-flex align-items-center flex-1 text-muted">
        <span class="hidden-md-down fw-700">{{$year}} © Global Connection</span>
    </div>
    <div>
        <ul class="list-table m-0">
            <li><a href="{{ route('welcome') }}" class="text-secondary fw-700">Home</a></li>
        </ul>
    </div>
</footer>

@endsection
