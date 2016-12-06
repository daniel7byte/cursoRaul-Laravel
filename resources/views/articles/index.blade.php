@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('alerts.success')
                <div class="panel panel-default">
                    <div class="panel-heading">Articles</div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>User</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $article)
                                    @can('owner', $article)
                                        <tr>
                                            <td>{{ $article->title }}</td>
                                            <td>{{ $article->description }}</td>
                                            <td>{{ $article->category }}</td>
                                            <td>{{ $article->user->firstName }}</td>
                                            <td>
                                                {{ link_to_route('articles.edit', $title = 'Edit', $parameter = $article, $attributes = ['class' => 'btn btn-xs btn-primary']) }}
                                                @include('articles.delete')
                                            </td>
                                        </tr>
                                    @endcan
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
