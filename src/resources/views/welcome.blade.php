@extends('layouts.app')


@section('custom-styles')

<style>

	@import url('https://fonts.googleapis.com/css?family=Jura');
	@import url('https://fonts.googleapis.com/css?family=Open+Sans');

	.pushable .pusher {
		padding-top: 0em;
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
		position: relative;
		z-index: 9;
	}
	.header-family-content {
		font-family: 'Jura', sans-serif;
		font-size: 60px;
		color:white;
		width:100%;
		display:flex;
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
		height:5em

		background-attachment:fixed;
		background-position:center;
		position: absolute;
	}

    .navbar .menu-fix {
        visibility: visible !important;
    }
	.overImage:hover img
	{
		opacity: .4;
	}
	.box{
		display: none;
		background-color: white;
		height: 200px;
		width: 400px;
	}
	.box.active{
		display: block;
		border-radius: 10px;
		text-align: center;
		justify-content: center;
	}

</style>

@endsection

@section('content')

	<!-- desktop -->
	<div class="content" id="desktop-content">

		<div class="parallax" style="background-color:#FDFFFC;height:100%">
			<div class="header-family-content" style="height:100%;">
				<div class="wow" >
					<div style="color:#293347; margin:3% 10%;" >
						<h1 style="font-size:150%;">
							EVENT PLANNER
						</h1>

						<div class="wow zoomInDown" data-wow-delay="0.3s" style="color:#293347;">
							<h4 style="font-size:60%;font-family: 'PT Sans', sans-serif;">
								Like Never Before
							</h4>
						</div>
					</div>
				</div>

				<div class="header-family-content" style="position: relative;
														  margin: 16% 0% 0% 0%;
														  ">
					<div class="wow fadeInUpBig" data-wow-delay="1s">
						<img src="{{URL::to('img/MeetMe1.png')}}" style="width:100%;">
					</div>
				</div>

			</div>
		</div>

		<div class="header-family-content section" style="width: 100%;
														  height:100%;
														  background-color: #516b98;
														  font-size: 20%;">
			<!-- preview -->
			<div class="text" style="width:100%;margin:2% 2% 2% 12%">
				<div  style="padding-top:5%">
					<div class="ui list" style="color:white;font-size: 40px;">
								<div class="item"> Portabilità assoluta </div>
								<div class="item"> Gestione eventi intuitiva</div>
								<div class="item"> Partecipazione eventi coinvolgente </div>
					</div>
				</div>
			</div>

			<!-- circle -->
			<div class="header-family-content" style="width:100%;margin: 2% 10% 2% 2%">
				<div class="wow fadeInLeftBig" data-wow-delay="0.5s" data-wow-duration="0.5s">
					<div class="overImage">
						<div class="icon" data-target="#box-1">
							<div class="ui circular segment" style="position:relative; height: 12vw;width:12vw;margin-top:1vw">
								<div style="font-size:2vw;">
									<img src="{{URL::to('img/a.svg')}}">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="wow fadeInLeftBig" data-wow-delay="0s" data-wow-duration="0.5s">
					<div class="overImage">
						<div class="icon" data-target="#box-2">
							<div class="ui circular segment" style="position:relative; height: 12vw;width:12vw; left: 30%;margin-top:1vw">
								<div style="font-size:2vw;">
									<img src="{{URL::to('img/b.svg')}}">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="wow fadeIn" data-wow-duration="0.5s">
					<div class="overImage">
						<div class="icon" data-target="#box-3">
							<div class="ui circular segment"  style="position:relative; height: 12vw;width:12vw;left:60%;margin-top:1vw">
								<div style="font-size:2vw; ">
									<img src="{{URL::to('img/c.svg')}}">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="parallax" >
			<div class="second" style="height: 30vw;">
				<div style="position: relative;
							display: flex;
							align-items: center;
							width: 100%;
							height: 120%;
							justify-content: center;
							">
					<div class="wow fadeInUpBig" data-wow-delay="1s">
						<div class="box" id="box-1">
							a
						</div>
						<div class="box active" id="box-2">
							b
						</div>
						<div class="box" id="box-3">
							c
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="header-family-content"style="padding: 0vw; width: 100%;height:24vw;background-color:#516b98;font-size: 10px;text-align: center;">
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
		/*
		function myFunction() {
			var x = document.getElementById("myDiv1");
			var y = document.getElementById("myDiv2");
			var z = document.getElementById("myDiv3");

			if (x.style.display === "none") {
				x.style.display = "block";
			} else {
				x.style.display = "none";
			}
		}
		/*
		<div class="icon" id="icon-1" data-target="#box-1"></div>
				<div class="icon" id="icon-2" data-target="#box-2"></div>
				<div class="icon" id="icon-3" data-target="#box-3"></div>

				<div class="box" id="box-1"></div>
				<div class="box" id="box-2"></div>
				<div class="box active" id="box-3"></div>
*/
		$(document).ready(function () {
			$('.icon').on('click', function () {
				var target = $(this).data('target');
				var $target = $(target);

				$('.box.active').removeClass('active');
				$target.addClass('active');
			});
		});

    </script>
@endsection
