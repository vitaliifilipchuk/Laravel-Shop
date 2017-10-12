@extends('main')

@section('title')
    | Articles
@endsection

@section('content')
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-7">
            <h1>All Articles</h1>
        </div>
        <div class="col-md-3">
            <a href="{{ route('articles.create') }}" class="btn btn-lg btn-block btn-primary">Create new article</a>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <table class="table table-striped table-bordered">
                <thead class="table-inverse">
                <th>#</th>
                <th>Title</th>
                <th>Summary</th>
                <th>Created at</th>
                <th></th>
                </thead>
                <tbody>
                @foreach($articles as $article)
                    <tr>
                        <th>{{ $article->id }}</th>
                        <td>{{ $article->title }}</td>
                        <td>{{ str_limit($article->summary, 50) }}</td>
                        <td>{{ $article->created_at->format(' H:i, F d, Y') }}</td>
                        <td><a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ route('articles.destroy', $article->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pages-center">
                {!! $articles->links() !!}
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
@endsection