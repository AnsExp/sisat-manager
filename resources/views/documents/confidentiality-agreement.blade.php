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
            font-size: 10pt;
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
        <h1>ACUERDO DE CONFIDENCIALIDAD DE LA INFORMACIÓN MANEJADA DURANTE LA EVALUACION OCUPACIONAL</h1>
        <h2>COMPARECIENTES:</h2>
        <p>
            El/la señor/a DRA. MARIA GABRIELA REMACHE ABRIGO con cargo de MEDICO OCUPACIONAL y con cédula de identidad
            y/o ciudadanía No. 070528202-8 y para los efectos jurídicos del presente instrumento, se denominará Médico
            Ocupacional de manera libre y voluntaria, y en el uso de sus capacidades, suscribo el presente Acuerdo de
            Confidencialidad, al tenor de las siguientes cláusulas:
        </p>
        <h2>CLÁUSULA PRIMERA. - ANTECEDENTES:</h2>
        <h3>1. Constitución de la República del Ecuador manda:</h3>
        <p>
            <i>
                “Art. 66.- Se reconoce y garantizará a las personas: (...) <br>
                19. El derecho a la protección de datos de carácter personal, que incluye el acceso y la decisión sobre
                información y datos de este carácter, así como su correspondiente protección. La recolección, archivo,
                procesamiento, distribución o difusión de estos datos o información requerirán la autorización del
                titular o el mandato de la ley.”
            </i>
        </p>
        <p>
            <i>
                “Art. 198.- La Fiscalía General del Estado dirigirá el sistema nacional de protección y asistencia a
                víctimas, testigos y otros participantes en el proceso penal, para lo cual coordinará la obligatoria
                participación de las entidades públicas afines a los intereses y objetivos del sistema y articulará la
                participación de organizaciones de la sociedad civil.
            </i>
        </p>
        <p>
            <i>
                El sistema se regirá por los principios de accesibilidad, responsabilidad, complementariedad,
                oportunidad, eficacia y eficiencia”.
            </i>
        </p>
        <p>
            <i>
                “Art. 362.- (...) Los servicios de salud serán seguros, de calidad y calidez, y garantizarán el
                consentimiento informado, el acceso a la información y la confidencialidad de la información de los
                pacientes (...)”.
            </i>
        </p>
        <h3>Código Orgánico Integral Penal tipifica:</h3>
        <p>
            <i>
                “Art. 178.- Violación a la intimidad. - La persona que, sin contar con el consentimiento o la
                autorización legal, acceda, intercepte, examine, retenga, grabe, reproduzca, difunda o publique datos
                personales, mensajes de datos, voz, audio y vídeo, objetos postales, información contenida en soportes
                informáticos, comunicaciones privadas o reservadas de otra persona por cualquier medio, será sancionada
                con pena privativa de libertad de uno a tres años. (...)”.
            </i>
        </p>
        <p>
            <i>
                “Art. 179.- Revelación de secreto o información personal de terceros. - La persona que,teniendo
                conocimiento por razón de su estado u oficio, empleo, profesión o arte, de un secretocuya divulgación
                cause daño a otra persona y lo revele, será sancionada con pena privativa delibertad de seis meses a un
                año. (...)”.
            </i>
        </p>
        <p>
            <i>
                “Art. 445.- Organización. - La Fiscalía dirige el Sistema nacional de protección y asistencia
                devíctimas, testigos y otros participantes en el proceso, a través del cual todos los partícipes en
                lainvestigación preprocesal o en cualquier etapa del proceso, podrán acogerse a las
                medidasespecializadas de protección y asistencia para precautelar su integridad y no
                revictimización,cuando se encuentren en peligro”.
            </i>
        </p>
        <h3>Ley Orgánica del Sistema Nacional de Registro de Datos Públicos ordena:</h3>
        <p>
            <i>
                “Art. 4.- Responsabilidad de la información. - Las instituciones del sector público y privado y las
                personas naturales que actualmente o en el futuro administren bases o registros públicos, son
                responsables de la integridad, protección y control de los registros y bases de datos a su cargo. Dichas
                instituciones responderán por la veracidad, autenticidad, custodia y debida conservación de los
                registros. La responsabilidad sobre la veracidad y autenticidad de los datos registrados, es exclusiva
                de la o el declarante cuando esta o este provee toda la información. (...)”.
            </i>
        </p>
        <h3>Ley Orgánica de protección de datos personales manda:</h3>
        <p>
            <i>
                “Art. 4.- Términos y definiciones. - Para los efectos de la aplicación de la presente Ley se establecen
                las siguientes definiciones:

                <ul style="list-style-type: none;">
                    <li>
                        “(...) Dato personal: Dato que identifica o hace identificable a una persona natural, directa o
                        indirectamente. (...)
                    </li>
                    <li>
                        Datos relativos a la salud: datos personales relativos a la salud física o mental de una
                        persona,
                        incluida la prestación de servicios de atención sanitaria, que revelen información sobre su
                        estado de
                        salud.” (...)
                    </li>
                    <li>
                        Destinatario: Persona natural o jurídica que ha sido comunicada con datos personales (...)
                    </li>
                    <li>
                        Encargado del tratamiento de datos personales: Persona natural o jurídica, pública o privada,
                        autoridad
                        pública, u otro organismo que solo o conjuntamente con otros trate datos personales a nombre y
                        por
                        cuenta de un responsable de tratamiento de datos personales (...)
                    </li>
                </ul>
            </i>
        </p>
        <p>
            <i>
                “Art. 10.- Principios. - Sin perjuicio de otros principios establecidos en la Constitución de la
                República,
                los instrumentos internacionales ratificados por el Estado u otras normas jurídicas, la presente Ley se
                regirá por los principios de: (...)
                <ul style="list-style-type: none;">
                    <li>
                        d) Finalidad. - Las finalidades del tratamiento deberán ser determinadas, explícitas, legítimas
                        y comunicadas al titular: no podrán tratarse datos personales con fines distintos para los
                        cuales fueron recopilados, a menos que concurra una de las causales que habiliten un nuevo
                        tratamiento conforme los supuestos de tratamiento legítimo señalados en esta Ley (...)”.
                    </li>
                    <li>
                        g) Confidencialidad. - El tratamiento de datos personales debe concebirse sobre la base del
                        debido sigilo y secreto, es decir, no debe tratarse o comunicarse para un fin distinto para el
                        cual fueron recogidos, a menos que concurra una de las causales que habiliten un nuevo
                        tratamiento conforme los supuestos de tratamiento legítimo señalados en esta Ley. (...)”.
                    </li>
                </ul>
            </i>
        </p>
        <p>
            <i>
                Art. 31.-Tratamiento de datos relativos a la salud. -Todo tratamiento de datos relativos a la salud
                deberá cumplir con los siguientes parámetros mínimos y aquellos que determine la Autoridad de Protección
                de Datos Personales en la normativa emitida para el efecto:
            </i>
        <ol>
            <li>
                Los datos relativos a la salud generados en establecimientos de salud públicos o privados, serán
                tratados cumpliendo los principios de confidencialidad y secreto profesional. El titular de la
                información deberá brindar su consentimiento previo conforme lo determina esta Ley (...)”.
            </li>
            <li>
                Los datos relativos a la salud que se traten, siempre que sea posible, deberán ser previamente
                anonimizados o seudonimizados, evitando la posibilidad de identificar a los titulares de los mismos”.
            </li>
        </ol>
        </p>
        <h3>Ley Orgánica de Transparencia y Acceso a la Información Pública ordena:</h3>
        <p>
            <i>
                Art. 4.- Definiciones. Para la aplicación de la presente Ley, se tomarán en cuenta las siguientes
                definiciones: (...)
                <ul class="list-style-type: none;">
                    <li>
                        5. Información Confidencial: Información o documentación, en cualquier formato, final o
                        preparatoria, haya sido o no generada por el sujeto obligado, derivada de los derechos
                        personalísimos y fundamentales, y requiere expresa autorización de su titular para su
                        divulgación, que contiene datos que al revelarse (...).
                    </li>
                    <li>
                        6. Información Pública: Todo tipo de dato en documentos de cualquier formato, final o
                        preparatoria, haya sido o no generada por el sujeto obligado, que se encuentre en poder de los
                        sujetos obligados por esta Ley, contenidos, creados u obtenidos por ellos, que se encuentren
                        bajo su responsabilidad y custodio o que se hayan producido con recursos del Estado.
                    </li>
                </ul>
            </i>
        </p>
        <h2>CLÁUSULA SEGUNDA. - OBJETO:</h2>
        <p>
            En virtud de las disposiciones legales constantes en la cláusula anterior y de aquellas disposiciones
            legales que forman parte del marco normativo vigente ecuatoriano, DRA. MARIA GABRIELA REMACHE ABRIGO con
            cargo de Médico de Salud Ocupacional se compromete a guardar el debido sigilo y reserva respecto del caso
            respecto a la información y documentación que en razón de sus funciones maneje en {{
            $employee->company->name }}.
        </p>
        <h2>CLÁUSULA TERCERA. - OBLIGACIONES:</h2>
        <p>
            La DRA. MARIA GABRIELA REMACHE ABRIGO ha sido informado y acepta que en atención a la naturaleza de la
            información y a los riesgos que el mal uso y/o divulgación de la misma implican para el Centro de Trabajo,
            mantendrá el sigilo y secreto de toda la información a la que por razones de sus actividades tendrá acceso,
            únicamente compartirá la información en datos estadísticos y/o numéricos y no de forma individual y/o
            revelando la identidad del trabajador.
        </p>
        <p>
            El (médico, enfermera, psicólogo, odontólogo, trabajadora social) se obliga a abstenerse de usar, disponer,
            divulgar y/o publicar por cualquier medio, ya sea verbal o escrito, y en general, aprovecharse de la
            información y la documentación que generen en virtud de esta Evaluación Médica, o utilizarla para fines
            ajenos a los objetivos y necesidades de prevención y fomento en el ámbito ocupacional.
        </p>
        <p>
            El (médico, enfermera, psicólogo, odontólogo, trabajadora social), en razón del cargo que desempeña, puede
            tener acceso a información confidencial, cuya divulgación puede afectar a usuarios, pacientes, en general a
            los administrados, e inclusive a la propia entidad o área médica, por lo que resulta indispensable
            precautelar el manejo adecuado y reservado de tal información.
        </p>
        <h2>CLÁUSULA CUARTA. - RESPONSABILIDAD:</h2>
        <p>
            La DRA. MARIA GABRIELA REMACHE ABRIGO se obliga a entregar al Área de Salud Ocupacional toda documentación
            generada como resultado de las Evaluaciones Medicas Ocupacionales aplicadas a los trabajadores, sin reserva
            de copias de los expedientes que constituyan información amparada por el deber de confidencialidad objeto
            del presente Acuerdo en el supuesto de que cese la relación entre las partes por cualquier motivo.
        </p>
        <h2>CLÁUSULA QUINTA. - SANCIONES:</h2>
        <p>
            La DRA. MARIA GABRIELA REMACHE ABRIGO se encuentra sometido a la normativa que regula el uso de información
            pública y confidencial, principalmente, queda advertido de las responsabilidades administrativas, civiles y
            penales que la autoridad competente determinare por el incumplimiento de la normativa legal vigente
            relacionada con la materia y lo establecido en el presente Acuerdo, sin perjuicio de las acciones penales
            respectivas.
        </p>
        <h2>CLÁUSULA SEXTA. - DECLARACIÓN DE CONFIDENCIALIDAD:</h2>
        <p>
            La DRA. MARIA GABRIELA REMACHE ABRIGO declara que la información que genere, maneje o conozca en virtud del
            ejercicio de su cargo será utilizada única y exclusivamente para el eficiente desarrollo de sus funciones,
            en el ámbito laboral, debiendo mantener toda información de manera reservada en virtud de la protección de
            que gozan las y los trabajadores en el marco de la aplicación y ejercicio de las competencias derivadas de
            la Constitución y la Ley.
        </p>
        <p>
            El (médico, enfermera, psicólogo, odontólogo, trabajadora social) declara conocer la normativa constante en
            este acuerdo a más de la que rige el ordenamiento jurídico dentro de la República del Ecuador respecto de la
            protección y confidencialidad de la información en todas sus formas, en especial aquellas de la Constitución
            de la República del Ecuador, el Código Orgánico Integral Penal, Ley Orgánica del Servicio Público, Ley
            Orgánica de Transparencia y Acceso a la Información Pública; así como la normativa interna del Centro de
            trabajo y del Ministerio de Salud Pública.
        </p>
        <p>
            La DRA. MARIA GABRIELA REMACHE ABRIGO declara que no podrá reproducir, modificar, hacer pública, divulgar o
            utilizar por cualquier medio a terceros o para su propio beneficio o para beneficio de cualquier otra
            persona natural o jurídica, la información objeto del presente Acuerdo sin previa autorización expresa de su
            titular o por orden de la Autoridad Competente.
        </p>
        <h2>CLÁUSULA SEPTIMA. - PLAZO:</h2>
        <p>
            La DRA. MARIA GABRIELA REMACHE ABRIGO vinculado con el Centro de Trabajo acuerda y se compromete a mantener
            bajo confidencialidad la información generada y conocida en virtud de la función que desempeñe en el Centro
            de Trabajo mientras dure su relación laboral y después de la misma en estricto respeto a la normativa legal
            vigente, en razón de la sensibilidad de la información y las competencias.
        </p>
        <h2>CLÁUSULA OCTAVA. - ACEPTACIÓN DE LAS PARTES:</h2>
        <p>
            La DRA. MARIA GABRIELA REMACHE ABRIGO acepta el contenido de todas y cada una de las cláusulas del presente
            Acuerdo y en consecuencia se compromete a cumplirlas en toda su extensión, en fe y garantía de lo cual, y
            para los fines legales correspondientes, suscribe en la ciudad de Guayaquil.
        </p>
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