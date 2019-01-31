<div class="field">
    <label>{{ __('Add partecipant') }}</label>
    <div class="ui action input">
        <input id="partecipant-email" type="email">
        <div class="ui black button" id="add-partecipant">Add</div>
    </div>
</div>

<div class="field">
    <label>{{ __('Partecipants') }}</label>
    <div class="ui bulleted list" id="partecipant-list">
        @if (old('partecipants'))
            @foreach (old('partecipants') as $partecipant)
                <div class="item">
                    {{ $partecipant }}
                    <div class="ui right floated mini red icon button remove-partecipant" data-email="{{ $partecipant }}">
                        <i class="icon close"></i>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

<div class="ui basic circular icon button back-step" data-next="#timeslots-step">
    <i class="left arrow icon"></i>
</div>

<button class="ui black right floated button next-step" type="submit">Create event</button>
