<html>
<head>
<title>perpustakaan digital</title>
</head>
<body>
    <br>
    <marquee><h4>Menampilkan Data dari Tabel</h4></marquee>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <label for="sel1">Kata Kunci:</label>
        <?php
        $kata_kunci="";
        if (isset($_POST['kata_kunci'])) {
            $kata_kunci=$_POST['kata_kunci'];
        }
        ?>
        <input type="text" name="kata_kunci" required/>
        <input type="submit" class="btn btn-info" value="Pilih">
    </form>

    <table border="5">
        <br>
        <thead>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Jurusan</th>
            <th>Umur</th>
        </tr>
        </thead>
        <?php

        include "koneksi.php";
        if (isset($_POST['kata_kunci'])) {
            $kata_kunci=trim($_POST['kata_kunci']);
            $sql="select * from mahasiswa where nim like '%".$kata_kunci."%' or nama like '%".$kata_kunci."%' or jurusan like '%".$kata_kunci."%' order by nim asc";

        }else {
            $sql="select * from mahasiswa order by nim asc";
        }

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nim"]; ?></td>
                <td><?php echo $data["nama"];   ?></td>
                <td><?php echo $data["jenkel"];   ?></td>
                <td><?php echo $data["tanggal_lahir"];   ?></td>
                <td><?php echo $data["jurusan"];   ?></td>
                <td><?php echo $data["umur"];   ?></td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
</body>
</html>
