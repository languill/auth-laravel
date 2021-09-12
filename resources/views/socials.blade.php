@extends('layout')

@section('title', 'Create socials')

@section('content')
    <main id="js-page-content" role="main" class="page-content mt-3">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-plus-circle'></i> Add socials accounts
            </h1>
        </div>


        <form action="{{ route('social_form', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-12">
                    <div id="panel-1" class="panel">
                        <div class="panel-container">
                            <div class="panel-hdr">
                                <h2>Social networks</h2>
                            </div>
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-md-3">
                                        <!-- vk -->
                                        <div class="input-group input-group-lg bg-white shadow-inset-2 mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-transparent border-right-0 py-1 px-3">
                                                    <span class="icon-stack fs-xxl">
                                                        <i class="base-7 icon-stack-3x" style="color:#4680C2"></i>
                                                        <i class="fab fa-vk icon-stack-1x text-white"></i>
                                                    </span>
                                                </span>
                                            </div>
                                            <input name="vk" type="text" class="form-control border-left-0 bg-transparent pl-0" value="{{$user->social->vk}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <!-- telegram -->
                                        <div class="input-group input-group-lg bg-white shadow-inset-2 mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-transparent border-right-0 py-1 px-3">
                                                    <span class="icon-stack fs-xxl">
                                                        <i class="base-7 icon-stack-3x" style="color:#38A1F3"></i>
                                                        <i class="fab fa-telegram icon-stack-1x text-white"></i>
                                                    </span>
                                                </span>
                                            </div>
                                            <input name="tg" type="text" class="form-control border-left-0 bg-transparent pl-0" value="{{$user->social->tg}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <!-- instagram -->
                                        <div class="input-group input-group-lg bg-white shadow-inset-2 mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-transparent border-right-0 py-1 px-3">
                                                    <span class="icon-stack fs-xxl">
                                                        <i class="base-7 icon-stack-3x" style="color:#E1306C"></i>
                                                        <i class="fab fa-instagram icon-stack-1x text-white"></i>
                                                    </span>
                                                </span>
                                            </div>
                                            <input name="inst" type="text" class="form-control border-left-0 bg-transparent pl-0" value="{{$user->social->inst}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <!-- facebook -->
                                        <div class="input-group input-group-lg bg-white shadow-inset-2 mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-transparent border-right-0 py-1 px-3">
                                                    <span class="icon-stack fs-xxl">
                                                        <i class="base-7 icon-stack-3x" style="color:#E1306C"></i>
                                                        <i class="fab fa-facebook icon-stack-1x text-white"></i>
                                                    </span>
                                                </span>
                                            </div>
                                            <input name="fb" type="text" class="form-control border-left-0 bg-transparent pl-0" value="{{$user->social->fb}}">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-3 d-flex flex-row-reverse">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection

