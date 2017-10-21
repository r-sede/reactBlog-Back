@extends('layouts.myApp')
@section('content')
<div class="container">
	<form action="{{ route('articles') }}" method="POST">
	  <div class="form-group">
	    <label for="articleTitle">titre de l'article</label>
	    <input type="text" required class="form-control" id="articleTitle" name="articleTitle" placeholder="le titre de mon article">
	  </div>

	  <div class="form-group">
	    <label for="articleBody">contenu de l'article</label>
	    <textarea required class="form-control" name="articleBody" id="articleBody">mon article</textarea>
	  </div>
	{{ csrf_field() }}
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>
@endsection