<?php
require'../classes/AutoLoad.php';

$usuario = new Usuario();
$usuario->read();
$claveRepetida = Request::read('claveRepetida');
$resultado = -1;
if(Filter::isEmail($usuario->getCorreo()) && $usuario->getClave() === $claveRepetida) {
    $claveEnriptada = Util::encriptar($usuario->getClave());
    $usuario->setClave($claveEnriptada);
    $db = new DataBase();
    $manager = new ManageUsuario($db);
    $resultado = $manager->addUsuario($usuario);
    
    if ($resultado > 0) {
        $enlaceActivacion = '<a href="https://daw-mavalfer.c9users.io/DesarrolloServidor/agenda/usuario/doactivar.php?id=' . $resultado . '&data=' . sha1($usuario->getCorreo()) . '"></a>';
        $resultado2 = Util::enviarCorreo ('mvalfer92@gmail.com', 'AppAgenda', $enlaceActivacion);
    }
    
    //enviarCorreoVerificacion();
    //para probar vamos a enviar primero un correo a nosotros mismo
    
    $db->closeConnection();
}
header('Location: ../?op=alta&r=' . $resultado);
//resultado:  0 -> correo ya existe
//           -1 -> correo incorrecto o claves no iguales
//            + -> ok

// <?php
// require '../../classes/AutoLoad.php';
// $db = new DataBase();
// $gestor = new ManagerUsuario($db);

// $correo = Request::read('correo');
// $pass1 = Request::read('clave');
// $pass2 = Request::read('pass');

// if(Filter::isEmail($correo)){
//     if($pass1 === $pass2){
//         $opciones = array(
//             'cost' => 10 
//         );
//         $user = new Usuario(0 , $correo , $pass1 , 0);
//         $res = $gestor->add($user);
//         if($res > 0){
//             header('Location: ../../index.php?r=true');
//             $enlace = '<a href="https://ej-php-joseantoniolpz.c9users.io/Agenda/ruta/registro/doActiva.php?id=' . $res . '&data=' . sha1($user->getCorreo()) . '></a>';
//             $resultado2 = Util::enviarCorreo ('joseantoniolopez241197@gmail.com', 'Verificar correo', $enlace);
//         }
       
//     }else{
//         header('Location: ../../index.php?r=false');
//     }
// }else{
//     header('Location: ../../login.php?r=false');
// }
