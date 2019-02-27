@extends('Flooflix_websiteManagement.layouts.base')
@section('content')
@include('Flooflix.websiteManagement.layouts.header')

@include('Flooflix.layouts.scripts')
<script>
    $('document').ready(function() {
        document.body.style.backgroundColor = 'black';
    })
</script>
@endsection