@extends('layouts.layout')

@section('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
@endsection

@section('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
				<h5>Create an article</h5>
				{{-- <span class="byline">Mauris vulputate dolor sit amet nibh</span>  --}}
            </div>
			
            <form action="/articles/create" method="POST">
                @csrf
            <div class="field">
                <label class="label">Title</label>
                <div class="control">
                  <input class="input {{ $errors->has('title') ? 'is-danger' : ''}}" type="text" name="title" id="title" placeholder="Title" value="{{ old('title') }}">
                  
                </div>
                {{-- show validation message if failed --}}
                @if ($errors->has('title'))
                    <p class="help is-danger">{{ $errors->first('title') }}</p>
                @endif
              </div>
              
              
              <div class="field">
                <label class="label">Excerpt</label>
                <div class="control">
                  <textarea class="textarea {{ $errors->has('excerpt') ? 'is-danger' : ''}}" name="excerpt" id="excerpt" placeholder="article excerpt" >{{ old('excerpt') }}</textarea>
                </div>
                @if ($errors->has('excerpt'))
                      <p class="help is-danger">{{ $errors->first('excerpt') }}</p>
                @endif
              </div>

              <div class="field">
                <label class="label">Body</label>
                <div class="control">
                  <textarea class="textarea {{ $errors->has('body') ? 'is-danger' : ''}}" name="body" id="body" placeholder="article body" >{{ old('body') }}</textarea>
                </div>
                @if ($errors->has('body'))
                    <p class="help is-danger">{{ $errors->first('body') }}</p>
                @endif
              </div>


              <div class="field">
                <label class="label">Tags</label>
                <div class="control">
                  <select name="tags[]" multiple>
                    <option value="" disabled selected>Choose a tag</option>
                    @foreach ($tags as $tag)
                      <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach                    
                  </select>
                </div>
                @if ($errors->has('tags'))
                    <p class="help is-danger">{{ $message }}</p>
                @endif
              </div>
              
             
              <div class="field is-grouped">
                <div class="control">
                  <button class="button is-link" type="submit">Submit</button>
                </div>
              </div>
            </form>

            
            
            </div>

	</div>
</div>

@endsection