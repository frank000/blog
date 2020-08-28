
@extends('layouts.app')

@section('content')

<form action="{{route('posts.update',['post' => $post->id])}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Títilo </label>
        <input type="text" name="title" class="form-control" value="{{$post->title}}">
    </div>
    <div class="form-group">
        <label>Descrição </label>
        <input type="text" name="description" class="form-control" value="{{$post->description}}">
    </div>
    <div class="form-group">
        <label>Conteúdo </label>
        <textarea name="content" id="" cols="30" rows="10" class="form-control" >7
        {{$post->content}}
        </textarea>
    </div>
    <div class="form-group">
        <label>Slug </label>
        <input type="text" name="slug" class="form-control" value="{{$post->slug}}">
    </div>
    
    <button class="btn btn-lg btn-success">Alterar postagem</button>
    
</form>

<form action="{{route('posts.destroy',['post' => $post->id])}}" method="post">
    @csrf
    @method('DELETE')
        <button class="btn btn-lg btn-danger">Deletar postagem</button>

</form>
@endsection