<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Invoice</title>

    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }

    /** RTL **/
    .invoice-box.rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .invoice-box.rtl table {
        text-align: right;
    }

    .invoice-box.rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="<?= base_url('assets/image/logo.jpeg') ?>" width="150px" />
                            </td>
                            <?php foreach($barang as $a); ?>
                            <td>
                                Pesanan ke : <?php echo $a['id_pesanan'] ?>
                                <br />
                                Tanggal Pesanan : <?php echo $a['tgl_pesan'] ?>
                                <br />

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>


            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>

                            <td>
                                Pesanan Atas Nama : <?php echo $this->session->userdata('nama'); ?><br />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>Pesanan Barang</td>

                <td>Qty </td>
                <br />
                <td> </td>
                <td>Harga Satuan</td>
                <br />
                <td>Harga Total </td>
            </tr>
            <?php $jumlah = 0 ?>
            <?php foreach($barang as $a){ ?>






            <tr class="item">
                <td><?php echo $a['nama_barang'] ?></td>

                <td><?php echo $a['qty'] ?> </td>

                <td></td>

                <td>Rp.<?php echo $a['harga'] ?>-,</td>

                <td>Rp.<?php echo $harga_total = $a['qty'] * $a['harga'] ?> </td>
            </tr>
            <?php $jumlah += $harga_total?>

            <?php } ?>
            <tr class="total">

                <td></td>

                <td>Total Harga : Rp.<?php echo $jumlah ?>-, </td>

            </tr>

            <tr>
                <td> </td>

                <td>Hatta Nur Aripin </td>

            </tr>

            <tr>
                <td></td>

                <td> <img src="<?= base_url('assets/image/ttd.png'); ?>" width="150px"> </td>
            </tr>
            <tr>
                <td></td>
                <td>Pimpinan</td>
            </tr>

            <tr>
                <td></td>
                <td> <?php echo date('d-M-Y')?></td>
            </tr>
        </table>
    </div>
</body>

<script type="text/javascript">
window.print();
</script>

</html>