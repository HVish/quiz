<table>
	<tr>
		<th>Rank</th>
		<th>Name of Student</th>
		<th>Positive Marks</th>
		<th>Negative Marks</th>
		<th>Total</th>
		<th>Result</th>
	</tr>
	<?php
		$sname = "localhost";
		$sqluser = "root";
		$sqlpasswd = "";
		
		// Create connection
		$db = new mysqli($sname, $sqluser, $sqlpasswd,'QuizBitz');
		
		// Check connection
		if ($db->connect_error) {
		    die("Connection failed: " . $db->connect_error);
		} 	
		$sql = "SELECT st_name, positive, negative, total, remarks FROM results ORDER BY total DESC";
		$result = $db->query($sql);
		
		if ($result->num_rows > 0) {
		    // output data of each row
			$rank = 1;
		    while($row = $result->fetch_assoc()) {
		        echo "<tr>
						<td>{$rank}</td>
						<td>{$row['st_name']}</td>
						<td>{$row['positive']}</td>
						<td>{$row['negative']}</td>
						<td>{$row['total']}</td>
						<td>{$row['remarks']}</td>
					</tr>";
					$rank++;
		    }
		} else {
		    echo "0 results";
		}
		$db->close();
	?>
</table>