<?php
    include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <title>Admin</title>
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
        <link href="assets/css/table-responsive.css" rel="stylesheet">
        
        
    </head>
    <body>
    
        <section id="container">
            <header class="header black-bg">
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
                </div>
                <a href="berhasil_login.php" class="logo">
                    <b>Admin</b>
                </a>
                <div class="top-menu">
                    <ul class="nav pull-right top-menu">
                        <li>
                            <a class="logout" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </header>
            <aside>
                <div id="sidebar"  class="nav-collapse">
                    <ul class="sidebar-menu" id="nav-accordion">
                        <p class="centered">
                            <a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a>
                        </p>
                        <h5 class="centered">Admin</h5>
                        <li class="mt">
                            <a href="berhasil_login.php">
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="mt">
                            <a href="responsive_table.php">
                                <i class="fa fa-th"></i>
                                <span>Data Kosan</span>
                            </a>
                        </li>
                        <li class="mt">
                            <a class="active" href="pesan_kamar.php">
                                <i class="fa fa-th"></i>
                                <span>Info Pemesanan</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>
            <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Menghapus data kosan</h4>
                    </div>
                    <form action="delete_kosan2.php" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="delete_id" id="delete_id">
                            <p>Apakah anda yakin akan menghapus data kosan ini?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                            <a href="delete_pemesanan.php"><button type="submit" name="deletedata" class="btn btn-primary">Ya, hapus!</button></a>
                        </div>
                    </form>
                </div>
            </div>
            <section id="main-content">
                <section class="wrapper">
                    <h3><i class="fa fa-angle-right"></i>Info Pemesanan</h3>
                
                        <div class="row mt">
                            <div class="col-lg-12">
                                <div class="content-panel">
                                    <form action="simpan_data2.php" method="POST" enctype="multipart/form-data">
                                        <section id="unseen">
                                            <table class="table table-bordered table-striped table-condensed">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Nama Penyewa</th>
                                                        <th>Nama Kosan</th>
                                                        <th>Tanggal Masuk</th>
                                                        <th>NO Whatsapp</th>
                                                        <th>Email</th>
                                                        <th>Tanggal Tenggang</th>
                                                        <th cosplan="3">AKSI</th>
                                                    </tr>
                                                    <tbody>
                                                        <?php
                                                            $koneksi = mysqli_connect("localhost", "root", "", "kos");
                                                            if(mysqli_connect_errno()){
                                                                echo "Koneksi database gagal : " . mysqli_connect_error();
                                                                exit;
                                                            }
                                                            $no = 1;
                                                            $query = mysqli_query($koneksi, "SELECT * FROM pemesanan");
                                                            while($d = mysqli_fetch_array($query)){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $d["id"];?></td>
                                                            <td><?php echo $d["namapenyewa"]?></td>
                                                            <td><?php echo $d["nkosan"]?></td>
                                                            <td><?php echo $d["tanggal"]?></td>
                                                            <td><?php echo $d["no_wa"]?></td>
                                                            <td><?php echo $d["email"]?></td>
                                                            <td><?php echo $d["tenggang"]?></td>
                                                            
                                                            <td>
                                                            <a class="btn btn-sm btn-success" href="cek_masatenggang.php?cek=<?php echo $d["id"];?>">Cek Masa Tenggang</a>
                                                                <a class="btn btn-sm btn-info" href="edit_data2.php?edit=<?php echo $d["id"];?>">Edit</a>
                                                                <a class="btn btn-sm btn-danger deletebtn">Hapus</a>
                                                                
                                                            </td>
                                                        </tr>
                                                        <?php
                                                            $no++;
                                                            }
                                                        ?>
                                                    </tbody>
                                                </thead>
                                            </table>
                                            
                                        </section>
                                    </form>
                                </div>
                            </div>			
                        </div>
                </section>
            </section>
        </section>

        </section>
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="assets/js/common-scripts.js"></script>
        <script>
            $(document).ready(function(){
                $('.deletebtn').on('click', function(){
                    $('#deletemodal').modal('show');
                    $tr = $(this).closest('tr');
                    var data = $tr.children("td").map(function(){
                        return $(this).text();
                    }).get();
                    console.log(data);
                    $('#delete_id').val(data[0]);
                });
            });
        </script>
        <script>
            $("#DateCountdown").TimeCircles();
        </script>
    </body>
</html>