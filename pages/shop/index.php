<?php
session_start();
ob_start();

//require '../../includes/footer.php';
include_once '../../includes/config.php';


$shop_id = $_SESSION['shop_id'];


$produtos = "SELECT p.prod_id, p.prod_name,p.prod_photo, p.prod_price, p.prod_size, p.prod_stock, p.prod_desc, p.prod_status, c.cat_name
     FROM products p, category c 
     WHERE shop = $shop_id 
     AND p.prod_cat = c.cat_id AND prod_status = 'online'";
           
$resultado= $conn->prepare($produtos); 
$resultado->execute();

?>

<!-- SESSÃO ABERTA DO HTML-->

<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venus Shop - O Sistema Delas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="../../layout2.css">
  </head>

  <body>

    <header>

      <nav class="navbar navbar-expand-lg navbar-light">
        <!--Nome + Icon-->
          <a class="navbar-brand" href="/"><img src="../../img/logo-2.png" alt="Logo da VenusShop" title="Venus Shop"></a>
          <!--Dropdown para telas menores-->  		
          <button type="button" data-target="#conteudoNavbarSuportado" data-toggle="collapse" class="navbar-toggle">
            <span class="navbar-toggler-icon"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <!-- Menu de links, usuário, pesquisa e adicionais -->
        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
          <ul class="nav navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="../../pages/about"><b>quem somos</b></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="../../pages/aboutshop"><b>você&venus</b></a>
            </li>
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>categorias</b></a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">					
                <a class="dropdown-item" href="#">moças</a>
                <a class="dropdown-item" href="#">pets</a>
                <a class="dropdown-item" href="#">beleza</a>
                <a class="dropdown-item" href="#">deco&casa</a>
                <a class="dropdown-item" href="#">escritório</a>
              </div>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#"><b>lojas</b></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#"><b>contato</b></a>
            </li>
          </ul>
        </div>
        <!--Barra de pesquisa-->
        <form id="search-box">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="pesquise em venus" name="search">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search" title="pesquisar"></i></button>
            </div>
          </div>
        </form>
        <ul class="nav navbar-nav navbar-inline" id="iuserm">
          
      <!-- Area do usuário  -->
      <?php 
     
     // Se o usuário está logado...
     if (isset($_SESSION['user_name'])) :

     ?>
            <!--Perfil do usuário logado e tiver foto-->
            <li class="dropdown-user navbar-inline nav-profile">
              <a href="#" data-toggle="dropdown" class="dropdown-toggle user-action">
              <?php
                if (!empty($_SESSION['user_photo'])):
                  ?>
              <img src="../../pages/photousers/<?php echo $_SESSION['user_photo']?>">
              </a>
              <?php 
                else:
                  ?>
             <i class="fa-solid fa-circle-user" title="minha conta" alt="Minha conta"></i></a>
  
             <?php
               endif;
               ?>
              <ul class="dropdown-menu">
                <li class="nav-profile">
                  <?php
                if (!empty($_SESSION['user_photo'])):
                  ?>                
                <li class="nav-profile"><a href="../../pages/profile"><img src="../../pages/photousers/<?php echo $_SESSION['user_photo'] ?>">meu perfil</a></li>
                <?php 
                else:
                  ?>
                   <li><a href="../../pages/profile"><i class="fa-solid fa-user-astronaut"></i> meu perfil</a></li>                
                
               <?php
               endif;
               ?>
                <li><a href="#"><i class="fa-solid fa-bag-shopping"></i> continue comprando</a></li>
                <li><a href="#"><i class="fa-solid fa-heart"></i> favoritos</a></li>
                <li><a href="#"><i class="fa-solid fa-cart-shopping"></i> minhas compras</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="fa-solid fa-circle-question"></i> ajuda</a></li>
                <li><a href="#"><i class="fa-solid fa-gear"></i> configurações</a></li>
                <li class="divider"></li>
                <li><a href="../../pages/exit"><i class="fa-solid fa-right-from-bracket"></i> <b>sair</b></a></li>
              </ul>
            </li>
            <?php

      // Se não está logado...
      else :

      ?>
      <li>
      <li class="nav-item">
      <a class="nav-link" href="../../pages/login"><i class="fa-solid fa-circle-user" title="Fazer Login" alt="Fazer Login"></i></a>

      <?php
      endif;
      ?>

        </ul>
        <form class="form-inline my-2 my-lg-0" id="btnsair">
          <a href="../exit"><button type="button" class="btn">Logout</button></a>
        </form>
      </nav>

    </header>



<!-- Podemos acrescentar um botão pra ver os produtos offline, e a questão do estoque, se ele tiver zerado, ter alguma coisa diferente.  -->
<!-- Pensei em um menu ao lado com opções do que ele pode fazer, como editar os produtos, cadastrar produtos e na area principal pode ficar os produtos mais vendidos-->

<main>
<div class="perfil-bonito">
  <h2 class='text-center'>Olá, <?php echo $_SESSION['shop_name']?>!</h2>
   <div class="perfil">

   <?php
   if (!empty($_SESSION['shop_photo'])) :
    ?>
       <a title="Editar foto" <?php echo "href='../editshopft?id=$shop_id'"?>>
        <img src="<?php echo $_SESSION['shop_photo'] ?>"width="150" height="150"> 
      </a>
      <?php
      // Se não está logado...
      else :
      ?>
      <a <?php echo "href='../editshopft?id=$shop_id'"?>><button type="submit" class="btn">Carregue a foto da sua loja</button></a>
    
<?php
      endif;
      ?>
     
      <ul>
        <li><?php echo $_SESSION['shop_name'] ?></li>
        <li>Membro desde <?php echo $_SESSION['datebr'] ?></li>
        <li>Total de itens vendidos : </li>
      </ul>
    </div>
</div>
<a href='../cadprod'>
<input type="submit" class="btn btn-primary" name="editar" value="Cadastrar Produto">
</a>
<h2 class="text-center">Seus Produtos</h2>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Foto</th>
      <th scope="col">Nome</th>
      <th scope="col">Valor</th>
      <th scope="col">Tamanho</th>
      <th scope="col">Quantidade</th>      
      <th scope="col">Descrição</th>
      <th scope="col">Categoria</th>
      <th scope="col">Status</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
 
<?php

if(($resultado) AND ($resultado->rowCount()!= 0)){
   while($resposta = $resultado->fetch(PDO::FETCH_ASSOC)){

   extract($resposta);

?> 

 <tr>
        <td scope="row">
          <a title="Editar foto" <?php echo "href='../editprodft?id=$prod_id'"?>>
            <img src="<?php echo $prod_photo ?>" width="150" height="150">
          </a>
        </td>
        <td> <?php echo $prod_name ?> </td>
        <td><?php echo $prod_price ?></td>
        <td><?php echo $prod_size ?></td>
        <td><?php echo $prod_stock ?></td>
        <td><?php echo $prod_desc ?></td>
        <td><?php echo $cat_name ?></td>
        <td><?php echo $prod_status ?></td>
        <td>
        <?php echo "<a href='../editprod?id=$prod_id'>"; ?>
        <input type="submit" class="btn btn-primary" name="edit" value="Editar">
        </td>
        <td>
        <?php echo "<a href='../delprod?id=$prod_id'>" ?>
        <input type="submit" class="btn btn-danger" name="delete" value="Excluir">
        </td>
      </tr>

<?php
  }

}
?>
   
   </tbody>
 </table>

</main>


<?php
if(!isset($_SESSION['shop_name'])){
  $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
  Erro: Necessário realizar login
 </div>';
  header("Location: ../login");
}

require '../../includes/footer.php';
?>
