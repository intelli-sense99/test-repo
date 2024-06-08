<?php

session_start();

$success_req = false;
$error_req = false;

if (isset($_SESSION['success'])) {
    $success_req = $_SESSION['success'];
    unset($_SESSION['success']);
}
if (isset($_SESSION['error'])) {
    $error_req = $_SESSION['error'];
    unset($_SESSION['error']);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>document</title>
    <style>
        #body_grad {
            background: rgb(60, 121, 37);
            background: linear-gradient(90deg, rgba(60, 121, 37, 0.9556022237996761) 33%, rgba(0, 212, 255, 1) 100%);
        }

        #child {
            /* border: 2px solid black; */
            padding: 60px;
            border-radius: 12%;

            background: rgba(196, 174, 174, 0);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(3.2px);
            -webkit-backdrop-filter: blur(3.2px);
            border: 1px solid rgba(196, 174, 174, 0.06);
        }


        /* CSS */
        #btn_cool {
            align-items: center;
            appearance: none;
            background-image: radial-gradient(100% 100% at 100% 0, #5adaff 0, #5468ff 100%);
            border: 0;
            border-radius: 6px;
            box-shadow: rgba(45, 35, 66, .4) 0 2px 4px, rgba(45, 35, 66, .3) 0 7px 13px -3px, rgba(58, 65, 111, .5) 0 -3px 0 inset;
            box-sizing: border-box;
            color: #fff;
            cursor: pointer;
            display: inline-flex;
            font-family: "JetBrains Mono", monospace;
            height: 48px;
            justify-content: center;
            line-height: 1;
            list-style: none;
            overflow: hidden;
            padding-left: 16px;
            padding-right: 16px;
            position: relative;
            text-align: left;
            text-decoration: none;
            transition: box-shadow .15s, transform .15s;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            white-space: nowrap;
            will-change: box-shadow, transform;
            font-size: 18px;
        }

        #btn_cool:focus {
            box-shadow: #3c4fe0 0 0 0 1.5px inset, rgba(45, 35, 66, .4) 0 2px 4px, rgba(45, 35, 66, .3) 0 7px 13px -3px, #3c4fe0 0 -3px 0 inset;
        }

        #btn_cool:hover {
            box-shadow: rgba(45, 35, 66, .4) 0 4px 8px, rgba(45, 35, 66, .3) 0 7px 13px -3px, #3c4fe0 0 -3px 0 inset;
            transform: translateY(-2px);
        }

        #btn_cool:active {
            box-shadow: #3c4fe0 0 3px 7px inset;
            transform: translateY(2px);
        }
    </style>
</head>

<body id="body_grad">
    <!-- success -->
    <?php if ($success_req) { ?>
        <div class=" container  alert alert-success text-center ">
            <p><?php echo $success_req; ?></p>
        </div>
    <?php } ?>
    <!-- error -->
    <?php if ($error_req) { ?>
        <?php if (is_array($error_req)) { ?>
            <div class="container alert alert-danger text-center">
                <?php foreach ($error_req as $key => $value) { ?>
                    <h4><?php echo $value;  ?></h4>
                <?php } ?>

            </div>
        <?php } else { ?>
            <div class="container alert alert-danger">
                <h4><?php echo $error_req;  ?></h4>
            </div>
        <?php } ?>
    <?php } ?>

    <div class="container vh-100 d-flex  align-items-center justify-content-center ">
        <div id="child">
            <form action="./server.php" method="POST" enctype="multipart/form-data">
                <h2 class="text-center mb-4 text-decoration-underline ">Image</h2>
                <input class="form-control form-control-lg" type="file" name="file">
                <br>
                <div class="d-flex justify-content-center ">
                    <button class="btn btn-outline-info  " type="submit" id="btn_cool">Submit</button>

                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>