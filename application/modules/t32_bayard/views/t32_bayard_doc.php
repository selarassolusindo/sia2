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
        <h2>T32_bayard List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Idbayar</th>
		<th>Idtop</th>
		<th>Jumlah</th>
		<th>Idusers</th>
		<th>Created At</th>
		<th>Updated At</th>
		
            </tr><?php
            foreach ($t32_bayard_data as $t32_bayard)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $t32_bayard->idbayar ?></td>
		      <td><?php echo $t32_bayard->idtop ?></td>
		      <td><?php echo $t32_bayard->Jumlah ?></td>
		      <td><?php echo $t32_bayard->idusers ?></td>
		      <td><?php echo $t32_bayard->created_at ?></td>
		      <td><?php echo $t32_bayard->updated_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>