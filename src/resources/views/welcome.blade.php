@extends('layouts.app')


@section('custom-styles')

<style>

	@import url('https://fonts.googleapis.com/css?family=Jura');
	@import url('https://fonts.googleapis.com/css?family=Open+Sans');

	.pushable .pusher {
		padding-top: 0rem;
		height:auto;
	}

	.content {
		position: relative;
		z-index: 100;
	}


	.parallax {
		width: 100%;
		background-attachment: fixed;
		background-position: center;
		background-repeat: no-repeat;
	}

	.parallax .second{
		width: 100%;
		background-image: url("{{ asset('img/wall6.jpg') }}");
		background-size: cover;
		background-attachment: fixed;
		background-position: center;
		background-repeat: no-repeat;
	}
	/*
	.parallax:after {
		content: '';
		position: relative;
		padding-top:4rem;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		background-color: rgba(0, 0, 0, .4);
	}*/
	.header-family-content {
		font-family: 'Jura', sans-serif;
		font-size: 80px;
		color:white;
		width:100%;
		height:5em;
		padding-top: 1em;
		background-attachment:fixed;
		background-position:center;
		position: absolute;
	}
	.footer-family-content {
		font-family: 'Jura', sans-serif;
		font-size: 80px;
		color:white;
		width:100%;
		height:5em;
		background-attachment:fixed;
		background-position:center;
		position: absolute;
	}


</style>

@endsection

@section('content')

	<!-- desktop -->
	<div class="content" id="desktop-content">
		<div class="parallax" style="background-color:#FDFFFC;height:  45vw;">
			<div class="header-family-content" id="a" style="text-align: center;">
				<div class="wow" >
					<div class="wow zoomIn" style="color:#293347">
						<h1 style="font-size:5vw;">
							EVENT PLANNER
						</h1>
					</div>
					<div class="wow zoomInDown" data-wow-delay="0.3s" style="color:#293347;">
						<h4 style="font-size:2vw;margin: 1vw;font-family: 'PT Sans', sans-serif;">
							Like Never Before
						</h4>
					</div>
				</div>

				<div class="header-family-content" style="padding-top:5vw;position:relative;text-align: center;">
					<div class="wow fadeInUpBig" data-wow-delay="1s">
						<img src="{{ URL::to('img/MeetMe1.png') }}" style="width:60vw;height:25vw;">
					</div>
				</div>
			</div>
		</div>

		<div class="header-family-content"style="padding: 0vw; width: 100%;height:24vw;background-color:#0f121b;font-size: 10px;text-align: center;">
			<!-- preview -->
			<div class="text" style="height:10vw;padding-top:4vw;">
				<div class="wow fadeIn">
					<h4 style="color:white;font-size: 2vw;">
						WE OFFER
					</h4>
				</div>
				<div  style="padding-top:2vw">
					<p style="color:#7eebff;font-size: 1vw;">
						Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br>
						Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,<br>
						when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br>
						when an unknown printer took a galley of type and scrambled.
					</p>
				</div>
			</div>

			<!-- circle -->
			<div class="header-family-content" style="padding-top: 7vw;width:70vw;height:28vw">
				<
				<div class="wow fadeInLeftBig">
					<div class="ui circular segment" style="position:absolute; height: 15vw;width:15vw; margin-left: 18vw; margin-top: 0vw">
						<p style="padding-top:4vw;color:black;font-size:2vw">
							Text
						</p>
					</div>
				</div>
				<div class="wow fadeInUpBig">
					<div class="ui circular segment" style="position:absolute; height: 15vw;width:15vw; margin-left: 42vw; margin-top:0vw">
						<p style="padding-top:4vw;color:black;font-size:2vw">
							Text
						</p>
					</div>
				</div>
				<div class="wow fadeInRightBig">
					<div class="ui circular segment" style="position:absolute; height: 15vw;width:15vw;margin-left: 67vw; margin-top:0vw">
						<p style="padding-top:4vw;color:black;font-size:2vw">
							Text
						</p>
					</div>
				</div>
			</div>
		</div>

		<div class="parallax" >
			<div class="second" style="height: 50vw;">
			</div>
		</div>

		<div class="header-family-content"style="padding: 0vw; width: 100%;height:24vw;background-color:#0f121b;font-size: 10px;text-align: center;">
			<div class="text" style="height:10vw;padding-top:4vw;">
				<div class="wow fadeIn">
					<h4 style="color:white;font-size: 2vw;">
						WE OFFER
					</h4>
				</div>
				<div  style="padding-top:2vw">
					<p style="color:#7eebff;font-size: 1vw;">
						Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br>
						Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,<br>
						when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br>
						when an unknown printer took a galley of type and scrambled.
					</p>
				</div>
			</div>
		</div>
		<div class="parallax" style="background-color:red;height: 100%;">

		</div>
	</div>


	<!-- mobile -->
	<div class="content" id="mobile-content">
		<div class="parallax" style="background-color:#FDFFFC;height: 150vw;">
			<div class="header-family-content" id="a" style="text-align: center; padding-right:5vw;padding-top:35vw;">
				<div class="wow" >
					<div class="wow zoomIn" style="color:#293347">
						<h1 style="font-size:15vw;">
							EVENT PLANNER
						</h1>

					</div>
					<div class="wow zoomInDown" data-wow-delay="0.5s" style="color:#293347;">

						<h4 style="font-size:10vw;margin-left:3vw;font-family: 'PT Sans', sans-serif;">
							Like Never Before
						</h4>
					</div>
				</div>

			</div>

			<div class="header-family-content" style="padding-top:115vw;position:relative;text-align: center;">
				<div class="wow fadeInUpBig" data-wow-delay="1s">
					<img src="{{ URL::to('img/MeetMe1.png') }}" style="width:90vw;height:35vw;">
				</div>
			</div>
		</div>

		<div class="header-family-content"style="padding: 15vw; width: 100%;background-color:#0f121b;font-size: 10px;text-align: center;">

			<div class="header-family-content" style="padding-top: 8vw;width:70vw;height:28vw">
				<div class="ui segment" style="position:absolute; height: 20vw;width:20vw; margin-left: 0vw; margin-top: 0vw">
					This segment will appear to the left
				</div>
				<div class="ui segment" style="position:absolute; height: 20vw;width:20vw; margin-left: 25vw; margin-top:0vw">
					This segment will appear to the left
				</div>
				<div class="ui segment" style="position:absolute; height: 20vw;width:20vw;margin-left: 50vw; margin-top:0vw">
					This segment will appear to the left
				</div>
			</div>

		</div>

		<div class="parallax" style="background-color:#FDFFFC;height: 100%;">


		</div>



	</div>


@endsection

@section('custom-scripts')
	<!--
	<script src="{{ asset('js/anime.min.js') }}"></script>
	<script src="{{ asset('js/appear.js') }}"></script>-->

	<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
	<script>
		wow = new WOW(
				{
					boxClass:     'text',      // default
					animateClass: 'animated', // default
					offset:       0,          // default
					mobile:       true,       // default
					live:         true        // default
				}
		)
		wow.init();
		new WOW().init();
		wow = new WOW(
				{
					boxClass:     'header-family-content',      // default
					animateClass: 'animated', // default
					offset:       0,          // default
					mobile:       true,       // default
					live:         true        // default
				}
		)
		wow.init();
	</script>
@endscript