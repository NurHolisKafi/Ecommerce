//view harga
let harga = document.querySelectorAll('#view-harga');
harga.forEach(function (e) {
    let a = String(e.innerHTML).split("").reverse();
    for (let b = 0; b < a.length; b++) {
        if ((b + 1) % 3 == 0 && b != a.length - 1) {
            a[b] = `.${a[b]}`;
        }
    }
    hasil = a.reverse().join("");

    e.innerHTML = `Rp ${hasil}`
})