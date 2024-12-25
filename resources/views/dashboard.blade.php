@extends('layout')
@section('title', 'Dashboard | Hafsocks')

@section('content')

<h1>Dashboard</h1>

@push('styles')
<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/dashboard.js') }}"></script>
@endpush

@endsection