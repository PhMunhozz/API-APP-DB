<table class="table table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Data de Cadastro</th>
        </tr>
    </thead>
    <tbody>
        <?
            foreach($clientes as $c) {
                ?>
                    <tr class="clickable-row" onclick="window.location='index.php?&page=clientes.php&id=<? echo $c['id']; ?>';" >
                        <td><? echo $c['id']; ?></td>
                        <td><? echo $c['nome']; ?></td>
                        <td><? echo $c['email']; ?></td>
                        <td><? echo $c['telefone']; ?></td>
                        <td><? echo $c['created_at']; ?></td>
                    </tr>
                <?
            }
            ?>
    </tbody>
</table>
<p><b><small>Total de registros: <? echo count($clientes); ?></small></b></p>