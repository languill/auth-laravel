@extends('layout')

@section('title', 'Create user')

@section('content')
<main id="js-page-content" role="main" class="page-content mt-3">
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-plus-circle'></i> Add user
        </h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger text-dark" role="alert">
            @foreach($errors->all() as $error)
                {{$error}} <br>
            @endforeach
        </div>
    @endif

    @if (session('hasEmail'))
        <div class="alert alert-danger text-dark" role="alert">
            {{ session('hasEmail') }}
        </div>
    @endif

    <form action="/create_user_form" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-6">
                <div id="panel-1" class="panel">
                    <div class="panel-container">
                        <div class="panel-hdr">
                            <h2>General information</h2>
                        </div>
                        <div class="panel-content">
                            <!-- username -->
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Name</label>
                                <input name="name" type="text" id="simpleinput" class="form-control" value="{{ old('name') }}">
                            </div>

                            <!-- gender -->
                            <div class="form-group">
                                <label class="form-label" for="gender">Your gender <br></label>
                                <div class="form-check">
                                    <input class="form-check-input" name="gender" type="radio" id="gender" value="male">
                                    <label class="form-check-label" for="gender">
                                        Male
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" name="gender" type="radio" id="gender" value="female">
                                    <label class="form-check-label" for="gender">
                                        Female
                                    </label>
                                </div>
                            </div>

                            <!-- title -->
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Job title</label>
                                <input name="job_title" type="text" id="simpleinput" class="form-control" value="{{ old('job_title') }}">
                            </div>

                            <!-- tel -->
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Phone number</label>
                                <input name="phone" type="text" id="simpleinput" class="form-control" value="{{ old('phone') }}">
                            </div>

                            <!-- address -->
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Address</label>
                                <input name="address" type="text" id="simpleinput" class="form-control" value="{{ old('address') }}">
                            </div>

                            <!-- about -->
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">About</label>
                                <textarea name="about" id="simpleinput" class="form-control" cols="10" rows="10">{{ old('about')}}</textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-6">
                <div id="panel-1" class="panel">
                    <div class="panel-container">
                        <div class="panel-hdr">
                            <h2>Security & Media</h2>
                        </div>
                        <div class="panel-content">
                            <!-- email -->
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Email</label>
                                <input name="email" type="text" id="simpleinput" class="form-control" value="{{ old('email') }}">
                            </div>

                            <!-- password -->
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Password</label>
                                <input name="password" type="password" id="simpleinput" class="form-control">
                            </div>


                            <!-- status -->
                            <div class="form-group">
                                <label class="form-label" for="example-select">Select status</label>
                                <select name="state_title" class="form-control" id="example-select">
                                    <option>On-line</option>
                                    <option>Away</option>
                                    <option>Do not disturb</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="example-fileinput">Upload avatar</label>
                                <input name="avatar" type="file" id="example-fileinput" class="form-control-file">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

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
                                        <input name="vk" type="text" class="form-control border-left-0 bg-transparent pl-0" value="{{ old('vk') }}">
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
                                        <input name="tg" type="text" class="form-control border-left-0 bg-transparent pl-0" value="{{ old('telegram') }}">
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
                                        <input name="inst" type="text" class="form-control border-left-0 bg-transparent pl-0" value="{{ old('instagram') }}">
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
                                        <input name="fb" type="text" class="form-control border-left-0 bg-transparent pl-0" value="{{ old('instagram') }}">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3 d-flex flex-row-reverse">
                                    <button type="submit" class="btn btn-success">Add user</button>
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

