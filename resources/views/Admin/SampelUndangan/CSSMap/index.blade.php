<!-- Summernote CSS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<style>
    .font-arial {
        font-family: 'Arial', sans-serif;
    }

    .font-georgia {
        font-family: 'Georgia', serif;
    }

    .font-courier {
        font-family: 'Courier New', monospace;
    }

    .form-group {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .form-group label {
        flex: 0 0 150px;
        margin-right: 5px;
    }

    .form-group .form-control,
    .form-group .preview-text {
        flex: 1;
        margin-right: 5px;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
    }

    .preview-text {
        border: 1px solid #ced4da;
        padding: 4px;
        background-color: #f8f9fa;
        max-height: 100px;
        overflow-y: auto;
        overflow-x: hidden;
        margin-top: 0;
        font-size: 0.830rem;
        color: #777;
    }

    .nav-tabs .nav-item.hidden {
        display: none;
    }

    .form-group .middle-text {
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        padding-left: 10%;
        padding-right: 11%;
    }

    .map {
        height: 140px;
        width: 100%;
        align-items: center;
        justify-content: center;
        background-color: #f0f0f0;

    }

    .map-container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 50%;
    }

    .center {
        display: block;
        margin: 1rem 0;
    }
</style>
