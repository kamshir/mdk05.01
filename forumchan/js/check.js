let check = document.querySelector('#check')
if (document.body.querySelector('.rules')){
  let rules = document.querySelector('.rules')
    rules.onclick = () => {
      if (check.checked){
          alert('Вы отказались от наших условий!(')
      }
      else {
          alert('Поздравляю! Вы согласны с нашими условиями!')
      }
    }
}

$('.edit_comnt').css({'display': 'none'})

let edit = document.querySelectorAll(".edit")
let formsEdit = document.querySelectorAll(".edit_comnt")

for (let i = 0; i < edit.length; i++){
	edit[i].onclick = () => {
		$(formsEdit[i]).slideToggle()
	}
}

let text = document.querySelector("#file");
text.addEventListener('change', function() {
  let val = document.querySelector('.val')
  let txt = text.value
  let answer = ''
  let elems = txt.split(',')
  elems.forEach(el => {
    let slash = el.lastIndexOf('\\') + 1
    let elem = el.slice(slash)
    answer += elem + '  '
  })
  val.textContent = answer
})