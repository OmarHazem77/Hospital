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
        $patients = all('ahmed_patients');

    ?>

        <div class="container my-5">
            <p>
            <h1>Welcome Dr Ahmed</h1>
            </p>
            <p>
            <h3>Your Patients</h3>
            </p>
            <a href="A_diagnosis.php" class="btn btn-success mx-2 my-3">Diagnosis</a>
            <a href="logout.php" class="btn btn-danger mx-2">Logout</a>
            <a href=" A_patients.php?do=add " class="btn btn-primary">Create User</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Home Phone</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($patients as $patient) { ?>
                        <tr>
                            <th scope="row"><?= $patient['id']; ?></th>
                            <td><?= $patient['name']; ?></td>
                            <td><?= $patient['phone']; ?></td>
                            <td><?= $patient['email']; ?></td>
                            <td><?= $patient['address']; ?></td>
                            <td><?= $patient['house_number']; ?></td>
                            <td>
                                <a href="A_patients.php?do=edit&id= <?= $patient['id']; ?>" class="btn btn-primary ">Edit</a>
                                <a href="A_patients.php?do=delete&id= <?= $patient['id']; ?>" class="btn btn-danger ">Delete</a>

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

            <form action="A_patients.php?do=insert" method="post" class="col-8 shadow mx-auto p-5">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="name" placeholder="Name...">
                    <label for="floatingInput">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="phone" class="form-control" id="floatingInput" name="phone" placeholder="phone...">
                    <label for="floatingInput">Phone</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                    <label for="floatingInput">Email </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="address" placeholder="Address">
                    <label for="floatingInput">Address</label>
                </div>
                <div class="form-floating">
                    <input type="number" class="form-control" id="floatingInput" name="house_number" placeholder="House Number">
                    <label for="floatingPassword">House Number</label>
                    <div class="button text-center mt-4"><input class="btn btn-primary" type="submit" value="Submit"></div>
                </div>
            </form>

        </div>

    <?php



    } elseif ($do == "insert") {

        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $house_number = $_POST['house_number'];


        if (empty($email)) {
            $errors[] = 'email can not be empty';
        }

        if (strlen($email) < 3) {
            $errors[] = 'name can be more than 3';
        }

        if (isset($errors)) {
            echo "<div class='container my-5'>";
            foreach ($errors as $error) {
                echo "<div class= 'alert alert-danger'>" .  $error . "</div>";
            }
            header("Refresh:3;url=A_patients.php?do=add");

            echo "</div>";
        } else {
            $columns = "name, phone, email, address, house_number";
            $values = "'$name', '$phone', '$email', '$address', '$house_number'";
            insert("ahmed_patients", $columns, $values);
            header("location:A_patients.php");
        }
    } elseif ($do == "delete") {
        $id = $_GET['id'];
        delete("ahmed_patients", $id);
        header("location:A_patients.php");
    } elseif ($do == 'edit') {
        $id = $_GET['id'];
        $patient = single("ahmed_patients", $id);
        // print_r($user);
    ?>

        <div class="container my-5">
            <form action="A_patients.php?do=update" method="post" class="col-8 shadow mx-auto p-5">
                <input type="hidden" name="id" value="<?= $id ?>">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" value="<?= $patient['name'] ?>" name="name" placeholder="Name...">
                    <label for="floatingInput">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingInput" value="<?= $patient['phone'] ?>" name="phone" placeholder="Phone...">
                    <label for="floatingInput">Phone</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" value="<?= $patient['email'] ?>" name="email" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" value="<?= $patient['address'] ?>" name="address" placeholder="Address">
                    <label for="floatingInput">Address</label>
                </div>
                <div class="form-floating">
                    <input type="number" class="form-control" id="floatingPassword" value="<?= $patient['house_number'] ?>" name="house_number" placeholder="House Number">
                    <label for="floatingPassword">House Number</label>
                    <div class="button text-center mt-4">
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </div>
                </div>
            </form>
        </div>

    <?php
    } elseif ($do == 'update') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $house_number = $_POST['house_number'];
        }
        if (empty($email)) {
            $errors[] = 'email can not be empty';
        }
        if (isset($errors)) {
            echo "<div class='container my-5'>";
            foreach ($errors as $error) {
                echo "<div class= 'alert alert-danger'>" .  $error . "</div>";
            }
            header("Refresh:3;url=A_patients.php");

            echo "</div>";
        } else {


            update("ahmed_patients", " name = '$name' , phone = '$phone' , email = '$email' , address = '$address' , house_number = '$house_number' ", $id);
            header("location:A_patients.php");
        }
    }



    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>