/* --------------------------- Inicio Nivel 1  -----------------------------------------*/
SELECT s.cnomseccion , s.estado , s.ctipseccion , s.cnivseccion , s.ccodseccion , s.cordcontenido
	, webmodulos.cnommodulo , IF((seccionmenu.ccodmenu IS NULL), 'Nada', seccionmenu.ccodmenu) AS ccodmenu , 
	IF((pagemenu.cnommenu IS NULL), 'Nada', pagemenu.cnommenu) AS cnommenu FROM webmodulos INNER JOIN seccion s ON (webmodulos.ccodmodulo = s.ccodmodulo) 
	LEFT JOIN seccionmenu ON (s.ccodseccion = seccionmenu.ccodseccion) LEFT JOIN pagemenu ON 
	(seccionmenu.ccodmenu = pagemenu.ccodmenu) WHERE s.estado<>-2 AND (s.cnivseccion =1 AND (seccionmenu.ccodmenu <> 
3 OR seccionmenu.ccodmenu IS NULL)) ORDER BY pagemenu.cnommenu,s.cordcontenido ASC
/* --------------------------- Fin  Nivel 1  -----------------------------------------*/

$codsec= SUBSTR($registro['ccodseccion'],0,12);  /* Utilizado en while 2 para Menu Nivel2 */

Por Marca de Vehiculo =  121728122014 000000000000   /*12*/
Repuestos	      =  121728122000 000000000000

/* --------------------------- Inicio Nivel 2  -----------------------------------------*/
SELECT s.cnivseccion,s.cnomseccion,s.ctipseccion,s.cordcontenido,s.ccodmodulo,s.ccodseccion,s.estado, m.cnommodulo 
FROM seccion s, webmodulos m WHERE s.estado<>-2 
AND s.ccodmodulo=m.ccodmodulo AND ccodseccion LIKE '121728122014%' AND s.cnivseccion='2' ORDER BY s.cordcontenido ASC
/* --------------------------- Fin Nivel 2  -----------------------------------------*/

$codsec2= SUBSTR($row2['ccodseccion'],0,16);  /* Utilizado en while 3 para Menu Nivel3	*/

Por Marca de Vehiculo :
DFAC  		= 121728122014 0023 0000 0000  /* 12 y 16 */
CAMC  		= 121728122014 0008 0000 0000
CHANGAN   	= 121728122014 0001 0000 0000
SHENGLONG	= 121728122014 0002 0000 0000
CHUNZHOU	= 121728122014 0003 0000 0000
DONGFENG	= 121728122014 0004 0000 0000

/* --------------------------- Inicio Nivel 3  -----------------------------------------*/
SELECT s.cnivseccion,s.cnomseccion,s.ctipseccion,s.cordcontenido,s.ccodmodulo,s.ccodseccion,s.estado,m.cnommodulo 
FROM seccion s, webmodulos m WHERE s.estado<>-2 
AND s.ccodmodulo=m.ccodmodulo AND ccodseccion LIKE '1217281220140023%' AND s.cnivseccion='3' ORDER BY s.cordcontenido ASC
/* --------------------------- Fin Nivel 3  -----------------------------------------*/

DFAC :
DFA6920KB	=  121728122000 0004 0023 0001
		   121728122014 0023 0001	

