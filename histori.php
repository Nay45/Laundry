<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori Page</title>
    <link rel="stylesheet" href="css/histori.css">
</head>
<body>
    <?php
        include "header.php";
    ?>
    <div class="main_content">
        <div class="header">Tabel Histori</div>
        <div class="info">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Member</th>
                        <th>Nama User</th>
                        <th>Paket Laundry - Qty - Harga</th>
                        <th>Total Harga</th>

                        <!-- Status Bayar = blm lunas >> batas waktu || Status Bayar = lunas >> tanggal bayar -->
                        <!-- <?php
                        include "koneksi.php";
                        $qry_histori = mysqli_query($conn, "select * from transaksi order by id_transaksi desc");
                        $dt_histori = mysqli_fetch_array($qry_histori);
                        if ($dt_histori['status_bayar'] == 'belum_lunas') {
                        ?>
                        <th>Batas Waktu</th>
                        <?php
                        } elseif ($dt_histori['status_bayar'] == 'lunas') {
                        ?>
                        <th>Tanggal Bayar</th>
                        <?php
                        }
                        ?> -->

                        <th>Status Bayar</th>
                        <th>Status Paket</th>
                        <th>Aksi</th>
                        <th>Nota</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "koneksi.php";
                        $qry_histori = mysqli_query($conn, "select transaksi.*, member.nama as nama_member, user.nama as nama_user 
                                                            from transaksi 
                                                            join user ON user.id_user = transaksi.id_user 
                                                            join member ON member.id_member = transaksi.id_member
                                                            order by id_transaksi desc");
                        $no = 0;

                        while ($dt_histori = mysqli_fetch_array($qry_histori)) {
                            $total = 0;

                            $no++;
                            $paket_dibeli = "<ol>";
                            $qry_paket = mysqli_query($conn,"select * from  detail_transaksi join paket on paket.id_paket=detail_transaksi.id_paket where id_transaksi = ".$dt_histori['id_transaksi']);
                            while($dt_paket=mysqli_fetch_array($qry_paket)){ //perulangan untuk menampilkan detail transaksi dan subtotalnmya
                                $subtotal = 0;
                                $subtotal += $dt_paket['harga'] * $dt_paket['qty'];
                                $paket_dibeli .= "<li class = 'paket'>".$dt_paket['nama_paket']."&nbsp;&nbsp;-&nbsp;&nbsp;".$dt_paket['qty']."&nbsp;&nbsp;-&nbsp;&nbsp;"."Rp. ".number_format($subtotal, 2, ',', '.').""."</li>";
                                $total += $dt_paket['harga'] * $dt_paket['qty'];
                            }
                            $paket_dibeli.="</ol>";
                    ?>
                    <tr>
                        <td><?=$no?></td>
                        <td><?=$dt_histori['nama_member']?></td>
                        <td><?=$dt_histori['nama_user']?></td>
                        <td><?=$paket_dibeli?></td>
                        <td>
                            <?php
                            echo "Rp. ".number_format($total, 2, ',', '.')."";
                        ?>
                        </td>

                        <!-- Status Bayar = blm lunas >> batas waktu || Status Bayar = lunas >> tanggal bayar -->
                        <!-- <?php
                        if ($dt_histori['status_bayar'] == 'belum_lunas') {
                        ?>
                        <td><?=$dt_histori['batas_waktu']?></td>
                        <?php
                        } elseif ($dt_histori['status_bayar'] == 'lunas') {
                        ?>
                        <td><?=$dt_histori['tgl_bayar']?></td>
                        <?php
                        }
                        ?> -->

                        <td><?=$dt_histori['status_bayar']?></td>
                        <td><?=$dt_histori['status_order']?></td>
                        <td>
                            <?php
                            if ($dt_histori['status_bayar'] == "belum lunas") {
                            ?>
                            <a href="ubah_status.php?id_transaksi=<?=$dt_histori['id_transaksi']?>"><button>Lunas</button></a> | 
                            <?php
                            } else {
                            ?>
                            <a href="#"><button class = "done">✔</button></a> | 
                            <?php
                            }
                            ?>
                            <?php
                            if ($dt_histori['status_order'] == "baru") {
                            ?>
                            <a href="ubah_status_paket.php?id_transaksi=<?=$dt_histori['id_transaksi']?>&status_order=diproses"><button>Diproses</button></a>
                            <?php
                            } elseif ($dt_histori['status_order'] == "diproses") {
                            ?>
                            <a href="ubah_status_paket.php?id_transaksi=<?=$dt_histori['id_transaksi']?>&status_order=selesai"><button>Selesai</button></a>
                            <?php
                            } elseif ($dt_histori['status_order'] == "selesai") {
                            ?>
                            <a href="ubah_status_paket.php?id_transaksi=<?=$dt_histori['id_transaksi']?>&status_order=diambil"><button>Diambil</button></a>
                            <?php
                            } elseif ($dt_histori['status_order'] == "diambil") {
                            ?>
                            <a href="#"><button class = "done">✔</button></a>
                            <?php
                            }
                            ?>
                        </td>
                        <?php
                        if ($dt_histori['status_bayar'] == "lunas" and $dt_histori['status_order'] == "diambil") {
                        ?>
                        <td><a href="nota.php?id_transaksi=<?=$dt_histori['id_transaksi']?>"><button>✔</button></a></td>
                        <?php
                        } else {
                        ?>
                        <td><button>❌</button></td>
                        <?php
                            }
                        ?>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            <a href="hapus_histori.php" onclick = "return confirm('Yakin menghapus seluruh histori?');"><button>Hapus Seluruh Histori</button></a>
        </div>
    </div>
</body>
</html>