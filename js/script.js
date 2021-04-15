function validNum(){
    var x = document.getElementById("harga_paket");
    if(!/^[0-9]+$/.test(x.value)){
        document.getElementById("note_profil").innerHTML="* hanya angka yang diperbolehkan.";
        document.getElementById("add_btn").disabled = true;
      } else {
          document.getElementById("note_profil").innerHTML="";
          document.getElementById("add_btn").disabled = false;
      }

}
function validName(){
    var x = document.getElementById("nama_paket");
        return x.value.split(' ').join('');
}
