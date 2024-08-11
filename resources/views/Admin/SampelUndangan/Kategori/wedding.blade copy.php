<style>
    .gallery-preview {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 10px;
    }

    .img-wrapper {
        position: relative;
        display: inline-block;
    }

    .gallery-preview img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .remove-btn {
        position: absolute;
        top: 5px;
        right: 5px;
        background-color: rgba(255, 0, 0, 0.7);
        color: white;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        padding: 2px 5px;
    }

    #error-message {
        font-size: 14px;
    }
</style>
@include('Admin.SampelUndangan.JenisFont.index')
<div class="card-body">
    <div class="tab-pane fade" id="tab-wedding-content">
        <!-- Form untuk Wedding -->
        <div id="form-wedding" class="form-category">
            <div class="form-group">
                <label for="kataSambutan">Kata Sambutan</label>
                <input type="text" class="form-control previewable" id="kataSambutan" name="kata_sambutan" required>
                <div class="preview-text">Pratinjau Kata Sambutan</div>
            </div>
            <div class="form-group">
                <label for="countDown">Count Down</label>
                <input type="date" class="form-control previewable" id="countDown" name="count_down" required>
                <div class="preview-text">Pratinjau Count Down</div>
            </div>
            {{-- FORM PENGANTIN --}}
            <strong class="center" style="font-size: 18px">Pengantin</strong>
            <div class="form-group">
                <label for="namaPengantin">Nama Panggilan Pria</label>
                <input type="text" class="form-control previewable" id="np_pria" name="np_pria" required>
                <div class="preview-text">Pratinjau Pengantin Pria</div>
            </div>
            <div class="form-group">
                <label for="namaPengantinPria">Nama Panggilan Wanita</label>
                <input type="text" class="form-control previewable" id="np_wanita" name="np_wanita" required>
                <div class="preview-text">Pratinjau Nama Pengantin Wanita</div>
            </div>
            <div class="form-group">
                <label for="namaPengantinPria">Nama Lengkap Pria</label>
                <input type="text" class="form-control previewable" id="nl_pria" name="nl_pria" required>
                <div class="preview-text">Pratinjau Nama Lengkap Pria</div>
            </div>
            <div class="form-group">
                <label for="namaPengantinPria">Nama Lengkap Wanita</label>
                <input type="text" class="form-control previewable" id="nl_wanita" name="nl_wanita" required>
                <div class="preview-text">Pratinjau Nama Pengantin Wanita</div>
            </div>
            <div class="row" style="padding: 0%">
                <div class="form-group col-md-6">
                    <label>Foto Pria</label>
                    <input type="file" class="form-control " id="foto_pria" name="foto_pria" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Foto Wanita</label>
                    <input type="file" class="form-control " id="foto_wanita" name="foto_wanita">
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="ucapan_terima_kasih"> Ucapan Terima Kasih</label>
                <input type="text" class="form-control previewable" id="ucapan_terima_kasih"
                    name="ucapan_terima_kasih" required>
                <div class="preview-text">Pratinjau Alamat</div>
            </div>
            <hr>
            {{-- END --}}
            {{-- NAMA OARANG TUA PRIA --}}
            <strong class="center" style="font-size: 18px">Orang Tua/Wali
                Mempelai
                Pria</strong>
            <div class="form-group mt-3">
                <label for="namaPengantinPria">Ayah</label>
                <input type="text" class="form-control previewable" id="ayah_pria" name="ayah_pria" required>
                <div class="preview-text">Ayah</div>
            </div>
            <div class="form-group mt-3">
                <label for="namaPengantinPria"> Ibu</label>
                <input type="text" class="form-control previewable" id="ibu_pria" name="ibu_pria" required>
                <div class="preview-text">Pratinjau Nama Ibu Pria</div>
            </div>
            <div class="form-group mt-3">
                <label for="namaPengantinPria"> Alamat</label>
                <input type="text" class="form-control previewable" id="alamat_org_tua_mp" name="alamat_org_tua_mp"
                    required>
                <div class="preview-text"></div>
            </div>
            <strong class="center" style="font-size: 18px">Orang Tua/Wali
                Mempelai
                Wanita</strong>
            <div class="form-group mt-3">
                <label for="namaPengantinPria">Ayah</label>
                <input type="text" class="form-control previewable" id="ayah_wanita" name="ayah_wanita" required>
                <div class="preview-text"></div>
            </div>
            <div class="form-group mt-3">
                <label for="namaPengantinPria"> Ibu</label>
                <input type="text" class="form-control previewable" id="ibu_wanita" name="ibu_wanita" required>
                <div class="preview-text"></div>
            </div>
            <div class="form-group mt-3">
                <label for="namaPengantinPria"> Alamat</label>
                <input type="text" class="form-control previewable" id="alamat_org_tua_mw"
                    name="alamat_org_tua_mw" required>
                <div class="preview-text">Pratinjau Alamat</div>
            </div>
            <hr>
            {{-- END --}}
            {{-- WAKTU DAN TEMPAT ACARA AKAD --}}
            <div class="row form-akad">
                <strong class="center" style="font-size: 18px">Waktu dan Lokasi Acara Akad Nikah</strong>
                <div class="form-section col-md-6">
                    <div class="form-group">
                        <label for="lokasiAcaraAkad">Lokasi Acara</label>
                        <input type="text" id="addressAkad" class="form-control previewable"
                            name="lokasi_acara_akad" required>
                    </div>
                    <div class="form-group">
                        <label for="jamMulaiAkad">Jam Mulai</label>
                        <input type="time" class="form-control previewable" id="jamMulaiAkad"
                            name="jam_mulai_akad" required>
                    </div>
                    <div class="form-group">
                        <label for="jamSelesaiAkad">Jam Selesai</label>
                        <input type="time" class="form-control previewable" id="jamSelesaiAkad"
                            name="jam_selesai_akad" required>
                    </div>
                    <input id="latitudeAkad" type="hidden" class="form-control" name="latitude_akad" required>
                    <input id="longitudeAkad" type="hidden" class="form-control" name="longitude_akad" required>
                </div>
                <div class="map-container col-md-6">
                    <div class="map" id="mapAkad"></div>
                </div>
            </div>
            {{-- END --}}

            {{-- WAKTU DAN TEMPAT ACARA RESEPSI --}}
            <div class="row form-resepsi">
                <strong class="center" style="font-size: 18px">Waktu dan Lokasi Acara Resepsi</strong>
                <div class="form-section col-md-6">
                    <div class="form-group">
                        <label for="lokasiAcaraResepsi">Lokasi Acara</label>
                        <input type="text" id="addressResepsi" class="form-control previewable"
                            name="lokasi_acara_resepsi" required>
                    </div>
                    <div class="form-group">
                        <label for="jamMulaiResepsi">Jam Mulai</label>
                        <input type="time" class="form-control " id="jamMulaiResepsi" name="jam_mulai_resepsi"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="jamSelesaiResepsi">Jam Selesai</label>
                        <input type="time" class="form-control " id="jamSelesaiResepsi"
                            name="jam_selesai_resepsi" required>
                    </div>
                    <input id="latitudeResepsi" type="hidden" class="form-control" name="latitude_resepsi"
                        required>
                    <input id="longitudeResepsi" type="hidden" class="form-control" name="longitude_resepsi"
                        required>
                </div>
                <div class="map-container col-md-6">
                    <div class="map" id="mapResepsi"></div>
                </div>
            </div>
            <hr>
            {{-- END --}}
            <strong class="center" style="font-size: 18px">Perjalanan
                Cinta</strong><br>
            <strong style="padding-left: 7%" class="center " style="font-size: 18px">Kenalan</strong>
            <div class="form-group mt-3">
                <label for="tanggal_kenalan">Tanggal </label>
                <input type="text" class="form-control" id="tanggal_kenalan" name="tanggal_kenalan" required>
            </div>
            <div class="form-group mt-3">
                <label for="deskripsi">Cerita</label>
                <textarea class="form-control " id="cerita_kenalan" name="cerita_kenalan" rows="2" required></textarea>
            </div>
            <strong style="padding-left: 7%" class="center " style="font-size: 18px">Jadian</strong>
            <div class="form-group mt-3">
                <label for="tanggal_jadian">Tanggal </label>
                <input type="text" class="form-control previewable" id="tanggal_jadian" name="tanggal_jadian"
                    required>
            </div>
            <div class="form-group mt-3">
                <label for="cerita_jadian">Cerita</label>
                <textarea class="form-control" id="cerita_jadian" name="cerita_jadian" rows="2" required></textarea>
            </div>
            <strong style="padding-left: 7%" class="center " style="font-size: 18px">Tunangan</strong>
            <div class="form-group mt-3">
                <label for="lokasiAcara">Tanggal </label>
                <input type="text" class="form-control "id="tanggal_kenalan" name="tanggal_kenalan" required>
            </div>
            <div class="form-group mt-3">
                <label for="cerita_kenalan">Cerita</label>
                <textarea class="form-control " id="cerita_kenalan" name="cerita_kenalan" rows="2" required></textarea>
            </div>
            <strong style="padding-left: 7%" class="center " style="font-size: 18px">Nikah</strong>
            <div class="form-group mt-3">
                <label for="tanggal_nikah">Tanggal </label>
                <input type="text" class="form-control " id="tanggal_nikah" name="tanggal_nikah" required>
            </div>
            <div class="form-group mt-3">
                <label for="cerita_nikah">Cerita</label>
                <textarea class="form-control previewable" id="cerita_nikah" name="cerita_nikah" rows="2" required></textarea>
            </div>
            <hr>
            <strong class="center" style="font-size: 18px">Galeri Kedua Mempelai</strong>
            <div class="form-group">
                <label for="galleryUpload">Upload Foto Galeri</label>
                <input type="file" class="form-control" id="galleryUpload" name="gallery[]" multiple>
            </div>
            <div class="gallery-preview" id="galleryPreview"></div>
            <button type="button" id="addMoreImages" class="btn btn-secondary mt-2">Tambah Foto Lain</button>
            <div id="error-message" class="text-danger mt-2"></div>
        </div>
        <input type="hidden" id="selectedFont" name="font">
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const kategori = document.getElementById('kategori');
            const fontSelect = document.getElementById('fontSelect');
            const formWedding = document.getElementById('form-wedding');
            const previewableInputs = formWedding.querySelectorAll('.previewable');
            const selectedFont = document.getElementById('selectedFont');

            function updateWeddingPreviews() {
                previewableInputs.forEach((input) => {
                    const preview = input.nextElementSibling;
                    preview.className = 'preview-text ' + fontSelect.value;
                    preview.textContent = input.value;
                });
            }

            // Update previews when font changes
            fontSelect.addEventListener('change', function() {
                selectedFont.value = fontSelect
                    .value; // Simpan jenis font yang dipilih ke input tersembunyi
                updateWeddingPreviews();
            });

            // Update previews when input changes
            previewableInputs.forEach((input) => {
                input.addEventListener('input', updateWeddingPreviews);
            });

            // Update previews on initial load
            updateWeddingPreviews();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const galleryUpload = document.getElementById('galleryUpload');
            const galleryPreview = document.getElementById('galleryPreview');
            const addMoreImagesButton = document.getElementById('addMoreImages');
            const errorMessage = document.getElementById('error-message');

            let allFiles = [];

            galleryUpload.addEventListener('change', function() {
                const files = Array.from(galleryUpload.files);

                // Check if the total number of files exceeds 9
                if (allFiles.length + files.length > 9) {
                    errorMessage.textContent = 'Jumlah foto tidak boleh lebih dari 9.';
                    return;
                } else {
                    errorMessage.textContent = ''; // Clear error message
                }

                allFiles = allFiles.concat(files);
                updatePreview();
            });

            addMoreImagesButton.addEventListener('click', function() {
                galleryUpload.click();
            });

            function updatePreview() {
                galleryPreview.innerHTML = ''; // Clear existing previews

                allFiles.forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        const imgWrapper = document.createElement('div');
                        imgWrapper.className = 'img-wrapper';

                        const imgElement = document.createElement('img');
                        imgElement.src = event.target.result;
                        imgElement.className = 'gallery-img';

                        const removeButton = document.createElement('button');
                        removeButton.className = 'remove-btn btn btn-danger';
                        removeButton.textContent = 'Hapus';
                        removeButton.addEventListener('click', function() {
                            allFiles.splice(index, 1);
                            updatePreview();
                        });

                        imgWrapper.appendChild(imgElement);
                        imgWrapper.appendChild(removeButton);
                        galleryPreview.appendChild(imgWrapper);
                    }
                    reader.readAsDataURL(file);
                });
            }
        });
    </script>
