<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>

    <style>
        #message{
            width: 350px;
            padding: 10px 5px;
            border: 1px solid gray;
            background-color: green;
            position: absolute;
            right: 0;
            top: 10px;
            display: none;
        }
    </style>

</head>
<body>
    <section class="w-full h-screen flex justify-center items-center">
        <div id="message" class="message text-white p-5 rounded">

        </div>
        <div class="border border-gray-400 rounded w-fit p-5 py-10">
            <div>
                <div class="flex justify-center p-2">
                    <h2 class="text-lg">Sistema de cadastro</h2>
                </div>
               <div class="p-2 flex flex-col gap-2">
                    <label for="">
                        <p>Nome</p>
                        <input id="nome" class="border border-gray-200 rounded " type="text">
                    </label>
                    <label for="">
                        <p>Email</p>
                        <input id="email" class="border border-gray-200 rounded " type="email">
                    </label>
                    <label for="">
                        <p>Senha</p>
                        <input id="senha" class="border border-gray-200 rounded " type="password">
                    </label>
                    <label for="" class="flex justify-center py-5">
                        <button onclick="Cadastrar()" class="bg-green-700 text-white px-5 py-1 rounded w-[150px] ">Cadastrar</button>
                    </label>
               </div>
            </div>
        </div>
    </section>
    <script>
        function Cadastrar(){
            let nome = document.getElementById('nome').value;
            let email = document.getElementById('email').value;
            let senha = document.getElementById('senha').value;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            let mensagem = document.getElementById('message');


            fetch('/cadastro', {
                method: 'POST',
                headers:{
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body:JSON.stringify({
                    'nome': nome,
                    'email':email,
                    'password': senha

                })
               

            })

                .then(data => data.json())
                .then((data)=>{
                    setTimeout(() => {
                        mensagem.style.display = "none";
                        
                    }, 1000);
                    mensagem.innerText = data.message
                    mensagem.style.display = "block";
                    console.log(data)
                })
        }
    </script>
    
</body>
</html>