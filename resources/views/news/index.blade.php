@extends('main')

@section('title')
    | News
@endsection

@section('content')
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 blog-main">

        @foreach($articles as $article)
            <div class="blog-post mb-3">

                <h2 class="blog-post-title">{{ $article->title }}</h2>
                <p class="blog-post-meta">{{ date('M j, Y H:i', strtotime($article->created_at)) }}</p>

                <img class="fit-div-image mb-4" src="{{ asset('/images/articles/' . $article->article_picture) }}" alt="blog title image">

                <p class="text-justify">{{ strip_tags(str_limit($article->body, 500)) }}</p>
                <a href="{{ route('news.show', $article->id) }}" class="btn btn-lg btn-primary">Read More</a>
            </div><!-- /.blog-post -->
        @endforeach
            <nav class="pages-center">
                {{ $articles->links() }}
            </nav>

    </div><!-- /.blog-main -->
    <div class="col-md-2"></div>

</div><!-- /.row -->
@endsection
