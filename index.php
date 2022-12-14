<?php
session_start();
if (!isset($_SESSION['username'])) {
	header("location:login.php");
}

$usr_name =  $_SESSION['username'];
require_once("class/konten.php");
$objKonten = new konten();
$objKonten->__construct();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Index</title>
	<style type="text/css">
		body {
			background-color: #ddd;
			text-align: center;
			margin: 10px;
		}

		img {
			width: 400px;
			height: 400px;
		}

		.gallery {
			list-style: none;
			display: grid;
			grid-template-columns: auto;
			grid-gap: 10px;
		}


		a {
			font-weight: bold;
		}

		.active {
			color: red;
		}

		@media all and (min-width:700px) {
			.gallery {
				grid-template-columns: auto auto;
				grid-template-rows: auto;
			}

			img {
				width: 300px;
				height: 300px;
			}
		}

		@media all and (min-width:1000px) {
			.gallery {
				grid-template-columns: 0.5fr 1fr 1fr 1fr 1fr 0.5fr;
				grid-template-rows: auto auto auto;
			}

			img {
				width: 200px;
				height: 200px;
			}

			#konten1 {
				grid-column: 2/3;
			}

			#konten2 {
				grid-column: 3/4;
			}

			#konten3 {
				grid-column: 4/5;
			}

			#konten4 {
				grid-column: 5/6;
			}

			#konten5 {
				grid-column: 2/3;
			}

			#konten6 {
				grid-column: 3/4;
			}

			#konten7 {
				grid-column: 4/5;
			}

			#konten8 {
				grid-column: 5/6;
			}

			#konten9 {
				grid-column: 2/3;
			}

			#konten10 {
				grid-column: 3/4;
			}

			#konten11 {
				grid-column: 4/5;
			}

			#konten12 {
				grid-column: 5/6;
			}
		}

		header {
			text-align: right;
		}
	</style>
</head>

<body>
	<header><button id="logout">Log Out</button></header>
	<div class="all-data">
	</div>
	<script type="text/javascript">
		$('body').on('click', '#logout', function() {
			window.location.href = 'login.php';
		});

		function f1(objButton){  
    		
    		var idkont = objButton.value;
    		var idusr = "<?php echo $usr_name; ?>"; // ambil variable php -> menjadi var
			var konten = "idkonten"+idkont
    		$.post('like_proses.php', {
				idkont: idkont,
				idusr: idusr,
			}).done(function(data) {
				$('#idkonten'+idkont).html(data+" likes");
				$('#btnkonten'+idkont).attr('disabled', 'disabled');
			});
		}
		
		$(document).ready(function() {
			function loadPage(page) {
				var idusr = "<?php echo $usr_name; ?>";
				$.ajax({
					url: "pagenumber.php",
					type: "POST",
					data: {
						page_no: page,
						iduser: idusr
					},
					success: function(data) {
						$(".all-data").html(data);
					}
				});
			}
			
			loadPage();

			$(document).on('click', '#pagenumber a', function(e) {
				e.preventDefault();
				var page_id = $(this).attr('id');

				loadPage(page_id);
			})

		});
	</script>
</body>

</html>