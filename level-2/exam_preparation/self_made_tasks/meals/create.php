<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

?>

<div class="container fluid padding">
<h1>Add message</h1>
    <form action="" method="post" accept-charset="utf-8">
        <div>
            <label for="name">Name </label>
            <input id="name" type="text" name="name" class="form-control">
        </div>
        <div>
            <label for="description">Description </label>
            <input id="description" type="text" name="description" class="form-control">
        </div>
        <div class="form-group">
            <label>Choose A Kitchen</label>
            <select class="form-control" name="kitchen_id">
                <option value="" selected="selected" disabled="disabled">- please choose a kitchen -</option>
				<?php
				$product = "SELECT id, name, date_created FROM meals.kitchen";
				$result = mysqli_query($connection, $product);

				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
					    // between ">" we had selected, here on the dot " .>"
						echo "<option value=" . $row['id'] . ">" . $row['name'] . " - " . $row['date_created']. "</option>";
					}
				} else {
					die('Query failed!' . mysqli_error($connection));
				}
				?>
            </select>
        </div>

        <br>
        <input type="submit" name="submit" value="Save" class="btn btn-success">
        <a href="index.php" class="btn btn-outline-dark">Go to home page</a>
        <br><br>
    </form>

<?php


if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['kitchen_id'])) {
	$name = $_POST['name'];
	$kitchen_id = $_POST['kitchen_id'];
	$description = $_POST['description'];
	$date = date('Y-m-d H:i:s');

	$insert_query = "INSERT INTO meals.meal_type (`name`, `kitchen_id`, `description`, `date_created`)  
    VALUES ('$name', $kitchen_id, '$description', '$date')";

	$result = mysqli_query($connection, $insert_query);
	if ($result) {
		echo "Successfully created record.";
	}
	else {
		exit('Insert query failed. Error: ' . mysqli_error($connection));
	}
}

echo "</div>";

include ('partials/footer.php');
