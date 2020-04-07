@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $title }}</h5>

            <table class="table">
                <tbody>
                @foreach($table as $label=>$field)
                    <tr>
                        <th>{{ $label }}</th>
                        <td>{{ $result->$field }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if (!empty($relateds))
    @foreach ($relateds as $related)
        <div class="card my-3">
            <div class="card-body">
                <h5 class="card-title">{{ $related['title'] }}</h5>

                <table class="table">
                    <thead>
                        <tr>
                        @foreach($related['table'] as $label=>$field)
                            <th>{{ $label }}</th>
                        @endforeach
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($related['data'] as $result)
                        <tr>
                        @foreach($related['table'] as $label=>$field)
                            <td>{{ $result->$field }}</td>
                        @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $related['data']->links() }}
            </div>
        </div>
    @endforeach
    @endif
</div>
@endsection
