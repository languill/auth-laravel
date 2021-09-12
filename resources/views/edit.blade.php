@extends('layout')

@section('title', 'Edit user')

@section('content')
<main id="js-page-content" role="main" class="page-content mt-3">
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-plus-circle'></i> Edit profile's information
        </h1>

    </div>
    <form action="{{ route('edit_form', ['id' => $user->id]) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xl-6">
                <div id="panel-1" class="panel">
                    <div class="panel-container">
                        <div class="panel-hdr">
                            <h2>General information</h2>
                        </div>
                        <div class="panel-content">
                            <!-- title -->
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Job title</label>
                                <input name="job_title" type="text" id="simpleinput" class="form-control" value="{{$user->record->job_title}}">
                            </div>

                            <!-- tel -->
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Phone</label>
                                <input name="phone" type="text" id="simpleinput" class="form-control" value="{{$user->record->phone}}">
                            </div>

                            <!-- address -->
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Address</label>
                                <input name="address" type="text" id="simpleinput" class="form-control" value="{{$user->record->address}}">
                            </div>

                            <!-- about -->
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">A few words about myself</label>
                                <textarea name="about" class="form-control" id="simpleinput" cols="30" rows="10">{{$user->record->about}}</textarea>
                            </div>


                            <div class="col-md-12 mt-3 d-flex flex-row-reverse">
                                <button type="submit" class="btn btn-warning">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>

@endsection
