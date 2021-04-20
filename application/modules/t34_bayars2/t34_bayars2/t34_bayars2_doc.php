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
        <h2>T34_bayars2 List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Idbayar</th>
		<th>Idtos2</th>
		<th>Jumlah</th>
		<th>Idusers</th>
		<th>Created At</th>
		<th>Updated At</th>
		
            </tr><?php
            foreach ($t34_bayars2_data as $t34_bayars2)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $t34_bayars2->idbayar ?></td>
		      <td><?php echo $t34_bayars2->idtos2 ?></td>
		      <td><?php echo $t34_bayars2->Jumlah ?></td>
		      <td><?php echo $t34_bayars2->idusers ?></td>
		      <td><?php echo $t34_bayars2->created_at ?></td>
		      <td><?php echo $t34_bayars2->updated_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>