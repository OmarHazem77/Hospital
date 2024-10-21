<?php



include 'model.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM doctors WHERE username like '$username' && password like '$password' ");
    $stmt->execute(array());
    $iid = $stmt->fetch();
    if ($iid["id"] == 1) {

        header("location:A_patients.php");
    } elseif ($iid["id"] == 2) {

        header("location:M_patients.php");
    } elseif ($iid["id"] == 3) {

        header("location:AL_patients.php");
    }
}

// include 'model.php';
// if ($_SERVER["REQUEST_METHOD"] == "POST") {

//     $username = $_POST['username'];
//     $password = $_POST['password'];
// $stmt = $conn->prepare("SELECT * FROM doctors WHERE username = '$username' , password = '$password' ");
// $stmt->execute();
// $count = $stmt->rowCount();
// $users = all('doctors');
// foreach ($users as $user) {
//     if ($username == "Ahmed" && $password == "AH555") {

//          header("location:A_patients.php");

//     } elseif ("Mohamed" && $password == "MO123") {

//             header("location:M_patients.php");

//     } elseif ($username == "Ali" && $password == "AL990") {

//             header("location:AL_patients.php");
//         }

// }



?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #07735f;
        }

        .login {
            background-color: #ddd;
            border-radius: 20px;
            margin: 150px;
        }

        h1 {
            /* color: #f2a172; */
            color: #07735f;
        }
    </style>
</head>

<body>

    <div class=" container my-5">
        <form method="post" class="login col-8 shadow mx-auto p-5">
            <h1 class="text-center mb-3 pb-3">Login</h1>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="username" placeholder="Name...">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
                <div class="button text-center mt-4"><input class="btn btn-success" type="submit" value="Login"></div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>