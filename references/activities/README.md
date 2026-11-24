# Prototipos de actividades SISAT

Vista previa estática de cómo debe verse y resolverse cada ítem del SISAT, antes de construirlo en el sistema. Solo HTML, CSS y JavaScript: no se conectan a ninguna base de datos y todos los valores son de ejemplo.

## Cómo abrirlos

Los scripts se cargan desde `assets/`, así que conviene servir la carpeta en lugar de abrir el archivo directamente:

```powershell
php -S 127.0.0.1:8123 -t references/activities
```

Luego abra <http://127.0.0.1:8123>. La primera página es el **dashboard de cumplimiento**, con enlaces a los 62 prototipos.

## Estructura

```
activities/
├── index.html                      Dashboard de cumplimiento (global, por componente y por ítem)
├── assets/
│   ├── data.js                     Catálogo de ítems e indicadores (misma fuente que el Excel)
│   ├── app.js                      Dibuja el dashboard y cada prototipo
│   └── styles.css                  Estilos (claro / oscuro)
└── <módulo>/<actividad>/index.html Un prototipo por ítem
```

Las carpetas usan los mismos slugs que `database/seeders/SisatSeeder.php`, por ejemplo `guidance_planning/process_mapping`. Los requisitos transversales (Plan Anual, socialización participativa y reporte a la ASN) están en `cross_requirements/`, porque no forman parte de la Tabla 1.

## Qué muestra cada prototipo

- Ficha del ítem: literal, responsable, apoyo, base legal y categorías que lo aplican. La categoría elegida en la barra superior aparece resaltada.
- Indicadores de cumplimiento con numerador, denominador, meta y estado. Los marcados «en vivo» se recalculan al interactuar.
- Porcentaje de cumplimiento del ítem: promedio ponderado de mín(valor ÷ meta, 1).
- El espacio de trabajo, según el tipo de pantalla:

| Tipo | Se usa en | Cómo se resuelve |
|---|---|---|
| Cobertura por trabajador | 1.b–1.d, 2.2.b–f, 2.3.e, 3.a, 6.d, 8.a, 9.f | Tabla de la nómina con el estado de cada trabajador y un formulario de registro |
| Matriz de verificación | 1.a, 2.1.a/b/d, 2.2.a, 2.3.b/c, 4.b, 6.b/e, 7.a, 9.a/b/c/g, 10.e | Filas (puestos, GES, documentos…) × requisitos; la fila está completa cuando cumple todos |
| Cronograma | 2.1.c, 2.1.e, 6.f | Meses programados frente a ejecutados |
| Casos por etapas | 1.e, 1.f, 2.3.g, 5.a, 7.b–d, 8.c, 9.d/e/h, 10.a/f | Tablero con etapas hasta el cierre |
| Programa de actividades | T.2, 2.3.d/f, 3.b, 6.g, 8.b/d, 10.c | Actividades planificadas, ejecución y participación |
| Informes periódicos | T.3, 2.3.a/h, 10.b/d | Períodos con secciones obligatorias y emisión |
| Plan de control | 4.a | Medidas por nivel de la jerarquía de controles |
| Documento | T.1, 6.a, 6.c | Contenidos mínimos y flujo borrador → revisión → aprobado → vigente |

- A un costado: pasos para resolverlo, evidencias requeridas, indicadores de resultado (si los tiene) y datos para el desarrollo (ruta y slug).

## Relación con el Excel

`references/Indicadores_SISAT_cumplimiento.xlsx` se generó desde el mismo `assets/data.js`. Si cambia un ítem o un indicador, hay que mantener ambos iguales.
