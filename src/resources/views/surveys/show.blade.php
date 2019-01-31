@extends('layouts.app')
@section('content')



<p>Evento: {{$survey->title}}</p>




<div class="ui grid">
  <div class="three wide column"></div>
  <div class="three wide column">



  </div>
  <div class="threefour wide column"></div>
</div>

<table class="ui celled table">
  <thead>
  	<th>Voter name</th>
   	@foreach ($time_slots as $ts)
    	<th><p>from: {{ $ts->from}}</p>
    		<p>to: {{ $ts->from}}</<p>
    	</th>
	@endforeach
  </tr>
</thead>
  <tbody>
	<tr>
		<td>#</td>
		@foreach ($time_slots as $ts)
			<td>{{$ts->voters_count}}</td>
		@endforeach
	</tr>

  	@foreach($voters as $vt)
    <tr>
      <td data-label="Name">{{$vt->email}}</td>
      <td data-label="Age">24</td>
      <td data-label="Job">Engineer</td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection