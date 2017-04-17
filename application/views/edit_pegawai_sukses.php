<?php 

	echo "onClick="return confirm('Data <?php echo $key->nama ?> berhasil di Update ?')"";
	echo "</br>";
	echo anchor('pegawai/update/'.$this->uri->segment(3), 'Update Data Lagi');
 ?>