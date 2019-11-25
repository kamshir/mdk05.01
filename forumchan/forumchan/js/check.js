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