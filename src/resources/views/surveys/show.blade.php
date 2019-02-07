@extends('layouts.app')

@section('content')
<div class="ui container">
  <p><a id='title'>Titolo evento:</a> <a id="subtitle">{{$survey->title}}</a></p>
  <p><a id='title'>Descrizione evento:</a> <a id="subtitle">{{$survey->description}}</a></p>

  @if($time_slot_count != null)
  <div class="ui compact info message" id='monst_voted_date'>
      <p><i class="lightbulb outline icon"></i> L'evento più votato è quello
      @if($time_slot_count->from->toDateString() == $time_slot_count->to->toDateString())
        {{' del ' . $time_slot_count->from->day. ' ' .$time_slot_count->from->shortEnglishMonth}}
      @else
         {{' dal ' .$time_slot_count->from->day. ' ' .$time_slot_count->from->shortEnglishMonth . ' al ' .$time_slot_count->to->day. ' ' .$time_slot_count->to->shortEnglishMonth }}
      @endif
    </p>
  </div>
  @endif
  <table class="ui celled table">
    <thead>
    	<th>Voter name</th>
     	@foreach ($time_slots as $ts)
      	<th class="center aligned">
          <h2>
            @if($ts->from->toDateString() == $ts->to->toDateString())
            {{ $ts->from->shortEnglishMonth . ' ' .  $ts->from->day}}
            @else
              <p id="date_left">{{ $ts->from->shortEnglishMonth . ' ' .  $ts->from->day}}</p>
              <p id="date_right"><a id="hyphen">-</a> {{ $ts->to->shortEnglishMonth . ' ' .  $ts->to->day}}</p>
            @endif
          </h2>
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
  <form method="" action="">
    @csrf
    @method('patch')
    <button class="ui red button">Red</button>
  </form>
</div>
@endsection


@section('custom-styles')
  <style type="text/css">
    .container{
      padding-top: 3em;
    }

    .check{
      color:  #32CD32;
    }

    #title{
      font-size: 1.8em;
      margin-top: 1em;
    }

    #subtitle{
      font-size: 1.3em;
      margin-left: 1em;
    }

    a{
      color: black;
      font-style: noen;
    }
    a:hover{
      color: black;
      font-style: noen;
    }

    #date_th{
      display: flex;
    }
    #date_left{
      text-align: left;
      margin-left: 0.4em;
      }
    #date_right{
      text-align: right;
      margin-top: -1em;
    }

    #hyphen{
      margin-right: 0.4em;
      font-weight: bold;
    }

    #monst_voted_date{
      margin-bottom: 0px;
    }
  </style>
@endsection

