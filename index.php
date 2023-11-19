<!DOCTYPE html>
<html>

<head>
    <title>Amikom Nebeng</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="assets/amikom.png">
</head>
<style>
    body {
        background-color: #ffffff;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: "Lato", sans-serif;
        position: absolute-center;
    }

    h5 {
        font-weight: bold;
        color: #432c7a;
    }

    .btn {
        background-color: #432c7a;
        color: white;
        display: block !important;
        height: 50px;
        font-weight: bold;
        font-size: large;
        border: 2px solid;
        transition: border-color 0.3s;
    }

    .btn:hover {
        border-color: #432C7A;
    }

    .text-center #instruksi {
        color: #7e7692;
        font-weight: 300;
        font-size: medium;
    }

    p {
        font-size: x-large;
    }

    a {
        text-decoration: none;
    }

    input {
        color: #432c7a !important;
    }

    .form-label {
        color: #b5adc7;
    }

    .form-control {
        background-color: #f1ebff;
    }
</style>

<body>
    <div class="container" style="width: 430px;">
        <div class="row mx-auto">
            <div class="text-center ">
                <img src="assets/amikom.png" width="150">
                <p class="mt-3">
                    <span style="color: #432C7A;font-weight: bold">Amikom</span>
                    <span style="color: #F79332;font-weight: bold">Nebeng</span>
                </p>
            </div>
            <div class="mt-2"></div>
            <form action="actLogin.php" method="POST">
                <div class="mb-3">
                    <div class="text-center mb-2">
                        <h5 class="my-0">Welcome To Amikom Nebeng</h5>
                        <p id="instruksi">Gunakan Email Amikom Anda</p>
                    </div>
                    <span class="error">
                        <?php if (isset($_GET['pesan'])) echo
                        '<div class="alert alert-danger text-center" role="alert">Username or Email Invalid! </div>'; ?>
                    </span>
                    <label for="username" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" required oninvalid="this.setCustomValidity('Please Enter Email!')" oninput="this.setCustomValidity('')" />
                </div>
                <div class="my-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required oninvalid="this.setCustomValidity('Please Enter Password!')" oninput="this.setCustomValidity('')" />
                </div>
                <button type="submit" class="btn w-100 mt-4">Login</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>