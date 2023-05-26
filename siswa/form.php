<?php $data = isset($row) ? $row[0] : null; ?>
<div class="h-screen flex flex-col items-center justify-center">
    <div class="bg-white  p-4 border border-gray-200 space-y-4 ">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="nisn" class="text-sm text-gray-500">NISN</label>
                <?php if (isset($row)): ?>
                    <input type="hidden" name="id" value="<?php echo $data->id ?? '' ?>">
                <?php endif; ?>
                <input type="text" id="nisn" name="nisn" value="<?php echo $data->nisn ?? '' ?>"
                       placeholder="Masukkan NISN"
                       class="bg-white w-full placeholder:text-xs border text-xs text-gray-700 border-red-100 px-3 py-2  placeholder-text-xs">
            </div>
            <div>
                <label for="nama_siswa" class="text-sm text-gray-500">Nama Siswa</label>
                <input type="text" id="nama_siswa" value="<?php echo $data->nama_siswa ?? '' ?>" name="nama_siswa"
                       placeholder="Masukkan nama siswa"
                       class="bg-white w-full placeholder:text-xs text-xs text-gray-700 border border-red-100 px-3 py-2 ">
            </div>
            <div>
                <label for="alamat" class="text-sm text-gray-500">Alamat</label>
                <textarea id="alamat" name="alamat" placeholder="Masukkan alamat" rows="3"
                          class="bg-white w-full placeholder:text-xs text-xs text-gray-700 border border-red-100 p-2 ">
                    <?php echo $data->alamat ?? '' ?>
                </textarea>
            </div>
            <div>
                <label for="no_hp" class="text-sm text-gray-500">No Hp</label>
                <input type="text" id="no_hp" value="<?php echo $data->no_hp ?? '' ?>" name="no_hp"
                       placeholder="Masukkan nomor hp"
                       class="bg-white w-full placeholder:text-xs text-xs text-gray-700 border border-red-100 px-3 py-2 ">
            </div>
        </div>
        <div class="w-full flex justify-end">
            <button class="px-4 py-1   text-red-500 bg-red-100 text-sm border border-red-200">Simpan</button>
        </div>
    </div>
</div>