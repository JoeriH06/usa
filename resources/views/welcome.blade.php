@extends('layouts.app')

@section('status-page', 'Home Page')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Welcome to my test app for usability</h1>
        <p class="lead">This is a login and logout page for validation with some error pages implemented.</p>
        <hr class="my-4">
        <p>Maybe I will add some CRUD later on, who knows...</p>
        <a class="btn btn-primary btn-lg" href="{{ route('posts.index') }}" role="button">View Posts</a>
    </div>
</div>
@endsection
