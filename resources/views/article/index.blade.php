@extends('layouts.layout')


@section('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
            @forelse ($articles as $article)
                <div class="title">
                    <h2><a href="{{ route('article.show', $article)}}">{{$article->title}}</a></h2>
                    <span class="byline">{{ $article->excerpt }}</span> 
                </div>
                <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
            @empty
                <div class="title">
                    <h2>there's no relevant article =( </h2>
                </div>

                
            @endforelse
			
		</div>

	</div>
</div>

@endsection