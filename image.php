<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <div align="center">
        <?php
            if (isset($_POST['add'])) {
                $prescription_image = $_FILES['prescription_image'];
                $fil_p = "images/" . $prescription_image['name'];
                move_uploaded_file($prescription_image["tmp_name"], $fil_p);

                ?>
                <img src="images/<?php echo $prescription_image["name"]; ?>" alt="">
                <?php

                echo $_POST['dd'];
            }
        ?>

        <br><br>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="image"><br>
            <input type="text" name="dd"><br>
            <input type="submit" name="add" value="add">
        </form>
    </div>
</body>
</html>
