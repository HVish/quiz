<table>
	<tr>
		<th>Question</th>
		<th>Correct Answer</th>
		<th>Wrong Answer1</th>
		<th>Wrong Answer2</th>
		<th>Wrong Answer3</th>
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
		$sql = "SELECT qid, que, op1, op2, op3, op4 FROM questions";
		$result = $db->query($sql);
		
		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "<tr>
						<td>{$row['que']}</td>
						<td>{$row['op1']}</td>
						<td>{$row['op2']}</td>
						<td>{$row['op3']}</td>
						<td>{$row['op4']}</td>
					</tr>";
		    }
		} else {
		    echo "0 results";
		}
		$db->close();
	?>
</table>