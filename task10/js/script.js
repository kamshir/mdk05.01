const elements = document.querySelectorAll('.el');

let x = 0
let y = 110
let z = 200

elements.forEach(el => {
    el.style.backgroundColor = 'rgb(' + x + ', ' + y + ', ' + z + ')'
    x += 25
    y -= 13
    z -= 25
    el.addEventListener('click', function() {
        swal('Товар', el.querySelector('.tovar').textContent);
    });
})