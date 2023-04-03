<?php
/**
 * Rectificar la hora en el servidor de bases de datos
 * Siteground no permite cambiar este parámetro
 * 
 */

class CustomTime
{
    protected $days;
    protected $newDate;
    // private $pdo;

    // TODO crear parametro apra dias atrás en el reporte...

    public function __construct($days = "-32 days")
    {
        $this->newDate = new DateTime();
        $this->days = $days;
    }


    public function today()
    {
        $timezone = new DateTimeZone('America/Caracas');
        $today = new DateTime('now', $timezone);
        $today = $this->newDate->format('Y-m-d H:i:s');
        return $today;
    }

    public function before()
    {
        $timezone = new DateTimeZone('America/Caracas');
        $before = new DateTime();
        $before->modify($this->days);
        $before->setTimezone($timezone);
        return $before->format('Y-m-d H:i:s');
    }

/* public function before()
{
// $before = $this->newDate->format('Y-m-d H:i:s');
$before = $this->newDate->modify($this->days)->format('Y-m-d H:i:s');
return $before;
} */
}