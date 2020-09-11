@extends('layouts.app')

@section('content')
<section class="text-center pt-4">
  <h1 style="font-size: 1.5rem">回答する</h1>
  <div class="card">
    <div class="card-body">
      {{ $question->answer }}
    </div>
  </div>
</section>
@endsection