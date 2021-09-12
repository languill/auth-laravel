@extends('layout')

@section('title', 'Set avatar')

@section('content')
    <main id="js-page-content" role="main" class="page-content mt-3">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-image'></i> Upload avatar
            </h1>

        </div>
        <form action="{{ route('avatar_form', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-6">
                    <div id="panel-1" class="panel">
                        <div class="panel-container">
                            <div class="panel-hdr">
                                <h2>Current avatar</h2>
                            </div>
                            <div class="panel-content">
                                <div class="form-group">
                                    @if($user->avatar->avatar_title)
                                        <img src="/{{$user->avatar->avatar_title}}" class="img-responsive" width="200">
                                    @else
                                        <img src="/uploads/avatar.png" class="img-responsive" width="200">
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="example-fileinput">Choose an avatar</label>
                                    <input name="avatar_title" type="file" id="example-fileinput" class="form-control-file">
                                </div>


                                <div class="col-md-12 mt-3 d-flex flex-row-reverse">
                                    <button type="submit" class="btn btn-warning">Download</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
