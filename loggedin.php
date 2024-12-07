<?php
session_start();
if (!isset($_SESSION["session-create"])) {
    header("location:index.php");
}

if (isset($_POST["submitted"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $emailNan = "/^[a-z0-9]+@[a-z]+\.[a-z]{2,4}/";

    $filename = $_FILES["my-file"]["name"];
    $temp = $_FILES["my-file"]["tmp_name"];
    $size = $_FILES["my-file"]["size"];
    $inarray = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $typecheck = (in_array($inarray, ["jpg", "webp"]));
    $kb = 100 * 1024;
    $img = "img/";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 16px;
            color: #555;
        }

        input[type="text"],
        input[type="file"] {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .alert {
            color: red;
            font-weight: bold;
            text-align: center;
            margin-top: 10px;
        }

        a {
            text-decoration: none;
            color: #f44336;
            text-align: center;
            font-weight: bold;
            display: block;
            margin-top: 20px;
        }

        a:hover {
            text-decoration: underline;
        }

        .uploaded-image {
            display: block;
            margin-top: 20px;
            text-align: center;
        }

        .uploaded-image img {
            width: 200px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Upload Your Data</h2>
        <form action="" enctype="multipart/form-data" method="post">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Enter your name" required><br>

            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Enter your email" required><br>

            <label for="my-file">Upload Picture</label>
            <input type="file" name="my-file" accept="image/*"><br><br>

            <input type="submit" value="Submit" name="submitted">
        </form>

        <a href="logout.php">Logout</a>

        <?php
        if (isset($_POST["submitted"])) {
            // Email validation
            if (!(preg_match($emailNan, $email))) {
                echo "<div class='alert'>Email is invalid.</div>";
            } 

            // Image check
            if (!empty($filename)) {
                if ($size > $kb) {
                    echo "<div class='alert'>Image must be smaller than 100KB.</div>";
                } else if ($typecheck) {
                    move_uploaded_file($temp, "$img$filename");

                    echo "<div>Name: $name<br> Email: $email  </div><br>";
                    echo "<div class='uploaded-image'>
                        <img src='$img$filename' alt='Uploaded Image'>
                    </div>";
                } else {
                    echo "<div class='alert'>Invalid file type. Only JPG and WebP images are allowed.</div>";
                }
            } else {
                echo "<div class='alert'>Please upload a file.</div>";
            }
        }
        ?>
    </div>
</body>

</html>
