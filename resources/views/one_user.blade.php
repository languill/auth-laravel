@extends('layout')

@section('title', 'User page')

@section('content')
<main id="js-page-content" role="main" class="page-content mt-3">
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-user'></i> {{$user->user_name}}
        </h1>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xl-6 m-auto">
            <!-- profile summary -->
            <div class="card mb-g rounded-top">
                <div class="row no-gutters row-grid">
                    <div class="col-12">
                        <div class="d-flex flex-column align-items-center justify-content-center p-4">

							<div>
								@if($user->avatar)
									<img src="/{{$user->avatar->avatar_title}}" class="rounded-circle shadow-2 img-fluid img-thumbnail" width="200">
								@else
									<img src="/uploads/avatar.png" class="img-responsive" width="200">
								@endif
                            </div>


                            <h5 class="mb-0 fw-700 text-center mt-3">
							    {{$user->name}}
                                <small class="text-muted mb-0">{{$user->record->address}}</small>
                            </h5>
                            <div class="mt-4 text-center demo">
                                <a href="{{$user->social->inst}}" class="fs-xl" style="color:#C13584">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="{{$user->social->vk}}" class="fs-xl" style="color:#4680C2">
                                    <i class="fab fa-vk"></i>
                                </a>
                                <a href="{{$user->social->tg}}" class="fs-xl" style="color:#0088cc">
                                    <i class="fab fa-telegram"></i>
                                </a>
                                <a href="{{$user->social->fb}}" class="fs-xl" style="color:#0088cc">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-3 text-center">
                            <a href="tel:+13174562564" class="mt-1 d-block fs-sm fw-400 text-dark">
                                <i class="fas fa-mobile-alt text-muted mr-2"></i> {{$user->record->phone}}</a>
                            <a href="mailto:{{$user->email}}" class="mt-1 d-block fs-sm fw-400 text-dark">
                                <i class="fas fa-mouse-pointer text-muted mr-2"></i> {{$user->email}}</a>
                            <address class="fs-sm fw-400 mt-4 text-muted">
                                <i class="fas fa-map-pin mr-2"></i> {{$user->record->address}}
                            </address>
                            <p>
                                <i class="fa fa-info-circle mr-2"></i>
                                {{$user->record->about}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
