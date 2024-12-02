<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = isset($_GET["country"])? $_GET["country"]: '';

$lowercase = strtolower($query);

$filtered_country= array_filter($results, function($item) use ($lowercase){
  return strpos((strtolower($item['name'])), $lowercase) !==false;
});

?>

<table class="table table-bordered table-striped mt-4">
  <thread>
    <tr>
     <th>code</th>
     <th>name</th>
     <th>continent</th>
     <th>region</th>
     <th>surface_area</th>
     <th>independence_year</th>
     <th>population</th>
     <th>life_expectancy</th>
     <th>gnp</th>
     <th>gnp_old</th>
     <th>local_name</th>
     <th>government_form</th>
     <th>head_of_state</th>
     <th>capital</th>
     <th>code2</th>
    </tr>
  </thread>
  
  <tbody>
    <?php

foreach ($filtered_country as $coun)
    {

   
   ?>

<tr>
  <td><?php echo $coun['code']; ?></td>
  <td><?php echo $coun['name']; ?></td>
  <td><?php echo $coun['continent']; ?></td>
  <td><?php echo $coun['region']; ?></td>
  <td><?php echo $coun['surface_area']; ?></td>
  <td><?php echo $coun['independence_year']; ?></td>
  <td><?php echo $coun['population']; ?></td>
  <td><?php echo $coun['life_expectancy']; ?></td>
  <td><?php echo $coun['gnp']; ?></td>
  <td><?php echo $coun['gnp_old']; ?></td>
  <td><?php echo $coun['local_name']; ?></td>
  <td><?php echo $coun['government_form']; ?></td>
  <td><?php echo $coun['head_of_state']; ?></td>
  <td><?php echo $coun['capital']; ?></td>
  <td><?php echo $coun['code2']; ?></td>
</tr> 

   <?php
}


?>
</tbody>
</table>

<?php
?>

