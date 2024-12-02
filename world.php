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
<br>
<br>
<table class="table table-bordered table-striped mt-4">
  <thread>
    <tr>
  
     <th>name</th>
     <th>continent</th>
     <th>independence_year</th>
     <th>head_of_state</th>

    </tr>
  </thread>
  
  <tbody>
    <?php

foreach ($filtered_country as $coun)
    {

   
   ?>

<tr>

  <td><?php echo $coun['name']; ?></td>
  <td><?php echo $coun['continent']; ?></td>
  <td><?php echo $coun['independence_year']; ?></td>
  <td><?php echo $coun['head_of_state']; ?></td>

</tr> 

   <?php
}


?>
</tbody>
</table>

<?php
?>
