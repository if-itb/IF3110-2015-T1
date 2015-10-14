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

**Melakukan Validasi**

Validasi terhadap field form dan email dilakukan pada client-side menggunakan javascript. Pada setiap input submit yang berfungsi melakukan posting, baik posting pertanyaan ataupun jawaban, ditambahkan atribut *onsubmit* yang mengacu pada fungsi yang terdapat pada javascript. Setiap kali pengguna menekan Post, maka akan dipanggil fungsi ValidateFormQuestion() atau ValidateFormAnswer() yang terdapat pada script.js. Kedua fungsi tersebut mengambil nilai dari masing-masing field menggunakan *document.forms["Forms"].['field-name'].value* dan melakukan pengecekan apakah dari masing-masing field terdapat yang bernilai null atau "". Jika terdapat salah satu saja field yang masih kosong, maka akan dikirimkan alert yang meminta pengguna untuk melengkapi form pada bagian yang belum dilengkapi. Dalam kedua fungsi tersebut juga memanggil fungsi validateEmail() yang melakukan validasi apakah email yang dimasukkan sudah sesuai format, yaitu terdapat karakter "@" dengan indeks lebih dari satu dan karakter "." dengan indeks minimal dua karakter dari belakang. validateEmail() juga mengirimkan alert yang meminta pengguna untuk melengkapi field email dengan format yang sesuai

**Melakukan AJAX**

Untuk dapat melakuakan voting up dan voting down pada pertanyaan tanpa melakukan refresh terhadap page menggunakan AJAX *XMLHTTPRequest*. Gambar panah untuk melakukan vote termasuk dalam kelas kelas *arrow-up* dan *arrow-down* yang didefinisikan pada style.css. Pada masing-masing kelas tersebut ditambahkan atribut *onclick* yang memanggil fungsi vote(id,qa,updown) yang terdapat pada script.js. Adapun mekanisme yang dilakukan fungsi vote() adalah sebagai berikut:
- Fungsi vote menerima masukan parameter *id, qa, updowm*. *id* merupakan id dari pertanyaan/jawaban yang nilai votenya akan diubah. *qa* diisi dengan "question" jika yang di-vote merupakan pertanyaan atau "answer" jika yang di-vote merupakan jawaban. *updown* dapat diisi dengan "up" jika arrow-up yang di-click atau "down" jika yang di-click adalah arrow-down
- Fungsi vote memanggil xmlhttp.open() dengan parameter "GET", page "vote.php?id=*id*&qa=*qa*&updown=*updown*", dan true
- Pada vote.php, masing-masing atribut diambil menggunakan $_GET dan disimpan dalam vaiabel $id, $qa, dan $updown
- Jika $qa="question", maka ambil atribut vote pada tabel Question dengan question_id=$id menggunakan statement pada sql. Jika $updown = "up", maka nilai vote tersebut di-increment, sebaliknya jika $updown="down", maka nilai vote tersebut di-decrement. Nilai vote sebelumnya pada database kemudian diganti menggunakan statement UPDATE pada SQL
- Jika $qa="answer", maka ambil atribut vote pada tabel Answer dengan answer_id=$id menggunakan statement pada sql. Jika $updown = "up", maka nilai vote tersebut di-increment, sebaliknya jika $updown="down", maka nilai vote tersebut di-decrement. Nilai vote sebelumnya pada database kemudian diganti menggunakan statement UPDATE pada SQL
- Nilai vote yang baru dikembalikan pada javascript dengan menggunakan *echo*. Javascript kemudian mengganti text nilai vote dengan nilai yang baru menggunakan *document.getElementById(id).innerHTML = xmlhttp.responseText*


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
