<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amikom Nebeng</title>
    <link rel="icon" type="image/x-icon" href="../assets/amikom.png">
    <link rel="stylesheet" href="layout/stylesheet.css" type="text/css" />
    <link rel="stylesheet" link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark shadow">
        <div class="container">
            <a class="navbar-brand col-ms-3" href="index.php">
                <img src="../assets/logo.png" width="130" height="30">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" aria-selected="true" href="index.php">Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mytiket.php" aria-selected="false">My Ticket</a>
                    </li>
                    <li class="nav-item my-auto">
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="avatar" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../assets/<?php echo $data['foto'] ?>" alt="" width="32" height="32" class="rounded-circle me-2">
                                <?php echo $data['fullname'] ?>
                            </a>
                            <ul class="dropdown-menu text-small shadow" aria-labelledby="avatar">
                                <li><a class="dropdown-item" href="myprofile.php">My Profile</a></li>
                                <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </div>