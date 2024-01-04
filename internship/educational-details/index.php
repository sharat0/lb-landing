<?php
if (isset($_POST['save'])) {
    save();
}

function save() {
    require('../../../learnersbooth/essentials/_config.php');

    // Sanitize and validate input
    // Academic details
    $tenth_grade = mysqli_real_escape_string($conn, trim($_POST['10th_school']));
    $tenth_board = mysqli_real_escape_string($conn, trim($_POST['10th_board']));
    $tenth_percentage = mysqli_real_escape_string($conn, trim($_POST['10th_percentage']));
    $tenth_year = mysqli_real_escape_string($conn, trim($_POST['10th_year']));

    $twelfth_grade = mysqli_real_escape_string($conn, trim($_POST['12th_school']));
    $twelfth_board = mysqli_real_escape_string($conn, trim($_POST['12th_board']));
    $twelfth_percentage = mysqli_real_escape_string($conn, trim($_POST['12th_precentage']));
    $twelfth_year = mysqli_real_escape_string($conn, trim($_POST['12th_year']));

    $graduation_degree = mysqli_real_escape_string($conn, trim($_POST['graduation_degree']));
    $branch = mysqli_real_escape_string($conn, trim($_POST['branch']));
    $graduation_year = mysqli_real_escape_string($conn, trim($_POST['graduation_year']));
    $graduation_percentage = mysqli_real_escape_string($conn, trim($_POST['graduation_percentage']));

    // Insert query for intern_academic
    $academicQuery = "INSERT INTO intern_academic (tenth_school, tenth_board, tenth_percentage, tenth_year, twelfth_school, twelfth_board, twelfth_percentage, twelfth_year, graduation_degree, branch, graduation_year, graduation_percentage) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $academicQuery);
    mysqli_stmt_bind_param($stmt, "sssisssissss", $tenth_grade, $tenth_board, $tenth_percentage, $tenth_year, $twelfth_grade, $twelfth_board, $twelfth_percentage, $twelfth_year, $graduation_degree, $branch, $graduation_year, $graduation_percentage);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ./index.php?success");
    } else {
        // Log error for admin and display generic error message to user
        error_log("Database error: " . mysqli_error($conn));
        header("Location: ./index.php?error");
    }

    // Close statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/6d20788c52.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../img/fav.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../learnersbooth/style/home.css">
    <link rel="stylesheet" href="../../../learnersbooth/style/home-main.css">
    <link rel="stylesheet" href="../style.css">
    <title>Educational Details Form</title>
</head>

<body>

    <div id="content">
        <h2 class="head">Join Festive Learn Team</h2>
        <div id="form">

            <form action="" method="post" enctype="multipart/form-data">

                <div id="10th" class="form_head">10th Details</div>
                <div id="10th_form" class="form_data">
                    <span class="label"><span class="imp">* </span>10th School</span>
                    <input type="text" name="10th_school" required>
                    <br>
                    <span class="label"><span class="imp">* </span>10th Board</span>
                    <input type="text" name="10th_board" required>
                    <br>
                    <span class="label"><span class="imp">* </span>10th Percentage</span>
                    <input type="text" name="10th_percentage" required>
                    <br>
                    <span class="label"><span class="imp">* </span>10th Year</span>
                    <input type="text" name="10th_year" required>
                    <br>
                </div>

                <div id="12th" class="form_head">12th Details</div>
                <div id="12th_form" class="form_data">
                    <span class="label"><span class="imp">* </span>12th School / Institute</span>
                    <input type="text" name="12th_school" required>
                    <br>
                    <span class="label"><span class="imp">* </span>12th Board</span>
                    <input type="text" name="12th_board" required>
                    <br>
                    <span class="label"><span class="imp">* </span>12th Percentage</span>
                    <input type="text" name="12th_precentage" required>
                    <br>
                    <span class="label"><span class="imp">* </span>12th Year</span>
                    <input type="text" name="12th_year" required>
                    <br>
                </div>

                <div id="graduation" class="form_head">Graduation Details</div>
                <div id="graduation_form" class="form_data">
                    <span class="label"><span class="imp">* </span>Graduation Degree</span>
                    <input type="text" name="graduation_degree" required>
                    <br>
                    <span class="label"><span class="imp">* </span>Branch</span>
                    <input type="text" name="branch" required>
                    <br>
                    <span class="label"><span class="imp">* </span>Graduation Year</span>
                    <input type="text" name="graduation_year" required>
                    <br>
                    <span class="label"><span class="imp">* </span>Aggregate Percentage</span>
                    <input type="text" name="graduation_percentage" required>
                    <br>
                </div>

                <button type="submit" name="save" id="save" class="btn-primary">Submit</button>
            </form>

            <?php
            if (isset($_GET['success'])) {
                $success_message = htmlspecialchars($_GET['success'], ENT_QUOTES, 'UTF-8');
                echo "<div class='alert alert-success'>Data Saved Successfully !</div>";
            }

            if (isset($_GET['error'])) {
                $error_message = htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8');
                echo "<div class='alert alert-danger'>Same email or phone number already exists !</div>";
            }
            ?>


        </div>
    </div>

</body>

</html>