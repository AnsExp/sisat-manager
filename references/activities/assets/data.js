/*
 * SISAT – catálogo de ítems e indicadores de cumplimiento (prototipo estático).
 * Fuente: Acuerdo Ministerial MSP 00004-2026, Tablas 1 y 2, con las correcciones de
 * "references/correcciones de indicadores.md" ya aplicadas.
 *
 * Responsable / apoyo:  M = Monitor o técnico de seguridad e higiene del trabajo
 *                       S = Profesionales de la salud
 *                       MS = Monitor y profesionales de la salud (ambos responsables)
 *                       NA = no aplica
 */
(function (root) {
    const STAFF = {
        M: 'Monitor o técnico de seguridad e higiene del trabajo',
        S: 'Profesionales de la salud',
        MS: 'Monitor o técnico SHT y profesionales de la salud',
        NA: 'No aplica',
    };

    const CATEGORIES = [
        { key: 'I', name: 'Microempresa / pequeña empresa, riesgo medio y alto', range: '1 a 24 trabajadores' },
        { key: 'II', name: 'Pequeña empresa, riesgo medio y alto', range: '25 a 49 trabajadores' },
        { key: 'III', name: 'Mediana tipo A', range: '50 a 99 trabajadores' },
        { key: 'IV', name: 'Mediana tipo B', range: '100 a 199 trabajadores' },
        { key: 'V', name: 'Gran empresa', range: '200 trabajadores en adelante' },
    ];

    const COMPONENTS = [
        { key: 'cross_requirements', number: '0', name: 'Requisitos transversales' },
        { key: 'guidance_planning', number: '1', name: 'Orientación y planificación' },
        { key: 'information_analysis', number: '2', name: 'Análisis y recopilación de información' },
        { key: 'communication_training', number: '3', name: 'Comunicación y capacitación en SST' },
        { key: 'preventive_actions', number: '4', name: 'Acciones preventivas para la gestión de peligros y riesgos' },
        { key: 'workplace_accidents', number: '5', name: 'Accidentes de trabajo' },
        { key: 'emergency_preparedness', number: '6', name: 'Preparación y respuesta ante emergencias' },
        { key: 'occupational_diseases', number: '7', name: 'Enfermedades profesionales y relacionadas con el trabajo' },
        { key: 'general_health_care', number: '8', name: 'Cuidado de la salud general' },
        { key: 'records_maintenance', number: '9', name: 'Mantenimiento de registros' },
        { key: 'monitoring_evaluation', number: '10', name: 'Seguimiento y evaluación' },
    ];

    // Tabla 2 (Art. 16): literales que aplica cada categoría. 'T.*' = transversales (todas).
    const TABLE2 = {
        I: ['1.c', '1.d', '2.1.a', '2.2.b', '2.2.c', '2.2.d', '2.2.e', '2.2.f', '2.3.d', '2.3.e', '3.a', '3.b', '5.a', '6.b', '7.d', '8.a', '8.d', '9.b', '9.d', '9.e', '9.f'],
        II: ['1.a', '1.b', '1.c', '1.d', '1.e', '2.1.a', '2.1.b', '2.1.c', '2.1.e', '2.2.a', '2.2.b', '2.2.c', '2.2.d', '2.2.e', '2.2.f', '2.3.a', '2.3.b', '2.3.d', '2.3.e', '2.3.h', '3.a', '3.b', '4.a', '4.b', '5.a', '6.b', '6.c', '6.d', '6.e', '6.f', '6.g', '7.d', '8.a', '8.b', '9.b', '9.c', '9.d', '9.e', '9.f', '10.e'],
        III: ['1.a', '1.b', '1.c', '1.d', '1.e', '2.1.a', '2.1.b', '2.1.c', '2.1.d', '2.1.e', '2.2.a', '2.2.b', '2.2.c', '2.2.d', '2.2.e', '2.2.f', '2.3.a', '2.3.b', '2.3.d', '2.3.e', '2.3.h', '3.a', '3.b', '4.a', '4.b', '5.a', '6.a', '6.b', '6.c', '6.d', '6.e', '6.f', '6.g', '7.b', '7.c', '7.d', '8.a', '8.b', '8.c', '8.d', '9.a', '9.b', '9.c', '9.d', '9.e', '9.f', '9.g', '9.h', '10.a', '10.e', '10.f'],
        IV: 'ALL_EXCEPT:10.b,10.c',
        V: 'ALL',
    };

    // ind(id, nombre, numerador, denominador, meta %, frecuencia, fuente, peso)
    function ind(id, name, num, den, meta, freq, source, weight) {
        return { id, name, num, den, meta, freq, source, weight: weight || 1 };
    }
    // res(nombre, fórmula, unidad, meta/tendencia, frecuencia)
    function res(name, formula, unit, target, freq) {
        return { name, formula, unit, target, freq };
    }

    const ITEMS = [
        // ───────────────────────── 0. TRANSVERSALES ─────────────────────────
        {
            id: 'T.1', component: 'cross_requirements', slug: 'annual_health_plan', name: 'Plan Anual de Salud en el Trabajo',
            resp: 'S', support: 'M', legal: 'Art. 28; Art. 46', pattern: 'document',
            indicators: [
                ind('T.1.1', '% de contenidos mínimos del Plan Anual incluidos y aprobado a tiempo', 'Requisitos del plan cumplidos', 'Requisitos del plan exigidos (9)', 100, 'Anual', 'Plan aprobado, acta de aprobación'),
                ind('T.1.2', '% de ejecución del Plan Anual', 'Actividades del plan ejecutadas a la fecha', 'Actividades programadas a la fecha', 90, 'Trimestral', 'Cronograma del plan y evidencias', 2),
            ],
            steps: ['Consolidar diagnóstico de salud e identificación de peligros del año en curso.', 'Redactar el plan con los 8 contenidos mínimos del Art. 28.', 'Presentar al empleador para revisión y aprobación en el último trimestre del año previo.', 'Cargar el cronograma y registrar la ejecución de cada actividad.', 'Consolidar el avance trimestral y anual.'],
            evidences: ['Plan Anual de Salud en el Trabajo firmado', 'Acta de aprobación del empleador', 'Cronograma de actividades', 'Evidencias de ejecución por actividad'],
            config: {
                checklist: ['Diagnóstico de la salud de los trabajadores', 'Identificación de peligros y evaluación de riesgos', 'Programas para grupos prioritarios y vulnerables', 'Programas de salud general', 'Programas de salud mental', 'Programas de emergencias y urgencias médicas', 'Recursos, seguimiento, evaluación y mejora continua', 'Otros requerimientos adicionales', 'Aprobado por el empleador antes del 31 de diciembre del año previo'],
                documents: ['Plan Anual de Salud en el Trabajo 2027', 'Cronograma de actividades 2027'],
            },
        },
        {
            id: 'T.2', component: 'cross_requirements', slug: 'participatory_socialization', name: 'Socialización anual participativa de la gestión de salud',
            resp: 'S', support: 'M', legal: 'Art. 7; Art. 27', pattern: 'program',
            indicators: [
                ind('T.2.1', '% de compromisos del acta de socialización cumplidos', 'Compromisos cumplidos en plazo', 'Compromisos acordados en el acta', 90, 'Trimestral', 'Acta y cronograma de compromisos', 2),
                ind('T.2.2', '% de requisitos del proceso participativo cumplidos', 'Requisitos cumplidos (convocatoria, participación de trabajadores y empleador, acta, cronograma)', 'Requisitos exigidos (4)', 100, 'Anual', 'Convocatoria, lista de asistencia, acta'),
            ],
            steps: ['Convocar a trabajadores (o su asociación) y al empleador.', 'Presentar las medidas de gestión de salud a implementarse.', 'Registrar acuerdos y responsables en el acta.', 'Definir el cronograma de compromisos.', 'Dar seguimiento a cada compromiso hasta su cierre.'],
            evidences: ['Convocatoria', 'Lista de asistencia', 'Acta firmada con cronograma de compromisos', 'Evidencia de cierre de compromisos'],
            config: {
                activities: ['Reunión de socialización anual', 'Compromiso: pausas activas en producción', 'Compromiso: mejora de iluminación en bodega', 'Compromiso: campaña de salud visual', 'Compromiso: revisión del comedor', 'Compromiso: capacitación en ergonomía'],
                participationLabel: 'Participantes / convocados',
            },
        },
        {
            id: 'T.3', component: 'cross_requirements', slug: 'annual_health_authority_report', name: 'Reporte anual a la Autoridad Sanitaria Nacional',
            resp: 'S', support: 'M', legal: 'Art. 44 num. 3; Art. 46 num. 1', pattern: 'report',
            indicators: [
                ind('T.3.1', '% de contenidos del reporte anual entregados a la ASN en plazo', 'Contenidos entregados en la herramienta y plazo de la ASN', 'Contenidos exigidos (4)', 100, 'Anual', 'Constancia de carga o envío'),
            ],
            steps: ['Consolidar datos estadísticos anonimizados del año.', 'Calcular los indicadores de gestión.', 'Redactar las propuestas de mejora continua.', 'Cargar el reporte en la herramienta de la ASN y guardar la constancia.'],
            evidences: ['Reporte anual anonimizado', 'Matriz de indicadores del año', 'Propuestas de mejora', 'Constancia de envío'],
            config: {
                periods: ['Reporte 2024', 'Reporte 2025', 'Reporte 2026'],
                sections: ['Datos estadísticos anonimizados de atención médica y psicológica', 'Condiciones de salud y enfermedades relacionadas con el trabajo', 'Cumplimiento de indicadores de gestión', 'Propuestas de mejora continua'],
            },
        },

        // ───────────────────────── 1. ORIENTACIÓN Y PLANIFICACIÓN ─────────────────────────
        {
            id: '1.a', component: 'guidance_planning', slug: 'process_mapping', name: 'Mapeo de procesos de la actividad laboral, métodos de trabajo (procedimientos)',
            resp: 'M', support: 'S', legal: 'Art. 15, Tabla 1', pattern: 'matrix',
            indicators: [
                ind('1.a.1', '% de procesos o áreas mapeados con procedimiento de trabajo vigente', 'Procesos con mapa y procedimiento vigente', 'Total de procesos o áreas de la actividad laboral', 100, 'Anual y ante cambios', 'Mapa de procesos, procedimientos aprobados'),
            ],
            steps: ['Listar los procesos y áreas de la actividad laboral.', 'Levantar el flujo de cada proceso (entradas, tareas, salidas).', 'Documentar el método de trabajo o procedimiento.', 'Aprobar y publicar la versión vigente.', 'Revisar ante cambios de proceso.'],
            evidences: ['Mapa de procesos', 'Procedimientos aprobados', 'Listado maestro de documentos'],
            config: { rowLabel: 'Proceso / área', rows: ['Recepción de materia prima', 'Producción – corte', 'Producción – ensamble', 'Bodega y despacho', 'Mantenimiento', 'Administración'], cols: ['Mapa de proceso', 'Procedimiento', 'Aprobado', 'Vigente'] },
        },
        {
            id: '1.b', component: 'guidance_planning', slug: 'general_diagnosis', name: 'Diagnóstico general de salud en el trabajo',
            resp: 'S', support: 'NA', legal: 'Art. 15; Art. 28 num. 1', pattern: 'workers',
            indicators: [
                ind('1.b.1', 'Cobertura del diagnóstico general', 'Trabajadores incluidos en el diagnóstico', 'Total de trabajadores', 95, 'Anual', 'Base de datos del diagnóstico, nómina', 2),
                ind('1.b.2', '% de contenidos mínimos del diagnóstico general (vigencia ≤ 12 meses)', 'Contenidos documentados', 'Contenidos exigidos (6)', 100, 'Anual', 'Informe de diagnóstico firmado'),
            ],
            steps: ['Cargar la nómina vigente.', 'Recopilar datos sociodemográficos, de morbilidad y exposición por trabajador.', 'Marcar a cada trabajador como incluido en el diagnóstico.', 'Redactar conclusiones y recomendaciones.', 'Firmar y publicar el informe (vigencia 12 meses).'],
            evidences: ['Informe de diagnóstico general firmado', 'Base de datos del diagnóstico'],
            config: {
                cols: [{ label: 'Datos sociodemográficos', options: ['Completo', 'Incompleto'] }, { label: 'Morbilidad', options: ['Registrada', 'Pendiente'] }],
                states: [{ label: 'Incluido', tone: 'ok' }, { label: 'Pendiente', tone: 'warn' }],
                action: 'Incluir en diagnóstico',
                checklist: ['Perfil sociodemográfico', 'Morbilidad general y laboral', 'Ausentismo por causa médica', 'Exposición a riesgos por puesto', 'Conclusiones y recomendaciones', 'Informe firmado y vigente (≤ 12 meses)'],
            },
        },
        {
            id: '1.c', component: 'guidance_planning', slug: 'physical_diagnosis', name: 'Diagnóstico de salud física del trabajador',
            resp: 'S', support: 'NA', legal: 'Art. 15; Art. 32', pattern: 'workers',
            indicators: [
                ind('1.c.1', 'Cobertura del diagnóstico de salud física', 'Trabajadores con diagnóstico de salud física vigente', 'Total de trabajadores', 100, 'Anual', 'Expedientes de salud, matriz de morbilidad'),
            ],
            steps: ['Programar la evaluación física de cada trabajador.', 'Registrar signos vitales, antropometría y hallazgos.', 'Emitir el diagnóstico físico individual.', 'Actualizar la matriz de morbilidad.'],
            evidences: ['Fichas de evaluación física', 'Matriz de morbilidad'],
            config: {
                cols: [{ label: 'IMC', options: ['Normal', 'Sobrepeso', 'Obesidad'] }, { label: 'Presión arterial', options: ['Normal', 'Elevada'] }],
                states: [{ label: 'Evaluado', tone: 'ok' }, { label: 'Programado', tone: 'warn' }, { label: 'Vencido', tone: 'bad' }],
                action: 'Registrar evaluación física',
            },
        },
        {
            id: '1.d', component: 'guidance_planning', slug: 'mental_diagnosis', name: 'Diagnóstico de salud mental del trabajador',
            resp: 'S', support: 'NA', legal: 'Art. 15; Art. 35', pattern: 'workers',
            indicators: [
                ind('1.d.1', 'Cobertura del diagnóstico de salud mental / riesgo psicosocial', 'Trabajadores evaluados en salud mental', 'Total de trabajadores', 90, 'Anual', 'Informe de tamizaje psicosocial', 2),
                ind('1.d.2', '% de trabajadores con riesgo psicosocial alto con plan de intervención', 'Trabajadores con riesgo alto y plan de intervención', 'Trabajadores con riesgo alto', 100, 'Semestral', 'Planes de intervención'),
            ],
            steps: ['Aplicar el instrumento de tamizaje psicosocial validado.', 'Clasificar el nivel de riesgo de cada trabajador.', 'Elaborar plan de intervención para riesgo alto.', 'Dar seguimiento semestral.'],
            evidences: ['Instrumentos aplicados (confidenciales)', 'Informe de tamizaje agregado', 'Planes de intervención'],
            config: {
                cols: [{ label: 'Nivel de riesgo', options: ['Bajo', 'Bajo', 'Medio', 'Alto'] }, { label: 'Plan de intervención', options: ['No requiere', 'Elaborado', 'Pendiente'] }],
                states: [{ label: 'Evaluado', tone: 'ok' }, { label: 'Pendiente', tone: 'warn' }],
                action: 'Registrar tamizaje',
                confidential: true,
            },
        },
        {
            id: '1.e', component: 'guidance_planning', slug: 'data_review', name: 'Revisión de los datos disponibles de enfermedades profesionales y accidentes',
            resp: 'S', support: 'M', legal: 'Art. 15, Tabla 1', pattern: 'cases',
            indicators: [
                ind('1.e.1', '% de casos históricos de AT y EP revisados y analizados', 'Casos de AT/EP revisados', 'Casos de AT/EP registrados en el período', 100, 'Anual', 'Informe de análisis histórico'),
            ],
            steps: ['Importar los casos de AT y EP de los últimos 5 años.', 'Clasificar cada caso con la lista OIT o el tipo de accidente.', 'Analizar causas, puestos y tendencias.', 'Concluir con recomendaciones para el plan anual.'],
            evidences: ['Base histórica de AT/EP', 'Informe de análisis histórico'],
            config: { caseLabel: 'Caso', types: ['Accidente de trabajo', 'Enfermedad profesional', 'Incidente'], stages: ['Registrado', 'Clasificado', 'Analizado'] },
        },
        {
            id: '1.f', component: 'guidance_planning', slug: 'management_planning', name: 'Planificación de la gestión preventiva respecto a los riesgos a la salud asociados al inicio de actividades',
            resp: 'M', support: 'S', legal: 'Art. 15, Tabla 1', pattern: 'cases',
            indicators: [
                ind('1.f.1', '% de cambios o inicios de actividad con evaluación preventiva previa', 'Cambios con evaluación de riesgos para la salud antes de iniciar', 'Total de cambios o inicios de actividad', 100, 'Trimestral', 'Registro de gestión del cambio'),
            ],
            steps: ['Registrar cada cambio: método de trabajo, servicio, maquinaria, equipo o personal nuevo.', 'Evaluar los riesgos para la salud antes del inicio.', 'Definir medidas preventivas y responsables.', 'Autorizar el inicio solo con la evaluación aprobada.'],
            evidences: ['Registro de gestión del cambio', 'Evaluaciones de riesgo previas', 'Autorizaciones de inicio'],
            config: { caseLabel: 'Cambio', types: ['Nueva maquinaria', 'Nuevo método de trabajo', 'Nuevo servicio', 'Incorporación de personal'], stages: ['Solicitado', 'Evaluado', 'Medidas definidas', 'Autorizado'] },
        },

        // ───────────────────────── 2.1 CONDICIONES DE TRABAJO ─────────────────────────
        {
            id: '2.1.a', component: 'information_analysis', sub: '2.1 Condiciones de trabajo', slug: 'work_hazard_baseline', name: 'Línea base de identificación de peligros, evaluación de riesgos y medidas de control',
            resp: 'M', support: 'S', legal: 'Art. 15; Art. 28 num. 2', pattern: 'matrix',
            indicators: [
                ind('2.1.a.1', '% de puestos con identificación de peligros y evaluación de riesgos vigente', 'Puestos con matriz IPER vigente', 'Total de puestos', 100, 'Anual y ante cambios', 'Matriz IPER', 2),
                ind('2.1.a.2', '% de riesgos significativos con medida de control definida', 'Riesgos moderados, importantes o intolerables con medida definida', 'Total de riesgos significativos', 100, 'Semestral', 'Matriz IPER, plan de acción'),
            ],
            steps: ['Listar los puestos de trabajo.', 'Identificar peligros por puesto.', 'Evaluar probabilidad y consecuencia de cada riesgo.', 'Definir medidas de control para riesgos significativos.', 'Aprobar la línea base y revisarla ante cambios.'],
            evidences: ['Matriz IPER', 'Plan de acción de medidas de control'],
            config: { rowLabel: 'Puesto', rows: ['Operario de producción', 'Soldador', 'Montacarguista', 'Bodeguero', 'Mecánico de mantenimiento', 'Chofer', 'Asistente administrativo'], cols: ['Peligros identificados', 'Riesgos evaluados', 'Medidas definidas', 'Vigente'] },
        },
        {
            id: '2.1.b', component: 'information_analysis', sub: '2.1 Condiciones de trabajo', slug: 'ppe_efficiency_evaluation', name: 'Evaluación y control de la eficacia de los equipos de protección personal y colectiva',
            resp: 'M', support: 'S', legal: 'Art. 15; Art. 12 num. 6', pattern: 'matrix',
            indicators: [
                ind('2.1.b.1', '% de EPP y protecciones colectivas evaluadas en su eficacia', 'Tipos de EPP / protecciones evaluadas', 'Tipos requeridos según la matriz de riesgos', 100, 'Semestral', 'Matriz de EPP, informes de evaluación'),
                ind('2.1.b.2', '% de trabajadores expuestos con EPP adecuado y vigente', 'Trabajadores expuestos con EPP adecuado y vigente', 'Trabajadores expuestos que lo requieren', 100, 'Trimestral', 'Registros de entrega y reposición'),
            ],
            steps: ['Definir el EPP y las protecciones colectivas requeridas por riesgo.', 'Evaluar la eficacia (certificación, ajuste, atenuación).', 'Registrar entregas y reposiciones por trabajador.', 'Inspeccionar el uso y el estado.'],
            evidences: ['Matriz de EPP', 'Informes de evaluación de eficacia', 'Actas de entrega'],
            config: { rowLabel: 'EPP / protección', rows: ['Protector auditivo', 'Gafas de seguridad', 'Guantes anticorte', 'Calzado de seguridad', 'Respirador media cara', 'Guardas de máquinas', 'Extracción localizada'], cols: ['Requerido en matriz', 'Eficacia evaluada', 'Entregado a expuestos', 'Vigente'] },
        },
        {
            id: '2.1.c', component: 'information_analysis', sub: '2.1 Condiciones de trabajo', slug: 'risk_control_systems_followup', name: 'Evaluación y seguimiento de los sistemas de control diseñados para eliminar o reducir la exposición',
            resp: 'M', support: 'S', legal: 'Art. 15', pattern: 'schedule',
            indicators: [
                ind('2.1.c.1', '% de verificaciones de sistemas de control ejecutadas', 'Verificaciones ejecutadas', 'Verificaciones programadas a la fecha', 100, 'Trimestral', 'Cronograma y registros de verificación', 2),
                ind('2.1.c.2', '% de sistemas de control eficaces', 'Sistemas que mantienen la exposición bajo el nivel de acción / VLP', 'Sistemas evaluados', 90, 'Semestral', 'Informes de evaluación de controles'),
            ],
            steps: ['Inventariar los sistemas de control (ventilación, guardas, aislamiento, etc.).', 'Programar las verificaciones.', 'Ejecutar y registrar cada verificación.', 'Corregir los sistemas no eficaces.'],
            evidences: ['Inventario de sistemas de control', 'Registros de verificación'],
            config: { rows: ['Extracción de humos de soldadura', 'Cabina de pintura', 'Aislamiento acústico del compresor', 'Guardas de prensas', 'Ventilación general de bodega'], every: 3 },
        },
        {
            id: '2.1.d', component: 'information_analysis', sub: '2.1 Condiciones de trabajo', slug: 'industrial_hygiene_evaluation', name: 'Evaluación de higiene del trabajo y seguimiento de las medidas de control implementadas',
            resp: 'M', support: 'S', legal: 'Art. 15; Art. 29 num. 4 y 5', pattern: 'matrix',
            indicators: [
                ind('2.1.d.1', '% de agentes higiénicos significativos con medición vigente', 'Agentes físicos, químicos o biológicos con medición cuantitativa vigente', 'Agentes que requieren medición', 100, 'Anual', 'Informes de monitoreo (laboratorio acreditado)', 2),
                ind('2.1.d.2', '% de mediciones dentro del valor límite permisible (VLP)', 'Puntos o GES con resultado ≤ VLP', 'Puntos o GES medidos', 95, 'Anual', 'Informes de monitoreo'),
            ],
            steps: ['Identificar los agentes que requieren medición.', 'Contratar o ejecutar la medición con método acreditado.', 'Comparar resultados con el VLP.', 'Dar seguimiento a las medidas de control de los puntos fuera de límite.'],
            evidences: ['Informes de monitoreo higiénico', 'Certificados de calibración y acreditación'],
            config: { rowLabel: 'Agente', rows: ['Ruido – producción', 'Iluminación – bodega', 'Polvo inhalable – corte', 'Estrés térmico – fundición', 'Vapores orgánicos – pintura', 'Vibración – montacargas'], cols: ['Requiere medición', 'Medición vigente', 'Resultado ≤ VLP', 'Seguimiento de medidas'] },
        },
        {
            id: '2.1.e', component: 'information_analysis', sub: '2.1 Condiciones de trabajo', slug: 'basic_services_inspection', name: 'Inspección y seguimiento de los servicios de alimentación, hospedaje e instalaciones sanitarias',
            resp: 'S', support: 'M', legal: 'Art. 11 num. 10; Art. 15', pattern: 'schedule',
            indicators: [
                ind('2.1.e.1', '% de inspecciones ejecutadas', 'Inspecciones ejecutadas', 'Inspecciones programadas a la fecha', 100, 'Mensual', 'Listas de verificación firmadas', 2),
                ind('2.1.e.2', '% de no conformidades cerradas en plazo', 'No conformidades cerradas en plazo', 'No conformidades detectadas', 90, 'Trimestral', 'Registro de hallazgos y acciones'),
            ],
            steps: ['Programar inspecciones mensuales por servicio.', 'Aplicar la lista de verificación.', 'Registrar no conformidades con responsable y plazo.', 'Verificar el cierre.'],
            evidences: ['Listas de verificación', 'Registro de no conformidades'],
            config: { rows: ['Comedor', 'Cocina', 'Baterías sanitarias', 'Vestidores y duchas', 'Campamento / hospedaje'], every: 1 },
        },

        // ───────────────────────── 2.2 CONDICIONES DE SALUD ─────────────────────────
        {
            id: '2.2.a', component: 'information_analysis', sub: '2.2 Condiciones de salud', slug: 'occupational_exams_matrix', name: 'Matriz de exámenes ocupacionales de acuerdo con los riesgos laborales y el puesto de trabajo',
            resp: 'S', support: 'NA', legal: 'Art. 15; Art. 32', pattern: 'matrix',
            indicators: [
                ind('2.2.a.1', '% de puestos o GES con profesiograma (matriz de exámenes) definido', 'Puestos o GES con matriz de exámenes', 'Total de puestos o GES', 100, 'Anual y ante cambios', 'Matriz de exámenes ocupacionales'),
            ],
            steps: ['Tomar los riesgos por puesto de la matriz IPER.', 'Definir exámenes de ingreso, periódicos, de reintegro y de retiro.', 'Fijar la frecuencia de cada examen.', 'Aprobar y publicar la matriz.'],
            evidences: ['Matriz de exámenes ocupacionales (profesiograma)'],
            config: { rowLabel: 'Puesto', rows: ['Operario de producción', 'Soldador', 'Montacarguista', 'Bodeguero', 'Chofer', 'Asistente administrativo'], cols: ['Exámenes de ingreso', 'Exámenes periódicos', 'Exámenes de retiro', 'Frecuencia definida'] },
        },
        {
            id: '2.2.b', component: 'information_analysis', sub: '2.2 Condiciones de salud', slug: 'medical_psychological_evaluation', name: 'Evaluación médica y psicológica (aptitud laboral, condiciones de salud)',
            resp: 'S', support: 'NA', legal: 'Art. 11 num. 9; Art. 32 num. 4, 5 y 7', pattern: 'workers',
            indicators: [
                ind('2.2.b.1', '% de trabajadores con certificado de salud en el trabajo vigente', 'Trabajadores con certificado vigente', 'Total de trabajadores', 100, 'Trimestral', 'Certificados de salud en el trabajo', 2),
                ind('2.2.b.2', '% de trabajadores con restricción con seguimiento y adaptación del puesto', 'Trabajadores «apto con restricción» con seguimiento y adaptación', 'Trabajadores con restricción', 100, 'Trimestral', 'Registro de restricciones'),
            ],
            steps: ['Realizar la evaluación médica y psicológica.', 'Emitir el concepto de aptitud.', 'Emitir el certificado de salud en el trabajo (sin diagnósticos).', 'Para restricciones: comunicar y adaptar el puesto.'],
            evidences: ['Certificados de salud en el trabajo', 'Registro de restricciones y adaptaciones'],
            config: {
                cols: [{ label: 'Aptitud', options: ['Apto', 'Apto', 'Apto', 'Apto con restricción', 'No apto'] }, { label: 'Vence', type: 'date' }],
                states: [{ label: 'Certificado vigente', tone: 'ok' }, { label: 'Por vencer', tone: 'warn' }, { label: 'Vencido', tone: 'bad' }],
                action: 'Emitir certificado',
            },
        },
        {
            id: '2.2.c', component: 'information_analysis', sub: '2.2 Condiciones de salud', slug: 'preemployment_medical_exam', name: 'Evaluación médica pre-ocupacional – inicio',
            resp: 'S', support: 'NA', legal: 'Art. 32 num. 1', pattern: 'workers',
            indicators: [
                ind('2.2.c.1', '% de ingresos con evaluación pre-ocupacional antes del inicio de labores', 'Trabajadores nuevos evaluados antes de iniciar', 'Trabajadores que ingresaron en el período', 100, 'Mensual', 'Expedientes, registro de ingresos de Talento Humano'),
            ],
            steps: ['Recibir de Talento Humano el aviso de ingreso.', 'Programar la evaluación según el profesiograma del puesto.', 'Registrar la evaluación antes de la fecha de inicio.', 'Emitir el certificado de aptitud.'],
            evidences: ['Registro de ingresos', 'Evaluaciones pre-ocupacionales'],
            config: {
                population: 'Ingresos del período',
                cols: [{ label: 'Fecha de inicio', type: 'date' }, { label: 'Evaluado el', type: 'date' }],
                states: [{ label: 'Antes del inicio', tone: 'ok' }, { label: 'Después del inicio', tone: 'bad' }, { label: 'Pendiente', tone: 'warn' }],
                action: 'Registrar evaluación de ingreso',
            },
        },
        {
            id: '2.2.d', component: 'information_analysis', sub: '2.2 Condiciones de salud', slug: 'periodic_medical_exam', name: 'Evaluación médica periódica',
            resp: 'S', support: 'NA', legal: 'Art. 32 num. 2', pattern: 'workers',
            indicators: [
                ind('2.2.d.1', 'Cobertura de evaluaciones periódicas (mínimo anual)', 'Trabajadores con evaluación periódica realizada', 'Trabajadores programados en el período', 95, 'Trimestral (consolidado anual)', 'Cronograma de evaluaciones, expedientes'),
            ],
            steps: ['Generar el cronograma anual por trabajador.', 'Convocar y realizar las evaluaciones.', 'Registrar resultados y aptitud.', 'Reprogramar inasistencias.'],
            evidences: ['Cronograma de evaluaciones', 'Expedientes con evaluación periódica'],
            config: {
                cols: [{ label: 'Programada', type: 'date' }, { label: 'Última evaluación', type: 'date' }],
                states: [{ label: 'Realizada', tone: 'ok' }, { label: 'Programada', tone: 'warn' }, { label: 'Atrasada', tone: 'bad' }],
                action: 'Registrar evaluación periódica',
            },
        },
        {
            id: '2.2.e', component: 'information_analysis', sub: '2.2 Condiciones de salud', slug: 'reintegration_medical_exam', name: 'Evaluación médica de reintegro / especiales',
            resp: 'S', support: 'NA', legal: 'Art. 32 num. 3; Art. 38', pattern: 'workers',
            indicators: [
                ind('2.2.e.1', '% de reintegros con evaluación previa a la reincorporación', 'Trabajadores reintegrados con evaluación de reintegro', 'Trabajadores que retornan tras ausencia prolongada por salud', 100, 'Mensual', 'Expedientes, certificados de reposo'),
            ],
            steps: ['Recibir el certificado de reposo (solo SISAT).', 'Programar la evaluación antes del retorno.', 'Definir adaptación o restricción si aplica.', 'Autorizar la reincorporación.'],
            evidences: ['Certificados de reposo', 'Evaluaciones de reintegro'],
            config: {
                population: 'Retornos tras ausencia por salud',
                cols: [{ label: 'Días de ausencia', options: ['15', '21', '30', '45', '60'] }, { label: 'Fecha de retorno', type: 'date' }],
                states: [{ label: 'Evaluado antes del retorno', tone: 'ok' }, { label: 'Pendiente', tone: 'warn' }, { label: 'Retornó sin evaluación', tone: 'bad' }],
                action: 'Registrar evaluación de reintegro',
            },
        },
        {
            id: '2.2.f', component: 'information_analysis', sub: '2.2 Condiciones de salud', slug: 'exit_medical_exam', name: 'Evaluación médica de retiro',
            resp: 'S', support: 'NA', legal: 'Art. 11 num. 12; Art. 32 num. 6', pattern: 'workers',
            indicators: [
                ind('2.2.f.1', '% de evaluaciones de retiro realizadas en plazo', 'Desvinculados con evaluación ≤ 5 días o evaluación válida ≤ 12 meses', 'Trabajadores desvinculados', 100, 'Mensual', 'Expedientes, registro de salidas'),
            ],
            steps: ['Recibir de Talento Humano el aviso de salida.', 'Informar al trabajador la importancia de la evaluación.', 'Realizarla dentro de los 5 días posteriores a la salida.', 'Si no acude, validar la última evaluación (≤ 12 meses).'],
            evidences: ['Registro de salidas', 'Evaluaciones de retiro', 'Constancia de información al trabajador'],
            config: {
                population: 'Desvinculados del período',
                cols: [{ label: 'Fecha de salida', type: 'date' }, { label: 'Evaluación', options: ['Retiro ≤ 5 días', 'Periódica ≤ 12 meses', 'Sin evaluación'] }],
                states: [{ label: 'En plazo', tone: 'ok' }, { label: 'Dentro de los 5 días', tone: 'warn' }, { label: 'Fuera de plazo', tone: 'bad' }],
                action: 'Registrar evaluación de retiro',
            },
        },

        // ───────────────────────── 2.3 RIESGOS PARA LA SALUD ─────────────────────────
        {
            id: '2.3.a', component: 'information_analysis', sub: '2.3 Identificación y evaluación de riesgos para la salud', slug: 'epidemiological_surveillance_analysis', name: 'Análisis de la vigilancia epidemiológica de la salud en el trabajo',
            resp: 'S', support: 'NA', legal: 'Art. 32; Art. 44', pattern: 'report',
            indicators: [
                ind('2.3.a.1', '% de informes de vigilancia epidemiológica emitidos', 'Informes emitidos', 'Informes programados a la fecha', 100, 'Semestral', 'Informes de vigilancia epidemiológica'),
            ],
            results: [res('Tasa de morbilidad general', '(Casos de morbilidad atendidos ÷ promedio de trabajadores) × 100', '%', 'Tendencia decreciente', 'Mensual / trimestral')],
            steps: ['Consolidar atenciones y evaluaciones del período.', 'Construir el perfil epidemiológico.', 'Analizar tendencias por puesto y GES.', 'Emitir el informe semestral.'],
            evidences: ['Informes de vigilancia epidemiológica', 'Perfil epidemiológico'],
            config: { periods: ['2025 – semestre 1', '2025 – semestre 2', '2026 – semestre 1', '2026 – semestre 2'], sections: ['Perfil sociodemográfico', 'Morbilidad por diagnóstico (CIE-10)', 'Morbilidad por puesto y GES', 'Análisis de tendencias', 'Recomendaciones'] },
        },
        {
            id: '2.3.b', component: 'information_analysis', sub: '2.3 Identificación y evaluación de riesgos para la salud', slug: 'exposure_groups_identification', name: 'Identificación del trabajador o grupos de exposición similar (GES)',
            resp: 'S', support: 'M', legal: 'Art. 29 num. 3', pattern: 'matrix',
            indicators: [
                ind('2.3.b.1', '% de trabajadores asignados a un GES', 'Trabajadores asignados a un GES', 'Total de trabajadores', 100, 'Anual y ante cambios', 'Matriz de GES'),
            ],
            steps: ['Agrupar puestos con exposición similar.', 'Asignar cada trabajador a su GES.', 'Validar con el monitor SHT.', 'Actualizar ante cambios de puesto.'],
            evidences: ['Matriz de GES con trabajadores asignados'],
            config: { rowLabel: 'GES', rows: ['GES 1 – Ruido y vibración (producción)', 'GES 2 – Humos metálicos (soldadura)', 'GES 3 – Carga física (bodega)', 'GES 4 – Conducción (choferes)', 'GES 5 – Pantallas (administrativo)'], cols: ['Puestos definidos', 'Agentes definidos', 'Trabajadores asignados', 'Validado por monitor SHT'] },
        },
        {
            id: '2.3.c', component: 'information_analysis', sub: '2.3 Identificación y evaluación de riesgos para la salud', slug: 'exposure_agents_analysis', name: 'Análisis de los agentes de exposición (vías de entrada, tipos de exposición, VLP, efectos adversos)',
            resp: 'M', support: 'S', legal: 'Art. 29 num. 4', pattern: 'matrix',
            indicators: [
                ind('2.3.c.1', '% de GES con caracterización completa de agentes de exposición', 'GES con agentes caracterizados', 'Total de GES', 100, 'Anual', 'Fichas de caracterización por GES'),
            ],
            steps: ['Tomar los GES identificados (2.3.b).', 'Para cada agente: vía de entrada, tipo de exposición, VLP y efectos.', 'Validar con el profesional de la salud.', 'Publicar la ficha por GES.'],
            evidences: ['Fichas de caracterización por GES'],
            config: { rowLabel: 'GES', rows: ['GES 1 – Ruido y vibración', 'GES 2 – Humos metálicos', 'GES 3 – Carga física', 'GES 4 – Conducción', 'GES 5 – Pantallas'], cols: ['Vía de entrada', 'Tipo de exposición', 'VLP', 'Efectos adversos'] },
        },
        {
            id: '2.3.d', component: 'information_analysis', sub: '2.3 Identificación y evaluación de riesgos para la salud', slug: 'health_promotion_evaluation', name: 'Evaluación y seguimiento de las medidas de promoción de la salud y prevención de enfermedades',
            resp: 'S', support: 'M', legal: 'Art. 4; Art. 12 num. 1; Art. 31', pattern: 'program',
            indicators: [
                ind('2.3.d.1', '% de actividades de promoción y prevención ejecutadas', 'Actividades ejecutadas', 'Actividades planificadas a la fecha', 90, 'Trimestral', 'Plan anual, registros', 2),
                ind('2.3.d.2', 'Cobertura de participación en actividades de promoción', 'Trabajadores que participaron', 'Trabajadores convocados', 80, 'Trimestral', 'Registros de asistencia'),
            ],
            steps: ['Planificar las actividades del año.', 'Convocar a los trabajadores.', 'Ejecutar y registrar asistencia.', 'Evaluar el resultado de cada actividad.'],
            evidences: ['Plan de promoción y prevención', 'Registros de asistencia'],
            config: { activities: ['Feria de salud', 'Campaña de hidratación', 'Pausas activas', 'Charla de alimentación saludable', 'Campaña de prevención de cáncer', 'Semana de salud visual'], participationLabel: 'Participantes / convocados' },
        },
        {
            id: '2.3.e', component: 'information_analysis', sub: '2.3 Identificación y evaluación de riesgos para la salud', slug: 'vulnerable_groups_followup', name: 'Identificación y seguimiento de grupos prioritarios y en condición de vulnerabilidad',
            resp: 'S', support: 'M', legal: 'Art. 15; Art. 28 num. 3', pattern: 'workers',
            indicators: [
                ind('2.3.e.1', '% de trabajadores de grupos prioritarios con plan de seguimiento individual', 'Trabajadores vulnerables con plan de seguimiento', 'Trabajadores vulnerables identificados', 100, 'Trimestral', 'Registro de grupos prioritarios'),
            ],
            steps: ['Identificar a los trabajadores de grupos prioritarios.', 'Elaborar un plan de seguimiento individual.', 'Ajustar el puesto si es necesario.', 'Registrar el seguimiento trimestral.'],
            evidences: ['Registro de grupos prioritarios', 'Planes de seguimiento individual'],
            config: {
                population: 'Trabajadores de grupos prioritarios',
                cols: [{ label: 'Condición', options: ['Embarazo', 'Lactancia', 'Discapacidad', 'Enfermedad catastrófica', 'Adulto mayor'] }, { label: 'Último seguimiento', type: 'date' }],
                states: [{ label: 'Con plan vigente', tone: 'ok' }, { label: 'Sin plan', tone: 'bad' }],
                action: 'Registrar seguimiento',
                confidential: true,
            },
        },
        {
            id: '2.3.f', component: 'information_analysis', sub: '2.3 Identificación y evaluación de riesgos para la salud', slug: 'specialized_epidemiological_monitoring', name: 'Programa de monitoreo epidemiológico especializado (PMEE)',
            resp: 'S', support: 'M', legal: 'Art. 3 num. 22 y 24; Art. 41', pattern: 'program',
            indicators: [
                ind('2.3.f.1', '% de problemas de salud prevalentes con PMEE implementado', 'PMEE implementados', 'Problemas de salud prevalentes identificados', 100, 'Anual', 'Documento de cada PMEE', 2),
                ind('2.3.f.2', 'Cobertura de trabajadores en PMEE', 'Trabajadores incluidos y evaluados en el PMEE', 'Trabajadores que cumplen criterios de inclusión', 95, 'Semestral', 'Base de datos del PMEE'),
            ],
            results: [res('Incidencia de casos nuevos en el PMEE', '(Casos nuevos ÷ trabajadores en el PMEE) × 100', '%', 'Tendencia decreciente', 'Anual')],
            steps: ['Identificar los problemas de salud prevalentes a partir de las evaluaciones.', 'Diseñar un PMEE por problema (criterios de inclusión, pruebas, frecuencia).', 'Incluir y evaluar a los trabajadores.', 'Analizar casos nuevos y ajustar medidas.'],
            evidences: ['Documento de cada PMEE', 'Base de datos de trabajadores incluidos'],
            config: { activities: ['PMEE conservación auditiva', 'PMEE osteomuscular', 'PMEE cardiovascular', 'PMEE respiratorio', 'PMEE psicosocial'], participationLabel: 'Evaluados / elegibles' },
        },
        {
            id: '2.3.g', component: 'information_analysis', sub: '2.3 Identificación y evaluación de riesgos para la salud', slug: 'work_reintegration_program', name: 'Programa de reinserción laboral para el trabajador',
            resp: 'S', support: 'M', legal: 'Art. 11 num. 7; Art. 37; Art. 40', pattern: 'cases',
            indicators: [
                ind('2.3.g.1', '% de casos con gestor de casos asignado desde el primer día', 'Casos con gestor asignado desde el día 1', 'Casos que requieren rehabilitación o reinserción', 100, 'Trimestral', 'Registro del programa Gestor de casos', 2),
                ind('2.3.g.2', '% de reinserciones laborales exitosas (6 meses)', 'Reinsertados que se mantienen en el puesto a los 6 meses', 'Trabajadores reinsertados', 80, 'Semestral', 'Seguimiento de casos'),
            ],
            steps: ['Abrir el caso el primer día de la lesión o enfermedad.', 'Asignar gestor de casos.', 'Planificar la rehabilitación y la adaptación del puesto.', 'Reinsertar y dar seguimiento por 6 meses.'],
            evidences: ['Registro del programa Gestor de casos', 'Planes de reinserción', 'Seguimiento a 6 meses'],
            config: { caseLabel: 'Caso', types: ['Lesión por AT', 'Enfermedad profesional', 'Enfermedad común'], stages: ['Gestor asignado', 'En rehabilitación', 'Reinsertado', 'Seguimiento 6 meses'] },
        },
        {
            id: '2.3.h', component: 'information_analysis', sub: '2.3 Identificación y evaluación de riesgos para la salud', slug: 'epidemiological_findings_report', name: 'Informe epidemiológico de hallazgos y resultados de las evaluaciones de salud al empleador',
            resp: 'S', support: 'NA', legal: 'Art. 15; Art. 45', pattern: 'report',
            indicators: [
                ind('2.3.h.1', '% de informes epidemiológicos entregados al empleador (mínimo 1 al año)', 'Informes entregados con constancia', 'Informes programados', 100, 'Anual', 'Informe con constancia de recepción'),
            ],
            steps: ['Consolidar resultados agregados de las evaluaciones.', 'Redactar hallazgos sin datos personales.', 'Entregar al empleador con constancia de recepción.'],
            evidences: ['Informe epidemiológico anonimizado', 'Constancia de recepción'],
            config: { periods: ['Informe 2024', 'Informe 2025', 'Informe 2026'], sections: ['Resultados agregados de evaluaciones', 'Hallazgos por GES', 'Recomendaciones al empleador', 'Constancia de recepción'] },
        },

        // ───────────────────────── 3. COMUNICACIÓN Y CAPACITACIÓN ─────────────────────────
        {
            id: '3.a', component: 'communication_training', slug: 'risk_communication_worker', name: 'Comunicación al trabajador sobre los posibles efectos en la salud de los riesgos de su puesto',
            resp: 'S', support: 'M', legal: 'Art. 15; Art. 10 num. 1; Art. 45 num. 1', pattern: 'workers',
            indicators: [
                ind('3.a.1', '% de trabajadores informados de los riesgos de su puesto y sus efectos en la salud', 'Trabajadores informados con registro firmado', 'Total de trabajadores', 100, 'Anual, al ingreso y al cambio de puesto', 'Registros de comunicación firmados', 2),
                ind('3.a.2', '% de trabajadores que recibieron el resultado de sus evaluaciones de salud', 'Trabajadores con entrega de resultados registrada', 'Trabajadores evaluados', 100, 'Trimestral', 'Constancias de entrega'),
            ],
            steps: ['Preparar la ficha de riesgos y efectos por puesto.', 'Comunicarla al trabajador al ingreso, al cambiar de puesto y cada año.', 'Obtener la firma de recepción.', 'Entregar el resultado de sus evaluaciones.'],
            evidences: ['Fichas de riesgos por puesto', 'Registros firmados', 'Constancias de entrega de resultados'],
            config: {
                cols: [{ label: 'Ficha de riesgos', options: ['Firmada', 'Firmada', 'Pendiente'] }, { label: 'Resultados entregados', options: ['Sí', 'Sí', 'No'] }],
                states: [{ label: 'Informado', tone: 'ok' }, { label: 'Pendiente', tone: 'warn' }],
                action: 'Registrar comunicación',
            },
        },
        {
            id: '3.b', component: 'communication_training', slug: 'health_safety_training', name: 'Capacitación interna o externa dirigida al trabajador en materia de seguridad y salud en el trabajo',
            resp: 'MS', support: 'NA', legal: 'Art. 11 num. 6; Art. 12 num. 5', pattern: 'program',
            indicators: [
                ind('3.b.1', '% de cumplimiento del plan de capacitación', 'Capacitaciones ejecutadas', 'Capacitaciones programadas a la fecha', 90, 'Trimestral', 'Plan de capacitación', 2),
                ind('3.b.2', 'Cobertura de capacitación', 'Trabajadores capacitados', 'Trabajadores programados', 90, 'Trimestral', 'Registros de asistencia'),
                ind('3.b.3', 'Eficacia de la capacitación', 'Trabajadores que aprueban la evaluación', 'Trabajadores evaluados', 80, 'Por evento', 'Evaluaciones pre y post'),
            ],
            steps: ['Elaborar el plan anual de capacitación.', 'Convocar y ejecutar cada capacitación.', 'Registrar asistencia.', 'Aplicar evaluación pre y post.'],
            evidences: ['Plan de capacitación', 'Registros de asistencia', 'Evaluaciones'],
            config: { activities: ['Inducción en SST', 'Uso correcto de EPP', 'Manejo manual de cargas', 'Riesgo eléctrico', 'Prevención de riesgos psicosociales', 'Orden y limpieza'], participationLabel: 'Capacitados / convocados' },
        },

        // ───────────────────────── 4. ACCIONES PREVENTIVAS ─────────────────────────
        {
            id: '4.a', component: 'preventive_actions', slug: 'hierarchy_risk_controls', name: 'Control de riesgos laborales según la jerarquía de controles',
            resp: 'M', support: 'S', legal: 'Art. 15, Tabla 1', pattern: 'controls',
            indicators: [
                ind('4.a.1', '% de medidas de control implementadas en plazo', 'Medidas implementadas en plazo', 'Medidas planificadas a la fecha', 90, 'Trimestral', 'Plan de acción de la matriz IPER', 2),
                ind('4.a.2', '% de riesgos intolerables o importantes controlados', 'Riesgos intolerables/importantes reducidos a nivel tolerable', 'Riesgos intolerables/importantes identificados', 100, 'Semestral', 'Reevaluación de la matriz IPER', 2),
                ind('4.a.3', '% de medidas en niveles superiores de la jerarquía', 'Medidas de eliminación, sustitución o ingeniería', 'Total de medidas implementadas', 30, 'Anual', 'Plan de acción'),
            ],
            steps: ['Tomar los riesgos significativos de la matriz IPER.', 'Elegir la medida empezando por el nivel más alto de la jerarquía.', 'Asignar responsable y plazo.', 'Implementar y reevaluar el riesgo.'],
            evidences: ['Plan de acción', 'Evidencia de implementación', 'Reevaluación de riesgos'],
            config: {
                risks: [
                    { hazard: 'Ruido en prensas (95 dB)', level: 'Importante', control: 'Ingeniería', measure: 'Encapsulado acústico de prensas' },
                    { hazard: 'Humos de soldadura', level: 'Importante', control: 'Ingeniería', measure: 'Extracción localizada' },
                    { hazard: 'Solvente con tolueno', level: 'Intolerable', control: 'Sustitución', measure: 'Cambio a solvente base agua' },
                    { hazard: 'Levantamiento de sacos de 50 kg', level: 'Moderado', control: 'Ingeniería', measure: 'Elevador de vacío' },
                    { hazard: 'Atropellamiento por montacargas', level: 'Importante', control: 'Administrativo', measure: 'Rutas peatonales señalizadas' },
                    { hazard: 'Cortes en manipulación de láminas', level: 'Moderado', control: 'EPP', measure: 'Guantes anticorte nivel 5' },
                    { hazard: 'Trabajo en altura en mantenimiento', level: 'Intolerable', control: 'Eliminación', measure: 'Bajar equipos a nivel de piso' },
                ],
            },
        },
        {
            id: '4.b', component: 'preventive_actions', slug: 'safety_plans', name: 'Planes de seguridad de acuerdo con los riesgos laborales identificados',
            resp: 'M', support: 'S', legal: 'Art. 15, Tabla 1', pattern: 'matrix',
            indicators: [
                ind('4.b.1', '% de riesgos significativos con plan de seguridad vigente', 'Riesgos significativos con plan o procedimiento seguro vigente', 'Riesgos significativos', 100, 'Anual', 'Planes de seguridad, permisos de trabajo'),
            ],
            steps: ['Listar los riesgos significativos.', 'Elaborar el plan o procedimiento seguro de cada uno.', 'Definir el permiso de trabajo si aplica.', 'Socializar y mantener vigente.'],
            evidences: ['Planes de seguridad', 'Procedimientos seguros', 'Permisos de trabajo'],
            config: { rowLabel: 'Riesgo significativo', rows: ['Trabajo en altura', 'Espacios confinados', 'Trabajos en caliente', 'Riesgo eléctrico', 'Izaje de cargas', 'Manejo de químicos'], cols: ['Plan / procedimiento', 'Permiso de trabajo', 'Socializado', 'Vigente'] },
        },

        // ───────────────────────── 5. ACCIDENTES DE TRABAJO ─────────────────────────
        {
            id: '5.a', component: 'workplace_accidents', slug: 'accident_investigation_procedure', name: 'Procedimiento para la investigación, reporte y datos de accidentes e incidentes de trabajo',
            resp: 'M', support: 'S', legal: 'Art. 15; normativa de seguridad social', pattern: 'cases',
            indicators: [
                ind('5.a.1', '% de accidentes e incidentes investigados', 'AT e incidentes investigados', 'AT e incidentes ocurridos', 100, 'Mensual', 'Informes de investigación', 2),
                ind('5.a.2', '% de accidentes reportados en el plazo legal', 'AT reportados a la seguridad social en plazo', 'AT ocurridos', 100, 'Mensual', 'Avisos de accidente', 2),
                ind('5.a.3', '% de acciones correctivas de investigaciones cerradas en plazo', 'Acciones correctivas cerradas en plazo', 'Acciones correctivas emitidas', 90, 'Trimestral', 'Seguimiento de planes de acción'),
                ind('5.a.4', '% de requisitos del procedimiento de investigación cumplidos', 'Requisitos cumplidos (aprobado, vigente, socializado, formatos)', 'Requisitos exigidos (4)', 100, 'Anual', 'Procedimiento aprobado'),
            ],
            results: [
                res('Índice de frecuencia (IF)', '(Lesiones con baja × 200 000) ÷ horas-hombre trabajadas', 'índice', 'Tendencia decreciente', 'Mensual (acumulado anual)'),
                res('Índice de gravedad (IG)', '(Días perdidos × 200 000) ÷ horas-hombre trabajadas', 'índice', 'Tendencia decreciente', 'Mensual (acumulado anual)'),
                res('Tasa de riesgo (TR)', 'IG ÷ IF', 'índice', 'Tendencia decreciente', 'Anual'),
            ],
            steps: ['Registrar el evento el mismo día.', 'Enviar el aviso a la seguridad social dentro del plazo.', 'Investigar causas (árbol de causas o similar).', 'Definir acciones correctivas con responsable y plazo.', 'Cerrar las acciones y actualizar los índices.'],
            evidences: ['Procedimiento aprobado', 'Avisos de accidente', 'Informes de investigación', 'Plan de acciones correctivas'],
            config: {
                caseLabel: 'Evento', types: ['Accidente con baja', 'Accidente sin baja', 'Incidente'], stages: ['Registrado', 'Aviso a seguridad social', 'Investigado', 'Acciones cerradas'],
                checklist: ['Procedimiento aprobado', 'Procedimiento vigente', 'Socializado a supervisores', 'Formatos de reporte e investigación'],
            },
        },

        // ───────────────────────── 6. EMERGENCIAS ─────────────────────────
        {
            id: '6.a', component: 'emergency_preparedness', slug: 'major_accident_risk_evaluation', name: 'Evaluación de riesgo de accidentes mayores, análisis de vulnerabilidades y amenazas',
            resp: 'M', support: 'S', legal: 'Art. 15, Tabla 1', pattern: 'document',
            indicators: [
                ind('6.a.1', '% de contenidos del análisis de vulnerabilidad y amenazas (actualizado ≤ 12 meses)', 'Contenidos documentados y vigentes', 'Contenidos exigidos (6)', 100, 'Anual', 'Informe de análisis de vulnerabilidad'),
            ],
            steps: ['Identificar amenazas naturales, antrópicas y tecnológicas.', 'Evaluar el riesgo de accidentes mayores.', 'Analizar la vulnerabilidad de personas, recursos y sistemas.', 'Priorizar y aprobar el informe.'],
            evidences: ['Informe de análisis de vulnerabilidad y amenazas'],
            config: {
                checklist: ['Amenazas naturales', 'Amenazas antrópicas y tecnológicas', 'Escenarios de accidente mayor', 'Vulnerabilidad de personas', 'Vulnerabilidad de recursos y sistemas', 'Informe aprobado y actualizado (≤ 12 meses)'],
                documents: ['Análisis de vulnerabilidad y amenazas 2026'],
            },
        },
        {
            id: '6.b', component: 'emergency_preparedness', slug: 'emergency_contingency_plans', name: 'Planes de emergencia y contingencia',
            resp: 'M', support: 'S', legal: 'Art. 15; Art. 28 num. 6', pattern: 'matrix',
            indicators: [
                ind('6.b.1', '% de centros de trabajo o áreas con plan de emergencia vigente', 'Centros o áreas con plan vigente', 'Total de centros o áreas', 100, 'Anual', 'Plan de emergencia aprobado'),
            ],
            steps: ['Elaborar el plan por centro o área.', 'Definir rutas de evacuación y puntos de encuentro.', 'Aprobar el plan.', 'Revisarlo cada año.'],
            evidences: ['Planes de emergencia aprobados', 'Mapas de evacuación'],
            config: { rowLabel: 'Centro / área', rows: ['Planta principal', 'Bodega central', 'Oficinas', 'Sucursal norte'], cols: ['Plan elaborado', 'Rutas y señalética', 'Aprobado', 'Vigente'] },
        },
        {
            id: '6.c', component: 'emergency_preparedness', slug: 'emergency_action_plan', name: 'Plan de acción ante una emergencia, atención prehospitalaria y evacuación médica',
            resp: 'S', support: 'M', legal: 'Art. 33 num. 1; Art. 42 num. 2', pattern: 'document',
            indicators: [
                ind('6.c.1', '% de contenidos del plan de evacuación médica e información médica', 'Contenidos documentados y actualizados', 'Contenidos exigidos (5)', 100, 'Semestral', 'Plan de evacuación médica', 2),
                ind('6.c.2', '% de brigadistas que conocen el plan', 'Brigadistas con socialización registrada', 'Total de brigadistas', 100, 'Semestral', 'Registro de socialización'),
            ],
            results: [res('Tiempo promedio de primera atención', 'Σ minutos desde el aviso hasta la primera atención ÷ emergencias atendidas', 'minutos', '≤ tiempo objetivo del plan (referencial ≤ 4 min)', 'Por evento / semestral')],
            steps: ['Definir el protocolo de atención prehospitalaria.', 'Acordar la red de derivación y el transporte.', 'Mantener la información médica de emergencia disponible.', 'Socializar el plan con las brigadas.'],
            evidences: ['Plan de evacuación médica', 'Directorio de la red de derivación', 'Registro de socialización'],
            config: {
                checklist: ['Protocolo de atención prehospitalaria', 'Red de derivación y transporte', 'Información médica de emergencia disponible', 'Responsables y turnos', 'Plan actualizado'],
                documents: ['Plan de acción y evacuación médica'],
            },
        },
        {
            id: '6.d', component: 'emergency_preparedness', slug: 'first_response_training', name: 'Programa de entrenamiento de primera respuesta para todo el personal',
            resp: 'MS', support: 'NA', legal: 'Art. 36 num. 3; Art. 42 num. 4', pattern: 'workers',
            indicators: [
                ind('6.d.1', '% del personal entrenado en primera respuesta y primeros auxilios psicológicos en el año', 'Trabajadores entrenados en el año', 'Total de trabajadores', 90, 'Anual', 'Registros de capacitación'),
            ],
            steps: ['Programar el entrenamiento anual.', 'Entrenar en primera respuesta y primeros auxilios psicológicos.', 'Registrar asistencia por trabajador.', 'Reprogramar a los ausentes.'],
            evidences: ['Programa de entrenamiento', 'Registros de asistencia'],
            config: {
                cols: [{ label: 'Primera respuesta', options: ['Entrenado', 'Entrenado', 'Pendiente'] }, { label: 'Primeros auxilios psicológicos', options: ['Entrenado', 'Pendiente'] }],
                states: [{ label: 'Entrenado', tone: 'ok' }, { label: 'Pendiente', tone: 'warn' }],
                action: 'Registrar entrenamiento',
            },
        },
        {
            id: '6.e', component: 'emergency_preparedness', slug: 'brigade_recruitment_training', name: 'Reclutamiento, selección, conformación, entrenamiento y evaluación de brigadistas',
            resp: 'MS', support: 'NA', legal: 'Art. 42 num. 3 y 5', pattern: 'matrix',
            indicators: [
                ind('6.e.1', '% de brigadas conformadas según el plan de emergencia', 'Brigadas conformadas y completas', 'Brigadas requeridas en el plan', 100, 'Anual', 'Actas de conformación'),
                ind('6.e.2', '% de brigadistas con entrenamiento y evaluación técnica, médica y psicológica anual', 'Brigadistas entrenados y evaluados', 'Brigadistas conformados', 100, 'Anual', 'Registro de brigadas, evaluaciones'),
            ],
            steps: ['Convocar voluntarios.', 'Evaluar aptitud técnica, médica y psicológica.', 'Conformar las brigadas que exige el plan.', 'Entrenar y evaluar cada año.'],
            evidences: ['Actas de conformación', 'Evaluaciones de brigadistas', 'Registros de entrenamiento'],
            config: { rowLabel: 'Brigada', rows: ['Evacuación', 'Primeros auxilios', 'Contra incendios', 'Comunicación', 'Búsqueda y rescate'], cols: ['Conformada', 'Completa', 'Entrenada', 'Evaluación médica y psicológica'] },
        },
        {
            id: '6.f', component: 'emergency_preparedness', slug: 'emergency_equipment_maintenance', name: 'Dotación, inspección y mantenimiento de instalaciones, equipos y vehículos de emergencia',
            resp: 'M', support: 'S', legal: 'Art. 11 num. 5; Art. 22; Art. 42 num. 1', pattern: 'schedule',
            indicators: [
                ind('6.f.1', '% de inspecciones de equipos de emergencia ejecutadas', 'Inspecciones ejecutadas', 'Inspecciones programadas a la fecha', 100, 'Mensual', 'Listas de inspección', 2),
                ind('6.f.2', '% de equipos, medicamentos e insumos de emergencia operativos y vigentes', 'Ítems operativos y dentro de vigencia', 'Ítems inventariados', 100, 'Mensual', 'Inventario, kardex de medicamentos'),
            ],
            steps: ['Inventariar equipos, medicamentos e insumos.', 'Programar inspecciones mensuales.', 'Registrar el estado y las fechas de vencimiento.', 'Reponer o dar mantenimiento.'],
            evidences: ['Inventario de emergencia', 'Kardex de medicamentos', 'Listas de inspección'],
            config: { rows: ['Botiquines', 'DEA', 'Camillas', 'Extintores', 'Lavaojos y duchas', 'Vehículo de emergencia'], every: 1 },
        },
        {
            id: '6.g', component: 'emergency_preparedness', slug: 'drills_execution', name: 'Ejecución de simulacros (mínimo una vez al año)',
            resp: 'M', support: 'S', legal: 'Art. 15; Art. 42 num. 5', pattern: 'program',
            indicators: [
                ind('6.g.1', '% de simulacros ejecutados (mínimo 1 al año)', 'Simulacros ejecutados', 'Simulacros programados (mínimo 1)', 100, 'Anual', 'Informe de simulacro', 2),
                ind('6.g.2', '% de oportunidades de mejora del simulacro cerradas', 'Hallazgos cerrados', 'Hallazgos identificados', 90, 'Semestral', 'Plan de acción post-simulacro'),
            ],
            steps: ['Programar al menos un simulacro al año.', 'Definir el escenario y los observadores.', 'Ejecutar y medir tiempos.', 'Registrar hallazgos y cerrarlos.'],
            evidences: ['Guion del simulacro', 'Informe de simulacro', 'Plan de acción post-simulacro'],
            config: { activities: ['Simulacro de sismo', 'Simulacro de incendio', 'Simulacro de derrame químico'], participationLabel: 'Evacuados / presentes' },
        },

        // ───────────────────────── 7. ENFERMEDADES PROFESIONALES ─────────────────────────
        {
            id: '7.a', component: 'occupational_diseases', slug: 'similar_exposure_groups_diseases', name: 'Identificación de GES expuestos a agentes etiológicos que pueden causar enfermedades profesionales',
            resp: 'S', support: 'M', legal: 'Art. 15; Art. 29 num. 3', pattern: 'matrix',
            indicators: [
                ind('7.a.1', '% de GES con exposición a agentes etiológicos identificada y documentada', 'GES con exposición documentada', 'Total de GES', 100, 'Anual', 'Matriz de GES y agentes'),
            ],
            steps: ['Tomar la matriz de GES.', 'Asociar cada agente con la enfermedad de la lista OIT.', 'Documentar trabajadores expuestos.', 'Validar con el monitor SHT.'],
            evidences: ['Matriz de GES y agentes etiológicos'],
            config: { rowLabel: 'GES', rows: ['GES 1 – Ruido', 'GES 2 – Humos metálicos', 'GES 3 – Carga física', 'GES 4 – Vibración de cuerpo entero', 'GES 5 – Sílice'], cols: ['Agente etiológico', 'Enfermedad OIT asociada', 'Expuestos documentados', 'Validado'] },
        },
        {
            id: '7.b', component: 'occupational_diseases', slug: 'clinical_findings_analysis', name: 'Análisis de hallazgos clínicos asociados con exposiciones específicas',
            resp: 'S', support: 'NA', legal: 'Art. 41; Art. 43', pattern: 'cases',
            indicators: [
                ind('7.b.1', '% de hallazgos clínicos compatibles con exposición laboral analizados', 'Hallazgos analizados respecto a la exposición', 'Hallazgos compatibles detectados', 100, 'Semestral', 'Informes de análisis clínico-ocupacional'),
            ],
            results: [res('Prevalencia de manifestaciones tempranas por GES', '(Trabajadores del GES con manifestaciones tempranas ÷ trabajadores del GES) × 100', '%', 'Tendencia decreciente', 'Anual')],
            steps: ['Detectar el hallazgo en una evaluación.', 'Relacionarlo con la exposición del GES.', 'Analizar con criterios clínicos y ocupacionales.', 'Definir la conducta y el seguimiento.'],
            evidences: ['Informes de análisis clínico-ocupacional'],
            config: { caseLabel: 'Hallazgo', types: ['Hipoacusia inicial', 'Dermatitis de contacto', 'Lumbalgia recurrente', 'Alteración espirométrica'], stages: ['Detectado', 'Relacionado con exposición', 'Analizado', 'Conducta definida'] },
        },
        {
            id: '7.c', component: 'occupational_diseases', slug: 'non_occupational_factors_exclusion', name: 'Exclusión de factores no ocupacionales como posibles causas de enfermedades profesionales',
            resp: 'S', support: 'NA', legal: 'Art. 34; Art. 41', pattern: 'cases',
            indicators: [
                ind('7.c.1', '% de casos sospechosos con análisis de factores extralaborales documentado', 'Casos sospechosos con análisis extralaboral', 'Casos sospechosos de EP', 100, 'Por caso / semestral', 'Expediente, informe de causalidad'),
            ],
            steps: ['Abrir el análisis para cada caso sospechoso.', 'Revisar estilo de vida, actividades extralaborales y antecedentes.', 'Coordinar con trabajo social si aplica.', 'Concluir el informe de causalidad.'],
            evidences: ['Informes de causalidad'],
            config: { caseLabel: 'Caso sospechoso', types: ['Hipoacusia', 'Síndrome de túnel carpiano', 'Lumbalgia', 'Dermatitis'], stages: ['Abierto', 'Factores extralaborales revisados', 'Causalidad concluida'] },
        },
        {
            id: '7.d', component: 'occupational_diseases', slug: 'occupational_disease_investigation', name: 'Procedimiento para la investigación, reporte y datos de posibles enfermedades profesionales',
            resp: 'S', support: 'M', legal: 'Art. 15; Art. 44 num. 3', pattern: 'cases',
            indicators: [
                ind('7.d.1', '% de presuntas EP investigadas y reportadas en plazo', 'Presuntas EP investigadas y reportadas en plazo', 'Presuntas EP detectadas', 100, 'Trimestral', 'Informes de investigación, avisos de EP', 2),
                ind('7.d.2', '% de requisitos del procedimiento de investigación de EP cumplidos', 'Requisitos cumplidos (aprobado, vigente, socializado, formatos)', 'Requisitos exigidos (4)', 100, 'Anual', 'Procedimiento aprobado'),
            ],
            results: [res('Tasa de incidencia de enfermedades profesionales', '(Casos nuevos de EP calificadas ÷ promedio de trabajadores) × 1 000', 'por 1 000', 'Tendencia decreciente', 'Anual')],
            steps: ['Registrar la sospecha de EP.', 'Investigar exposición y relación causal.', 'Reportar a la seguridad social.', 'Dar seguimiento a la calificación.'],
            evidences: ['Procedimiento aprobado', 'Informes de investigación', 'Avisos de EP'],
            config: {
                caseLabel: 'Presunta EP', types: ['Hipoacusia neurosensorial', 'Túnel carpiano', 'Asma ocupacional', 'Dermatitis'], stages: ['Sospecha', 'Investigada', 'Reportada', 'Calificada'],
                checklist: ['Procedimiento aprobado', 'Procedimiento vigente', 'Socializado', 'Formatos de investigación y aviso'],
            },
        },

        // ───────────────────────── 8. CUIDADO DE LA SALUD GENERAL ─────────────────────────
        {
            id: '8.a', component: 'general_health_care', slug: 'immunization_program', name: 'Programa de inmunizaciones en coordinación con la Autoridad Sanitaria Nacional',
            resp: 'S', support: 'NA', legal: 'Art. 33 num. 2', pattern: 'workers',
            indicators: [
                ind('8.a.1', 'Cobertura de vacunación según riesgo laboral', 'Trabajadores expuestos con esquema completo', 'Trabajadores expuestos que lo requieren', 95, 'Semestral', 'Carné o registro de vacunación'),
            ],
            steps: ['Definir las vacunas por riesgo laboral.', 'Gestionar las dosis con la ASN.', 'Vacunar y registrar.', 'Completar los esquemas pendientes.'],
            evidences: ['Programa de inmunizaciones', 'Registro de vacunación'],
            config: {
                population: 'Trabajadores expuestos',
                cols: [{ label: 'Vacuna', options: ['Tétanos', 'Hepatitis B', 'Influenza', 'Fiebre amarilla'] }, { label: 'Dosis', options: ['1/3', '2/3', '3/3', 'Única'] }],
                states: [{ label: 'Esquema completo', tone: 'ok' }, { label: 'En curso', tone: 'warn' }, { label: 'Sin iniciar', tone: 'bad' }],
                action: 'Registrar dosis',
            },
        },
        {
            id: '8.b', component: 'general_health_care', slug: 'public_health_programs', name: 'Programas de salud pública vigentes aplicables a los lugares o centros de trabajo',
            resp: 'S', support: 'NA', legal: 'Art. 33 num. 3', pattern: 'program',
            indicators: [
                ind('8.b.1', '% de programas de salud pública aplicables implementados', 'Programas implementados', 'Programas aplicables', 100, 'Anual', 'Documento de programas', 2),
                ind('8.b.2', 'Cobertura de tamizajes de salud pública', 'Trabajadores tamizados', 'Trabajadores elegibles', 80, 'Anual', 'Registros de tamizaje'),
            ],
            steps: ['Identificar los programas de la ASN aplicables.', 'Planificar su ejecución en el centro de trabajo.', 'Ejecutar tamizajes y campañas.', 'Registrar la cobertura.'],
            evidences: ['Documento de programas', 'Registros de tamizaje'],
            config: { activities: ['Tamizaje de hipertensión', 'Tamizaje de diabetes', 'Prevención de VIH/ITS', 'Tamizaje de cáncer de mama', 'Tamizaje de cáncer de próstata'], participationLabel: 'Tamizados / elegibles' },
        },
        {
            id: '8.c', component: 'general_health_care', slug: 'primary_health_care_program', name: 'Programa de atención primaria en salud según las necesidades del lugar de trabajo',
            resp: 'S', support: 'NA', legal: 'Art. 6; Art. 33 num. 1', pattern: 'cases',
            indicators: [
                ind('8.c.1', '% de casos referidos con contrarreferencia o seguimiento', 'Casos referidos con seguimiento documentado', 'Casos referidos', 90, 'Trimestral', 'Registro de referencias'),
            ],
            results: [res('Tasa de ausentismo por causa médica', '(Días perdidos por causa médica ÷ días programados de trabajo) × 100', '%', 'Tendencia decreciente', 'Mensual')],
            steps: ['Atender y registrar la consulta.', 'Referir cuando el caso supera la capacidad del servicio.', 'Obtener la contrarreferencia.', 'Dar seguimiento al trabajador.'],
            evidences: ['Registro de atenciones', 'Registro de referencias y contrarreferencias'],
            config: { caseLabel: 'Referencia', types: ['Traumatología', 'Medicina interna', 'Oftalmología', 'Salud mental'], stages: ['Atendido', 'Referido', 'Contrarreferencia', 'Seguimiento cerrado'] },
        },
        {
            id: '8.d', component: 'general_health_care', slug: 'workplace_mental_health_program', name: 'Programa para el cuidado de la salud mental en el trabajo',
            resp: 'S', support: 'M', legal: 'Art. 35', pattern: 'program',
            indicators: [
                ind('8.d.1', '% de elementos del programa de salud mental implementados', 'Elementos implementados (documento, prevención, atención, primeros auxilios psicológicos)', 'Elementos exigidos (4)', 100, 'Anual', 'Documento del programa'),
                ind('8.d.2', '% de casos de salud mental detectados con seguimiento', 'Casos con atención y seguimiento', 'Casos detectados', 100, 'Trimestral', 'Registros de atención psicológica', 2),
                ind('8.d.3', 'Cobertura de actividades de promoción de la salud mental', 'Trabajadores participantes', 'Total de trabajadores', 80, 'Semestral', 'Registros de asistencia'),
            ],
            steps: ['Documentar el programa.', 'Ejecutar actividades de promoción y prevención.', 'Atender y dar seguimiento a los casos detectados.', 'Referir los casos complejos.'],
            evidences: ['Programa de salud mental', 'Registros de atención (confidenciales)', 'Registros de asistencia'],
            config: { activities: ['Taller de manejo del estrés', 'Primeros auxilios psicológicos', 'Campaña contra el acoso laboral', 'Grupo de apoyo', 'Charla de higiene del sueño'], participationLabel: 'Participantes / trabajadores', checklist: ['Programa documentado', 'Actividades de prevención', 'Ruta de atención y referencia', 'Primeros auxilios psicológicos'] },
        },

        // ───────────────────────── 9. MANTENIMIENTO DE REGISTROS ─────────────────────────
        {
            id: '9.a', component: 'records_maintenance', slug: 'occupational_health_policies_records', name: 'Políticas, programas y lineamientos de salud en el trabajo',
            resp: 'S', support: 'M', legal: 'Art. 11 num. 1', pattern: 'matrix',
            indicators: [
                ind('9.a.1', '% de políticas, programas y lineamientos documentados y vigentes', 'Documentos vigentes y aprobados', 'Documentos requeridos', 100, 'Anual', 'Listado maestro de documentos'),
            ],
            steps: ['Definir el listado maestro de documentos.', 'Elaborar o actualizar cada documento.', 'Aprobar y socializar.', 'Revisar la vigencia cada año.'],
            evidences: ['Listado maestro de documentos', 'Documentos aprobados'],
            config: { rowLabel: 'Documento', rows: ['Política de salud en el trabajo', 'Programa de vigilancia de la salud', 'Programa de salud mental', 'Lineamiento de confidencialidad', 'Programa de promoción de la salud'], cols: ['Elaborado', 'Aprobado', 'Socializado', 'Vigente'] },
        },
        {
            id: '9.b', component: 'records_maintenance', slug: 'health_care_records', name: 'Registros de atenciones de salud',
            resp: 'S', support: 'NA', legal: 'Art. 39; Art. 44 num. 1', pattern: 'matrix',
            indicators: [
                ind('9.b.1', '% de atenciones registradas correctamente (auditoría por muestreo)', 'Atenciones con registro completo', 'Atenciones revisadas en la muestra', 95, 'Trimestral', 'Expedientes, registro diario de atenciones'),
            ],
            steps: ['Registrar cada atención el mismo día.', 'Tomar una muestra trimestral.', 'Verificar campos obligatorios.', 'Corregir los registros incompletos.'],
            evidences: ['Registro diario de atenciones', 'Informe de auditoría por muestreo'],
            config: { rowLabel: 'Atención (muestra)', rows: ['AT-0412 · 03/11', 'AT-0418 · 05/11', 'AT-0425 · 08/11', 'AT-0431 · 12/11', 'AT-0440 · 15/11', 'AT-0447 · 19/11', 'AT-0452 · 21/11'], cols: ['Datos del trabajador', 'Motivo y diagnóstico CIE-10', 'Conducta', 'Firma del profesional'] },
        },
        {
            id: '9.c', component: 'records_maintenance', slug: 'occupational_exposure_records', name: 'Registros de datos de exposiciones ocupacionales detectadas, medidas y evaluadas',
            resp: 'S', support: 'M', legal: 'Art. 15; Art. 29 num. 5', pattern: 'matrix',
            indicators: [
                ind('9.c.1', '% de GES o puestos con registro de exposición actualizado', 'GES con registro de exposición actualizado', 'Total de GES', 100, 'Anual', 'Registro de exposiciones'),
            ],
            steps: ['Registrar la exposición detectada por GES.', 'Adjuntar la medición.', 'Registrar la evaluación frente al VLP.', 'Actualizar con cada nueva medición.'],
            evidences: ['Registro de exposiciones', 'Informes de monitoreo'],
            config: { rowLabel: 'GES', rows: ['GES 1 – Ruido', 'GES 2 – Humos metálicos', 'GES 3 – Carga física', 'GES 4 – Vibración', 'GES 5 – Pantallas'], cols: ['Exposición detectada', 'Medida', 'Evaluada', 'Actualizada'] },
        },
        {
            id: '9.d', component: 'records_maintenance', slug: 'occupational_diseases_records', name: 'Registro de presuntas enfermedades profesionales y EP calificadas',
            resp: 'S', support: 'M', legal: 'Art. 15; Art. 44', pattern: 'cases',
            indicators: [
                ind('9.d.1', '% de presuntas EP y EP calificadas registradas', 'Casos registrados', 'Casos identificados', 100, 'Trimestral', 'Registro de EP'),
            ],
            steps: ['Registrar cada presunta EP.', 'Actualizar el estado de la calificación.', 'Adjuntar la resolución.', 'Conciliar con los casos del 7.d.'],
            evidences: ['Registro de EP'],
            config: { caseLabel: 'Registro', types: ['Presunta EP', 'EP calificada'], stages: ['Registrada', 'Documentada', 'Conciliada'] },
        },
        {
            id: '9.e', component: 'records_maintenance', slug: 'work_accidents_records', name: 'Registro de presuntos accidentes de trabajo y AT calificados',
            resp: 'M', support: 'S', legal: 'Art. 15; Art. 44', pattern: 'cases',
            indicators: [
                ind('9.e.1', '% de presuntos AT y AT calificados registrados', 'Casos registrados', 'Casos ocurridos', 100, 'Mensual', 'Registro de AT'),
            ],
            steps: ['Registrar cada presunto AT.', 'Actualizar el estado de la calificación.', 'Adjuntar la resolución.', 'Conciliar con los eventos del 5.a.'],
            evidences: ['Registro de AT'],
            config: { caseLabel: 'Registro', types: ['Presunto AT', 'AT calificado'], stages: ['Registrado', 'Documentado', 'Conciliado'] },
        },
        {
            id: '9.f', component: 'records_maintenance', slug: 'health_records_updating', name: 'Mantener actualizado el expediente de salud',
            resp: 'S', support: 'NA', legal: 'Art. 39; Art. 44 num. 2; Art. 45', pattern: 'workers',
            indicators: [
                ind('9.f.1', '% de expedientes de salud completos y actualizados', 'Expedientes completos y actualizados', 'Expedientes revisados', 95, 'Semestral', 'Expedientes físicos o digitales'),
            ],
            results: [res('Incidentes de acceso no autorizado a información de salud', 'Conteo de incidentes de confidencialidad en el período', 'casos', '0', 'Semestral')],
            steps: ['Abrir el expediente al ingreso.', 'Adjuntar cada evaluación y examen.', 'Auditar la completitud cada semestre.', 'Controlar el acceso (solo SISAT).'],
            evidences: ['Expedientes de salud', 'Bitácora de acceso'],
            config: {
                cols: [{ label: 'Evaluaciones', options: ['Completas', 'Completas', 'Faltan'] }, { label: 'Exámenes', options: ['Completos', 'Completos', 'Faltan'] }],
                states: [{ label: 'Completo', tone: 'ok' }, { label: 'Incompleto', tone: 'bad' }],
                action: 'Actualizar expediente',
                confidential: true,
            },
        },
        {
            id: '9.g', component: 'records_maintenance', slug: 'compliance_evidence_records', name: 'Evidencia del cumplimiento de políticas, programas y lineamientos de salud en el trabajo',
            resp: 'S', support: 'M', legal: 'Art. 46 num. 2', pattern: 'matrix',
            indicators: [
                ind('9.g.1', '% de requisitos con evidencia de cumplimiento disponible', 'Requisitos con evidencia disponible', 'Requisitos aplicables', 100, 'Semestral', 'Carpeta de evidencias'),
            ],
            steps: ['Listar los requisitos aplicables a la categoría.', 'Asociar la evidencia de cada uno.', 'Verificar vigencia y firma.', 'Mantener la carpeta lista para auditoría.'],
            evidences: ['Carpeta de evidencias'],
            config: { rowLabel: 'Requisito', rows: ['Política de salud', 'Plan Anual', 'Matriz IPER', 'Profesiograma', 'Programa de salud mental', 'Plan de emergencia'], cols: ['Evidencia cargada', 'Vigente', 'Firmada', 'Revisada'] },
        },
        {
            id: '9.h', component: 'records_maintenance', slug: 'control_entities_records', name: 'Todos los demás registros en materia de SST solicitados por los entes de control',
            resp: 'MS', support: 'NA', legal: 'Art. 44 num. 3 y 4; Art. 47', pattern: 'cases',
            indicators: [
                ind('9.h.1', '% de requerimientos de entes de control atendidos en plazo', 'Requerimientos atendidos en plazo', 'Requerimientos recibidos', 100, 'Por evento / anual', 'Oficios de respuesta'),
            ],
            steps: ['Registrar el requerimiento y su plazo.', 'Asignar responsable.', 'Preparar la información (sin datos confidenciales).', 'Responder y archivar el oficio.'],
            evidences: ['Oficios recibidos', 'Oficios de respuesta'],
            config: { caseLabel: 'Requerimiento', types: ['Ministerio de Salud', 'Ministerio del Trabajo', 'IESS'], stages: ['Recibido', 'En preparación', 'Respondido'] },
        },

        // ───────────────────────── 10. SEGUIMIENTO Y EVALUACIÓN ─────────────────────────
        {
            id: '10.a', component: 'monitoring_evaluation', slug: 'quality_improvement_program', name: 'Programa de mejoramiento continuo de la calidad de los SISAT',
            resp: 'S', support: 'M', legal: 'Art. 46 num. 1', pattern: 'cases',
            indicators: [
                ind('10.a.1', '% de acciones de mejora cerradas en plazo', 'Acciones de mejora cerradas en plazo', 'Acciones de mejora planificadas', 90, 'Trimestral', 'Plan de mejora continua'),
            ],
            steps: ['Registrar oportunidades de mejora (auditoría, indicadores, quejas).', 'Planificar la acción con responsable y plazo.', 'Ejecutar.', 'Verificar la eficacia y cerrar.'],
            evidences: ['Plan de mejora continua', 'Evidencia de cierre'],
            config: { caseLabel: 'Acción', types: ['Hallazgo de auditoría', 'Indicador bajo meta', 'Sugerencia de trabajadores'], stages: ['Identificada', 'Planificada', 'Ejecutada', 'Eficacia verificada'] },
        },
        {
            id: '10.b', component: 'monitoring_evaluation', slug: 'health_work_data_analysis', name: 'Análisis de datos de las condiciones de trabajo y salud en el trabajo',
            resp: 'MS', support: 'NA', legal: 'Art. 5; Art. 15', pattern: 'report',
            indicators: [
                ind('10.b.1', '% de contenidos del informe integrado anual de condiciones de trabajo y salud', 'Contenidos elaborados', 'Contenidos exigidos (5)', 100, 'Anual', 'Informe integrado'),
            ],
            steps: ['Cruzar datos de condiciones de trabajo con datos de salud.', 'Analizar por GES y por área.', 'Concluir prioridades.', 'Presentar el informe integrado.'],
            evidences: ['Informe integrado anual'],
            config: { periods: ['Informe 2024', 'Informe 2025', 'Informe 2026'], sections: ['Condiciones de trabajo por área', 'Condiciones de salud por GES', 'Relación exposición – salud', 'Prioridades de intervención', 'Firmas de ambos responsables'] },
        },
        {
            id: '10.c', component: 'monitoring_evaluation', slug: 'occupational_epidemiological_research', name: 'Investigación epidemiológica ocupacional en ámbitos de salud en el trabajo',
            resp: 'S', support: 'M', legal: 'Art. 11 num. 13; Art. 43', pattern: 'program',
            indicators: [
                ind('10.c.1', '% de estudios o investigaciones epidemiológicas ejecutados', 'Estudios ejecutados', 'Estudios planificados', 100, 'Anual', 'Protocolos e informes'),
            ],
            steps: ['Definir la pregunta de investigación.', 'Aprobar el protocolo.', 'Recolectar y analizar datos.', 'Publicar el informe.'],
            evidences: ['Protocolos de investigación', 'Informes de resultados'],
            config: { activities: ['Prevalencia de hipoacusia en producción', 'Lumbalgia en bodega', 'Estrés laboral en administración'], participationLabel: 'Participantes / muestra' },
        },
        {
            id: '10.d', component: 'monitoring_evaluation', slug: 'trends_indicators_analysis', name: 'Análisis de tendencias e indicadores de seguridad y salud en el trabajo',
            resp: 'MS', support: 'NA', legal: 'Art. 15; Art. 46 num. 3', pattern: 'report',
            indicators: [
                ind('10.d.1', '% de informes de tendencias elaborados (mínimo semestral)', 'Informes de tendencias elaborados', 'Informes programados', 100, 'Semestral', 'Tablero o informe de indicadores'),
                ind('10.d.2', '% de indicadores clave que cumplen su meta', 'Indicadores que alcanzan la meta', 'Indicadores medidos', 85, 'Semestral', 'Tablero de indicadores', 2),
            ],
            steps: ['Actualizar el tablero de indicadores.', 'Analizar tendencias: exposición, morbilidad, AT, EP, ausentismo.', 'Explicar las desviaciones.', 'Emitir el informe semestral.'],
            evidences: ['Tablero de indicadores', 'Informes de tendencias'],
            config: { periods: ['2025 – semestre 1', '2025 – semestre 2', '2026 – semestre 1', '2026 – semestre 2'], sections: ['Exposición a riesgos laborales', 'Morbilidad', 'Accidentes de trabajo', 'Enfermedades profesionales y relacionadas', 'Ausentismo'] },
        },
        {
            id: '10.e', component: 'monitoring_evaluation', slug: 'internal_audit_compliance', name: 'Análisis del cumplimiento (auditoría interna) de la gestión de los SISAT por categoría',
            resp: 'S', support: 'M', legal: 'Art. 16, Tabla 2; Art. 46 num. 2', pattern: 'matrix',
            indicators: [
                ind('10.e.1', '% de cumplimiento de los componentes SISAT de la categoría', 'Literales de la Tabla 2 cumplidos', 'Literales aplicables a la categoría', 90, 'Anual', 'Lista de verificación de auditoría', 2),
                ind('10.e.2', '% de requisitos de la auditoría interna anual cumplidos', 'Requisitos cumplidos (plan, ejecución, informe, socialización)', 'Requisitos exigidos (4)', 100, 'Anual', 'Informe de auditoría interna'),
            ],
            steps: ['Planificar la auditoría según la categoría.', 'Verificar cada literal aplicable.', 'Emitir el informe con hallazgos.', 'Trasladar los hallazgos al programa de mejora (10.a).'],
            evidences: ['Plan de auditoría', 'Lista de verificación', 'Informe de auditoría interna'],
            config: { rowLabel: 'Componente', rows: ['1. Orientación y planificación', '2. Análisis y recopilación', '3. Comunicación y capacitación', '4. Acciones preventivas', '5. Accidentes de trabajo', '6. Emergencias', '7. Enfermedades profesionales', '8. Salud general', '9. Registros'], cols: ['Literales verificados', 'Evidencia revisada', 'Cumple', 'Hallazgo cerrado'] },
        },
        {
            id: '10.f', component: 'monitoring_evaluation', slug: 'new_health_services_needs', name: 'Identificación de necesidades para la modificación o desarrollo de nuevos servicios de salud en el trabajo',
            resp: 'S', support: 'M', legal: 'Art. 46 num. 1 y 3', pattern: 'cases',
            indicators: [
                ind('10.f.1', '% de necesidades identificadas con propuesta implementada', 'Propuestas implementadas', 'Necesidades identificadas', 70, 'Anual', 'Informe anual con propuestas de mejora'),
            ],
            steps: ['Registrar la necesidad detectada.', 'Formular la propuesta.', 'Aprobar con el empleador.', 'Implementar y evaluar.'],
            evidences: ['Informe anual con propuestas de mejora'],
            config: { caseLabel: 'Necesidad', types: ['Nuevo servicio', 'Modificación de servicio'], stages: ['Identificada', 'Propuesta', 'Aprobada', 'Implementada'] },
        },
    ];

    const ALL_IDS = ITEMS.map((i) => i.id);

    function categoriesFor(id) {
        if (id.startsWith('T.')) return ['I', 'II', 'III', 'IV', 'V'];
        return CATEGORIES.map((c) => c.key).filter((key) => {
            const rule = TABLE2[key];
            if (rule === 'ALL') return true;
            if (typeof rule === 'string' && rule.startsWith('ALL_EXCEPT:')) return !rule.slice(11).split(',').includes(id);
            return rule.includes(id);
        });
    }

    ITEMS.forEach((item) => {
        item.categories = categoriesFor(item.id);
        const component = COMPONENTS.find((c) => c.key === item.component);
        item.componentName = `${component.number}. ${component.name}`;
        item.path = `${item.component}/${item.slug}`;
    });

    const SISAT = { STAFF, CATEGORIES, COMPONENTS, ITEMS, ALL_IDS, categoriesFor };

    if (typeof module !== 'undefined' && module.exports) module.exports = SISAT;
    else root.SISAT = SISAT;
})(typeof window !== 'undefined' ? window : globalThis);
