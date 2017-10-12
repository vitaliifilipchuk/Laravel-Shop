@extends('main')

@section('title')
    | Main Page
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-9">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    @foreach($articles as $key => $article)
                    <div class="carousel-item {{ $key === 0? 'active' : '' }}">
                        <img class="d-block w-100" src="{{ asset('images/articles/' . $article->article_picture) }}" alt="News Slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>{{ $article->title }}</h3>
                            <p>{{ $article->summary }}</p>
                            <p><a class="btn btn-lg btn-primary" href="{{ route('news.show', $article->id) }}" role="button">Learn more</a></p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-lg-3">
            <h3>Newest Additions</h3>
            @foreach($products as $product)
                <div class="new-addition clearfix mt-3">
                    <img src="{{ asset('images/' . $product->image) }}" class="new-addition-image pr-2" alt="...">
                    <h5 class="product-title">{{ $product->title }}</h5>
                    <p class="product-author">{{ $product->author }}</p>
                    <p><span class="pull-left price">{{ $product->price }}$</span><a href="{{ route('shop.show', $product->id) }}" class="btn btn-success pull-right" role="button">More...</a></p>
                </div>
            @endforeach
        </div>
    </div>
@endsection