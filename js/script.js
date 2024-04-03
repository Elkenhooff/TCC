let login = true;
let todosElemento = document.querySelectorAll("#trocarForm");
todosElemento.forEach(function(teste){
    teste.addEventListener('click', function() {
        if (login){
            document.querySelector(".Cadastro").style.display = "flex";
            document.querySelector(".Login").style.display = "none";
            login = false;
        }else{
            document.querySelector(".Cadastro").style.display = "none";
            document.querySelector(".Login").style.display = "flex";
            login = true;
        }})})

// document.getElementById('trocarForm').addEventListener('click', function() {
//     if (login){
//         document.querySelector(".Cadastro").style.display = "flex";
//         document.querySelector(".Login").style.display = "none";
//     }else{
//         document.querySelector(".Cadastro").style.display = "none";
//         document.querySelector(".Login").style.display = "flex";
//     }
// });
