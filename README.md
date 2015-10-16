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

#### Validasi
Validasi *form question* dan *answer* dilakukan dengan fungsi 'validateAskForm()' dan 'validateAnswerForm()' pada 'assets/js/validation.js'. Dalam hal ini, dilakukan pengecekkan untuk setiap *field* pada *form* apakah sudah terisi atau belum. Apabila belum (bernilai *null*) akan muncul pesan kesalahan dengan fungsi alert yang menunjukkan *field* mana yang belum terisi sedangkan apabila sudah terisi dengan benar, akan dilakukan fungsi selanjutnya (insert question atau insert answer ke database). Selain melakukan pengecekkan atas terisi tidaknya *field*, khusus untuk *field* email dilakukan juga pengecekkan apakah email yang dituliskan adalah alamat yang sesuai atau tidak dengan menggunakan fungsi 'validateEmail(email)' yang menerapkan fungsi regex di mana setiap email harus mengandung elemen '@' dan '.' sesudahnya serta di antara '@' dan '.' harus terdapat setidaknya satu karakter. Selain itu, setelah tanda '.' harus terdapat antara 2 sampai 6 karakter.

#### AJAX
*Vote* pada *question* dan *answer* dilakukan dengan AJAX dengan fungsi 'vote(id, identify, type)' pada 'assets/js/script.js'. 'id' menunjukkan id *question* atau *answer* mana yang diacu, 'identify' menunjukkan apakah yang diacu adalah *question* atau *answer*, dan 'type' menunjukkan apakah pada *vote* dilakukan penambahan *vote* atau pengurangan *vote*. Dalam hal ini, dilakukan proses asinkron agar *vote* dapat dilakukan tanpa melakukan *refresh* pada *page* yang sedang dibuka. Melalui fungsi tersebut akan dibuat objek XMLHttpRequest baru. Objek tersebut akan mengspesifikasikan isi *request* berupa membuka *file* php 'controllers/vote.controller.php' agar dapat dijalankan tanpa harus *browser* harus melakukan *refresh* menggunakan 'open(method, url, async)'. Saat objek tersebut membuka *file* tadi, diberikan parameter 'id', 'identify', dan 'type' tadi menggunakan *method* 'GET' dan nilai async diubah menjadi 'true'. Setelah itu, objek akan melakukan pengiriman *request* ke *server* menggunakan *method* 'GET' tadi. Menggunakan fungsi 'onreadystatechange' yang selalu dipanggil setiap kali terjadi perubahan *state*, didefinisikan fungsi untuk mengubah tampilan *browser*. Saat 'readyState' bernilai 4 yang berarti *request* telah selesai diproses dan *response* sudah siap serta 'status' bernilai 200 yang berarti OK, nilai *vote* yang ditampilkan oleh *browser* akan berubah sesuai dengan hasil 'responseText' yang dihasilkan dari *request* objek. 'responseText' ini diberikan oleh 'vote.controller.php' yang menunjukkan hasil perubahan nilai pada basis data berkenaan dengan *vote* yang dilakukan.

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
