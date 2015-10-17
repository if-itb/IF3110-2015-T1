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

`Silakan isi bagian ini dengan penjelasan anda, sesuai Petunjuk Pengerjaan di atas.`

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


Melakukan validasi pada client-side
Untuk melakukan validasi pada client side, baik untuk validasi question maupun answer, 
digunakan fungsi javascript yang dipanggil pada form
	onsubmit="return chkValidityQuestion();" //untuk validasi question, baik post question maupun edit question
	onsubmit="return chkValidityAnswer();" //untuk validasi answer

Kedua fungsi tersebut akan menghasilkan true (jika semua input benar) atau false (jika salah satu atau lebih input salah)
Jika fungsi menghasilkan false, maka submit tidak dapat dilakukan.

Validasi pada client-side hanya dapat berjalan jika browser mendukung javascript dan di-enabled.
Jika browser tidak mendukung javascript atau javascript di disabled oleh pengguna, perlu dilakukan validasi pada server-side

Melakukan AJAX (mulai dari pengguna melakukan klik pada tombol vote sampai angka vote berubah).

Untuk dapat melakukan vote, pada tombol up/down, ditambahkan tag onclick, yang akan memanggil sebuah fungsi javascript bernama
	vote('[up/down]','[q/a]',[id]);
Pada program yang saya buat:
Parameter pertama menyatakan vote up atau down
Parameter kedua menyatakan question atau answer
Parameter ketiga menyatakan id dari question atau answer



	var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	} else {
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}

	if(type == 'q'){	
		xmlhttp.onreadystatechange = function()
		{
			if(xmlhttp.readyState == 4)
			{
				document.getElementById("q-"+id).innerHTML=xmlhttp.responseText;
			}
		}
		if(upDown == 'up'){
			xmlhttp.open("POST","functions.php?f=voteQuestionUp&id=" + id,true);
		} else {
			xmlhttp.open("POST","functions.php?f=voteQuestionDown&id=" + id,true);
		}
		xmlhttp.send();
	} else { //answer
		xmlhttp.onreadystatechange = function()
		{
			if(xmlhttp.readyState == 4)
			{
				document.getElementById("a-"+id).innerHTML=xmlhttp.responseText;
			}
		}
		if(upDown == 'up'){
			xmlhttp.open("POST","functions.php?f=voteAnswerUp&id=" + id,true);
		} else {
			xmlhttp.open("POST","functions.php?f=voteAnswerDown&id=" + id,true);
		}
		xmlhttp.send();
	}
	
Pada fungsi vote, digunakan XMLHttpRequest, yang merupakan sebuah objek javascript yang dapat mengambil data dari suatu URL tanpa mereload halaman secara keseluruhan

Kemudian dilakukan seleksi apakah yang akan di vote question ('q') atau answer ('a') serta vote up ('up') atau vote down ('down')

Kemudian xmlhttp.open dengan method post memanggil functions.php dengan parameter GET 'f' yang menyatakan apa yang akan divote (question/answer) dan jenis vote(up/down) serta parameter ID yang berisi ID dari question/answer yang akan divote

Di functions.php, terdapat
	if(isset($_GET['f']))
yang akan jalan jika dilakukan pemanggilan functions php dengan parameter f diisi.
Di dalam if(isset($_GET['f'])), akan dipanggil fungsi vote dengan parameter ($type,$n,$id)
$type = question/answer
$n = jumlah vote (1 untuk up, -1 untuk down)
$id = id question/answer

Selanjutnya, dilakukan pengupdatean data pada database
Fungsi vote juga akan meng-echo jumlah vote yang baru (setelah diupdate) dengan memanggil getVoteNumber()

Kembali ke javascript, bagian
	if(xmlhttp.readyState == 4)
akan terpenuhi setelah fungsi vote selesai menjalankan tugasnya dan meng-echo jumlah vote yang baru

Di dalamnya,
	document.getElementById([id elemen yang menyatakan jumlah vote question/answer]).innerHTML=xmlhttp.responseText;
akan mengupdate elemen dengan hasil responseText dari php.



