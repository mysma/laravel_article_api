@extends('index')


@section('content')
<div class="row">

</div>
<div class="row">
  @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
</div>
    <hr />
    <div class="row">
      <div class="col-lg-8">
        @foreach ($article as $article1)
          <p><h1>{{ $article1->title }}</h1></p>
         <p class="lead"><i class="fa fa-user"></i> by {{ $article1->author }}</p>
         <hr><p><i class="fa fa-calendar"></i>Posted on {{$article1->created_at }}</p>
         <hr><p class="lead">{{ $article1->subtitle }}
          <!--<p><h5>{{ $article1->content }}</h5></p>-->
          <hr>


        <hr />


        @endforeach
      </div>
    </div>
    {{ $article->links() }}
@endsection
