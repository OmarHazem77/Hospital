<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
     body {
        background-color: #07735f;
    }

    h1 {
        color: #ddd;
    }

    h3 {
        color: #ddd;
    }
</style>
<body>

    <?php

    include "model.php";

    if (isset($_GET['do'])) {
        $do = $_GET['do'];
    } else {
        $do = "select";
    }

    if ($do == "select") {
        $patients = all('ali_diagnosis');

    ?>

        <div class="container my-5">
        <p>
            <h1>Welcome Dr Ali</h1>
            </p>
            <p>
            <h3>Your Diagnosiss</h3>
            </p>
            <a href="logout.php" class="btn btn-danger my-3 mx-2">Logout</a>
            <a href=" AL_diagnosis.php?do=add " class="btn btn-primary">Create Diagnosis</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Severity</th>
                        <th scope="col">General_diagnosis</th>
                        <th scope="col">Detaild_diagnosis</th>
                        <th scope="col">Action</th>

                        <!-- <th scope="col">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($patients as $patient) { ?>
                        <tr>
                            <th scope="row"><?= $patient['id']; ?></th>
                            <td><?= $patient['patient']; ?></td>
                            <td><?= $patient['severity']; ?></td>
                            <td><?= $patient['general_diagnosis']; ?></td>
                            <td><?= $patient['detailed_diagnosis']; ?></td>
                            <td>
                                <a href="AL_diagnosis.php?do=edit&id= <?= $patient['id']; ?>" class="btn btn-primary ">Edit</a>
                                <a href="AL_diagnosis.php?do=delete&id= <?= $patient['id']; ?>" class="btn btn-danger my-2">Delete</a>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    <?php


    } elseif ($do == "single") {
    } elseif ($do == "add") {
    ?>
        <div class="container my-5">

            <form action="AL_diagnosis.php?do=insert" method="post" class="col-8 shadow mx-auto p-5 " enctype="multipart/form-data">
                <div class="form-floating mb-3">
                    <p><label>Select Patient:</label></p>
                    <?php $patients = all('ali_patients');
                    ?>

                    <select name="patient" id="">
                        <?php
                        foreach ($patients as $patient) {
                            echo "<option value='" . $patient['name'] . "'>" . $patient['name'] . "</option>";
                        }
                        ?>
                    </select>

                </div>
                <div class="form-floating mb-3">
                    <p><label>Severity Level:</label></p>
                    <input type="radio" name="severity" value="1"> 1<br>
                    <input type="radio" name="severity" value="2"> 2<br>
                    <input type="radio" name="severity" value="3"> 3<br>
                    <input type="radio" name="severity" value="4"> 4<br>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="general_diagnosis" placeholder="general_diagnosis">
                    <label for="floatingInput">General_diagnosis </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="detaild_diagnosis" placeholder="detaild_diagnosis">
                    <label for="floatingInput">Detaild_diagnosis</label>
                    <div class="button text-center mt-4"><input class="btn btn-primary" type="submit" value="Submit"></div>
                </div>
                <!-- <div class="form-floating">
                    <input type="file" class="form-control" id="floatingInput" name="prescription_image" placeholder="prescription_image">
                    <label for="floatingPassword">Prescription_image</label>
                    <div class="button text-center mt-4"><input class="btn btn-primary" type="submit" value="Submit"></div>
                </div> -->
            </form>

        </div>

    <?php



    } elseif ($do == "insert") {

        $patient = $_POST['patient'];
        $severity = $_POST['severity'];
        $general_diagnosis = $_POST['general_diagnosis'];
        $detaild_diagnosis = $_POST['detaild_diagnosis'];
        // $prescription_image = $_FILES['prescription_image'];
        // $fil_p = "images/" . $prescription_image['name'];
        // move_uploaded_file($prescription_image["tmp_name"], $fil_p);

        if (empty($detaild_diagnosis)) {
            $errors[] = 'Detailed diagnosis cannot be empty';
        }

        if (strlen($detaild_diagnosis) < 3) {
            $errors[] = 'Detailed diagnosis should be more than 3 characters';
        }

        if (isset($errors)) {
            echo "<div class='container my-5'>";
            foreach ($errors as $error) {
                echo "<div class= 'alert alert-danger'>" .  $error . "</div>";
            }
            header("Refresh:3;url=AL_diagnosis.php?do=add");

            echo "</div>";
        } else {
            $columns = "patient, severity, general_diagnosis, detailed_diagnosis";
            $values = "'$patient', '$severity', '$general_diagnosis', '$detaild_diagnosis'";
            insert("ali_diagnosis", $columns, $values);
            header("location:AL_diagnosis.php");
        }
    } elseif ($do == "delete") {
        $id = $_GET['id'];
        delete("ali_diagnosis", $id);
        header("location:AL_diagnosis.php");
    } elseif ($do == 'edit') {
        $id = $_GET['id'];
        $inpatient = single("ali_diagnosis", $id);
    ?>
        <div class="container my-5">
            <form action="AL_diagnosis.php?do=update" method="post" class="col-8 shadow mx-auto p-5 " enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $id ?>">
                <div class="form-floating mb-3">
                    <p><label>Select Patient:</label></p>
                    <?php $patients = all('ali_patients'); ?>
                    <select name="patient_id" id="">
                        <?php
                        foreach ($patients as $patient) {
                            $selected = ($patient['id'] == $inpatient['patient_id']) ? 'selected' : '';
                            echo "<option value='" . $patient['name'] . "' $selected>" . $patient['name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-floating mb-3">
                    <p><label>Severity Level:</label></p>
                    <input type="radio" name="severity" value="1" <?= $inpatient['severity'] == 1 ? 'checked' : '' ?>> 1<br>
                    <input type="radio" name="severity" value="2" <?= $inpatient['severity'] == 2 ? 'checked' : '' ?>> 2<br>
                    <input type="radio" name="severity" value="3" <?= $inpatient['severity'] == 3 ? 'checked' : '' ?>> 3<br>
                    <input type="radio" name="severity" value="4" <?= $inpatient['severity'] == 4 ? 'checked' : '' ?>> 4<br>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" value="<?= $inpatient['general_diagnosis'] ?>" name="general_diagnosis" placeholder="general_diagnosis">
                    <label for="floatingInput">General Diagnosis</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" value="<?= $inpatient['detailed_diagnosis'] ?>" name="detailed_diagnosis" placeholder="detailed_diagnosis">
                    <label for="floatingInput">Detailed Diagnosis</label>
                </div>
                <div class="button text-center mt-4"><input class="btn btn-primary" type="submit" value="Submit"></div>
            </form>
        </div>
    <?php
    } elseif ($do == 'update') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $patient_id = $_POST['patient_id'];
            $severity = $_POST['severity'];
            $general_diagnosis = $_POST['general_diagnosis'];
            $detailed_diagnosis = $_POST['detailed_diagnosis'];
            
            // Validation
            $errors = [];
            if (empty($detailed_diagnosis)) {
                $errors[] = 'Detailed diagnosis cannot be empty';
            }
            if (strlen($detailed_diagnosis) < 3) {
                $errors[] = 'Detailed diagnosis should be more than 3 characters';
            }
            
            if (!empty($errors)) {
                echo "<div class='container my-5'>";
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>" . $error . "</div>";
                }
                echo "</div>";
                header("Refresh:3;url=AL_diagnosis.php?do=edit&id=$id");
            } else {
                $columns = "patient = '$patient_id', severity = '$severity', general_diagnosis = '$general_diagnosis', detailed_diagnosis = '$detailed_diagnosis'";
                update("ali_diagnosis", $columns, $id);
                header("location:AL_diagnosis.php");
            }
        }
    }
?>    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>