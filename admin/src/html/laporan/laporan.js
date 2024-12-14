document.getElementById("kategori").addEventListener("change", function () {
var kategori = this.value;
if (kategori == "Produk") {
document.getElementById("type-produk").style.display = "block";
} else {
document.getElementById("type-produk").style.display = "none";
}
});

$(document).ready(function() {

  $('#cetak-btn').on('click', function(e) {
    e.preventDefault();
    var kategori = $('#kategori').val();
    var type_produk = $('#type_produk').val();
    var url = '';
    if (kategori === 'Pilih Kategori') {
      alert('Silakan pilih laporan dulu!');
      return;
    }

    if (kategori == 'Produk') {
      if (type_produk == 'Semua produk') {
        url = 'cetak-produk.php';$(document).ready(function() {
          $('#cetak-btn').on('click', function(e) {
            e.preventDefault();
            var kategori = $('#kategori').val();
            var type_produk = $('#type_produk').val();
            var url = '';
        
            if (kategori == 'Produk') {
              if (type_produk == 'Semua produk') {
                url = 'cetak-produk.php';
              } else {
                url = 'cetak-produk-' + type_produk.toLowerCase().replace(/\s+/g, '-') + '.php';
              }
            } else if (kategori == 'Pesanan') {
              url = 'cetak-pesanan.php';
            } else if (kategori == 'Transaksi') {
              url = 'cetak-transaksi.php';
            }
        
            window.open(url, '_blank');
          });
        });
      } else {
        url = 'cetak-produk-' + type_produk.toLowerCase().replace(/\s+/g, '-') + '.php';
      }
    } else if (kategori == 'Pesanan') {
      url = 'cetak-pesanan.php';
    } else if (kategori == 'Transaksi') {
      url = 'cetak-transaksi.php';
    }

    window.open(url, '_blank');

   
  });
});