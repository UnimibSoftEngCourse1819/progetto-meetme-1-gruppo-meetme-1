@extends('layouts.app')


@section('custom-styles')

<style>
	.pushable .pusher {
		padding-top: 3rem;
	}
	.content {
		position: relative;
		z-index: 99;
		padding-top: 5rem;
	}
	.bg {
		background-image : url({{asset('/img/background.jpg')}});
		background-size: cover;
		overflow: hidden;
		position: fixed;
		width: 100%;
		height: 100%;
	}
	.bg:after {
		content: '';
		position: absolute;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;

		background-color: rgba(0, 0, 0, .4);
	}
</style>

@endsection

@section('content')
<div class="bg"></div>
<div class="content">
	<h1>asdgfjsdf</h1>
</div>
@endsection
