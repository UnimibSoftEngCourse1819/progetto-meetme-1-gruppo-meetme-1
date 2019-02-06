@extends('layouts.app')

@section('custom-styles')
  <style type="text/css">
    .check{
      color:  #32CD32;
    }
  </style>
@endsection

@section('content')
<div class="ui  text container">
  <p><h1>Evento:</h1><h3> {{$survey->title}}</h3></p>

  <table class="ui celled table">
    <thead>
    	<th>Voter name</th>
     	@foreach ($time_slots as $ts)
      	<th class="center aligned"><h2>{{ $ts->from->shortEnglishMonth . ' ' .  $ts->from->day}}</h2>
      		<p>from: {{ $ts->from->format('h:m')}}</p>
          <p>to: {{ $ts->to->format('h:m')}}</p>
      	</th>
  	@endforeach
  </thead>
    <tbody>
  	<tr>
  		<td><b># voti</b></td>
  		@foreach ($time_slots as $ts)
  			<td class="center aligned">{{$ts->voters()->count()}}</td>
  		@endforeach
  	</tr>

    	@foreach($partecipants as $pt)
      <tr>
        <td data-label="Name"><b>{{$pt->email}}</b></td>
        @foreach($time_slots as $ts)
        	@if($ts->voters()->where('emails.id', $pt->id)->count() == 0 && Auth::user()->id == $pt->user_id)
        		<td class="center aligned"><form action="" method="POST"> @csrf<button class="ui teal button">vota</button> <input type="hidden" id="custId" name="email_id" value="{{$pt->id}}"> <input type="hidden" id="custId" name="time_slot_id" value="{{$ts->id}}"></form></td>
        	@elseif( $ts->voters()->where('emails.id', $pt->id)->count() == 0)
        		<td class="negative center aligned">X</td>
    		  @else
      			<td class="positive center aligned ui green"> <i class="check icon"></i></td>
      		@endif
        @endforeach
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection