<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="css/gunpla.css">
		<title>Mechanic</title>
		<body>
			<table>
				<tr>
					<th>id</th>
					<th>mid</th>
					<th>grade</th>
					<th>date</th>
					<th>price</th>
					<th>title</th>
					<th>boxart</th>
				</tr>
				<?php
					// Data Source Name
					$dsn = 'mysql:host=localhost;port=3306;dbname=gunpladb;charset=utf8';
					try {
						$dbc = new PDO($dsn, 'root', 'mysql1234');
						$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
						$query = 'select * from gunpla';
						//$query = 'select * from gunpla where grade = :grade';
						$stmt = $dbc->prepare($query);
						// $grade = 'SD';
						// $stmt->bindParam(':grade', $grade, PDO::PARAM_STR);
						$stmt->execute();
						$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
						foreach ($result as $row) {
							echo '<tr class="gunpla">';
							echo '<td>' . $row['id'] . '</td>';
							echo '<td>' . $row['mechanic_id'] . '</td>';
							echo '<td>' . $row['grade'] . '</td>';
							echo '<td>' . $row['date'] . '</td>';
							echo '<td>' . $row['price'] . '</td>';
							echo '<td>' . $row['title'] . '</td>';
							echo '<td><img class="boxart" src="' .$row['boxart'] . '"/></td>';
							echo '</tr>';
						}
						
						$stmt->closeCursor();
					} catch (PDOException $e) {
						echo 'Error: ' . $e->getMessage();
					}
					
					$dbc = null;
				?>			
			</table>
		</body>
	</head>
</html>