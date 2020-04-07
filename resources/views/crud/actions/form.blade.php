<form action="{{ route($action['route'], $result->id) }}" method="post" style="display: inline-block">
    {{ csrf_field() }}
    {{ method_field($action['method']) }}
    <input type="submit" value="{{ $action['label'] }}" class="btn btn-{{ $action['color'] }} btn-sm">
</form>
