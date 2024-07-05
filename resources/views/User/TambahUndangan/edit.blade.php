@extends('Template.User.base')
@section('content')
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Summernote Editor
                    <a class="btn btn-xs btn-default m-l-5" href="http://summernote.org/" target="_blank">Official site</a>
                </div>
            </div>
            <div class="ibox-body">
                <label for=""><strong>Judul Acara</strong></label>
                <input id="summernote1" data-plugin="summernote" data-air-mode="true"></input>
            </div>
            <div class="ibox-body">
                <label for=""><strong>Judul Acara</strong></label>
                <input id="summernote2" data-plugin="summernote" data-air-mode="true"></input>
            </div>
            <div class="ibox-body">
                <label for=""><strong>Judul Acara</strong></label>
                <input id="summernote3" data-plugin="summernote" data-air-mode="true"></input>
            </div>
            <div class="ibox-body">
                <label for=""><strong>Judul Acara</strong></label>
                <input id="summernote4" data-plugin="summernote" data-air-mode="true"></input>
            </div>
        </div>
    </div>
@endsection
