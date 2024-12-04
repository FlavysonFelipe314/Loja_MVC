

<h1>olá <?= $nome?></h1>


<a href="<?= BASE_DIR?>logout">
    <button>Logout</button>
</a>
<a href="<?= BASE_DIR?>produtos">
    <button>Listar Produtos</button>
</a>


<button onclick="addProduct()">Cadastrar Produtos</button>


<div class="modal">
    <form action="<?= BASE_DIR?>add" enctype="multipart/form-data">
        <h1 onclick="closeModal()">X</h1>
        <input type="text" name="name" placeholder="Nome...">
        <input type="Number" name="price" placeholder="Preço...">
        <input type="text" name="description" placeholder="Descrição...">
        <input type="file" name="foto" accept="image/png, image/jpg, image/jpeg">
        <button type="submit">Cadastrar</button>
    </form>
</div>

<style>
    *{
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }
    .modal{
        width: 100%;
        height: 100vh;
        position: fixed;
        height: 0;
        overflow: hidden;
        transition: 0.3s;
        background-color: #000000cc;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal form{
        width: 90%;
        margin: 0 auto;
        background-color: #ddd;
        padding: 20px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .modal h1{
        width: 100%;
        text-align: end;
        cursor: pointer;
        font-size: 20px;
        margin: 0 0 20px 0;
    }

    .modal form input{
        width: 100%;
        margin: 0 auto;
    }

    .modal form button{
        margin: 20px 0 0 0;
    } 

    .aparece{
        height: 100vh !important;
    }

</style>

<script>
    let modal = document.querySelector('.modal');

    function addProduct(){
        modal.classList.add('aparece')
    }

    function closeModal(){
        modal.classList.remove('aparece')
    }
</script>
