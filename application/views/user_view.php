<!DOCTYPE html>
<html>
<head>
	<title>User View</title>
</head>
<body>

	<h1><?php
			
			// echo $result;

			foreach ($result as $results) {
			echo $results->id . "  -  ";
			echo $results->username . "  -  ";
			echo $results->password;
			echo "<br>";

		}

	?></h1>

</body>
</html>