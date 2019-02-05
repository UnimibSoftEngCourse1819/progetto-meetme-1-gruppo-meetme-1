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
		background-image: url("{{ asset('img/wall5.jpg') }}");
		background-size: cover;
		background-attachment: fixed;
		background-position: center;
		background-repeat: no-repeat;
		position: relative;
		z-index: 9;
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
		position: relative;
	}
	.header-family-content.section {
		z-index: 10;
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



		<div class="parallax" style="background-color:#FDFFFC;height:  44vw;">
			<div class="header-family-content" style="text-align: center;">
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

				<div class="header-family-content" style="padding-top:4vw;position:relative;text-align: center;">
					<div class="wow fadeInUpBig" data-wow-delay="1s">
						<img src="{{URL::to('img/MeetMe1.png')}}" style="width:60vw;height:25vw;">
					</div>
				</div>

			</div>
		</div>




		<div class="header-family-content section" style="padding: 0vw; width: 100%;height:24vw;background-color:#0f121b;font-size: 10px;text-align: center;">
			<!-- preview -->
			<div class="text" style="height:10vw;padding-top:4vw;">
				<div class="wow fadeIn">
					<h4 style="color:white;font-size: 2vw;">
						WE OFFER
					</h4>
				</div>
				<div  style="padding-top:2vw">
					<p style="color:white;font-size: 1vw;">
						Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br>
						Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,<br>
						when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br>
						when an unknown printer took a galley of type and scrambled.
					</p>
				</div>
			</div>

			<!-- circle -->
			<div class="header-family-content" style="padding-top: 7vw;width:70vw;height:28vw">
				<div class="wow fadeInLeftBig">
					<div class="ui circular segment" style="position:absolute; height: 12vw;width:12vw; margin-left: 18vw;margin-top:1vw">
						<p style="color:black;font-size:2vw;padding-top:0vw">
							<img src="{{URL::to('img/a.svg')}}">
						</p>
					</div>
				</div>
				<div class="wow fadeInUpBig">
					<div class="ui circular segment" style="position:absolute; height: 12vw;width:12vw; margin-left: 43.5vw; margin-top:1vw">
						<p style="color:black;font-size:2vw;padding-top:0vw">
                            <img src="{{URL::to('img/b.svg')}}">

                        </p>
					</div>
				</div>
				<div class="wow fadeInRightBig">
					<div class="ui circular segment" style="position:absolute; height: 12vw;width:12vw;margin-left: 69vw;margin-top:1vw">
						<p style="color:black;font-size:2vw;padding-top:0vw">
                            <img src="{{URL::to('img/c.svg')}}">

                        </p>
					</div>
				</div>
			</div>
		</div>

		<div class="parallax" >
			<div class="second" style="height: 30vw;">
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
					<p style="color:white;font-size: 1vw;">
						Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br>
						Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,<br>
						when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br>
						when an unknown printer took a galley of type and scrambled.
					</p>
				</div>
			</div>
		</div>
        <div class="header-family-content"style="padding: 0vw; width: 100%;height:5vw;background-color:black;font-size: 10px;text-align: center;">
                <div class="wow fadeInUp">
                    <div  style="padding-top:2vw">
                        <p style="color:white;font-size: 1vw;">
                            footer
                        </p>
                    </div>
            </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
	<script>

		new WOW().init();

        $(document).ready(function () {
            var $behindContainer = $('#behind-container');
            function myFunction() {
                $behindContainer.slideToggle()
            }
            $('#scroll-footer').on('click', myFunction);
        });
    </script>
@endsection
