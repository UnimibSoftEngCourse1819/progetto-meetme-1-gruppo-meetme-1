@extends('layouts.app')
@section('content')



<p>Evento: {{$survey->title}}</p>

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
			<td>{{$ts->voters()->count()}}</td>
		@endforeach
	</tr>

  	@foreach($partecipants as $pt)
    <tr>
      <td data-label="Name">{{$pt->email}}</td>
      @foreach($time_slots as $ts)
      	@if($ts->voters()->where('emails.id', $pt->id)->count() == 0 && Auth::user()->id == $pt->user_id)
      		<td>S</td>
          <!-- id ts e pt id -->
      	@elseif( $ts->voters()->where('emails.id', $pt->id)->count() == 0)
      		<td>X</td>
		@else
			<td>V</td>
		@endif
      @endforeach
    </tr>
    @endforeach
  </tbody>
</table>

@endsection