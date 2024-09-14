<a href="index.php?&page=produtos.php">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#212529" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
    </svg>
</a>

<div class="card mb-3 mt-5 offset-md-3" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="images/produto<? echo $_GET['id'] ?>.jpg" class="img-fluid rounded-start" alt="<? echo $produto['produto'] ?>" width="500px" height="600px">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><? echo $produto['produto']; ?></h5>
                <p class="card-text">Estoque: <? echo $produto['quantidade']; ?></p>
                <p class="card-text"><small class="text-body-secondary">Cadastrado em: <? echo $produto['created_at']; ?></small></p>
                <!-- <form name="form1" method="POST"> -->
                    <button class="btn btn-dark btn-sm" type="button" name="comprar" value="">Comprar agora</button>
                    <button class="btn btn-primary btn-sm" type="button" name="adicionar">Adicionar ao carrinho</button>
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>