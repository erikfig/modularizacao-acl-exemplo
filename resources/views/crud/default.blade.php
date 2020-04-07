@extends('layouts.app')

@section('content')
<div class="container">
<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $title }}</h5>

        @include($content, $contentData ?? [])
    </div>
</div>
</div>
@endsection
