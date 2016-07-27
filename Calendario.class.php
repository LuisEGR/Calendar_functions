<?php
/**
 * Contiene funciones útiles para manejar elementos del calendario Gregoriano
 * Tales como Meses, Semanas, Dias, etc.
 * @author Luis E. González <luisegr149@gmail.com>
 * @version 1.0
 */
class Calendario
{
	private $year;
  private $numWeeks;
	private $meses = [
                  "Enero",
                  "Febrero",
                  "Marzo",
                  "Abril",
                  "Mayo",
                  "Junio",
                  "Julio",
                  "Agosto",
                  "Septiembre",
                  "Octubre",
                  "Noviembre",
                  "Diciembre"
                 ];
  /**
   * Crea una instancia de la clase Calendario, para determinado año.
   * @param int @year
   */
	public function __construct($year)
	{
		$this->year = $year;
    $this->numWeeks = $this->getNumberOfWeeksInYear();
	}
  /**
   * Obtener el nombre del mes
   * @param int $m - Mes
   * @return string
   */
  public function getMes($m)
  {
      return $this->meses[$m];
  }
	/**
	 * Obtener el número de semanas en determinado mes
	 * @param int $month
	 * @return int
	 */
	public function getSemanasEnElMes($month)
	{
    $beg = (int) date('W', strtotime("first Monday of $this->year-$month"));
    $end = (int) date('W', strtotime("last  Monday of $this->year-$month"));
    return ($end - $beg) + 1;
    // print(join(', ', range($beg, $end)));
	}

	/**
   * Obtener la fecha inicial y final de determinada semana.
   * De acuerdo al ISO 8601 - Lunes a Domingo
	 * @param int $week
	 * @return Array[2]
	 */
	public function getStartAndEndDate($week)
	{
		return [(new DateTime())->setISODate($this->year, $week)->format('d/m/Y') , //start date
		(new DateTime())->setISODate($this->year, $week, 7)->format('d/m/Y') //end date
		];
	}
	/**
	 * Obtener el numero de semanas que hay en el año
	 * @return integer
	 */
  public function getNumWeeks(){
    return $this->numWeeks;
  }

	private function getNumberOfWeeksInYear()
	{
		return idate('W', mktime(0, 0, 0, 12, 27, $this->year));
	}
	/**
	 * Obtener el número de mes al que corresponde cierto número de semana
	 * @param int $WeekNumber No. de semana del año
	 * @return integer
	 */
	public function getMonthByWeekNumber($WeekNumber)
	{
		// $f = '2010-W50'
		$wn = $s = sprintf('%02d', $WeekNumber);
		$f = $this->year . "-W" . $wn . "-1";
		// echo $f;
		return date('n', strtotime($f));
	}
}
?>
