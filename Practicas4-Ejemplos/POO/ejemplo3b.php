    <html>
    <head>
    </head>
    <body>
    <?php
    class CabeceraPagina{
            //definimos los atributos como privados donde almacenaremos el texto a mostrar
            //y la ubicación del mismo.
            private $titulo;
            private $ubicacion;
     
            //Un método para inicializar los atributos
            public function inicializar ($tit, $ubi){
                    $this->titulo=$tit;
                    $this->ubicacion=$ubi;
            }
     
            //Función para escribir en pantalla, que recibe el parámetro ubicación y  el título que será
            //representado.
            public function mostrar(){
                    echo "<div style='font-size:40px;text-align:".$this->ubicacion."'>";
                    echo $this->titulo;
                    echo "<div>";
            }
    }
            //instanciamos el objeto como cabecerapagina
            $cabecera=new CabeceraPagina();
            //inicializamos los objetos
            $cabecera->inicializar("Entreunosyceros y sin decimales","center");
            //llamamos al método grafica para representar los valores pasado a inicializar
            $cabecera->mostrar();
     
     
    ?>
    </body>
    </html>