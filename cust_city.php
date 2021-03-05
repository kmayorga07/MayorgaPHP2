<?php

//use require once to call database file
require_once('database.php');

//get data from index page
$city = filter_input(INPUT_POST, 'city',
        FILTER_SANITIZE_SPECIAL_CHARS);
if ($city == NULL || $city == FALSE) {
    $city = 1;
}

//get names from city category
$queryCategory = 'SELECT * FROM customers
                  WHERE city = :city';
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':city', $city);
$statement1->execute();
?>


<!DOCTYPE html>
<html>
    <head>
        <title>The Mayorga Customer Search Engine</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>

    <body>
        <main>
            <h1>The Results</h1>

            <section>
                <!-- display a table of products -->
                <h2><php echo $customers_name; ?></h2>
                <table>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip</th>
                    </tr>

						<?php foreach ($statement1 as $customer) { ?>
                        <tr>
                            <td><?php echo $customer['custid']; ?></td>
                            <td><?php echo $customer['name']; ?></td>
                            <td class="right"><?php echo $customer['city']; ?></td>
                            <td><?php echo $customer['state']; ?>

                            </td>
                            <td><?php echo $customer['zip']; ?>

                            </td>

                        </tr>
						<?php } ?>
                </table>
            </section>
        </main>
    </body>
</html>