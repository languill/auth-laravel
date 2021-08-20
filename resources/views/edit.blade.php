@extends('layout')

@section('content')
<main id="js-page-content" role="main" class="page-content mt-3">
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-plus-circle'></i> Редактировать
        </h1>

    </div>
    <form action="/edit_form/{{$user->id}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xl-6">
                <div id="panel-1" class="panel">
                    <div class="panel-container">
                        <div class="panel-hdr">
                            <h2>Общая информация</h2>
                        </div>
                        <div class="panel-content">
                            <!-- username -->
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Имя</label>
                                <input name="user_name" type="text" id="simpleinput" class="form-control" value="{{$user->user_name}}">
                            </div>

                            <!-- title -->
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Место работы</label>
                                <input name="job_title" type="text" id="simpleinput" class="form-control" value="{{$user->job_title}}">
                            </div>

                            <!-- tel -->
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Номер телефона</label>
                                <input name="phone" type="text" id="simpleinput" class="form-control" value="{{$user->phone}}">
                            </div>

                            <!-- address -->
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Адрес</label>
                                <input name="address" type="text" id="simpleinput" class="form-control" value="{{$user->address}}">
                            </div>


                            <div class="col-md-12 mt-3 d-flex flex-row-reverse">
                                <button type="submit" class="btn btn-warning">Редактировать</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>

@endsection
