<html>
<head>
<title>Pruebas</title>
</head>
<body>
<?php
class Tabla { 
private $mat; 
private $cantFilas;
private $cantColumnas;

public function __construct($fi,$co)
{
$this->cantFilas=$fi;
$this->cantColumnas=$co;
$this->mat=array();
}

public function cargar($fila,$columna,$valor)
{
$this->mat[$fila][$columna]=$valor;
}

public function inicioTabla()
{
echo '<table border="1">';
}

public function inicioFila()
{
echo '<tr>';
}
public function mostrarCelda($fi,$co)
{
echo '<td>'.$this->mat[$fi][$co].'</td>';
}

public function finFila()
{
echo '</tr>';
}

public function finTabla()
{
echo '</table>';
}

public function mostrar()
{
$this->inicioTabla(); 
for($f=1;$f<=$this->cantFilas;$f++)
{
$this->inicioFila();
for($c=1;$c<=$this->cantColumnas;$c++)
{
$this->mostrarCelda($f,$c);
}
$this->finFila();
}
$this->finTabla();
}
}

$tabla1=new Tabla(2,3);
$tabla1->cargar(1,1,'1');
$tabla1->cargar(1,2,"2");
$tabla1->cargar(1,3,"3");
$tabla1->cargar(2,1,"4");
$tabla1->cargar(2,2,"5");
$tabla1->cargar(2,3,"6");
$tabla1->mostrar();
?>
</body>
</html>
