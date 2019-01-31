@extends('layouts.app')


@section('custom-styles')

<style>
	.pushable .pusher {
		padding-top: 3rem;
	}


	.content {
		position: absolute;
		z-index: 100;

	}
	.bg {
		background-image : url({{asset('/img/background.jpg')}});
		background-size: cover;
		overflow: hidden;
		position: fixed;
		//padding-top:1.5rem;
		width: 100%;
		height: 100%;
		background-repeat:no-repeat;
		background-attachment:fixed;
		background-position:center;
	}
	.bg:after {
		content: '';
		position: absolute;
		padding-top:4rem;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		background-color: rgba(0, 0, 0, .4);
	}
</style>

@endsection

@section('content')
<div class="bg" id="bg" >
	<div class="content" id="desktop-content">
		<h1>AHHHHHHHHHHHHHHHHH</h1>
	</div>
	<div class="content" id="mobile-content">
		<h1>AHHHHHHHHHHHHHHHHH</h1>
	</div>
</div>

@endsection

<script>

</script>
