{{ Form::open(['route' => ['articles.destroy', $article], 'method' => 'DELETE']) }}
    {{ Form::submit('Delete', ['class' => 'btn btn-xs btn-danger']) }}
{{ Form::close() }}