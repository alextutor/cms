/* --------------------------- Inicio Nivel 1  -----------------------------------------*/
SELECT s.cnomseccion , s.estado , s.ctipseccion , s.cnivseccion , s.ccodseccion , s.cordcontenido
	, webmodulos.cnommodulo , IF((seccionmenu.ccodmenu IS NULL), 'Nada', seccionmenu.ccodmenu) AS ccodmenu , 
	IF((pagemenu.cnommenu IS NULL), 'Nada', pagemenu.cnommenu) AS cnommenu FROM webmodulos INNER JOIN seccion s ON (webmodulos.ccodmodulo = s.ccodmodulo) 
	LEFT JOIN seccionmenu ON (s.ccodseccion = seccionmenu.ccodseccion) LEFT JOIN pagemenu ON 
	(seccionmenu.ccodmenu = pagemenu.ccodmenu) WHERE s.estado<>-2 AND (s.cnivseccion =1 AND (seccionmenu.ccodmenu <> 
3 OR seccionmenu.ccodmenu IS NULL)) ORDER BY pagemenu.cnommenu,s.cordcontenido ASC
/* --------------------------- Fin  Nivel 1  -----------------------------------------*/

$codsec= SUBSTR($registro['ccodseccion'],0,12);  /* Utilizado en while 2 para Menu Nivel2 */

Repuestos 	= 121728122000 000000000000   /*12*/
Servicios 	= 121728122001 000000000000
Cotizar   	= 121728122002 000000000000
Ofertas   	= 121728122003 000000000000
Empresa   	= 121728122004 000000000000
Ubicacion 	= 121728122005 000000000000
Contactenos 	= 121728122013 000000000000

/* --------------------------- Inicio Nivel 2  -----------------------------------------*/
SELECT s.cnivseccion,s.cnomseccion,s.ctipseccion,s.cordcontenido,s.ccodmodulo,s.ccodseccion,s.estado, m.cnommodulo 
FROM seccion s, webmodulos m WHERE s.estado<>-2 
AND s.ccodmodulo=m.ccodmodulo AND ccodseccion LIKE '121728122001%' AND s.cnivseccion='2' ORDER BY s.cordcontenido ASC
/* --------------------------- Fin Nivel 2  -----------------------------------------*/

$codsec2= SUBSTR($row2['ccodseccion'],0,16);  /* Utilizado en while 3 para Menu Nivel3	*/

Repuestos : 
Por Marca de Vehiculo  = 121728122000 0004 00000000   /* 12 y 16 */
Por Marca de Motor     = 121728122000 0002 00000000

Servicios :
Bomba de Combustible   = 121728122001 0001 00000000   /* 12 y 16 */
Bomba de Inyeccion     = 121728122001 0002 00000000
Culata                 = 121728122001 0003 00000000

/* --------------------------- Inicio Nivel 3  -----------------------------------------*/
SELECT s.cnivseccion,s.cnomseccion,s.ctipseccion,s.cordcontenido,s.ccodmodulo,s.ccodseccion,s.estado,m.cnommodulo 
FROM seccion s, webmodulos m WHERE s.estado<>-2 
AND s.ccodmodulo=m.ccodmodulo AND ccodseccion LIKE '1217281220000004%' AND s.cnivseccion='3' ORDER BY s.cordcontenido ASC
/* --------------------------- Fin Nivel 3  -----------------------------------------*/

$codsec3= SUBSTR($row3['ccodseccion'],0,20);  /* Utilizado en while 4 para Menu Nivel4 */

Por Marca de Vehiculo :
DFAC  		= 121728122000 0004 0023 0000  /* 12 y 16 y 20 */
CAMC  		= 121728122000 0004 0008 0000
CHANGAN   	= 121728122000 0004 0001 0000
SHENGLONG	= 121728122000 0004 0002 0000
CHUNZHOU	= 121728122000 0004 0003 0000
DONGFENG	= 121728122000 0004 0004 0000

/* --------------------------- Inicio Nivel 4  -----------------------------------------*/
SELECT s.cnivseccion,s.cnomseccion,s.ctipseccion,s.cordcontenido,s.ccodmodulo,s.ccodseccion,s.estado,m.cnommodulo 
FROM seccion s, webmodulos m WHERE s.estado<>-2 
AND s.ccodmodulo=m.ccodmodulo AND ccodseccion LIKE '12172812200000040008%' AND s.cnivseccion='4' ORDER BY s.cordcontenido ASC
/* --------------------------- Fin  Nivel 4  -----------------------------------------*/

DFAC :
DFA6920KB	=  121728122000 0004 0023 0001

CAMC :
HN3230P38D1M3	=  121728122000 0004 0008 0002
HN1250P38E8M31  =  121728122000 0004 0008 0003


/* ------- Inicio Nivel 3 Pasa a Nivel 2  en mover-seccion.php  ---------------------*/
UPDATE seccion SET	ccodseccion ='121728122014000000230000', cnivseccion	='2' WHERE ccodseccion='121728122000000400230000'
/* ------- Fin    Nivel 3 Pasa a Nivel 2  en mover-seccion.php  ---------------------*/