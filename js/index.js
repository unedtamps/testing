// ambil elemen yang dibutuhkan 

let keyword = document.getElementById('keyword') ;
let searchButton = document.getElementById('tombol-cari') ;
let container = document.getElementById('container') ;

// tambahkan ketika even diketik 
keyword.addEventListener('keyup',function() {
    
    // buat object ajak 
    let ajax = new XMLHttpRequest() ;

    // cek dulu kesiapan ajax

    ajax.onreadystatechange = function() {
        if(ajax.readyState == 4 && ajax.status == 200) {
            container.innerHTML = ajax.responseText;
        }
    }
    ajax.open('GET','../ajax/meme.php?keyword=' + keyword.value,true) ;
    ajax.send() ;

}) ;
