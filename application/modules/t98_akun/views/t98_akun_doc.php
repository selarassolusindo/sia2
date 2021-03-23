<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>T98_akun List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode</th>
		<th>Nama</th>
		<th>Induk</th>
		<th>Urut</th>
		<th>Idusers</th>
		<th>Created At</th>
		<th>Updated At</th>
		
            </tr><?php
            foreach ($t98_akun_data as $t98_akun)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $t98_akun->Kode ?></td>
		      <td><?php echo $t98_akun->Nama ?></td>
		      <td><?php echo $t98_akun->Induk ?></td>
		      <td><?php echo $t98_akun->Urut ?></td>
		      <td><?php echo $t98_akun->idusers ?></td>
		      <td><?php echo $t98_akun->created_at ?></td>
		      <td><?php echo $t98_akun->updated_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>