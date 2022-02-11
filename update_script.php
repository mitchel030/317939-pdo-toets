<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pdo_toets";

try
	{
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "UPDATE pizza
          SET    bodemformaat = :bodemformaat,
                 saus = :saus,
                 pizzatoppings = :pizzatoppings,
                 kruiden = :kruiden
          WHERE  id = :id";

			$stmt = $conn->prepare($sql);

			$stmt->bindParam(':bodemformaat', $bodemformaat);
			$stmt->bindParam(':saus', $saus);
			$stmt->bindParam(':pizzatoppings', $pizzatoppings);
			$stmt->bindParam(':kruiden', $kruiden);
			$stmt->bindParam(':id', $id);

			$bodemformaat = $_POST["bodemformaat"];
			$saus = $_POST["saus"];
			$pizzatoppings = $_POST["pizzatoppings"];
			$kruiden = $_POST["kruiden"];
			$id = $_POST['id'];

			$stmt->execute();

			echo "Record met id={$id} is gewijzigd";
			header('Refresh:2; ./read.php');
	}
catch(PDOException $e)
	{
			echo $sql . "<br>" . $e->getMessage();
	}

$conn = null;
?>

