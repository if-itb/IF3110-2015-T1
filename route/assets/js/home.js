var deleteThread = function (id) {
  if (confirm("Anda yakin ingin mengapus pertanyaan ini?") == true) {
    window.location.href = "/thread/delete.php?id=" + id;
  }
};