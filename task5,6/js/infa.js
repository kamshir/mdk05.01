const names = document.querySelectorAll('.name');

for (let a of names) {
    let imya = a.textContent.slice(0, 1);
    a.textContent = imya;
}

// const fullName = document.querySelector('.fname').textContent;

// const gender = document.querySelector('.pol');

// console.log(gender.textContent);
// if (fullName.slice(-3) == 'вна') {
//     gender.textContent = 'Женский';
// }

// console.log(gender.textContent);