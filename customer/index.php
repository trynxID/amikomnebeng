<?php
session_start();
$ses_id = $_SESSION['id'];
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
        <div class="container" style="width: 430px;">
            <div class="row mx-auto">
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
            <div class="container" style="min-height: 76vh;width: 430px;">
                <div class="row">
                    <div class="col-lg-10">
                        <section id="Home">
                            <?php
                            $sql = "";
                            if (isset($_GET['kategori'])) {
                                $kategori = $_GET['kategori'];
                                $sql = "SELECT id_event,gambar,event.nama as nama,tanggal,kategori.nama as kat FROM event JOIN kategori USING(id_kategori) where status='ready' and kategori.nama='$kategori' order by nama asc ;";
                            } else if (isset($_GET['provinsi'])) {
                                $provinsi = $_GET['provinsi'];
                                $sql = "SELECT id_event,gambar,event.nama as nama,tanggal,provinsi FROM event where status='ready' and provinsi='$provinsi' order by nama asc ;";
                            } else {
                                $sql = "SELECT id_event,gambar,event.nama as nama,tanggal,kategori.nama as kat,provinsi FROM event JOIN kategori USING(id_kategori) where status='ready' order by nama asc;";
                            }
                            $result = mysqli_query($link, $sql);
                            ?>
                            <div class="container">
                                <div class="row" text-center mb-3>
                                    <div class="col mt-3">
                                        <p>Showing event</p>
                                    </div>
                                    <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-4 mx-auto">
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row['id_event'];
                                            $result1 = mysqli_query($link, "SELECT harga from tiket where id_event = $id limit 1 ");
                                            while ($row1 = mysqli_fetch_assoc($result1)) {;
                                        ?>
                                                <div class="col pb-2">
                                                    <div class="card shadow border-0">
                                                        <img src="../assets/<?php echo $row['gambar'] ?>" class="d-block rounded" style="max-height: 130px;object-fit: cover">
                                                        <div class="card-body ">
                                                            <h6 class="mb-1" id="eventName"><?php echo $row['nama'] ?></h6>
                                                            <p class="mb-1"><?php echo $row['tanggal']; ?></p>
                                                            <h6 class="mb-1 ">
                                                                <?php
                                                                echo "Rp. ";
                                                                echo ((isset($row1['harga'])) ? number_format($row1['harga'], 0, ',', '.') : 'Gratis')
                                                                ?>
                                                            </h6>

                                                            <a href="desc.php?id_event=<?php echo $row['id_event'] ?>" class="stretched-link"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php }
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <footer class="py-3 text-center">
            <div class="container">
                <hr>
                <p>Hak Cipta &copy; 2023 Nirtics-Aplikasi Penjualan Tiket Event</p>
            </div>
        </footer>
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