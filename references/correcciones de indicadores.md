# Correcciones de indicadores

**Archivo revisado:** `Indicadores_SISAT_Tabla1.xlsx` (hojas «Matriz de indicadores», «Aplicabilidad Tabla 2» y «Notas y criterios»).
**Contrastado con:** `sisat normativa.pdf`, Acuerdo Ministerial MSP 00004-2026. Tabla 1 (Art. 15, págs. 12–16), Tabla 2 (Art. 16, pág. 17) y artículos 3 a 47.
**Fecha de revisión:** 24-11-2026.

## Resumen

| Aspecto revisado | Resultado |
|---|---|
| Cada literal de la Tabla 1 tiene al menos un indicador | Correcto. Los 52 literales de los 10 componentes están cubiertos. |
| Cada indicador corresponde a la actividad de su literal | Correcto en los 100 indicadores. Hay una observación opcional (sección 5). |
| Hoja «Aplicabilidad Tabla 2» frente a la Tabla 2 del PDF | Correcta, celda por celda. |
| Columna M «Categorías SISAT que lo aplican» | **1 error** (indicador 8). |
| Columnas K «Responsable» y L «Apoyo» frente a la Tabla 1 | **25 indicadores con errores.** |
| Columna N «Base legal» | **1 cita incorrecta** (indicador 42). |
| Notas de las hojas 3 y 4 | **2 notas incorrectas o desactualizadas.** |

Las correcciones se refieren al N° de la columna A de la hoja «Matriz de indicadores».

---

## 1. Categorías de aplicación (columna M)

| N° | Literal | Valor actual | Valor correcto | Motivo |
|---|---|---|---|---|
| 8 | 1.f Planificación de la gestión preventiva | II–V | **IV–V** | En la Tabla 2 las categorías II y III solo incluyen «1. a, b, c, d, e». La «Planificación de la gestión preventiva» es el literal **f)** de la Tabla 1 (pág. 13), así que solo la cubren las categorías IV y V («1», todos los literales). |

También hay que cambiar la columna C del indicador 8 de `f*` a `f`, porque el literal f) sí aparece en la Tabla 1.

> **Ambigüedad del reglamento:** la nota 1 de la Tabla 2 numera los literales del componente 1 de otra forma (llama «d)» a la revisión de datos y «e)» a la planificación). Esa nota no coincide con la Tabla 1, que es la que el Art. 16 manda seguir («en concordancia con los componentes del artículo que antecede»). Esta corrección sigue la Tabla 1. Es la misma lectura que ya usa el sistema en `database/seeders/SisatSeeder.php`, donde `management_planning` solo aparece desde 100 trabajadores. Conviene confirmarlo con la Autoridad Sanitaria Nacional.

---

## 2. Responsable y apoyo (columnas K y L)

Valores tomados de la Tabla 1 (Art. 15). «Monitor» = Monitor / Técnico SHT; «Prof. salud» = Profesionales de la salud. Cuando la Tabla 1 pone dos responsables en el mismo literal, se escriben los dos.

| N° | Literal | Columna | Valor actual | Valor correcto (Tabla 1) | Pág. |
|---|---|---|---|---|---|
| 18 | 2.1.d Evaluación de higiene del trabajo | L Apoyo | NA | **Prof. salud** | 13 |
| 19 | 2.1.d Evaluación de higiene del trabajo | L Apoyo | NA | **Prof. salud** | 13 |
| 22 | 2.2.a Matriz de exámenes ocupacionales | L Apoyo | Monitor | **NA** | 13 |
| 41 | 2.3.h Informe epidemiológico al empleador | L Apoyo | Monitor | **NA** | 14 |
| 43 | 3.a Comunicación al trabajador | L Apoyo | NA | **Monitor** | 14 |
| 44 | 3.b Capacitación en SST | L Apoyo | Monitor | **NA** | 14 |
| 45 | 3.b Capacitación en SST | L Apoyo | Monitor | **NA** | 14 |
| 46 | 3.b Capacitación en SST | L Apoyo | Monitor | **NA** | 14 |
| 62 | 6.d Entrenamiento de primera respuesta | L Apoyo | Prof. salud | **NA** | 14 |
| 63 | 6.e Brigadistas | K Responsable | Monitor | **Monitor / Prof. salud** | 14–15 |
| 63 | 6.e Brigadistas | L Apoyo | Prof. salud | **NA** | 14 |
| 64 | 6.e Brigadistas | K Responsable | Monitor | **Monitor / Prof. salud** | 14–15 |
| 64 | 6.e Brigadistas | L Apoyo | Prof. salud | **NA** | 14 |
| 65 | 6.f Dotación e inspección de equipos de emergencia | K Responsable | Prof. salud | **Monitor** | 15 |
| 65 | 6.f Dotación e inspección de equipos de emergencia | L Apoyo | Monitor | **Prof. salud** | 15 |
| 66 | 6.f Dotación e inspección de equipos de emergencia | K Responsable | Prof. salud | **Monitor** | 15 |
| 66 | 6.f Dotación e inspección de equipos de emergencia | L Apoyo | Monitor | **Prof. salud** | 15 |
| 69 | 7.a Identificación de GES con agentes etiológicos | K Responsable | Monitor | **Prof. salud** | 15 |
| 69 | 7.a Identificación de GES con agentes etiológicos | L Apoyo | NA | **Monitor** | 15 |
| 75 | 8.a Programa de inmunizaciones | L Apoyo | Monitor | **NA** | 15 |
| 88 | 9.f Expediente de salud actualizado | L Apoyo | Prof. salud | **NA** | 15 |
| 90 | 9.g Evidencia de cumplimiento | L Apoyo | NA | **Monitor** | 15 |
| 91 | 9.h Registros solicitados por entes de control | K Responsable | Monitor | **Monitor / Prof. salud** | 15–16 |
| 91 | 9.h Registros solicitados por entes de control | L Apoyo | Monitor | **NA** | 15 |
| 94 | 10.b Análisis de datos de condiciones de trabajo y salud | K Responsable | Monitor | **Monitor / Prof. salud** | 16 |
| 94 | 10.b Análisis de datos de condiciones de trabajo y salud | L Apoyo | Monitor | **NA** | 16 |
| 95 | 10.c Investigación epidemiológica ocupacional | L Apoyo | NA | **Monitor** | 16 |
| 96 | 10.d Análisis de tendencias e indicadores | K Responsable | Prof. salud | **Monitor / Prof. salud** | 16 |
| 96 | 10.d Análisis de tendencias e indicadores | L Apoyo | Monitor | **NA** | 16 |
| 97 | 10.d Análisis de tendencias e indicadores | K Responsable | Prof. salud | **Monitor / Prof. salud** | 16 |
| 97 | 10.d Análisis de tendencias e indicadores | L Apoyo | Monitor | **NA** | 16 |
| 98 | 10.e Auditoría interna | K Responsable | Monitor | **Prof. salud** | 16 |
| 99 | 10.e Auditoría interna | K Responsable | Monitor | **Prof. salud** | 16 |
| 100 | 10.f Necesidades de nuevos servicios | L Apoyo | NA | **Monitor** | 16 |

