@extends($layout)
@section('main')
    @if(Request::url() === 'http://127.0.0.1:8000/dashboard')
        <!-- cards -->
        <x-dashboard.cards-section :usersCount="$usersCount" :subscribeEmailsCount="$subscribeEmailsCount"/>
        <!-- end cards -->
    @elseif(Request::url() === 'http://127.0.0.1:8000/table')
        <!-- start table -->
        <x-Dashboard.tables :users="$users" :emails="$emails" :medias="$medias"/>
        <!-- end table -->
    @elseif(Request::url() === 'http://127.0.0.1:8000/medias')
        <!-- start table -->
        <x-table.table-medias :medias="$medias"/>
        <!-- end table -->
    @elseif(Request::url() === 'http://127.0.0.1:8000/template')
        <!-- start table -->
        <x-Dashboard.templates />
        <!-- end table -->
    @else
        <!-- start profile -->
        <x-dashboard.profile-section :user="$user"/>
        <!-- end profile -->
    @endif
@endsection

@section('content')
    <!--button of pemission manage -->
    @if(auth()->user()->hasRole('admin'))
        <x-sidebar.settings-sidebar :allUsers="$allUsers" :roles="$roles"/>
    @endif
@endsection
