(()=>{
    document.addEventListener("DOMContentLoaded", function() {
      fetch("menu.html")
        .then(response => response.text())
        .then(data => {
          document.getElementById("menu-placeholder").innerHTML = data;
        })
        .catch(error => console.error('Erro ao carregar o menu:', error));
    });
})

()