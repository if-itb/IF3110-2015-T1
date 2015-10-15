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

melakukan validasi pada client side :
	validasi dilakukan 3 kali yaitu pada saat
		user memasukkan pertanyaan baru
		user mengedit pertanyaan, dan
		user menjawab pertanyaan
	
		validasi dilakukan dengan menggunakan javascript --> function checkscript()
		validasi terjadi saat user menge-klik submit button (onclick="return checkscript()")
		
		fungsi checkscript pada awalnya mengakuisisi data dari form yang hendak di submit, berikut adalah pseucodenya  :
			var namesubmitted = document.forms["newquestion"]["Name"].value;
			var emailsubmitted = document.forms["newquestion"]["Email"].value;
			var questiontopicsubmitted = document.forms["newquestion"]["QuestionTopic"].value;
			var contentsubmitted = document.forms["newquestion"]["Content"].value;
		
		fungsi checkscript() melakukan penyeleksian kondisi, lalu mengeluarkan alert dan return false sehingga submittance tidak dapat terjadi
		berikut pseudo code salah satu penyeleksian kondisi dan hasilnya
			if (namesubmitted=="") {
                // something i s wrong
                alert("field nama tidak boleh kosong");
                return false;
            }
			
		setelah semua kondisi field tidak kosong terpenuhi, lalu fungsi akan melakukan pengecekan format email 
		dengan menggunakan pseuidocode berikut
			if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailsubmitted)){
                return true;
            }
		pseudocode tersebut akan menyeleksi apakah sebelum dan sesudah @ terdapat karakter alphanumerical
		dan juga apakah terdapat karakter titik  dan 2 atau 3 huruf setelahnya untuk pengecekan format domain email
		
	setelah isi form sudah memenuhi kondisi, maka halam baru akan berpindah dan memproses isi form


Melakukan Voting dengan ajax	
	ajax membuat kita dapat meminta input dari server tanpa harus merefresh page kembali
	oleh karena itu, kita dapat memberikan vote pada pertanyaan dan jawaban dan melihat perubahan angka vote
	tanpa harus melakukan refresh pada page

	pada tugas ini, saya membuat 4 fungsi yang mengandung ajax, yaitu Upvote(), Downvote(), Upvoteanswer(), dan Downvoteanswer()
	ada tiga langkah yang harus dilakukan pada saat penerapan ajax yang normal,. yaitu:
			penetapan bagian page yang akan diubah
			penetapan trigger yang menghudupkan fungsi
			lalu membuat fungsi yang terdapat ajax didalamnya
		
			- penetapan bagian page dapat dilakukan dengan membuat tag div dan memberikan id, contohnya sbg berikut
				<div id="votepoint">
                       <?php
                       echo $vote_point;
                       ?>
                   </div>
				
				pada pseudocode diatas, semua yang terdapat didalam tag div akan diupdate oleh konten yang baru
			
			- penetapan trigger ajax dapat dilakukan dengan atribut onclick yang diletakkan pada image cursor
				<img src="arrowup.png" alt="upvote" style="width:40px;height:40px;" align="center" onclick="Upvote()">
	
			- pembuatan fungsi yang dapat melakukan ajax
				+ pertama-tama yaitu membuat variable baru untuk menampung XMLHttpRequest()
				+ lalu letakkan id div yang kita tentukan pada langkah pertama seperti berikut
					xhttp.onreadystatechange = function() {
						if (xhttp.readyState == 4 && xhttp.status == 200) {
							document.getElementById("votepoint").innerHTML = xhttp.responseText;
						}
					}
				+ lalu letakkan link halaman yang akan menggantikan tag div tersebut seperti berikut
						xhttp.open("GET", "upvote.php?questionID="+<?php echo $questionID?>, true);
						xhttp.send();
					halaman upvote tersebut lalu akan juga mengambil informasi yang kita kirimkan melalui $_get
					

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
