# Tugas 1 IF3110 Pengembangan Aplikasi Berbasis Web

Membuat Website tanya jawab seperti Stack Exchange.

**Luangkan waktu untuk membaca spek ini sampai selesai. Kerjakan hal yang perlu saja.**

## Anggota Tim

Tugas dikerjakan secara individu.

## Petunjuk Pengerjaan

1. Fork pada repository ini dengan akun github anda.
2. Silakan commit pada repository anda (hasil fork). Lakukan berberapa commit dengan pesan yang bermakna, contoh: `fix css`, `create post done`, jangan seperti `final`, `benerin dikit`. Disarankan untuk tidak melakukan commit dengan perubahan yang besar karena akan mempengaruhi penilaian (contoh: hanya melakukan satu commit kemudian dikumpulkan). 
3. Ubah **Penjelasan Teknis** pada bagian bawah readme.md ini dengan menjelaskan bagaimana cara anda:
   - Melakukan validasi pada client-side
   - Melakukan AJAX (mulai dari pengguna melakukan klik pada tombol vote sampai angka vote berubah).
4. Pull request dari repository anda ke repository ini dengan format **NIM** - **Nama Lengkap** sebelum **Jumat, 16 Oktober 2015 23.59**.

## Tools

1. Untuk backend, wajib menggunakan **PHP** tanpa framework apapun.
2. Gunakan **MySQL** atau basis data relasional lain untuk menyimpan data.
3. Untuk frontend, gunakan Javascript, HTML dan CSS. **Tidak boleh** menggunakan library atau framework CSS atau JS seperti JQuery atau Bootstrap. CSS sebisa mungkin ada di file yang berbeda dengan PHP (tidak inline styling).

## Spesifikasi

### Tampilan

Anda diminta untuk membuat tampilan sedemikian hingga mirip dengan tampilan berikut. Website yang diminta tidak harus responsive. Desain tampilan tidak perlu dibuat indah. Icon dan jenis font tidak harus sama dengan contoh. Warna font, garis pemisah, dan perbedaan ukuran font harus terlihat sesuai contoh. Perhatikan juga **tata letak** elemen-elemen.

![](mocks/list.jpg)
- Search bar diletakkan di bagian paling atas setelah judul.
- Tombol "search" berada di sebelah kanan search bar.
- **Ask here** digunakan untuk mengajukan pertanyaan baru.
- Tampilan search bar ini harus tetap ada walaupun anda tidak mengimplementasikan fitur search.
- Tampilan pertanyaan tidak harus urut berdasarkan "recently asked question", namun tulisan recently ini harus ada.
- Pada bagian item pertanyaan, terdapat judul pertanyaan (question topic). Tambahkan juga isi pertanyaan sesuai spesifikasi "list pertanyaan" (walaupun digambar tidak ada).

![](mocks/create.jpg)
- Tampilan di atas digunakan untuk mengajukan atau mengubah pertanyaan.
- Perhatikan label dari field pada form berada di dalam field (tidak di luar)

![](mocks/detail.jpg)
- Bagian ini menampilkan pertanyaan. Bentuk icon vote up/down tidak perlu sama. Bagian `datetime` tidak harus ada. Bagian `username` dapat anda isi dengan email.
- Perhatikan label dari field pada form berada di dalam field (tidak di luar)

### List pertanyaan

Halaman utama berisi daftar judul pertanyaan, siapa yang bertanya, dan isi pertanyaan. Isi pertanyaan yang terlalu panjang harus dipotong. Silakan definisikan sendiri seberapa panjang agar tetap baik terlihat di layout yang Anda buat.

Pada masing-masing elemen list, terdapat menu untuk mengubah dan menghapus pertanyaan.

### Bertanya

Pengguna dapat mengajukan pertanyaan. Form yang digunakan memiliki judul, email, nama, dan isi pertanyaan. Gunakan HTTP POST.

### Ubah Pertanyaan

Pengguna dapat mengubah pertanyaan yang sudah dibuat. Form yang digunakan memiliki tampilan yang sama dengan form untuk bertanya, namun field-field yang ada sudah terisi. Gunakan HTTP POST.

### Hapus Pertanyaan

Pengguna dapat menghapus pertanyaan yang sudah dibuat. Lakukan konfirmasi penghapusan dengan javascript.

### Lihat Pertanyaan

Pengguna dapat melihat pertanyaan dan semua jawabannya. Pada halaman ini terdapat informasi judul, isi pertanyaan, email, dan nama. Untuk jawaban, tampilkan email, nama, konten jawaban, dan jumlah vote pada jawaban tersebut.

### Menjawab pertanyaan

Jawaban pertanyaan berisi email, nama, dan konten jawabannya. Gunakan HTTP POST untuk menjawab pertanyaan.


### Vote (vote up, vote down)

Pengguna dapat melakukan vote up atau vote down ke suatu pertanyaan. Ketika pengguna menekan tombol vote, halaman tidak boleh refresh tapi jumlah vote akan berubah dan tersimpan ke basis data. Jumlah vote yang akan berubah sesuai dengan banyaknya vote yang ada di basis data (jadi tidak asal nambah satu saja). 


### Validasi

