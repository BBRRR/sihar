<html>
<head>
 <title>Menyembunyikan dan menampilkan elemen dengan jQuery</title>
 <script type="text/javascript" src="../assets/js/jquery-1.7.1.min.js"></script>
 <script>
 //Inisiasi awal penggunaan jQuery
 $(document).ready(function(){
  //Pertama sembunyikan elemen class gambar
        $('.gambar').hide();        

  //Ketika elemen class tampil di klik maka elemen class gambar tampil
        $('.tampil').click(function(){
   $('.gambar').show();
        });

  //Ketika elemen class sembunyi di klik maka elemen class gambar sembunyi
        $('.sembunyi').click(function(){
   //Sembunyikan elemen class gambar
   $('.gambar').hide();        
        });
 });
 </script>
</head>
<body>
<input type="button" class="tampil" value="Tampil"/>
<input type="button" class="sembunyi" value="Sembunyi"/>
 <div class="gambar">
  halo/> 
 </div>
</body>
</html>