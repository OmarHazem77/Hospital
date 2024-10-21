<?php
include "model.php";
$patients = all('ahmed_patients');
?>

<select name="patient" id="">
    <?php
foreach($patients as $patient){
    echo "<option value='" . $patient['id'] . "'>" . $patient['name'] . "</option>";
}
?>
</select>
Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique eveniet, tempore libero in magni ratione neque molestias error vel perferendis dicta atque nihil porro, totam voluptatum? Molestiae quod nulla consequatur?


