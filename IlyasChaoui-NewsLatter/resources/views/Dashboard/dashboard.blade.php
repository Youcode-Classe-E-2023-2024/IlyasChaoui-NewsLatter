@extends($data['layout'])
@section('main')
    @if(Request::url() === 'http://127.0.0.1:8000/dashboard')
        <!-- cards -->
        <x-dashboard.cards-section :data="$data"/>
        <!-- end cards -->
    @elseif(Request::url() === 'http://127.0.0.1:8000/table')
        <!-- start table -->
        <x-dashboard.tables :data="$data"/>
        <!-- end table -->
    @elseif(Request::url() === 'http://127.0.0.1:8000/medias')
        <!-- start table -->
        <x-table.table-medias :data="$data"/>
        <!-- end table -->
    @elseif(Request::url() === 'http://127.0.0.1:8000/template')
        <!-- start table -->
        <x-Dashboard.templates :data="$data"/>
        <!-- end table -->
    @else
        <!-- start profile -->
        <x-dashboard.profile-section :data="$data"/>
        <!-- end profile -->
    @endif
@endsection

@section('content')
    <!--button of pemission manage -->

    @role('admin')
        <x-sidebar.settings-sidebar :data="$data"/>
    @endrole

@endsection
