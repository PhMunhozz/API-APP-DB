<header class="container-fluid bg-dark text-white p-2"><h4>APP Consumidora</h4></header>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" onclick="<? echo "window.open('index.php?&page=inicio.php', '_self');" ?>" >APP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <?
        $query = "SELECT id, superior, tipo, nome, arquivo FROM menus WHERE ativo = 'S' AND superior IS NULL";
        $gestor = $db->prepare($query);
        $gestor->execute();
        $rows = $gestor->fetchAll(PDO::FETCH_ASSOC);

        foreach($rows as $r){
            
            if($r['tipo'] == 'G' or ($r['tipo'] == 'I' and !$r['arquivo'])) { 
              
              $cAtivo = "SELECT arquivo FROM menus WHERE ativo = 'S' AND superior = ".$r['id'];
              $gestorAtivo = $db->prepare($cAtivo);
              $gestorAtivo->execute();
              $rowsAtivo = $gestorAtivo->fetchAll(PDO::FETCH_ASSOC);
              
              foreach($rowsAtivo as $rAtivo){
                if($_GET['page'] == $rAtivo['arquivo']){
                  $ativo = 'S';
                  break;
                }
              }
              ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <? if($ativo == 'S') echo "active"; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="navbarDropdown">
                        <? echo $r['nome']; ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?
                        $query2 = "SELECT id, superior, tipo, nome, arquivo FROM menus WHERE superior = ".$r['id'];
                        $gestor2 = $db->prepare($query2);
                        $gestor2->execute();
                        $rows2 = $gestor2->fetchAll(PDO::FETCH_ASSOC);

                        foreach($rows2 as $r2){
                            if($r2['tipo'] == 'I' and !$r2['arquivo']){?>
                                <li class="dropdown-submenu dropdown-item">
                                    <a class="dropdown-item dropdown-toggle" href="#" id="dropdownSubmenu" data-bs-toggle="dropdown" aria-expanded="false">
                                        <? echo $r2['nome']; ?>
                                    </a>
                                    <ul class="submenu dropdown-menu" aria-labelledby="dropdownSubmenu"> <?
                                        
                                        $query3 = "SELECT id, superior, tipo, nome, arquivo FROM menus WHERE superior = ".$r2['id'];
                                        $gestor3 = $db->prepare($query3);
                                        $gestor3->execute();
                                        $rows3 = $gestor3->fetchAll(PDO::FETCH_ASSOC);

                                        foreach($rows3 as $r3){?>
                                            <li><a class="dropdown-item" href="#" onclick="<? echo "window.open('index.php?&page=".$r3['arquivo']."', '_self');" ?>"><? echo $r3['nome']; ?></a></li>
                                        <?}
                                    ?></ul>
                                </li>
                            <?} else{?>
                            <li><a class="dropdown-item" href="#" onclick="<? echo "window.open('index.php?&page=".$r2['arquivo']."', '_self');" ?>"><? echo $r2['nome']; ?></a></li>
                        <?}
                        }
                        ?>
                    </ul>
                </li>
        <?
            }
            else { ?>
                <li class="nav-item">
                    <a class="nav-link <? if($_GET['page'] == $r['arquivo']) echo "active"; ?>" aria-current="page" href="#" onclick="<? echo "window.open('index.php?&page=".$r['arquivo']."', '_self');" ?>"><? echo $r['nome']; ?></a>
                </li>
        <?
            }
        }
        ?>

      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>

  </div>
</nav>