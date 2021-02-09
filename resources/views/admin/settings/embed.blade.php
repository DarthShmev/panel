@extends('layouts.admin')
@include('partials/admin.settings.nav', ['activeTab' => 'embed'])

@section('title')
    Embed Settings
@endsection

@section('content-header')
    <h1>Embed Settings<small>Configure embed settings for the panel.</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">Admin</a></li>
        <li class="active">Settings</li>
    </ol>
@endsection

@section('content')
    @yield('settings::nav')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Embed Settings</h3>
                </div>
                <form action="{{ route('admin.settings.embed') }}" method="POST">
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="control-label">Site Name</label>
                                <div>
                                    <input type="text" class="form-control" name="ogp:site_name" value="{{ old('ogp:site_name', config('ogp.site_name')) }}" />
                                    <p class="text-muted"><small>This is the header of the embed.</small></p>
                                </div>
                            </div>
                            <div class="form-group col-md-8">
                                <label class="control-label">Description</label>
                                <div>
                                    <input type="text" class="form-control" name="ogp:description" value="{{ old('ogp:description', config('ogp.description')) }}" />
                                    <p class="text-muted"><small>A one to two sentence description of your panel.</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="control-label">Theme Colour</label>
                                <div id="cp2" class="input-group theme_colour_picker">
                                    <input type="text" class="form-control" name="ogp:theme_colour" value="{{ old('ogp:theme_colour', config('ogp.theme_colour')) }}">
                                    <span class="input-group-addon"><i></i></span>
                                </div>
                                <p class="text-muted"><small>A hex code for the embed colour.</small></p>
                            </div>
                            <div class="form-group col-md-8">
                                <label class="control-label">Image</label>
                                <div>
                                    <input type="text" class="form-control" name="ogp:image" value="{{ old('ogp:image', config('ogp.image')) }}" />
                                    <p class="text-muted"><small>An image URL which should represent your panel within the embed.</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        {!! csrf_field() !!}
                        <button type="submit" name="_method" value="PATCH" class="btn btn-sm btn-primary pull-right">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')
    @parent
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/js/bootstrap-colorpicker.min.js"></script>
    <script>
        $('#cp2').colorpicker();
    </script>
@endsection
