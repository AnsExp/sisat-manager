@php
/**
* @var App\Models\Employee $employee
*/
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @page {
            margin: 100pt 40pt 100pt;
        }

        body {
            margin: 0;
        }

        header {
            position: fixed;
            top: -80pt;
            left: 0;
            right: 0;
            height: 55pt;
        }

        footer {
            position: fixed;
            top: 640pt;
            left: 0;
            right: 0;
            height: 55pt;
            font-size: 9pt;
            color: gray;
        }

        p {
            font-size: 10pt;
        }

        header p {
            margin: 0;
            line-height: 1.2;
        }

        h1 {
            font-size: 14pt;
            text-align: center;
        }

        h2 {
            font-size: 12pt;
        }

        h3 {
            font-size: 10pt;
        }

        .sign {
            margin-top: 30pt;
            display: inline-block;
            padding: 10px 20px;
            border-top: 2px black solid;
        }
    </style>
</head>

<body>
    <header>
        <table style="width:100%;">
            <tr>
                <td style="width:170px; text-align:left;">
                    <img src="{{ public_path('img/republica-del-ecuador-logo.png') }}" alt="Logo República Ecuador"
                        style="width:75px;">
                </td>

                <td style="text-align:right; font-size: 18pt; font-weight: bold; color:gray; font-family: sans-serif;">
                    Ministerio de Salud Pública
                </td>
            </tr>
        </table>
    </header>
    <main>
        <h1>AUTORIZACION DEL TRATAMIENTO DE LA INFORMACION EN SALUD OCUPACIONAL Y DE LA PRACTICA MEDICA ASISTENCIAL
            OCUPACIONAL</h1>
        <h2>CLÁUSULA PRIMERA. - FINALIDAD:</h2>
        <p>
            En cumplimiento de lo dispuesto en la Ley Orgánica de Protección de Datos Personales, el titular de los
            datos personales otorga su consentimiento libre, específico, informado e inequívoca para el tratamiento de
            su información con la finalidad de dar cumplimiento a las normativas aplicables en materia de salud
            ocupacional y al proceso de vigilancia de salud del trabajador, siempre que su uso sea únicamente en el
            ámbito ocupacional para prevención y garantía de ambientes saludables del trabajo.
        </p>
        <p>
            El tratamiento de los datos personales se realizará exclusivamente en el ámbito ocupacional, con el objeto
            de prevenir riesgos laborales y garantizar condicionales laborales seguras y saludables, con el propósito de
            verificar la aptitud del trabajador para desempeñar sus funciones. Dicho tratamiento se regirá por los
            principios de licitud, transparencia, proporcionalidad y seguridad, asegurando en todo momento la
            confidencialidad e integridad de la información conforme a la normativa legal vigente.
        </p>
        <p>
            El titular de los datos podrá ejercer, en cualquier momento, su derecho de acceso, rectificación,
            cancelación, eliminación, oposición, portabilidad y suspensión del tratamiento, conforme a los
            procedimientos establecidos en la Ley.
        </p>
        <h2>CLAUSULA SEGUNDA. - BASE LEGAL</h2>
        <h3>Constitución de la República del Ecuador</h3>
        <p>
            El artículo 20, establece que el Estado garantizará la cláusula de conciencia a toda persona, y el secreto
            profesional y la reserva de la fuente a quienes informen, emitan sus opiniones a través de los medios u
            otras formas de comunicación, o laboren en cualquier actividad de comunicación.
        </p>
        <p>
            En el artículo 66 numeral 19 reconoce y garantizará a las personas: <i>“El derecho a la protección de datos
                de carácter personal, que incluye el acceso y la decisión sobre información y datos de este carácter,
                así como su correspondiente protección. La recolección, archivo, procesamiento, distribución o difusión
                de estos datos o información requerirán la autorización del titular o el mandato de la ley”</i>.
        </p>
        <p>
            En el artículo 362 ordena: <i>"La atención de salud como servicio público se prestará a través de las
                entidades estatales, privadas, autónomas, comunitarias y aquellas que ejerzan las medicinas ancestrales,
                alternativas y complementarias. Los servicios de salud serán seguros, de calidad y calidez, y
                garantizarán el consentimiento informado, el acceso a la información y la confidencialidad de la
                información de los pacientes (...)"</i>;
        </p>
        <h3>Ley Orgánica de Salud</h3>
        <p>
            <i>
                Toda persona, sin discriminación por motivo alguno, tiene en relación a la salud, los siguientes
                derechos: artículo 7, manda:"(...) f) Tener una historia clínica única redactada en términos precisos,
                comprensibles y completos; así como la confidencialidad respecto de la información en ella / contenida
                (...);
            </i>
        </p>
        <p>
            <i>
                h) Ejercer la autonomía de su voluntad a través del consentimiento por escrito y tomar decisiones
                respecto a su estado de salud y procedimientos de diagnóstico y tratamiento, salvo en los casos de
                urgencia, emergencia o riesgo para la vida de las personas y para la salud pública.
            </i>
        </p>
        <h3>Ley Orgánica de protección de datos personales</h3>
        <p>
            <i>
                “Art. 7.- Tratamiento legítimo de datos personas. - El tratamiento será legítimo y lícito si se cumple
                con alguna de las siguientes condiciones: 1) Por consentimiento del titular para el tratamiento de sus
                datos personales, para una o varias finalidades específicas”.
            </i>
        </p>
        <p>
            <i>
                “Art. 8.- Consentimiento. - Se podrá tratar y comunicar datos personales cuando se cuente con la
                manifestación de la voluntad del titular para hacerlo. El consentimiento será válido, cuando la
                manifestación de la voluntad sea: (...) 3) Informada, de modo que cumpla con el principio de
                transparencia y efectivice el derecho a la transparencia”.
            </i>
        </p>
        <h2>CLÁUSULA TERCERA. - DATOS TRATADOS:</h2>
        <p>
            El suscrito declara haber sido debidamente informado y acepta la aplicación del Formulario de Evaluaciones
            Médicas Ocupacionales, así como el tratamiento de sus datos personales recolectados en dicho contexto, cuya
            finalidad principal es la protección de su salud, bienestar y la de la población trabajadora, en el marco
            del cumplimiento de las obligaciones legales en materia de salud ocupacional.
        </p>
        <h2>CLÁUSULA CUARTA. - RESPONSABILIDAD:</h2>
        <p>
            El titular de los datos reconoce y acepta que es de su exclusiva responsabilidad informar de forma oportuna
            y veraz cualquier síntoma, condición médica o cambio relevante en su estado de salud que pueda tener
            implicaciones en el ámbito laboral, con el fin de permitir una adecuada vigilancia de la salud ocupacional y
            la implementación de medidas preventivas necesarias.
        </p>
        <h2>CLÁUSULA QUINTA. - AUTORIZACION DEL TITULAR:</h2>
        <p>
            Yo, <b>{{ strtoupper($employee->display_name()) }}</b>, portador(a) de la cédula de ciudadanía No. <b>{{
                $employee->id_card }}</b>, otorgo mi consentimiento libre, previo, informado, específico e inequívoco a
            la Empresa/Institución <b>{{ $employee->company->name }}</b> y al profesional médico correspondiente, para
            la realización del examen clínico ocupacional, de conformidad con los signos o síntomas identificados.
        </p>
        <p>
            Asimismo, autorizo el tratamiento de mis datos personales con carácter estadístico y/o numérico,
            relacionados con la Medicina Ocupacional, que incluyen, sin limitarse a ello, mis antecedentes médicos,
            resultados de evaluaciones clínicas y cualquier otra información necesaria para cumplir con los objetivos de
            la vigilancia de la salud laboral y la garantía de un entorno de trabajo seguro y saludable.
        </p>
        <p>
            Declaro haber sido debidamente informado(a) de que los datos personales y médicos obtenidos a través del
            Formulario de Evaluaciones Médicas Ocupacionales serán tratados conforme a los principios de
            confidencialidad, seguridad, minimización y necesidad, y que serán utilizados exclusivamente para la
            identificación, prevención y gestión de riesgos laborales inherentes a mi actividad, garantizando en todo
            momento el resguardo de mi privacidad y el anonimato en los reportes generados.
        </p>
        <p>
            Manifiesto, además, que esta autorización se otorga de forma libre, voluntaria y con pleno conocimiento de
            causa, y que su alcance se limita estrictamente a los fines anteriormente señalados. El tratamiento de mi
            información deberá realizarse en cumplimiento de la Ley Orgánica de Protección de Datos Personales y demás
            normativa aplicable.
        </p>
        <h2>CLÁUSULA SEXTA. - PLAZO:</h2>
        <p>
            La presente autorización tendrá vigencia durante el ejercicio de mis actividades en la empresa <b>{{
                $employee->company->name }}</b>.
        </p>
        <h2>CLÁUSULA SEPTIMA. - ACEPTACIÓN DE LAS PARTES:</h2>
        <p>
            El incumplimiento de las disposiciones establecidas en el presente documento dará lugar a la adopción de las
            medidas correspondientes en los ámbitos administrativo y penal, conforme a la normativa vigente.
        </p>
        <p>En la ciudad de <b>Guayaquil, al {{ now()->translatedFormat('d \d\e F \d\e Y') }}</b>.</p>
        <div style="text-align: center;">
            <p class="sign">Firma o Huella del Trabajador</p>
        </div>
    </main>
    <footer>
        <table style="width:100%;">
            <tr>
                <td style="vertical-align:middle;">
                    <ul style="list-style-type: none; list-style-position: inside;">
                        <li><b>Dirección: </b><b>Av. Quitumber Ñan y Av. Amary Ñan</b></li>
                        <li><b>Código postal: </b>170146 / Quito-Ecuador</li>
                        <li><b>Teléfono: </b>+593-2 3814-400</li>
                        <li>www.salud.gob.ec</li>
                    </ul>
                </td>

                <td style="width:170px; text-align:right;">
                    <img src="{{ public_path('img/el-nuevo-ecuador-logo.png') }}" alt="Logo El Nuevo Ecuador"
                        style="width:150px;">
                </td>
            </tr>
        </table>
    </footer>
</body>

</html>