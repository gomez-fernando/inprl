<?php
require_once 'models/usuario.php';

class usuarioController{
  public function signIn(){
    //renderizar vista
    require_once 'views/usuario/signIn.php';
  }

  public function signUp(){
    //renderizar vista
    require_once 'views/usuario/signUp.php';
  }

  public function seleccionar_accion(){
    //renderizar vista
    require_once 'views/usuario/seleccionar.php';
  }


  public function save(){
    if (isset($_POST)) {
      $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
      $password = isset($_POST['password']) ? $_POST['password'] : false;

      if ($nombre  && $password) {
        $usuario = new Usuario();
        $usuario->setNombre($nombre);
        $usuario->setPassword($password);


        $save = $usuario->save();
        if ($save) {
          $_SESSION['register'] = "complete";

          echo 'hola ssave';
          var_dump($_SESSION['register']);
          header('Location: ' . base_url . 'index.php?controller=usuario&action=signIn');
        } else{
          $_SESSION['register'] = "failed";

          echo 'noooo ssave';
          var_dump($_SESSION['register']);
          header('Location: ' . base_url . 'index.php?controller=usuario&action=signUp');
        }
      } else {
        $_SESSION['register'] = "failed";

        header('Location: ' . base_url . 'index.php?controller=usuario&action=signUp');

      }
    } else {
      $_SESSION['register'] = "failed";
      header('Location: ' . base_url . 'index.php?controller=usuario&action=signUp');
    }
  }

  public function verifyLogin(){
    // header('Location: informacion_riesgos.html');

    // echo "<h1>dsssssssssssssss</h1>";
    // var_dump($_POST['login']);
    // die();
    //verificar los datos de logIn

    // var_dump($_POST['login']);
    // die();

    if (isset($_POST)) {
      
      $user = new Usuario();
      $user->setLogin($_POST['login']);
      $user->setPassword($_POST['loginPassword']);
      
      
      
      $identity = $user->verifyLogin();
      // $nuevoUsuario = new Usuario();
      
      // $nombre = $identity->getNombre();
      // echo 'nombre: ';
      // var_dump($nombre);
      // die();
      
      //crear una sesión
      if ($identity && is_object($identity)) {
        //creamos sesión
        $_SESSION['identity'] = $identity;
        // $nuevo = new Usuario();



        // var_dump($_SESSION['identity']);
        // // var_dump($_POST['loginPassword']);
        // die();



        //
        // var_dump($identity);
        // die();

        //creamos sesión de administrador
        // if ($identity->role == 'admin') {
        //   $_SESSION['admin'] = true;
        //
        //
        // }
        header('Location: ' . base_url . 'index.php?controller=usuario&action=seleccionar_accion');
        // header('Location: ' . base_url . 'index.php?controller=hojaDiaria&action=insertDate');

      } else{
        $_SESSION['errorLogin'] = 'El nombre o la contraseña son incorrectos';
        header('Location: ' .base_url . 'index.php?controller=usuario&action=signIn');
      }
    } else header('Location: ' .base_url . 'index.php?controller=usuario&action=signIn');

  }

  // public function unsetSession(){
  //   if (isset($_SESSION['identity'])) {
  //     unset($_SESSION);
  //     session_destroy();
  //   }


  //   header('Location: ' .base_url);
  // }

  public function logout(){
		if(isset($_SESSION['identity'])){
      unset($_SESSION['identity']);
      session_destroy();
		}
		
		if(isset($_SESSION['admin'])){
      unset($_SESSION['admin']);
      session_destroy();
		}
		
		header("Location:".base_url);
	}
}
