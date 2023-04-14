				<thead>
					<tr>
						<th>Peserta</th>
						<th>Kursus</th>
						<th>Nilai</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$querynilai = mysql_query ("SELECT nilai.kd_nilai, nilai.kd_peserta, nilai.kd_kursus, nilai, peserta.kd_peserta, peserta.nm_peserta, kursus.kd_kursus, kursus.nm_kursus FROM nilai
										INNER JOIN peserta ON nilai.kd_peserta=peserta.kd_peserta
										INNER JOIN kursus ON nilai.kd_kursus=kursus.kd_kursus WHERE nilai.kd_peserta='$_SESSION[Username]'");
						if($querynilai == false){
							die ("Terjadi Kesalahan : ". mysql_error());
						}
						while ($nilai = mysql_fetch_array ($querynilai, MYSQL_ASSOC)){

							echo "
								<tr>
									<td>$nilai[nm_peserta]</td>
									<td>$nilai[nm_kursus]</td>
									<td>$nilai[nilai]</td>
								</tr>";
						}
					?>
				</tbody>
