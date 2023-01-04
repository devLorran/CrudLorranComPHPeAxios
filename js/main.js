    const contactId = document.getElementById('id');
    const contactNome = document.getElementById('nome');
    const contactEmail = document.getElementById('email');
    const contactSenha = document.getElementById('senha');
    const results = document.getElementById('results');
    const form = document.getElementById('add-form');
    const updateButton = document.getElementById('updateBtn');
    const addButton = document.getElementById('addBtn');
    const messageBox = document.getElementById('message');

    addButton.addEventListener('click',addContact);

    document.addEventListener('DOMContentLoaded',getContacts);
    //Método para adicionar usuários no banco de dados
    function addContact(){
        if(contactNome.value != "" && contactEmail.value != "" && contactSenha.value != ""){
            axios.post('http://localhost/CrudLorranTeste/add.php', {
                nome: contactNome.value,
                email: contactEmail.value,
                senha: contactSenha.value,
            })
            .then(function (response) {
                // results.innerHTML = response.data;
                getContacts();
                contactNome.value = '';
                contactEmail.value = '';
                contactSenha.value = '';
                messageBox.innerHTML = `
                    ${response.data}
                `;
            })
            .catch(function (error) {
                console.log(error);
            });
        }else{
            messageBox.innerHTML = `
                <div class="alert alert-danger">Preencha todos os campos</div>
            `;
        }
        
    }
    //Método responsável por carregar os dados dos usuários na tela
    function getContacts(){
        axios.get('http://localhost/CrudLorranTeste/get-contacts.php',)
        .then(function (response) {
            results.innerHTML = `
                <table class="table table-responsive table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Senha</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${response.data}
                    </tbody>
                </table>       
            `;
        })
        .catch(function (error) {
            console.log(error);
        });
    }
    //Método responsável por pegar um usuário pelo ID
    function getContact(id){
        axios.post('http://localhost/CrudLorranTeste/get-contact.php',{       
            id: id
        })
        .then(function (response) {
            contactNome.value = response.data.nome;
            contactEmail.value = response.data.email;
            contactSenha.value = response.data.senha;
            contactId.value = response.data.id;
            updateButton.style.display = "block";
            addButton.style.display = "none";
        })
        .catch(function (error) {
            console.log(error);
        });
    }
    //Méotod responsável por alterar um usuário no banco de dados
    updateButton.addEventListener('click',function(){
        axios.put('http://localhost/CrudLorranTeste/update.php', {
            id: contactId.value,
            nome: contactNome.value,
            email: contactEmail.value,
            senha: contactSenha.value
        })
        .then(function (response) {
            getContacts();
            contactNome.value = '';
            contactEmail.value = '';
            contactSenha.value = '';
            updateButton.style.display = "none";
            addButton.style.display = "block";
            messageBox.innerHTML = `
                ${response.data}
            `;
        })
        .catch(function (error) {
            console.log(error);
        });
    });
    //Método responsável por deletar um usuário
    function deleteContact(id){
        axios.post('http://localhost/CrudLorranTeste/delete.php', {
             id:id
        })
        .then(function (response) {
            getContacts();
            messageBox.innerHTML = `
                ${response.data}
            `;
        })
        .catch(function (error) {
            console.log(error);
        });
    }