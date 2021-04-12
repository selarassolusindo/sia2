<?php echo $this->session->flashdata('notif'); ?>
<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	<div class="form-group">
        <label for="userfile">Import file Excel</label>
        <input type="file" name="userfile" class="form-control-file">
	</div>
	<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	<a href="<?php echo site_url('t30_tamu') ?>" class="btn btn-secondary">Batal</a>
</form>
