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
        cursor: pointer;

    }
	img {
		max-width: 100%;
	}
	.box{
		display: none;
		height:100%;
		width: 100%;
	}
	.box.active{
		display: flex;
		border-radius: 10px;
		text-align: center;
		justify-content: center;
	}

</style>

@endsection

@section('content')

	<!-- desktop -->
	<div class="content" id="desktop-content">

		<div class="parallax" style="background-color:#FDFFFC;
		                             height:100%">
			<div class="header-family-content" style="height:100%;">
				<div class="wow animated" style="visibility: visible;">
					<div style="color:#293347;
					            margin:3% 10%;">
						<h1 style="font-size:150%;">
							EVENT PLANNER
						</h1>

						<div class="wow zoomInDown" data-wow-delay="0.3s" style="color: rgb(41, 51, 71); visibility: visible; animation-delay: 0.3s; animation-name: zoomInDown;">
							<h4 style="font-size:60%;
							           font-family: 'PT Sans', sans-serif;">
								Like Never Before
							</h4>
						</div>
					</div>
				</div>

				<div class="header-family-content" style="position: relative;
														  margin: 16% 0% 0% 0%;
														  ">
					<div class="wow fadeInUp" data-wow-delay="1s" style="visibility: visible; animation-delay: 1s; animation-name: fadeInUp;">
						<img src="http://localhost/progetto-meetme-1-gruppo-meetme-1/src/public/img/MeetMe1.png" style="width:100%;">
					</div>
				</div>

			</div>
		</div>

		<div class="header-family-content section" style="
														  width: 100%;
														  height:100%;
														  background-color: #516b98;
														  /* font-size: 20%; */
														  padding: 60px 60px;
														  display: flex;
														  align-items: center;
														  ">
			<div class="ui container" style="display: flex; align-items: center;">
				<!-- preview -->
				<div class="text" style="flex: 1;">
					<div style="/* padding-top:5% */">
						<div class="ui list" style="color:white;
													font-size: 40px;">
							<div class="item"> Portabilità assoluta </div>
							<div class="item"> Gestione eventi intuitiva</div>
							<div class="item"> Partecipazione coinvolgente </div>
						</div>
					</div>
				</div>

				<!-- circle -->
				<div class="header-family-content" style="flex: 1; justify-content: space-evenly;">
					<div class="overImage" data-target="#box-1">
						<div class="wow fadeInLeftBig"data-wow-delay="0.6s">
							<div class="ui circular segment" style="
																			height: 120px;
																			/* display: block; */
																			width: 120px;
																			line-height: 0;        cursor: pointer;

																			">
								<img src="http://localhost/progetto-meetme-1-gruppo-meetme-1/src/public/img/a.svg">
							</div>
						</div>
					</div>
					<div class="overImage" data-target="#box-2">
						<div class="wow fadeInLeftBig" data-wow-delay="0.3s">
							<div class="ui circular segment" style="
																			position:relative;
																			height: 120px;
																			width: 120px;
																			line-height: 0;        cursor: pointer;

																			">
								<img src="http://localhost/progetto-meetme-1-gruppo-meetme-1/src/public/img/b.svg">
							</div>
						</div>
					</div>
					<div class="overImage" data-target="#box-3">
						<div class="wow fadeInLeft	Big" data-wow-delay="0s">
							<div class="ui circular segment" style="
																			 /* position:relative; */
																			 height: 120px;
																			 width: 120px;
																			 margin: 0;
																			 line-height: 0;        cursor: pointer;

																			 ">
								<img src="http://localhost/progetto-meetme-1-gruppo-meetme-1/src/public/img/c.svg">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="parallax">
			<div class="second">
				<div class="ui container" style="display: flex; align-items: center;">
					<div style="position: relative;
								display: flex;
								padding: 5%;
								align-items: center;
								justify-content: center;">
						<div class="box" id="box-1" style="background-color:transparent" >
							<div class="header-family-content" style="position: relative;
																	  display: flex;
																	  align-items: center;
																	  justify-content: center;">
								<img src="http://localhost/progetto-meetme-1-gruppo-meetme-1/src/public/img/smart.png" style="border-radius: 10px 10px;width:200px;">
							</div>
							<div style="padding: 15px 20px;display:flex; flex-direction: column; justify-content: center ">
								<h1 style="color:white;
										  font-size: 30px;" >
									Monitora i sondaggi  mentre sei in movimento
								</h1>
								<p style="color:white;
										  font-size: 30px;
										  padding-top:5%;">
									Ricevi notifiche sulle attività recenti.
									L'app MeetMe è gratuita e funziona senza problemi<br> su tutti i dispositivi principali.
								</p>
							</div>
						</div>

						<div class="box active " id="box-2" >
							<div class="header-family-content" style="position: relative;
																	  display: flex;
																	  align-items: center;
																	  justify-content: center;">
								<img src="http://localhost/progetto-meetme-1-gruppo-meetme-1/src/public/img/calendar.png" style="border-radius: 10px 10px; ">
							</div>
							<div style="padding: 15px 20px;display:flex; flex-direction: column; justify-content: center ">
								<h1 style="color:white;
										  font-size: 30px;" >
									Non devi cambiare pagina per gestire gli eventi.<br>
								</h1>
								<p style="color:white;
										  font-size: 30px;
										  padding-top:5%;">
									Un calendario riassumerà tutte le informazioni relative agli eventi
									a cui vuoi partecipare.
								</p>
							</div>
						</div>
						<div class="box" id="box-3">
							<div class="header-family-content" style="position: relative;
																	  display: flex;
																	  align-items: center;
																	  justify-content: center;
																	  ">
								<img src="http://localhost/progetto-meetme-1-gruppo-meetme-1/src/public/img/like.png" style="border-radius: 10px 10px;width:350px;">
							</div>
							<div style="padding: 15px 20px;display:flex; flex-direction: column; justify-content: center ">
								<h1 style="color:white;
										  font-size: 30px;" >
									AAA
								</h1>
								<p style="color:white;
										  font-size: 30px;
										  padding-top:10%;">
									Un calendario riassumerà tutte le informazioni relative agli eventi</br>
									a cui vuoi partecipare.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



		<div class="header-family-content" style="position: absolute;
                                                 display: flex;
                                                 background-color: #252e3d;
                                                 align-items: center;
                                                 width: 100%;
                                                 height: 5%;
                                                 justify-content: center
">
			<div class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
				<div>
					<p style="color:white;
                                  font-size: 1vw;">
						Made with <i class="creative commons icon"></i> in Italy
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
			$('.overImage').on('click', function () {
				var target = $(this).data('target');
				var $target = $(target);

				$('.box.active').removeClass('active');
				$target.addClass('active');
			});
		});

    </script>
@endsection
