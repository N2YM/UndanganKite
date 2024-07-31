@extends('Template.User.base')

@section('content')
<div class="tab-pane" id="lokasi_acara" role="tabpanel">
    <label for=""><strong>Lokasi Acara</strong></label>
    <input data-air-mode="true" style="width: 100%; margin-bottom: 10px;"></input>
    <div class="form-group row">
        <div class="col-sm-6">
            <label for="latitude" class="col-form-label font-weight-bold">Latitude</label>
            <input type="text" name="latitude" class="form-control" id="latitude" disabled>
        </div>
        <div class="col-sm-6">
            <label for="longitude" class="col-form-label font-weight-bold">Longitude</label>
            <input type="text" name="longitude" class="form-control" id="longitude" disabled>
        </div>
    </div>
    <div class="map" id="map" style="height: 400px;"></div>
</div>
@endsection