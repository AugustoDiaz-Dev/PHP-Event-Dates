<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="estilos.css">
</head>
 
<body>
 
<div class="container">
	<header>
		<h1>Programación en PHP y MySQL - Nivel Avanzado</h1>
	
	</header>
	<section>
		<h2>Eventos</h2>
		<?php
		if($_POST) {
			
			// 01- Tomar la fecha actual
			date_default_timezone_set("Asia/Vladivostok");
			$today = date("j-n-Y");
			
			// 02- Recibir los datos del form y crear la fecha
			$my_event = $_POST['my_event'];
			$my_day = $_POST['my_day'];
			$my_month = $_POST['my_month'];
			$my_year = $_POST['my_year'];

			$event_date = $my_day."-".$my_month."-".$my_year;

			echo "<h3>$my_event" . " << -_- >> ". "$event_date</h3>";
			// 03- Realizar el cálculo

			if(strtotime($event_date) <= strtotime($today)) {
				echo "<p>La fecha indicada ya pasó. No se pueden realizar cálculos</p>".
				"<p>Debe ingresar una fecha posterior a: ".$today. "</p>";
			} else {

					$remaining = strtotime($event_date) - time();
					$days_remaining = floor($remaining / 86400);
					$hours_remaining = floor(($remaining % 86400) / 3600);
					$min_remaining = floor(($remaining % 3600) / 60);
					$sec_remaining = ($remaining % 60);	

				if($days_remaining == 0){
					// echo '<p>Falta '.$result.' día para su evento.</p>'."<hr>";
					echo "Faltan solo $hours_remaining horas, $min_remaining minutos y $sec_remaining segundos para su evento.";
					
				} else if ($days_remaining ==1) {
					// echo '<p>Faltan '.$result.' días para su evento.</p>'."<hr>";
					echo "Falta $days_remaining día, $hours_remaining horas y $min_remaining minutos para su evento.";

				} else {
					echo "Faltan $days_remaining días, $hours_remaining horas y $min_remaining minutos para su evento.";

				}
				
			}

		}
		?>
            
	</section>
	<aside>
		<h2 style="text-align:center;">Ingresar evento</h2>
	<form action="index.php" method="POST">
		<input type="text" name="my_event" placeholder="Event" maxlength=32>
		<input type="number" name="my_day" min="1" max="31" placeholder="Día" required>
		<input type="number" name="my_month" min="1" max="12" placeholder="Mes" required>
		<input type="number" name="my_year" min="2021" max="2030" placeholder="Año" required>
		<input type="submit" value="Enviar">
		</form>
    
  </aside>
	<footer>
		<a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
	</footer>
 
</div>
</body>
</html>