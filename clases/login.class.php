<?php
    class Login{
        
    private $user;
    private $pass;
    
    public function getUrl($id){
        require_once('Coneccion.class.php');
        $coneccion=new Coneccion();
        $link=$coneccion->conectar();

        $consulta = "SELECT url_avatar FROM usuarios WHERE usuarios.id='$id'";

        $resultado = $link->query($consulta);
        $rows= array();
        while ($row = $resultado->fetch_assoc()) {
            $rows[] = $row;
        }
        
        $array = json_encode($rows);
     
         $array_decode = json_decode($array,true);//LO CONVIERTO A ARRAY PARA USAR FOREACH

                              foreach($array_decode as $ar)
                              {
                                echo $ar['url_avatar'];
                              }
        $link->close();

    }
    
    public function Iniciar(){  
        try{
                if(!empty($_POST['usuario'] and !empty($_POST['password']))){
                            require_once('Coneccion.class.php');
                            $coneccion=new Coneccion();
                            $link=$coneccion->conectar();

                            $this->user = $_POST['usuario'];
                            $this->pass = $_POST['password'];

                            $consulta = "SELECT * FROM usuarios WHERE usuario='$this->user' AND password='$this->pass'";

                            $resultado = $link->query($consulta);

                            if (mysqli_num_rows($resultado)>0){

                                     $datos=mysqli_fetch_array($resultado); //cuando es un solo dato  
                                     $_SESSION['logueado'] = true;
                                     $_SESSION['usuario'] = $datos['usuario'];
                                     $_SESSION['id']=$datos['id'];
                                     $_SESSION['url']=$datos['url_avatar'];
                                     mysqli_free_result($resultado);   
                                     echo 1;
                            } else {
                                throw new Exception(2);
                            }
                } else {
                    throw new Exception('ERROR DATOS VACIOS');
                }
                mysqli_free_result($resultado);
                $link->close();  
        } catch(Exception $e) {
            echo $e->getMessage();
        }
        
        
    }
        public function Cerrar(){
            session_destroy();
        }
    
}
      
?>