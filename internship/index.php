<?php
if (isset($_POST['save'])) {
    save();
}

function save()
{
    require('../essentials/_config.php');

    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $line1 = $_POST['line1'];
    $line2 = $_POST['line2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pin = $_POST['pin'];
    $country = $_POST['country'];

    // Get IP address of the user
    $ip_address = $_SERVER['REMOTE_ADDR'];

    // Get current date and time
    $date_time = date('Y-m-d H:i:s');

    // Insert data into the internship_basic table
    $query = "INSERT INTO internship_basic (name, email, phone, dob, gender, line1, line2, city, state, pin, country, ip_address, date_time)
              VALUES ('$name', '$email', '$phone', '$dob', '$gender', '$line1', '$line2', '$city', '$state', '$pin', '$country', '$ip_address', '$date_time')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: ./index.php?error=Data saved successfully");
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <script src="https://kit.fontawesome.com/6d20788c52.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../img/fav.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="../../learnersbooth/style/home.css">
    <link rel="stylesheet" href="../../learnersbooth/style/home-main.css">
    <link rel="stylesheet" href="style.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

    <title>Add Student | Learners Booth</title>

    <Style>
        #content {
            width: 100%;
            margin: 0;
            padding-bottom: 10%;
        }

        .label {
            margin-top: 0;
        }

        .address-flex {
            padding: 0 12%;
        }

        .box {
            width: 50%;
        }

        #form {
            background: rgba(255, 255, 255, 0.35);
            border: 1px solid rgba(255, 255, 255, 0.175);
            position: relative;
            z-index: 999;
        }


        .blob {
            position: absolute;
            top: 0;
            left: 0;
            fill: #6ba9ff;
            width: 30vmax;
            z-index: 1;
            animation: move 10s ease-in-out infinite;
            transform-origin: 50% 50%;
        }


        @keyframes move {
            0% {
                transform: scale(1) translate(10px, -30px);
            }

            38% {
                transform: scale(0.8, 1) translate(80vw, 30vh) rotate(160deg);
            }

            40% {
                transform: scale(0.8, 1) translate(80vw, 30vh) rotate(160deg);
            }

            78% {
                transform: scale(1.3) translate(0vw, 50vh) rotate(-20deg);
            }

            80% {
                transform: scale(1.3) translate(0vw, 50vh) rotate(-20deg);
            }

            100% {
                transform: scale(1) translate(10px, -30px);
            }
        }

        .animated {
            position: absolute;
            bottom: 0;
            right: 0;
            /* position: relative; */
            height: 50%;
            width: 50%;
            z-index: 3;
        }

        .alert {
            position: relative;
        }
        input,select{
            height: 30px;
            padding: 5px;
        }
    </Style>
</head>

<body>
    <div class="main">

        <div class="blob">
            <!-- This SVG is from https://codepen.io/Ali_Farooq_/pen/gKOJqx -->
            <svg xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 310 350">
                <path d="M156.4,339.5c31.8-2.5,59.4-26.8,80.2-48.5c28.3-29.5,40.5-47,56.1-85.1c14-34.3,20.7-75.6,2.3-111  c-18.1-34.8-55.7-58-90.4-72.3c-11.7-4.8-24.1-8.8-36.8-11.5l-0.9-0.9l-0.6,0.6c-27.7-5.8-56.6-6-82.4,3c-38.8,13.6-64,48.8-66.8,90.3c-3,43.9,17.8,88.3,33.7,128.8c5.3,13.5,10.4,27.1,14.9,40.9C77.5,309.9,111,343,156.4,339.5z" />
            </svg>
        </div>

        <!-- NAV BAR ENDS -->

        <div id="content">
            <h2 class="head">Join Festive Learn Team</h2>
            <div id="form">

                <form action="" method="post" enctype="multipart/form-data">
                    <span id="basic" class="form_head">Basic Details</span>
                    <div id="basic_form" class="form_data">

                        <span class="label"><span class="imp">* </span>Name</span>
                        <input type="text" name="name" required>
                        <br>
                        <span class="label"><span class="imp">* </span>Email</span>
                        <input type="email" name="email" required>
                        <br>
                        <span class="label"><span class="imp">* </span>Phone</span>
                        <input type="text" name="phone" required>
                        <br>
                        <span class="label"><span class="imp">* </span>DOB</span>
                        <input type="date" name="dob" required>
                        <br>
                        <span class="label"><span class="imp">* </span>Gender</span>
                        <select name="gender" id="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        <br>
                        <span class="label">Permanent Address</span>
                        <input type="text" name="line1" id="name" placeholder="Address Line 1">
                        <br>
                        <input type="text" name="line2" id="name" placeholder="Address Line 2">
                        <br>
                        <div class="flex address-flex">
                            <div class="box">
                                <input type="text" name="city" id="name" placeholder="City">
                            </div>
                            <div class="box">
                                <input type="text" name="state" id="name" placeholder="State">
                                <br>
                            </div>
                        </div>
                        <div class="flex address-flex">
                            <div class="box">
                                <input type="text" name="pin" id="name" placeholder="Pin Code">
                            </div>
                            <div class="box">
                                <input type="text" name="country" id="name" placeholder="Country">

                            </div>
                        </div>
                        <button type="submit" name="save" id="save" class="btn-primary">Next</button>
                    </div>
                </form>
                <?php if (isset($_GET['error'])) { ?>

                    <div class="alert alert-success" role="alert">
                        <?php echo $_GET['error']; ?></p>
                    </div>

                <?php } ?>

            </div>


        </div>
    </div>

</body>

</html>