---

## 3. Base legal (columna N)

| N° | Valor actual | Valor correcto | Motivo |
|---|---|---|---|
| 42 | Art. 15; Art. 10 num. 1 | **Art. 15 (Tabla 1, 3.a); Art. 45 num. 1** | El Art. 10 num. 1 da derecho a recibir los resultados de los exámenes, y eso ya lo mide el indicador 43. La comunicación de los riesgos del puesto se apoya en el literal 3.a y en el Art. 45 num. 1 (derecho del trabajador a ser informado de sus condiciones de salud y de trabajo). |

Las demás citas de la columna N corresponden al contenido de los artículos citados.

---

## 4. Notas de las hojas «Aplicabilidad Tabla 2» y «Notas y criterios»

| Ubicación | Texto actual (resumen) | Corrección |
|---|---|---|
| «Notas y criterios», punto 3 | La planificación de la gestión preventiva «aparece sin literal» en la Tabla 1 y se numera como f*. | La Tabla 1 sí la identifica como **f)** (pág. 13). Cambiar la nota para decir que es el literal f) de la Tabla 1 y que la nota 1 de la Tabla 2 usa otra numeración (ver sección 1). |
| «Aplicabilidad Tabla 2», nota 2 (fila 15) | Los centros con menos de 50 trabajadores y alto riesgo cumplen una categoría superior: «verifique la categoría en el original, porque el texto escaneado es ilegible». | El texto es legible (pág. 17): deben cumplir los componentes de la **categoría III**. Quitar la advertencia y poner la categoría. |
| «Notas y criterios», punto 4 | «b) Planes de seguridad» aparece junto al componente 5 en el escaneo y se asignó al 4 por su contenido. | En la Tabla 1 (pág. 14) el literal b) Planes de seguridad está dentro del **componente 4**, y el componente 5 solo tiene el literal a). La asignación ya era correcta. Basta con indicar que así figura en el original. |

---

## 5. Observación (opcional, no es un error)

| N° | Indicador | Observación |
|---|---|---|
| 79 | Tasa de ausentismo por causa médica (en 8.c Atención primaria) | El literal 10.d de la Tabla 1 nombra el **ausentismo** entre los indicadores que hay que analizar, y la propia base legal del indicador cita «Art. 15 (10.d)». Se puede dejar en 8.c como resultado de la atención primaria. Si se mueve a 10.d, las categorías pasan de III–V a **IV–V** y el responsable a **Monitor / Prof. salud** con apoyo **NA**. |

---

## Puntos verificados sin observaciones

- Todos los literales de los componentes 1 a 10 tienen al menos un indicador, y la redacción de la actividad (columna D) coincide con la Tabla 1.
- La columna M es correcta en los 99 indicadores restantes, incluidos los transversales (9, 10, 11 y 92), que aplican a todas las categorías.
- La hoja «Aplicabilidad Tabla 2» reproduce bien la Tabla 2: 1.c, d para la categoría I; 7.d para las categorías I y II; NA en los componentes 4 y 10 para la categoría I; etc.
- Las frecuencias mínimas de la nota 6 coinciden con el reglamento: Art. 27, Art. 28, Art. 32 num. 2 y 6, Art. 42 num. 3 y 4, Tabla 1 6.g y Art. 46 num. 1.
