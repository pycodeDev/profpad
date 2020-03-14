

<?php foreach ($join as $a): ?>
						<div class="col-lg-4 col-sm-12 col-12 d-flex flex-column ">
						<a href="" class="introduce pb-3">
							<div class="flex-column-1 ">
							<p class="pr-2 pl-3 pt-4"><?=(str_word_count($a['deskripsi']) > 28 ? substr($a['deskripsi'],0,28).".. Baca Selengkapnya" : $a['deskripsi'])?></p>
							</div>
							<div class="flex-column-2 d-flex">
							<div class="pic p1"></div>
							<div class="information  flex-column pl-3 pt-2">
								<p>Wisata : <?=$a['nama_wisata']?></p>
								<p class="text-gray">Post :<?=$a['nama']?></p>
							</div>
							</div>
							<span></span>
						</a>
						</div>
					<?php endforeach; ?>