@extends('layouts.admin')
@include('partials/admin.settings.nav', ['activeTab' => 'branding'])
@include('popper::assets')

@section('title')
    Branding Settings
@endsection

@section('content-header')
    <h1>Branding Settings<small>Configure branding for the panel.</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">Admin</a></li>
        <li class="active">Settings</li>
    </ol>
@endsection

@section('content')
    @yield('settings::nav')
    <div class="row">
        <div class="col-xs-4">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Auth Screens Logo</h3>
                </div>
                <form action="{{ route('admin.settings.branding') }}" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="text-center">
                                    <input type="file" id="auth_logo" name="auth_logo" class="hidden" />
                                    <img
                                        alt="Auth screens logo"
                                        src="{{ old('branding:auth_logo', config('branding.auth_logo')) }}"
                                        class="img-thumbnail center-block bg-black-gradient"
                                        style="height: 150px"
                                        {{ Popper::size('large')->pop('Click me to change the auth screens logo!') }}
                                        id="auth_logo_preview"
                                    />
                                    <p class="text-muted">
                                        <small>Recommended size: 300x100px (max 250KB).</small>
                                        <br />
                                        <small>Formats: png, jpeg, svg</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        {!! csrf_field() !!}
                        <button type="submit" name="_method" value="PATCH" class="btn btn-sm btn-primary pull-right">Publish</button>
                        <button type="submit" name="_method" value="DELETE" class="btn btn-sm btn-danger pull-right">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')
    @parent
    <script>
        // Read the uploaded image and then show a preview to the user.
        function readImage(input, output) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    $(output).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#auth_logo").change(function(){
            readImage(this, '#auth_logo_preview');
        });

        // Show the upload image menu when the previews are clicked.
        $('#auth_logo_preview').click(function () {
            $('#auth_logo').click();
        });
    </script>
@endsection
