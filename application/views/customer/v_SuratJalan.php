<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style>
    .line-title {
        border: 0;
        border-style: inset;
        border-top: 1px solid #000;
    }

    table {
        border-collapse: collapse;
    }
    </style>
</head>

<body>
    <table style="width: 100%;">
        <tr>
            <td align="center">
                <span style="line-height: 1.6; font-weight: bold; font-size: 20;">
                    CV. Tri Kurnia
                </span>
                <span style="line-height: 1.6; font-size: 10">
                    <br>
                    Jl. Rajawali Timur Gg. Sukarela No. 143a/78 Kel. Ciroyom Kec. Andir Kota Bandung
                    <br>
                    Telp : +62 22 5430 | Fax : +62 22 5436 851 | Po. Box 123 Bks 17000
                    <br>
                    trikurnia1@gmail.com
                </span>
            </td>
        </tr>
    </table>
    <br>
    <hr class="line-title">
    <br>
    <br>
    <br>
    <h3 style="text-align : center;">Invoice</h3>
    <br>
    <br>
    <table border="1" style="width: 100%;">
        <tr>
            <th> No </th>
            <th> ID Barang </th>
            <th> Nama Barang </th>
            <th> Qty </th>
            <th> Harga </th>
        </tr>
        <?php $no = 1; foreach ($barang as $b) : ?>
        <tr>
            <td style="text-align: center;"><?php echo $no++ ?></td>
            <td style="text-align: center;"><?= $b['id_barang'] ?></td>
            <td style="text-align: center;"><?= $b['nama_barang'] ?></td>
            <td style="text-align: center;"><?= $b['qty'] ?></td>
            <td style="text-align: center;"><?= $b['harga'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br><br>
    <footer>
        <p style="text-align : right; font-size: 12; margin-right:40px;">
            Bandung, <?php echo $date;?>
        </p>
        <br><br>
        <br>
        <p style="text-align : right; font-size: 12; margin-right:75px;">
            <?php echo $user;?>
        </p>
    </footer>
</body>
<script type="text/javascript">
window.print();
</script>


</html>