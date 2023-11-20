<?php
session_start();
$ses_id = $_SESSION['id'];
$point;
if (!empty($_SESSION['status'])) {
    include "../lib/koneksi.php";
?>
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
        <?php
        include "../lib/koneksi.php";
        ?>
        <div class="container m-0 p-0" style="width:460px" id="index">
            <header>
                <nav class="navbar navbar-expand-md navbar-dark">
                    <div class="container-fluid">
                        <p class="mt-3">
                            <span style="color: #432C7A">Amikom</span>
                            <span style="color: #F79332">Nebeng</span>
                        </p>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <img src="../assets/default.png" alt="" width="32" height="32" class="rounded-circle me-2" style="background-color: white;">
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" aria-selected="true" href="index.php"></a>
                                </li>
                                <li>
                                    <a class="nav-link" href="applyDriver.php" aria-selected="false">Daftar Mitra</a>
                                </li>
                                <li>
                                    <a class="nav-link" href="../logout.php" aria-selected="false">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <div class="row mx-auto mt-3">
                <div class="container" style="min-height: 76vh">
                    <div class="row">
                        <div class="col">
                            <form class="row" action="actLogin.php" method="POST">
                                <div class="text-center mb-4">
                                    <h5 class="my-0">Cari Tumpangan</h5>
                                </div>
                                <span class="error">
                                    <?php if (isset($_GET['pesan'])) echo
                                    '<div class="alert alert-danger text-center" role="alert">Driver tidak tersedia :(</div>'; ?>
                                </span>
                                <label for="tujuan" class="form-label">Tujuan</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" id="tujuan" name="Tujuan" placeholder="Masukkan Tujuan Anda" required oninvalid="this.setCustomValidity('Please Enter Email!')" oninput="this.setCustomValidity('')" />
                                </div>
                                <div class="col-3">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </form>
                        </div>
                        <?php
                        if (isset($point)) {
                            $sql = "SELECT * FROM nebenglist where tujuan=$point;";
                            $result = mysqli_query($link, $sql);
                        ?>
                            <div class="col mt-3">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="text-white" style="background-color: #021780;">Tujuan</th>
                                            <th class="text-white" style="background-color: #021780;">Waktu</th>
                                            <th class="text-white" style="background-color: #021780;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                            <tr>
                                                <td><?php echo $row['tujuan']; ?></td>
                                                <td class="text-center"><?php echo $row['waktu'] ?></td>
                                                <td class="mx-0 px-0 text-center">
                                                    <a href="paymentEdit.php?id_metode=<?php echo $row['id_metode']; ?>" class="btn btn-warning">Select</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } else {
                        } ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
<?php
} else {
    header('Location: ../login.php');
}
?>