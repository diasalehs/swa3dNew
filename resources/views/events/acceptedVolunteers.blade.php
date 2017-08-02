@extends('layouts.eventHead')

@section('content')


@if(count($posts) == 0)
                <h3 class="greencolor " style="margin-top:30px;">No posts to show</h3>
                <hr />
                @else
                <h3 class="greencolor " style="margin-top:30px;">Event Posts</h3>
                <hr />
              @foreach($posts as $post)
                  <div class="card" style="margin-bottom:20px;">
                    <div class="card-block">
                      <h4 class="card-title greencolor" >{{$post->body}}</h4>
                        {{$post->created_at}}
                    </div>
                  </div>
              @endforeach
@endif

@endsection