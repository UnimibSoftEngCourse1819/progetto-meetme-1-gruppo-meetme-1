@if ($errors->any())
    <div class="ui error visible message">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
@endif

{{-- Title --}}
<div class="required field {{ $errors->has('email') ? 'error' : '' }}">
    <label>{{ __('Account') }}</label>
    <select name="account">
        @foreach (auth()->user()->emails as $email)
            @if ($email->id == old('account'))
                <option value="{{ $email->id }}" selected>{{ $email->email }}</option>
            @else
                <option value="{{ $email->id }}">{{ $email->email }}</option>
            @endif
        @endforeach
    </select>

    @if ($errors->has('account'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('account') }}</strong>
        </span>
    @endif
</div>

{{-- Title --}}
<div class="required field {{ $errors->has('title') ? 'error' : '' }}">
    <label>{{ __('Title') }}</label>
    <input id="title" type="text" name="title" value="{{ old('title') }}">

    @if ($errors->has('title'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif
</div>

{{-- Description --}}
<div class="required field {{ $errors->has('description') ? 'error' : '' }}">
    <label for="description">{{ __('Description') }}</label>
    <textarea id="description" rows="4" name="description">{{ old('description') }}</textarea>

    @if ($errors->has('description'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
    @endif
</div>

{{-- Dates --}}
<!--
<div class="inline equal width fields">
    <div class="six wide field">
        <label>{{ __('From') }}</label>
        <div class="ui calendar" style="width: 100%">
            <div class="ui fluid input left icon">
                <i class="calendar icon"></i>
                <input type="text" placeholder="Date/Time">
            </div>
        </div>
    </div>

    <div class="six wide field">
        <label>{{ __('To') }}</label>
        <div class="ui calendar" style="width: 100%">
            <div class="ui fluid input left icon">
                <i class="calendar icon"></i>
                <input type="text" placeholder="Date/Time">
            </div>
        </div>
    </div>
</div>
-->

{{-- Privacy --}}
<div class="inline fields">
    <label>{{ __('Privacy') }}</label>

    <div class="field">
        <div class="ui radio checkbox">
            <input type="radio" name="public" value="false" checked="" tabindex="0" id="privacy-private" class="hidden">
            <label for="privacy-private">Private</label>
        </div>
    </div>

    <div class="field">
        <div class="ui radio checkbox">
            <input type="radio" name="public" value="true" tabindex="0" id="privacy-public" class="hidden">
            <label for="privacy-public">Public</label>
        </div>
    </div>

    @if ($errors->has('public'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('public') }}</strong>
        </span>
    @endif
</div>

<div class="ui animated black right floated button next-step" data-next="#timeslots-step">
    <div class="visible content">Choose Time Slots</div>
    <div class="hidden content">
        <i class="right arrow icon"></i>
    </div>
</div>
