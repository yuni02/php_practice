@extends('layouts.app')
@section('title', 'Home Page')
@section('content')
<h1>Welcome to Lavarel!</h1>
<p>This is the content of the main page</p>
{{-- <h1>Hello world!</h1>

<div>
@for ($i = 0; $i < 10; $i++)
  <div>The current value is {{ $i }}</div>
@endfor
</div>

<div>
  @php $done = false @endphp
  @while(!$done)
    <div>I'm not done</div>

    @php
      if (random_int(0, 1) === 1) $done = true
    @endphp
  @endwhile
    </div> --}}
@endsection()