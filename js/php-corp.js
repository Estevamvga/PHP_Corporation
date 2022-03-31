let listaDeFuncoes;

function abreAba(evt, aba) {
  let i, conteudo, abas
  conteudo = document.getElementsByClassName("conteudo")
  for (i = 0; i < conteudo.length; i++) {
    conteudo[i].style.display = "none"
  }
  abas = document.getElementsByClassName("aba")
  for (i = 0; i < abas.length; i++) {
    abas[i].classList.remove("aberta")
  }
  document.getElementById(aba).style.display = "block"
  evt.currentTarget.classList.add("aberta")
}

function formataCPF(val, msc="###.###.###-##") {
  mascara = '';
  k = 0;
  for(i = 0; i<msc.length; i++) {
      if(msc[i] == '#') {
          if(val[k]) mascara += val[k++];
      } else {
          if(msc[i]) mascara += msc[i];
      }
  }
  return mascara;
}

// Imprime a tabela de operadores
function printRowOperador(item) {
  container = document.getElementById("listaOperadores")
  container.innerHTML += `<div class=\"item-lista\">
  <p>
    <span>${item.matricula}</span>
    <span>${item.nome}</span>
    <span>${formataCPF(item.cpf)}</span>
    <span>R$ ${parseFloat(item.salario).toFixed(2)}</span>
    <span>${listaDeFuncoes[item.funcao - 1]}</span>
  </p>
  </div>`
}

// Tratamento de erros do form assíncrono
function handleErrors(response) {
  if(!response.ok) throw Error(response.statusText)
  return response
}

// Função para carregamento da lista de funções (dos operadores)
function carregaListaFuncoes() {
  lista = []
  formData = new FormData()
  formData.append('read', 1)
  fetch("app/controllers/FuncaoController.php", {
    method: "POST",
    body: formData
  })
  .then(handleErrors)
  .then((response) => {
    try {
      return response.json()
    } catch (error) {
      console.log(error)
    }
  })
  .then((data) => {
    data.forEach((item) => {
      item = JSON.parse(item)
      lista.push(item.descricao)
    })
    combo = document.getElementById("opFnc")
    lista.forEach((item, chv) => {
    combo.innerHTML += `<option value="${chv + 1}">${item}</option>`
    console.log("CL: ", item, chv)
  })
  })
  .catch((err) => {
    console.log("Erro na função carregaListaFuncoes: ", err)
  })
  return lista
}

// Tratamento do cadastro de usuários assíncrono
document.addEventListener("submit", (e) => {
  // Referência para o formulário
  const form = e.target
  console.log(new FormData(form))
  // Capturar os dados e enviar de forma assíncrona
  fetch(form.action, {
    method: form.method,
    body: new FormData(form)
  })
  .then(handleErrors)
  .then((response) => {
    try {
      return response.json()
    } catch(er) {
      console.log(er)
    }
  })
  .then((data) => {
    form.reset()
    opMatr = document.getElementById('opMatr')
    opMatr.value = parseInt(data.matricula) + 1
    printRowOperador(data)
  })
  .catch((er) => console.log(er))

  // Impedir que o formulário faça uma requisição síncrona
  e.preventDefault()
})

document.addEventListener("DOMContentLoaded", () => {
  // Carrega a lista de funções
  listaDeFuncoes = carregaListaFuncoes()
  // TODO: Adicionar lista de funções
  formData = new FormData()
  formData.append('read', 1)
  fetch("app/controllers/OperadorController.php", {
    method: "POST",
    body: formData
  })
  .then(handleErrors)
  .then((response) => {
    try {
      return response.json()
    } catch (error) {
      console.log(error)
    }
  })
  .then((data) => {
    opMatr = document.getElementById("opMatr")
    opMatr.value = data.nextId
    JSON.parse(data.operadores).forEach((item) => {
      item = JSON.parse(item)
      printRowOperador(item)
    })
  })
  .catch((error) => console.log(error))
})