<html>
<head>
<title>Pruebas</title>
</head>
<body>
<?php
class Opcion { 
private $titulo; 
private $enlace;
private $colorFondo;
 
public function __construct($tit,$enl,$cfon)
{
$this->titulo=$tit;
$this->enlace=$enl;
$this->colorFondo=$cfon;
}
public function mostrar()
{
echo '<a style="background-color:'.$this->colorFondo.
'" href="'.$this->enlace.'">'.$this->titulo.'</a>';
}
}

class Menu {
private $opciones=array();
private $direccion; //orientacion del menú horizontal o vertical
 
public function __construct($dir)
{
$this->direccion=$dir;
}
public function insertar($op)
{
$this->opciones[]=$op; //$op ES UN OBJETO
}
private function mostrarHorizontal()
{
for($f=0;$f<count($this->opciones);$f++)
{
$this->opciones[$f]->mostrar();
}
}
private function mostrarVertical()
{
for($f=0;$f<count($this->opciones);$f++)
{
$this->opciones[$f]->mostrar(); echo '<br>';
}
}
public function mostrar()
{
if (strtolower($this->direccion)=="horizontal")
$this->mostrarHorizontal(); 
else if (strtolower($this->direccion)=="vertical")
$this->mostrarVertical();
}
}

$menu1=new Menu('horizontal');
$opcion1=new Opcion('Google','http://www.google.com','#C3D9FF');
$menu1->insertar($opcion1);
$opcion2=new Opcion('Yahoo','http://www.yahoo.com','#CDEB8B');
$menu1->insertar($opcion2);
$opcion3=new Opcion('MSN','http://www.msn.com','#C3D9FF');
$menu1->insertar($opcion3);
$menu1->mostrar();
?>
</body>
</html>
