@extends('layouts.layout')

@section('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
@endsection

@section('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
				<h5>Update article</h5>
				{{-- <span class="byline">Mauris vulputate dolor sit amet nibh</span>  --}}
            </div>
			
            <form action="/articles/edit/{{$article->id}}" method="POST">
                @csrf
                @method('PUT')
            <div class="field">
                <label class="label">Title</label>
                <div class="control">
                  <input class="input {{ $errors->has('title') ? 'is-danger' : ''}}" type="text" name="title" id="title" placeholder="Title" value="{{ $article->title }}" >
                </div>
                @if ($errors->has('title'))
                    <p class="help is-danger">{{ $errors->first('title') }}</p>
                @endif
              </div>
              
              
              <div class="field">
                <label class="label">Excerpt</label>
                <div class="control">
                  <textarea class="textarea {{ $errors->has('excerpt') ? 'is-danger' : ''}}" name="excerpt" id="excerpt" placeholder="article excerpt" >{{ $article->excerpt }}</textarea>
                </div>
                @if ($errors->has('excerpt'))
                    <p class="help is-danger">{{ $errors->first('excerpt') }}</p>
                @endif
              </div>

              <div class="field">
                <label class="label">Body</label>
                <div class="control">
                  <textarea class="textarea {{ $errors->has('body') ? 'is-danger' : ''}}" name="body" id="body" placeholder="article body" >{{ $article->body }}</textarea>
                </div>

                @if ($errors->has('body'))
                    <p class="help is-danger">{{ $errors->first('body') }}</p>
                @endif
              </div>
              
             
              <div class="field is-grouped">
                <div class="control">
                  <button class="button is-link" type="submit">Update</button>
                </div>
              </div>
            </form>

            
            
            </div>

	</div>
</div>

@endsection