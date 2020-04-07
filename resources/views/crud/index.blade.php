@extends('layouts.app')

@section('content')
<div class="container">
<div class="card">
    <div class="card-body">
        <div class="d-flex flex-row justify-content-between">
            <h5 class="card-title">{{ $title }}</h5>
            <p>
                <a href="{{ route($createRoute) }}" class="btn btn-primary btn-sm">Novo</a>
            </p>
        </div>

        <table class="table">
            <thead>
                <tr>
                @foreach($table as $label=>$field)
                    <th>{{ $label }}</th>
                @endforeach

                @if (!empty($actions))
                    <th></th>
                @endif
                </tr>
            </thead>
            <tbody>
            @foreach($results as $result)
                <tr>
                @foreach($table as $field)
                    <td>{{ $result->$field }}</td>
                @endforeach
                @if (!empty($actions))
                    <td class="text-right">
                    @foreach($actions as $action)
                        @include('crud.actions.' . $action['type'], ['action' => $action, 'result' => $result])
                    @endforeach
                    </td>
                @endif
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $results->links() }}
    </div>
</div>
</div>
@endsection
