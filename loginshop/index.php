<!-- Cabeçalho -->
<?php
include_once '../../includes/config.php';

session_start();
ob_start();

/* mudar para shop*/

$dadoslogin = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//echo "admin".password_hash(123,PASSWORD_DEFAULT);

if (!empty($dadoslogin['btnlogin'])) {

$buscalogin = "SELECT *, DATE_FORMAT(shop_date, '%d/%m/%Y') AS datebr
                        FROM shop
                        WHERE shop_email = :shop AND shop_status = 'online'
                        LIMIT 1";
           
$resultado= $conn->prepare($buscalogin); 
$resultado->bindParam(':shop', $dadoslogin['shop'],PDO::PARAM_STR);
$resultado->execute();

if(($resultado) AND ($resultado->rowCount()!= 0)){
    $resposta = $resultado->fetch(PDO::FETCH_ASSOC);
    

// salvando dados na variavel

    if(password_verify($dadoslogin['pass'],$resposta['shop_password'])){
      $_SESSION['shop_name'] = $resposta['shop_name'];
      $_SESSION['shop_email'] = $resposta['shop_email'];
      $_SESSION['shop_photo'] = $resposta['shop_photo'];
      $_SESSION['shop_id'] = $resposta['shop_id'];
      $_SESSION['datebr'] = $resposta['datebr'];
      
      //ta dando erro no horario
      $sid = $resposta['shop_id'];
      date_default_timezone_set('America/Sao_Paulo');
      $date = date('y-m-d H:i:s');

      $SQL = "UPDATE shop SET shop_lastlogin = :date WHERE shop_id = $sid";
      $resul=$conn->prepare($SQL);
      $resul->bindParam(':date', $date,PDO::PARAM_STR);
      $resul->execute();

     
       //header("location:../../shopdashboard");
       header("location:../shop");
     
    }else{
      $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
                          Error: Usuário ou senha inválidos!
                         </div>';
    }
}   else{
  $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
                        Error: Usuário ou senha inválidos!
                      </div>';
}
}
if(isset($_SESSION['msg'])){
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Lojista - Venus Shop</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="login.css">
</head>

<body>

  <header>
  </header>

  <main>
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-12 col-lg-11 col-xl-10">
          <div class="card d-flex mx-auto my-5">
            <div class="row">
              <div class="col-md-5 col-sm-12 col-xs-12 c1 p-5">
                <img src="/img/adminlogin.jpg" width="300px" height="300px" class="mx-auto d-flex" alt="Teacher">
                <div class="row justify-content-center">
                  <div class="w-75 mx-md-5 mx-1 mx-sm-2 mb-5 mt-4 px-sm-5 px-md-2 px-xl-1 px-2">
                    <h1 class="wlcm">Olá, lojista!</h1>
                    <span class="sp1">
                      <span class="px-3 bg-danger rounded-pill"></span>
                      <span class="ml-2 px-1 rounded-circle"></span>
                      <span class="ml-2 px-1 rounded-circle"></span>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-7 col-sm-12 col-xs-12 c2 px-5 pt-5">
                <form method= "post" action="" class="px-5 pb-5">
                  <div class="d-flex">
                    <h3 class="font-weight-bold">Entrar na sua loja</h3>
                  </div>
                  <input type="email" name="shop" placeholder="E-mail">
                  <input type="password" name="pass" placeholder="Senha">

                  <input type="submit" class="text-white text-weight-bold bt" name="btnlogin" value="entrar">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>


  <footer>
  </footer>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>