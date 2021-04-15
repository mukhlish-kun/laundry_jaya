
function search(str){
    //objek ajax
    var container = document.getElementById("konten");
    var ajax = new XMLHttpRequest();
    //cek kesiapan ajax
    ajax.onreadystatechange = function() {
        
        if(ajax.readyState==4 && ajax.status == 200) {
            container.innerHTML = ajax.responseText;
        }
    }

    //ekeskusinya gan
    ajax.open('GET', 'ajax/data_transaksi.php?id=' + str, true);
    ajax.send();

};

function namaSearch(str) {
    var ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function() {
        if(ajax.readyState==4 && ajax.status == 200) {
            document.getElementById('ajax-nama').innerHTML = ajax.responseText;
        }
    }
    ajax.open('GET', 'ajax/search_nama.php?id=' + str, true);
    ajax.send();
};

function total(str) {
    var ajax = new XMLHttpRequest();
    var paket=document.getElementById('paket_select').value;
    ajax.onreadystatechange = function() {
        if(ajax.readyState==4 && ajax.status == 200) {
            document.getElementById('biaya_total').value = ajax.responseText;
        }
    }
    ajax.open('GET', 'ajax/total_biaya.php?berat='+str+'&paket='+paket, true);
    ajax.send();
    
};

function keuntungan() {
    var ajax = new XMLHttpRequest();
    var sebelum=document.getElementById('sebelum').value;
    var sesudah=document.getElementById('sesudah').value;
    ajax.onreadystatechange = function() {
        if(ajax.readyState==4 && ajax.status == 200) {
            document.getElementById('keuntungan_transaksi').innerHTML = ajax.responseText;
        }
    }
    ajax.open('GET', 'ajax/keuntungan.php?sebelum='+sebelum+'&sesudah='+sesudah, true);
    ajax.send();
    
};