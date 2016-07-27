# Calendar_functions
Funciones útiles para el manejo de fechas del calendario

##Configuración inicial:  
   
`include_once "Calendario.class.php"; `  
`$Calendario = new Calendario(2016);` _//Instancia de la clase Calendario_  
    
##Funciones  
_// Valores de ejemplo_
_// Fecha Actual: 26/7/2016 13:51:54 GMT-5:00 DST _    
_// Semana actual : 30  - ISO8601(Lun-Dom)_  
  
`$Calendario->getMes();` _//Julio_  
`$Calendario->getSemanasEnElMes();` _//4_  
`$Calendario->getStartAndEndDate(30);` _//["25/07/2016", "31/07/2016"]_   
`$Calendario->getNumWeeks();` _//52_  
`$Calendario->getNumberOfWeeksInYear();` _//52 - Recalculated_  
`$Calendario->getMonthByWeekNumber(30);` _//7_  



