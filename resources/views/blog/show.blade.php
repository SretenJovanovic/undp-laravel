@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">Nazad</a>
                <h1 class="display-one">{{ ucfirst($post->title) }}</h1>
                <i>Excerpt: {{$post->excerpt}} </i> 

                <p>{{$post->body}}</p> 
                <br>

                <i> Category: {{$post->category->name}}</i> 
                <hr>
                <a href="/blog/{{ $post->id }}/edit" class="btn btn-outline-primary">Uredi Post</a>
                <br><br>
                <form id="delete-frm" class="" action="" method="POST">
                    <!-- @method('DELETE') kao blade direktiva kreira input polje koje će override-ovati default POST metodu na DELETE metodu
                    Ovo možete i da proverite kroz inspect element  -->
                    @csrf
                    @method('DELETE') 
                    <button class="btn btn-danger">Obrisi Post</button>
                </form>
            </div>
        </div>
    </div>
@endsection