Validasi **wajib** dilakukan pada *client-side*, dengan menggunakan **javascript** bukan HTML 5 input type, yaitu:
- Setiap field pada form tidak boleh kosong.
- Email harus sesuai format email.

### Bonus

Pengguna dapat mencari pertanyaan dengan melakukan search ke `judul` maupun `isi pertanyaan`.

### Penjelasan Teknis

1. Untuk validasi pada client side untuk delete langsung tambahkan pada tombol delete atribut onclick="return confirm(\'Are you sure want to delete this question?\')"  sehingga akan otomatis meminta konfirmasi kepada user.
2. Untuk validasi pada client side untuk form, pada form tambahkan atribut onsubmit="return validateForm()" dimana validateForm() merupakan fungsi javascript yang mengkonfirmasi bahwa seluruh  field telah terisi.
3. Untuk penggunaan AJAX pada vote up question, pada tombol vote up tambahkan atribut onclick="voteUp('id')" dimana voteUp() adalah fungsi javascript dan id adalah id question yang merupakan parameter input dari fungsi voteUp(). Karena nilai vote disimpan pada suatu paragraph yang memiliki id, maka nilai tersebut dapat diambil dari javascript dengan fungsi parseInt(document.getElementById("Vote").innerHTML); dimana Vote adalah id dari paragraph tersebut. Selanjutnya nilai vote ditambah 1 dan dikembalikan ke paragraph "Vote". Setelah itu fungsi akan mengirim pesan ke server yaitu xmlhttp.open("GET","voteup.php?id="+id,true); dan xmlhttp.send(); dimana voteup.php adalah php yang akan menambah nilai vote dari question dan id adalah id dari question.
4. Untuk penggunaan AJAX pada vote down question, pada tombol vote down tambahkan atribut onclick="voteDown('id')" dimana voteDown() adalah fungsi javascript dan id adalah id question yang merupakan parameter input dari fungsi voteDown(). Karena nilai vote disimpan pada suatu paragraph yang memiliki id, maka nilai tersebut dapat diambil dari javascript dengan fungsi parseInt(document.getElementById("Vote").innerHTML); dimana Vote adalah id dari paragraph tersebut. Selanjutnya nilai vote dikurang 1 dan dikembalikan ke paragraph "Vote". Setelah itu fungsi akan mengirim pesan ke server yaitu xmlhttp.open("GET","votedown.php?id="+id,true); dan xmlhttp.send(); dimana votedown.php adalah php yang akan mengurangi nilai vote dari question dan id adalah id dari question.
5. Untuk penggunaan AJAX pada vote up answer, pada tombol vote up answer tambahkan atribut onclick="voteUpA('id')" dimana voteUpA() adalah fungsi javascript dan id adalah id answer yang merupakan parameter input dari fungsi voteUpA(). Karena nilai vote disimpan pada suatu paragraph yang memiliki id, maka nilai tersebut dapat diambil dari javascript dengan fungsi parseInt(document.getElementById(Vote).innerHTML); dimana Vote adalah suatu parameter string yang berisi "VoteA" + id answer. Selanjutnya nilai vote ditambah 1 dan dikembalikan ke paragraph dengan id Vote. Setelah itu fungsi akan mengirim pesan ke server yaitu xmlhttp.open("GET","voteupanswer.php?id="+id,true); dan xmlhttp.send(); dimana voteupanswer.php adalah php yang akan menambah nilai vote dari answer dan id adalah id dari answer.
6. Untuk penggunaan AJAX pada vote down answer, pada tombol vote down answer tambahkan atribut onclick="voteDownA('id')" dimana voteDownA() adalah fungsi javascript dan id adalah id answer yang merupakan parameter input dari fungsi voteDownA(). Karena nilai vote disimpan pada suatu paragraph yang memiliki id, maka nilai tersebut dapat diambil dari javascript dengan fungsi parseInt(document.getElementById(Vote).innerHTML); dimana Vote adalah suatu parameter string yang berisi "VoteA" + id answer. Selanjutnya nilai vote dikurang 1 dan dikembalikan ke paragraph dengan id Vote. Setelah itu fungsi akan mengirim pesan ke server yaitu xmlhttp.open("GET","votedownanswer.php?id="+id,true); dan xmlhttp.send(); dimana votedownanswer.php adalah php yang akan mengurangi nilai vote dari answer dan id adalah id dari answer.

### Knowledge

Untuk meringankan beban tugas ini, ada berberapa keyword yang bisa anda cari untuk menyelesaikan tugas ini.
- CSS: margin, padding, header tag, font-size, text-align, float, clear, border, color, div, span, placeholder, anchor tag.
- Javascript : XMLHTTPRequest.
- PHP: mysqli_connect, mysql_query, $_GET, $_POST, var_dump, print_r, echo, require, fungsi header.
- SQL query: SELECT, INSERT, UPDATE, DELETE, WHERE, operator LIKE.

Jika ada pertanyaan silakan tanyakan lewat milis.

### About

Asisten IF 3110 2015

Fahziar | Gilang | Lingga | Reza | Sudib | Tito | Willy K2 | Yafi

Dosen : Yudistira Dwi Wardhana | Riza Satria Perdana
