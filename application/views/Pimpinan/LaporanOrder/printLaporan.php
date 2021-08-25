<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
      <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>assets/css/components.css">
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css"> 
  <!-- https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css -->
</head>
<body>

<h1><?= $title ?></h1>
<h2><?= $subtitle ?></h2>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Nama Toko</th>
        <th>Alamat</th>
        <th>Qty</th>
        <th>Keterangan</th>
        <th>Status</th>
    </tr>
    <?php foreach ($filter as $no => $fil): ?>
    <tr>
        <td><?= $no+1 ?></td>
        <td><?= $fil->nama_produk ?></td>
        <td><?= $fil->nama_toko ?></td>
        <td><?= $fil->alamat ?></td>
        <td><?= $fil->qty ?></td>
        <td><?= $fil->keterangan ?></td>
        <td><?= $fil->status ?></td>
    </tr>
    <?php endforeach ?>
</table>



<script>
    window.print();
</script>
</body>
</html>