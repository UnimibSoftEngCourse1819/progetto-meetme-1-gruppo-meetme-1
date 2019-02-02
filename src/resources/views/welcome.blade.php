@extends('layouts.app')


@section('custom-styles')

<style>

	@import url('https://fonts.googleapis.com/css?family=Jura');
	@import url('https://fonts.googleapis.com/css?family=Open+Sans');

	.pushable .pusher {
		padding-top: 0rem;
	}

	.content {
		position: relative;
		z-index: 100;
	}

	.parallax {
		width: 100%;

		background-repeat:no-repeat;
		background-attachment:fixed;
		background-position:center;
	}
	.parallax:after {
		content: '';
		position: relative;
		padding-top:4rem;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		background-color: rgba(0, 0, 0, .4);
	}
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
					<div class="wow zoomInDown" data-wow-delay="0.5s" style="color:#293347;">

						<h4 style="font-size:2vw;margin: 1vw;font-family: 'PT Sans', sans-serif;">
							Like Never Before
						</h4>
					</div>
				</div>

			</div>
			<div class="header-family-content" style="padding-top:20vw;position:relative;text-align: center;">
				<img src="{{ URL::to('img/MeetMe1.png') }}" style="width:60vw;height:25vw;z-index:-1;">
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

						<h4 style="font-size:10vw;margin: 0vw;font-family: 'PT Sans', sans-serif;">
							Like Never Before
						</h4>
					</div>
				</div>

			</div>

			<div class="header-family-content" style="padding-top:115vw;padding-right:5vw;position:relative;text-align: center;">
				<img src="{{ URL::to('img/MeetMe1.png') }}" style="width:90vw;height:35vw;z-index:-1;">
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
		new WOW().init();


		/*
	window.onload = function () {
		appear({
			elements: function () {
				// work with all elements with the class "track"
				return document.querySelectorAll(	'.duration-demo .el');
			},
			appear: function appear(el) {
				anime({
					targets: el,
					translateY: [150,200]	,
					easing: 'easeInOutSine',
					duration: 1000

				});
			},
			bounds: 80,
			reappear: false
		});
	}
		/*
	window.onload = function () {
		var c = document.getElementById("c");
		var ctx = c.getContext("2d");
		var cH;
		var cW;
		var bgColor = "#FF6138";
		var animations = [];
		var circles = [];

		var colorPicker = (function () {
			var colors = ["#FF6138", "#FFBE53", "#2980B9", "#282741"];
			var index = 0;

			function next() {
				index = index++ < colors.length - 1 ? index : 0;
				return colors[index];
			}

			function current() {
				return colors[index]
			}

			return {
				next: next,
				current: current
			}
		})();

		function removeAnimation(animation) {
			var index = animations.indexOf(animation);
			if (index > -1) animations.splice(index, 1);
		}

		function calcPageFillRadius(x, y) {
			var l = Math.max(x - 0, cW - x);
			var h = Math.max(y - 0, cH - y);
			return Math.sqrt(Math.pow(l, 2) + Math.pow(h, 2));
		}

		function addClickListeners() {
			c.addEventListener("touchstart", handleEvent);
			c.addEventListener("mousedown", handleEvent);
		};

		function handleEvent(e) {
			if (e.touches) {
				e.preventDefault();
				e = e.touches[0];
			}
			var currentColor = colorPicker.current();
			var nextColor = colorPicker.next();
			var targetR = calcPageFillRadius(e.pageX, e.pageY);
			var rippleSize = Math.min(200, (cW * .4));
			var minCoverDuration = 750;

			var pageFill = new Circle({
				x: e.pageX,
				y: e.pageY - c.offsetTop,
				r: 0,
				fill: nextColor
			});
			var fillAnimation = anime({
				targets: pageFill,
				r: targetR,
				duration: Math.max(targetR / 2, minCoverDuration),
				easing: "easeOutQuart",
				complete: function () {
					bgColor = pageFill.fill;
					removeAnimation(fillAnimation);
				}
			});

			var ripple = new Circle({
				x: e.pageX,
				y: e.pageY - c.offsetTop,
				r: 0,
				fill: currentColor,
				stroke: {
					width: 3,
					color: currentColor
				},
				opacity: 1
			});
			var rippleAnimation = anime({
				targets: ripple,
				r: rippleSize,
				opacity: 0,
				easing: "easeOutExpo",
				duration: 900,
				complete: removeAnimation
			});

			var particles = [];
			for (var i = 0; i < 32; i++) {
				var particle = new Circle({
					x: e.pageX,
					y: e.pageY - c.offsetTop,
					fill: currentColor,
					r: anime.random(24, 48)
				})
				particles.push(particle);
			}
			var particlesAnimation = anime({
				targets: particles,
				x: function (particle) {
					return particle.x + anime.random(rippleSize, -rippleSize);
				},
				y: function (particle) {
					return particle.y + anime.random(rippleSize * 1.15, -rippleSize * 1.15);
				},
				r: 0,
				easing: "easeOutExpo",
				duration: anime.random(1000, 1300),
				complete: removeAnimation
			});
			animations.push(fillAnimation, rippleAnimation, particlesAnimation);
		}

		function extend(a, b) {
			for (var key in b) {
				if (b.hasOwnProperty(key)) {
					a[key] = b[key];
				}
			}
			return a;
		}

		var Circle = function (opts) {
			extend(this, opts);
		}

		Circle.prototype.draw = function () {
			ctx.globalAlpha = this.opacity || 1;
			ctx.beginPath();
			ctx.arc(this.x, this.y, this.r, 0, 2 * Math.PI, false);
			if (this.stroke) {
				ctx.strokeStyle = this.stroke.color;
				ctx.lineWidth = this.stroke.width;
				ctx.stroke();
			}
			if (this.fill) {
				ctx.fillStyle = this.fill;
				ctx.fill();
			}
			ctx.closePath();
			ctx.globalAlpha = 1;
		}

		var animate = anime({
			duration: Infinity,
			update: function () {
				ctx.fillStyle = bgColor;
				ctx.fillRect(0, 0, cW, cH);
				animations.forEach(function (anim) {
					anim.animatables.forEach(function (animatable) {
						animatable.target.draw();
					});
				});
			}
		});

		var resizeCanvas = function () {
			cW = window.innerWidth;
			cH = window.innerHeight;
			c.width = cW * devicePixelRatio;
			c.height = cH * devicePixelRatio;
			ctx.scale(devicePixelRatio, devicePixelRatio);
		};

		(function init() {
			resizeCanvas();
			if (window.CP) {
				// CodePen's loop detection was causin' problems
				// and I have no idea why, so...
				window.CP.PenTimer.MAX_TIME_IN_LOOP_WO_EXIT = 6000;
			}
			window.addEventListener("resize", resizeCanvas);
			addClickListeners();
			if (!!window.location.pathname.match(/fullcpgrid/)) {
				startFauxClicking();
			}
			handleInactiveUser();
		})();

		function handleInactiveUser() {
			var inactive = setTimeout(function () {
				fauxClick(cW / 2, cH / 2);
			}, 2000);

			function clearInactiveTimeout() {
				clearTimeout(inactive);
				c.removeEventListener("mousedown", clearInactiveTimeout);
				c.removeEventListener("touchstart", clearInactiveTimeout);
			}

			c.addEventListener("mousedown", clearInactiveTimeout);
			c.addEventListener("touchstart", clearInactiveTimeout);
		}

		function startFauxClicking() {
			setTimeout(function () {
				fauxClick(anime.random(cW * .2, cW * .8), anime.random(cH * .2, cH * .8));
				startFauxClicking();
			}, anime.random(200, 900));
		}

		function fauxClick(x, y) {
			var fauxClick = new Event("mousedown");
			fauxClick.pageX = x;
			fauxClick.pageY = y;
			document.dispatchEvent(fauxClick);
		}
	};*/
	</script>
@endscript