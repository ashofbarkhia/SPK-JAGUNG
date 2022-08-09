<!doctype html>
<html lang="en">
  <head>
    <?php
      include "head.php";
    ?>
    <style type="text/css">
      html {
  scroll-behavior: smooth;
}
    </style>
  </head>
  <body>
    <?php
      include "navbar.php";
    ?>
    <div class="container p-5">
      <div class="row">
        <div class="col">
          <img src="gambar/jagung.webp"  class="img-fluid" alt="">
        </div>
        <div class="col">
          <p class="text-justify">
            Tanaman Jagung merupakan sereal paling penting setelah gandum dan beras di dunia. Jagung memiliki nutrisi yang tinggi dan penting sebagai bahan pangan. Lahan merupakan syarat yang harus diperhatikan dalam budidaya tanaman jagung, hal ini dapat mempengaruhi pertumbuhan jagung yang akan ditanam. Jenis tanah yang akan ditanami jagung harus benar-benar subur dan mengandung unsur hara yang cukup. Pemilihan lahan yang dilakukan oleh petani selama ini hanya mengandalkan adanya lahan yang kosong atau yang tidak ditanami tumbuhan yang bermanfaat. Sehingga dijadikan sebagai tempat menanam jagung tanpa memikirkan kecocokan suatu lahan dengan tanaman jagung. Oleh karena itu diusulkan sebuah sistem pendukung keputusan menentukan lahan terbaik untuk tanaman jagung demi menghindari terjadinya gagal panen sehingga menyebabkan kerugian bagi petani jagung. Sistem pendukung keputusan dibuat dengan menerapkan metode Analitytical Hierarchy Process (AHP). Metode Analitytical Hierarchy Process (AHP) digunakan untuk melakukan pembobotan data sebelum diolah dan digunakan untuk melakukan proses perangkingan data untuk mendapatkan solusi terbaik. Diharapkan hasil dalam penelitian nantinya dapat memudahkan dalam menentukan lahan terbaik untuk ditanami tanaman jagung.
          </p>
        </div>
      </div>
    </div>

    <div class="bg-warning" id="data">  
       <div class="container p-5">
         <?php
          $data=array(
            array("Lahan 1", 6.3,41 ,26 ,150, "Sawah" ,41,  "Agak Terhambat"),
            array("Paeng", 6.3,38 ,26 ,150,"Sawah", 45,  "Agak Terhambat"),
            array("Neroh", 6.2,37, 26,  150, "Sawah", 42,  "Agak Terhambat"),
            array("Serabi Timur",  6.5 ,38,  26,  150, "Tegalan", 44,  "Baik"),
            array("Serabi Barat",  6.1, 39,  26,  150, "Tegalan", 44,  "Baik"),
            array("Patereman", 6.3, 40,  26,  150, "Tegalan", 43,  "Baik"),
            array("Pangpajung",  6, 39,  26,  150, "Tegalan", 45,  "Baik"),
            array("Patenteng", 6.4, 41,  26,  150, "Tegalan", 41,  "Baik"),
            array("Langpanggang",  6.4 ,38,  26,  150, "Pasir", 40,  "Agak Cepat"),
            array("Karanganyar", 6.6, 37,  26,  150, "Tegalan", 45,  "Baik"),
            array("Modung",  6, 36,  26,  150, "Tegalan", 44,  "Baik"),
            array("Brakas Dajah",  6.1, 41,  26,  150, "Tegalan", 42,  "Baik"),
            array("Suwaan",  6.2, 40,  26,  150, "Pasir", 41,  "Agak Cepat"),
            array("Pakong",  6.5, 39,  26,  150, "Tegalan", 44,  "Baik"),
            array("Alaskokon", 6.6, 37,  26,  150, "Tegalan", 43,  "Baik"),
            array("Manggaan",  6.8, 41,  26,  150, "Tegalan", 45,  "Baik"),
            array("Glisgis", 6.6, 36,  26,  150, "Pasir", 43,  "Agak Cepat")
          );
          

         ?>
         <h1 class="text-center">DATA YANG DIGUNAKAN</h1>
         <table class="table">
           <thead>
              <tr>
               <th>SAMPEL</th>
               <th>PH</th>
               <th>KELEMBAPAN</th>
               <th>TEMPERATURE</th>
               <th>CURAH HUJAN</th>
               <th>TEKSTUR</th>
               <th>KEDALAMAN</th>
               <th>DRAINASE</th>
              </tr>
           </thead>
           <tbody>
             <?php
             for($x=0;$x<count($data);$x++){
             ?>
             <tr>
             <?php
             for($y=0;$y<count($data[$x]);$y++){
             ?>
              <td><?php echo $data[$x][$y]?></td>
             <?php
             }
             ?>
             </tr>
             <?php
             }
             ?>
           </thead>
           </tbody>
         </table>
       </div>
     </div>
     <div class="bg-light" id="perhitungan">  
       <div class="container p-5">
         <h1 class="text-center">PERHITUNGAN</h1>
         <?php 
          $bobot=array(0.05,0.07,0.07,0.07,0.07,0.28,0.28);
          $krtikol=array(0,1,0,1,1,0,1);
          $pembagi=array(1000,0,1000,0,0,1000,0);
          for($x=0;$x<count($data);$x++){
            for($y=1;$y<count($data[$x]);$y++){
              if($y==5){
                if($data[$x][$y]=="Tegalan"){
                  $data[$x][$y] = 3;
                }
                if($data[$x][$y]=="Sawah"){
                  $data[$x][$y] = 2;
                }
                if($data[$x][$y]=="Pasir"){
                  $data[$x][$y] = 1;
                }
              }
              if($y==7){
                if($data[$x][$y]=="Cepat"){
                  $data[$x][$y] = 4;
                }
                if($data[$x][$y]=="Agak Cepat"){
                  $data[$x][$y] = 3;
                }
                if($data[$x][$y]=="Baik"){
                  $data[$x][$y] = 2;
                }
                if($data[$x][$y]=="Agak Terhambat"){
                  $data[$x][$y] = 1;
                }
              }

              if($krtikol[$y-1]==1){
                if($data[$x][$y]>$pembagi[$y-1]){
                  $pembagi[$y-1] = $data[$x][$y];
                }
              }

              if($krtikol[$y-1]==0){
                if($data[$x][$y]<$pembagi[$y-1]){
                  $pembagi[$y-1] = $data[$x][$y];
                }
              }
            }
          }
          ?>
          <p>DATA KONVERSI</p>
          <table class="table">
            <thead>
                <tr>
                <th>SAMPEL</th>
                <th>PH</th>
                <th>KELEMBAPAN</th>
                <th>TEMPERATURE</th>
                <th>CURAH HUJAN</th>
                <th>TEKSTUR</th>
                <th>KEDALAMAN</th>
                <th>DRAINASE</th>
                </tr>
            </thead>
            <tbody>
              <?php
              for($x=0;$x<count($data);$x++){
              ?>
              <tr>
              <?php
              for($y=0;$y<count($data[$x]);$y++){
              ?>
                <td><?php echo $data[$x][$y]?></td>
              <?php
              }
              ?>
              </tr>
              <?php
              }
              ?>
            </thead>
            </tbody>
          </table>
          <?php
          $preferensi=array();
          for($x=0;$x<count($data);$x++){
            $np=0;
            $temp=array(0,$data[$x][0]);
            for($y=1;$y<count($data[$x]);$y++){
              if($krtikol[$y-1]==1){
                $data[$x][$y] = $data[$x][$y]/$pembagi[$y-1];
              }
              else{
                $data[$x][$y] = $pembagi[$y-1]/$data[$x][$y];
              }
              $np+=($data[$x][$y]*$bobot[$y-1]);
            }
            $temp[0] = $np;
            array_push($preferensi,$temp);
          }

          rsort($preferensi); //diurutkan

          

         ?>
        <p>Mencari nilai min atau max kriteria</p>
        <table class="table">
          <thead>
            <tr>
              <th>KET</th>
              <th>PH</th>
              <th>KELEMBAPAN</th>
              <th>TEMPERATURE</th>
              <th>CURAH HUJAN</th>
              <th>TEKSTUR</th>
              <th>KEDALAMAN</th>
              <th>DRAINASE</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>Kriteria Kolom</th>
              <?php
              for($x=0;$x<count($krtikol);$x++){
                echo "<td>".$krtikol[$x]."</td>";
              }
              ?>
            </tr>

            <tr>
              <th>Pembagi</th>
              <?php
              for($x=0;$x<count($pembagi);$x++){
                echo "<td>".$pembagi[$x]."</td>";
              }
              ?>
            </tr>
          </tbody>
        </table>
        <p>DATA NORMALISASI</p>
        <table class="table">
           <thead>
              <tr>
               <th>SAMPEL</th>
               <th>PH</th>
               <th>KELEMBAPAN</th>
               <th>TEMPERATURE</th>
               <th>CURAH HUJAN</th>
               <th>TEKSTUR</th>
               <th>KEDALAMAN</th>
               <th>DRAINASE</th>
              </tr>
           </thead>
           <tbody>
             <?php
             for($x=0;$x<count($data);$x++){
             ?>
             <tr>
             <?php
             for($y=0;$y<count($data[$x]);$y++){
             ?>
              <td><?php echo $data[$x][$y]?></td>
             <?php
             }
             ?>
             </tr>
             <?php
             }
             ?>
           </thead>
           </tbody>
         </table>
         <p>Bobot</p>
          <table class="table">
            <thead>
              <tr>
                <th>PH</th>
                <th>KELEMBAPAN</th>
                <th>TEMPERATURE</th>
                <th>CURAH HUJAN</th>
                <th>TEKSTUR</th>
                <th>KEDALAMAN</th>
                <th>DRAINASE</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              <?php
              for($y=0;$y<count($bobot);$y++){
              ?>
                <td><?php echo $bobot[$y]?></td>
              <?php
              }
              ?>
              </tr>
            </tbody>
          </table>
          <p>Perangkingan</p>
          <table class="table">
           <thead>
              <tr>
               <th>Rangking</th>
               <th>Nilai Preferensi</th>
               <th>Tempat</th>

              </tr>
           </thead>
           <tbody>
             <?php
             for($x=0;$x<count($preferensi);$x++){
             ?>
             <tr>
             <td><?php echo ($x+1)?></td>
             <?php
             
             for($y=0;$y<count($preferensi[$x]);$y++){
             ?>
              <td><?php echo $preferensi[$x][$y]?></td>
             <?php
             }
             ?>
             </tr>
             <?php
             }
             ?>
           </thead>
           </tbody>
          </table>
       </div>
     </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
  </body>
</html>