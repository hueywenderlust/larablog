@extends('layouts.layout')


@section('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
				<h2>{{$article->title}}</h2>
				<span class="byline">{{ $article->excerpt }}</span> </div>
			<p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
			<p>{{ $article->body }}</p>
		</div>


		{{-- <div class="container">

			@foreach ($article->tags as $tag)
				<a href="#">{{ $tag->name }}</a>
			@endforeach
		</div> --}}

		<div id="sidebar">
			<div id="col">
				<div class="sidebox">
					<p style="font-size: 30px; font-weight: 500">TAGS</p>
					<ul class="style2">
						@foreach ($article->tags as $tag)
							<li><a href="{{route('get.articles', ['tag' => $tag->name])}}">{{ $tag->name }}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>

	</div>
</div>

@endsection