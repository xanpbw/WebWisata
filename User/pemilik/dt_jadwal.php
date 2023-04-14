				<thead>
					<tr>
						<th>Kursus</th>
						<th>Pengajar</th>
						<th>Ruangan</th>
						<th>Hari</th>
						<th>Jam</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$querypeserta = mysql_query( "SELECT peserta.kd_kursus, kursus.kd_kursus, kursus.nm_kursus FROM peserta INNER JOIN kursus ON peserta.kd_kursus=kursus.kd_kursus WHERE kd_peserta='$_SESSION[Username]'");
						if($querypeserta == false){
							die("Terdapat Kesalahan : ". mysql_error());
						}
						while ($peserta = mysql_fetch_array($querypeserta, MYSQL_ASSOC)){

							$queryjadwal = mysql_query ("SELECT kd_jadwal, jadwal.kd_kursus, jadwal.kd_ruangan, hari, jam, kursus.kd_kursus, kursus.nm_kursus, pengajar.kd_pengajar, pengajar.nm_pengajar, ruangan.kd_ruangan, ruangan.nm_ruangan, kursus.kd_kursus, kursus.nm_kursus FROM jadwal
								INNER JOIN kursus ON jadwal.kd_kursus=kursus.kd_kursus
								INNER JOIN pengajar ON jadwal.kd_pengajar=pengajar.kd_pengajar
								INNER JOIN ruangan ON jadwal.kd_ruangan=ruangan.kd_ruangan
								WHERE kursus.kd_kursus='$peserta[kd_kursus]'");
							if($queryjadwal == false){
								die ("Terjadi Kesalahan : ". mysql_error());
							}
							while ($jadwal = mysql_fetch_array ($queryjadwal, MYSQL_ASSOC)){

								echo "
									<tr>
										<td>$jadwal[nm_kursus]</td>
										<td>$jadwal[nm_pengajar]</td>
										<td>$jadwal[nm_ruangan]</td>
										<td>$jadwal[hari]</td>
										<td>$jadwal[jam]</td>
									</tr>";
							}

						}


					?>
				</tbody>
