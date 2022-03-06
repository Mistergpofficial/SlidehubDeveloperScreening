<html>
	<head>
	<title>Slidehub.io Developer Screening</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="{{ asset('css/dist/output.css') }}" rel="stylesheet">
	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	</head>
	<body>
		<div id="app">
			<div class="container">
				<!-- dashboard header -->
				<h4><center>Slidehub.io Developer Screening</center></h4>

				
			
				<!-- companies -->
				<users-component />

			 
				
			</div>

		</div>
	</body>
	<script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
	<script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>

	<script type="text/javascript">
		// shows the #modal element
		toggleModal('modal');

		// hides the #modal element
		toggleModal('modal', false);

		// also shows the #modal element
		toggleModal('modal', true);
	</script>
	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
</html>

