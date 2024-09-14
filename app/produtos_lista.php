<table class="table table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Produto</th>
            <th>Estoque</th>
            <th>Data de Cadastro</th>
        </tr>
    </thead>
    <tbody>
        <?
            foreach($produtos as $p) {
                ?>
                    <tr class="clickable-row" onclick="window.location='index.php?&page=produtos.php&id=<? echo $p['id']; ?>';" >
                        <td><? echo $p['id']; ?></td>
                        <td><? echo $p['produto']; ?></td>
                        <td><? echo $p['quantidade']; ?></td>
                        <td><? echo $p['created_at']; ?></td>
                    </tr>
                <?
            }
            ?>
    </tbody>
</table>
<p><b><small>Total de registros: <? echo count($produtos); ?></small></b></p>
