@include('partials/admin.settings.notice')

@section('settings::nav')
    @yield('settings::notice')
    <div class="row">
        <div class="col-xs-12">
            <div class="nav-tabs-custom nav-tabs-floating">
                <ul class="nav nav-tabs">
                    <li @if($activeTab === 'basic')class="active"@endif><a href="{{ route('admin.settings') }}">General</a></li>
                    <li @if($activeTab === 'branding')class="active"@endif><a href="{{ route('admin.settings.branding') }}">Branding</a></li>
                    <li @if($activeTab === 'embed')class="active"@endif><a href="{{ route('admin.settings.embed') }}">Embed</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
