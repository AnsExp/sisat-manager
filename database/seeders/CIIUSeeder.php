<?php

namespace Database\Seeders;

use App\Models\CIIU;
use Illuminate\Database\Seeder;

class CIIUSeeder extends Seeder
{
    private $CIUUs = [
        [
            'code' => 'A0111.11',
            'description' => 'Cultivo de trigo.',
            'level' => 'low',
        ],
        [
            'code' => 'A0111.12',
            'description' => 'Cultivo de maíz.',
            'level' => 'low',
        ],
        [
            'code' => 'A0111.13',
            'description' => 'Cultivo de quinua.',
            'level' => 'low',
        ],
        [
            'code' => 'A0111.19',
            'description' => 'Otros cultivos de cereales n.c.p.=> sorgo, cebada, centeno, avena, mijo, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'A0111.21',
            'description' => 'Cultivo de fréjol.',
            'level' => 'low',
        ],
        [
            'code' => 'A0111.22',
            'description' => 'Cultivo de arveja.',
            'level' => 'low',
        ],
        [
            'code' => 'A0111.23',
            'description' => 'Cultivo de lenteja.',
            'level' => 'low',
        ],
        [
            'code' => 'A0111.29',
            'description' => 'Otros cultivos le legumbres=> habas, garbanzos, vainitas, chocho (altramuces), etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'A0111.31',
            'description' => 'Cultivo de granos y semillas de soya.',
            'level' => 'low',
        ],
        [
            'code' => 'A0111.32',
            'description' => 'Cultivo de semillas de maní.',
            'level' => 'low',
        ],
        [
            'code' => 'A0111.39',
            'description' => 'Otros cultivos de semillas oleaginosas=> semillas de ricino, semillas de linaza, semillas de mostaza, semillas de girasol, semillas de ajonjolí (sésamo), semillas de colza, semillas de cártamo, semillas de níger, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'A0112.00',
            'description' => 'Cultivo de arroz (incluido el cultivo orgánico y el cultivo de arroz genéticamente modificado).',
            'level' => 'low',
        ],
        [
            'code' => 'A0113.11',
            'description' => 'Cultivo de brócoli, col y coliflor.',
            'level' => 'low',
        ],
        [
            'code' => 'A0113.12',
            'description' => 'Cultivo de alcachofa y espárrago.',
            'level' => 'low',
        ],
        [
            'code' => 'A0113.19',
            'description' => 'Otros cultivos de hortalizas de hoja o de tallo, espinaca, lechuga, berros, apio, perejil, acelga, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'A0113.21',
            'description' => 'Cultivo de tomates (excepto tomate de árbol), pepinillos y similares.',
            'level' => 'low',
        ],
        [
            'code' => 'A0113.22',
            'description' => 'Cultivo de sandías, melones.',
            'level' => 'low',
        ],
        [
            'code' => 'A0113.29',
            'description' => 'Otros cultivos de hortalizas de fruto, zapallo, sambo, zuquini, berenjenas, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'A0113.31',
            'description' => 'Cultivo de cebollas paiteñas, cebollas perla, cebollas en rama (puerros), ajos.',
            'level' => 'low',
        ],
        [
            'code' => 'A0113.32',
            'description' => 'Cultivo de zanahoria amarilla, rábano, remolacha (beteraba), (excepto la remolacha azucarera).',
            'level' => 'low',
        ],
        [
            'code' => 'A0113.39',
            'description' => 'Otros cultivos de hortalizas de raíces bulbosas o tuberosas=> papanabo, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'A0113.41',
            'description' => 'Cultivo de papa.',
            'level' => 'low',
        ],
        [
            'code' => 'A0113.42',
            'description' => 'Cultivo de yuca.',
            'level' => 'low',
        ],
        [
            'code' => 'A0113.49',
            'description' => 'Otros cultivos de raíces y tubérculos, camote (batata), melloco, oca, mashua, zanahoria blanca, papa china, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'A0113.91',
            'description' => 'Cultivo de hongos (champiñones) y trufas.',
            'level' => 'low',
        ],
        [
            'code' => 'A0113.92',
            'description' => 'Cultivo de semillas vegetales excepto semillas de remolacha.',
            'level' => 'low',
        ],
        [
            'code' => 'A0113.93',
            'description' => 'Cultivo de remolacha azucarera.',
            'level' => 'low',
        ],
        [
            'code' => 'A0113.99',
            'description' => 'Cultivo de otras hortalizas.',
            'level' => 'low',
        ],
        [
            'code' => 'A0114.00',
            'description' => 'Cultivo de caña de azúcar.',
            'level' => 'medium',
        ],
        [
            'code' => 'A0115.00',
            'description' => 'Cultivo de tabaco en bruto.',
            'level' => 'low',
        ],
        [
            'code' => 'A0116.01',
            'description' => 'Cultivo de algodón.',
            'level' => 'low',
        ],
        [
            'code' => 'A0116.02',
            'description' => 'Cultivo de yute, kenaf y otras plantas de fibras textiles blandas.',
            'level' => 'low',
        ],
        [
            'code' => 'A0116.03',
            'description' => 'Cultivo de lino y cáñamo.',
            'level' => 'low',
        ],
        [
            'code' => 'A0116.04',
            'description' => 'Cultivo de sisal y otras plantas de fibras textiles del género agave.',
            'level' => 'low',
        ],
        [
            'code' => 'A0116.05',
            'description' => 'Cultivo de abacá, ramio y otras plantas de fibras textiles.',
            'level' => 'low',
        ],
        [
            'code' => 'A0116.09',
            'description' => 'Cultivo de otras plantas de fibras.',
            'level' => 'low',
        ],
        [
            'code' => 'A0119.01',
            'description' => 'Cultivo de plantas forrajeras=> nabos forrajeros, remolacha forrajera, raíces forrajeras, trébol, alfalfa, esparceta, maíz forrajero, kikuyo, raygrás y otras plantas forrajeras.',
            'level' => 'low',
        ],
        [
            'code' => 'A0119.02',
            'description' => 'Cultivo de semillas de remolacha (exceptuando la remolacha azucarera) y semillas de plantas forrajeras.',
            'level' => 'low',
        ],
        [
            'code' => 'A0119.03',
            'description' => 'Cultivo de flores, incluida la producción de flores cortadas y capullos.',
            'level' => 'medium',
        ],
        [
            'code' => 'A0119.04',
            'description' => 'Producción de semillas de flores.',
            'level' => 'low',
        ],
        [
            'code' => 'A0121.00',
            'description' => 'Cultivo de uvas para vino y uvas para ser consumidas como fruta fresca.',
            'level' => 'low',
        ],
        [
            'code' => 'A0122.01',
            'description' => 'Cultivo de bananos y plátanos.',
            'level' => 'low',
        ],
        [
            'code' => 'A0122.02',
            'description' => 'Cultivo de mangos.',
            'level' => 'low',
        ],
        [
            'code' => 'A0122.03',
            'description' => 'Cultivo de maracuyá.',
            'level' => 'low',
        ],
        [
            'code' => 'A0122.04',
            'description' => 'Cultivo de piñas.',
            'level' => 'low',
        ],
        [
            'code' => 'A0122.09',
            'description' => 'Otros cultivos de frutas tropicales y subtropicales=> papayas, babacos, chamburos, aguacates, higos, arazá, guayabas, guanábana, guaba, chirimoya, naranjillas, zapotes, borojó, tamarindo, granadillas, dátiles, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'A0123.01',
            'description' => 'Cultivo de naranjas.',
            'level' => 'low',
        ],
        [
            'code' => 'A0123.02',
            'description' => 'Cultivo de mandarinas, clementinas y tangerinas.',
            'level' => 'low',
        ],
        [
            'code' => 'A0123.09',
            'description' => 'Otros cultivos de cítricos, limones, toronjas, limas, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'A0124.01',
            'description' => 'Cultivo de manzanas, peras y membrillos.',
            'level' => 'low',
        ],
        [
            'code' => 'A0124.02',
            'description' => 'Cultivo de duraznos (melocotones), albaricoques y nectarinas.',
            'level' => 'low',
        ],
        [
            'code' => 'A0124.09',
            'description' => 'Otros cultivos de frutas con hueso y con pepa=> cerezas, ciruelas, endrinas, capulíes, ovos, claudias, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'A0125.01',
            'description' => 'Cultivo de bayas grosellas, grosellas espinosas, kiwis, frambuesas, fresas (frutillas), moras, mortiños (arándanos), uvilla y otras bayas.',
            'level' => 'low',
        ],
        [
            'code' => 'A0125.02',
            'description' => 'Cultivo de tomates de árbol.',
            'level' => 'low',
        ],
        [
            'code' => 'A0125.03',
            'description' => 'Producción de semillas de frutas.',
            'level' => 'low',
        ],
        [
            'code' => 'A0125.04',
            'description' => 'Cultivos de nueces comestibles=> almendras, anacardos, castañas, avellanas, pistachos, nueces de nogal y otras nueces.',
            'level' => 'low',
        ],
        [
            'code' => 'A0125.09',
            'description' => 'Otros cultivos de frutos de árboles y arbustos=> pitahaya, tuna, algarroba, taxos, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'A0126.01',
            'description' => 'Cultivo de palmas de aceite (palma africana).',
            'level' => 'low',
        ],
        [
            'code' => 'A0126.09',
            'description' => 'Otros cultivos de frutos oleaginosos=> cocos, aceitunas, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'A0127.01',
            'description' => 'Cultivo de café.',
            'level' => 'low',
        ],
        [
            'code' => 'A0127.02',
            'description' => 'Cultivo de cacao.',
            'level' => 'low',
        ],
        [
            'code' => 'A0127.09',
            'description' => 'Otros cultivos de plantas con las que se preparan bebidas=> té, mate, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'A0128.01',
            'description' => 'Cultivo de especias del género capsicum=> ajíes, pimientos, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'A0128.02',
            'description' => 'Cultivo de especias perennes y no perennes=> nuez moscada, macis, cardamomos, anís, badiana, hinojo, pimienta, canela, clavo, jengibre, vainilla, lúpulo, estragón, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'A0128.03',
            'description' => 'Cultivo de plantas medicinales, narcóticas y plantas utilizadas principalmente en perfumería, para la preparación de insecticidas, fungicidas o propósitos similares=> ortiga, menta, belladona, hierba luisa, manzanilla, guanto, orégano, uña de gato, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'A0129.01',
            'description' => 'Cultivo de materiales vegetales de los tipos utilizados principalmente para trenzar=> paja toquilla, totora, bambú, mimbre, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'A0129.02',
            'description' => 'Cultivo de palmito.',
            'level' => 'low',
        ],
        [
            'code' => 'A0129.09',
            'description' => 'Otros cultivos de plantas perennes=> cultivo de árboles de caucho, látex, árboles para la extracción de savia, árboles de Navidad, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'A0130.00',
            'description' => 'Explotación de viveros (excepto viveros forestales), cultivo de plantas para=> el trasplante incluido césped para trasplante, plantas con fines ornamentales, plantas vivas para utilizar sus bulbos, tubérculos y raíces; esquejes e injertos; estacas; esporas de hongos, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'A0141.01',
            'description' => 'Cría y reproducción de ganado bovino incluido la obtención de pelo y excremento.',
            'level' => 'low',
        ],
        [
            'code' => 'A0141.02',
            'description' => 'Producción de leche cruda de vaca.',
            'level' => 'low',
        ],
        [
            'code' => 'A0141.03',
            'description' => 'Producción de semen y embriones bovinos.',
            'level' => 'low',
        ],
        [
            'code' => 'A0141.09',
            'description' => 'Cría y reproducción de otro tipo de ganado bovino=> búfalos.',
            'level' => 'low',
        ],
        [
            'code' => 'A0142.01',
            'description' => 'Cría y reproducción de caballos (incluidos caballos de carreras).',
            'level' => 'low',
        ],
        [
            'code' => 'A0142.02',
            'description' => 'Cría y reproducción de asnos (burros), mulas y burdéganos.',
            'level' => 'low',
        ],
        [
            'code' => 'A0143.00',
            'description' => 'Cría y reproducción de camélidos=> alpaca, llama, vicuña, etcétera incluido la obtención de pelo y excremento.',
            'level' => 'medium',
        ],
        [
            'code' => 'A0144.01',
            'description' => 'Cría y reproducción de ovejas y cabras.',
            'level' => 'low',
        ],
        [
            'code' => 'A0144.02',
            'description' => 'Producción de leche cruda de oveja y cabra.',
            'level' => 'low',
        ],
        [
            'code' => 'A0144.03',
            'description' => 'Producción de lana cruda y pelo de ovejas y cabras.',
            'level' => 'low',
        ],
        [
            'code' => 'A0144.04',
            'description' => 'Producción de semen y embriones de ovejas y cabras.',
            'level' => 'low',
        ],
        [
            'code' => 'A0145.01',
            'description' => 'Cría y reproducción de cerdos.',
            'level' => 'low',
        ],
        [
            'code' => 'A0145.02',
            'description' => 'Producción de semen y embriones de cerdos.',
            'level' => 'low',
        ],
        [
            'code' => 'A0146.01',
            'description' => 'Explotación de criaderos de pollos y reproducción de aves de corral, pollos y gallinas (aves de la especie Gallus Domesticus).',
            'level' => 'low',
        ],
        [
            'code' => 'A0146.02',
            'description' => 'Cría y reproducción de=> codornices, patos, gansos, pavos y gallinas de Guinea.',
            'level' => 'low',
        ],
        [
            'code' => 'A0146.03',
            'description' => 'Producción de huevos de aves de corral.',
            'level' => 'low',
        ],
        [
            'code' => 'A0149.10',
            'description' => 'Cría y reproducción de avestruces, emúes, palomas, tórtolas y otras aves (excepto aves de corral).',
            'level' => 'medium',
        ],
        [
            'code' => 'A0149.20',
            'description' => 'Cría y reproducción de conejos y cuyes.',
            'level' => 'low',
        ],
        [
            'code' => 'A0149.31',
            'description' => 'Cría y reproducción de insectos.',
            'level' => 'low',
        ],
        [
            'code' => 'A0149.32',
            'description' => 'Cría y reproducción de reptiles.',
            'level' => 'low',
        ],
        [
            'code' => 'A0149.91',
            'description' => 'Producción de pieles finas, cueros de reptiles y plumas de aves como parte de la explotación pecuaria.',
            'level' => 'medium',
        ],
        [
            'code' => 'A0149.92',
            'description' => 'Explotación de criaderos de gusanos (lombricultura), moluscos terrestres, caracoles, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'A0149.93',
            'description' => 'Cría de gusanos de seda, producción de capullos de gusanos de seda.',
            'level' => 'low',
        ],
        [
            'code' => 'A0149.94',
            'description' => 'Apicultura y producción de cera y miel de abeja.',
            'level' => 'low',
        ],
        [
            'code' => 'A0149.95',
            'description' => 'Cría y reproducción de animales domésticos (excepto peces)=> gatos, perros, pájaros, hámsters, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'A0149.96',
            'description' => 'Cría de diversos animales.',
            'level' => 'low',
        ],
        [
            'code' => 'A0149.97',
            'description' => 'Obtención de pelo y excremento de otros animales, n.c.p.',
            'level' => 'low',
        ],
        [
            'code' => 'A0150.00',
            'description' => 'Explotación mixta de cultivos y animales sin especialización en ninguna de las actividades. El tamaño del conjunto de la explotación agrícola no es un factor determinante. Si el cultivo de productos agrícolas o la cría de animales representan en una unidad determinada una proporción igual o superior al 66% de los márgenes brutos corrientes, la actividad mixta no debe clasificarse en esta clase, sino entre los cultivos o las actividades de cría de animales.',
            'level' => 'low',
        ],
        [
            'code' => 'A0161.01',
            'description' => 'Actividades de acondicionamiento y mantenimiento de terrenos para usos agrícolas=> plantación o siembra de cultivos y cosecha, poda de árboles frutales y viñas, transplante de arroz y entresacado de remolacha.',
            'level' => 'low',
        ],
        [
            'code' => 'A0161.02',
            'description' => 'Actividades de fumigación de cultivos, incluida la fumigación aérea; tratamiento de cultivos, control de plagas (incluidos los conejos); en relación con la agricultura.',
            'level' => 'high',
        ],
        [
            'code' => 'A0161.03',
            'description' => 'Suministro de maquinaria agrícola con operadores y personal.',
            'level' => 'medium',
        ],
        [
            'code' => 'A0161.04',
            'description' => 'Manejo de sistemas de riego con fines agrícolas.',
            'level' => 'low',
        ],
        [
            'code' => 'A0162.01',
            'description' => 'Actividades para mejorar la reproducción, crecimiento y rendimiento de los animales relacionadas con la inseminación artificial, servicios de sementales.',
            'level' => 'low',
        ],
        [
            'code' => 'A0162.02',
            'description' => 'Servicios de inspección sanitaria, arreo y pasturaje de ganado, capadura de animales, limpieza de gallineros, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'A0162.09',
            'description' => 'Otras actividades de apoyo a la ganadería=> actividades de albergue y cuidado de animales de granja, esquila de ovejas, herradores, etcétera',
            'level' => 'low',
        ],
        [
            'code' => 'A0163.01',
            'description' => 'Actividades de preparación de la cosecha para su comercialización en los mercados primarios=> limpieza, recorte, clasificación, desinfección, empacado poscosecha, encerado de frutas.',
            'level' => 'low',
        ],
        [
            'code' => 'A0163.09',
            'description' => 'Otras actividades de Poscosecha=> desmotado de algodón, preparación de hojas de tabaco, preparación de cacao y café en grano, secado al sol de frutas y hortalizas.',
            'level' => 'low',
        ],
        [
            'code' => 'A0164.00',
            'description' => 'Actividades poscosecha dirigidas a mejorar la calidad de las semillas para propagación, a través de la eliminación de los materiales que no son semilla, semillas de tamaño inferior al normal, semillas dañadas mecánicamente o por insectos y semillas inmaduras, así como la eliminación de la humedad de las semillas hasta un nivel que permita su almacenamiento seguro. Esta actividad incluye el secado, limpieza, clasificación y tratamiento de semillas hasta su comercialización. Se incluye asi mismo el tratamiento de semillas genéticamente modificadas.',
            'level' => 'low',
        ],
        [
            'code' => 'A0170.01',
            'description' => 'Actividades de caza ordinaria y mediante trampas para fines comerciales. Captura de animales (vivos o muertos) para carne, producción de pieles incluso pieles finas, cueros (cueros de reptiles), plumas para utilizarlos en la investigación, en zoológicos o como animales domésticos.',
            'level' => 'low',
        ],
        [
            'code' => 'A0170.02',
            'description' => 'Captura en tierra de mamíferos marinos, como focas y morsas.',
            'level' => 'low',
        ],
        [
            'code' => 'A0210.01',
            'description' => 'Explotación de viveros forestales y madera en pie=> plantación, replante, transplante, aclareo y conservación de bosques y zonas forestadas (Estas actividades pueden ser llevadas a cabo en bosques naturales o en plantaciones forestales).',
            'level' => 'low',
        ],
        [
            'code' => 'A0210.02',
            'description' => 'Cultivo de monte bajo (arbustos), madera para pasta y para leña (Esta actividad puede ser llevada a cabo en bosques naturales o en plantaciones forestales).',
            'level' => 'low',
        ],
        [
            'code' => 'A0220.01',
            'description' => 'Producción de madera en bruto (rollos) para las industrias manufactureras que utilizan productos forestales, chonta, balsa, ciprés, pino, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'A0220.02',
            'description' => 'Producción de madera en bruto (rollos) utilizada en forma no procesada como puntales, estacas, cercas, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'A0220.03',
            'description' => 'Actividades de recolección y producción de leña.',
            'level' => 'low',
        ],
        [
            'code' => 'A0230.00',
            'description' => 'Recolección de materiales silvestres=> hongos, trufas, bayas, nueces, balata y otras gomas similares al caucho, corcho, goma laca y resinas, bálsamos, crin vegetal, crin marina (zostera), bellotas y castañas de indias, musgos y líquenes, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'A0240.01',
            'description' => 'Actividades de inventarios forestales y evaluación de existencias maderables, lucha contra plagas forestales y servicios de consultoría de gestión forestal.',
            'level' => 'low',
        ],
        [
            'code' => 'A0240.02',
            'description' => 'Actividades de extinción y prevención de incendios forestales.',
            'level' => 'low',
        ],
        [
            'code' => 'A0240.03',
            'description' => 'Transporte de troncos dentro del bosque.',
            'level' => 'low',
        ],
        [
            'code' => 'A0311.01',
            'description' => 'Actividades de pesca de altura y costera=> extracción de peces, crustáceos y moluscos marinos, tortugas, erizos de mar, ascidias y otros tunicados, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'A0311.02',
            'description' => 'Actividades de captura de ballenas.',
            'level' => 'medium',
        ],
        [
            'code' => 'A0311.03',
            'description' => 'Actividades de buques dedicados tanto a la pesca marina como a la preparación y conservación de pescado.',
            'level' => 'medium',
        ],
        [
            'code' => 'A0311.09',
            'description' => 'Recolección de otros materiales y organismos marinos=> perlas naturales, esponjas, corales y algas.',
            'level' => 'medium',
        ],
        [
            'code' => 'A0312.01',
            'description' => 'Pesca en aguas interiores, extracción de peces, crustáceos y moluscos de agua dulce.',
            'level' => 'medium',
        ],
        [
            'code' => 'A0312.02',
            'description' => 'Recolección de materiales de agua dulce.',
            'level' => 'medium',
        ],
        [
            'code' => 'A0321.01',
            'description' => 'Actividades de acuicultura en agua del mar o en tanques de agua salada=> cría de peces incluido la cria de peces ornamentales marinos.',
            'level' => 'low',
        ],
        [
            'code' => 'A0321.02',
            'description' => 'Explotación de criaderos de camarones (camaroneras), criaderos de larvas de camarón (laboratorios de larvas de camarón).',
            'level' => 'low',
        ],
        [
            'code' => 'A0321.03',
            'description' => 'Producción de larvas de bivalvos (ostras, mejillones, etcétera) y de otros moluscos, crías de bogavante, alevines y jaramugos, cría de crustáceos (langostas y langostinos) y otros animales acuáticos en agua de mar.',
            'level' => 'low',
        ],
        [
            'code' => 'A0321.04',
            'description' => 'Actividades de cultivo de perlas, laver y otras algas comestibles.',
            'level' => 'low',
        ],
        [
            'code' => 'A0322.01',
            'description' => 'Cría y explotación de criaderos de peces (de agua dulce) incluido peces ornamentales, truchas, tilapias, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'A0322.02',
            'description' => 'Cría de crustáceos, bivalvos, moluscos y otros animales acuáticos de agua dulce.',
            'level' => 'low',
        ],
        [
            'code' => 'A0322.03',
            'description' => 'Cría de ranas.',
            'level' => 'low',
        ],
        [
            'code' => 'B0510.00',
            'description' => 'Actividades de extracción de carbón de piedra en minas, incluyendo la extracción a través de métodos de licuefacción, recuperación de carbón de piedra de escombreras, limpieza, cribado, clasificación, pulverización, compresión, etcétera; del carbón para clasificarlo, mejorar su calidad o facilitar su transporte o almacenamiento.',
            'level' => 'high',
        ],
        [
            'code' => 'B0520.00',
            'description' => 'Extracción de lignito (carbón pardo) en minas, incluyendo la extracción a través de métodos de licuefacción, actividades de limpieza, deshidratación, pulverización, compresión, etcétera; de lignito para mejorar su calidad o facilitar su transporte o almacenamiento.',
            'level' => 'high',
        ],
        [
            'code' => 'B0610.00',
            'description' => 'Extracción de aceites crudos de petróleo, esquistos bituminosos y arenas alquitranadas, producción de petróleo crudo de esquistos y arenas bituminosas, procesos de obtención de crudos=> decantación, desalado, deshidratación, estabilización, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'B0620.01',
            'description' => 'Producción de hidrocarburos crudos en estado gaseoso (gas natural), extracción de condensados, drenaje y separación de las fracciones líquidas, desulfurización de gas.',
            'level' => 'high',
        ],
        [
            'code' => 'B0620.02',
            'description' => 'Extracción de hidrocarburos líquidos, obtenidos a través de licuefacción o pirolisis.',
            'level' => 'high',
        ],
        [
            'code' => 'B0710.01',
            'description' => 'Extracción de minerales estimados principalmente por su contenido en hierro.',
            'level' => 'high',
        ],
        [
            'code' => 'B0710.02',
            'description' => 'Beneficio y aglomeración de minerales de hierro.',
            'level' => 'high',
        ],
        [
            'code' => 'B0721.00',
            'description' => 'Extracción de minerales estimados principalmente por su contenido de uranio y torio=> pecblenda, óxido natural de uranio, etcétera; concentración de uranio y torio, producción de torta amarilla (concentrado de uranio).',
            'level' => 'high',
        ],
        [
            'code' => 'B0729.01',
            'description' => 'Extracción y preparación de minerales estimados principalmente por su contenido de metales no ferrosos=> aluminio (bauxita), cobre, plomo, zinc, estaño, manganeso, cromo, níquel, cobalto, molibdeno, tántalo, vanadio, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'B0729.02',
            'description' => 'Extracción de metales preciosos=> oro, plata, platino.',
            'level' => 'high',
        ],
        [
            'code' => 'B0810.11',
            'description' => 'Extracción, talla sin labrar y aserrado de piedra de construcción, como mármol, granito, arenisca, pizarra, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'B0810.12',
            'description' => 'Extracción, trituración y fragmentación de piedra caliza, para utilizarla en la fabricación de cal o cemento.',
            'level' => 'high',
        ],
        [
            'code' => 'B0810.13',
            'description' => 'Extracción de yeso y anhidrita.',
            'level' => 'high',
        ],
        [
            'code' => 'B0810.14',
            'description' => 'Extracción de creta y dolomita sin calcinar.',
            'level' => 'high',
        ],
        [
            'code' => 'B0810.21',
            'description' => 'Extracción y dragado de arenas para la industria, arenas para la construcción, grava (ripio) y gravilla.',
            'level' => 'high',
        ],
        [
            'code' => 'B0810.22',
            'description' => 'Fragmentación y trituración de piedra, grava (ripio), gravilla y arena, para la construcción.',
            'level' => 'high',
        ],
        [
            'code' => 'B0810.23',
            'description' => 'Extracción de arcillas, arcillas refractarias y caolín.',
            'level' => 'high',
        ],
        [
            'code' => 'B0891.01',
            'description' => 'Extracción de fosfatos y sales de potasio naturales.',
            'level' => 'high',
        ],
        [
            'code' => 'B0891.02',
            'description' => 'Extracción de azufre natural (nativo).',
            'level' => 'high',
        ],
        [
            'code' => 'B0891.03',
            'description' => 'Extracción y preparación de pirita y pirrotina, excepto el tostado de pirita y pirrotina.',
            'level' => 'high',
        ],
        [
            'code' => 'B0891.04',
            'description' => 'Extracción de sulfato y carbonato de bario naturales (baritina y witherita), boratos naturales, sulfatos de magnesio naturales (kieserita).',
            'level' => 'high',
        ],
        [
            'code' => 'B0891.05',
            'description' => 'Extracción de tierras colorantes, espatoflúor y otros minerales estimados principalmente como fuente de sustancias químicas.',
            'level' => 'high',
        ],
        [
            'code' => 'B0891.06',
            'description' => 'Extracción de guano.',
            'level' => 'medium',
        ],
        [
            'code' => 'B0892.00',
            'description' => 'Extracción, aglomeración, preparación de turba para mejorar su calidad, facilitar su transporte o almacenamiento.',
            'level' => 'high',
        ],
        [
            'code' => 'B0893.01',
            'description' => 'Extracción de sal en yacimientos subterráneos, incluso mediante disolución y bombeo.',
            'level' => 'high',
        ],
        [
            'code' => 'B0893.02',
            'description' => 'Producción de sal mediante evaporación al sol de agua de mar y otras aguas salinas.',
            'level' => 'medium',
        ],
        [
            'code' => 'B0893.03',
            'description' => 'Trituración, purificación y refinado de la sal por el productor.',
            'level' => 'high',
        ],
        [
            'code' => 'B0899.01',
            'description' => 'Extracción de bitumen natural sólido, asfalto natural, asfaltitas y roca asfáltica.',
            'level' => 'high',
        ],
        [
            'code' => 'B0899.02',
            'description' => 'Extracción de piedras preciosas y semipreciosas, gemas, mica, cuarzo, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'B0899.03',
            'description' => 'Extracción de materiales abrasivos=> grafito natural, piedra pómez, feldespatos, esmeril, corindón, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'B0899.09',
            'description' => 'Extracción de otros minerales=> asbesto, polvo de fósiles silíceos, esteatita (talco), vermiculita, peolita, clorita, antimonio, magnesita, silicato de magnesio (polvo), silicio, etcétera',
            'level' => 'high',
        ],
        [
            'code' => 'B0910.01',
            'description' => 'Actividades de servicios de extracción de petróleo y gas realizadas a cambio de una retribución o por contrato=> sondeos, exploración (por ejemplo=> métodos tradicionales de prospección, como observaciones geológicas en posibles yacimientos); perforación dirigida y reperforación; perforación inicial; erección, reparación y desmantelamiento de torres de perforación, cementación de tubos de encamisado de los pozos de petróleo y gas, bombeo, taponamiento y abandono de pozos, etcétera; licuefacción y regasificación de gas natural para su transporte, realizadas en el lugar de extracción; drenaje y bombeo.',
            'level' => 'high',
        ],
        [
            'code' => 'B0910.02',
            'description' => 'Servicios de prevención y extinción de incendios en campos de petróleo y gas.',
            'level' => 'high',
        ],
        [
            'code' => 'B0990.01',
            'description' => 'Servicios de apoyo a cambio de una retribución o por contrato, requeridas para la extracción de carbón de piedra, lignito y turba=> exploración (por ejemplo=> métodos de prospección tradicionales, como recogida de muestras y realización de observaciones geológicas en posibles yacimientos); perforaciones de prueba y sondeos; drenaje y bombeo.',
            'level' => 'high',
        ],
        [
            'code' => 'B0990.02',
            'description' => 'Servicios de apoyo a cambio de una retribución o por contrato, requeridas para la extracción de minerales metalíferos=> perforaciones de prueba y sondeos, exploración (por ejemplo=> métodos de prospección tradicionales, como recogida de muestras y realización de observaciones geológicas en posibles yacimientos; drenaje y bombeo.',
            'level' => 'high',
        ],
        [
            'code' => 'B0990.09',
            'description' => 'Servicios de apoyo a cambio de una retribución o por contrato, requeridas para la explotación de otras minas y canteras=> perforaciones de prueba y sondeos, exploración (por ejemplo=> métodos de prospección tradicionales, como recogida de muestras y realización de observaciones geológicas en posibles yacimientos); drenaje y bombeo.',
            'level' => 'high',
        ],
        [
            'code' => 'C1010.11',
            'description' => 'Explotación de mataderos que realizan actividades de sacrificio, faenamiento, preparación, producción y empacado de carne fresca refrigerada o congelada en canales o piezas o porciones individuales de=> bovino, porcino, ovino, caprino.',
            'level' => 'high',
        ],
        [
            'code' => 'C1010.12',
            'description' => 'Explotación de mataderos que realizan actividades de sacrificio, faenamiento, preparación, producción y empacado de carne fresca refrigerada o congelada incluso en piezas o porciones individuales de aves de corral.',
            'level' => 'high',
        ],
        [
            'code' => 'C1010.13',
            'description' => 'Actividades de sacrificio, faenamiento, preparación, producción y empacado de carne fresca refrigerada o congelada incluso en piezas o porciones individuales de=> cuyes, conejos, rana (ancas de rana) etcétera,',
            'level' => 'medium',
        ],
        [
            'code' => 'C1010.14',
            'description' => 'Captura, sacrificio y procesamiento de ballenas en tierra o sobre embarcaciones especializadas.',
            'level' => 'high',
        ],
        [
            'code' => 'C1010.21',
            'description' => 'Preparación y conservación de carne mediante=> desecación, saladura, ahumado, enlatado.',
            'level' => 'low',
        ],
        [
            'code' => 'C1010.22',
            'description' => 'Fabricación de productos cárnicos=> salchichas, salchichón, chorizo, salame, morcillas, mortadela, patés, chicharrones finos, jamones, embutidos, etcétera. Incluso snacks de cerdo.',
            'level' => 'low',
        ],
        [
            'code' => 'C1010.23',
            'description' => 'Producción de cueros y pieles originados en mataderos incluida pieles depiladas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1010.24',
            'description' => 'Extracción de manteca de cerdo y otras grasas comestibles de origen animal.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1010.25',
            'description' => 'Obtención de despojos de animales, lana de matadero, pelo ordinario, plumas (plumón) y pelusas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1010.26',
            'description' => 'Producción de harinas o sémolas de carne.',
            'level' => 'low',
        ],
        [
            'code' => 'C1010.30',
            'description' => 'Servicios de apoyo a la elaboración y conservación de carne a cambio de una retribución o por contrato.',
            'level' => 'low',
        ],
        [
            'code' => 'C1020.01',
            'description' => 'Preparación y conservación de camarón y langostinos mediante el congelado, ultracongelado secado, ahumado, salado, sumergido en salmuera y enlatado, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1020.02',
            'description' => 'Preparación y conservación de pescado, crustáceos (excepto camarón y langostinos) y otros moluscos mediante el congelado, ultracongelado, secado, ahumado, salado, sumergido en salmuera y enlatado, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1020.03',
            'description' => 'Elaboración de productos de camarón y langostinos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1020.04',
            'description' => 'Elaboración de productos de pescado=> cocinado, filetes de pescado, huevos de pescado, caviar y sustitutos del caviar, etcétera. Elaboración de productos de crustáceos (excepto camarón y langostinos) y otros moluscos mediante el secado, salazón, conservación en salmuera, enlatados, ahumado, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1020.05',
            'description' => 'Elaboración de harina de pescado para consumo humano.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1020.06',
            'description' => 'Elaboración de harina y solubles de pescado y otros animales acuáticos para alimento de animales, no aptos para el consumo humano.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1020.07',
            'description' => 'Actividades de buques-factoría que se dedican a la pesca y a la conservación de pescado, crustáceos y moluscos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1020.08',
            'description' => 'Elaboración de productos de algas y otros recursos marinos, mediante el secado, salazón, conservación en salmuera, enlatados, ahumado, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1020.09',
            'description' => 'Servicios de apoyo a la elaboración y conservación de pescados, crustáceos y moluscos a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1030.11',
            'description' => 'Elaboración de alimentos compuestos (mezcla) principalmente de frutas legumbres u hortalizas, excepto platos preparados en forma congelada o enlatada listos para consumir.',
            'level' => 'low',
        ],
        [
            'code' => 'C1030.12',
            'description' => 'Conservación de frutas, pulpa de frutas, legumbres y hortalizas mediante el congelado, secado, deshidratado, inmersión en aceite o vinagre, enlatado, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1030.13',
            'description' => 'Conservación de nueces (pasta de nueces) y otros frutos secos mediante el tostado, salado, asado, enlatado, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'C1030.14',
            'description' => 'Fabricación de productos alimenticios a partir de (un solo componente) frutas, legumbres y hortalizas; incluso snacks de plátano (chifles), yuca, frutas, etcétera, excepto papa.',
            'level' => 'low',
        ],
        [
            'code' => 'C1030.15',
            'description' => 'Elaboración de jugos (zumos), néctares, concentrados de fruta fresca y hortalizas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1030.16',
            'description' => 'Elaboración de compotas, mermeladas y jaleas, purés y otras confituras de frutas o frutos secos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1030.17',
            'description' => 'Fabricación de alimentos perecibles a base de frutas, legumbres y hortalizas como=> ensaladas empaquetadas, hortalizas peladas y cortadas, tofu (cuajada de soya).',
            'level' => 'low',
        ],
        [
            'code' => 'C1030.21',
            'description' => 'Elaboración y conservación de papas preparadas congeladas u otro tipo de conservación.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1030.22',
            'description' => 'Elaboración de puré de papas deshidratado, harina y sémola de papa.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1030.23',
            'description' => 'Elaboración de papas fritas y snacks de papas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1030.30',
            'description' => 'Servicios de apoyo a la elaboración y conservación de frutas, legumbres y hortalizas a cambio de una retribución o por contrato=> pelado industrial de papas, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1040.11',
            'description' => 'Elaboración de aceites crudos vegetales (sin refinar) de=> oliva, soya, palma, semilla de girasol, semilla de algodón, colza, repollo o mostaza, linaza, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1040.12',
            'description' => 'Elaboración de harina y sémola sin desgrasar de semillas, nueces y almendras oleaginosas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1040.13',
            'description' => 'Elaboración de aceites vegetales refinados=> aceite de oliva, aceite de soya, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1040.14',
            'description' => 'Elaboración de aceites vegetales=> oxidación por corriente de aire, cocción, deshidratación, hidrogenación, etcétera; mezclas de aceites de oliva, grasas compuestas para cocinar y productos similares para untar=> margarina.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1040.15',
            'description' => 'Producción de borras de algodón, tortas y otros productos residuales de la producción de aceite.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1040.21',
            'description' => 'Elaboración de aceites y grasas de origen animal no comestibles.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1040.22',
            'description' => 'Extracción de aceites de pescado (hígado de pescado) y mamíferos marinos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1040.30',
            'description' => 'Servicios de apoyo a la elaboración de aceites y grasas de origen vegetal y animal a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1050.01',
            'description' => 'Elaboración de leche fresca líquida, crema de leche liquida, bebidas a base de leche, yogurt, incluso caseína o lactosa, pasteurizada, esterilizada, homogeneizada y/o tratada a altas temperaturas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1050.02',
            'description' => 'Elaboración de leche en polvo, condensada sea o no azucarada.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1050.03',
            'description' => 'Elaboración de crema en forma sólida.',
            'level' => 'low',
        ],
        [
            'code' => 'C1050.04',
            'description' => 'Elaboración de mantequilla, queso, cuajada y suero.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1050.05',
            'description' => 'Elaboración de helados (de todo tipo), sorbetes, bolos, granizados, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'C1050.06',
            'description' => 'Servicios de apoyo a la elaboración de productos lácteos a cambio de una retribución o por contrato.',
            'level' => 'low',
        ],
        [
            'code' => 'C1050.09',
            'description' => 'Elaboración de otros productos lácteos=> manjar de leche.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1061.11',
            'description' => 'Molienda de cereales, producción de harina, semolina, sémola y gránulos de=> trigo, centeno, avena, maíz y otros cereales.',
            'level' => 'low',
        ],
        [
            'code' => 'C1061.12',
            'description' => 'Molienda o pilado de arroz=> producción de arroz descascarillado, blanqueado, pulido, semicocido, harina de arroz.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1061.13',
            'description' => 'Molienda de otros productos de origen vegetal=> producción de harinas y sémolas de leguminosas desecadas, de raíces y tubérculos (excepto patatas), de nueces y frutas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1061.21',
            'description' => 'Elaboración de alimentos a base de cereales tostados, insuflados, o macerados, hojaldrados, granos pulidos y cereales partidos o triturados, cereales para el desayuno y snacks a base de cereales.',
            'level' => 'low',
        ],
        [
            'code' => 'C1061.22',
            'description' => 'Elaboración de harinas o masas mezcladas preparadas para la fabricación de pan, pasteles, bizcochos o panqueques.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1061.30',
            'description' => 'Servicios de apoyo a la elaboración de productos de molinería a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1062.01',
            'description' => 'Elaboración de almidones a partir de arroz, maíz (maicena), patatas, yuca y otras materias vegetales incluso gluten y dextrina etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'C1062.02',
            'description' => 'Molienda en húmedo de maíz, elaboración de aceite de maíz.',
            'level' => 'low',
        ],
        [
            'code' => 'C1062.03',
            'description' => 'Elaboración de glucosa, jarabe de glucosa, maltosa, inulina, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'C1062.04',
            'description' => 'Elaboración de tapioca y sustitutos de tapioca preparados a partir de almidones.',
            'level' => 'low',
        ],
        [
            'code' => 'C1062.05',
            'description' => 'Servicios de apoyo a la elaboración de almidones y productos derivados del almidón a cambio de una retribución o por contrato.',
            'level' => 'low',
        ],
        [
            'code' => 'C1071.01',
            'description' => 'Elaboración de pan y otros productos de panadería secos=> pan de todo tipo, panecillos, bizcochos, tostadas, galletas, etcétera, incluso envasados.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1071.02',
            'description' => 'Elaboración de pasteles y otros productos de pastelería=> pasteles de frutas, tortas, pasteles, tartas, etcétera, churros, buñuelos, aperitivos (bocadillos), etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'C1071.03',
            'description' => 'Servicios de apoyo a la elaboración de productos de panadería a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1071.09',
            'description' => 'Elaboración de otros productos de panadería, incluso congelados=> tortillas de maíz o trigo, conos de helado, obleas, waffles, panqueques, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'C1072.01',
            'description' => 'Molienda y extracción de jugo de caña (trapiche) y producción de panela.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1072.02',
            'description' => 'Elaboración y refinado de azúcar de caña y melaza de caña; remolacha azucarera, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1072.03',
            'description' => 'Elaboración de jarabe de=> caña de azúcar, palma, remolacha azucarera, stevia, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1072.04',
            'description' => 'Servicios de apoyo a la elaboración de azúcar a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1073.11',
            'description' => 'Elaboración de cacao, manteca, grasa y aceite de cacao.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1073.12',
            'description' => 'Elaboración de chocolate y productos de chocolate.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1073.21',
            'description' => 'Elaboración de productos de confitería=> caramelos, turrón, grageas y pastillas de confitería, goma de mascar (chicles), confites blandos, confitería a base de chocolate y chocolate blanco, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1073.22',
            'description' => 'Conservación en azúcar de frutas, nueces y otros frutos secos, cáscara de frutas y otras partes de las plantas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1073.29',
            'description' => 'Elaboración de otros dulces=> melcochas, cocadas, nogadas, dulce de guayaba, alfeñiques, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1073.30',
            'description' => 'Servicios de apoyo a la elaboración de cacao, chocolate y productos de confitería a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1074.01',
            'description' => 'Elaboración de pastas=> tallarín, espaguetis, macarrones, lasaña, canelones, ravioles y fideos, sean o no cocidos, rellenos o congelados, elaboración de alcuzcuz.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1074.02',
            'description' => 'Servicios de apoyo a la elaboración de macarrones, fideos, alcuzcuz y productos farináceos similares a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1075.01',
            'description' => 'Elaboración de platos a base de carne o de pollo, estofados y comidas preparados al vacio, congeladas, envasadas, enlatadas o conservadas de otra manera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1075.02',
            'description' => 'Elaboración de platos de pescado y mariscos, incluyendo pescado con papas fritas, envasado o congelado.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1075.03',
            'description' => 'Elaboración de platos preparados a base de legumbres y hortalizas, congeladas, envasadas, enlatadas o conservadas de otra manera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1075.04',
            'description' => 'Servicios de apoyo a la elaboración de comidas y platos preparados a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1075.09',
            'description' => 'Elaboración de otras comidas preparadas=> congeladas, envasadas, enlatadas o conservadas de otra manera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1079.11',
            'description' => 'Actividades de descafeinado, tostado y elaboración de productos de café=> café molido, café instantáneo (soluble), extractos y concentrados de café.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1079.12',
            'description' => 'Elaboración de pastas, extractos y concentrados de sucedáneos (sustitutos) del café.',
            'level' => 'low',
        ],
        [
            'code' => 'C1079.13',
            'description' => 'Elaboración de extractos y preparados a base de té o mate; mezcla de té y mate, infusiones de hierbas (menta, manzanilla, verbena, etcétera).',
            'level' => 'low',
        ],
        [
            'code' => 'C1079.21',
            'description' => 'Elaboración de alimentos especiales para infantes, leche maternizada, leche y otros alimentos complementarios para el crecimiento, alimentos que contienen ingredientes homogeneizados.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1079.22',
            'description' => 'Elaboración de sustitutos no lácteos de leche y quesos no lácteos (leche de soya).',
            'level' => 'medium',
        ],
        [
            'code' => 'C1079.29',
            'description' => 'Elaboración de otros alimentos especiales=> concentrados de proteínas; alimentos preparados con fines dietéticos, alimentos sin gluten, alimentos para combatir el desgaste causado por el esfuerzo muscular, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1079.31',
            'description' => 'Procesamiento de especias y condimentos=> laurel, tomillo, albahaca, cilantro, comino, canela, pimienta, nuez moscada, jengibre, sal de ajo, de apio, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'C1079.32',
            'description' => 'Elaboración de salsas líquidas o en polvo=> mayonesa, harina y sémola de mostaza, mostaza preparada, salsas de=> tomate, ají, soya, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1079.33',
            'description' => 'Elaboración de vinagre.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1079.34',
            'description' => 'Procesamiento de sal de mesa; por ejemplo=> sal yodada.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1079.40',
            'description' => 'Servicios de apoyo a la elaboración de otros productos alimenticios n.c.p a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1079.91',
            'description' => 'Elaboración de levadura y polvos de hornear.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1079.92',
            'description' => 'Elaboración de sopas y caldos de diversos ingredientes, líquidos, sólidos, polvo o tabletas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1079.93',
            'description' => 'Elaboración de extractos y jugos de carne, pescado, crustáceos o moluscos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1079.94',
            'description' => 'Elaboración de concentrados artificiales; polvos solubles para la preparación de postres, tortas, flanes, budines, gelatinas, refrescos en polvo sin diluir, edulcorantes, saborizantes, espesantes, colorantes, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1079.99',
            'description' => 'Elaboración de otros productos alimenticios=> elaboración de miel artificial, productos de huevo, claras de huevo, ovoalbúmina, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1080.01',
            'description' => 'Elaboración de alimentos preparados para animales domésticos como=> perros, gatos, pájaros, peces, etcétera; incluidos los obtenidos del tratamiento de desperdicios de mataderos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1080.02',
            'description' => 'Fabricación de alimentos preparados para animales de granja (aves, ganado vacuno, porcino, etcétera), animales acuáticos, incluidos alimentos concentrados, suplementos alimenticios, la preparación de alimentos sin mezclar (elaborados a partir de un único producto) y los obtenidos del tratamiento de desperdicios de mataderos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1080.03',
            'description' => 'Servicios de apoyo a la elaboración de alimentos preparados para animales a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1101.01',
            'description' => 'Elaboración de bebidas alcohólicas destiladas=> whisky, coñac, brandy, ginebra, aguardiente de caña de azúcar, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1101.02',
            'description' => 'Elaboración de mezcla de bebidas alcohólicas destiladas y preparados alcohólicos compuestos=> cremas y otras bebidas alcohólicas aromatizadas y azucaradas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1101.03',
            'description' => 'Producción de aguardientes neutros (alcoholes base para elaborar bebidas alcohólicas).',
            'level' => 'medium',
        ],
        [
            'code' => 'C1101.04',
            'description' => 'Servicios de apoyo a la destilación, rectificación y mezcla de bebidas alcohólicas a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1102.01',
            'description' => 'Elaboración de vinos, vinos espumosos (champagne), vino a partir de mosto de uva concentrado (vino tinto, jerez, oporto, etcétera).',
            'level' => 'medium',
        ],
        [
            'code' => 'C1102.02',
            'description' => 'Elaboración de bebidas alcohólicas fermentadas pero no destiladas=> sake, sidra, perada, vermouth, aguamiel y otros vinos de frutas y mezclas de bebidas que contienen alcohol.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1102.03',
            'description' => 'Elaboración de vinos de baja graduación o sin alcohol y mezclas de vinos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1102.04',
            'description' => 'Servicios de apoyo a la elaboración de vinos a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1103.01',
            'description' => 'Elaboración de bebidas malteadas como=> cervezas corrientes de fermentación alta, negras y fuertes, incluida cerveza de baja graduación o sin alcohol.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1103.02',
            'description' => 'Elaboración de malta.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1103.03',
            'description' => 'Servicios de apoyo a la elaboración de bebidas malteadas y de malta a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1104.01',
            'description' => 'Elaboración de bebidas no alcohólicas embotelladas (excepto cerveza y vino sin alcohol)=> bebidas aromatizadas y/o edulcoradas=> limonadas, naranjadas, bebidas gaseosas (colas), bebidas artificiales de jugos de frutas (con jugos de frutas o jarabes en proporción inferior al 50%), aguas tónicas, gelatina comestible, bebidas hidratantes, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1104.02',
            'description' => 'Producción de aguas minerales naturales y otras aguas embotelladas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1104.03',
            'description' => 'Servicios de apoyo a la elaboración de bebidas no alcohólicas; producción de aguas minerales y otras aguas embotelladas a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1200.01',
            'description' => 'Elaboración de productos de tabaco y sustitutos de productos de tabaco=> tabaco homogeneizado o reconstituido, cigarrillos, picadura para cigarrillos, tabaco de pipa, tabaco de mascar, rape, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1200.02',
            'description' => 'Desnervado y secado de las hojas de tabaco.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1200.03',
            'description' => 'Elaboración de extractos y esencias de tabaco.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1200.04',
            'description' => 'Servicios de apoyo a la elaboración de productos de tabaco a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1311.01',
            'description' => 'Actividades de operaciones preparatorias de fibras textiles=> devanado y lavado de seda, desengrase, carbonización y teñido de vellón, cardado y peinado de toda clase de fibras animales, vegetales, artificiales.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1311.02',
            'description' => 'Hilatura y fabricación de hilados e hilos para tejeduría o costura, para el comercio o para procesamiento posterior, texturización, retorcido, plegado, cableado y remojo de hilaturas filamentosas de toda clase de fibras animales, vegetales, sintéticas o artificiales.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1311.03',
            'description' => 'Fabricación de hilados de papel.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1311.04',
            'description' => 'Servicios de apoyo a la preparación e hilatura de fibras textiles a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1312.01',
            'description' => 'Fabricación de tejidos (telas) anchos de algodón, lana cardada, lana peinada o seda, pelo fino de animales, incluidos los fabricados a partir de mezclas o de hilados sintéticos o artificiales.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1312.02',
            'description' => 'Fabricación de tejidos (telas) aterciopelados y de felpilla, tejidos de rizo, tejidos de gasa, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1312.03',
            'description' => 'Fabricación de tejidos (telas) de fibra de vidrio.',
            'level' => 'high',
        ],
        [
            'code' => 'C1312.04',
            'description' => 'Servicios de apoyo a la elaboración de tejidos a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1312.09',
            'description' => 'Fabricación de otros tejidos (telas) anchos de lino, ramio, cáñamo, yute y fibras blandas y de hilados especiales, tejidos de fibra de carbono e hilos arámidos, tejidos que imitan las pieles finas, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1313.01',
            'description' => 'Servicio de blanqueo y teñido de fibras, hilados, tejidos (telas) y artículos textiles, incluido prendas de vestir=> pantalones vaqueros (jeans) etcétera, realizado por terceros a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1313.02',
            'description' => 'Servicio de apresto, calandrado, secado, vaporizado, encogimiento, perchado, remallado, sanforizado, mercerizado, plisado de textiles y artículos textiles, incluido prendas de vestir realizado por terceros a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1313.03',
            'description' => 'Servicio de impermeabilizado, revestimiento, cauchutado o impregnación de prendas realizado por terceros a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1313.04',
            'description' => 'Servicio de estampado serigráfico de productos textiles y prendas de vestir, realizado por terceros a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1391.01',
            'description' => 'Fabricación de tejidos (telas) de punto o ganchillo=> tejidos aterciopelados y de rizo, pieles de imitación de punto obtenidas mediante el tricotaje.',
            'level' => 'low',
        ],
        [
            'code' => 'C1391.02',
            'description' => 'Servicios de apoyo a la fabricación de tejidos de punto y ganchillo a cambio de una retribución o por contrato.',
            'level' => 'low',
        ],
        [
            'code' => 'C1392.01',
            'description' => 'Fabricación de artículos confeccionados con cualquier tipo de material textil, incluidos tejidos (telas) de punto y ganchillo=> frazadas, mantas de viaje, sobrecamas, cobijas, edredones, ropa de cama, sábanas, mantelería, toallas y artículos de cocina acolchados, edredones, cojines, pufés, almohadas, sacos de dormir, artículos para el baño, etcétera, incluido tejidos para mantas eléctricas.',
            'level' => 'low',
        ],
        [
            'code' => 'C1392.02',
            'description' => 'Fabricación de accesorios confeccionados para el hogar=> cortinas, cenefas, visillos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1392.03',
            'description' => 'Fabricación de artículos de lona o encerados=> tiendas de campaña, artículos de acampada, velas, toldos de protección contra el sol, carpas, fundas para embalar mercaderías, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1392.04',
            'description' => 'Fabricación de tapices tejidos a mano.',
            'level' => 'low',
        ],
        [
            'code' => 'C1392.05',
            'description' => 'Fabricación de banderas, banderines, gallardetes, estandartes, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'C1392.06',
            'description' => 'Fabricación de fundas (forros) o cobertores de asientos para automóviles, fundas para maquinarias, muebles, neumáticos, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1392.07',
            'description' => 'Servicios de apoyo a la fabricación de artículos confeccionados de materiales textiles, excepto prendas de vestir a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1392.09',
            'description' => 'Fabricación de otros artículos confeccionados con textiles=> paños para desempolvar, paños de cocina y artículos similares, chalecos salvavidas, paracaídas, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1393.01',
            'description' => 'Fabricación de recubrimientos para pisos de materiales textiles=> tapices, alfombras, esteras, recuadros de moqueta (alfombra).',
            'level' => 'low',
        ],
        [
            'code' => 'C1393.02',
            'description' => 'Fabricación de recubrimientos para pisos de fieltro punzonado.',
            'level' => 'low',
        ],
        [
            'code' => 'C1393.03',
            'description' => 'Servicios de apoyo a la fabricación de tapices y alfombras a cambio de una retribución o por contrato.',
            'level' => 'low',
        ],
        [
            'code' => 'C1394.01',
            'description' => 'Fabricación de cuerdas, cordeles, bramantes e hilos de fibras textiles o de cintas o similares, estén o no impregnados, revestidos, cubiertos o forrados con caucho o plástico.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1394.02',
            'description' => 'Fabricación de mallas anudadas de cuerda, cordel o bramante=> redes de pesca, defensas para bordos, cojines para descarga, eslingas, cuerdas y maromas con aros metálicos, etcétera, incluido fabricación de hamacas, bolsas de red para pelotas, redes para deportes, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1394.03',
            'description' => 'Servicios de apoyo a la fabricación de cuerdas, cordeles, bramantes y redes a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1399.01',
            'description' => 'Fabricación de tejidos (telas) estrechos, incluidos los de urdimbre sin trama sujetos por una sustancia adhesiva=> marbetes, insignias, etcétera; artículos de pasamanería=> cordones de materiales textiles para zapatos, trencillas, borlas, madroños, tules y otros tejidos (telas) de mallas anudadas, de encaje y bordados, en piezas, tiras o motivos decorativos, tejidos (telas) de red y del tipo que se utiliza para la confección de visillos tricotados en máquinas Raschel o máquinas similares.',
            'level' => 'low',
        ],
        [
            'code' => 'C1399.02',
            'description' => 'Fabricación de tejidos (telas) impregnados, revestidos, recubiertos o laminados con plástico.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1399.03',
            'description' => 'Fabricación de hilados metalizados e hilados entorchados; hilos y cuerdas de caucho revestidos de materiales textiles; hilados y bandas textiles recubiertos impregnados, revestidos o forrados con caucho o plástico.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1399.04',
            'description' => 'Fabricación de tejidos de hilados de gran resistencia para cuerdas de neumáticos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1399.05',
            'description' => 'Fabricación de tejidos tratados o revestidos=> papel tela, lienzos preparados para pintores, bocací y tejidos rígidos similares, tejidos revestidos con goma o sustancias amiláceas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1399.06',
            'description' => 'Fabricación de artículos textiles diversos=> mechas de materiales textiles, camisas para mecheros de gas incandescentes y tejidos tubulares para su fabricación, mangueras, correas transportadoras y correaje de transmisión (estén reforzados o no con metales u otros materiales), tela para tamices, tela de filtración, fieltro, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1399.07',
            'description' => 'Servicios de apoyo a la fabricación de otros productos textiles n.c.p a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1399.09',
            'description' => 'Fabricación de otros productos textiles=> adornos para vehículos automotores, cinta-tejido sensible a la presión, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1410.01',
            'description' => 'Fabricación de prendas de vestir de cuero o cuero regenerado, incluidos accesorios de trabajo de cuero como=> mandiles para soldadores, ropa de trabajo, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1410.02',
            'description' => 'Fabricación de prendas de vestir de telas tejidas, de punto y ganchillo, de telas no tejidas, entre otras, para hombres, mujeres, niños y bebes=> abrigos, trajes, conjuntos, chaquetas, pantalones, faldas, calentadores, trajes de baño, ropa de esquí, uniformes, camisas, camisetas, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'C1410.03',
            'description' => 'Fabricación de ropa interior y ropa de dormir de telas tejidas, de punto y ganchillo, de encaje, etcétera, para hombres, mujeres y niños=> panties, calzoncillos, pijamas, camisones, batas, blusas, slips, sujetadores, fajas, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'C1410.04',
            'description' => 'Actividades de confección a la medida de prendas de vestir (costureras, sastres).',
            'level' => 'low',
        ],
        [
            'code' => 'C1410.05',
            'description' => 'Fabricación de gorros y sombreros (incluido los de piel y paja toquilla).',
            'level' => 'low',
        ],
        [
            'code' => 'C1410.06',
            'description' => 'Servicios de apoyo a la fabricación de prendas de vestir, excepto prendas de piel a cambio de una retribución o por contrato.',
            'level' => 'low',
        ],
        [
            'code' => 'C1410.09',
            'description' => 'Fabricación de otros accesorios de vestir=> guantes, cinturones, chales, corbatas, corbatines, redecillas para el cabello, calzado de materiales textiles sin aplicación de suelas, etcétera, incluido la fabricación de partes de productos o prendas textiles.',
            'level' => 'low',
        ],
        [
            'code' => 'C1420.01',
            'description' => 'Fabricación de artículos de piel (con pelo natural)=> prendas y accesorios de piel incluido los confeccionados con pieles “alargadas”, planchas, cuadrados, tiras, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'C1420.02',
            'description' => 'Fabricación de artículos diversos de piel (con pelo natural)=> alfombras, pufs sin relleno, paños para pulimento industrial.',
            'level' => 'low',
        ],
        [
            'code' => 'C1420.03',
            'description' => 'Servicios de apoyo a la fabricación de artículos de piel a cambio de una retribución o por contrato.',
            'level' => 'low',
        ],
        [
            'code' => 'C1430.01',
            'description' => 'Fabricación de artículos de confección de punto y ganchillo=> jerseys, suéteres, chalecos y artículos similares.',
            'level' => 'low',
        ],
        [
            'code' => 'C1430.02',
            'description' => 'Fabricación de medias, incluidos calcetines, leotardos y pantimedias.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1430.03',
            'description' => 'Servicios de apoyo a la fabricación de artículos de punto y ganchillo a cambio de una retribución o por contrato.',
            'level' => 'low',
        ],
        [
            'code' => 'C1511.01',
            'description' => 'Actividades de descarnadura, tundido, depilado, engrase, curtido, blanqueo, teñido, adobo de pieles y cueros de pieles finas y cueros con pelo.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1511.02',
            'description' => 'Fabricación de cueros regenerados (artificiales), cueros gamuzados y apergaminados, charol y cueros metalizados.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1511.03',
            'description' => 'Servicios de apoyo al curtido y adobo de cueros; adobo y teñido de pieles a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1512.01',
            'description' => 'Fabricación de maletas, bolsos de mano, mochilas y artículos similares, de cuero, cuero regenerado o cualquier otro material, como plástico, materiales textiles, fibras vulcanizadas o cartón, cuando se usa la misma tecnología que en el caso del cuero.',
            'level' => 'low',
        ],
        [
            'code' => 'C1512.02',
            'description' => 'Fabricación de artículos de talabartería y guarnicionería=> sillas de montar, arreos, látigos y fustas.',
            'level' => 'low',
        ],
        [
            'code' => 'C1512.03',
            'description' => 'Servicios de apoyo a la fabricación de maletas, bolsos de mano y artículos similares, artículos de talabartería y guarnicionería a cambio de una retribución o por contrato.',
            'level' => 'low',
        ],
        [
            'code' => 'C1512.09',
            'description' => 'Fabricación de otros artículos diversos de cuero o cuero regenerado=> correas de transmisión, cordones de cuero para zapatos, correas no metálicas para relojes (de materiales textiles, cuero y plástico), artículos de envase o embalaje, artículos usados con fines técnicos, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'C1520.01',
            'description' => 'Fabricación de calzado, botines, polainas y artículos similares para todo uso, de cualquier material y mediante cualquier proceso, incluido el moldeado (aparado de calzado).',
            'level' => 'medium',
        ],
        [
            'code' => 'C1520.02',
            'description' => 'Fabricación de partes de cuero para calzado=> palas y partes de palas, suelas y plantillas, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'C1520.03',
            'description' => 'Servicios de apoyo a la fabricación de calzado a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1610.01',
            'description' => 'Actividades de secado, aserrado, acepilladura y maquinado de madera tableado, descortezado y desmenuzamiento de troncos; obtención de lana de madera, harina de madera y partículas de madera; impregnación y tratamiento químico de la madera con agentes conservantes y otras sustancias (madera preparada o tratada).',
            'level' => 'medium',
        ],
        [
            'code' => 'C1610.02',
            'description' => 'Fabricación de tabletas para la ensambladura de pisos de madera (duela, media duela, parquet).',
            'level' => 'medium',
        ],
        [
            'code' => 'C1610.03',
            'description' => 'Servicios de apoyo al aserrado y acepilladura de madera a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1610.09',
            'description' => 'Fabricación de otros tipos de madera en bruto=> rodrigones, estacas, tablillas, traviesas de madera (durmientes) para vías férreas, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1621.01',
            'description' => 'Fabricación de hojas de madera (alisadas, teñidas, bañadas, impregnadas, reforzadas con papel o tela, cortadas en figuras) para enchapado suficientemente delgadas para producir madera enchapada, tableros contrachapados y otros fines; fabricación de tableros contrachapados, tableros de madera enchapada y otros tableros y hojas de madera laminada, tableros de fibra y tableros de partículas, madera compactada, madera laminada encolada.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1621.02',
            'description' => 'Servicios de apoyo a la fabricación de hojas de madera para enchapado y tableros a base de madera a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1622.01',
            'description' => 'Fabricación de productos de madera utilizados principalmente por la industria de la construcción=> vigas, cabríos, jabalcones, puntales, armazones de madera laminada encolada y armazones de madera prefabricados con uniones de metal, andamios, postes, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1622.02',
            'description' => 'Fabricación de puertas, ventanas, contraventanas y sus marcos, tengan o no herrajes, como bisagras, cerraduras, escaleras, barandales, boceles y molduras; ripias, duelas de madera, bloques, listones, etcétera, ensamblados en tableros para pisos de parquét; tabiques (mamparas) de madera (excepto los autoestables).',
            'level' => 'medium',
        ],
        [
            'code' => 'C1622.03',
            'description' => 'Fabricación de casas móviles, edificios prefabricados y componentes de los mismos, predominantemente de madera, por ejemplo saunas.',
            'level' => 'high',
        ],
        [
            'code' => 'C1622.04',
            'description' => 'Servicios de apoyo a la fabricación de partes y piezas de carpintería para edificios y construcciones a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1623.01',
            'description' => 'Fabricación de cajas, cajones, barriles y envases similares, toneles, barricas, cubas, tinas y otros productos de tonelería de madera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1623.02',
            'description' => 'Fabricación de paletas, paletas-caja y otras bandejas de madera para operaciones de carga.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1623.03',
            'description' => 'Fabricación de carretes de madera para cables.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1623.04',
            'description' => 'Servicios de apoyo a la fabricación de recipientes de madera a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1629.11',
            'description' => 'Fabricación de productos de madera=> mangos y monturas de herramientas, cepillos y escobas.',
            'level' => 'low',
        ],
        [
            'code' => 'C1629.12',
            'description' => 'Fabricación de partes de madera para botas o zapatos (tacones), hormas y tensores para botas o zapatos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1629.13',
            'description' => 'Fabricación de utensilios de cocina y para uso doméstico de madera.',
            'level' => 'low',
        ],
        [
            'code' => 'C1629.14',
            'description' => 'Fabricación de estatuillas y ornamentos de madera y artículos de marquetería y taracea.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1629.15',
            'description' => 'Fabricación de marcos de madera para espejos y cuadros, fabricación de bastidores de madera para lienzos de pintor.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1629.16',
            'description' => 'Fabricación de cajas de madera para joyas, cuchillos y artículos similares.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1629.17',
            'description' => 'Fabricación de carretes, tapas, canillas de bobinas, carretes para hilos de coser y artículos similares de madera torneada.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1629.18',
            'description' => 'Fabricación de artículos de madera para moblaje del tipo aplique como=> percheros para ropa y sombreros, pero no muebles en pie, perchas de madera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1629.19',
            'description' => 'Fabricación de otros artículos de madera=> mangos (empuñaduras) para paraguas, bastones y similares, bloques de madera para la elaboración de pipas; palillos, paletas para helados, pinchos, baja lenguas, etcétera, troncos de chimenea hechos de madera prensada o de otros materiales prensados, como moleduras de café o de habas de soya.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1629.21',
            'description' => 'Procesamiento de corcho natural, fabricación de corcho aglomerado.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1629.22',
            'description' => 'Fabricación de artículos de corcho natural o corcho aglomerado, incluidos cubrimientos para pisos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1629.23',
            'description' => 'Fabricación de trenzas y artículos similares de materiales trenzables=> esteras, esterillas, persianas, cajas, cestos y artículos de mimbre, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1629.30',
            'description' => 'Servicios de apoyo a la fabricación de otros productos de madera; fabricación de artículos de corcho, paja y materiales trenzables a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1701.01',
            'description' => 'Fabricación de pasta de madera blanqueada, semiblanqueada o sin blanquear mediante procesos mecánicos, químicos (con o sin disolución) o semiquímicos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1701.02',
            'description' => 'Fabricación de pasta de papel a partir de la eliminación de la tinta y fabricación de pasta de desechos de papel papeles usados; o a partir de residuos textiles, como borras de algodón.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1701.03',
            'description' => 'Fabricación de papel y cartón para su posterior elaboración industrial.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1701.04',
            'description' => 'Tratamiento industrial posterior de papel y cartón=> revestimiento, recubrimiento e impregnación de papel y cartón; papeles laminados, papel aluminio, papel Kraft, cartulina, papel multilaminar, papeles absorbentes, papel pergamino, papel cigarrillo, papel rizado o plegado, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1701.05',
            'description' => 'Fabricación de papel de periódico y otros papeles para imprimir y escribir.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1701.06',
            'description' => 'Servicios de apoyo a la fabricación de pasta de madera, papel y cartón a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1701.09',
            'description' => 'Elaboración de otros tipos de papel=> papel carbón o papel esténcil en rollos u hojas grandes, papel hecho a mano, fabricación de guata de celulosa y tiras de fibras de celulosa etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1702.01',
            'description' => 'Fabricación del papel y cartón ondulados o corrugado.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1702.02',
            'description' => 'Fabricación de envases de papel o de cartón ondulado, rígido o plegable=> cajas, cajones, estuches, envases, archivadores de cartón de oficina y artículos similares.',
            'level' => 'low',
        ],
        [
            'code' => 'C1702.03',
            'description' => 'Fabricación de sacos y de bolsas del papel.',
            'level' => 'low',
        ],
        [
            'code' => 'C1702.04',
            'description' => 'Servicios de apoyo a la fabricación de papel y cartón ondulado y de envases de papel y cartón a cambio de una retribución o por contrato.',
            'level' => 'low',
        ],
        [
            'code' => 'C1709.11',
            'description' => 'Fabricación de productos de papel de higiene personal y productos de guata de celulosa y materiales textiles=> pañuelos de limpieza, toallas, servilletas, papel higiénico, toallas sanitarias y tampones, toallas para desmaquillar, pañales para bebes y similares, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1709.12',
            'description' => 'Fabricación de artículos de uso domésticos vasos, platos y bandejas, bandejas para guardar huevos y otros productos para envasado, de papel o cartón moldeado.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1709.13',
            'description' => 'Elaboración de bobinas, carretes, tapas, etcétera, de papel o cartón.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1709.14',
            'description' => 'Elaboración de papel para empapelar y cubrimientos similares para pared, incluido papel de empapelar textil y recubierto de vinilo, revestimiento para vidrios.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1709.15',
            'description' => 'Elaboración de prendas y complementos de vestir de papel o guata de celulosa.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1709.21',
            'description' => 'Fabricación de papel para impresora de computadora; papel para imprimir y escribir u otros usos gráficos listo para usar, cortado o perforado, rayado, etcétera (papel Bond, etiqueta, couché).',
            'level' => 'medium',
        ],
        [
            'code' => 'C1709.22',
            'description' => 'Elaboración de papel de esténcil, autocopia y otros papeles para copiar o transferir, listo para usar.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1709.23',
            'description' => 'Fabricación de papel engomado o adhesivo listo para usar (cintas o rollos), elaboración de sobres, aerogramas, cartas y tarjetas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1709.24',
            'description' => 'Fabricación de registros, libros de contabilidad, cuadernos y artículos de papelería similares de uso educativo o comercial, cuando la información impresa no constituya su característica principal.',
            'level' => 'low',
        ],
        [
            'code' => 'C1709.25',
            'description' => 'Fabricación de cajas, bolsas (fundas), carpetas y juegos de escritorio que contengan una variedad de artículos de papelería, recados de escribir que contienen papel para correspondencia, esquelas o tarjetas postales en blanco, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'C1709.29',
            'description' => 'Fabricación de otros artículos de papel o cartón=> etiquetas impresas o sin imprimir, artículos de fantasía de papel, artículos promocionales y de regalo de papel, papel y cartón filtro, cuerdas y cordajes de papel, papel para cigarrillo, papel regalo, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'C1709.30',
            'description' => 'Servicios de apoyo a la fabricación de otros artículos del papel y cartón a cambio de una retribución o por contrato.',
            'level' => 'low',
        ],
        [
            'code' => 'C1811.01',
            'description' => 'Actividades de impresión de periódicos, revistas y otras publicaciones periódicas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1811.02',
            'description' => 'Actividades de impresión de libros, diccionarios, enciclopedias y folletos, manuscritos musicales y partitura, mapas, atlas, carteles, etcétera; mediante impresión por Offset, fotograbación, impresión flexográfica e impresión en otros tipos de prensa, maquinas autocopistas, impresoras estampadoras, etcétera, incluida la impresión rápida.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1811.03',
            'description' => 'Actividades de impresión de sellos de correo, estampillas y timbres fiscales, documentos de títulos, boletos de entradas a espectáculos, cheques y otros valores o documentos de garantía y de seguridad, mediante impresión por Offset, fotograbación, impresión flexográfica e impresión en otros tipos de prensa, maquinas autocopistas, impresoras estampadoras, etcétera, incluida la impresión rápida.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1811.04',
            'description' => 'Actividades de impresión de pósters, gigantografías, catálogos de publicidad, prospectos y otros impresos publicitarios, calendarios, formularios comerciales, directorios y otros materiales impresos de uso comercial, papel de correspondencia álbumes, agendas personales, diarios, tarjetas de invitación, de visita, de presentación y otros materiales impresos mediante impresión por Offset, fotograbación, impresión flexográfica e impresión en otros tipos de prensa, maquinas autocopistas, impresoras estampadoras, etcétera, incluida la impresión rápida.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1811.05',
            'description' => 'Actividades de impresión directa en textiles, plásticos, vidrio, metal, madera y cerámica (excepto serigrafía sobre textiles o prendas de vestir).',
            'level' => 'medium',
        ],
        [
            'code' => 'C1811.06',
            'description' => 'Actividades de Impresión en etiquetas o marbetes (por procedimientos litográficos, de rotograbado, flexográficos, u otros).',
            'level' => 'medium',
        ],
        [
            'code' => 'C1812.01',
            'description' => 'Actividades de encuadernación de hojas impresas para confeccionar libros, folletos, revistas, catálogos etcétera, mediante el colado, cortado, ensamblado, engomado, compaginado, hilvanado (cosido), encuadernado con adhesivo, recortado, estampado en oro, encuadernación espiral, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'C1812.02',
            'description' => 'Actividades de servicios de preparación de placas, planchas y tintes para el estampado y la impresión e impresión en relieve (incluidas planchas de fotopolímeros), preparación de la composición de imágenes y placas para imprentas tipográficas y de Offset. Composición tipografía, fotocomposición, la incorporación de datos antes de la impresión, incluso mediante el escaneo y reconocimiento óptico de caracteres, compaginación electrónica y grabado de cilindros para rotograbado.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1812.03',
            'description' => 'Actividades de diseño de productos impresos por ejemplo bocetos, diagramas, patrones, croquis, maquetas, etcétera, producción de pruebas.',
            'level' => 'low',
        ],
        [
            'code' => 'C1812.04',
            'description' => 'Actividades de producción de obras artísticas incluso piedras litográficas y planchas de madera preparadas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1812.05',
            'description' => 'Actividades de producción de productos de reprografía (copiadora).',
            'level' => 'low',
        ],
        [
            'code' => 'C1812.06',
            'description' => 'Actividades de servicios combinados de impresión de texto e imágenes.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1812.07',
            'description' => 'Actividades graficas, como el estampado en hueco y estampado a troquel, impresión de libros Braille, troquelado y perforado, estampado en relieve, barnizado y laminado, alzado, encartaciôn y plegado.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1812.09',
            'description' => 'Otros actividades de servicios relacionados con la impresión=> servicios de preparación de datos digitales, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C1820.01',
            'description' => 'Actividades de reproducción a partir de copias matrices (originales) de=> discos gramofónicos, discos compactos y cintas con música u otras grabaciones de sonido.',
            'level' => 'low',
        ],
        [
            'code' => 'C1820.02',
            'description' => 'Actividades de reproducción de copias matrices (originales) de discos, discos compactos, cintas con películas y otras grabaciones de video.',
            'level' => 'low',
        ],
        [
            'code' => 'C1820.03',
            'description' => 'Actividades de reproducción a partir de copias matrices de programas informáticos y datos en discos.',
            'level' => 'low',
        ],
        [
            'code' => 'C1910.01',
            'description' => 'Explotación de hornos de coque para la producción de coque o semicoque, brea y coque de brea, alquitranes de hulla y lignito crudos, gas de horno de coque, carbón de retorta.',
            'level' => 'high',
        ],
        [
            'code' => 'C1910.02',
            'description' => 'Aglomeración de coque.',
            'level' => 'high',
        ],
        [
            'code' => 'C1910.03',
            'description' => 'Servicios de apoyo a la fabricación de productos de horno de coque a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C1920.01',
            'description' => 'Producción de combustibles para motores=> gasolina, queroseno etcétera; fueloil ligero, medio y pesado, gases de refinería como etano, butano o propano, etcétera, recuperación de gases de petróleo licuados en el refinamiento de petróleo.',
            'level' => 'high',
        ],
        [
            'code' => 'C1920.02',
            'description' => 'Fabricación de aceites o grasas lubricantes a base de petróleo, incluido los fabricados a partir de residuos del petróleo.',
            'level' => 'high',
        ],
        [
            'code' => 'C1920.03',
            'description' => 'Fabricación de productos para la industria petroquímica y para la fabricación de pavimentos de carreteras.',
            'level' => 'high',
        ],
        [
            'code' => 'C1920.04',
            'description' => 'Fabricación de briquetas de carbón de piedra y lignito.',
            'level' => 'high',
        ],
        [
            'code' => 'C1920.05',
            'description' => 'Fabricación de biocombustibles, es decir la mezcla de alcoholes con petróleo por ejemplo=> Gasohol.',
            'level' => 'high',
        ],
        [
            'code' => 'C1920.06',
            'description' => 'Servicios de apoyo a la fabricación de productos de la refinación del petróleo a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C1920.09',
            'description' => 'Fabricación de otros productos de la refinación del petróleo=> bencina mineral (aguarrás), vaselina, cera de parafina, jalea de petróleo (petrolato), briquetas de petróleo etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'C2011.11',
            'description' => 'Fabricación de gases industriales o médicos inorgánicos, licuados o comprimidos=> gases elementales, aire líquido o comprimido (oxigeno), gases refrigerantes, mezclas de gases industriales (gases carbónicos), gases inertes como el dióxido de carbono (anhídrido carbónico), gases aislantes.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2011.12',
            'description' => 'Fabricación de álcalis, lejías y otras bases inorgánicas excepto amoníaco.',
            'level' => 'high',
        ],
        [
            'code' => 'C2011.13',
            'description' => 'Elaboración de elementos químicos (excepto gases industriales y metales básicos).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2011.14',
            'description' => 'Fabricación de ácidos inorgánicos excepto acido nítrico.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2011.19',
            'description' => 'Fabricación de otros compuestos químicos inorgánicos ( como cloro doméstico).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2011.21',
            'description' => 'Fabricación de alcoholes cíclicos y acíclicos, fenoles y fenoles-alcoholes, sorbitol, metanol y alcoholes superiores (incluso alcohol etílico sintético).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2011.22',
            'description' => 'Fabricación de compuestos orgánicos de función nitrógeno, incluso aminas (cuerpo derivado del amoníaco) y compuestos de función nitrilo.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2011.23',
            'description' => 'Fabricación de hidrocarburos cíclicos y acíclicos, saturados y no saturados, benceno, tolueno, xileno y otros productos de la destilación de alquitrán, hulla o aceite mineral, producción de brea y coque de brea.',
            'level' => 'high',
        ],
        [
            'code' => 'C2011.24',
            'description' => 'Fabricación de ácidos monocarboxílicos y policarboxílicos, incluido acido acético.',
            'level' => 'high',
        ],
        [
            'code' => 'C2011.25',
            'description' => 'Fermentación de caña de azúcar, maíz o similares para producir alcohol y esteres.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2011.26',
            'description' => 'Fabricación de compuestos de función oxigeno, incluso aldehídos, cetonas, quinonas y compuestos duales o múltiples de función oxígeno.',
            'level' => 'high',
        ],
        [
            'code' => 'C2011.27',
            'description' => 'Fabricación de carbón vegetal y otros productos de la destilación de madera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2011.29',
            'description' => 'Fabricación de otros compuestos orgánicos, glicerina sintética, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2011.30',
            'description' => 'Servicios de apoyo a la fabricación de substancias químicas básicas a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2011.91',
            'description' => 'Fabricación de materias colorantes, tintes y pigmentos de cualquier origen en forma básica o como concentrado.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2011.92',
            'description' => 'Fabricación de productos usados como agentes avivadores fluorescentes o como luminóforos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2011.93',
            'description' => 'Fabricación de productos aromáticos sintéticos.',
            'level' => 'high',
        ],
        [
            'code' => 'C2011.94',
            'description' => 'Fabricación de productos curtientes sintéticos y de origen vegetal o animal.',
            'level' => 'high',
        ],
        [
            'code' => 'C2011.95',
            'description' => 'Actividades de enriquecimiento de minerales de uranio, plutonio, torio y producción de elementos combustibles para reactores nucleares.',
            'level' => 'high',
        ],
        [
            'code' => 'C2011.96',
            'description' => 'Fabricación de agua destilada.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2011.97',
            'description' => 'Actividades de tostado de piritas de hierro.',
            'level' => 'high',
        ],
        [
            'code' => 'C2012.01',
            'description' => 'Fabricación de abonos nitrogenados, fosfatados y potásicos puros o complejos; urea, fosfatos naturales en crudo y sales de potasio naturales crudas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2012.02',
            'description' => 'Fabricación de productos nitrogenados conexos=> acido nítrico y sulfonítrico, amoníaco, cloruro de amonio, carbonato de amonio, nitritos y nitratos de potasio.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2012.03',
            'description' => 'Fabricación de sustratos (tierra para macetas) hechos principalmente de turba; de mezclas de tierra natural, arena, arcilla y minerales.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2012.04',
            'description' => 'Servicios de apoyo a la fabricación de abonos y compuestos de nitrógeno a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2013.11',
            'description' => 'Fabricación de plásticos en formas primarias=> polímeros, incluidos los polímeros de etileno, propileno, estireno, cloruro de vinillo, acetato de vinillo y acrílicos; Poliamidas, resinas fenólicas y epoxídicas y poliuretanos, resinas alquídicas y resinas de poliéster y poliésteres, siliconas, intercambiadores de iones basados en polímeros.',
            'level' => 'high',
        ],
        [
            'code' => 'C2013.12',
            'description' => 'Fabricación de celulosa y sus derivados químicos.',
            'level' => 'high',
        ],
        [
            'code' => 'C2013.21',
            'description' => 'Fabricación de caucho sintético en formas primarias=> caucho sintético, artificial.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2013.22',
            'description' => 'Fabricación de aceite vegetal vulcanizado.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2013.23',
            'description' => 'Fabricación de mezclas de caucho sintético y caucho natural o gomas similares al caucho (balata).',
            'level' => 'high',
        ],
        [
            'code' => 'C2013.30',
            'description' => 'Servicios de apoyo a la fabricación de plásticos y de cauchos sintético en formas primarias a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C2021.01',
            'description' => 'Fabricación de insecticidas, raticidas, fungicidas, herbicidas, antigerminantes, reguladores del crecimiento de las plantas.',
            'level' => 'high',
        ],
        [
            'code' => 'C2021.02',
            'description' => 'Fabricación de desinfectantes de uso agropecuario y para otros usos.',
            'level' => 'high',
        ],
        [
            'code' => 'C2021.03',
            'description' => 'Servicios de apoyo a la fabricación de plaguicidas y otros productos químicos de uso agropecuario a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C2021.09',
            'description' => 'Fabricación de otros productos químicos de uso agropecuario n.c.p.',
            'level' => 'high',
        ],
        [
            'code' => 'C2022.01',
            'description' => 'Fabricación de pinturas, barnices, esmaltes o lacas pigmentos y tintes, opacificadores y colores preparados.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2022.02',
            'description' => 'Fabricación de esmaltes vitrificables y barnices para vidriar y enlucidos cerámicos y preparados similares; pigmentos y tintes, opacificadores y colores preparados',
            'level' => 'medium',
        ],
        [
            'code' => 'C2022.03',
            'description' => 'Fabricación de masillas, compuestos para calafatear y preparados similares no refractarios para relleno y enlucido.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2022.04',
            'description' => 'Fabricación de disolventes y diluyentes compuestos orgánicos=> decapantes (removedores) de pintura y barniz preparados (thiñer).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2022.05',
            'description' => 'Fabricación de tinta de imprenta.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2022.06',
            'description' => 'Servicios de apoyo a la fabricación de pinturas, barnices y productos de revestimiento similares, tintas de imprenta y masillas a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2023.11',
            'description' => 'Fabricación de agentes orgánicos tensoactivos y preparados tensoactivos (detergentes) para lavar en polvo o líquidos; barras (jabón), pastillas, piezas, preparados para fregar platos (lavavajillas); suavizantes textiles, incluido jabón cosmético.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2023.12',
            'description' => 'Fabricación de papel, guata, fieltro y otros materiales impregnados, revestidos o recubiertos con jabón o detergentes; incluso fabricación de glicerina en bruto.',
            'level' => 'low',
        ],
        [
            'code' => 'C2023.21',
            'description' => 'Fabricación de productos de limpieza=> Preparados para perfumar y desodorizar ambientes, polvos o pastas de limpieza incluidos papel, guata, etcétera, revestido o recubierto con estos productos de limpieza.',
            'level' => 'low',
        ],
        [
            'code' => 'C2023.22',
            'description' => 'Fabricación de productos para pulir y abrillantar=> ceras artificiales y ceras preparadas, lustres y cremas para cuero, lustres y cremas para madera, lustres para carrocerías de automóviles, vidrio y metal.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2023.31',
            'description' => 'Fabricación de perfumes y cosméticos=> perfumes y aguas de colonia, preparados de belleza y de maquillaje, cremas solares y preparados bronceadores, preparados para manicura y pedicura.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2023.32',
            'description' => 'Fabricación de productos para peluquería y cuidado del cabello=> champú, tintes, lacas para el cabello, preparados para ondular y alisar el cabello, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2023.39',
            'description' => 'Fabricación de otros productos de perfumería y tocador=> dentífrico y preparados de higiene bucal y dental, incluido preparados para la fijación de dentaduras postizas, preparados para el afeitado, incluso para antes y después de afeitar; desodorantes y sales de baño; depiladores, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2023.40',
            'description' => 'Servicios de apoyo a la fabricación de jabones y detergentes, preparados para limpiar y pulir, perfumes y preparados de tocador a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2029.11',
            'description' => 'Fabricación de grasas y aceites modificados químicamente; aceites esenciales; resinoides, aguas destiladas aromáticas; fabricación de mezclas de productos odoríferos para la elaboración de perfumes o alimentos; fabricación de extractos de productos aromáticos naturales.',
            'level' => 'low',
        ],
        [
            'code' => 'C2029.12',
            'description' => 'Fabricación de carbón activado, aditivos para aceites lubricantes, preparados para acelerar la vulcanización del caucho, catalizadores; preparados aditivos para cementos y otros productos químicos de uso industrial.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2029.13',
            'description' => 'Fabricación de materiales para el acabado de productos textiles y de cuero.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2029.14',
            'description' => 'Fabricación de preparados antidetonantes, anticongelantes, líquidos para transmisiones hidráulicas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2029.15',
            'description' => 'Fabricación de reactivos compuestos para diagnóstico y laboratorio.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2029.16',
            'description' => 'Fabricación de gelatina y derivados de la gelatina, pegamento (colas) y preparados adhesivos, incluyendo pegamento y adhesivo a base de caucho.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2029.20',
            'description' => 'Servicios de apoyo a la fabricación de otros productos químicos n.c.p a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2029.91',
            'description' => 'Fabricación de explosivos y productos pirotécnicos, incluidos cápsulas fulminantes, detonadores, bengalas de señales y artículos similares, pólvoras propulsoras, cerillas (fósforos).',
            'level' => 'high',
        ],
        [
            'code' => 'C2029.92',
            'description' => 'Fabricación de productos fotoquímicos=> placas y películas fotográficas, papel sensible y otros materiales sensibilizados sin imprimir; fabricación de preparados químicos de uso fotográfico.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2029.93',
            'description' => 'Fabricación de tintas para escribir y dibujar.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2029.94',
            'description' => 'Fabricación de granadas y bombas extintoras de fuego, preparación y carga de aparatos extintores.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2029.99',
            'description' => 'Fabricación de otros productos químicos=> peptonas y sus derivados, otras sustancias proteínicas y sus derivados; Substancias para el decapado de metales; Polvos y pastas para soldadura blanda, dura o autógena.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2030.01',
            'description' => 'Fabricación de estopas de filamento artificial o sintético (waipe).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2030.02',
            'description' => 'Fabricación de fibras discontinuas sintéticas o artificiales, sin cardar, peinar ni elaborar de otro modo para su hilado.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2030.03',
            'description' => 'Fabricación de hilados (hilos) de filamento sintético o artificial, incluidos hilados (hilos) de gran resistencia, monofilamento o hebras sintéticas o artificiales.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2030.04',
            'description' => 'Servicios de apoyo a la fabricación de fibras artificiales a cambio de una retribución o por contrato.',
            'level' => 'low',
        ],
        [
            'code' => 'C2100.01',
            'description' => 'Fabricación de sustancias medicinales activas que se utilizan por sus propiedades farmacológicas en la fabricación de medicamentos=> antibióticos, vitaminas básicas, ácido salicílico y acetilsalicílico, etcétera, tratamiento de la sangre, fabricación de medicamentos=> antisueros y otras fracciones de sangre, azúcares químicamente puros, productos y extractos endocrinos, vacunas. Incluidos preparados homeopáticos, fabricación y procesamiento de glándulas y extractos glandulares, fabricación de productos químicos anticonceptivos de uso externo y de medicamentos anticonceptivos hormonales, fabricación de preparados para el diagnóstico médico, incluidas pruebas de embarazo, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2100.02',
            'description' => 'Fabricación de sustancias radiactivas para diagnóstico en vivo, etcétera, productos de biotecnología.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2100.03',
            'description' => 'Fabricación de guatas, gasas, hilos, vendas y apósitos médicos impregnados.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2100.04',
            'description' => 'Preparación de productos botánicos (trituración, cribado, molido) para uso farmacéutico.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2100.05',
            'description' => 'Fabricación de productos farmacéuticos para uso veterinario, sean genéricos o de marca registrada, de venta al público en general o reglamentada por las autoridades.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2100.06',
            'description' => 'Servicios de apoyo a la fabricación de productos farmacéuticos, sustancias químicas medicinales y productos botánicos de uso farmacéutico a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2211.01',
            'description' => 'Fabricación de cubiertas de caucho para=> vehículos, equipo, maquinaria móvil, aeronaves, juguetes, muebles y otros usos=> neumáticos, llantas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2211.02',
            'description' => 'Fabricación de bandas de rodadura intercambiables, cámaras para cubiertas, fajas de protección de la cámara, tiras de remiendo para recauchutar cubiertas, etcétera, renovación y recauchutado de cubiertas de neumáticos sean cubiertas sólidas y mullidas (esponjosas, blandas).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2211.03',
            'description' => 'Servicios de apoyo a la fabricación de cubiertas y cámaras de caucho; recauchutado y renovación de cubiertas de caucho a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2219.01',
            'description' => 'Fabricación de planchas, hojas, tiras, varillas y perfiles; tubos, caños y mangueras; arandelas, empaques, conectores, y cierres de caucho.',
            'level' => 'low',
        ],
        [
            'code' => 'C2219.02',
            'description' => 'Fabricación de correas y cintas transportadoras y de transmisión de caucho.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2219.03',
            'description' => 'Fabricación de artículos higiénicos y cuidado personal de caucho=> cepillos de caucho, peines de caucho duro, horquillas, rulos y artículos similares de caucho endurecido; preservativos, tetinas, bolsas de agua caliente, etcétera, incluido la fabricación de artículos eróticos de caucho.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2219.04',
            'description' => 'Fabricación de prendas de vestir de caucho (solo si están sellados, y no cosidos)=> trajes de buceo de caucho, gorras de baño, guantes y delantales de caucho, ligas, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2219.05',
            'description' => 'Fabricación de hilos, cuerdas, hilatura, tejidos de caucho, tejidos textiles impregnados, revestidos, recubiertos o laminados de caucho en los que el caucho es el principal componente, cubiertas de caucho para rodillos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2219.06',
            'description' => 'Servicios de apoyo a la fabricación de otros productos de caucho a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2219.09',
            'description' => 'Fabricación de otros productos de caucho natural o sintético sin vulcanizar, vulcanizado o endurecido=> Colchones inflables de caucho, colchones de caucho para camas de agua, globos inflables, cañones de pipa de caucho endurecido, partes de calzado de caucho, materiales de reparación de caucho.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2220.11',
            'description' => 'Fabricación de semimanufacturas (semielaboradas) de productos de plástico=> planchas, láminas, películas, hojas, tiras, etcétera (autoadhesivas o no); láminas de acrílicos, esponja, espúmaflex, película o lámina de celofán, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2220.12',
            'description' => 'Fabricación de productos acabados de plásticos=> tubos, caños y mangueras de plástico, accesorios para tuberías, caños y mangueras.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2220.21',
            'description' => 'Fabricación de artículos plásticos para la construcción=> puertas, ventanas, marcos, contrapuertas, persianas, zócalos, tanques para depósitos, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2220.22',
            'description' => 'Fabricación de cubrimientos plásticos para pisos, paredes o techos en rollos o en forma de losetas, domos, piedra artificial (mármol artificial); cubrimientos de pisos resistentes, como vinilo, linóleo, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2220.23',
            'description' => 'Fabricación de artículos plásticos sanitarios como bañeras, platos de ducha, lavabos, inodoros, cisternas de inodoros, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2220.30',
            'description' => 'Servicios de apoyo a la fabricación de productos de plástico a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2220.91',
            'description' => 'Fabricación de artículos de plástico para el envasado de productos=> bolsas, sacos, cajones, cajas, garrafones, botellas, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2220.92',
            'description' => 'Fabricación de utensilios de mesa y cocina de plástico y artículos de tocador.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2220.93',
            'description' => 'Fabricación de artículos de plástico para oficina y uso escolar.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2220.94',
            'description' => 'Fabricación de cubrecabezas, prendas de vestir (sólo si las piezas se unen por adhesión y no por costura).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2220.95',
            'description' => 'Fabricación de piezas de lámparas y accesorios de iluminación, accesorios para aislamiento; letreros o señales no eléctricas de plásticos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2220.96',
            'description' => 'Fabricación de accesorios de plástico para carrocerías de vehículos y artículos similares de resina de poliéster y fibra de vidrio.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2220.99',
            'description' => 'Fabricación de otros artículos de plástico diversos=> accesorios para muebles, estatuillas, artesanías, correas de transporte y transmisión, cintas autoadhesivas, papel de empapelar, hormas de zapato, boquillas de cigarros y cigarrillos, peines, ruleros, artículos de fantasía promociónales y de regalo de plástico, canastas de plástico, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2310.11',
            'description' => 'Fabricación de vidrio plano, templado o laminado, incluido el vidrio armado de alambre, coloreado o teñido.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2310.12',
            'description' => 'Fabricación de vidrio en masa, en esferas (excepto microesferas), varillas o tubos, sea o no labrado, perfiles de vidrio y vidrio laminado.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2310.13',
            'description' => 'Fabricación de espejos de vidrio, incluido espejos retrovisores para vehículos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2310.21',
            'description' => 'Fabricación de artículos domésticos de vidrio o cristal=> vasos, botellas, copas, platos, jarrones y otros recipientes de vidrio o cristal incluido piezas de vidrio utilizadas en bisutería figurillas de vidrio, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2310.22',
            'description' => 'Fabricación de bloques de vidrio para pavimentar u otros elementos para la construcción.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2310.23',
            'description' => 'Fabricación de fibra de vidrio, incluso lana de vidrio, y productos no tejidos de lana de vidrio.',
            'level' => 'high',
        ],
        [
            'code' => 'C2310.24',
            'description' => 'Fabricación de cristalería de laboratorio=> higiénica y farmacéutica.',
            'level' => 'high',
        ],
        [
            'code' => 'C2310.25',
            'description' => 'Fabricación de vidrio para relojes, vidrio óptico y elementos ópticos no trabajados ópticamente.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2310.26',
            'description' => 'Fabricación de aisladores de vidrio y accesorios aislantes de vidrio; unidades aislantes de vidrio de capas múltiples.',
            'level' => 'high',
        ],
        [
            'code' => 'C2310.29',
            'description' => 'Fabricación de otros productos y manufacturas de vidrio=> ampollas de vidrio para lámparas, tubos para lámparas fluorescentes, accesorios para alumbrado, faroles, rótulos iluminados, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'C2310.30',
            'description' => 'Servicios de apoyo a la fabricación de vidrio y productos de vidrio a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C2391.01',
            'description' => 'Fabricación de artículos para construcción=> losetas, tejas, azulejos y otros de cerámica refractaria; morteros, cementos y otros materiales refractarios.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2391.02',
            'description' => 'Fabricación de retortas, crisoles, muflas (hornos), toberas, tubos, caños, etcétera, de cerámica refractaria.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2391.03',
            'description' => 'Servicios de apoyo a la fabricación de productos refractarios a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2391.09',
            'description' => 'Fabricación de otros artículos de cerámica para aislamiento térmico a base de diatomitas (tierras) silíceas; artículos refractarios que contienen magnesita, dolomita o cromita.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2392.01',
            'description' => 'Fabricación de losetas para la pared y para cañones de chimeneas, teselas de mosaico, azulejos, baldosas y losas para pavimento etcétera, de cerámica no refractaria.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2392.02',
            'description' => 'Fabricación de materiales de construcción de arcilla no refractaria para uso estructural=> ladrillos, tejas, sombreretes de chimenea, tubos, conductos, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2392.03',
            'description' => 'Fabricación de artículos sanitarios de cerámica.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2392.04',
            'description' => 'Servicios de apoyo a la fabricación de materiales de construcción de arcilla a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2393.01',
            'description' => 'Fabricación de vajillas y otros artículos de uso domésticos y de aseo.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2393.02',
            'description' => 'Fabricación de estatuillas, artesanías y otros artículos ornamentales de cerámica o porcelana.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2393.03',
            'description' => 'Fabricación de aisladores eléctricos y accesorios aislantes de cerámica.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2393.04',
            'description' => 'Fabricación de artículos de cerámica para laboratorios, para la industria química y la industria en general.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2393.05',
            'description' => 'Fabricación de tarros, vasijas y artículos similares de cerámica, utilizados para transportar o envasar productos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2393.06',
            'description' => 'Servicios de apoyo a la fabricación de otros productos de porcelana y de cerámica a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2393.09',
            'description' => 'Fabricación de otros productos de cerámica n.c.p=> muebles de cerámica; imanes de cerámica y ferrita, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2394.01',
            'description' => 'Fabricación de cementos hidráulicos, incluido cemento de Pórtland, cemento aluminoso, cemento de escorias y cemento hipersulfatado.',
            'level' => 'high',
        ],
        [
            'code' => 'C2394.02',
            'description' => 'Fabricación de cal viva, apagada e hidráulica; yesos con yeso calcinado o sulfato de calcio.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2394.03',
            'description' => 'Fabricación de dolomita calcinada.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2394.04',
            'description' => 'Servicios de apoyo a la fabricación de cemento, cal y yeso a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2395.01',
            'description' => 'Fabricación de componentes estructurales y materiales prefabricados para obras de construcción o de ingeniería civil de hormigón, cemento, piedra artificial o yeso=> losetas, losas, baldosas, ladrillos, bloques, planchas, paneles, láminas, tableros, caños, tubos, postes, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2395.02',
            'description' => 'Fabricación de materiales de yeso para la construcción y de sustancias vegetales (lana de madera, paja, cañas, juncos) aglomeradas con cemento, yeso u otro aglutinante mineral=> estucados, cielos rasos de carrizo o yeso.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2395.03',
            'description' => 'Fabricación de artículos de asbesto-cemento, fibro-cemento de celulosa y materiales similares=> láminas onduladas, otras laminas, paneles, tableros, losetas, tubos, caños, depósitos, tanques de agua, cisternas, lavabos, lavaderos, vasijas, muebles, marcos para ventanas, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2395.04',
            'description' => 'Fabricación de mezclas preparadas y secas para hormigón y mortero (incluso mortero en polvo).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2395.05',
            'description' => 'Servicios de apoyo a la fabricación de artículos de hormigón, de cemento y yeso a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2395.09',
            'description' => 'Fabricación de otros artículos de hormigón, yeso, cemento o piedra artificial, incluso los usados con fines decorativos=> estatuas, muebles, bajorrelieves y altorrelieves, jarrones, macetas, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2396.01',
            'description' => 'Corte, tallado y acabado de la piedra para construcción (incluso mármol)=> cementerios, carreteras, techos, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'C2396.02',
            'description' => 'Fabricación de muebles de piedra.',
            'level' => 'high',
        ],
        [
            'code' => 'C2396.03',
            'description' => 'Servicios de apoyo al corte, tallado y acabado de la piedra a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C2399.01',
            'description' => 'Fabricación de muelas de molino, piedras de amolar, pulimentar y productos abrasivos naturales y artificiales, incluidos productos abrasivos sobre una base flexible como el papel lija.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2399.02',
            'description' => 'Fabricación de materiales de fricción y artículos sin montar de esos materiales con una base de sustancias minerales o de celulosa. Lana de escorias, lana de roca y otras lanas minerales similares; vermiculita escamada, arcillas dilatadas y materiales similares para aislamiento térmico y sonoro, y para absorber el sonido.',
            'level' => 'high',
        ],
        [
            'code' => 'C2399.03',
            'description' => 'Fabricación de artículos de diversas sustancias minerales=> mica trabajada y artículos de mica, de turba y de grafito (que no sean artículos eléctricos), etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2399.04',
            'description' => 'Fabricación de artículos de asfalto o de materiales similares, por ejemplo adhesivos a base de asfalto (impermeabilizantes para la construcción), brea, alquitrán, hulla, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2399.05',
            'description' => 'Fabricación de fibras y productos de carbono y grafito (excepto electrodos y aplicaciones eléctricas).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2399.06',
            'description' => 'Servicios de apoyo a la fabricación de otros productos minerales no metálicos n.c.p a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2410.11',
            'description' => 'Explotación de altos hornos, producción de arrabio y hierro especular en lingotes, bloques y otras formas primarias, incluso hierro en granalla (granos) y en polvo, convertidores de acero, talleres de laminado y acabado, refundición de lingotes de chatarra de hierro o acero.',
            'level' => 'high',
        ],
        [
            'code' => 'C2410.12',
            'description' => 'Producción de ferroaleaciones.',
            'level' => 'high',
        ],
        [
            'code' => 'C2410.13',
            'description' => 'Producción de hierro de pureza excepcional por electrolisis o mediante otros procesos químicos; fabricación de productos semiacabados de hierro por reducción directa de minerales de hierro (mena) y otros productos ferrosos esponjosos.',
            'level' => 'high',
        ],
        [
            'code' => 'C2410.14',
            'description' => 'Producción de acero en lingotes u otras formas primarias.',
            'level' => 'high',
        ],
        [
            'code' => 'C2410.15',
            'description' => 'Fabricación de productos semiacabados de acero.',
            'level' => 'high',
        ],
        [
            'code' => 'C2410.21',
            'description' => 'Fabricación de productos de acero laminados planos en caliente y frío, secciones laminadas, acero en lingotes y secciones sólidas de acero por trefilado, molido o doblado en frío.',
            'level' => 'high',
        ],
        [
            'code' => 'C2410.22',
            'description' => 'Fabricación de barras, varillas y secciones sólidas de hierro y acero laminadas en caliente y mediante estirado en frío y en caliente, rectificación o torneado; fabricación de alambre de acero mediante estirado o alargamiento en frío.',
            'level' => 'high',
        ],
        [
            'code' => 'C2410.23',
            'description' => 'Fabricación de materiales para vías de ferrocarril (carriles no ensamblados) de acero.',
            'level' => 'high',
        ],
        [
            'code' => 'C2410.24',
            'description' => 'Fabricación de tubos, tuberías perfiles, huecos de acero sin costura y caños soldados mediante conformación en frío o en caliente y soldadura, entregados en ese estado o transformados posteriormente mediante extrusión o estirado o laminación en frío o mediante conformación en caliente, soldadura y reducción. Fabricación de conexiones de soldadura a tope, roscadas, con soldadura machihembrada, conexiones de tubo de acero, como=> conexiones de brida planas y conexiones de brida con collares de acero de forja.',
            'level' => 'high',
        ],
        [
            'code' => 'C2410.25',
            'description' => 'Fabricación de ángulos, perfiles y secciones abiertas de acero laminadas en caliente y mediante conformación progresiva en un laminador de rulos o mediante plegado en una prensa de productos laminados planos de acero.',
            'level' => 'high',
        ],
        [
            'code' => 'C2410.29',
            'description' => 'Fabricación de otros productos de hierro o acero=> tablestacas de acero y secciones abiertas soldadas de acero, viruta de hojas de acero.',
            'level' => 'high',
        ],
        [
            'code' => 'C2410.30',
            'description' => 'Servicios de apoyo a las industrias básicas de hierro y acero a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C2420.11',
            'description' => 'Producción de metales preciosos básicos=> producción y refinación de metales preciosos sin labrar y labrados=> oro, plata, platino, etcétera a partir de minerales y residuos, producción de semiproductos de metales preciosos; fabricación de laminados con hojas de metales preciosos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2420.12',
            'description' => 'Producción de aleaciones de metales preciosos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2420.13',
            'description' => 'Fabricación de enchapados=> de metales comunes con plata; de metales comunes ó plata con oro; de metales comunes, oro y plata con platino o con metales del grupo del platino.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2420.21',
            'description' => 'Producción de metales comunes no ferrosos a partir de minerales en bruto o en mata, alúmina u óxidos=> aluminio, plomo zinc, estaño, cobre, cromo, manganeso, níquel, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2420.22',
            'description' => 'Producción de metales comunes no ferrosos a partir de minerales o mediante la refinación electrolítica de desechos y chatarra de plomo, zinc, estaño, cobre, cromo, manganeso, níquel, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2420.23',
            'description' => 'Producción de aleaciones de=> aluminio; plomo, zinc, estaño, cobre, cromo, manganeso, níquel, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2420.24',
            'description' => 'Fabricación de productos semielaborados de aluminio, plomo, zinc, estaño, cobre, cromo, manganeso, níquel, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2420.25',
            'description' => 'Fabricación de alambre de metales comunes no ferrosos=> aluminio; plomo, zinc y estaño cobre cromo, manganeso, níquel, etcétera mediante trefilado.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2420.26',
            'description' => 'Producción de aluminio a partir de alúmina y de la refinación electrolítica de desechos y chatarra de aluminio incluido la producción de oxido de aluminio (alúmina).',
            'level' => 'high',
        ],
        [
            'code' => 'C2420.29',
            'description' => 'Fabricación de otros productos de metales no ferrosos=> alambre para fusibles o lámina fusible; papel de aluminio, laminados con hojas de aluminio (estaño) como componente principal; fabricación de alambre de metales no ferrosos mediante el trefilado; producción de metal de uranio a partir de pechblenda u otros minerales fundición y refinamiento de uranio.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2420.30',
            'description' => 'Servicios de apoyo a la fabricación de productos primarios de metales preciosos y metales no ferrosos a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2431.01',
            'description' => 'Fundición de hierro gris, hierro grafito esferoidal, productos de hierro maleable; productos semiacabados de hierro.',
            'level' => 'high',
        ],
        [
            'code' => 'C2431.02',
            'description' => 'Fundición de piezas de acero; productos semiacabados de acero.',
            'level' => 'high',
        ],
        [
            'code' => 'C2431.03',
            'description' => 'Fabricación de tubos, caños, perfiles huecos, conexiones de tubos y caños de hierro y acero sin costura mediante fundición centrífuga.',
            'level' => 'high',
        ],
        [
            'code' => 'C2432.01',
            'description' => 'Fundición de piezas y productos semiacabados de metales no ferrosos incluida la fundición a presión de=> aluminio, magnesio, titanio, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'C2432.02',
            'description' => 'Fundición de metales preciosos.',
            'level' => 'high',
        ],
        [
            'code' => 'C2511.01',
            'description' => 'Fabricación de estructuras de metal marcos o armazones para construcción y partes de esas estructuras=> torres, mástiles, armaduras, puentes, etcétera; marcos industriales de metal=> marcos para altos hornos, equipos de elevación y manipulación, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'C2511.02',
            'description' => 'Fabricación de edificios prefabricados principalmente de metal=> casetas, módulos de exhibición de elementos, cabinas telefónicas, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'C2511.03',
            'description' => 'Fabricación de puertas y ventanas de metal y sus marcos (incluso enrollables), postigos(puertas) y portales, balcones, escaleras, rejas, tabiques de metal para fijar al suelo, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'C2511.04',
            'description' => 'Servicios de apoyo a la fabricación de productos metálicos para uso estructural a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C2512.01',
            'description' => 'Fabricación de tanques, depósitos y recipientes similares de metal, del tipo habitualmente utilizado para almacenamiento y elaboración.',
            'level' => 'high',
        ],
        [
            'code' => 'C2512.02',
            'description' => 'Fabricación de recipientes de metal para gases comprimidos o licuados.',
            'level' => 'high',
        ],
        [
            'code' => 'C2512.03',
            'description' => 'Fabricación de calderas y radiadores para calefacción central, partes y piezas.',
            'level' => 'high',
        ],
        [
            'code' => 'C2512.04',
            'description' => 'Servicios de apoyo a la fabricación de tanques, depósitos y recipientes de metal a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C2513.01',
            'description' => 'Fabricación de generadores (calderas) de vapor de agua y otros vapores; instalaciones auxiliares para generadores (calderas) de vapor=> condensadores, economizadores, recalentadores, recolectores y acumuladores de vapor, incluso deshollinadores, recuperadores de gases sacabarros.',
            'level' => 'high',
        ],
        [
            'code' => 'C2513.02',
            'description' => 'Fabricación de reactores nucleares, excepto separadores de isótopos.',
            'level' => 'high',
        ],
        [
            'code' => 'C2513.03',
            'description' => 'Fabricación de piezas para calderas.',
            'level' => 'high',
        ],
        [
            'code' => 'C2513.04',
            'description' => 'Servicios de apoyo a la fabricación de generadores de vapor, excepto calderas de agua caliente para calefacción central a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2520.01',
            'description' => 'Fabricación de armas pesadas (artillería, cañones móviles, lanzacohetes, tubos lanzatorpedos, ametralladoras pesadas, etcétera).',
            'level' => 'high',
        ],
        [
            'code' => 'C2520.02',
            'description' => 'Fabricación de armas ligeras (revólveres, escopetas, ametralladoras ligeras); armas de fuego y municiones de caza, de deporte o de protección; armas que disparan balas de fogueo, pistolas para lanzar bengalas de señales, pistolas de matarife, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2520.03',
            'description' => 'Fabricación de escopetas y pistolas de aire y gas comprimido.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2520.04',
            'description' => 'Fabricación de municiones de guerra; aparatos explosivos tales como bombas, minas y torpedos.',
            'level' => 'high',
        ],
        [
            'code' => 'C2520.05',
            'description' => 'Servicios de apoyo a la fabricación de armas y municiones a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2591.00',
            'description' => 'Actividades de forja, prensado, estampado y laminado de metales; pulvimetalurgia, producción de objetos de metal directamente a partir de polvos de metal que se someten a tratamiento calorífico (sinterización) o de compresión.',
            'level' => 'high',
        ],
        [
            'code' => 'C2592.01',
            'description' => 'Actividades de servicio de tratamiento calorífico de metales, endurecimiento de metales realizadas a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C2592.02',
            'description' => 'Actividades de servicio de revestimiento de metales=> enchapado, anodización, coloreado, plastificado, esmaltado, lacado, cromado, etcétera, realizadas a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2592.03',
            'description' => 'Actividades de servicio de limpieza de metales=> desbarbado, limpieza con chorro de arena, pulimento en tambor giratorio, bruñido, pulido, limpieza de metales, realizadas a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2592.04',
            'description' => 'Actividades de servicio de maquinado de metales=> taladrado, torneado, fresado, erosión, alisado, lapidado, brochado, aplanado, aserrado, esmerilado, afilado, soldadura, empalme, cortado, grabado, etcétera, de piezas de metal realizadas a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2593.11',
            'description' => 'Fabricación de cubertería de uso doméstico, como cuchillos, tenedores, cucharas, etcétera incluso revestidos de metales preciosos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2593.12',
            'description' => 'Fabricación de otros artículos de cuchillería=> destrales, cuchillos, navajas, maquinillas de afeitar y hojas de afeitar, tijeras comunes y de peluquero.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2593.13',
            'description' => 'Fabricación de cuchillas y cizallas para máquinas y para aparatos mecánicos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2593.14',
            'description' => 'Fabricación de machetes, espadas, bayonetas, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2593.21',
            'description' => 'Fabricación de herramientas de mano tales como alicate, destornilladores, limas, llaves inglesas, martillos, otras herramientas manuales y herramientas de mano de uso doméstico n.c.p.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2593.22',
            'description' => 'Fabricación de sierras y hojas para sierras, incluidas sierras circulares y de cadena.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2593.23',
            'description' => 'Fabricación de accesorios intercambiables para herramientas de mano motorizadas o no, y para máquinas herramientas=> brocas, punzones, fresas, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2593.24',
            'description' => 'Fabricación de herramientas de herrería=> machos de forja, yunques, etcétera; moldes y cajas de moldeo (excepto lingoteras).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2593.25',
            'description' => 'Fabricación de candados, cerraduras, pasadores, llaves, duplicación de llaves, bisagras y artículos similares, accesorios de ferretería para edificios, muebles, vehículos, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2593.26',
            'description' => 'Fabricación de herramientas de mano no motorizadas=> (azadones, picos, palas, etcétera) para uso agrícola, construcción, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2593.27',
            'description' => 'Fabricación de mordazas, abrazaderas, estampas y troqueles de prensa.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2593.30',
            'description' => 'Servicios de apoyo a la fabricación de artículos de cuchillería, herramientas de mano y artículos de ferretería a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2599.11',
            'description' => 'Fabricación de recipientes metálicos utilizados para el envase o transporte de mercancías=> barriles, latas, tambores, cubos, cajas, tarros, incluso tapas corona (cierres metálicos) y latas para productos alimenticios, tubos y cajas plegables.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2599.12',
            'description' => 'Fabricación de cables de metal con o sin aislamiento que no se pueden utilizar como conductores de electricidad, trenzas de metal, alambre y artículos similares de hierro, acero, aluminio o cobre.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2599.13',
            'description' => 'Fabricación de artículos de alambre=> alambre de púas, cercas de alambre, rejillas, redes, telas metálicas, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2599.14',
            'description' => 'Fabricación de muelles (excepto muelles para relojes)=> de ballesta, helicoidales, barras de torsión, ballestas para muelles.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2599.15',
            'description' => 'Fabricación de productos de tortillería=> tornillos, tuercas, pernos y artículos con rosca similares.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2599.16',
            'description' => 'Fabricación de sujetadores hechos de metal=> clavos, alfileres, tachuelas, remaches, abrazaderas, arandelas y artículos sin roscas similares.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2599.17',
            'description' => 'Fabricación de cadenas, excepto las de transmisión de energía (mecánica).',
            'level' => 'high',
        ],
        [
            'code' => 'C2599.21',
            'description' => 'Fabricación de artículos de metal de uso domestico=> vajilla de mesa y de cocina, sean o no de metales comunes y enchapados o no con metales preciosos=> platos, tazas, etcétera; servicio de mesa=> boles, bandejas, etcétera; baterías de cocina=> cacerolas, recipientes para hervir agua, etcétera, cazos (cazuelas), sartenes y otros utensilios no eléctricos para usar en la mesa o en la cocina.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2599.22',
            'description' => 'Fabricación de pequeños aparatos y accesorios manuales de cocina accionados a mano para preparar, acondicionar o servir alimentos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2599.23',
            'description' => 'Fabricación de artículos sanitarios de metal, bañeras, pilas (fuentes), lavabos y artículos similares.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2599.30',
            'description' => 'Servicios de apoyo a la fabricación de otros productos elaborados de metal n.c.p a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2599.91',
            'description' => 'Fabricación de accesorios para vías de ferrocarril o tranvía por ejemplo=> carriles ensamblados, plataformas giratorias, potros de contención, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2599.92',
            'description' => 'Fabricación de hélices para embarcaciones y sus palas, anclas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2599.93',
            'description' => 'Fabricación de cajas fuertes o de seguridad, cajas de caudales, pórticos, puertas blindadas, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'C2599.94',
            'description' => 'Fabricación de imanes metálicos permanentes.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2599.95',
            'description' => 'Fabricación de artículos de metal para oficina, excepto muebles.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2599.96',
            'description' => 'Fabricación de señales metálicas (letreros no eléctricos), marcos de metal para cuadros, placas de metal e insignias militares; artículos similares de metal (excepto metales preciosos).',
            'level' => 'low',
        ],
        [
            'code' => 'C2599.99',
            'description' => 'Fabricación de otros artículos de metal=> cierres, hebillas, corchetes; campanas, almohadillas metálicas para fregar (estropajos); termos y otros recipientes herméticos de metal=> jarros y botellas de metal; rulos para el pelo, empuñaduras y soportes para paraguas y peines de metal, cascos de seguridad, bolsas de papel aluminio, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2610.11',
            'description' => 'Fabricación de semiconductores, condensadores electrónicos, microprocesadores, tableros de circuitos impresos y tableros sin imprimir, incluido la carga de componentes en tableros de circuitos impresos y otros componentes para aplicaciones electrónicas de electrodomésticos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2610.12',
            'description' => 'Fabricación de resistores electrónicos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2610.13',
            'description' => 'Fabricación de tubos electrónicos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2610.20',
            'description' => 'Servicios de apoyo a la fabricación de componentes y tableros electrónicos a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2610.91',
            'description' => 'Fabricación de circuitos integrados (análogos, digitales o híbridos), tarjetas inteligentes (tarjetas bancarias, de identificación y acceso, fidelización, etcétera).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2610.92',
            'description' => 'Fabricación de diodos, transistores y dispositivos semiconductores similares.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2610.93',
            'description' => 'Fabricación de inductores (autoinductores, bobinas, transformadores) del tipo de los utilizados como componentes electrónico; cristales y juegos de cristales electrónicos; plaquetas u obleas, de semiconductores, acabados o semiacabados; solenoides, conmutadores y transductores para aplicaciones eléctricas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2610.94',
            'description' => 'Fabricación de tarjetas de interfaz (de sonido, video, control, red, módems).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2610.95',
            'description' => 'Fabricación de componentes de pantallas (plasma, polímeros, cristal líquido LCD) y diodos emisores de luz (LED).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2610.99',
            'description' => 'Fabricación de otros productos electrónicos=> cables de impresora, monitor, cables USB, conectores etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2620.01',
            'description' => 'Fabricación de ordenadores (computadoras) centrales, microcomputadoras; de escritorio, portátiles (laptops, notebooks); ordenadores de mano (asistentes digitales personales), servidores informáticos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2620.02',
            'description' => 'Fabricación de unidades de disco magnético, unidades de USB=> mp3, mp4, pen drives y otros dispositivos de almacenamiento; unidades de disco óptico (CD-RW, CD-ROM, DVD-ROM, DVD-RW).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2620.03',
            'description' => 'Fabricación de impresoras; monitores, teclados, todo tipo de ratones, palancas de mando y bolas rodantes, equipo de oficina multifunciones como combinaciones de fax-escáner-copiadora, escáneres.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2620.04',
            'description' => 'Fabricación de terminales informáticas especializadas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2620.05',
            'description' => 'Fabricación de terminales como cajeros automáticos (ATM); terminales de puntos de venta, no accionados mecánicamente, monederos automáticos, lectores de códigos de barra; lectores de tarjetas inteligentes.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2620.06',
            'description' => 'Servicios de apoyo a la fabricación de ordenadores y equipo periférico a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2620.09',
            'description' => 'Fabricación de otros equipos informáticos=> cascos de realidad virtual; proyectores informáticos (proyectores de vídeo) etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2630.01',
            'description' => 'Fabricación de aparatos para la conmutación y transmisión de datos=> centrales telefónicas - PBX; módems, bridges, routers, gateways, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2630.02',
            'description' => 'Fabricación de teléfonos inalámbricos; equipos telefónicos y de fax, incluidos los contestadores automáticos, equipo móvil de comunicaciones.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2630.03',
            'description' => 'Fabricación de teléfonos celulares, mensáfonos, localizadores (buscapersonas).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2630.04',
            'description' => 'Fabricación de transmisores de radio y televisión, equipos de estudios incluyendo cámaras de televisión, equipos de televisión por cable (decodificadores), dispositivos de infrarrojos (control remoto).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2630.05',
            'description' => 'Fabricación de sistemas de alarma contra incendio y robo, que transmiten señales a un centro de control.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2630.06',
            'description' => 'Servicios de apoyo a la fabricación de equipo de comunicaciones a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2630.09',
            'description' => 'Fabricación de otros equipos de telecomunicaciones diversos=> antenas de transmisión y recepción, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2640.01',
            'description' => 'Fabricación de equipo de grabación y reproducción de video, incluso cámaras de video de tipo familiar; reproductores de DVD.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2640.02',
            'description' => 'Fabricación de televisores, incluso monitores y pantallas de televisión.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2640.03',
            'description' => 'Fabricación de equipo de grabación y reproducción de sonido; reproductores de CD; equipos estereofónicos; equipos de sonido, etcétera; receptores de radio, incluso con dispositivos de grabación o reproducción de sonido o con un reloj.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2640.04',
            'description' => 'Fabricación de amplificadores para instrumentos musicales y sistemas de megafonía; micrófonos; audífonos (para radios, equipos estereofónicos, ordenadores); parlantes, sistemas de altavoces.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2640.05',
            'description' => 'Servicios de apoyo a la fabricación de aparatos electrónicos de consumo a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2640.09',
            'description' => 'Fabricación de otros aparatos electrónicos diversos=> aparatos de karaoke; consolas de videojuegos, rocolas (jukeboxes), etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2651.11',
            'description' => 'Fabricación de instrumentos para motores de aeronaves.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2651.12',
            'description' => 'Fabricación de equipo de prueba de emisiones de vehículos automotores.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2651.13',
            'description' => 'Fabricación de instrumentos meteorológicos, geodesia, geofísicos, hidrográficos, hidrológicos, prospección, oceanográficos y de nivelar.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2651.14',
            'description' => 'Fabricación de equipos de pruebas e inspección de propiedades físicas o químicas; polígrafos (máquinas detectoras de mentiras); instrumentos de análisis de laboratorio (equipos de análisis de sangre).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2651.15',
            'description' => 'Fabricación de instrumentos para medición y pruebas de electricidad y señales eléctricas (incluidos los destinados a actividades de telecomunicaciones).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2651.16',
            'description' => 'Fabricación de instrumentos de detección y vigilancia de radiaciones.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2651.21',
            'description' => 'Fabricación de termómetros de bola de vidrio rellena con líquido y de termómetros bimetálicos (excepto termómetros de uso médico).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2651.22',
            'description' => 'Fabricación de medidores de flujómetro y dispositivos contadores, manómetros, contadores totalizadores, contadores de consumo de agua, de gas, etcétera',
            'level' => 'medium',
        ],
        [
            'code' => 'C2651.23',
            'description' => 'Fabricación de balanzas y básculas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2651.24',
            'description' => 'Fabricación de microscopios electrónicos y protónicos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2651.29',
            'description' => 'Fabricación de otros equipos para medición y verificación=> registradores de vuelo (caja negra), espectrómetros, medidores de neumáticos, incubadoras y aparatos de laboratorio similares para mediciones, pruebas, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2651.31',
            'description' => 'Fabricación de equipo aeronáutico y náutico de búsqueda, detección y navegación, incluidas sonares, sonoboyas, equipos de radar y fabricación de dispositivos GPS.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2651.32',
            'description' => 'Fabricación de detectores de movimiento; detectores de minas, generadores de impulsos (señales); detectores de metal.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2651.39',
            'description' => 'Fabricación de otros dispositivos=> dispositivos de climatización y dispositivos automáticos de control para aparatos de uso doméstico, limitadores hidrónicos, dispositivos de control de la llama y del quemador, controles medioambientales y controles automáticos para diversos aparatos, instrumentos de medida de la humedad (higrostatos), etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2651.40',
            'description' => 'Servicios de apoyo a la fabricación de equipos de medición, prueba, navegación, control y de relojes a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2652.01',
            'description' => 'Fabricación de relojes de todo tipo, incluido relojes para paneles de instrumentos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2652.02',
            'description' => 'Fabricación de cajas de relojes, incluidas cajas de metales preciosos y sus partes.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2652.03',
            'description' => 'Fabricación de aparatos para registrar la hora del día y aparatos para medir, registrar o indicar de otro modo intervalos de tiempo mediante un mecanismo de relojería o un motor sincrónico como=> parquímetros, relojes de control de entrada, marcadores de fecha y hora, cronómetros de tiempos de fabricación, conmutadores horarios y otros dispositivos de puesta en marcha con mecanismo de relojería o con motor sincrónico (cerraduras temporizadas).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2652.04',
            'description' => 'Fabricación de piezas sueltas para relojes=> muelles, rubíes, esferas, chapas, puentes y otras piezas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2652.05',
            'description' => 'Servicios de apoyo a la fabricación de relojes a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2660.01',
            'description' => 'Fabricación de aparatos de irradiación similares (industriales o de uso diagnóstico, terapéutico, científico o de investigación)=> equipo de rayos beta, de rayos gamma, de rayos X y otros tipos de equipo de radiación; escáneres de tomografía computadorizada (CT) y por emisión de positrones (PET); equipo de irradiación de alimentos y leche.',
            'level' => 'high',
        ],
        [
            'code' => 'C2660.02',
            'description' => 'Fabricación de equipo meédico para electrodiagnóstico=> equipo de tomografía por resonancia magnética MRI, equipo médico de ultrasonido, electrocardiógrafos, equipo electrónico de endoscopia.',
            'level' => 'high',
        ],
        [
            'code' => 'C2660.03',
            'description' => 'Servicios de apoyo a la fabricación de equipo de irradiación, y equipo electrónico de uso médico y terapéutico a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C2660.09',
            'description' => 'Fabricación de otros equipos electromédicos=> marcapasos, audífonos, equipo médico de láser, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2670.11',
            'description' => 'Fabricación de equipos de posicionamiento ópticos; espejos ópticos, lentes, prismas, etcétera, incluido el revestimiento, pulido y montadura de lentes.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2670.12',
            'description' => 'Fabricación de instrumentos de aumento ópticos; dispositivos ópticos de puntería (miras para armas); instrumentos ópticos de precisión para mecánicos; comparadores ópticos; ensamblados de láser.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2670.13',
            'description' => 'Fabricación de microscopios ópticos, telescopios y binoculares.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2670.21',
            'description' => 'Fabricación de cámaras de película y cámaras digitales.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2670.22',
            'description' => 'Fabricación de proyectores de películas y diapositivas; retroproyectores de transparencias.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2670.23',
            'description' => 'Fabricación de dispositivos e instrumentos ópticos de medición y verificación (equipos de control de tiro, fotómetros y telémetros).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2670.30',
            'description' => 'Servicios de apoyo a la fabricación de instrumentos ópticos y equipo fotográficos a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2680.01',
            'description' => 'Fabricación de cintas, cassettes, disquetes, tarjetas con bandas magnéticas, soportes para disco duro vírgenes (en blanco) de=> sonido, video y datos',
            'level' => 'low',
        ],
        [
            'code' => 'C2680.02',
            'description' => 'Fabricación de discos ópticos vírgenes.',
            'level' => 'low',
        ],
        [
            'code' => 'C2680.03',
            'description' => 'Servicios de apoyo a la fabricación de soportes magnéticos y ópticos a cambio de una retribución o por contrato.',
            'level' => 'low',
        ],
        [
            'code' => 'C2710.11',
            'description' => 'Fabricación de transformadores de distribución, para soldadura con arco eléctrico, de subestación para la distribución de energía eléctrica, de reactancias (es decir, transformadores) para lámparas fluorescentes.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2710.12',
            'description' => 'Fabricación de motores eléctricos (excepto los motores de arranque para motores de combustión interna).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2710.13',
            'description' => 'Fabricación de generadores de fuerza (excepto los alternadores cargados por baterías para motores de combustión interna); motores generadores (excepto turbogeneradores); generadores de impulsión, grupos electrógenos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2710.14',
            'description' => 'Fabricación de reguladores del voltaje de transmisión y distribución; rebobinado de inducidos en fábrica.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2710.15',
            'description' => 'Fabricación de partes de=> generadores, motores y transformadores.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2710.21',
            'description' => 'Fabricación de disyuntores de circuitos eléctricos; limitadores de sobretensión (para voltajes de distribución); fusibles eléctricos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2710.22',
            'description' => 'Fabricación de paneles de control para la distribución de energía eléctrica; conductos para cuadros de distribución.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2710.23',
            'description' => 'Fabricación de relés eléctricos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2710.24',
            'description' => 'Fabricación de conmutadores (excepto los de pulsador, de resorte, solenoidales, oscilantes), equipos de conmutación, portalámparas, clavijas, terminales y otros conectores eléctricos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2710.30',
            'description' => 'Servicios de apoyo a la fabricación de motores, generadores, transformadores eléctricos y aparatos de distribución y control de la energía eléctrica a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2720.01',
            'description' => 'Fabricación de pilas y baterías primarias=> pilas de dióxido de manganeso, dióxido de mercurio, óxido de plata, plomo-ácido, níquel-cadmio, níquel e hidruro metálico, litio, pilas secas y húmedas, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2720.02',
            'description' => 'Fabricación de acumuladores eléctricos y partes de acumuladores, separadores, contenedores, tapas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2720.03',
            'description' => 'Servicios de apoyo a la fabricación de pilas, baterías y acumuladores a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2731.01',
            'description' => 'Fabricación de cables de fibra óptica para la transmisión de datos o la transmisión de imágenes en directo.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2731.02',
            'description' => 'Servicios de apoyo a la fabricación de cables de fibra óptica a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2732.01',
            'description' => 'Fabricación de hilos y cables aislados de acero, cobre, aluminio y otros juegos de cables eléctricos aislados y enchufe.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2732.02',
            'description' => 'Servicios de apoyo a la fabricación de otros hilos y cables eléctricos a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2733.01',
            'description' => 'Fabricación de barras colectoras y otros conductores eléctricos (excepto del tipo de los utilizados en conmutadores).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2733.02',
            'description' => 'Fabricación de interruptores de circuito por falta de conexión a tierra (GFCI).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2733.03',
            'description' => 'Fabricación de portalámparas, pararrayos, conmutadores (de presión, de botón, de resorte, oscilantes), enchufes y tomas de corriente, cajas para cableado (de conexiones, de toma de corriente, de conmutación).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2733.04',
            'description' => 'Servicios de apoyo a la fabricación de dispositivos de cableado a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2733.09',
            'description' => 'Fabricación de otros dispositivos de cableado=> dispositivos de cableado de plástico no portadores de corriente, como cajas de conexiones, chapas frontales y artículos similares, accesorios de plástico para tendidos aéreos, dispositivos para postes y líneas de transmisión, conductos y accesorios eléctricos (canaletas), etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2740.01',
            'description' => 'Fabricación de lámparas, tubos y bombillas de descarga, incandescentes, fluorescentes, de rayos ultravioletas, de rayos infrarrojos, lámparas de destellos, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2740.02',
            'description' => 'Fabricación de lámparas de techo, arañas colgantes, lámparas de mesa, juegos de luces para decorar árboles de Navidad, lámparas eléctricas contra insectos, troncos eléctricos para chimenea, lámparas para la iluminación de las calles (excepto señales de tráfico), proyectores de teatro.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2740.03',
            'description' => 'Fabricación de linternas (de carburo, eléctricas, de gas, de gasolina, de queroseno).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2740.04',
            'description' => 'Fabricación de equipo de iluminación para equipo de transporte (vehículos automotores, aeronaves, embarcaciones).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2740.05',
            'description' => 'Fabricación de equipo de iluminación no eléctrico.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2740.06',
            'description' => 'Servicios de apoyo a la fabricación de equipo eléctrico de iluminación a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2750.01',
            'description' => 'Fabricación de aparatos eléctricos de uso doméstico=> refrigeradores, congeladores, lavaplatos, lavadoras y secadoras, aspiradoras, enceradoras de pisos, trituradoras de desperdicios, molinillos de café, licuadoras, exprimidoras, abrelatas, máquinas de afeitar eléctricas, cepillos dentales eléctricos y otros aparatos eléctricos de cuidado personal, afiladoras de cuchillos, campanas de ventilación o de absorción de humos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2750.02',
            'description' => 'Fabricación de aparatos termoeléctricos de uso doméstico=> calentadores de agua eléctricos, mantas eléctricas, secadores, peines, cepillos y tenacillas eléctricos, planchas eléctricas, calentadores de ambiente y ventiladores portátiles, hornos eléctricos, hornos de microondas, cocinillas y planchas de cocinar eléctricas, tostadoras, cafeteras y teteras, sartenes, asadores, parrillas, campanas, calentadores eléctricos de resistencia, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2750.03',
            'description' => 'Fabricación de equipo de cocina y calefacción de uso doméstico no eléctrico=> calentadores de ambiente, cocinillas, parrillas, cocinas, hornos, calentadores de agua (calefones), aparatos de cocina y calentadores de platos no eléctricos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2750.04',
            'description' => 'Servicios de apoyo a la fabricación de aparatos de uso doméstico a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2790.11',
            'description' => 'Fabricación de invertidores, rectificadores, células energéticas, unidades de suministro de potencia regulada y no regulada de estado sólido; fabricación de cargadores de pilas, baterías de estado sólido.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2790.12',
            'description' => 'Fabricación de equipo eléctrico de señalización como=> semáforos y señales peatonales, señales eléctricas, marcadores electrónicos, dispositivos eléctricos de apertura y cierre de puertas, timbres eléctricos, sirenas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2790.13',
            'description' => 'Fabricación de equipo eléctrico de soldadura autógena y de soldadura blanda, incluidos soldadores manuales.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2790.19',
            'description' => 'Fabricación de otros tipos de equipo eléctrico=> limpiadores ultrasónicos (excepto los de uso odontológico y de laboratorio), camas bronceadoras, limitadores de sobretensión (excepto para voltajes de distribución), aceleradores de partículas, unidades de suministro ininterrumpido de energía, aparatos eléctricos con funciones especiales, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2790.20',
            'description' => 'Servicios de apoyo a la fabricación de otros tipos de equipo eléctrico a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2790.91',
            'description' => 'Fabricación de capacitores, resistores, condensadores y componentes eléctricos similares.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2790.92',
            'description' => 'Fabricación de electroimanes.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2790.94',
            'description' => 'Fabricación de electrodos y contactos de carbono y grafito y otros productos eléctricos de carbón y grafito, aisladores eléctricos (excepto los de vidrio o porcelana).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2811.01',
            'description' => 'Fabricación de motores de combustión interna de pistones, excepto motores de propulsión de vehículos automotores, aeronaves y motocicletas=> motores marinos, motores para locomotoras.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2811.02',
            'description' => 'Fabricación de pistones, aros de pistón, válvulas de admisión, escapes, carburadores y piezas similares para todo tipo de motores de combustión interna, motores diesel, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2811.03',
            'description' => 'Fabricación de turbinas y partes de turbinas=> turbinas de vapor de agua y otros tipos de vapor, turbinas hidráulicas, ruedas hidráulicas y maquinaria para su regulación, turbinas eólicas, turbinas de gas, excepto turbopropulsores de reacción o de hélice para la propulsión de aeronaves, turbocalderas (conjuntos de caldera y turbina), turboalternadores, grupos turbogeneradores.',
            'level' => 'high',
        ],
        [
            'code' => 'C2811.04',
            'description' => 'Servicios de apoyo a la fabricación de motores y turbinas, excepto motores para aeronaves, vehículos automotores y motocicletas a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C2812.01',
            'description' => 'Fabricación de componentes hidráulicos y neumáticos=> bombas y sistemas de propulsión de fluidos, equipo de transmisión hidráulico, transmisiones hidrostáticas, motores hidráulicos; equipo de preparación del aire para sistemas neumáticos, cilindros, válvulas, tubos y empalmes hidráulicos y neumáticos.',
            'level' => 'high',
        ],
        [
            'code' => 'C2812.02',
            'description' => 'Servicios de apoyo a la fabricación de equipo de propulsión de fluidos a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C2813.01',
            'description' => 'Fabricación de bombas de aire o de vacío, compresores de aire y otros compresores de gas.',
            'level' => 'high',
        ],
        [
            'code' => 'C2813.02',
            'description' => 'Fabricación de bombas para líquidos, tengan o no dispositivos de medición; bombas para motores de combustión interna=> bombas de aceite, agua y combustible para vehículos automotores, etcétera; bombas manuales.',
            'level' => 'high',
        ],
        [
            'code' => 'C2813.03',
            'description' => 'Fabricación de grifos y válvulas industriales, sanitarios, calefacción, incluidos válvulas de regulación y grifos de admisión.',
            'level' => 'high',
        ],
        [
            'code' => 'C2813.04',
            'description' => 'Servicios de apoyo a la fabricación de otras bombas, compresores, grifos y válvulas a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C2814.01',
            'description' => 'Fabricación de cojinetes de bola y de rodillo y de partes de cojinetes.',
            'level' => 'high',
        ],
        [
            'code' => 'C2814.02',
            'description' => 'Fabricación de equipo mecánico de transmisión=> ejes y manivelas de transmisión, ejes de levas, cigüeñales, manivelas, etcétera, cajas de cojinetes y cojinetes simples para ejes.',
            'level' => 'high',
        ],
        [
            'code' => 'C2814.03',
            'description' => 'Fabricación de engranajes, trenes de engranajes, cajas de engranajes y otros dispositivos para cambios de marchas; embragues y acoplamientos de ejes; volantes y poleas; eslabones articulados y cadenas de transmisión.',
            'level' => 'high',
        ],
        [
            'code' => 'C2814.04',
            'description' => 'Servicios de apoyo a la fabricación de cojinetes, engranajes, trenes de engranajes y piezas de transmisión a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C2815.01',
            'description' => 'Fabricación de hornos eléctricos y de otro tipo para uso industrial y de laboratorio, incluidos incineradores.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2815.02',
            'description' => 'Fabricación de equipo fijo de calefacción de uso doméstico como calefacción=> solar, por vapor, de fuel y equipo similar, calentadores de ambiente eléctricos fijos y calentadores eléctricos para piscinas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2815.03',
            'description' => 'Fabricación de cargadores mecánicos, parrillas mecánicas, descargadores mecánicos de cenizas, quemadores, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2815.04',
            'description' => 'Servicios de apoyo a la fabricación de hornos y quemadores a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2816.01',
            'description' => 'Fabricación de maquinaria de elevación, manipulación, carga o descarga, manual o eléctrica=> polipastos y elevadores, cabrias, cabrestantes y gatos, grúas de brazo móvil, grúas corrientes, bastidores elevadores móviles, camiones de pórtico alto, etcétera, carretillas de faena, estén provistas o no de equipo de elevación o manipulación, y sean autopropulsadas o no, como las que se utilizan en fábricas (incluidos carretillas y carros de mano); manipuladores mecánicos y robots industriales diseñados especialmente para operaciones de elevación, manipulación, carga o descarga.',
            'level' => 'high',
        ],
        [
            'code' => 'C2816.02',
            'description' => 'Fabricación de ascensores, escaleras mecánicas y pasillos rodantes, cintas transportadoras, teleféricos, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'C2816.03',
            'description' => 'Fabricación de partes y piezas especiales para equipo de elevación y manipulación.',
            'level' => 'high',
        ],
        [
            'code' => 'C2816.04',
            'description' => 'Servicios de apoyo a la fabricación de equipo de elevación y manipulación a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C2817.01',
            'description' => 'Fabricación de máquinas calculadoras electrónicas o no, máquinas de sumar y máquinas registradoras incluso accionadas mecánicamente.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2817.02',
            'description' => 'Fabricación de máquinas de escribir, máquinas de estenotipia, máquinas para rellenar cheques.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2817.03',
            'description' => 'Fabricación de máquinas para el franqueo y la manipulación de correspondencia (máquinas para llenar y cerrar sobres y para imprimir direcciones, máquinas para abrir, clasificar y escanear correspondencia), máquinas de encolar, máquinas para contar y envolver monedas, máquinas distribuidoras de billetes, máquinas de votación, dictáfonos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2817.04',
            'description' => 'Fabricación de fotocopiadoras.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2817.05',
            'description' => 'Fabricación de equipo de encuadernación del tipo utilizado en oficinas (es decir, para encuadernar con plástico o con cinta adhesiva), punzones.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2817.06',
            'description' => 'Servicios de apoyo a la fabricación de maquinaria y equipo de oficina (excepto ordenadores y equipo periférico) a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2817.09',
            'description' => 'Fabricación de afiladores de lápices, grapadoras, quitagrapas, portarrollos para cinta adhesiva, cartuchos de tinta (toner), pizarras, encerados y tableros para escribir con rotulador, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2818.01',
            'description' => 'Fabricación de herramientas de mano con motor autónomo eléctrico o no eléctrico, como=> sierras circulares o con movimiento alternativo, taladros, pulidoras, tupíes, lijadoras, afiladoras, clavadoras motorizadas, cepilladoras, cizallas y recortadoras de chapa, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2818.02',
            'description' => 'Fabricación de herramientas de mano de aire comprimido, como=> perforadoras de percusión, clavadoras neumáticas, engrapadoras, remachadoras neumáticas, aprieta tuercas neumáticos de percusión, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2818.03',
            'description' => 'Servicios de apoyo a la fabricación de herramientas de mano motorizadas a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2819.11',
            'description' => 'Fabricación de equipo industrial de refrigeración o de congelación, incluidos conjuntos montados de componentes principales.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2819.12',
            'description' => 'Fabricación de básculas y balanzas (excepto balanzas de precisión para laboratorios)=> balanzas de uso doméstico, balanzas de plataforma, balanzas de pesada continua, básculas para vehículos, pesas, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2819.13',
            'description' => 'Fabricación de maquinaria para empaquetar y envolver=> máquinas para llenar, cerrar, sellar, encapsular, etiquetar, etcétera; maquinaria para limpiar o secar botellas y para la aireación de bebidas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2819.21',
            'description' => 'Fabricación de aparatos de acondicionamiento de aire, incluidos los utilizados en vehículos automotores; ventiladores distintos de los de uso doméstico, dispositivos de ventilación de desvanes (ventiladores de tejado, etcétera).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2819.22',
            'description' => 'Fabricación de maquinaria y aparatos de filtrado o depuración de líquidos, incluso filtros de aceite, aire, gas para motores de combustión interna.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2819.23',
            'description' => 'Fabricación de equipo para proyectar, dispersar o pulverizar líquidos o polvos=> pistolas de pulverización, extintores de incendios, máquinas de limpieza por chorro de arena, máquinas de limpieza al vapor, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'C2819.24',
            'description' => 'Fabricación de plantas destiladoras y rectificadoras para las refinerías de petróleo, la industria química, la industria de elaboración de bebidas, etcétera; maquinaria para licuar aire o gas, generadores de gas.',
            'level' => 'high',
        ],
        [
            'code' => 'C2819.25',
            'description' => 'Fabricación de intercambiadores de calor.',
            'level' => 'high',
        ],
        [
            'code' => 'C2819.30',
            'description' => 'Servicios de apoyo a la fabricación de otros tipos de maquinaria de uso general a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C2819.91',
            'description' => 'Fabricación de calandrias y otras máquinas de laminado, y de rodillos para esas máquinas (excepto las laminadoras de metal y vidrio).',
            'level' => 'high',
        ],
        [
            'code' => 'C2819.92',
            'description' => 'Fabricación de centrifugadoras (excepto descremadoras y secadoras de ropa).',
            'level' => 'high',
        ],
        [
            'code' => 'C2819.93',
            'description' => 'Fabricación de juntas y piezas de empalme similares hechas de una combinación de materiales y de capas de un mismo material.',
            'level' => 'high',
        ],
        [
            'code' => 'C2819.94',
            'description' => 'Fabricación de máquinas automáticas de venta de productos.',
            'level' => 'high',
        ],
        [
            'code' => 'C2819.95',
            'description' => 'Fabricación de niveles, cintas métricas y herramientas de mano similares, herramientas de precisión para mecánicos (excepto instrumentos ópticos).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2819.96',
            'description' => 'Fabricación de equipo no eléctrico de soldadura autógena y de soldadura blanda.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2819.97',
            'description' => 'Fabricación de partes y piezas de maquinaria de uso general.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2821.01',
            'description' => 'Fabricación de tractores utilizados en actividades agropecuarias y silvícola=> tractores de manejo a pie (dirigidos por una persona desde fuera), motocultores, segadoras, incluidas segadoras de césped, remolques y semirremolques de carga y descarga automática para uso agrícola.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2821.02',
            'description' => 'Fabricación de máquinas utilizadas en la agricultura para preparar los suelos, plantar o abonar=> arados, esparcidoras de estiércol, sembradoras, rastrilladoras, etcétera).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2821.03',
            'description' => 'Fabricación de máquinas para la recolección y trilla=> cosechadoras, trilladoras, cribadoras, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2821.04',
            'description' => 'Fabricación de máquinas de ordeñar.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2821.05',
            'description' => 'Fabricación de aspersores de uso agrícola.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2821.06',
            'description' => 'Fabricación de otra maquinaria de uso agropecuario=> máquinas utilizadas en la avicultura y la apicultura, equipo para la preparación de pienso, etcétera, máquinas para limpiar, seleccionar y clasificar huevos, fruta, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2821.07',
            'description' => 'Servicios de apoyo a la fabricación de maquinaria agropecuaria y forestal a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2822.01',
            'description' => 'Fabricación de máquinas herramienta para trabajar metales y otros materiales (madera, hueso, piedra, caucho endurecido, plásticos duros, vidrio en frío, etcétera), incluidas las que utilizan rayos láser, ondas ultrasónicas, arcos de plasma, impulsos magnéticos, etcétera; máquinas fijas para clavar, engrapar, encolar y montar de otra manera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2822.02',
            'description' => 'Fabricación de máquinas herramienta para tornear, perforar, fresar, conformar, cepillar, rectificar, taladrar (taladradoras rotatorias y de percusión), limadoras, remachadoras, cortadoras de láminas de metal, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2822.03',
            'description' => 'Fabricación de máquinas herramienta para estampar y prensar, punzonadoras, prensas hidráulicas, machacadoras hidráulicas, martinetes, máquinas de forjar, etcétera, fabricación de bancos de trefilar, máquinas de aterrajar por laminado a presión y máquinas para trabajar alambre.',
            'level' => 'high',
        ],
        [
            'code' => 'C2822.04',
            'description' => 'Fabricación de prensas para la fabricación de tableros de partículas y productos similares; maquinaria para galvanoplastia.',
            'level' => 'high',
        ],
        [
            'code' => 'C2822.05',
            'description' => 'Fabricación de partes, piezas y accesorios para las máquinas herramienta anteriormente enumeradas=> mandriles de sujeción, cabezales divisorios y otros accesorios especiales para máquinas herramienta.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2822.06',
            'description' => 'Servicios de apoyo a la fabricación de maquinaria para la conformación de metales y de máquinas herramienta a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2823.01',
            'description' => 'Fabricación de máquinas y equipo para la manipulación de metales en caliente=> convertidores, lingoteras, calderos de colada, máquinas de fundir.',
            'level' => 'high',
        ],
        [
            'code' => 'C2823.02',
            'description' => 'Fabricación de máquinas laminadoras de metal y de rodillos para esas máquinas.',
            'level' => 'high',
        ],
        [
            'code' => 'C2823.03',
            'description' => 'Servicios de apoyo a la fabricación de maquinaria metalúrgica a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C2824.01',
            'description' => 'Fabricación de elevadores y cintas transportadoras de marcha continúa para uso en obras subterráneas.',
            'level' => 'high',
        ],
        [
            'code' => 'C2824.02',
            'description' => 'Fabricación de maquinaria para perforar, cortar, hincar y tunelar (destinada o no a obras subterráneas).',
            'level' => 'high',
        ],
        [
            'code' => 'C2824.03',
            'description' => 'Fabricación de maquinaria para el tratamiento de minerales mediante cribado, clasificación, separación, lavado, trituración, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'C2824.04',
            'description' => 'Fabricación de máquinas para hincar y arrancar pilotes, esparcidoras de hormigón, esparcidoras de asfalto, maquinaria para pavimentar con hormigón, mezcladoras de hormigón y mortero, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'C2824.05',
            'description' => 'Fabricación de maquinaria para el movimiento de tierras=> topadoras corrientes, topadoras de pala angular, explanadoras, niveladoras, trabillas, palas mecánicas, cargadoras de cucharón, palas para topadoras corrientes y de pala angular, tractores de oruga, tractores utilizados en obras de construcción y en la explotación de minas y canteras, camiones con volquete para todo terreno, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'C2824.06',
            'description' => 'Servicios de apoyo a la fabricación de maquinaria para la explotación de minas y canteras y para obras de construcción a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C2825.01',
            'description' => 'Fabricación de secadoras agrícolas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2825.02',
            'description' => 'Fabricación de maquinaria para la industria lechera=> descremadoras, maquinaria para la elaboración de la leche (homogeneizadoras), para la transformación de la leche (mantequeras, malaxadoras y moldeadoras), para hacer quesos (homogenizadoras, moldeadoras, prensas), etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2825.03',
            'description' => 'Fabricación de maquinaria para la molienda de granos=> maquinaria para limpiar, seleccionar y clasificar semillas, granos y leguminosas secas (aventadoras, cribadoras, cintas cribadoras, separadoras, cepilladoras, etcétera) maquinaria para la producción de harinas y sémolas, etcétera (trituradoras, alimentadoras, cribadoras, depuradoras de afrecho (salvado), mezcladoras, descascarilladoras de arroz, partidoras de guisantes).',
            'level' => 'medium',
        ],
        [
            'code' => 'C2825.04',
            'description' => 'Fabricación de prensas, trituradoras, trapiches, etcétera, utilizadas en la elaboración de vino, sidra, jugos de frutas, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2825.05',
            'description' => 'Fabricación de maquinaria para uso en panadería y para hacer macarrones, espaguetis o productos similares=> hornos de panadería, amasadoras, fraccionadoras y moldeadoras de masa, cortadoras, máquinas para depositar tartas, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2825.06',
            'description' => 'Fabricación de maquinaria para la extracción o preparación de grasas y aceites animales o vegetales.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2825.07',
            'description' => 'Fabricación de maquinaria para la preparación del tabaco y la elaboración de cigarrillos y cigarros, tabaco para pipa, tabaco de mascar y rapé.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2825.08',
            'description' => 'Servicios de apoyo a la fabricación de maquinaria para la elaboración de alimentos, bebidas y tabaco a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2825.09',
            'description' => 'Fabricación de otra maquinaria y equipo para la elaboración de diversos alimentos=> maquinaria para la elaboración de cacao, chocolate y productos de confitería; la fabricación de azúcar; para fábricas de cerveza; la elaboración de carne de bovino y de aves de corral; la preparación de frutas, nueces y hortalizas y legumbres; la preparación de pescado, crustáceos y moluscos y otros productos marinos comestibles, maquinaria para filtrar y depurar, otros tipos de maquinaria para la preparación y la elaboración industrial de alimentos y bebidas, maquinaria para la preparación de alimentos en hoteles y restaurantes, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2826.11',
            'description' => 'Fabricación de maquinaria textil=> máquinas para preparar, producir, extruir, estirar, texturizar o cortar fibras y materiales textiles e hilados artificiales; máquinas para preparar fibras textiles=> desmotadoras de algodón, abridoras de balas, transformadoras de hilachas en fibra, batanes de algodón, desengrasadoras y carbonizadoras de lana, peinadoras, cardadoras, mecheras, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2826.12',
            'description' => 'Máquinas para transformar las mechas en hilos, preparar hilados textiles=> devanadoras, urdidoras y máquinas similares telares corrientes, incluidos telares manuales telares para tejidos de punto, máquinas para hacer tejidos de mallas anudadas, tules, encajes, trencillas, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2826.13',
            'description' => 'Fabricación de máquinas y equipo auxiliar para la maquinaria textil=> lizos, mecanismos de Jacquard, mecanismos de parada automáticos, mecanismos de cambio de lanzadera, husos y aletas, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2826.14',
            'description' => 'Fabricación de maquinaria para el tratamiento de tejidos=> maquinaria para lavar, blanquear, teñir, aprestar, acabar, revestir e impregnar telas, máquinas para enrollar, desenrollar, plegar, cortar y calar telas; maquinaria para el estampado de textiles.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2826.15',
            'description' => 'Fabricación de maquinaria de lavandería=> máquinas de planchar, incluidas planchas de fusión, lavadoras y secadoras comerciales, máquinas de limpieza en seco.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2826.16',
            'description' => 'Fabricación de máquinas de coser, de cabezales y agujas para máquinas de coser (sean o no de uso doméstico), maquinas para la manufactura y el acabado de fieltros y de textiles no tejidos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2826.21',
            'description' => 'Fabricación de máquinas para cueros=> maquinaria para preparar, curtir y trabajar cueros y pieles.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2826.22',
            'description' => 'Fabricación de maquinaria para fabricar y reparar calzado y otros artículos de cuero o piel.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2826.30',
            'description' => 'Servicios de apoyo a la fabricación de maquinaria para la elaboración de productos textiles, prendas de vestir y cueros a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2829.11',
            'description' => 'Fabricación de maquinaria para la elaboración de pasta de madera, fabricación de papel y cartón, secadoras para madera, pasta de madera, papel o cartón y fabricación de artículos de papel o cartón.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2829.12',
            'description' => 'Fabricación de maquinaria para trabajar el caucho y los plásticos blandos y para fabricar productos de esos materiales=> máquinas para extruir, moldear, fabricar y recauchutar cubiertas neumáticas y otras máquinas para fabricar determinados productos de caucho o plásticos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2829.20',
            'description' => 'Servicios de apoyo a la fabricación de otros tipos de maquinaria de uso especial a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2829.91',
            'description' => 'Fabricación de maquinaria para imprimir y encuadernar y de máquinas auxiliares para la impresión sobre diversos materiales.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2829.92',
            'description' => 'Fabricación de maquinaria para producir baldosas, ladrillos, pastas de cerámica moldeadas, tubos, electrodos de grafito, tiza de pizarrón, moldes de fundición, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2829.93',
            'description' => 'Fabricación de maquinaria para la elaboración de semiconductores.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2829.94',
            'description' => 'Fabricación de máquinas para montar lámparas, tubos (válvulas) y bombillas eléctricas y electrónicas máquinas para la producción y el trabajo en caliente de vidrio y productos de cristalería, fibras e hilados de vidrio.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2829.95',
            'description' => 'Fabricación de máquinas de funciones especiales, sistemas centrales de engrasado.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2829.96',
            'description' => 'Fabricación de tiovivos, columpios, galerías de tiro y atracciones de feria.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2829.99',
            'description' => 'Fabricación de otro tipo de maquinaria y equipo de uso especial=> maquinaria o aparatos para la separación de isótopos, robots industriales de uso especial para la realización de múltiples tareas, secadores de otros materiales, maquinas para fabricar cuerdas, equipo de alineación y equilibrado (balanceo) de neumáticos; equipo de equilibrado (excepto el de equilibrado de ruedas), equipo automático para boleras, artefactos de lanzamiento para aeronaves, catapultas para portaaviones y equipo conexo, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2910.01',
            'description' => 'Fabricación de automóviles de pasajeros, vehículos para todo terreno, autobuses, trolebuses, go-carts y vehículos similares, incluidos vehículos de carreras.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2910.02',
            'description' => 'Fabricación de vehículos para el transporte de mercancías=> camionetas, camiones, tractores para semirremolques de circulación por carretera, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2910.03',
            'description' => 'Fabricación de motores para vehículos automotores.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2910.04',
            'description' => 'Fabricación de chasis equipados con motores.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2910.05',
            'description' => 'Fabricación de otros vehículos automotores=> trineos motorizados, carritos autopropulsados para campos de golf, vehículos anfibios, camiones de bomberos, camiones barredores, bibliotecas móviles, vehículos blindados, camiones hormigonera, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2910.06',
            'description' => 'Servicios de apoyo a la fabricación de vehículos automotores, reconstrucción, rectificación en fábrica de sus motores a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2920.01',
            'description' => 'Fabricación de carrocerías, incluidas cabinas para vehículos automotores.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2920.02',
            'description' => 'Fabricación de remolques y semirremolques=> para el transporte de mercancías=> camiones cisterna, de mudanzas, etcétera, para el transporte de pasajeros=> caravanas, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2920.03',
            'description' => 'Fabricación de contenedores para su acarreo por uno o más medios de transporte.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2920.04',
            'description' => 'Servicios de apoyo a la fabricación, ensamblaje y equipamiento de carrocerías para vehículos automotores, remolques y semirremolques a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2930.01',
            'description' => 'Fabricación de partes, piezas y accesorios de carrocerías para vehículos automotores=> cinturones de seguridad, dispositivos inflables de seguridad (airbag), puertas, parachoques, asientos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2930.02',
            'description' => 'Fabricación de equipo eléctrico para vehículos automotores, como generadores, alternadores, bujías, cableados preformados para el sistema de encendido, sistemas eléctricos de apertura y cierre de ventanillas y puertas, montaje de tableros de instrumentos, reguladores de tensión, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2930.03',
            'description' => 'Servicios de apoyo a la fabricación de partes, piezas y accesorios para vehículos automotores a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C2930.09',
            'description' => 'Fabricación de otras partes, piezas y accesorios para vehículos automotores=> frenos, cajas de cambios, ejes, aros de ruedas, amortiguadores, radiadores, silenciadores, tubos de escape, catalizadores, embragues, volantes, columnas y cajas de dirección, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3011.01',
            'description' => 'Construcción de buques comerciales=> buques de pasajeros, transbordadores, buques mercantes, petroleros, remolcadores, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'C3011.02',
            'description' => 'Construcción de buques de guerra.',
            'level' => 'high',
        ],
        [
            'code' => 'C3011.03',
            'description' => 'Construcción de pesqueros y buques-factoría.',
            'level' => 'high',
        ],
        [
            'code' => 'C3011.04',
            'description' => 'Construcción de estructuras flotantes=> pantalanes flotantes, pontones, diques flotantes, embarcaderos flotantes, boyas, depósitos flotantes, barcazas, gabarras, grúas flotantes, balsas inflables distintas de las de recreo, etcétera, construcción de plataformas de perforación flotantes o sumergibles, aerodeslizadores (excepto los de recreo), secciones para buques.',
            'level' => 'high',
        ],
        [
            'code' => 'C3011.05',
            'description' => 'Servicios de apoyo a la construcción de buques y estructuras flotantes a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C3012.01',
            'description' => 'Fabricación de botes y balsas inflables.',
            'level' => 'high',
        ],
        [
            'code' => 'C3012.02',
            'description' => 'Construcción de veleros, provistos o no de motor auxiliar.',
            'level' => 'high',
        ],
        [
            'code' => 'C3012.03',
            'description' => 'Servicios de apoyo a la construcción de embarcaciones de recreo y deporte a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C3012.09',
            'description' => 'Fabricación de otras embarcaciones de recreo y deporte=> embarcaciones personales, canoas, kayaks, botes de remo, esquifes aerodeslizadores de recreo, motos acuáticas, embarcaciones de motor, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'C3020.01',
            'description' => 'Fabricación de locomotoras eléctricas, diesel, de vapor y de otros tipos, incluido vagones para ferrocarriles mineros.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3020.02',
            'description' => 'Fabricación de vagones de pasajeros, furgones y vagones de plataforma autopropulsados de tranvía y de ferrocarril, vehículos autopropulsados de mantenimiento y de servicio para tranvías y ferrocarriles.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3020.03',
            'description' => 'Fabricación de material rodante no autopropulsado para tranvías y ferrocarriles=> vagones de pasajeros, furgones de carga, vagones cisterna, furgones y vagones de volteo, furgones taller, vagones grúa, ténderes, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3020.04',
            'description' => 'Fabricación de partes y piezas especiales de locomotoras y tranvías y de su material rodante=> bogies, ejes y ruedas, frenos y piezas de frenos, ganchos y mecanismos de enganche, topes y piezas de topes, amortiguadores, bastidores de vagones y locomotoras, carrocerías, plataformas de intercomunicación, etcétera, incluido asientos para vagones de ferrocarril.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3020.05',
            'description' => 'Fabricación de equipo mecánico y electromecánico de señalización, seguridad y control de tráfico para ferrocarriles, tranvías, carreteras, vías de navegación interiores, aparcamientos, aeropuertos, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3020.06',
            'description' => 'Servicios de apoyo a la fabricación de locomotoras y material rodante a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3030.01',
            'description' => 'Fabricación de aeronaves para el transporte de mercancías o de pasajeros, para defensa militar, deporte u otros fines=> aviones, helicópteros; fabricación aparatos de entrenamiento de vuelo en tierra.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3030.02',
            'description' => 'Fabricación de planeadores, alas delta, dirigibles y globos de aire caliente.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3030.03',
            'description' => 'Fabricación de naves espaciales y vehículos de lanzamiento de naves espaciales, satélites, sondas planetarias, estaciones orbitales y transbordadores espaciales incluido misiles balísticos intercontinentales.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3030.04',
            'description' => 'Fabricación de partes, piezas y accesorios para aeronaves de esta clase=> ensambladuras principales, como fuselajes, alas, puertas, asientos para aeronaves, paneles de mando, trenes de aterrizaje, depósitos de combustible, góndolas, etcétera, hélices, rotores de helicóptero y palas de hélice propulsadas, motores del tipo utilizado generalmente en aeronaves, partes de turbopropulsores de reacción y de hélice para aeronaves.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3030.05',
            'description' => 'Servicios de apoyo a la fabricación de aeronaves y naves especiales y maquinaria conexa a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3040.01',
            'description' => 'Fabricación de vehículos militares de combate=> tanques de combate, vehículos anfibios blindados.',
            'level' => 'high',
        ],
        [
            'code' => 'C3040.02',
            'description' => 'Servicios de apoyo a la fabricación de vehículos militares de combate a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C3091.01',
            'description' => 'Fabricación de motocicletas, velomotores y bicicletas con motor auxiliar.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3091.02',
            'description' => 'Fabricación de motores para motocicletas, piezas, partes y accesorios de motocicletas incluido sidecars.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3091.03',
            'description' => 'Servicios de apoyo a la fabricación de motocicletas a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3092.01',
            'description' => 'Fabricación de bicicletas no motorizadas y otros vehículos similares, como triciclos de reparto o para otros usos, tándems, bicicletas y triciclos para niños, fabricación de partes, piezas y accesorios de bicicletas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3092.02',
            'description' => 'Fabricación de sillas de ruedas para inválidos, motorizados o no, fabricación de partes, piezas y accesorios de sillas de ruedas para inválidos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3092.03',
            'description' => 'Fabricación de cochecitos para bebés.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3092.04',
            'description' => 'Servicios de apoyo a la fabricación de bicicletas y de sillas de ruedas para inválidos a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3099.01',
            'description' => 'Fabricación de vehículos de propulsión manual=> carritos para equipaje, carretillas, trineos, carritos para supermercados, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3099.02',
            'description' => 'Fabricación de vehículos de tracción animal=> calesas, calesines, carrozas fúnebres, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3099.03',
            'description' => 'Servicios de apoyo a la fabricación de otros tipos de equipo de transporte n.c.p a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3100.01',
            'description' => 'Fabricación de muebles de madera y sus partes=> para el hogar, oficinas, talleres, hoteles, restaurantes, iglesias, escuelas, muebles especiales para locales comerciales, muebles para máquinas de coser, televisiones, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3100.02',
            'description' => 'Fabricación de muebles de metal y sus partes=> para el hogar, oficina, talleres, hoteles, restaurantes, iglesias, escuelas, muebles especiales para locales comerciales y otros usos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3100.03',
            'description' => 'Fabricación de muebles de materiales plásticos y sus partes para cualquier uso (excepto muebles para uso médico o afines).',
            'level' => 'medium',
        ],
        [
            'code' => 'C3100.04',
            'description' => 'Fabricación de muebles de otros materiales y sus partes (excepto de cerámica, hormigón o piedra) para cualquier uso como=> sillas y asientos de jardín.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3100.05',
            'description' => 'Fabricación de colchones=> colchones de muelles y rellenos o provistos de algún material de sustentación, colchones de caucho celular y de plástico sin forro, fabricación de bases de colchón.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3100.06',
            'description' => 'Servicios de apoyo a la fabricación y acabado (tapizado de sillas y sillones, lacado, pintado, barnizado con muñequilla, etcétera) de muebles a cambio de una retribución o por contrato',
            'level' => 'medium',
        ],
        [
            'code' => 'C3211.01',
            'description' => 'Producción de perlas labradas, piedras preciosas y semipreciosas labradas, incluida la producción de piedras de calidad industrial y de piedras preciosas y semipreciosas sintéticas y reconstruidas, talla de diamantes.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3211.02',
            'description' => 'Fabricación de joyas de metales preciosos o de metales comunes chapados con metales preciosos, de piedras preciosas y semipreciosas; y de combinaciones de metales preciosos y piedras preciosas y semipreciosas y otros materiales, incluido la fabricación de correas y cintas para relojes, pulseras y pitilleras de metales preciosos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3211.03',
            'description' => 'Fabricación de artículos de orfebrería elaborados con metales preciosos o metales comunes chapados con metales preciosos=> cuberterías, vajillas y servicios de mesa, artículos de tocador, artículos de escritorio y oficina, artículos de uso religioso, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3211.04',
            'description' => 'Fabricación de artículos de uso técnico y de laboratorio elaborados con metales preciosos (excepto instrumentos y piezas de instrumentos)=> crisoles, espátulas, ánodos de galvanoplastia, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3211.05',
            'description' => 'Fabricación de monedas, incluidas monedas de curso legal, sean o no de metales preciosos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3211.06',
            'description' => 'Servicios de apoyo a la fabricación de joyas y artículos conexos como=> el grabado de objetos personales de metales preciosos y de metales no preciosos, a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3212.01',
            'description' => 'Fabricación de artículos de bisutería=> anillos, brazaletes, collares y artículos de bisuterías similares de metales comunes chapados con metales preciosos, joyas que contienen piedras de imitación, como diamantes u otras gemas de imitación y similares, incluido la fabricación de correas de metal para relojes (excepto las de metales preciosos).',
            'level' => 'medium',
        ],
        [
            'code' => 'C3212.02',
            'description' => 'Servicios de apoyo a la fabricación de bisutería y artículos conexos a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3220.01',
            'description' => 'Fabricación de instrumentos de cuerda, instrumentos de cuerda con teclado, incluidos pianos automáticos, guitarras, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3220.02',
            'description' => 'Fabricación de órganos de tubo y teclado, incluidos armonios e instrumentos de teclado similares con lengüetas metálicas libres, cajas de música, organillos, órganos de vapor, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3220.03',
            'description' => 'Fabricación de instrumentos de viento=> silbatos, cuernos de llamada y otros instrumentos sonoros de boca para llamada, acordeones e instrumentos similares, incluidas armónicas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3220.04',
            'description' => 'Fabricación de instrumentos de percusión=> tambores, xilófonos, castañuelas, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3220.05',
            'description' => 'Fabricación de partes, piezas y accesorios de instrumentos=> metrónomos, diapasones de percusión y de boca, tarjetas, discos y rollos para instrumentos mecánicos automáticos, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3220.06',
            'description' => 'Servicios de apoyo a la fabricación de instrumentos musicales a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3220.09',
            'description' => 'Fabricación de otros instrumentos musicales, instrumentos musicales cuyo sonido se produce electrónicamente.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3230.01',
            'description' => 'Fabricación de artículos y equipo de cualquier material para la práctica de deportes y juegos al aire libre y bajo techo=> balones duros, blandos e inflables, raquetas, bates y mazos, esquíes, fijaciones y bastones de esquí, botas de esquí, tablas de vela y de surf, patines de hielo, patines de ruedas, etcétera, equipo para gimnasio y de atletismo.',
            'level' => 'low',
        ],
        [
            'code' => 'C3230.02',
            'description' => 'Fabricación de artículos para la pesca deportiva, caza, alpinismo=> redes de mano, arcos y ballestas, guantes y tocados de cuero para la práctica de deportes.',
            'level' => 'low',
        ],
        [
            'code' => 'C3230.03',
            'description' => 'Servicios de apoyo a la fabricación de artículos de deporte a cambio de una retribución o por contrato.',
            'level' => 'low',
        ],
        [
            'code' => 'C3240.01',
            'description' => 'Fabricación de muñecos que representan personajes, animales de juguete, muñecas, piezas y accesorios(vestidos) para muñecas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3240.02',
            'description' => 'Fabricación de instrumentos musicales de juguete.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3240.03',
            'description' => 'Fabricación de artículos para ferias de atracciones, juegos de mesa o juegos de salón, juegos accionados con monedas, billares, mesas especiales para juegos de casino, juegos electrónicos, ajedrez, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3240.04',
            'description' => 'Fabricación de juguetes con ruedas utilizables como vehículos, monopatines, incluidos bicicletas y triciclos de plástico.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3240.05',
            'description' => 'Servicios de apoyo a la fabricación de juegos y juguetes a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3240.09',
            'description' => 'Fabricación de otros juegos y juguetes=> armas de juguetes, juguetes para mascotas, modelos a escala reducida y modelos recreativos similares, trenes eléctricos, juegos de construcciones, juegos de tablero, rompecabezas y artículos similares, naipes, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3250.11',
            'description' => 'Fabricación de hornos para laboratorios dentales, aparatos de destilación y centrifugadoras para laboratorio.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3250.12',
            'description' => 'Fabricación de maquinaria de limpieza por ultrasonidos y esterilizadores para laboratorio.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3250.13',
            'description' => 'Fabricación de muebles, instrumentos, y aparatos para medicina, cirugía, odontología y veterinaria, como=> mesas de operaciones, camillas de reconocimiento médico, camas de hospital con dispositivos mecánicos, bisturís, alicates de cirugía, pinzas de cirugía, instrumentos de odontología (incluidos sillones de dentista con equipo odontológico), termómetros de uso médico, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3250.14',
            'description' => 'Fabricación de aparatos ortopédicos y prostéticos, ojos de cristal, dientes postizos, puentes, etcétera, en laboratorios médicos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3250.15',
            'description' => 'Fabricación de aparatos de mecanoterapia, máquinas de masaje; aparatos para pruebas psicológicas, aparatos de ozonoterapia, oxigenoterapia y respiración artificial, aparatos respiratorios terapéuticos y otros aparatos de respiración y máscaras de gas, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3250.21',
            'description' => 'Fabricación de sabanillas, hilos y gasas estériles de uso quirúrgico.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3250.22',
            'description' => 'Fabricación de empastes y cementos dentales (excepto adhesivos para dentaduras), ceras dentales y otras preparaciones de uso odontológico; fabricación de cementos para la reconstrucción de hueso.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3250.23',
            'description' => 'Fabricación de placas y tornillos para fijación de huesos, jeringuillas, agujas, catéteres, cánulas, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3250.24',
            'description' => 'Fabricación de productos oftálmicos, gafas, gafas de sol, lentes de graduación, lentes de contacto, anteojos de protección.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3250.30',
            'description' => 'Servicios de apoyo a la fabricación de instrumentos y materiales médicos y odontológicos a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3290.11',
            'description' => 'Fabricación de sellos para fechar, cerrar o numerar, aparatos manuales para imprimir y estampar en relieve, membretes, aparatos de impresión manual, cintas preparadas para máquinas de escribir y almohadillas entintadas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3290.12',
            'description' => 'Fabricación de plumas y lápices de toda clase, sean o no mecánicos, incluido minas para lápices.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3290.13',
            'description' => 'Fabricación de globos terráqueos y otros instrumentos, aparatos y modelos diseñados para demostraciones.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3290.21',
            'description' => 'Fabricación de botones, broches de presión, corchetes de presión, cierres de cremallera (excepto metálicos).',
            'level' => 'medium',
        ],
        [
            'code' => 'C3290.22',
            'description' => 'Fabricación de encendedores sean o no mecánicos, eléctricos y de otro tipo incluido sus repuestos.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3290.23',
            'description' => 'Fabricación de paraguas, sombrillas, bastones, bastones-asiento.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3290.24',
            'description' => 'Fabricación de artículos de uso personal=> pipas, vaporizadores de perfume, pelucas, barbas y cejas postizas, peines, pasadores para el cabello.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3290.25',
            'description' => 'Fabricación de termos y otros recipientes herméticos para uso personal y doméstico.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3290.31',
            'description' => 'Fabricación de equipo de protección y seguridad=> ropa ignífuga y otras prendas de protección, cinturones de seguridad para instaladores y celadores de líneas telefónicas y de electricidad y otros cinturones de uso ocupacional, salvavidas de corcho, cascos de plástico y otro equipo personal de seguridad de plástico (por ejemplo, cascos para deportes), ropa de protección para bomberos, cascos de metal y otro equipo personal de seguridad de metal, tapones para los oídos y la nariz (por ejemplo, para nadar o para protegerse del ruido), máscaras de gas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3290.32',
            'description' => 'Fabricación de escobas y cepillos, incluidos cepillos que forman parte de máquinas, barredoras, mopas y plumeros mecánicos manuales, brochas, almohadillas y rodillos para pintar, escobillas de goma y otros cepillas, escobas, cepillos de calzado y de ropa, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'C3290.33',
            'description' => 'Fabricación de artículos de materiales animales=> huesos, marfil, carey, plumas, huesos, tripas, vejigas, etcétera, incluido actividades de taxidermia.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3290.34',
            'description' => 'Fabricación de ataúdes y urnas.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3290.35',
            'description' => 'Fabricación de velas, cirios y artículos similares, manufacturas moldeadas de cera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3290.36',
            'description' => 'Fabricación de artículos de broma y artículos de fantasía (piñatas).',
            'level' => 'medium',
        ],
        [
            'code' => 'C3290.39',
            'description' => 'Fabricación de otros artículos diversos=> productos de tagua, artesanías de otros materiales (excepto plástico, porcelana, cerámica y madera), cedazos y cribas manuales; ramilletes y coronas de flores, cestas con arreglos florales; flores, frutas y plantas artificiales; maniquíes de sastre, gelatinas, materias vegetales o minerales, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3290.40',
            'description' => 'Servicios de apoyo a otras industrias manufactureras n.c.p a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3311.01',
            'description' => 'Servicios de reparación de=> tanques, cisternas, depósitos, tambores, contenedores de metal y recipientes de metal, incluido la reparación de la chapa de calderas y radiadores de calefacción central a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3311.02',
            'description' => 'Servicios de reparación y mantenimiento de caños y tuberías a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3311.03',
            'description' => 'Servicios de reparación mediante servicios móviles de soldadura a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3311.04',
            'description' => 'Servicios de reparación y mantenimiento de generadores de vapor de agua y otros vapores, instalaciones auxiliares para generadores de vapor=> condensadores, economizadores, recalentadores, recolectores y acumuladores de vapor, reactores nucleares (excepto separadores de isótopos), partes para calderas marinas o de potencia a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3311.09',
            'description' => 'Servicios de reparación y mantenimiento de otros productos elaborados de metal=> carritos de compras y equipo de manejo de materiales, armas de fuego y municiones (incluida la reparación de escopetas deportivas y de recreo) a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3312.11',
            'description' => 'Servicios de reparación y mantenimiento de maquinaria y tractores de uso agropecuario, forestal y para la explotación maderera a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C3312.12',
            'description' => 'Servicios de reparación y mantenimiento de maquinaria para la minería, la construcción y la extracción de petróleo y gas a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C3312.13',
            'description' => 'Servicios de reparación y mantenimiento de maquinaria para la elaboración de alimentos, bebidas y tabaco a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C3312.14',
            'description' => 'Servicios de reparación y mantenimiento de maquinaria para la producción de textiles, prendas de vestir y artículos de cuero a cambio de una retribución o por contrato.',
            'level' => 'low',
        ],
        [
            'code' => 'C3312.15',
            'description' => 'Servicios de reparación y mantenimiento de maquinaria para la fabricación de papel a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3312.16',
            'description' => 'Servicios de reparación y mantenimiento de hornos para procesos industriales, maquinaria metalúrgica, herramientas y accesorios para cortar y conformar metales a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C3312.17',
            'description' => 'Servicios de reparación y mantenimiento de bombas, equipo de propulsión de fluidos y equipos afines, elementos de transmisión e impulsión a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C3312.18',
            'description' => 'Servicios de reparación de válvulas a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C3312.91',
            'description' => 'Servicios de reparación y mantenimiento de máquinas y herramientas de oficina y contabilidad a cambio de una retribución o por contrato=> máquinas de escribir, fotocopiadoras, básculas, calculadoras, sean o no electrónicas etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'C3312.92',
            'description' => 'Servicios de reparación de maquinaria de uso comercial, máquinas de venta automática, máquinas registradoras, equipo comercial de refrigeración y purificación de aire a cambio de una retribución o por contrato.',
            'level' => 'low',
        ],
        [
            'code' => 'C3312.93',
            'description' => 'Servicios de reparación y mantenimiento de motores distintos de los de vehículos automotores a cambio de una retribución o por contrato=> motores de buques o de locomotoras.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3312.99',
            'description' => 'Servicios de reparación y mantenimiento de otros tipos de maquinaria de uso especial de la división 28 (Fabricación de maquinaria y equipo n.c.p.)=> equipo de manipulación de materiales (equipo de elevación y manipulación, carga y descarga) y otras herramientas de mano motorizadas a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3313.01',
            'description' => 'Servicios de reparación y mantenimiento del equipo de medición, prueba, navegación y control a cambio de una retribución o por contrato=> instrumentos de motores de aeronaves, equipo de medición de emisiones de vehículos automotores, instrumentos meteorológicos, equipo de ensayo e inspección de propiedades físicas, eléctricas y químicas, instrumentos de prospección, instrumentos de detección y vigilancia de radiaciones.',
            'level' => 'low',
        ],
        [
            'code' => 'C3313.02',
            'description' => 'Servicios de reparación y mantenimiento de equipo de irradiación y equipo electrónico de uso médico y terapéutico a cambio de una retribución o por contrato=> equipo de tomografía por resonancia magnética, ultrasonidos de uso médico, marcapasos, aparatos para sordos, electrocardiógrafos, equipo electrónico de endoscopia, aparatos de irradiación.',
            'level' => 'high',
        ],
        [
            'code' => 'C3313.03',
            'description' => 'Servicios de reparación y mantenimiento de instrumentos y equipo óptico de la clase si se utilizan principalmente con fines comerciales, a cambio de una retribución o por contrato como=> binoculares, microscopios (excepto los electrónicos y protónicos), telescopios, prismas y lentes (excepto las oftálmicas), equipo fotográfico.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3314.01',
            'description' => 'Servicios de reparación y mantenimiento de transformadores de fuerza y de distribución, transformadores para usos especiales, motores eléctricos, generadores y motores generadores, convertidores eléctricos como=> rectificadores e inversores a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'C3314.02',
            'description' => 'Servicios de reparación y mantenimiento de dispositivos y aparatos de conmutación, relés y controles industriales, dispositivos de cableado portadores de corriente y dispositivos de cableado no portadores de corriente para circuitos eléctricos a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3314.03',
            'description' => 'Servicios de reparación y mantenimiento de equipo de iluminación (alumbrado) eléctrico a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3314.09',
            'description' => 'Servicios de reparación y mantenimiento de otros equipos eléctricos=> baterías primarias y de almacenamiento, etcétera a cambio de una retribución o por contrato=> multimetros, electrómetros etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3315.01',
            'description' => 'Servicios de reparación y mantenimiento corriente de buques a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3315.02',
            'description' => 'Servicios de reparación y mantenimiento de embarcaciones de recreo a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3315.03',
            'description' => 'Servicios de reparación y mantenimiento de locomotoras y vagones (excepto la reconstrucción o conversión en fábrica) a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3315.04',
            'description' => 'Servicios de reparación y mantenimiento de aeronaves (excepto la conversión, el reacondicionamiento y la reconstrucción en fábrica) a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3315.05',
            'description' => 'Servicios de reparación y mantenimiento de motores de aeronaves a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3315.06',
            'description' => 'Servicios de reparación de vagones y vagonetas de tracción animal a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3319.01',
            'description' => 'Servicios de reparación de redes de pesca, incluido su remiendo, cordajes, aparejos, lonas y lonas impermeables, sacos de almacenamiento de abonos y productos químicos a cambio de una retribución o por contrato.',
            'level' => 'low',
        ],
        [
            'code' => 'C3319.02',
            'description' => 'Servicios de reparación o reacondicionamiento de paletas, toneles, barricas y equipo similar de madera a cambio de una retribución o por contrato.',
            'level' => 'low',
        ],
        [
            'code' => 'C3319.03',
            'description' => 'Servicios de reparación de máquinas tragamonedas y otros juegos accionados con monedas a cambio de una retribución o por contrato.',
            'level' => 'low',
        ],
        [
            'code' => 'C3319.04',
            'description' => 'Servicios de restauración de órganos y otros instrumentos musicales históricos a cambio de una retribución o por contrato.',
            'level' => 'low',
        ],
        [
            'code' => 'C3320.01',
            'description' => 'Servicios de instalación de maquinaria industrial en plantas industriales, equipo de control de procesos industriales, actividades de mecánicos instaladores, montaje de máquinas a cambio de una retribución o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3320.02',
            'description' => 'Servicios de desmantelamiento de maquinaria y equipo en gran escala.',
            'level' => 'medium',
        ],
        [
            'code' => 'C3320.09',
            'description' => 'Servicios de instalación de otros tipos de equipo industrial a cambio de una retribución o por contrato, como=> equipo de comunicaciones, ordenadores centrales y similares, equipo de irradiación, equipo electromédico, eléctrico, etcétera, incluido la instalación de equipo para boleras.',
            'level' => 'high',
        ],
        [
            'code' => 'D3510.01',
            'description' => 'Actividades de operación de instalaciones de generación de energía eléctrica, por diversos medios=> térmica (turbina de gas o diesel), nuclear, hidroeléctrica, solar, mareal y de otros tipos incluso de energía renovable.',
            'level' => 'high',
        ],
        [
            'code' => 'D3510.02',
            'description' => 'Operación de sistemas de transmisión y distribución de energía eléctrica (que constan de postes, medidores y cableado), que transportan la energía eléctrica recibida desde las instalaciones de generación o transmisión hacia el consumidor final.',
            'level' => 'high',
        ],
        [
            'code' => 'D3510.03',
            'description' => 'Actividades de agentes de energía eléctrica que organiza la venta de electricidad vía sistemas de distribución de energía operados por otros. Gestión de intercambiadores eléctricos.',
            'level' => 'medium',
        ],
        [
            'code' => 'D3520.01',
            'description' => 'Producción de gas para su suministro mediante la destilación del carbón a partir de subproductos de la agricultura o a partir de desechos.',
            'level' => 'medium',
        ],
        [
            'code' => 'D3520.02',
            'description' => 'Fabricación de combustibles gaseosos con un valor calorífico específico, mediante la purificación, la mezcla y otros procesos de gases de diversos tipos, incluido el gas natural.',
            'level' => 'medium',
        ],
        [
            'code' => 'D3520.03',
            'description' => 'Actividades de transporte, distribución y suministro de combustibles gaseosos de cualquier tipo por medio de un sistema de tuberías, venta de gas a los usuarios por medio de tuberías, actividades de los agentes o corredores que venden gas a través de sistemas de distribución operados por otros y Actividades de bolsas de productos básicos y mercados de capacidad de transporte para combustibles gaseosos.',
            'level' => 'medium',
        ],
        [
            'code' => 'D3530.01',
            'description' => 'Producción, captación y distribución de vapor y agua caliente para calefacción, para la producción de energía y para otros fines.',
            'level' => 'medium',
        ],
        [
            'code' => 'D3530.02',
            'description' => 'Producción y distribución de aire refrigerado.',
            'level' => 'medium',
        ],
        [
            'code' => 'D3530.03',
            'description' => 'Producción y distribución de agua fría con fines de refrigeración. Incluye la producción de hielo, incluido hielo para la elaboración de productos alimenticios y para otros fines (p. ej., para refrigeración).',
            'level' => 'medium',
        ],
        [
            'code' => 'E3600.01',
            'description' => 'Actividades de captación de agua de=> ríos, lagos, pozos, lluvia etcétera; purificación de agua para su distribución; tratamiento de agua para uso industrial y otros usos; distribución de agua por medio de=> tuberías, camiones (tanqueros) u otros medios, a usuarios residenciales, comerciales, industriales y de otro tipo.',
            'level' => 'medium',
        ],
        [
            'code' => 'E3600.02',
            'description' => 'Desalinización de agua de mar o agua subterránea para producir agua como principal producto de interés.',
            'level' => 'medium',
        ],
        [
            'code' => 'E3600.03',
            'description' => 'Operación de canales de riego.',
            'level' => 'medium',
        ],
        [
            'code' => 'E3700.00',
            'description' => 'Actividades de gestión de sistemas de alcantarillado y de instalaciones de tratamiento de aguas residuales; recolección y transporte de aguas residuales humanas o industriales de uno o diversos usuarios, así como de agua de lluvia, por medio de redes de alcantarillado, colectores, tanques y otros medios de transporte (camiones cisterna de recogida de aguas negras, etcétera); vaciado y limpieza de pozos negros y fosas sépticas, fosos y pozos de alcantarillados; mantenimiento de inodoros de acción química; tratamiento de aguas residuales (incluidas aguas residuales humanas e industriales, agua de piscinas, etcétera) mediante procesos físicos, químicos y biológicos como los de dilución, cribado, filtración, sedimentación, etcétera; mantenimiento y limpieza de cloacas y alcantarillas, incluido el desatasco de cloacas.',
            'level' => 'medium',
        ],
        [
            'code' => 'E3811.00',
            'description' => 'Recolección de desechos sólidos no peligrosos (basura) en una zona delimitada=> residuos de hogares y empresas por medio de contenedores; desechos recuperables mezclados de materiales reciclables; aceites y grasas usados en la cocina; desperdicios colocados en lugares públicos; desechos de actividades provenientes de la construcción y demolición, recolección y remoción de escombros; desechos producidos por fábricas textiles. Incluye la gestión de estaciones de transferencia de desechos no peligrosos.',
            'level' => 'medium',
        ],
        [
            'code' => 'E3812.00',
            'description' => 'Actividades de recolección de desechos peligrosos=> sustancias explosivas, oxidantes, inflamables, tóxicas, irritantes, carcinógenas, corrosivas o infecciosas y otras substancias y preparados nocivos perjudiciales para la salud humana y el medio ambiente como=> aceites usados de buques o garajes, residuos biológicos peligrosos, pilas y baterías usadas; La identificación, tratamiento, embalado y etiquetado de los desechos para su transporte. Se incluyen las siguientes actividades de recolección de desechos peligrosos y gestión de estaciones de expedición de desechos peligrosos.',
            'level' => 'medium',
        ],
        [
            'code' => 'E3821.01',
            'description' => 'Actividades de operación de rellenos sanitarios para la eliminación de desechos no peligrosos; eliminación de desechos no peligrosos mediante combustión o incineración o por otros métodos, con o sin producción resultante de electricidad o vapor, combustibles sustitutivos, biogás, cenizas u otros subproductos para su utilización posterior, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'E3821.02',
            'description' => 'Actividades de tratamiento de desechos orgánicos para su transformación. Incluye la producción de compost con desechos orgánicos.',
            'level' => 'medium',
        ],
        [
            'code' => 'E3822.00',
            'description' => 'Operación de instalaciones para el tratamiento de desechos peligrosos, tratamiento y eliminación de animales tóxicos vivos y muertos y otros desechos contaminados; incineración de desechos peligrosos, remoción de productos usados como refrigeradores, con objeto de eliminar los desechos peligrosos; tratamiento, remoción y almacenamiento de desechos nucleares radiactivos, incluido el tratamiento y eliminación de desechos radiactivos de transición, es decir que se desintegran durante el período de transporte, procedentes de hospitales, encapsulación, preparación y otras formas de tratamiento de desechos nucleares para su almacenamiento.',
            'level' => 'high',
        ],
        [
            'code' => 'E3830.01',
            'description' => 'Actividades de procesamiento de desperdicios y desechos metálicos y no metálicos y de otros artículos para convertirlos en materias primas secundarias, normalmente mediante un proceso de transformación mecánico o químico; Recuperación de materiales de corrientes de desechos=> Separación y clasificación de materiales recuperables de corrientes de desechos no peligrosos (basura); Separación y clasificación en categorías distintas de materiales recuperables mezclados como=> papel, plásticos, latas de bebidas usadas, y metales. Entre los procesos de transformación mecánica o química que se realizan se cuentan los siguientes=> Aplastamiento mecánico de desperdicios metálicos, como=> automóviles usados, lavadoras usadas, bicicletas usadas, etcétera, para su posterior clasificación y separación; Desguace de automóviles, buques, computadoras, aparatos de televisión y otros equipos para la recuperación de materiales; Reducción mecánica de grandes volúmenes de metal, como vagones de ferrocarril; Trituración de desechos de metal, vehículos desechados, etcétera; Otros métodos de tratamiento mecánico, como el corte y el prensado para reducir el volumen.',
            'level' => 'high',
        ],
        [
            'code' => 'E3830.02',
            'description' => 'Recuperación de metales que contienen los desechos de material fotográfico; por ejemplo, solución fijadora, películas o papel fotográfico; Recuperación de productos de caucho, como llantas usadas, para obtener materias primas secundarias; Clasificación y nodulización de plásticos para producir materias primas secundarias para la fabricación de tubos, macetas, bandejas de carga y productos similares; Procesamiento (limpieza, fusión, trituración) de desechos de plástico o caucho para convertirlos en gránulos; Trituración, limpieza y clasificación de desechos de vidrio; Trituración, limpieza y clasificación de otros desechos, como los de demoliciones para obtener materias primas secundarias; Procesamiento de aceites y grasas de cocina y de otros desechos y sustancias residuales de productos alimenticios, bebidas y tabaco para obtener materias primas secundarias.',
            'level' => 'high',
        ],
        [
            'code' => 'E3900.01',
            'description' => 'Descontaminación de suelos y aguas subterráneas en el lugar de contaminación utilizando; por ejemplo, métodos mecánicos, químicos o biológicos.',
            'level' => 'high',
        ],
        [
            'code' => 'E3900.02',
            'description' => 'Actividades de descontaminación de instalaciones o terrenos industriales, incluidos los nucleares; Descontaminación y limpieza de aguas superficiales tras su contaminación accidental; por ejemplo, mediante la recogida de los contaminantes o la aplicación de sustancias químicas; Limpieza de derrames de petróleo y otras formas de contaminación en tierra, aguas superficiales, mares y océanos, incluidas zonas costeras; Eliminación de asbesto, pintura de plomo y otros materiales tóxicos.',
            'level' => 'high',
        ],
        [
            'code' => 'E3900.09',
            'description' => 'Otras actividades especializadas de control de la contaminación, incluido la remoción de minas terrestres y artefactos similares (incluida su detonación).',
            'level' => 'high',
        ],
        [
            'code' => 'F4100.10',
            'description' => 'Construcción de todo tipo de edificios residenciales=> casas familiares individuales, edificios multifamiliares, incluso edificios de alturas elevadas, viviendas para ancianatos, casas para beneficencia, orfanatos, cárceles, cuarteles, conventos, casas religiosas. Incluye remodelación, renovación o rehabilitación de estructuras existentes.',
            'level' => 'high',
        ],
        [
            'code' => 'F4100.20',
            'description' => 'Construcción de todo tipo de edificios no residenciales=> edificios de producción industrial, Ej. Fábricas, talleres, plantas de ensamblaje, hospitales, escuelas, edificios de oficinas, hoteles, almacenes, centros comerciales, bodegas, restaurantes, observatorios, iglesias, museos, aeroportuarios, portuarios y edificios de estaciones de buses, trolebuses, tren, incluso estacionamientos subterráneos, de instalaciones deportivas interiores techadas etcétera. Incluye remodelación, renovación o rehabilitación de estructuras existentes',
            'level' => 'high',
        ],
        [
            'code' => 'F4100.30',
            'description' => 'Montaje y levantamiento de construcciones prefabricadas en el lugar.',
            'level' => 'high',
        ],
        [
            'code' => 'F4210.11',
            'description' => 'Construcción de carreteras, calles, carreteras, y otras vías para vehículos o peatones.',
            'level' => 'high',
        ],
        [
            'code' => 'F4210.12',
            'description' => 'Obras de superficie en calles, carreteras, autopistas, puentes o túneles, asfaltado de carretera, pintura y otros tipos de marcado de carretera, instalación de barreras de emergencia, señales de tráfico y elementos similares. Incluye la construcción de pistas para aeropuertos.',
            'level' => 'high',
        ],
        [
            'code' => 'F4210.20',
            'description' => 'Construcción de líneas de ferrocarril y de metro.',
            'level' => 'high',
        ],
        [
            'code' => 'F4210.31',
            'description' => 'Construcción de túneles.',
            'level' => 'high',
        ],
        [
            'code' => 'F4210.32',
            'description' => 'Construcción de puentes y viaductos.',
            'level' => 'high',
        ],
        [
            'code' => 'F4220.11',
            'description' => 'Construcción de obras de ingeniería civil relacionadas con=> tuberías urbanas, construcción de conductos principales y acometidas de redes de distribución de agua sistemas de riego (canales), estaciones de bombeo, depósitos.',
            'level' => 'high',
        ],
        [
            'code' => 'F4220.12',
            'description' => 'Construcción de sistemas de alcantarillado, incluida su reparación, instalaciones de evacuación de aguas residuales y perforación de pozos de agua.',
            'level' => 'high',
        ],
        [
            'code' => 'F4220.20',
            'description' => 'Construcción de obras civiles para=> centrales eléctricas, líneas de transmisión de energía eléctrica y comunicaciones; obras auxiliares en zonas urbanas.',
            'level' => 'high',
        ],
        [
            'code' => 'F4290.11',
            'description' => 'Construcción de vías de navegación, obras portuarias y fluviales, puertos deportivos, esclusas, presas y diques.',
            'level' => 'high',
        ],
        [
            'code' => 'F4290.12',
            'description' => 'Dragado de vías de navegación.',
            'level' => 'medium',
        ],
        [
            'code' => 'F4290.91',
            'description' => 'Construcción de instalaciones industriales refinerías, fábricas de productos químicos.',
            'level' => 'high',
        ],
        [
            'code' => 'F4290.92',
            'description' => 'Obras de construcciones distintas de las de edificios por ejemplo=> instalaciones deportivas al aire libre.',
            'level' => 'high',
        ],
        [
            'code' => 'F4290.93',
            'description' => 'Subdivisión (Lotización) de tierras con mejora (por ejemplo, construcción de carreteras, infraestructura de suministro público, etcétera).',
            'level' => 'high',
        ],
        [
            'code' => 'F4311.00',
            'description' => 'Demolición o derribo de edificios y otras estructuras.',
            'level' => 'high',
        ],
        [
            'code' => 'F4312.01',
            'description' => 'Limpieza de terrenos de construcción.',
            'level' => 'high',
        ],
        [
            'code' => 'F4312.02',
            'description' => 'Movimiento de tierras=> excavación, nivelación y ordenación de terrenos de construcción, excavación de zanjas, remoción de piedras, voladura, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'F4312.03',
            'description' => 'Perforaciones de prueba, sondeos de exploración y recogida de muestras de sondeo para actividades de construcción y para fines geofísicos, geológicos o similares.',
            'level' => 'high',
        ],
        [
            'code' => 'F4312.04',
            'description' => 'Construcción de drenaje de terrenos de construcción incluido tierras agrícolas o forestales.',
            'level' => 'high',
        ],
        [
            'code' => 'F4312.05',
            'description' => 'Preparación de terrenos para actividades de explotación de minas y canteras=> remoción del estéril (destape de minas) y actividades de otro tipo para preparar y aprovechar terrenos y propiedades mineros, excepto yacimientos de petróleo y gas.',
            'level' => 'high',
        ],
        [
            'code' => 'F4321.01',
            'description' => 'Instalación de accesorios eléctricos, líneas de telecomunicaciones, redes informáticas y líneas de televisión por cable, incluidas líneas de fibra óptica, antenas parabólicas. Incluye conexión de aparatos eléctricos, equipo doméstico y sistemas de calefacción radiante.',
            'level' => 'medium',
        ],
        [
            'code' => 'F4321.02',
            'description' => 'Instalación de sistemas de iluminación, sistemas de alarma contra incendios, sistemas de alarma contra robos.',
            'level' => 'medium',
        ],
        [
            'code' => 'F4321.03',
            'description' => 'Instalación de sistemas de alumbrado y señales eléctricas de calles, alumbrado de pistas de aeropuertos.',
            'level' => 'medium',
        ],
        [
            'code' => 'F4322.01',
            'description' => 'Instalación en edificios y otros proyectos de construcción de=> sistemas de calefacción (eléctricos, de gas y de gasóleo), calderas, torres de refrigeración, colectores de energía solar no eléctricos, equipo de fontanería y sanitario, equipo y conductos de ventilación, refrigeración o aire acondicionado, conducciones de gas, tuberías de vapor, sistemas de aspersores contra incendios, sistemas de riego por aspersión para el césped.',
            'level' => 'high',
        ],
        [
            'code' => 'F4322.02',
            'description' => 'Instalación de canalización (conductos).',
            'level' => 'high',
        ],
        [
            'code' => 'F4329.01',
            'description' => 'Instalación, reparación y el mantenimiento de ascensores así como escaleras mecánicas en edificios u otros proyectos dedicados a la construcción de puertas automáticas y giratorias en edificios u otros proyectos de construcción.',
            'level' => 'high',
        ],
        [
            'code' => 'F4329.02',
            'description' => 'Instalación, reparación y el mantenimiento de pararrayos en edificios u otros proyectos de construcción.',
            'level' => 'high',
        ],
        [
            'code' => 'F4329.03',
            'description' => 'Sistemas de limpieza por aspiración en edificios u otros proyectos de construcción.',
            'level' => 'high',
        ],
        [
            'code' => 'F4329.04',
            'description' => 'Aislamiento térmico, acústico o contra las vibraciones en edificios u otros proyectos de construcción.',
            'level' => 'high',
        ],
        [
            'code' => 'F4330.10',
            'description' => 'Aplicación en edificios y otros proyectos de construcción de yeso y estuco para interiores y exteriores, con los materiales de enlistonar correspondientes.',
            'level' => 'high',
        ],
        [
            'code' => 'F4330.20',
            'description' => 'Instalación de puertas (excepto automáticas y giratorias), ventanas, marcos de puertas y ventanas. Instalación de accesorios de cocinas, armarios empotrados, escaleras, mobiliario de tiendas y similares de madera u otros materiales, Acabados interiores como techos, cubierta de madera de paredes, mamparas móviles, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'F4330.31',
            'description' => 'Instalación de cerámicas baldosas, losas y losetas de cerámica, hormigón o piedra tallada para paredes y pisos, accesorios de cerámica para cocinas, parqué y otros revestimientos de madera para pisos, alfombras y cubrimientos de linóleo para pisos, incluidos los de caucho o plástico.',
            'level' => 'high',
        ],
        [
            'code' => 'F4330.32',
            'description' => 'Instalación de papel tapiz.',
            'level' => 'high',
        ],
        [
            'code' => 'F4330.33',
            'description' => 'Instalación de parquet y otros revestimientos de madera para paredes y pisos en edificios u otros proyectos de construcción.',
            'level' => 'high',
        ],
        [
            'code' => 'F4330.41',
            'description' => 'Pintura interior o exterior de edificios. Incluye pintura de obras de ingeniería civil.',
            'level' => 'high',
        ],
        [
            'code' => 'F4330.42',
            'description' => 'Instalación de vidrios, espejos, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'F4330.91',
            'description' => 'Limpieza de edificios nuevos después de su construcción.',
            'level' => 'high',
        ],
        [
            'code' => 'F4330.99',
            'description' => 'Otras actividades de terminación de edificios n.c.p.=> Instalación de interiores de tiendas, casas móviles, embarcaciones, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'F4390.11',
            'description' => 'Actividades de construcción especializadas en un aspecto común a diferentes tipos de estructuras y que requieren conocimientos o equipo especializados=> cimentación, incluida la hincadura de pilotes, instalación y desmontaje de andamios y plataformas de trabajo, colocación de mampuestos de ladrillo y de piedra.',
            'level' => 'high',
        ],
        [
            'code' => 'F4390.12',
            'description' => 'Trabajos de tratamiento de la humedad de edificios y de impermeabilización.',
            'level' => 'high',
        ],
        [
            'code' => 'F4390.13',
            'description' => 'Montaje de piezas erección de elementos de acero no fabricados por la propia unidad constructora, curvado de acero.',
            'level' => 'high',
        ],
        [
            'code' => 'F4390.14',
            'description' => 'Construcción de chimeneas y hornos industriales.',
            'level' => 'high',
        ],
        [
            'code' => 'F4390.15',
            'description' => 'Trabajos en lugares de difícil acceso que requieren la utilización de técnicas de escalada y del equipo correspondiente, como, por ejemplo, los trabajos a gran altura en estructuras elevadas.',
            'level' => 'high',
        ],
        [
            'code' => 'F4390.16',
            'description' => 'Construcción de cubierta de techos y tejados de edificios residenciales.',
            'level' => 'high',
        ],
        [
            'code' => 'F4390.20',
            'description' => 'Alquiler de grúas con operador y otros equipos de construcción que no pueden asignarse a un tipo de construcción específico con operario, alquiler de andamios y plataformas.',
            'level' => 'high',
        ],
        [
            'code' => 'F4390.91',
            'description' => 'Construcción de piscinas al aire libre.',
            'level' => 'high',
        ],
        [
            'code' => 'F4390.92',
            'description' => 'Limpieza de exteriores de edificios con vapor, con chorro de arena y con otros medios.',
            'level' => 'high',
        ],
        [
            'code' => 'F4390.93',
            'description' => 'Construcción de obras subterráneas=> profundización (perforación) de pozos.',
            'level' => 'high',
        ],
        [
            'code' => 'G4510.01',
            'description' => 'Venta de vehículos nuevos y usados=> vehículos de pasajeros, incluidos vehículos especializados como=> ambulancias y minibuses, camiones, remolques y semirremolques, vehículos de acampada como=> caravanas y autocaravanas, vehículos para todo terreno (jeeps, etcétera), incluido la venta al por mayor y al por menor por comisionistas.',
            'level' => 'low',
        ],
        [
            'code' => 'G4510.02',
            'description' => 'Subasta de automóviles.',
            'level' => 'low',
        ],
        [
            'code' => 'G4520.01',
            'description' => 'Mantenimiento y reparación de vehículos automotores=> reparación mecánica, eléctrica, sistemas de inyección eléctricos, carrocerías, partes de vehículos automotores=> parabrisas, ventanas, asientos y tapicerías. Incluye el tratamiento anti óxido, pinturas a pistola o brocha a los vehículos y automotores, la instalación de partes, piezas y accesorios que no se realiza como parte del proceso de fabricación (parlantes, radios, alarmas, etcétera).',
            'level' => 'medium',
        ],
        [
            'code' => 'G4520.02',
            'description' => 'Mantenimiento y reparación, instalación, cambio de neumáticos (llantas) y tubos (Vulcanizadoras).',
            'level' => 'medium',
        ],
        [
            'code' => 'G4520.03',
            'description' => 'Servicios de lavado, engrasado, pulverizado, encerado, cambios de aceite, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'G4530.00',
            'description' => 'Venta de todo tipo de partes, componentes, suministros, herramientas y accesorios para vehículos automotores como=> neumáticos (llantas), cámaras de aire para neumáticos (tubos). Incluye bujías, baterías, equipo de iluminación partes y piezas eléctricas.',
            'level' => 'medium',
        ],
        [
            'code' => 'G4540.01',
            'description' => 'Venta de motocicletas, incluso ciclomotores (velomotores), tricimotos.',
            'level' => 'low',
        ],
        [
            'code' => 'G4540.02',
            'description' => 'Venta de partes, piezas y accesorios para motocicletas (incluso por comisionistas y compañías de venta por correo).',
            'level' => 'low',
        ],
        [
            'code' => 'G4540.03',
            'description' => 'Actividades de mantenimiento y reparación de motocicletas.',
            'level' => 'low',
        ],
        [
            'code' => 'G4610.01',
            'description' => 'Intermediarios del comercio de materias primas agrarias, animales vivos, materias primas textiles y productos semielaborados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4610.02',
            'description' => 'Intermediarios del comercio de combustibles, minerales, metales, y productos químicos industriales, incluidos abonos.',
            'level' => 'high',
        ],
        [
            'code' => 'G4610.03',
            'description' => 'Intermediarios del comercio de la madera y materiales de construcción.',
            'level' => 'medium',
        ],
        [
            'code' => 'G4610.04',
            'description' => 'Intermediarios del comercio de maquinaria, equipo industrial, embarcaciones y aeronaves.',
            'level' => 'medium',
        ],
        [
            'code' => 'G4610.05',
            'description' => 'Intermediarios del comercio de muebles, artículos para el hogar y ferretería.',
            'level' => 'medium',
        ],
        [
            'code' => 'G4610.06',
            'description' => 'Intermediarios del comercio de textiles, prendas de vestir, peletería, calzado y artículos de cuero.',
            'level' => 'medium',
        ],
        [
            'code' => 'G4610.07',
            'description' => 'Intermediarios del comercio de productos alimenticios, bebidas y tabaco.',
            'level' => 'medium',
        ],
        [
            'code' => 'G4610.08',
            'description' => 'Actividades de casas de subastas al por mayor.',
            'level' => 'low',
        ],
        [
            'code' => 'G4610.09',
            'description' => 'Intermediarios del comercio de productos diversos.',
            'level' => 'medium',
        ],
        [
            'code' => 'G4620.11',
            'description' => 'Venta al por mayor de cereales (granos) y semillas.',
            'level' => 'low',
        ],
        [
            'code' => 'G4620.12',
            'description' => 'Venta al por mayor de frutos y semillas oleaginosas.',
            'level' => 'low',
        ],
        [
            'code' => 'G4620.13',
            'description' => 'Venta al por mayor de tabaco sin elaborar.',
            'level' => 'low',
        ],
        [
            'code' => 'G4620.14',
            'description' => 'Venta al por mayor de desechos, residuos y productos derivados usados para alimentar animales (forraje), incluye materias primas agrarias.',
            'level' => 'low',
        ],
        [
            'code' => 'G4620.15',
            'description' => 'Venta al por mayor de flores y plantas.',
            'level' => 'low',
        ],
        [
            'code' => 'G4620.19',
            'description' => 'Venta al por mayor de otras materias primas agropecuarias.',
            'level' => 'low',
        ],
        [
            'code' => 'G4620.21',
            'description' => 'Venta al por mayor de animales vivos.',
            'level' => 'low',
        ],
        [
            'code' => 'G4620.22',
            'description' => 'Venta al por mayor de cueros, pieles y otros productos animales.',
            'level' => 'low',
        ],
        [
            'code' => 'G4630.11',
            'description' => 'Venta al por mayor de banano y plátano.',
            'level' => 'low',
        ],
        [
            'code' => 'G4630.12',
            'description' => 'Venta al por mayor de frutas, legumbres y hortalizas.',
            'level' => 'low',
        ],
        [
            'code' => 'G4630.13',
            'description' => 'Venta al por mayor de papa y tubérculos.',
            'level' => 'low',
        ],
        [
            'code' => 'G4630.14',
            'description' => 'Venta al por mayor de café, cacao, te y especias.',
            'level' => 'low',
        ],
        [
            'code' => 'G4630.21',
            'description' => 'Venta al por mayor de productos lácteos, incluido helados, bolos, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'G4630.22',
            'description' => 'Venta al por mayor de huevos y productos a base de huevos.',
            'level' => 'low',
        ],
        [
            'code' => 'G4630.23',
            'description' => 'Venta al por mayor de aceites y grasas comestibles de origen animal o vegetal.',
            'level' => 'low',
        ],
        [
            'code' => 'G4630.31',
            'description' => 'Venta al por mayor de carne y productos cárnicos (incluidas las aves de corral).',
            'level' => 'low',
        ],
        [
            'code' => 'G4630.32',
            'description' => 'Venta al por mayor de camarón y langostinos.',
            'level' => 'low',
        ],
        [
            'code' => 'G4630.33',
            'description' => 'Venta al por mayor de pescado, crustáceos, moluscos y productos de la pesca.',
            'level' => 'low',
        ],
        [
            'code' => 'G4630.91',
            'description' => 'Venta al por mayor de arroz.',
            'level' => 'low',
        ],
        [
            'code' => 'G4630.92',
            'description' => 'Venta al por mayor de azúcar, chocolate y productos de confitería.',
            'level' => 'low',
        ],
        [
            'code' => 'G4630.93',
            'description' => 'Venta al por mayor de productos de panadería y repostería.',
            'level' => 'low',
        ],
        [
            'code' => 'G4630.94',
            'description' => 'Venta al por mayor de bebidas no alcohólicas (jugos, gaseosas, agua mineral, etcétera).',
            'level' => 'low',
        ],
        [
            'code' => 'G4630.95',
            'description' => 'Venta al por mayor de bebidas alcohólicas, incluso el envasado de vino a granel sin transformación.',
            'level' => 'low',
        ],
        [
            'code' => 'G4630.96',
            'description' => 'Venta al por mayor de productos de tabaco.',
            'level' => 'low',
        ],
        [
            'code' => 'G4630.97',
            'description' => 'Venta al por mayor de alimento para mascotas (animales domésticos).',
            'level' => 'low',
        ],
        [
            'code' => 'G4630.99',
            'description' => 'Venta al por mayor de otros productos comestibles (enlatados y conservas).',
            'level' => 'low',
        ],
        [
            'code' => 'G4641.11',
            'description' => 'Venta al por mayor de hilos (hilados), lanas y tejidos (telas).',
            'level' => 'low',
        ],
        [
            'code' => 'G4641.12',
            'description' => 'Venta al por mayor de lencería para el hogar cortinas, visillos, mantelería, toallas y diversos artículos domésticos.',
            'level' => 'low',
        ],
        [
            'code' => 'G4641.13',
            'description' => 'Venta al por mayor de artículos de mercerías=> agujas, hilo de costura, botones, cierres, cintas, encajes, alfileres, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'G4641.21',
            'description' => 'Venta al por mayor de prendas de vestir, incluidas prendas (ropa) deportivas.',
            'level' => 'low',
        ],
        [
            'code' => 'G4641.22',
            'description' => 'Venta al por mayor de accesorios de vestir guantes, corbatas, incluye paraguas y tirantes.',
            'level' => 'low',
        ],
        [
            'code' => 'G4641.31',
            'description' => 'Venta al por mayor de calzado.',
            'level' => 'low',
        ],
        [
            'code' => 'G4641.32',
            'description' => 'Venta al por mayor de artículos de cuero (con pelo natural).',
            'level' => 'low',
        ],
        [
            'code' => 'G4649.11',
            'description' => 'Venta al por mayor de electrodomésticos y aparatos de uso doméstico=> refrigeradoras, cocinas, lavadoras, etcétera. Incluye equipos de televisión, estéreos (equipos de sonido), equipos de grabación y reproductores de CD y DVD, cintas de audio y video CDs, DVD grabadas.',
            'level' => 'low',
        ],
        [
            'code' => 'G4649.12',
            'description' => 'Venta al por mayor de artículos y accesorios fotográficos y ópticos (lentes de sol, binoculares, lupas).',
            'level' => 'low',
        ],
        [
            'code' => 'G4649.13',
            'description' => 'Venta al por mayor de muebles de hogar, colchones y alfombras.',
            'level' => 'low',
        ],
        [
            'code' => 'G4649.14',
            'description' => 'Venta al por mayor de equipos de iluminación.',
            'level' => 'low',
        ],
        [
            'code' => 'G4649.21',
            'description' => 'Venta al por mayor de productos de perfumería, cosméticos (productos de belleza) artículos de uso personal (jabones).',
            'level' => 'low',
        ],
        [
            'code' => 'G4649.22',
            'description' => 'Venta al por mayor de productos farmacéuticos, incluso veterinarios.',
            'level' => 'low',
        ],
        [
            'code' => 'G4649.23',
            'description' => 'Venta al por mayor de productos medicinales (naturistas).',
            'level' => 'low',
        ],
        [
            'code' => 'G4649.24',
            'description' => 'Venta al por mayor de instrumentos, materiales médicos y quirúrgicos, dentales y artículos ortopédicos.',
            'level' => 'low',
        ],
        [
            'code' => 'G4649.91',
            'description' => 'Venta al por mayor de artículos de madera, corcho, mimbre etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'G4649.92',
            'description' => 'Venta al por mayor de bicicletas, partes y accesorios incluyen los artículos deportivos.',
            'level' => 'low',
        ],
        [
            'code' => 'G4649.93',
            'description' => 'Venta al por mayor de material de papelería, libros, revistas, periódicos.',
            'level' => 'low',
        ],
        [
            'code' => 'G4649.94',
            'description' => 'Venta al por mayor de artículos de cuero y accesorios de viaje.',
            'level' => 'low',
        ],
        [
            'code' => 'G4649.95',
            'description' => 'Venta al por mayor de artículos de porcelana, cristalería, plástico, etcétera; artículos ornamentales; cubertería (cubiertos), vajilla, incluido desechables.',
            'level' => 'low',
        ],
        [
            'code' => 'G4649.96',
            'description' => 'Venta al por mayor de artículos de limpieza.',
            'level' => 'low',
        ],
        [
            'code' => 'G4649.97',
            'description' => 'Venta al por mayor de relojes, joyas y bisutería.',
            'level' => 'low',
        ],
        [
            'code' => 'G4649.99',
            'description' => 'Venta al por mayor de otros artículos de uso domestico=> juegos y juguetes, instrumentos musicales y partituras, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'G4651.01',
            'description' => 'Venta al por mayor de computadoras y equipo periférico.',
            'level' => 'low',
        ],
        [
            'code' => 'G4651.02',
            'description' => 'Venta al por mayor de programas informáticos (software).',
            'level' => 'low',
        ],
        [
            'code' => 'G4652.01',
            'description' => 'Venta al por mayor de válvulas y tubos electrónicos, dispositivos de semiconductores, microchips, circuitos integrados y de impresión.',
            'level' => 'low',
        ],
        [
            'code' => 'G4652.02',
            'description' => 'Venta al por mayor de teléfonos y equipos de comunicación.',
            'level' => 'low',
        ],
        [
            'code' => 'G4652.03',
            'description' => 'Venta al por mayor de cintas y disquetes y discos magnéticos y ópticos (CD, DVD) de sonido y de vídeo no grabadas.',
            'level' => 'low',
        ],
        [
            'code' => 'G4653.01',
            'description' => 'Venta al por mayor de maquinaria y equipo agropecuarios=> arados, esparcidoras de estiércol, sembradoras, cosechadoras, trilladoras, máquinas de ordeñar, máquinas utilizadas en la avicultura y la apicultura, tractores utilizados en actividades agropecuarias y silvícolas, segadoras de césped de todo tipo, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'G4659.11',
            'description' => 'Venta al por mayor de maquinaria y equipo de oficina=> calculadora, máquinas de escribir, contadora de monedas, excepto computadoras y equipo informático.',
            'level' => 'low',
        ],
        [
            'code' => 'G4659.12',
            'description' => 'Venta al por mayor de muebles de oficina.',
            'level' => 'low',
        ],
        [
            'code' => 'G4659.21',
            'description' => 'Venta al por mayor de máquinas herramienta controladas o no por computadora para la industria textil, cuero y otras industrias, incluye la venta al por mayor de sus partes y piezas.',
            'level' => 'low',
        ],
        [
            'code' => 'G4659.22',
            'description' => 'Venta al por mayor de maquinaría para la minería y construcción; incluye partes y piezas.',
            'level' => 'low',
        ],
        [
            'code' => 'G4659.23',
            'description' => 'Venta al por mayor de máquinas y herramientas para la metalurgia; incluye partes y piezas.',
            'level' => 'low',
        ],
        [
            'code' => 'G4659.24',
            'description' => 'Venta al por mayor de máquinas para la elaboración de alimentos, bebidas y tabaco (incluso para hoteles y restaurantes), máquinas para lavar, secar y sellar botellas, incluye la venta al por mayor de sus partes y piezas.',
            'level' => 'low',
        ],
        [
            'code' => 'G4659.91',
            'description' => 'Venta al por mayor de equipo de transporte (lanchas, aviones, trenes, etcétera.) excepto vehículos motorizados, motocicletas y bicicletas.',
            'level' => 'low',
        ],
        [
            'code' => 'G4659.92',
            'description' => 'Venta al por mayor de instrumentos y equipo de medición y precisión.',
            'level' => 'low',
        ],
        [
            'code' => 'G4659.93',
            'description' => 'Venta al por mayor de equipo eléctrico como=> motores eléctricos, transformadores, (incluye bombas para líquidos), cables, conmutadores y de otros tipos de equipo de instalación de uso industrial.',
            'level' => 'low',
        ],
        [
            'code' => 'G4659.94',
            'description' => 'Venta al por mayor de equipo médico y equipo de laboratorio.',
            'level' => 'low',
        ],
        [
            'code' => 'G4659.95',
            'description' => 'Venta al por mayor de equipo de seguridad.',
            'level' => 'low',
        ],
        [
            'code' => 'G4659.99',
            'description' => 'Venta al por mayor de máquinas herramienta de cualquier tipo y para cualquier material=> madera, acero, etcétera. La venta de otros tipos de maquinaria n.c.p. para uso en la industria, el comercio, la navegación y otros servicios. Incluye venta al por mayor de robots para cadenas de montaje, armas, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'G4661.01',
            'description' => 'Venta al por mayor de petróleo crudo.',
            'level' => 'medium',
        ],
        [
            'code' => 'G4661.02',
            'description' => 'Venta al por mayor de combustibles sólidos=> carbón, carbón vegetal, leña madera turba.',
            'level' => 'medium',
        ],
        [
            'code' => 'G4661.03',
            'description' => 'Venta al por mayor de combustibles líquidos nafta, gasolina, biocombustible incluye grasas, lubricantes y aceites, gases licuados de petróleo, butano y propano.',
            'level' => 'medium',
        ],
        [
            'code' => 'G4662.01',
            'description' => 'Venta al por mayor de minerales metalíferos ferrosos y no ferrosos; incluye la venta al por mayor de metales ferrosos y no ferrosos en formas primarias.',
            'level' => 'low',
        ],
        [
            'code' => 'G4662.02',
            'description' => 'Venta al por mayor de productos semiacabados de metales ferrosos y no ferrosos n.c.p.',
            'level' => 'low',
        ],
        [
            'code' => 'G4662.03',
            'description' => 'Venta al por mayor de oro y otros metales preciosos.',
            'level' => 'low',
        ],
        [
            'code' => 'G4663.11',
            'description' => 'Venta al por mayor de madera no trabajada (en bruto) y productos de la elaboración primaria de madera=> tableros aglomerados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4663.12',
            'description' => 'Venta al por mayor de pintura, barnices y lacas.',
            'level' => 'low',
        ],
        [
            'code' => 'G4663.13',
            'description' => 'Venta al por mayor de materiales de construcción=> piedra, arena, grava, cemento, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'G4663.14',
            'description' => 'Venta al por mayor de papel tapiz y revestimiento de pisos (baldosas, linóleo).',
            'level' => 'low',
        ],
        [
            'code' => 'G4663.15',
            'description' => 'Venta al por mayor de vidrio plano y espejos.',
            'level' => 'medium',
        ],
        [
            'code' => 'G4663.21',
            'description' => 'Venta al por mayor de artículos de ferreterías y cerraduras=> martillos, sierras, destornilladores, y otras herramientas de mano, accesorios y dispositivos; cajas fuertes, extintores.',
            'level' => 'low',
        ],
        [
            'code' => 'G4663.22',
            'description' => 'Venta al por mayor de aparatos, accesorios de calefacción y calentadores de agua.',
            'level' => 'low',
        ],
        [
            'code' => 'G4663.23',
            'description' => 'Venta al por mayor de equipo sanitario y fontanería (bañeras, inodoros, lavabos tocadores y otra porcelana sanitaria) incluye artículos para la instalación sanitaria=> tubos, tuberías, accesorios, grifos, derivaciones, conexiones, tuberías de caucho, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'G4669.11',
            'description' => 'Venta al por mayor de productos químicos industriales=> anilina, tinta de impresión, aceites esenciales, gases industriales (oxígeno), pegamento químico, colorantes, resina sintética, metanol, parafina, aromatizantes y potenciadores del sabor, soda cáustica, sal industrial, ácidos y sulfuros, derivados de almidón, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'G4669.12',
            'description' => 'Venta al por mayor de abonos y productos químicos de uso agrícola.',
            'level' => 'medium',
        ],
        [
            'code' => 'G4669.21',
            'description' => 'Venta al por mayor de materiales plásticos en formas primarias, caucho, fibras textiles, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'G4669.22',
            'description' => 'Venta al por mayor del papel y cartón.',
            'level' => 'low',
        ],
        [
            'code' => 'G4669.23',
            'description' => 'Venta al por mayor de piedras preciosas, productos abrasivos y otros minerales.',
            'level' => 'low',
        ],
        [
            'code' => 'G4669.24',
            'description' => 'Venta al por mayor de otros productos semielaborados o de consumo intermedios, n.c.p.',
            'level' => 'low',
        ],
        [
            'code' => 'G4669.30',
            'description' => 'Venta al por mayor de desperdicios y desechos, chatarra metálica y de materiales para el reciclado, incluido la recolección, clasificación, separación y el desguace de productos usados, como=> automóviles, ordenadores, aparatos de televisión y otros tipos de equipo, para obtener partes y piezas reutilizables. El embalaje y reembalaje, almacenamiento y entrega, aunque sin un proceso de transformación real. Además, los materiales comprados y vendidos tienen un valor remanente.',
            'level' => 'medium',
        ],
        [
            'code' => 'G4669.40',
            'description' => 'Venta al por mayor de otros productos metálicos elaborados, (excepto maquinaria y equipo), excepto los prestados a comisión o por contrato.',
            'level' => 'medium',
        ],
        [
            'code' => 'G4690.00',
            'description' => 'Venta al por mayor de diversos productos sin especialización.',
            'level' => 'low',
        ],
        [
            'code' => 'G4711.01',
            'description' => 'Venta al por menor de gran variedad de productos en tiendas, entre los que predominan, los productos alimenticios, las bebidas o el tabaco, como productos de primera necesidad, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'G4711.02',
            'description' => 'Venta al por menor de gran variedad de productos en supermercados, entre los que predominan, los productos alimenticios, las bebidas o el tabaco, como productos de primera necesidad, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'G4719.00',
            'description' => 'Venta al por menor de gran variedad de productos entre los que no predominan los productos alimenticios, las bebidas o el tabaco, actividades de venta de=> prendas de vestir, muebles, aparatos, artículos de ferretería, cosméticos, artículos de joyería y bisutería, juguetes, artículos de deporte, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'G4721.01',
            'description' => 'Venta al por menor de frutas, legumbres y hortalizas frescas o en conserva en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4721.02',
            'description' => 'Venta al por menor de lácteos en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4721.03',
            'description' => 'Venta al por menor de huevos en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4721.04',
            'description' => 'Venta al por menor de pescado, crustáceos, moluscos y productos de la pesca en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4721.05',
            'description' => 'Venta al por menor de productos de panadería, confitería y repostería en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4721.06',
            'description' => 'Venta al por menor de carne y productos cárnicos (incluidos los de aves de corral) en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4721.09',
            'description' => 'Venta al por menor de otros productos alimenticios en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4722.01',
            'description' => 'Venta al por menor de bebidas no alcohólicas (no destinadas al consumo en el lugar de venta) en establecimientos especializados, bolos, helados, hielo, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'G4722.02',
            'description' => 'Venta al por menor de bebidas alcohólicas (no destinadas al consumo en el lugar de venta) en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4723.00',
            'description' => 'Venta al por menor de tabaco y productos de tabaco en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4730.01',
            'description' => 'Venta al por menor de combustibles para vehículos automotores y motocicletas en establecimientos especializados.',
            'level' => 'medium',
        ],
        [
            'code' => 'G4730.02',
            'description' => 'Venta al por menor de productos lubricantes y refrigerantes para vehículos automotores en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4741.11',
            'description' => 'Venta al por menor de computadoras y equipo periférico computacional en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4741.12',
            'description' => 'Venta al por menor de programas informáticos no personalizados, incluidos videojuegos, incluye consolas de videojuegos en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4741.13',
            'description' => 'Venta al por menor de equipos de telecomunicaciones=> celulares, tubos electrónicos, etcétera. Incluye partes y piezas en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4742.00',
            'description' => 'Venta al por menor de equipos de=> radio, televisión y estereofónicos, reproductores y grabadores de CD y DVD en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4751.01',
            'description' => 'Venta al por menor de telas, lanas y otros hilados para tejer, artículos de mercería (agujas e hilo de coser) en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4751.02',
            'description' => 'Venta al por menor de artículos textiles=> sábanas, toallas, juegos de mesa y otros artículos textiles; materiales básicos para hacer alfombras, tapices o bordados en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4752.01',
            'description' => 'Venta al por menor de artículos de ferretería=> martillos, sierras, destornilladores y pequeñas herramientas en general, equipo y materiales de prefabricados para armado casero (equipo de bricolaje); alambres y cables eléctricos, cerraduras, montajes y adornos, extintores, segadoras de césped de cualquier tipo, etcétera en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4752.02',
            'description' => 'Venta al por menor de pinturas, barnices y lacas en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4752.03',
            'description' => 'Venta al por menor de vidrio plano y espejos en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4752.04',
            'description' => 'Venta al por menor de materiales de construcción como=> ladrillos, ripio, cemento, madera, etcétera en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4752.05',
            'description' => 'Venta al por menor de equipo sanitario y material de fontanería=> cañerías, conexiones, tuberías de caucho, accesorios, grifos y material de calefacción y calefones en establecimientos especializados.',
            'level' => 'medium',
        ],
        [
            'code' => 'G4752.09',
            'description' => 'Venta al por menor especializada de otros artículos de ferretería=> saunas (baños de calor seco y vapor), artículos de plástico y de caucho, etcétera en establecimientos especializados.',
            'level' => 'medium',
        ],
        [
            'code' => 'G4753.01',
            'description' => 'Venta al por menor de alfombras, tapices, moquetas, cortinas, visillos y tapetes en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4753.02',
            'description' => 'Venta al por menor de papel tapiz y revestimientos de pisos en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4759.01',
            'description' => 'Venta al por menor de muebles de uso doméstico, colchones y somieres en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4759.02',
            'description' => 'Venta al por menor de artículos de iluminación en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4759.03',
            'description' => 'Venta al por menor de utensilios de uso doméstico, cubiertos, vajilla, cristalería, plásticos y objetos de porcelana y de cerámica en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4759.04',
            'description' => 'Venta al por menor de artículos de madera, desechables, corcho y mimbre en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4759.05',
            'description' => 'Venta al por menor de electrodomésticos en establecimientos especializados=> refrigeradoras, cocinas, microondas, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'G4759.06',
            'description' => 'Venta al por menor de instrumentos musicales y partituras en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4759.09',
            'description' => 'Venta al por menor de otros enseres y aparatos de uso doméstico n.c.p. incluido sistemas de seguridad, como dispositivos de cierre, cajas de caudales, vidrios blindados y cajas fuertes, sin servicio de instalación ni de mantenimiento en establecimientos especializados',
            'level' => 'low',
        ],
        [
            'code' => 'G4761.01',
            'description' => 'Venta al por menor de libros de todo tipo en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4761.02',
            'description' => 'Venta al por menor de periódicos en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4761.03',
            'description' => 'Venta al por menor de artículos de oficina y papelería como lápices, bolígrafos, papel, etcétera, en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4762.00',
            'description' => 'Venta al por menor de discos de vinilo, cintas magnetofónicas, discos compactos y casetes de música, cintas de vídeo y DVD, cintas y discos en blanco en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4763.00',
            'description' => 'Venta al por menor de artículos de deporte, de pesca y de acampada, embarcaciones y bicicletas en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4764.00',
            'description' => 'Venta al por menor de juegos y juguetes de todos los materiales en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4771.11',
            'description' => 'Venta al por menor de prendas de vestir y peletería en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4771.12',
            'description' => 'Venta al por menor de accesorios de vestir como=> guantes, corbatas, tirantes, incluye paraguas etc.. en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4771.21',
            'description' => 'Venta al por menor de calzado, material de zapatería (plantillas, taloneras, suela y artículos análogos) en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4771.22',
            'description' => 'Venta al por menor de artículos de cuero y sustitutos, incluido accesorios de viaje, excepto prendas de vestir en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4772.01',
            'description' => 'Venta al por menor de productos farmacéuticos en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4772.02',
            'description' => 'Venta al por menor de productos naturistas en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4772.03',
            'description' => 'Venta al por menor de instrumentos y aparatos medicinales y ortopédicos en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4772.04',
            'description' => 'Venta al por menor de productos veterinarios en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4772.05',
            'description' => 'Venta al por menor de perfumes, artículos cosméticos y de uso personal en establecimientos especializados (pañales).',
            'level' => 'low',
        ],
        [
            'code' => 'G4773.11',
            'description' => 'Venta al por menor de equipo fotográfico y de precisión, en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4773.12',
            'description' => 'Venta al por menor de equipo óptico y actividades de las ópticas en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4773.21',
            'description' => 'Venta al por menor de flores, plantas y semillas en establecimientos especializados, incluso arreglos florales.',
            'level' => 'low',
        ],
        [
            'code' => 'G4773.22',
            'description' => 'Venta al por menor de fertilizantes, balanceados y abonos en establecimientos especializados.',
            'level' => 'medium',
        ],
        [
            'code' => 'G4773.23',
            'description' => 'Venta al por menor de mascotas y alimento para mascotas en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4773.91',
            'description' => 'Venta al por menor de recuerdos, sellos, monedas, artículos religiosos y artesanía en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4773.92',
            'description' => 'Actividades de galerías de arte comerciales en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4773.93',
            'description' => 'Venta al por menor de fuel, gas en bombonas, carbón y leña para uso doméstico en establecimientos especializados.',
            'level' => 'medium',
        ],
        [
            'code' => 'G4773.94',
            'description' => 'Venta al por menor de relojes y joyas en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4773.95',
            'description' => 'Venta al por menor de recargas y tarjetas electrónicas en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4773.96',
            'description' => 'Venta al por menor de productos para fiestas infantiles en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4773.99',
            'description' => 'Venta al por menor de productos no alimenticios n.c.p.=> materiales de limpieza, armas y municiones, etcétera, en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4774.01',
            'description' => 'Venta al por menor de libros de segunda mano en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4774.02',
            'description' => 'Venta al por menor de antigüedades en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4774.09',
            'description' => 'Otros tipos de actividades de venta al por menor de artículos de segunda mano, usados, incluidas actividades de casas de subastas de estos artículos en establecimientos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4781.00',
            'description' => 'Venta al por menor de alimentos, bebidas y productos del tabaco en puestos de venta o mercados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4782.00',
            'description' => 'Venta al por menor de productos textiles, prendas de vestir y calzado en puestos de venta y mercados.',
            'level' => 'low',
        ],
        [
            'code' => 'G4789.00',
            'description' => 'Venta al por menor de otros artículos en puestos de venta o mercado como=> alfombras, tapices, libros, juegos y juguetes, aparatos electrodomésticos grabaciones de música, video, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'G4791.00',
            'description' => 'Venta al por menor de cualquier tipo de producto por correo, por internet, incluido subastas por internet, catálogo, teléfono, televisión y envió de productos al cliente.',
            'level' => 'low',
        ],
        [
            'code' => 'G4799.01',
            'description' => 'Venta al por menor de cualquier tipo de producto no realizada en almacenes ni puestos de mercado=> venta directa o por vendedores a domicilio incluido la venta mediante máquinas expendedoras, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'G4799.02',
            'description' => 'Venta al por menor por comisionistas (no dependientes de comercios); Incluye actividades de casas de subastas (al por menor).',
            'level' => 'low',
        ],
        [
            'code' => 'G4799.03',
            'description' => 'Venta directa de combustibles (combustible de calefacción, leña, etcétera) con entrega en el domicilio del cliente.',
            'level' => 'low',
        ],
        [
            'code' => 'H4911.00',
            'description' => 'Transporte de pasajeros por ferrocarriles interurbanos, incluye servicios de coches cama y coches restaurante integrados en los servicios de las compañías de ferrocarril.',
            'level' => 'medium',
        ],
        [
            'code' => 'H4912.00',
            'description' => 'Transporte de carga por líneas principales y secundarias de ferrocarril.',
            'level' => 'low',
        ],
        [
            'code' => 'H4921.01',
            'description' => 'Transporte terrestre de pasajeros por sistemas de transporte urbano que pueden abarcar líneas de autobús, tranvía, trolebús, metro, ferrocarril elevado, líneas de transporte entre la ciudad y el aeropuerto o la estación etcétera. El transporte se realiza por rutas establecidas siguiendo normalmente un horario fijo, y el embarque y desembarque de pasajeros en paradas establecidas. Incluye la explotación de funiculares, teleféricos, etcétera, que formen parte del sistema de transporte urbano.',
            'level' => 'medium',
        ],
        [
            'code' => 'H4921.02',
            'description' => 'Transporte terrestre de pasajeros por sistemas de transporte suburbano, que pueden abarcar líneas de autobús provincial, parroquial etcétera. El transporte se realiza por rutas establecidas siguiendo normalmente un horario fijo, y el embarque y desembarque de pasajeros en paradas establecidas. Incluye la explotación de funiculares, teleféricos, etcétera, que formen parte del sistema de transporte suburbano.',
            'level' => 'medium',
        ],
        [
            'code' => 'H4922.01',
            'description' => 'Actividades de transporte de pasajeros por carretera=> servicios regulares de autobuses de larga distancia servicios de viajes contratados, excursiones y otros servicios ocasionales de transporte en autobús, tricimotos, servicios de enlace con aeropuertos.',
            'level' => 'medium',
        ],
        [
            'code' => 'H4922.02',
            'description' => 'Servicios de taxis.',
            'level' => 'medium',
        ],
        [
            'code' => 'H4922.03',
            'description' => 'Servicios de teleféricos, funiculares, telesillas y telecabinas, si no forman parte de sistemas de transporte urbano o suburbano.',
            'level' => 'medium',
        ],
        [
            'code' => 'H4922.04',
            'description' => 'Actividades de alquiler de automóviles privados con conductor.',
            'level' => 'medium',
        ],
        [
            'code' => 'H4922.05',
            'description' => 'Servicios de autobuses escolares y autobuses para el transporte de empleados.',
            'level' => 'medium',
        ],
        [
            'code' => 'H4922.06',
            'description' => 'Transporte de pasajeros en vehículos de tracción humana o animal.',
            'level' => 'medium',
        ],
        [
            'code' => 'H4923.01',
            'description' => 'Todas las actividades de transporte de carga por carretera, incluido en camionetas de=> troncos, ganado, transporte refrigerado, carga pesada, carga a granel, incluido el transporte en camiones cisterna, automóviles, desperdicios y materiales de desecho, sin recogida ni eliminación.',
            'level' => 'medium',
        ],
        [
            'code' => 'H4923.02',
            'description' => 'Servicio de alquiler de camiones con conductor.',
            'level' => 'medium',
        ],
        [
            'code' => 'H4923.03',
            'description' => 'Transporte de carga en vehículos de tracción animal o humana.',
            'level' => 'medium',
        ],
        [
            'code' => 'H4923.04',
            'description' => 'Servicios de mudanzas de muebles.',
            'level' => 'medium',
        ],
        [
            'code' => 'H4930.00',
            'description' => 'Servicio de estaciones de bombeo, transporte de gases, líquidos, agua, lechada y otros productos por tuberías.',
            'level' => 'high',
        ],
        [
            'code' => 'H5011.01',
            'description' => 'Transporte marítimo y de cabotaje, regular y no regular, de pasajeros; explotación de embarcaciones de excursión, de crucero o de turismo, explotación de transbordadores, taxis acuáticas, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'H5011.02',
            'description' => 'Alquiler de embarcaciones de placer con tripulación para el transporte marítimo.',
            'level' => 'medium',
        ],
        [
            'code' => 'H5012.01',
            'description' => 'Transporte marítimo y de cabotaje, regular y no regular, de carga.',
            'level' => 'medium',
        ],
        [
            'code' => 'H5012.02',
            'description' => 'Transporte de barcazas, plataformas petrolíferas, etc., remolcadas o empujadas por remolcadores.',
            'level' => 'medium',
        ],
        [
            'code' => 'H5012.03',
            'description' => 'Alquiler de embarcaciones con tripulación para el transporte marítimo (incluido el costero) de mercancías.',
            'level' => 'medium',
        ],
        [
            'code' => 'H5021.01',
            'description' => 'Transporte de pasajeros por ríos, canales, lagos y otras vías de navegación interiores, incluidos puertos interiores.',
            'level' => 'medium',
        ],
        [
            'code' => 'H5021.02',
            'description' => 'Alquiler de embarcaciones de placer con tripulación para el transporte por vías de navegación interiores.',
            'level' => 'medium',
        ],
        [
            'code' => 'H5022.01',
            'description' => 'Transporte de carga por ríos, canales, lagos y otras vías de navegación interiores, incluidos puertos interiores.',
            'level' => 'medium',
        ],
        [
            'code' => 'H5022.02',
            'description' => 'Alquiler de embarcaciones con tripulación para el transporte de mercancías por=> ríos, canales, lagos y otras vías de navegación interiores.',
            'level' => 'medium',
        ],
        [
            'code' => 'H5110.01',
            'description' => 'Transporte aéreo de pasajeros con itinerarios y horarios establecidos.',
            'level' => 'medium',
        ],
        [
            'code' => 'H5110.02',
            'description' => 'Vuelos panorámicos y turísticos incluye actividades generales de aviación, como=> transporte de pasajeros por clubes aéreos con fines de instrucción o de recreo.',
            'level' => 'medium',
        ],
        [
            'code' => 'H5110.03',
            'description' => 'Alquiler de equipo de transporte aéreo con operadores para el transporte de pasajeros, vuelos contratados (chárter) para pasajeros.',
            'level' => 'medium',
        ],
        [
            'code' => 'H5120.01',
            'description' => 'Transporte aéreo de carga con itinerarios y horarios establecidos.',
            'level' => 'medium',
        ],
        [
            'code' => 'H5120.02',
            'description' => 'Alquiler de equipo de transporte aéreo con operadores para el transporte de carga.',
            'level' => 'medium',
        ],
        [
            'code' => 'H5120.03',
            'description' => 'Transporte espacial y lanzamiento de satélites y vehículos espaciales.',
            'level' => 'medium',
        ],
        [
            'code' => 'H5210.00',
            'description' => 'Actividades de almacenamiento y depósito para todo tipo de productos=> explotación de silos de granos, almacenes para mercancías diversas, cámaras frigoríficas, tanques de almacenamiento, etcétera. Incluye la congelación por corriente de aire, almacenamiento de productos en zonas francas.',
            'level' => 'low',
        ],
        [
            'code' => 'H5221.01',
            'description' => 'Actividades relacionadas con el transporte terrestre de pasajeros, animales o carga=> explotación de terminales, estaciones ferroviarias, de autobuses, de manipulación de mercancías; Operación de infraestructura de transporte ferroviario su reparación y mantenimiento (limpieza exterior de las unidades, mantenimiento de vías y de equipos, instalación y mantenimiento electromecánico de maquinaria y conducción de líneas), operaciones de cambio de vías o de agujas',
            'level' => 'medium',
        ],
        [
            'code' => 'H5221.02',
            'description' => 'Actividades relacionadas con administración y operaciones de servicios de=> carreteras, puentes, túneles, aparcamientos o garajes, aparcamientos para bicicletas.',
            'level' => 'medium',
        ],
        [
            'code' => 'H5221.03',
            'description' => 'Actividades de remolque y asistencia en carreteras.',
            'level' => 'medium',
        ],
        [
            'code' => 'H5221.04',
            'description' => 'Actividades de licuefacción de gas para facilitar su transporte.',
            'level' => 'medium',
        ],
        [
            'code' => 'H5222.00',
            'description' => 'Actividades relacionadas con el transporte acuático de pasajeros, animales o carga=> explotación de instalaciones terminales, como puertos y malecones, explotación de exclusas de vías de navegación interiores, etcétera, actividades de navegación, practicaje y atracada, actividades de gabarraje y salvamento, incluye actividades de faros.',
            'level' => 'high',
        ],
        [
            'code' => 'H5223.01',
            'description' => 'Actividades relacionadas con el transporte aéreo de pasajeros, animales o carga=> explotación de instalaciones terminales, como terminales aéreas, etc. Actividades aeroportuarias y de control de tráfico aéreo. Actividades de servicio en tierra realizadas en aeropuertos, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'H5223.02',
            'description' => 'Servicios de prevención y extinción de incendios en los aeropuertos.',
            'level' => 'high',
        ],
        [
            'code' => 'H5224.00',
            'description' => 'Carga y descarga de mercancías y equipaje, independientemente del modo de transporte utilizado, estiba y desestiba, incluye carga y descarga de vagones ferroviarios de carga.',
            'level' => 'medium',
        ],
        [
            'code' => 'H5229.01',
            'description' => 'Servicios transitorios de organización o coordinación de operaciones de transporte y flete por tierra, mar y aire.',
            'level' => 'medium',
        ],
        [
            'code' => 'H5229.02',
            'description' => 'Actividades logísticas=> planificación, diseño y apoyo de operaciones de transporte, almacenamiento y distribución; contratación de espacio en buques y aeronaves, organización de envíos de grupo e individuales (incluidas la recogida y entrega de mercancías y la agrupación de envíos); Manipulación de mercancías, como=> el embalaje temporal con la exclusiva finalidad de proteger las mercancías durante el tránsito, desembalaje, muestreo y pesaje de la carga.',
            'level' => 'medium',
        ],
        [
            'code' => 'H5229.03',
            'description' => 'Actividades de agentes de aduanas; emisión y tramitación de documentos de transporte y conocimientos de embarque.',
            'level' => 'medium',
        ],
        [
            'code' => 'H5310.00',
            'description' => 'Servicios de recolección de correspondencia y paquetes depositados en buzones públicos o en oficinas de correos, Incluye la distribución y entrega de correspondencia y paquetes. La actividad puede realizarse en uno o varios medios de transporte propios (transporte privado) o de transporte público.',
            'level' => 'medium',
        ],
        [
            'code' => 'H5320.00',
            'description' => 'Servicios de recolección, clasificación, transporte y entrega (nacional o internacional) de correspondencia ordinaria y paquetes (que cumplan determinadas especificaciones) por parte de empresas no sujetas a la obligación de servicio universal. La actividad puede realizarse en uno o varios medios de transporte propios (transporte privado) o de transporte público. Incluye la distribución y entrega de correspondencia y paquetes y la entrega a domicilio.',
            'level' => 'medium',
        ],
        [
            'code' => 'I5510.01',
            'description' => 'Servicios de alojamiento prestados por hoteles, hoteles de suites, apart hoteles, complejos turísticos, hosterías.',
            'level' => 'low',
        ],
        [
            'code' => 'I5510.02',
            'description' => 'Servicios de alojamiento prestados por moteles.',
            'level' => 'low',
        ],
        [
            'code' => 'I5510.09',
            'description' => 'Otros servicios de alojamientos por corto tiempo=> casas de huéspedes; cabañas, chalets, cabañas con servicio de mantenimiento y limpieza, hostales juveniles y refugios de montaña.',
            'level' => 'low',
        ],
        [
            'code' => 'I5520.00',
            'description' => 'Provisión de alojamiento en campamentos, parques para caravanas, campamentos recreativos y campamentos de caza y de pesca para estancias cortas. Espacio e instalaciones para vehículos de recreo. Se incluye refugios o simples instalaciones de acampada para plantar tiendas o pernoctar en sacos de dormir.',
            'level' => 'low',
        ],
        [
            'code' => 'I5590.01',
            'description' => 'Servicio de residencias de estudiantes, dormitorios escolares, albergues para trabajadores, casas de huéspedes e internados.',
            'level' => 'low',
        ],
        [
            'code' => 'I5590.02',
            'description' => 'Servicios de coches cama ferroviarios.',
            'level' => 'medium',
        ],
        [
            'code' => 'I5610.01',
            'description' => 'Restaurantes, cevicherías, picanterías, cafeterías, etcétera, incluido comida para llevar.',
            'level' => 'medium',
        ],
        [
            'code' => 'I5610.02',
            'description' => 'Restaurantes de comida rápida, puestos de refrigerio y establecimientos que ofrecen comida para llevar, reparto de pizza, etcétera; heladerías, fuentes de soda, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'I5610.03',
            'description' => 'Preparación y suministro de comidas para su consumo inmediato de manera ambulante, mediante un vehículo motorizado o carro no motorizado, vendedores de helados en carros móviles, carritos ambulantes de comida incluye la preparación de comida en puestos de mercados.',
            'level' => 'medium',
        ],
        [
            'code' => 'I5610.04',
            'description' => 'Servicios de restaurantes y bares en conexión con transporte cuando son proporcionadas por unidades independientes=> bares del aeropuerto, bares terminales terrestres, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'I5621.00',
            'description' => 'Servicio de comidas basado en acuerdos contractuales con el cliente para un evento (banquetes, bodas, fiestas y otras celebraciones, buffet) en la localización especificada por el cliente (abastecedores de eventos).',
            'level' => 'medium',
        ],
        [
            'code' => 'I5629.01',
            'description' => 'Actividades de contratistas de servicio de comidas (por ejemplo, para compañías de transporte catering).',
            'level' => 'medium',
        ],
        [
            'code' => 'I5629.02',
            'description' => 'Servicios de concesiones de servicio de comidas en instalaciones deportivas e instalaciones similares, cantinas o cafeterías (por ejemplo, para fábricas, oficinas, hospitales o escuelas) en régimen de concesión.',
            'level' => 'medium',
        ],
        [
            'code' => 'I5630.01',
            'description' => 'Actividades de preparación y servicio de bebidas para su consumo inmediato en=> bares, tabernas, coctelerías, discotecas (con suministro predominante de bebidas) cervecerías y pubs.',
            'level' => 'low',
        ],
        [
            'code' => 'I5630.02',
            'description' => 'Actividades de preparación y servicio de bebidas para su consumo inmediato en=> cafés, tiendas de jugos de fruta, vendedores ambulantes de bebidas, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'J5811.01',
            'description' => 'Publicación de libros, folletos impresos, diccionarios, enciclopedias y similares, atlas, mapas y planos. Incluye la venta de espacios publicitarios.',
            'level' => 'medium',
        ],
        [
            'code' => 'J5811.02',
            'description' => 'Publicación de libros en formato de audio y de enciclopedias en CD-ROM.',
            'level' => 'medium',
        ],
        [
            'code' => 'J5812.00',
            'description' => 'Publicación de=> guías de direcciones, guías telefónicas, registros oficiales, jurisprudencia (ley), vademécum farmacéuticos, etcétera. Incluye venta de espacios publicitarios.',
            'level' => 'medium',
        ],
        [
            'code' => 'J5813.01',
            'description' => 'Actividades de publicación y edición de periódicos, revistas y otras publicaciones, incluidos los publicitarios con una periodicidad mayor a cuatro veces por semana. Esta información puede ser editada en formato impresos o electrónicos, incluido Internet.',
            'level' => 'medium',
        ],
        [
            'code' => 'J5819.01',
            'description' => 'Publicación (incluida la edición on-line) de catálogos de fotografías, grabados, tarjetas postales, tarjetas de felicitación, formularios, carteles, reproducciones de obras de arte, publicidad y otro material impreso.',
            'level' => 'medium',
        ],
        [
            'code' => 'J5819.02',
            'description' => 'Publicación de estadísticas en línea y otra información.',
            'level' => 'medium',
        ],
        [
            'code' => 'J5820.00',
            'description' => 'Actividades de publicación de programas informáticos comerciales (no personalizados)=> sistemas operativos, aplicaciones comerciales y otras aplicaciones, juegos informáticos para todas las plataformas.',
            'level' => 'low',
        ],
        [
            'code' => 'J5911.00',
            'description' => 'Actividades de producción de películas cinematográficas, videos, Producción programas y anuncios de televisión.',
            'level' => 'low',
        ],
        [
            'code' => 'J5912.01',
            'description' => 'Actividades de postproducción, como=> edición, rotulación, subtitulado, créditos subtitulados para sordos, gráficos, animación y efectos especiales producidos por ordenador, transferencia de película a cinta; actividades de laboratorios cinematográficos y de laboratorios especiales para películas de animación, incluido el revelado de estas cintas.',
            'level' => 'low',
        ],
        [
            'code' => 'J5912.02',
            'description' => 'Actividades de reproducción de películas cinematográficas para su distribución en cines. Se incluyen actividades de archivos cinematográficos, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'J5913.00',
            'description' => 'Actividades de distribución de películas, cintas de vídeo, DVD y productos similares a cines, cadenas y emisoras de televisión y exhibidores. Se incluyen adquisición de los derechos de distribución de películas, cintas de vídeo y DVD.',
            'level' => 'low',
        ],
        [
            'code' => 'J5914.00',
            'description' => 'Proyección de películas cinematográficas y cintas de vídeo en cines, al aire libre o en otros locales de proyección y actividades de cineclubes.',
            'level' => 'low',
        ],
        [
            'code' => 'J5920.01',
            'description' => 'Actividades de producción de grabaciones matrices originales de sonido, como cintas magnetofónicas, CD.',
            'level' => 'medium',
        ],
        [
            'code' => 'J5920.02',
            'description' => 'La publicación, lanzamiento, promoción y distribución de grabaciones de sonido para comerciantes mayoristas, minoristas o directamente para el público.',
            'level' => 'low',
        ],
        [
            'code' => 'J5920.03',
            'description' => 'Actividades de servicios de grabación de sonido en estudio o en otros lugares, incluida la producción de programas de radio grabados (es decir, no emitidos en directo).',
            'level' => 'low',
        ],
        [
            'code' => 'J5920.04',
            'description' => 'Actividades de bandas sonoras de películas cinematográficas, grabaciones de sonido para programas de televisión, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'J5920.05',
            'description' => 'Edición de música, es decir, actividades de=> adquisición y registro de los derechos de autor de composiciones musicales, promoción, autorización y utilización de esas composiciones en grabaciones, en la radio, en la televisión, en películas, en interpretaciones en vivo, en medios impresos y en otros medios, distribución de grabaciones de sonido a mayoristas o minoristas o directamente al público, incluye la edición de libros de música y partituras.',
            'level' => 'low',
        ],
        [
            'code' => 'J6010.01',
            'description' => 'Actividades de emisión de señales de audiofrecuencia a través de estudios e instalaciones de emisión de radio para la transmisión de programas sonoros al público, a entidades afiliadas o a suscriptores.',
            'level' => 'low',
        ],
        [
            'code' => 'J6010.02',
            'description' => 'Actividades de cadenas de radio, es decir, la reunión de programas sonoros y su transmisión a los afiliados o suscriptores por el aire, por cable o por satélite; transmisiones de radio por Internet (estaciones de radio por Internet). Incluye la transmisión de datos integrada con transmisiones de radio.',
            'level' => 'low',
        ],
        [
            'code' => 'J6020.01',
            'description' => 'Actividades de creación del programa completo de una cadena de televisión para un canal, desde la compra de los componentes del programa (películas, documentales, etcétera.) hasta la producción propia de los componentes del programa auto producidos (noticias locales, reportajes en vivo) o una combinación de las dos opciones. El programa completo de televisión puede ser emitido por las unidades de producción o bien producirse para su transmisión por terceros distribuidores, como compañías de emisión por cable o proveedores de televisión por satélite, incluye la programación de canales de video a la carta.',
            'level' => 'low',
        ],
        [
            'code' => 'J6020.02',
            'description' => 'Actividades de transmisión de datos integrados con emisiones de televisión.',
            'level' => 'low',
        ],
        [
            'code' => 'J6110.01',
            'description' => 'Actividades de operación, mantenimiento o facilitación del acceso a servicios de transmisión de voz, datos, texto, sonido y vídeo utilizando una infraestructura de telecomunicaciones alambricas, como=> operación y mantenimiento de sistemas de conmutación y transmisión para suministrar servicios de comunicaciones de punto a punto por líneas alambricas, por microondas o por una combinación de líneas alambricas y conexiones por satélite.',
            'level' => 'medium',
        ],
        [
            'code' => 'J6110.02',
            'description' => 'Actividades de operación en sistemas de distribución por cable (por ejemplo, para la distribución de datos y señales de televisión).',
            'level' => 'medium',
        ],
        [
            'code' => 'J6110.03',
            'description' => 'Actividades de compra en derechos de acceso y capacidad de red a los propietarios y operadores de redes y utilización de esa capacidad para suministrar servicios de telecomunicaciones a empresas y hogares.',
            'level' => 'medium',
        ],
        [
            'code' => 'J6110.04',
            'description' => 'Actividades de suministro en acceso a Internet por los operadores de la infraestructura de telecomunicaciones alambricas.',
            'level' => 'medium',
        ],
        [
            'code' => 'J6120.01',
            'description' => 'Operación, mantenimiento o facilitación del acceso a servicios de transmisión de voz, datos, texto, sonido y vídeo utilizando una infraestructura de telecomunicaciones inalámbricas. Incluye las actividades de mantenimiento y explotación de redes de radio búsqueda y de telefonía móvil y otras redes de telecomunicaciones inalámbricas.',
            'level' => 'medium',
        ],
        [
            'code' => 'J6120.02',
            'description' => 'Actividades de compra de acceso y capacidad de red concedida por los dueños y operadores de las redes y el abastecimiento de servicios de telecomunicaciones inalámbrico (excepto el satélite) que utilizan esta capacidad a empresas y hogares.',
            'level' => 'medium',
        ],
        [
            'code' => 'J6120.03',
            'description' => 'Actividades de suministro de acceso a Internet por los operadores de la infraestructura de telecomunicaciones inalámbricas.',
            'level' => 'medium',
        ],
        [
            'code' => 'J6130.01',
            'description' => 'Actividades de operación, mantenimiento o facilitación del acceso a servicios de transmisión de voz, datos, texto, sonido y vídeo utilizando una infraestructura de telecomunicaciones por satélite, actividades de suministro de acceso a Internet por el operador de la infraestructura de telecomunicaciones por satélite.',
            'level' => 'low',
        ],
        [
            'code' => 'J6130.02',
            'description' => 'Actividades de transmisión a los consumidores por sistemas de comunicación directa por satélite de programas visuales, sonoros o de texto recibidos de redes de cable o estaciones de televisión o cadenas de radio locales. (Las unidades clasificadas en esa clase no producen por lo general material de programación).',
            'level' => 'low',
        ],
        [
            'code' => 'J6190.01',
            'description' => 'Suministro de aplicaciones especializadas de telecomunicaciones, como detección por satélite, telemetría de comunicaciones y utilización de estaciones de radar.',
            'level' => 'low',
        ],
        [
            'code' => 'J6190.02',
            'description' => 'Operación de estaciones terminales de comunicaciones por satélite e instalaciones conexas operacionalmente conectadas con uno o varios sistemas de comunicaciones terrestres y capaces de transmitir o recibir telecomunicaciones por satélite.',
            'level' => 'medium',
        ],
        [
            'code' => 'J6190.03',
            'description' => 'Suministro de acceso a Internet por redes que no posee ni controla el proveedor de servicios de Internet, como el acceso telefónico a Internet, etc.',
            'level' => 'medium',
        ],
        [
            'code' => 'J6190.04',
            'description' => 'Actividades de reventa de servicios de telecomunicaciones (suministro de servicios telefónicos y de Internet en instalaciones abiertas al público=> cabinas telefónicas y cibercafés.)',
            'level' => 'medium',
        ],
        [
            'code' => 'J6190.05',
            'description' => 'Suministro de servicios de telecomunicaciones por las conexiones de telecomunicaciones existentes=> suministro de servicios de telefonía por Internet (VoIP=> Voice over Internet Protocol).',
            'level' => 'low',
        ],
        [
            'code' => 'J6190.06',
            'description' => 'Actividades de gestión y consultoría para la transmisión de datos.',
            'level' => 'medium',
        ],
        [
            'code' => 'J6190.09',
            'description' => 'Otras actividades de telecomunicaciones.',
            'level' => 'medium',
        ],
        [
            'code' => 'J6201.01',
            'description' => 'Actividades de diseño de la estructura y el contenido de los elementos siguientes (y/o escritura del código informático necesario para su creación y aplicación)=> programas de sistemas operativos (incluidas actualizaciones y parches de corrección), aplicaciones informáticas (incluidas actualizaciones y parches de corrección), bases de datos y páginas web.',
            'level' => 'low',
        ],
        [
            'code' => 'J6201.02',
            'description' => 'Adaptación de programas informáticos a las necesidades de los clientes, es decir, modificación y configuración de una aplicación existente para que pueda funcionar adecuadamente con los sistemas de información de que dispone el cliente.',
            'level' => 'low',
        ],
        [
            'code' => 'J6202.10',
            'description' => 'Actividades de planificación y diseño de sistemas informáticos que integran equipo y programas informáticos y tecnología de las comunicaciones.',
            'level' => 'low',
        ],
        [
            'code' => 'J6202.20',
            'description' => 'Servicios de gestión y manejo in situ de sistemas informáticos y/o instalaciones de procesamiento de datos de los clientes, y servicios de apoyo conexos.',
            'level' => 'high',
        ],
        [
            'code' => 'J6203.01',
            'description' => 'Actividades de diseño y desarrollo de soluciones basadas en tecnología BlockChain (cadena de bloques), de uno o varios de los elementos siguientes=> Identidad Digital y Contratos Inteligentes, Intermediarios en mercados de activos intangibles digitales como exchanges (casas de cambio virtuales), Wallets (monederos), DEFI (Finanzas descentralizadas), Mineras, Tokens No Fungibles (NFT) y Tokenización, que se encuentre en función de, asociado, y/o relacionado con activos virtuales.',
            'level' => 'low',
        ],
        [
            'code' => 'J6209.01',
            'description' => 'Actividades relacionadas a la informática como=> recuperación en casos de desastre informático, instalación de programas informáticos.',
            'level' => 'low',
        ],
        [
            'code' => 'J6209.02',
            'description' => 'Actividades de instalación (montaje) de computadoras personales.',
            'level' => 'low',
        ],
        [
            'code' => 'J6311.01',
            'description' => 'Suministro de infraestructura para servicios de hospedaje, servicios de procesamiento de datos y actividades conexas. Incluye actividades especializadas de hospedaje, como=> hospedaje de sitios web, aplicaciones, servicios de transmisión de secuencias de vídeo por Internet.',
            'level' => 'low',
        ],
        [
            'code' => 'J6311.02',
            'description' => 'Actividades de procesamiento y suministro de servicio de registro de datos=> elaboración completa de datos facilitados por los clientes, generación de informes especializados a partir de datos facilitados por los clientes.',
            'level' => 'low',
        ],
        [
            'code' => 'J6311.03',
            'description' => 'Servicios de aplicaciones.',
            'level' => 'low',
        ],
        [
            'code' => 'J6311.04',
            'description' => 'Suministro a los clientes de acceso en tiempo compartido a servicios centrales.',
            'level' => 'low',
        ],
        [
            'code' => 'J6312.00',
            'description' => 'Operación de sitios web que funcionan como portales de Internet, como los sitios de medios de difusión que proporcionan contenidos que se actualizan periódicamente y los que utilizan un motor de búsqueda para generar y mantener amplias bases de datos de direcciones de Internet y de contenidos en un formato que facilite la búsqueda.',
            'level' => 'low',
        ],
        [
            'code' => 'J6391.00',
            'description' => 'Actividades de consorcios y agencias de noticias que suministran noticias, fotografías y artículos periodísticos a los medios de difusión.',
            'level' => 'low',
        ],
        [
            'code' => 'J6399.00',
            'description' => 'Otras actividades de servicios de información n.c.p.=> servicios de información telefónica, búsqueda de información a cambio de una retribución o por contrato, selección de noticias, de recortes de prensa, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'K6411.00',
            'description' => 'Actividades de emisión y administración de la moneda nacional; supervisión y control de la masa monetaria; recepción de depósitos para operaciones de compensación entre instituciones financieras; supervisión de las operaciones bancarias; mantenimiento de las reservas nacionales de divisas; función de banco del gobierno. Las actividades de los bancos centrales pueden variar por razones institucionales.',
            'level' => 'low',
        ],
        [
            'code' => 'K6419.01',
            'description' => 'Actividades de recepción de depósitos y/o similares cercanos de depósitos y la concesión de créditos o préstamos de fondos. La concesión de crédito puede adoptar diversas formas, como préstamos, hipotecas, transacciones con tarjetas de crédito, etc. Esas actividades son realizadas por bancos diferentes del Banco Central.',
            'level' => 'low',
        ],
        [
            'code' => 'K6419.02',
            'description' => 'Actividades de recepción de depósitos y/o similares cercanos de depósitos y la concesión de créditos o préstamos de fondos. La concesión de crédito puede adoptar diversas formas, como préstamos, hipotecas, transacciones con tarjetas de crédito, etc. Esas actividades son realizadas en general por instituciones monetarias diferentes de los bancos centrales, como=> cajas de ahorros, cooperativas de crédito y actividades de giro postal.',
            'level' => 'low',
        ],
        [
            'code' => 'K6419.03',
            'description' => 'Actividades de recepción de depósitos y/o similares cercanos de depósitos y la concesión de créditos o préstamos de fondos. La concesión de crédito puede adoptar diversas formas, como préstamos, hipotecas, transacciones con tarjetas de crédito, etc. Esas actividades son realizadas en general por instituciones monetarias diferentes de los bancos centrales, como; Actividades de concesión de crédito para compra de vivienda de instituciones especializadas que reciben depósitos (mutualistas).',
            'level' => 'low',
        ],
        [
            'code' => 'K6420.00',
            'description' => 'Actividades de sociedades de cartera, es decir, unidades tenedoras de activos de un grupo de empresas filiales (con participación de control en su capital social) y cuya actividad principal consiste en la propiedad del grupo. Las sociedades de cartera clasificadas en esta clase no suministran ningún otro servicio a las empresas participadas, es decir, no administran ni gestionan otras unidades.',
            'level' => 'low',
        ],
        [
            'code' => 'K6430.00',
            'description' => 'Actividades de entidades jurídicas organizadas para la mancomunión de valores u otros activos financieros, sin gestión, en nombre de accionistas o beneficiarios. Las carteras se adaptan a especificaciones concretas para lograr determinadas características; por ejemplo, de diversificación, riesgo, rendimiento y variabilidad de precio. Esas entidades obtienen intereses, dividendos y otras rentas de la propiedad, pero tienen pocos empleados y no obtienen ingresos por concepto de venta de servicios. Se incluyen las siguientes actividades=> fondos de inversión de participación abierta; fondos de inversión cerrados; fideicomisos, legados o cuentas de agencia, administrados en nombre de los beneficiarios en virtud de un contrato de fiducia, un testamento o un contrato de representación; sociedades de inversión mobiliaria.',
            'level' => 'low',
        ],
        [
            'code' => 'K6491.00',
            'description' => 'Actividades de arrendamiento que cubre aproximadamente toda la vida útil prevista de un activo y en el que el arrendatario adquiere prácticamente todos los derechos de usufructo y asume todos los riesgos relacionados con la propiedad del activo, que puede o no ser objeto de traspaso. Esa modalidad de arrendamiento cubre la totalidad o la práctica totalidad de los costos, incluidos intereses.',
            'level' => 'low',
        ],
        [
            'code' => 'K6492.01',
            'description' => 'Actividades de otorgamiento de crédito de instituciones no dedicadas a la intermediación monetaria en las que el crédito puede adoptar diferentes formas como=> préstamos, hipotecas, tarjetas de crédito, etcétera. Proporcionando los servicios de=> financiamiento para comercio internacional, provisión de financiamiento a largo plazo para la industria a través de bancos industriales, concesión de crédito a los consumidores.',
            'level' => 'low',
        ],
        [
            'code' => 'K6492.02',
            'description' => 'Actividades de préstamos fuera del sistema bancario, otorgamiento de créditos para vivienda por instituciones especializadas que no reciben depósitos, se incluyen actividades realizadas por las casas de empeño y montes de piedad.',
            'level' => 'low',
        ],
        [
            'code' => 'K6499.01',
            'description' => 'Otras actividades de servicios financieros consistentes principalmente en modalidades de distribución de fondos distintas de la concesión de préstamos=> actividades de factorización, suscripción de permutas financieras, opciones y otros instrumentos de cobertura y actividades de compañías de liquidación por adelantado.',
            'level' => 'low',
        ],
        [
            'code' => 'K6499.02',
            'description' => 'Actividades de inversión por cuenta propia, como las de compañías de capital riesgo, clubes de inversión, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'K6511.00',
            'description' => 'Concertación de contratos de anualidades y pólizas de seguros de vida, seguros de invalidez y seguros de doble indemnización (tengan o no un componente importante de ahorro).',
            'level' => 'low',
        ],
        [
            'code' => 'K6512.01',
            'description' => 'Suministros de servicios de seguros distintos de los seguros de vida=> seguros de accidentes y contra incendios, seguros médicos, seguros de viajes, seguros de cosas, seguros de transporte por carretera, marítimo y aéreo, seguros contra pérdidas pecuniarias y de responsabilidad civil.',
            'level' => 'low',
        ],
        [
            'code' => 'K6512.02',
            'description' => 'Servicios de seguro de medicina pre pagada.',
            'level' => 'low',
        ],
        [
            'code' => 'K6520.00',
            'description' => 'Actividades de asunción de la totalidad o una parte de los riesgos de pólizas de seguros existentes emitidas originariamente por otras compañías de seguros.',
            'level' => 'low',
        ],
        [
            'code' => 'K6530.00',
            'description' => 'Actividades de entidades jurídicas (es decir, de fondos, planes y/o programas) organizadas para proporcionar prestaciones de jubilación exclusivamente para los empleados o miembros de la entidad patrocinadora. Abarca planes de pensiones con prestaciones definidas y planes individuales en los que las prestaciones dependen de las contribuciones del afiliado. Se incluyen las siguientes actividades=> Planes de prestaciones sociales para los empleados, fondos y planes de pensiones, planes de jubilación.',
            'level' => 'low',
        ],
        [
            'code' => 'K6611.00',
            'description' => 'Gestión y supervisión de los mercados financieros por entidades distintas de las autoridades públicas, como=> mercado (bolsas) de contratos de productos básicos, mercado (bolsas) de futuros, mercado (bolsas) de valores, mercados bursátiles, mercado (bolsas) de opciones sobre acciones o sobre productos básicos, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'K6612.01',
            'description' => 'Actividades de oficinas de cambio.',
            'level' => 'low',
        ],
        [
            'code' => 'K6612.02',
            'description' => 'Operaciones en los mercados financieros por cuenta ajena (por ejemplo, correduría de bolsa) y actividades conexas. Incluye corretaje de contratos de productos básicos y corretaje de valores.',
            'level' => 'low',
        ],
        [
            'code' => 'K6613.01',
            'description' => 'Actividades de personas, empresas y otras entidades que se relacionan con la emisión, compra, venta, transferencia, custodia y almacenamiento de activos virtuales; como el intercambio entre activos virtuales; activos virtuales y monedas Fiat (de curso legal); o el intercambio entre más formas de activos virtuales.',
            'level' => 'low',
        ],
        [
            'code' => 'K6614.01',
            'description' => 'Actividades de servicios de asesoramiento, gestión y operación de mercados virtuales o activos intangibles digitales, así como fondos de inversión (distinto a los mercados financieros) en el que se asocie y/o relacione con activos virtuales, a cambio de una retribución o comisión.',
            'level' => 'low',
        ],
        [
            'code' => 'K6619.01',
            'description' => 'Actividades auxiliares de las actividades de servicios financieros n.c.p., como=> actividades de tramitación y liquidación de transacciones financieras, incluidas las transacciones con tarjetas de crédito.',
            'level' => 'low',
        ],
        [
            'code' => 'K6619.02',
            'description' => 'Actividades de servicios de asesoramiento en inversiones y corredores hipotecarios.',
            'level' => 'low',
        ],
        [
            'code' => 'K6619.03',
            'description' => 'Servicios de administración fiduciaria y de custodia a cambio de una retribución o por contrato.',
            'level' => 'low',
        ],
        [
            'code' => 'K6621.00',
            'description' => 'Actividades de prestación de servicios administrativos relacionados con los seguros, como la tasación y liquidación de reclamaciones. Se incluyen las siguientes actividades=> evaluación de las reclamaciones, tasación de solicitudes de indemnización, evaluación del riesgo, evaluación de riesgos y daños, tasación de averías y pérdidas. Incluye la liquidación de solicitudes de indemnización.',
            'level' => 'low',
        ],
        [
            'code' => 'K6622.00',
            'description' => 'Actividades de agentes y corredores de seguros (intermediarios de seguros) que venden, negocian u ofertan contratos de anualidades y pólizas de seguros y reaseguros.',
            'level' => 'low',
        ],
        [
            'code' => 'K6629.00',
            'description' => 'Actividades estrechamente relacionadas con seguros y fondos de pensiones (excepto el ajuste de reclamaciones y las actividades de agentes de seguros) administración de salvamentos, servicios actuariales, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'K6630.00',
            'description' => 'Actividades de personas, empresas y otras entidades que gestionan carteras y fondos a cambio de una retribución o por contrato. Se incluyen las siguientes actividades=> gestión de fondos de pensiones, gestión de fondos mutuos de inversión y gestión de otros fondos de inversión.',
            'level' => 'low',
        ],
        [
            'code' => 'L6810.01',
            'description' => 'Compra - venta, alquiler y explotación de bienes inmuebles propios o arrendados, como=> edificios de apartamentos y viviendas; edificios no residenciales, incluso salas de exposiciones; instalaciones para almacenaje, centros comerciales y terrenos; incluye el alquiler de casas y apartamentos amueblados o sin amueblar por períodos largos, en general por meses o por años; y la explotación de campamentos residenciales para casas móviles.',
            'level' => 'low',
        ],
        [
            'code' => 'L6810.02',
            'description' => 'Promoción de proyectos de construcción (promoción inmobiliaria) para su posterior explotación, es decir, para alquilar espacio en esos edificios.',
            'level' => 'low',
        ],
        [
            'code' => 'L6810.03',
            'description' => 'Lotización y parcelación de propiedades inmobiliarias en lotes, sin mejora de los terrenos.',
            'level' => 'high',
        ],
        [
            'code' => 'L6820.01',
            'description' => 'Actividades de agentes y corredores inmobiliarios. Intermediación en la compra, venta y alquiler de bienes inmuebles a cambio de una retribución o por contrato.',
            'level' => 'low',
        ],
        [
            'code' => 'L6820.02',
            'description' => 'Administración de bienes inmuebles a cambio de una retribución o por contrato.',
            'level' => 'low',
        ],
        [
            'code' => 'L6820.03',
            'description' => 'Servicios de tasación inmobiliaria.',
            'level' => 'low',
        ],
        [
            'code' => 'L6820.04',
            'description' => 'Actividades de agentes inmobiliarios neutrales que garantizan el cumplimiento de todas las condiciones de una transacción inmobiliaria (plicas inmobiliarias).',
            'level' => 'low',
        ],
        [
            'code' => 'M6910.01',
            'description' => 'Actividades de representación jurídica de los intereses de una parte contra otra, sea o no ante tribunales u otros órganos judiciales, realizadas por abogados o bajo la supervisión de abogados=> asesoramiento y representación en procedimientos civiles, procedimientos penales y en relación con conflictos laborales.',
            'level' => 'low',
        ],
        [
            'code' => 'M6910.02',
            'description' => 'Actividades de notarios públicos, prestación de asesoramiento en general, preparación de documentos jurídicos=> escrituras de constitución, contratos de sociedad y documentos similares para la formación de sociedades, patentes y derechos de autor, escrituras, testamentos, fideicomisos, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'M6910.03',
            'description' => 'Otras actividades de ejecutores judiciales, alguaciles, árbitros, examinadores y mediadores.',
            'level' => 'low',
        ],
        [
            'code' => 'M6910.09',
            'description' => 'Otras actividades de asesoramiento y representación en procedimientos jurídicos (derecho constitucional, administrativo, militar, etcétera).',
            'level' => 'low',
        ],
        [
            'code' => 'M6920.01',
            'description' => 'Actividades de registro de las transacciones comerciales de empresas y otras entidades.',
            'level' => 'low',
        ],
        [
            'code' => 'M6920.02',
            'description' => 'Actividades de preparación o auditoria de las cuentas financieras y examen y certificación de cuentas.',
            'level' => 'low',
        ],
        [
            'code' => 'M6920.03',
            'description' => 'Actividades de preparación de las declaraciones tributarias de las personas y empresas; asesoramiento y de representación de clientes ante las autoridades tributarias.',
            'level' => 'low',
        ],
        [
            'code' => 'M6920.09',
            'description' => 'Otras actividades de contabilidad, teneduría de libros y auditoria; consultoría fiscal (procesamiento de nómina, etcétera).',
            'level' => 'low',
        ],
        [
            'code' => 'M7010.00',
            'description' => 'Supervisión y gestión de otras unidades de la misma compañía o empresa, asumiendo la planificación estratégica, organizativa y la función de toma de decisiones de la compañía o empresa; ejerciendo el control operativo y la gestión de las operaciones corrientes de las otras unidades=> oficinas principales, oficinas administrativas centralizadas, sedes, oficinas de distrito, regionales y oficinas subsidiarias de gestión.',
            'level' => 'low',
        ],
        [
            'code' => 'M7020.01',
            'description' => 'Servicios de asesoramiento, orientación y asistencia operativa a las empresas y a la administración pública en materia de=> relaciones públicas y comunicaciones.',
            'level' => 'low',
        ],
        [
            'code' => 'M7020.02',
            'description' => 'Servicios de asesoramiento, orientación y asistencia operativa a las empresas y a la administración pública en materia de=> actividades de cabildeo (grupos de presión (lobbies)).',
            'level' => 'low',
        ],
        [
            'code' => 'M7020.03',
            'description' => 'Servicios de asesoramiento, orientación y asistencia operativa a las empresas y a la administración pública en materia de=> diseño de métodos o procedimientos contables, programas de contabilidad de costos y procedimientos de control presupuestario.',
            'level' => 'low',
        ],
        [
            'code' => 'M7020.04',
            'description' => 'Prestación de asesoramiento y ayuda a las empresas y las administraciones públicas en materia de planificación, organización, eficiencia y control, información administrativa, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'M7110.11',
            'description' => 'Actividades de asesoramiento técnico de arquitectura en diseño de edificios y dibujo de planos de construcción.',
            'level' => 'low',
        ],
        [
            'code' => 'M7110.12',
            'description' => 'Actividades de asesoramiento técnico de arquitectura en planificación urbana y arquitectura paisajista.',
            'level' => 'low',
        ],
        [
            'code' => 'M7110.21',
            'description' => 'Actividades de diseño de ingeniería (es decir, aplicación de las leyes físicas y de los principios de ingeniería al diseño de máquinas, materiales, instrumentos, estructuras, procesos y sistemas) y asesoría de ingeniería para maquinaría, procesos y plantas industriales.',
            'level' => 'low',
        ],
        [
            'code' => 'M7110.22',
            'description' => 'Actividades de diseño de ingeniería y consultoría de ingeniería para proyectos de ingeniería civil, hidráulica y de tráfico.',
            'level' => 'low',
        ],
        [
            'code' => 'M7110.23',
            'description' => 'Actividades de diseño de ingeniería y consultoría de ingeniería para proyectos de ordenación hídrica.',
            'level' => 'low',
        ],
        [
            'code' => 'M7110.24',
            'description' => 'Elaboración y realización de proyectos de ingeniería eléctrica y electrónica, ingeniería de minas, ingeniería química, mecánica, industrial, de sistemas, e ingeniería especializada en sistemas de seguridad.',
            'level' => 'low',
        ],
        [
            'code' => 'M7110.25',
            'description' => 'Actividades de diseño de ingeniería y consultoría de ingeniería para gestión de proyectos relacionados con la construcción.',
            'level' => 'low',
        ],
        [
            'code' => 'M7110.26',
            'description' => 'Elaboración de proyectos de ingeniería especializada en sistemas de acondicionado de aire, refrigeración, saneamiento, control de la contaminación, acondicionamiento acústico, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'M7110.29',
            'description' => 'Otras actividades de diseño y asesoría de ingeniería.',
            'level' => 'low',
        ],
        [
            'code' => 'M7110.31',
            'description' => 'Actividades de topografía (agrimensura, medición de tierras y límites), actividades de estudios hidrológicos y actividades de estudios de subsuelo.',
            'level' => 'medium',
        ],
        [
            'code' => 'M7110.32',
            'description' => 'Actividades cartográficas y de información espacial.',
            'level' => 'medium',
        ],
        [
            'code' => 'M7110.33',
            'description' => 'Actividades de estudios geofísicos, geológicos y sismográficos.',
            'level' => 'medium',
        ],
        [
            'code' => 'M7110.90',
            'description' => 'Otras actividades de arquitectura e ingeniería y actividades conexas de consultoría técnica.',
            'level' => 'medium',
        ],
        [
            'code' => 'M7120.11',
            'description' => 'Realización de ensayos físicos, químicos y otros ensayos analíticos de todo tipo de materiales y productos=> ensayos acústicos y de vibraciones, ensayos de calificación, fiabilidad y análisis de defectos.',
            'level' => 'high',
        ],
        [
            'code' => 'M7120.12',
            'description' => 'Actividades de análisis de la composición y pureza de minerales, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'M7120.13',
            'description' => 'Actividades de ensayos en el campo de la higiene alimentaria, incluidas actividades de ensayo y control veterinario en relación con la producción de alimentos.',
            'level' => 'high',
        ],
        [
            'code' => 'M7120.14',
            'description' => 'Actividades de ensayos para determinar las propiedades físicas y el rendimiento de productos y materiales en cuanto, a su resistencia, espesor, durabilidad, radiactividad, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'M7120.15',
            'description' => 'Actividades de ensayos y mediciones de indicadores ambientales=> contaminación del aire y del agua etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'M7120.16',
            'description' => 'Actividades de ensayos de ensayos radiográficos de soldaduras y juntas y rendimiento de maquinaría completa=> motores, automóviles, equipo electrónico, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'M7120.91',
            'description' => 'Actividades de certificación de productos, como bienes de consumo, vehículos automotores, aeronaves, contenedores presurizados, centrales nucleares, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'M7120.92',
            'description' => 'Pruebas periódicas de seguridad vial de vehículos automotores.',
            'level' => 'high',
        ],
        [
            'code' => 'M7120.93',
            'description' => 'Actividades de análisis y pruebas relacionadas a campos científicos.',
            'level' => 'medium',
        ],
        [
            'code' => 'M7120.94',
            'description' => 'Actividades de laboratorios policiales.',
            'level' => 'high',
        ],
        [
            'code' => 'M7120.99',
            'description' => 'Otras actividades de ensayos y análisis técnicos=> ensayos basados en la utilización de maquetas o modelos (de aeronaves, de embarcaciones, de presas, etcétera).',
            'level' => 'high',
        ],
        [
            'code' => 'M7210.11',
            'description' => 'Investigaciones y desarrollo experimental en el campo de la biotecnología de=> ADN/ARN, genómica, farmacogenómica, sondas genéticas, ingeniería genética, secuenciación y amplificación de ADN y ARN, patrones de expresión génica el uso de tecnología antisense, vectores genéticos y de ARN, terapia genética y vectores virales.',
            'level' => 'medium',
        ],
        [
            'code' => 'M7210.12',
            'description' => 'Investigaciones y desarrollo experimental en el campo de la biotecnología de=> proteínas y otras moléculas secuenciación, síntesis e ingeniería de proteínas y péptidos (que incluye hormonas de gran tamaño molecular), mejora de métodos de liberación de drogas de gran tamaño, proteómica, aislamiento y purificación de proteínas, señalización e identificación de receptores celulares.',
            'level' => 'medium',
        ],
        [
            'code' => 'M7210.13',
            'description' => 'Investigaciones y desarrollo experimental en el campo de la biotecnología de=> cultivos e ingeniería celulares y de tejidos, ingeniería tisular (que incluyen implantes de tejido e ingeniería biomédica) en fusión celular, vacunas/estimulantes del sistema inmune, manipulación embrionaria.',
            'level' => 'medium',
        ],
        [
            'code' => 'M7210.14',
            'description' => 'Investigaciones y desarrollo experimental en el campo de la técnicas de proceso biotecnológicos=> fermentación mediante el uso de biorreactores, procesado biológico, biodecantación, biopulping, bioblanqueo, biodesulfurización, biorremediación, biofiltración y fitorremediación.',
            'level' => 'medium',
        ],
        [
            'code' => 'M7210.15',
            'description' => 'Investigaciones y desarrollo experimental en el campo de la Bioinformática=> construcción de bases de datos genómicas, secuencias de proteínas, modelización de procesos biológicos complejos que incluyen biología de sistemas.',
            'level' => 'medium',
        ],
        [
            'code' => 'M7210.16',
            'description' => 'Investigaciones y desarrollo experimental en el campo de la Nanobiotecnología=> aplicación de técnicas y procesos de nano/micro fabricación para la construcción de aparatos para el estudio de biosistemas y aplicaciones en liberación de drogas, diagnósticos, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'M7210.21',
            'description' => 'Investigación y desarrollo experimental en ciencias naturales y técnicas (física, química, biología, geología, astronomía) distintos de la investigación y el desarrollo experimental en el campo de la biotecnología.',
            'level' => 'medium',
        ],
        [
            'code' => 'M7210.22',
            'description' => 'Investigación y desarrollo en ingeniería y tecnología.',
            'level' => 'medium',
        ],
        [
            'code' => 'M7210.23',
            'description' => 'Investigación y desarrollo en ciencias médicas.',
            'level' => 'medium',
        ],
        [
            'code' => 'M7210.24',
            'description' => 'Investigación y desarrollo en ciencias agropecuarias.',
            'level' => 'medium',
        ],
        [
            'code' => 'M7210.25',
            'description' => 'Investigación y desarrollo interdisciplinarios centrados principalmente en las ciencias naturales y la ingeniería.',
            'level' => 'medium',
        ],
        [
            'code' => 'M7210.29',
            'description' => 'Otras actividades de investigación y desarrollo experimental en ciencias naturales y la ingeniería (propiedad intelectual, secreto comercial, patentes, etcétera).',
            'level' => 'medium',
        ],
        [
            'code' => 'M7220.01',
            'description' => 'Investigación y desarrollo en ciencias sociales.',
            'level' => 'medium',
        ],
        [
            'code' => 'M7220.02',
            'description' => 'Investigación y desarrollo en humanidades.',
            'level' => 'medium',
        ],
        [
            'code' => 'M7220.09',
            'description' => 'Otras actividades de investigación y desarrollo experimental en el campo de las ciencias sociales y las humanidades e interdisciplinarios.',
            'level' => 'medium',
        ],
        [
            'code' => 'M7310.01',
            'description' => 'Creación e inserción de anuncios en periódicos, revistas, programas de radio y de televisión, Internet y otros medios de difusión.',
            'level' => 'low',
        ],
        [
            'code' => 'M7310.02',
            'description' => 'Creación y colocación de anuncios de publicidad al aire libre en=> carteles, tableros, boletines y carteleras, decoración de escaparates, diseño de salas de exhibición, colocación de anuncios en automóviles y buses, actividades de perifoneo, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'M7310.03',
            'description' => 'Representación de medios de difusión, venta de tiempo y espacio en diversos medios de difusión interesados en la obtención de anuncios y publicidad aérea.',
            'level' => 'low',
        ],
        [
            'code' => 'M7310.04',
            'description' => 'Realización de campañas de comercialización y otros servicios de publicidad dirigidos a atraer y retener clientes=> promoción de productos, comercialización en el punto de venta, publicidad directa por correo y asesoramiento en marketing, creación de stands, otras estructuras y lugares de exhibición, distribución o entrega de materiales o muestras de publicidad.',
            'level' => 'low',
        ],
        [
            'code' => 'M7310.05',
            'description' => 'Alquiler de espacios de publicidad en vallas publicitarias, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'M7310.09',
            'description' => 'Otros servicios de publicidad n.c.p.',
            'level' => 'low',
        ],
        [
            'code' => 'M7320.01',
            'description' => 'Estudios sobre las posibilidades de comercialización (mercados potenciales), la aceptación y el grado de conocimiento de los productos y los hábitos de compra de los consumidores con el objeto de promover las ventas y desarrollar nuevos productos, incluidos análisis estadísticos de los resultados.',
            'level' => 'low',
        ],
        [
            'code' => 'M7320.02',
            'description' => 'Encuestas de opinión públicas sobre cuestiones políticas, económicas y sociales, así como sus análisis estadísticos de los resultados de esas encuestas.',
            'level' => 'low',
        ],
        [
            'code' => 'M7410.01',
            'description' => 'Diseño de telas, prendas de vestir, calzado, joyas, muebles y otros artículos de decoración interior y de moda, así como de otros efectos personales y enseres domésticos.',
            'level' => 'low',
        ],
        [
            'code' => 'M7410.02',
            'description' => 'Diseño industrial, es decir creación y desarrollo de diseños y especificaciones que optimizan la utilización, el valor y la apariencia de los productos, incluyendo la determinación de los materiales, la construcción, el mecanismo, la forma, el color y el acabado del producto, teniendo en cuenta las características y necesidades humanas y consideraciones relacionadas con la seguridad, el atractivo en el mercado, la eficiencia en la producción, la distribución, la utilización, y la facilidad de mantenimiento.',
            'level' => 'medium',
        ],
        [
            'code' => 'M7410.03',
            'description' => 'Actividades de diseñadores gráficos.',
            'level' => 'medium',
        ],
        [
            'code' => 'M7410.04',
            'description' => 'Actividades de decoradores de interiores.',
            'level' => 'medium',
        ],
        [
            'code' => 'M7410.09',
            'description' => 'Otras actividades especializadas de diseño.',
            'level' => 'medium',
        ],
        [
            'code' => 'M7420.01',
            'description' => 'Realización de retratos fotográficos para pasaportes, actos académicos, bodas, etcétera, incluido las filmaciones en vídeo de acontecimientos.',
            'level' => 'low',
        ],
        [
            'code' => 'M7420.02',
            'description' => 'Realización de fotografías para anuncios comerciales, para editoriales, y para actividades relacionadas con la moda, los bienes raíces o el turismo, actividades de fotógrafos de prensa.',
            'level' => 'low',
        ],
        [
            'code' => 'M7420.03',
            'description' => 'Realización de fotografía especializada como=> fotografía aérea, fotografía submarina, fotografía médica, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'M7420.04',
            'description' => 'Actividades de revelado, impresión, ampliación de fotografías y películas de los clientes, laboratorios de revelado de películas e impresión de fotografías; copia, restauración y retoque de fotografías, negativos de fotografías y películas, incluido actividades de tiendas de revelado rápido (que no formen parte de comercios de venta al por menor de cámaras).',
            'level' => 'low',
        ],
        [
            'code' => 'M7420.09',
            'description' => 'Otras actividades de fotografía=> montaje de diapositivas, microfilmación de documentos, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'M7490.11',
            'description' => 'Actividades de traducción e interpretación.',
            'level' => 'low',
        ],
        [
            'code' => 'M7490.12',
            'description' => 'Actividades de corretaje empresarial, gestión de la compra o venta de pequeñas y medianas empresas, incluidas prácticas profesionales y excluidas las actividades de corretaje inmobiliario.',
            'level' => 'low',
        ],
        [
            'code' => 'M7490.13',
            'description' => 'Actividades de intermediación en materia de patentes (gestión de la compra y venta de patentes).',
            'level' => 'low',
        ],
        [
            'code' => 'M7490.14',
            'description' => 'Actividades de tasación para antigüedades, joyas, etcétera, distintas de la tasación de inmuebles y de la relacionada con los seguros.',
            'level' => 'low',
        ],
        [
            'code' => 'M7490.15',
            'description' => 'Actividades de pronóstico del tiempo (previsión meteorológica).',
            'level' => 'low',
        ],
        [
            'code' => 'M7490.19',
            'description' => 'Otras actividades profesionales, científicas y técnicas=> redacción, diseños detallados realizados por dibujantes arquitectónicos, lectura de contadores de gas, agua y energía eléctrica, auditoría de efectos e información sobre fletes, medidores de cantidades de obra (certificación de obra), etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'M7490.21',
            'description' => 'Actividades de consultoría de seguridad.',
            'level' => 'low',
        ],
        [
            'code' => 'M7490.22',
            'description' => 'Actividades de consultoría de agronomía.',
            'level' => 'low',
        ],
        [
            'code' => 'M7490.23',
            'description' => 'Actividades de consultoría ambiental.',
            'level' => 'low',
        ],
        [
            'code' => 'M7490.24',
            'description' => 'Actividades de consultoría distintas de las de arquitectura, ingeniería y gestión.',
            'level' => 'low',
        ],
        [
            'code' => 'M7490.29',
            'description' => 'Otros tipos de consultoría técnica.',
            'level' => 'low',
        ],
        [
            'code' => 'M7490.90',
            'description' => 'Actividades realizadas por agencias en nombre de particulares para obtener contratos de actuación en películas, obras de teatro y otros espectáculos culturales y deportivos, y para ofertar libros, guiones, obras de arte, fotografías, etcétera, a editores, productores, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'M7500.01',
            'description' => 'Actividades de atención médica y control de animales, excluido los domésticos. Estas actividades son llevadas a cabo por veterinarios cualificados que prestan servicios en hospitales veterinarios así como también en establecimientos agropecuarios, a domicilio, en consultorios, quirófanos privados y en otros lugares.',
            'level' => 'low',
        ],
        [
            'code' => 'M7500.02',
            'description' => 'Actividades de atención médica y control de animales domésticos. Estas actividades son llevadas a cabo por veterinarios cualificados que prestan servicios en hospitales veterinarios así como también en establecimientos agropecuarios, en perreras, a domicilio, en consultorios, quirófanos privados y en otros lugares.',
            'level' => 'low',
        ],
        [
            'code' => 'M7500.03',
            'description' => 'Actividades de asistentes de veterinario u otro personal veterinario auxiliar.',
            'level' => 'low',
        ],
        [
            'code' => 'M7500.04',
            'description' => 'Actividades clínico patológicas y otras actividades de diagnóstico relacionadas con los animales.',
            'level' => 'low',
        ],
        [
            'code' => 'M7500.05',
            'description' => 'Actividades de veterinaria que requieren la utilización de ambulancia.',
            'level' => 'low',
        ],
        [
            'code' => 'N7710.00',
            'description' => 'Actividades de alquiler con fines operativos de automóviles de pasajeros, camiones, camionetas, remolques y vehículos de recreo. (sin conductor).',
            'level' => 'low',
        ],
        [
            'code' => 'N7721.01',
            'description' => 'Alquiler de embarcaciones de recreo, canoas y veleros.',
            'level' => 'medium',
        ],
        [
            'code' => 'N7721.02',
            'description' => 'Alquiler de bicicletas.',
            'level' => 'low',
        ],
        [
            'code' => 'N7721.03',
            'description' => 'Alquiler de hamacas de playa y sombrillas (parasoles).',
            'level' => 'low',
        ],
        [
            'code' => 'N7721.04',
            'description' => 'Alquiler de esquís.',
            'level' => 'medium',
        ],
        [
            'code' => 'N7721.09',
            'description' => 'Alquiler de otros tipos de equipo de deporte, alas delta con motor y sin motor, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'N7722.00',
            'description' => 'Alquiler de cintas de video, discos, CD, DVD, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'N7729.01',
            'description' => 'Alquiler de productos textiles, prendas de vestir y calzado.',
            'level' => 'low',
        ],
        [
            'code' => 'N7729.02',
            'description' => 'Alquiler de muebles, artículos de cerámica y de vidrio, utensilios de cocina, vajillas, aparatos eléctricos y otros artículos de uso doméstico.',
            'level' => 'low',
        ],
        [
            'code' => 'N7729.03',
            'description' => 'Alquiler de joyas, instrumentos musicales, material de escenografía y de vestuario.',
            'level' => 'low',
        ],
        [
            'code' => 'N7729.04',
            'description' => 'Alquiler de libros, periódicos y revistas.',
            'level' => 'low',
        ],
        [
            'code' => 'N7729.09',
            'description' => 'Alquiler y arrendamiento de otros efectos personales y enseres domésticos=> maquinaría y equipo de bricolaje, por ejemplo=> herramientas para reparaciones domésticas, flores y plantas, equipo electrónico de uso doméstico, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'N7730.11',
            'description' => 'Alquiler con fines operativos, sin operadores, de otros tipos de maquinaria y equipo operacional que suelen ser utilizados como bienes de capital por las industrias=> motores y turbinas, máquinas herramienta, equipo de minería y de extracción de petróleo.',
            'level' => 'low',
        ],
        [
            'code' => 'N7730.12',
            'description' => 'Alquiler con fines operativos, sin operadores, de otros tipos de maquinaria y equipo operacional que suelen ser utilizados como bienes de capital por las industrias=> equipo profesional de radio, televisión y comunicaciones; equipo de producción de películas cinematográficas.',
            'level' => 'low',
        ],
        [
            'code' => 'N7730.13',
            'description' => 'Alquiler con fines operativos, sin operadores, de otros tipos de maquinaria y equipo operacional que suelen ser utilizados como bienes de capital por las industrias=> equipo de medición y control.',
            'level' => 'low',
        ],
        [
            'code' => 'N7730.14',
            'description' => 'Alquiler con fines operativos de maquinaria y equipo de uso agrícola y forestal sin operadores=> tractores utilizados en actividades agropecuarias y silvícolas; tractores de manejo a pie (dirigidos por una persona desde fuera), segadoras, incluidas segadoras de césped, remolques y semirremolques de carga y descarga automática, máquinas utilizadas en la agricultura para preparar los suelos, plantar o abonar, como arados, esparcidoras de estiércol, sembradoras, rastrilladoras, máquinas de ordeñar; aspersores de uso agrícola, máquinas para la recolección y trilla, como cosechadoras, trilladoras, cribadoras; máquinas utilizadas en la avicultura y apicultura, equipo para la preparación de pienso, máquinas para limpiar, seleccionar y clasificar huevos, fruta, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'N7730.15',
            'description' => 'Alquiler con fines operativos de maquinaria y equipo para la construcción e ingeniería civil sin operadores=> camiones grúa, andamios y plataformas de trabajo, sin montaje ni desmantelamiento.',
            'level' => 'low',
        ],
        [
            'code' => 'N7730.16',
            'description' => 'Alquiler con fines operativos de maquinaria y equipo de oficina sin operador=> mobiliario de oficina, computadoras y equipo periférico, máquinas copiadoras, máquinas de escribir y máquinas de procesamiento de texto, máquinas registradoras, calculadoras electrónicas, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'N7730.19',
            'description' => 'Alquiler con fines operativos, sin operadores, de otros tipos de maquinaria científica, comercial e industrial y equipo operacional que suelen ser utilizados como bienes de capital por las industrias.',
            'level' => 'low',
        ],
        [
            'code' => 'N7730.21',
            'description' => 'Alquiler con fines operativos de equipo de transporte terrestre (excepto vehículos automotores) sin conductor de motocicletas, caravanas, furgonetas de acampada (campers), etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'N7730.22',
            'description' => 'Alquiler con fines operativos de equipo de transporte terrestre (excepto vehículos automotores) sin conductor de vehículos ferroviarios.',
            'level' => 'low',
        ],
        [
            'code' => 'N7730.23',
            'description' => 'Alquiler con fines operativos de equipo de transporte acuático sin operador=> barcos y buques comerciales.',
            'level' => 'low',
        ],
        [
            'code' => 'N7730.24',
            'description' => 'Alquiler con fines operativos de equipo de transporte aéreo sin operador=> aeronaves, globos de aire caliente.',
            'level' => 'low',
        ],
        [
            'code' => 'N7730.31',
            'description' => 'Alquiler de construcciones móviles temporales para alojamiento u oficinas.',
            'level' => 'low',
        ],
        [
            'code' => 'N7730.32',
            'description' => 'Alquiler de contenedores.',
            'level' => 'low',
        ],
        [
            'code' => 'N7730.33',
            'description' => 'Alquiler de paletas.',
            'level' => 'low',
        ],
        [
            'code' => 'N7730.34',
            'description' => 'Alquiler de animales=> rebaños, caballos de carreras, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'N7740.01',
            'description' => 'Arrendamiento de productos de propiedad intelectual (excepto obras protegidas por derechos de autor, como libros o programas informáticos).',
            'level' => 'low',
        ],
        [
            'code' => 'N7740.02',
            'description' => 'Recepción de regalías o derechos de licencia por la utilización de=> franquicias, entidades patentadas, marcas de fábrica o de comercio o marcas de servicios y nombres comerciales.',
            'level' => 'low',
        ],
        [
            'code' => 'N7740.03',
            'description' => 'Recepción de regalías o derechos de licencia por la utilización de=> prospección, explotación y evaluación de recursos minerales.',
            'level' => 'low',
        ],
        [
            'code' => 'N7740.09',
            'description' => 'Otras actividades de arrendamiento de propiedad intelectual y productos similares, excepto obras protegidas por derecho de autor.',
            'level' => 'low',
        ],
        [
            'code' => 'N7810.00',
            'description' => 'Actividades de búsqueda, selección, recomendación y colocación de personal, incluida la colocación o búsqueda de ejecutivos, Actividades de las agencias y oficinas de selección de actores, por ejemplo, para obras de teatro y Actividades de agencia de colocación por Internet (On line).',
            'level' => 'low',
        ],
        [
            'code' => 'N7820.00',
            'description' => 'Suministro de trabajadores para las actividades de los clientes por períodos limitados de tiempo con el fin de reemplazar a empleados de los clientes o suplementar temporalmente su fuerza de trabajo, cuando los trabajadores suministrados son empleados de las propias agencias de empleo temporal. Las unidades clasificadas en esta clase no se encargan de la supervisión directa de sus empleados en los lugares de trabajo de los clientes.',
            'level' => 'medium',
        ],
        [
            'code' => 'N7830.00',
            'description' => 'Suministro de recursos humanos para las actividades de los clientes. La provisión de recursos humanos se realiza por lo general a largo plazo o de forma permanente, y las unidades clasificadas en esta clase pueden desempeñar una amplia gama de funciones conexas de gestión de recursos humanos. Las unidades clasificadas aquí constituyen los empleadores oficiales de los empleados en lo que respecta a la nómina, los impuestos y otros aspectos fiscales y de recursos humanos, pero no se encargan de la dirección ni de la supervisión del trabajo de esos empleados.',
            'level' => 'medium',
        ],
        [
            'code' => 'N7911.00',
            'description' => 'Actividades de las agencias de viajes dedicadas principalmente a vender servicios de viajes, de viajes organizados, de transporte y de alojamiento, al por mayor o al por menor, al público en general y a clientes comerciales.',
            'level' => 'low',
        ],
        [
            'code' => 'N7912.00',
            'description' => 'Actividad de Operadores turísticos que se encargan de la planificación y organización de paquetes de servicios de viajes (tours) para su venta a través de agencias de viajes o por los propios operadores turísticos. Esos viajes organizados (tours) pueden incluir la totalidad o parte de las siguientes características=> transporte, alojamiento, comidas, visitas a museos, lugares históricos o culturales, espectáculos teatrales, musicales o deportivos.',
            'level' => 'low',
        ],
        [
            'code' => 'N7990.01',
            'description' => 'Prestación de otros servicios de reservas relacionados con los viajes=> reservas de transporte, hoteles, restaurantes, alquiler de automóviles, entretenimiento y deporte, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'N7990.02',
            'description' => 'Prestación de servicios de intercambio en régimen de tiempo compartido o multipropiedad.',
            'level' => 'low',
        ],
        [
            'code' => 'N7990.03',
            'description' => 'Actividades de venta de boletos para obras de teatro, competiciones deportivas y otras actividades de diversión y entretenimiento.',
            'level' => 'low',
        ],
        [
            'code' => 'N7990.04',
            'description' => 'Prestación de servicios de asistencia a los turistas=> suministro a los clientes de información sobre los viajes, actividades de guías de turismo.',
            'level' => 'low',
        ],
        [
            'code' => 'N7990.05',
            'description' => 'Actividades de promoción turística.',
            'level' => 'low',
        ],
        [
            'code' => 'N8010.01',
            'description' => 'Servicios de vehículos blindados (transporte de valores).',
            'level' => 'high',
        ],
        [
            'code' => 'N8010.02',
            'description' => 'Servicios de escolta (guardaespaldas).',
            'level' => 'high',
        ],
        [
            'code' => 'N8010.03',
            'description' => 'Servicios de guardias de seguridad.',
            'level' => 'medium',
        ],
        [
            'code' => 'N8010.09',
            'description' => 'Otras actividades de seguridad privada=> detector de mentiras (polígrafo), huellas dactilares, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'N8020.01',
            'description' => 'Actividades de supervisión a distancia de sistemas electrónicos de seguridad, como los de alarma contra robos y contra incendios, incluido su instalación y mantenimiento. La unidad que lleva a cabo esta actividad puede dedicarse también a la venta de estos sistemas de seguridad.',
            'level' => 'medium',
        ],
        [
            'code' => 'N8020.02',
            'description' => 'Actividades de instalación, reparación, reconstrucción y ajuste de dispositivos mecánicos o eléctricos de cierre, cajas de caudales y cajas fuertes. La unidad que lleva a cabo esta actividad puede dedicarse también a la venta de estos dispositivos mecánicos o eléctricos de cierre, cajas de caudales y cajas fuertes.',
            'level' => 'medium',
        ],
        [
            'code' => 'N8030.00',
            'description' => 'Actividades de todo tipo de investigadores privados, independientemente del tipo de cliente y de la finalidad de la investigación, servicios de investigación y de detectives y otras actividades de investigación.',
            'level' => 'high',
        ],
        [
            'code' => 'N8110.00',
            'description' => 'Prestación de una combinación de servicios de apoyo en las instalaciones de los clientes, como limpieza general de interiores, mantenimiento, eliminación de la basuras, seguridad y vigilancia, envío de correo, recepción, lavandería y servicios conexos, a fin de facilitar el funcionamiento de las instalaciones. Las unidades clasificadas en esta clase proporcionan personal para la realización de estas actividades de apoyo, pero no participan en las actividades principales de los clientes ni son responsables de ellas.',
            'level' => 'low',
        ],
        [
            'code' => 'N8121.00',
            'description' => 'Limpieza general (no especializada) de todo tipo de edificios, estudios profesionales, locales comerciales, profesionales y edificios con múltiples unidades residenciales como=> oficinas, casas y departamentos, fábricas, establecimientos comerciales e instituciones. Estas actividades consisten sobre todo en la limpieza de interiores, aunque pueden abarcar la limpieza de zonas exteriores conexas, como ventanas y pasadizos.',
            'level' => 'low',
        ],
        [
            'code' => 'N8129.11',
            'description' => 'Actividades de limpieza exterior de edificios de todo tipo, como oficinas, fábricas, establecimientos comerciales, instituciones y otros locales comerciales, profesionales y edificios con múltiples unidades residenciales (multifamiliares).',
            'level' => 'high',
        ],
        [
            'code' => 'N8129.12',
            'description' => 'Actividades de limpieza especializada de edificios, como limpieza de ventanas, limpieza de chimeneas y hogares de chimenea, hornos, incineradores, limpieza de maquinaria industrial, calderas, conductos de ventilación, extractores de aire, actividades de limpieza de edificios e instalaciones industriales n.c.p.',
            'level' => 'high',
        ],
        [
            'code' => 'N8129.91',
            'description' => 'Servicios de limpieza y mantenimiento de piscinas.',
            'level' => 'medium',
        ],
        [
            'code' => 'N8129.92',
            'description' => 'Limpieza de trenes, autobuses, aeronaves, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'N8129.93',
            'description' => 'Limpieza del interior de camiones cisterna y buques petroleros.',
            'level' => 'medium',
        ],
        [
            'code' => 'N8129.94',
            'description' => 'Actividades de desinfección, desratización y exterminio de plagas.',
            'level' => 'medium',
        ],
        [
            'code' => 'N8129.95',
            'description' => 'Actividades de barrido de calles, retirada de nieve y hielo.',
            'level' => 'medium',
        ],
        [
            'code' => 'N8129.99',
            'description' => 'Otras actividades de limpieza=> limpieza de botellas, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'N8130.11',
            'description' => 'Plantación, cuidado y mantenimiento de parques y jardines para=> viviendas con jardín de uso privado o comunitario, edificios públicos y semipúblicos (hospitales, escuelas, edificios administrativos, iglesias, etcétera), edificios industriales y comerciales.',
            'level' => 'low',
        ],
        [
            'code' => 'N8130.12',
            'description' => 'Plantación, cuidado y mantenimiento de parques y jardines para=> terrenos municipales (parques, zonas verdes, cementerios, etcétera) y ajardinamiento de vías públicas (carreteras, líneas de ferrocarril y de tranvía, vías de navegación interior, puertos).',
            'level' => 'high',
        ],
        [
            'code' => 'N8130.21',
            'description' => 'Plantación, cuidado y mantenimiento de vegetación en edificios (azoteas, fachadas, patios interiores), terrenos deportivos (campos de fútbol, campos de golf, etcétera), parques infantiles, praderas para tomar el sol y otros parques de recreo.',
            'level' => 'medium',
        ],
        [
            'code' => 'N8130.22',
            'description' => 'Plantación, cuidado y mantenimiento de vegetación en agua embalsada y corriente (fuentes, estanques, piscinas, acequias, cursos de agua, sistemas de aguas residuales).',
            'level' => 'high',
        ],
        [
            'code' => 'N8130.23',
            'description' => 'Actividades de mantenimiento de terrenos en buenas condiciones ecológicas como la plantación de plantas de protección contra el ruido, el viento, la erosión, la visibilidad y el deslumbramiento.',
            'level' => 'medium',
        ],
        [
            'code' => 'N8211.00',
            'description' => 'Actividades de prestación de una serie de servicios administrativos de oficina corrientes, como recepción, planificación financiera, facturación y registro, personal y distribución física (servicios de mensajería) y logística, a cambio de una retribución o por contrato.',
            'level' => 'low',
        ],
        [
            'code' => 'N8219.01',
            'description' => 'Servicios de apoyo de secretaría, transcripción de documentos y otros servicios de secretaría; escritura de cartas o historiales profesionales (currículum), preparación de documentos, edición de documentos y corrección de pruebas; actividades de mecanografía, procesamiento de texto y edición electrónica.',
            'level' => 'low',
        ],
        [
            'code' => 'N8219.02',
            'description' => 'Alquiler de apartados de correo y otras actividades relacionadas con el correo (excepto la publicidad directa por correo).',
            'level' => 'low',
        ],
        [
            'code' => 'N8219.03',
            'description' => 'Actividades de fotocopiado y realización de duplicados.',
            'level' => 'low',
        ],
        [
            'code' => 'N8219.09',
            'description' => 'Otros servicios de copia de documentos no acompañados de servicios de impresión, como los de impresión en Offset, impresión rápida, impresión digital o servicios de preparación para la prensa, y otros servicios especializados de oficina, diseño de procesos (cianotipia, blueprinting), etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'N8220.01',
            'description' => 'Actividades de centros que atienden a llamadas de clientes utilizando operadores humanos, sistemas de distribución automática de llamadas, sistemas informatizados de telefonía, sistemas interactivos de respuesta de voz o métodos similares para recibir pedidos, proporcionar información sobre productos, responder a solicitudes de asistencia de los clientes o atender reclamaciones (call - center).',
            'level' => 'low',
        ],
        [
            'code' => 'N8220.02',
            'description' => 'Actividades de centros que realizan llamadas, usando técnicas similares, para vender o promocionar bienes o servicios a clientes potenciales, realizar estudios de mercado o encuestas de opinión pública y actividades similares para los clientes.',
            'level' => 'low',
        ],
        [
            'code' => 'N8230.00',
            'description' => 'Organización, promoción y/o gestión de eventos como exposiciones comerciales o empresariales, convenciones, conferencias y reuniones, estén incluidas o no la gestión de esas instalaciones y la dotación de personal necesario para su funcionamiento.',
            'level' => 'low',
        ],
        [
            'code' => 'N8291.01',
            'description' => 'Actividades de cobro de cantidades adeudadas y entrega de esos fondos a los clientes, como servicios de cobro de deudas o facturas.',
            'level' => 'low',
        ],
        [
            'code' => 'N8291.02',
            'description' => 'Actividades de recopilación de información, como historiales de crédito y de empleo de personas e historiales de crédito de empresas, y suministro de esa información a instituciones financieras, empresas de venta al por menor y otras entidades que necesitan poder evaluar la solvencia de esas personas y empresas.',
            'level' => 'low',
        ],
        [
            'code' => 'N8292.01',
            'description' => 'Actividades de envasado y empaquetado a cambio de una retribución o por contrato, con intervención o no de procesos automatizados=> embotellado de líquidos, incluidos alimentos y bebidas, envasado o empaquetado de sólidos (embalaje con plástico de burbujas, recubrimiento con papel aluminio, etcétera).',
            'level' => 'medium',
        ],
        [
            'code' => 'N8292.02',
            'description' => 'Actividades de etiquetado, estampado e impresión.',
            'level' => 'low',
        ],
        [
            'code' => 'N8292.09',
            'description' => 'Otras actividades de envasado y empaquetado=> actividades de empaquetado de envíos y envoltura de regalos.',
            'level' => 'low',
        ],
        [
            'code' => 'N8299.01',
            'description' => 'Actividades de elaboración de actas textuales y registro en taquigrafía (estenotipia) de procedimientos jurídicos en directo y transcripción de los materiales correspondientes, como=> servicios de redacción de actas judiciales o de registro en estenotipia, servicios públicos de estenografía.',
            'level' => 'low',
        ],
        [
            'code' => 'N8299.02',
            'description' => 'Actividades de subtitulado simultáneo para sordos en tiempo real de retransmisiones en directo por televisión, reuniones, conferencias, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'N8299.03',
            'description' => 'Servicios de organización de la recaudación de fondos a cambio de una retribución o por contrata, servicios de recuperación.',
            'level' => 'low',
        ],
        [
            'code' => 'N8299.09',
            'description' => 'Otras actividades de apoyo que se proporcionan habitualmente a las empresas y que no clasifican en otra parte=> servicio de recogida de monedas de parquímetros, servicios de anillados y plastificados, preclasificación de correo, impresión de código de barras, codificación de la barra de dirección, programas de fidelización, subasta por cuenta propia, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'O8411.01',
            'description' => 'Desempeño de las funciones ejecutivas y legislativas de los órganos y organismos centrales, regionales y locales.',
            'level' => 'low',
        ],
        [
            'code' => 'O8411.02',
            'description' => 'Administración y supervisión de los asuntos fiscales=> aplicación de los sistemas tributarios, recaudación de derechos e impuestos sobre bienes e investigación de casos de evasión de impuestos.',
            'level' => 'low',
        ],
        [
            'code' => 'O8411.03',
            'description' => 'Administración de aduanas.',
            'level' => 'low',
        ],
        [
            'code' => 'O8411.04',
            'description' => 'Ejecución presupuestaria y administración de fondos públicos (hacienda) y de la deuda pública=> obtención y recepción de fondos y fiscalización de su desembolso.',
            'level' => 'low',
        ],
        [
            'code' => 'O8411.05',
            'description' => 'Aplicación de la política general de investigación y desarrollo (civiles) y administración de los fondos correspondientes.',
            'level' => 'low',
        ],
        [
            'code' => 'O8411.06',
            'description' => 'Administración y gestión de los servicios generales de planificación económica, social y de estadística en los diversos niveles de la administración pública.',
            'level' => 'low',
        ],
        [
            'code' => 'O8412.11',
            'description' => 'Administración pública de programas destinados a promover el bienestar personal en salud; administración de políticas de investigación y desarrollo adoptadas en este ámbito y de los fondos correspondientes.',
            'level' => 'low',
        ],
        [
            'code' => 'O8412.12',
            'description' => 'Administración pública de programas destinados a promover el bienestar personal en educación, cultura y deporte; administración de políticas de investigación y desarrollo adoptadas en esos ámbitos y de los fondos correspondientes, concesión de becas públicas a artistas.',
            'level' => 'low',
        ],
        [
            'code' => 'O8412.13',
            'description' => 'Administración pública de programas destinados a promover el bienestar personal en esparcimiento; administración de políticas de investigación y desarrollo adoptadas en este ámbito y de los fondos correspondientes, patrocinio de actividades recreativas y culturales.',
            'level' => 'low',
        ],
        [
            'code' => 'O8412.14',
            'description' => 'Administración pública de programas destinados a promover el bienestar personal en medio ambiente; administración de políticas de investigación y desarrollo adoptadas en este ámbito y de los fondos correspondientes, administración de programas de protección del medio ambiente.',
            'level' => 'low',
        ],
        [
            'code' => 'O8412.15',
            'description' => 'Administración pública de programas destinados a promover el bienestar personal en vivienda; administración de políticas de investigación y desarrollo adoptadas en este ámbito y de los fondos correspondientes, administración de programas de vivienda.',
            'level' => 'low',
        ],
        [
            'code' => 'O8412.16',
            'description' => 'Administración pública de programas destinados a promover el bienestar personal en servicios sociales; administración de políticas de investigación y desarrollo adoptadas en este ámbito y de los fondos correspondientes.',
            'level' => 'low',
        ],
        [
            'code' => 'O8412.91',
            'description' => 'Actividades de administración de programa de suministro de agua potable.',
            'level' => 'low',
        ],
        [
            'code' => 'O8412.92',
            'description' => 'Actividades de administración de servicios de recolección y eliminación de desperdicios.',
            'level' => 'low',
        ],
        [
            'code' => 'O8413.11',
            'description' => 'Administración y regulación pública, incluida la concesión de subvenciones, de los distintos sectores económicos de la agricultura, ganadería, silvicultura y pesca.',
            'level' => 'low',
        ],
        [
            'code' => 'O8413.12',
            'description' => 'Administración y regulación públicas, incluida la concesión de subvenciones, de los distintos sectores económicos de la ordenación de tierras.',
            'level' => 'low',
        ],
        [
            'code' => 'O8413.13',
            'description' => 'Administración y regulación públicas, incluida la concesión de subvenciones, de los distintos sectores económicos de energía y minería.',
            'level' => 'low',
        ],
        [
            'code' => 'O8413.14',
            'description' => 'Administración y regulación públicas, incluida la concesión de subvenciones, de los distintos sectores económicos de infraestructura.',
            'level' => 'low',
        ],
        [
            'code' => 'O8413.15',
            'description' => 'Administración y regulación públicas, incluida la concesión de subvenciones, de los distintos sectores económicos de transporte.',
            'level' => 'low',
        ],
        [
            'code' => 'O8413.16',
            'description' => 'Administración y regulación públicas, incluida la concesión de subvenciones, de los distintos sectores económicos de comunicaciones.',
            'level' => 'low',
        ],
        [
            'code' => 'O8413.17',
            'description' => 'Administración y regulación públicas, incluida la concesión de subvenciones, de los distintos sectores económicos de hoteles y turismo.',
            'level' => 'low',
        ],
        [
            'code' => 'O8413.18',
            'description' => 'Administración y regulación públicas, incluida la concesión de subvenciones, de los distintos sectores económicos de comercio al por mayor y al por menor.',
            'level' => 'low',
        ],
        [
            'code' => 'O8413.91',
            'description' => 'Administración de las políticas de investigación y desarrollo destinadas a mejorar los resultados económicos y de los fondos correspondientes.',
            'level' => 'low',
        ],
        [
            'code' => 'O8413.92',
            'description' => 'Administración de las cuestiones laborales de carácter general y aplicación de medidas de desarrollo regional, por ejemplo=> medidas tendientes a reducir el desempleo.',
            'level' => 'low',
        ],
        [
            'code' => 'O8421.01',
            'description' => 'Administración y funcionamiento del ministerio de relaciones exteriores de las misiones diplomáticas, consulares acreditadas en el extranjero y ante organizaciones internacionales; administración, dirección y respaldo de servicios informativos y culturales que se prestan en el extranjero.',
            'level' => 'low',
        ],
        [
            'code' => 'O8421.02',
            'description' => 'Gestión de asuntos relacionados con el comercio exterior, la financiación internacional y cuestiones de carácter técnico.',
            'level' => 'low',
        ],
        [
            'code' => 'O8421.03',
            'description' => 'Suministro de ayuda a otros países, sea o no canalizado a través de organismos internacionales.',
            'level' => 'low',
        ],
        [
            'code' => 'O8421.04',
            'description' => 'Suministro de asistencia militar a otros países.',
            'level' => 'high',
        ],
        [
            'code' => 'O8422.01',
            'description' => 'Administración, supervisión y gestión de asuntos y fuerzas de defensa militar del ejército de tierra, marina, fuerza aérea y espacial como=> actividades de fuerzas de reserva y auxiliares del sistema de defensa, logística militar (abastecimiento de equipo, estructuras, suministros, etcétera), actividades sanitarias para el personal militar en campaña.',
            'level' => 'high',
        ],
        [
            'code' => 'O8422.02',
            'description' => 'Actividades de mandos y fuerzas de ingeniería, transporte, comunicaciones, inteligencia, suministro de materiales, personal y otras fuerzas conexas no destinados al combate.',
            'level' => 'high',
        ],
        [
            'code' => 'O8422.03',
            'description' => 'Actividades de administración, gestión y el respaldo de fuerzas de defensa civil, prestación de apoyo a la elaboración de planes de emergencia y la ejecución de maniobras con la participación de instituciones civiles y de la población.',
            'level' => 'high',
        ],
        [
            'code' => 'O8422.04',
            'description' => 'Administración de políticas de investigación y desarrollo relacionadas con la defensa y los fondos correspondientes.',
            'level' => 'high',
        ],
        [
            'code' => 'O8423.01',
            'description' => 'Administración y dirección de fuerzas de policía, regulares y auxiliares que dependen de las autoridades públicas, de fuerzas de vigilancia portuaria, fronteriza y costera y de otras fuerzas especiales de policía entre cuyas funciones se cuentan la ordenación del tráfico, el registro de extranjeros y el mantenimiento de ficheros de detenidos.',
            'level' => 'high',
        ],
        [
            'code' => 'O8423.02',
            'description' => 'Prevención y extinción de incendios=> administración y funcionamiento de cuerpos ordinarios y auxiliares de bomberos que dependen de las autoridades públicas que realizan actividades de prevención y extinción de incendios, rescate de personas y animales, asistencia en desastres cívicos, inundaciones, accidentes de tráfico, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'O8423.03',
            'description' => 'Administración y funcionamiento de tribunales civiles, administrativos y penales, de tribunales militares y del sistema judicial en general, incluido el desempeño de funciones de representación jurídica y asistencia letrada en nombre del sector público y en nombre de terceros, cuando hay fondos o servicios públicos previstos con ese objeto; emisión de fallos e interpretación de la ley y arbitraje en procedimientos civiles.',
            'level' => 'high',
        ],
        [
            'code' => 'O8423.04',
            'description' => 'Administración de prisiones y prestación de servicios correccionales, incluidos los de rehabilitación, independientemente de que su administración y gestión se encomiende a unidades públicas o a unidades privadas a cambio de una retribución o por contrato.',
            'level' => 'high',
        ],
        [
            'code' => 'O8423.05',
            'description' => 'Actividades de abastecimiento de suministros para su utilización en situaciones de emergencia interna en tiempos de paz causadas por desastres.',
            'level' => 'high',
        ],
        [
            'code' => 'O8430.00',
            'description' => 'Financiación y administración de los programas de servicios públicos de seguridad social=> seguros de enfermedad, contra accidentes laborales y de desempleo, pensiones de jubilación, programas que cubren la pérdida de ingresos en casos de maternidad, incapacidad temporal, viudez, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'P8510.11',
            'description' => 'La educación preprimaria o inicial (es el proceso de acompañamiento al desarrollo integral que considera los aspectos cognitivos, afectivo, psicomotriz, social, de identidad, autonomía y pertinencia a la comunidad diseñada principalmente para introducir a los niños y niñas, desde los tres años hasta los cinco años de edad en un entorno educativo de tipo escolar, es decir, servir de puente entre el hogar y el medio escolar).',
            'level' => 'low',
        ],
        [
            'code' => 'P8510.12',
            'description' => 'Educación preprimaria ó inicial especial, para alumnos con discapacidad.',
            'level' => 'low',
        ],
        [
            'code' => 'P8510.21',
            'description' => 'Educación primaria (desarrolla las capacidades, habilidades, destrezas y competencias de las niñas, niños y adolescentes, está compuesta por siete años de estudios, comprende el impartir formación académica y otras tareas relacionadas a los estudiantes de primero hasta séptimo de básica, que proporcionan una sólida educación para lectura, escritura y matemáticas, así como un nivel elemental de comprensión de disciplinas como=> historia, geografía, ciencias, etcétera; puede ser provista en salones de clases o a través de radio, televisión, Internet, correspondencia o en el hogar, incluye las actividades de escuelas unidocentes).',
            'level' => 'low',
        ],
        [
            'code' => 'P8510.22',
            'description' => 'Educación primaria especial, para alumnos con discapacidad.',
            'level' => 'low',
        ],
        [
            'code' => 'P8510.23',
            'description' => 'Programas de alfabetización para adultos en el nivel primario educativo. La educación puede ser provista en salones de clases o a través de radio, televisión, Internet, correspondencia o en el hogar.',
            'level' => 'low',
        ],
        [
            'code' => 'P8521.01',
            'description' => 'Educación secundaria (comprende seis años de educación a continuación de la educación primaria, desde octavo de básica hasta tercero de bachillerato, cursando un tronco común de asignaturas generales, optando por un bachillerato en ciencias o técnico. La educación puede ser provista en salones de clases o a través de radio, televisión, Internet, correspondencia o en el hogar.',
            'level' => 'low',
        ],
        [
            'code' => 'P8521.02',
            'description' => 'Educación en bachilleratos complementarios (fortalece la formación obtenida en el bachillerato general unificado, es de carácter optativo y su duración es de un año adicional y pueden ser del tipo=> bachillerato técnico productivo y bachillerato artístico. La educación puede ser provista en salones de clases o a través de radio, televisión, Internet, correspondencia o en el hogar).',
            'level' => 'low',
        ],
        [
            'code' => 'P8521.03',
            'description' => 'Educación especial secundaria para estudiantes discapacitados. La educación puede ser provista en salones de clases o a través de radio, televisión, Internet, correspondencia o en el hogar.',
            'level' => 'low',
        ],
        [
            'code' => 'P8522.01',
            'description' => 'Enseñanza técnica y profesional de nivel inferior al de la enseñanza superior, capacitación para guías turísticos, cocineros y otro personal de hoteles y restaurantes.',
            'level' => 'low',
        ],
        [
            'code' => 'P8522.02',
            'description' => 'Escuelas de conducir para chóferes profesionales=> de camiones, buses, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'P8522.03',
            'description' => 'Escuelas de cosmética y de peluquería.',
            'level' => 'low',
        ],
        [
            'code' => 'P8522.04',
            'description' => 'Educación especial, enseñanza de formación técnica y profesional para alumnos con discapacidad.',
            'level' => 'low',
        ],
        [
            'code' => 'P8522.05',
            'description' => 'Capacitación en reparación de computadoras.',
            'level' => 'low',
        ],
        [
            'code' => 'P8530.01',
            'description' => 'Educación de postbachillerato y nivel técnico superior, destinado a la formación y capacitación para labores de carácter operativo, corresponden a este nivel los títulos profesionales de técnico o tecnólogo.',
            'level' => 'low',
        ],
        [
            'code' => 'P8530.02',
            'description' => 'Educación de tercer nivel, destinado a la formación básica en una disciplina o a la capacitación para el ejercicio de una profesión. Corresponden a este nivel el grado de licenciado y los títulos profesionales universitarios o politécnicos, que son equivalentes, incluido las actividades de escuelas de artes interpretativas que imparten enseñanza superior.',
            'level' => 'low',
        ],
        [
            'code' => 'P8530.03',
            'description' => 'Educación de cuarto nivel o de posgrado, destinado a la especialización científica o entrenamiento profesional avanzado. Corresponden a este nivel los títulos intermedios de postgrado de especialista y diploma superior y los grados de magíster y doctor.',
            'level' => 'low',
        ],
        [
            'code' => 'P8541.01',
            'description' => 'Enseñanza en adiestramiento deportivo=> béisbol, basketball, volleyball, fútbol, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'P8541.02',
            'description' => 'Enseñanza de gimnasia, yoga.',
            'level' => 'low',
        ],
        [
            'code' => 'P8541.03',
            'description' => 'Enseñanza de equitación en academias o escuelas.',
            'level' => 'low',
        ],
        [
            'code' => 'P8541.04',
            'description' => 'Enseñanza de natación.',
            'level' => 'low',
        ],
        [
            'code' => 'P8541.05',
            'description' => 'Enseñanza de artes marciales.',
            'level' => 'low',
        ],
        [
            'code' => 'P8541.09',
            'description' => 'Otro tipo de enseñanza deportiva y recreativa como=> actividades de adiestramiento en campamentos deportivos, clases de juego de cartas por ejemplo bridge, actividades de instructores, profesores y entrenadores deportivos, enseñanza para animadores deportivos',
            'level' => 'low',
        ],
        [
            'code' => 'P8542.01',
            'description' => 'Clases de piano y otras actividades de formación musical.',
            'level' => 'low',
        ],
        [
            'code' => 'P8542.02',
            'description' => 'Actividades de formación artística, escuelas de teatro, escuelas de bellas artes y escuelas de artes interpretativas (excepto las académicas).',
            'level' => 'low',
        ],
        [
            'code' => 'P8542.03',
            'description' => 'Escuelas y academias de baile.',
            'level' => 'low',
        ],
        [
            'code' => 'P8542.04',
            'description' => 'Escuelas de fotografía (excepto las comerciales).',
            'level' => 'low',
        ],
        [
            'code' => 'P8549.11',
            'description' => 'Actividades de enseñanza que no puede asignarse a un nivel determinado, incluye los procesos de formación docente de capacitación y perfeccionamiento.',
            'level' => 'low',
        ],
        [
            'code' => 'P8549.12',
            'description' => 'Actividades de servicios de deberes dirigidos, tutoría académica, preparación para el ingreso a la universidad, centros de enseñanza que ofrecen cursos de recuperación y cursos de repaso para exámenes profesionales.',
            'level' => 'low',
        ],
        [
            'code' => 'P8549.13',
            'description' => 'Actividades de enseñanza de idiomas y clases de conversación.',
            'level' => 'low',
        ],
        [
            'code' => 'P8549.14',
            'description' => 'Actividades de enseñanza de métodos de lectura rápida y cursos de oratoria.',
            'level' => 'low',
        ],
        [
            'code' => 'P8549.15',
            'description' => 'Actividades de formación religiosa.',
            'level' => 'low',
        ],
        [
            'code' => 'P8549.16',
            'description' => 'Actividades de centros de capacitación artesanal=> corte y confección, carpintería, tallado en madera, manualidades, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'P8549.17',
            'description' => 'Actividades de capacitación en informática.',
            'level' => 'low',
        ],
        [
            'code' => 'P8549.91',
            'description' => 'Actividades de escuelas de conducir que no conceden certificados ni permisos profesionales.',
            'level' => 'low',
        ],
        [
            'code' => 'P8549.92',
            'description' => 'Actividades de escuelas de vuelo.',
            'level' => 'low',
        ],
        [
            'code' => 'P8549.93',
            'description' => 'Actividades de capacitación de socorristas y cursos de supervivencia.',
            'level' => 'low',
        ],
        [
            'code' => 'P8550.00',
            'description' => 'Prestación de servicios no educativos de apoyo a procesos o sistemas educativos como consultoría de educación, orientación educativa, servicios de exámenes y evaluación de los mismos, organización de programas de intercambio de estudiantes.',
            'level' => 'low',
        ],
        [
            'code' => 'Q8610.01',
            'description' => 'Actividades a corto y a largo plazo de los hospitales básicos y generales, es decir, actividades médicas, de diagnóstico y de tratamiento (hospitales=> comunitarios y regionales, de organizaciones sin fines de lucro, universitarios, de bases militares y de prisiones, del Ministerio de gobierno y policía, del Ministerio de defensa nacional, de la Junta de Beneficencia, del Seguro Social, Fisco Misionales).',
            'level' => 'medium',
        ],
        [
            'code' => 'Q8610.02',
            'description' => 'Actividades a corto y a largo plazo de clínicas del día, básicas y generales, es decir, actividades médicas, de diagnóstico y de tratamiento.',
            'level' => 'medium',
        ],
        [
            'code' => 'Q8610.03',
            'description' => 'Actividades a corto y a largo plazo de los hospitales especializados, es decir, actividades médicas, de diagnóstico y de tratamiento (hospitales para enfermos mentales, centros de rehabilitación, hospitales para enfermedades infecciosas, de maternidad, sanatorios especializados, etcétera).',
            'level' => 'medium',
        ],
        [
            'code' => 'Q8610.04',
            'description' => 'Actividades a corto y a largo plazo de clínicas especializadas, es decir, actividades médicas, de diagnóstico y de tratamiento (clínicas para enfermos mentales, de rehabilitación, para enfermedades infecciosas, de maternidad, etcétera).',
            'level' => 'medium',
        ],
        [
            'code' => 'Q8610.05',
            'description' => 'Servicios de centros de planificación familiar que provee tratamientos médicos, como los de esterilización y de interrupción del embarazo, con alojamiento.',
            'level' => 'medium',
        ],
        [
            'code' => 'Q8620.01',
            'description' => 'Consulta y tratamiento por médicos generales y especialistas. Estas actividades pueden realizarse en consultorios privados, en consultorios colectivos, en clínicas ambulatorias, en clínicas anexas a empresas, escuelas, residencias de ancianos u organizaciones sindicales o fraternales y en los propios domicilios de los pacientes.',
            'level' => 'low',
        ],
        [
            'code' => 'Q8620.02',
            'description' => 'Actividades de atención odontológica de carácter general o especializado, por ejemplo, odontología, endodoncia y odontología pediátrica; estomatología; ortodoncia. Estas actividades pueden realizarse en consultorios privados, en consultorios colectivos, en clínicas ambulatorias, en clínicas anexas a empresas, escuelas, residencias de ancianos u organizaciones sindicales o fraternales y en los propios domicilios de los pacientes.',
            'level' => 'low',
        ],
        [
            'code' => 'Q8620.03',
            'description' => 'Servicios de centros de planificación familiar que provee tratamientos médicos, como los de esterilización y de interrupción del embarazo, sin alojamiento.',
            'level' => 'low',
        ],
        [
            'code' => 'Q8620.04',
            'description' => 'Actividades de atención odontológica en salas de operaciones.',
            'level' => 'low',
        ],
        [
            'code' => 'Q8620.05',
            'description' => 'Servicios de asistencia médica privada a pacientes internos por médicos externos.',
            'level' => 'low',
        ],
        [
            'code' => 'Q8690.11',
            'description' => 'Actividades de atención de la salud humana realizadas por enfermeros, enfermeras y auxiliares de enfermería, que no se llevan a cabo en hospitales ni entrañan la participación de médicos ni de odontólogos.',
            'level' => 'low',
        ],
        [
            'code' => 'Q8690.12',
            'description' => 'Actividades de atención de la salud humana realizadas por personal paramédico especializado que no se llevan a cabo en hospitales ni entrañan la participación de médicos ni de odontólogos.',
            'level' => 'low',
        ],
        [
            'code' => 'Q8690.13',
            'description' => 'Actividades de atención de la salud humana realizadas por personal especializado en optometría y oftalmología que no se llevan a cabo en hospitales ni entrañan la participación de médicos ni de odontólogos.',
            'level' => 'medium',
        ],
        [
            'code' => 'Q8690.14',
            'description' => 'Actividades de atención de la salud humana realizadas por personal especializado en quiropráctica, que no se llevan a cabo en hospitales ni entrañan la participación de médicos ni de odontólogos.',
            'level' => 'medium',
        ],
        [
            'code' => 'Q8690.15',
            'description' => 'Actividades de atención de la salud humana realizadas por personal especializado en acupuntura, que no se llevan a cabo en hospitales ni entrañan la participación de médicos ni de odontólogos.',
            'level' => 'medium',
        ],
        [
            'code' => 'Q8690.16',
            'description' => 'Actividades de atención de la salud humana realizadas por personal especializado en homeopatía, que no se llevan a cabo en hospitales ni entrañan la participación de médicos ni de odontólogos.',
            'level' => 'medium',
        ],
        [
            'code' => 'Q8690.17',
            'description' => 'Actividades de atención de la salud humana realizadas por=> parteras, personal especializado en fisioterapia, hidroterapia, masaje terapéutico, ergoterapia, logoterapia, podología, etcétera; que no se llevan a cabo en hospitales ni entrañan la participación de médicos ni de odontólogos.',
            'level' => 'medium',
        ],
        [
            'code' => 'Q8690.18',
            'description' => 'Actividades de personal paramédico de odontología, como terapeutas dentales, enfermeros escolares con conocimientos de odontología e higienistas dentales, que pueden atender a pacientes sin la presencia del odontólogo pero son supervisados periódicamente por éste.',
            'level' => 'medium',
        ],
        [
            'code' => 'Q8690.21',
            'description' => 'Actividades de Laboratorios de radiología (rayos X) y otros centros de diagnóstico por imagen.',
            'level' => 'high',
        ],
        [
            'code' => 'Q8690.22',
            'description' => 'Actividades de laboratorios clínicos de análisis de sangre, orina, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'Q8690.91',
            'description' => 'Transporte de pacientes en ambulancias corrientes y ambulancias aéreas. Estos servicios se prestan a menudo durante una situación de emergencia médica.',
            'level' => 'medium',
        ],
        [
            'code' => 'Q8690.92',
            'description' => 'Actividades de banco de sangre, de esperma, de órganos para transplantes, etcétera.',
            'level' => 'high',
        ],
        [
            'code' => 'Q8690.99',
            'description' => 'Otros servicios auxiliares al tratamiento médico n.c.p. como aplicación de vacunas, medición de la presión arterial y la capacidad auditiva, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'Q8710.01',
            'description' => 'Actividades de residencias de ancianos con atención de enfermería.',
            'level' => 'low',
        ],
        [
            'code' => 'Q8710.02',
            'description' => 'Actividades de casas de convalecencia, clínicas de reposo con atención de enfermería y residencias con cuidados de enfermería.',
            'level' => 'low',
        ],
        [
            'code' => 'Q8710.03',
            'description' => 'Actividades de casas de salud.',
            'level' => 'low',
        ],
        [
            'code' => 'Q8720.01',
            'description' => 'Servicios de atención en instalaciones para el tratamiento del alcoholismo y la drogodependencia.',
            'level' => 'low',
        ],
        [
            'code' => 'Q8720.02',
            'description' => 'Servicios de atención en casas de convalecencia psiquiátrica, servicios de atención en hogares residenciales colectivos para personas con perturbaciones emocionales y servicios de atención en hogares de transición para enfermos mentales.',
            'level' => 'low',
        ],
        [
            'code' => 'Q8720.03',
            'description' => 'Servicios de atención en instalaciones para personas con retraso mental.',
            'level' => 'low',
        ],
        [
            'code' => 'Q8730.01',
            'description' => 'Actividades de atención en instalaciones residenciales con asistencia para la vida cotidiana.',
            'level' => 'low',
        ],
        [
            'code' => 'Q8730.02',
            'description' => 'Actividades de atención en hogares de ancianos con atención mínima de enfermería, actividades de atención en casas de reposo sin atención de enfermería y actividades de atención en comunidades de jubilados con atención permanente.',
            'level' => 'low',
        ],
        [
            'code' => 'Q8790.01',
            'description' => 'Actividades destinadas a proporcionar asistencia social las 24 horas del día a niños y a determinadas categorías de personas que no pueden valerse plenamente por sí mismas, en las que el tratamiento médico o la enseñanza no son componentes importantes, como=> orfanatos, hogares y albergues infantiles, albergues temporales para personas sin hogar e instituciones que atienden a madres solteras y a sus hijos. Estas actividades pueden ser realizadas por organizaciones públicas o privadas.',
            'level' => 'low',
        ],
        [
            'code' => 'Q8790.02',
            'description' => 'Actividades de atención en hogares de transición colectivos para personas con problemas sociales o personales, hogares de transición para delincuentes y campamentos disciplinarios.',
            'level' => 'low',
        ],
        [
            'code' => 'Q8810.00',
            'description' => 'Servicios sociales, de asesoramiento, de bienestar social, de remisión y servicios similares que prestan a personas de edad y personas con discapacidad, en sus domicilios o en otros lugares, organizaciones públicas o privadas, organizaciones nacionales o locales de autoayuda y especialistas en servicios de asesoramiento como visitas a ancianos y enfermos, actividades de atención diurna para ancianos y adultos con discapacidad y actividades de adiestramiento y readaptación profesional para personas con discapacidad, siempre que el componente de educación sea limitado.',
            'level' => 'low',
        ],
        [
            'code' => 'Q8890.01',
            'description' => 'Actividades de guardería o atención diurna de niños, incluyendo el cuidado diurno de niños con discapacidad.',
            'level' => 'low',
        ],
        [
            'code' => 'Q8890.02',
            'description' => 'Servicios diurnos para personas sin hogar y otros grupos socialmente desfavorecidos.',
            'level' => 'low',
        ],
        [
            'code' => 'Q8890.03',
            'description' => 'Actividades de bienestar social y de orientación para niños y adolescentes, actividades de adopción y actividades para prevenir la crueldad contra los niños y otras personas.',
            'level' => 'low',
        ],
        [
            'code' => 'Q8890.04',
            'description' => 'Servicios de asesoramiento en economía doméstica, de orientación matrimonial y familiar, asesoramiento en cuestiones crediticias y de deuda, actividades comunitarias y vecinales y actividades de rehabilitación y habilitación profesional para personas desempleadas, siempre que el componente de educación sea limitado.',
            'level' => 'low',
        ],
        [
            'code' => 'Q8890.05',
            'description' => 'Actividades de determinación del derecho a recibir prestaciones sociales, subsidios de alquiler o cupones de alimentos.',
            'level' => 'low',
        ],
        [
            'code' => 'Q8890.09',
            'description' => 'Actividades de ayuda a víctimas de desastres, refugiados, inmigrantes, etcétera, incluido el suministro de alojamiento a esas personas a título temporal o por períodos prolongados, actividades de beneficencia, como recaudación de fondos y otras actividades de apoyo con fines de asistencia social.',
            'level' => 'low',
        ],
        [
            'code' => 'R9000.01',
            'description' => 'Producción de obras de teatro, conciertos, óperas, espectáculos de danza y otras actividades escénicas como las actividades de grupos, circos o compañías, orquestas o bandas, incluido actividades complementarias para la producción y otras actividades escénicas realizadas en directo como=> actividades de directores, productores, diseñadores y constructores de escenarios, tramoyistas, manejo de telones, técnicos de iluminación y sonido, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'R9000.02',
            'description' => 'Actividades de artistas individuales, como escritores, directores, músicos, conferencistas u oradores, escenógrafos, constructores de decorados, etcétera; escritores de todo tipo, por ejemplo, obras de ficción, de obras técnicas, etcétera., actividades de escultores, pintores, dibujantes, caricaturistas, grabadores, etcétera, se incluye la restauración de obras de arte, como cuadros, etcétera y actividades de los modelos independientes.',
            'level' => 'low',
        ],
        [
            'code' => 'R9000.03',
            'description' => 'Gestión de salas de conciertos, teatros y otras instalaciones similares.',
            'level' => 'medium',
        ],
        [
            'code' => 'R9000.04',
            'description' => 'Actividades de productores o empresarios de espectáculos artísticos en vivo, aporten o no ellos mismos las instalaciones correspondientes.',
            'level' => 'medium',
        ],
        [
            'code' => 'R9000.05',
            'description' => 'Actividades de periodistas independientes.',
            'level' => 'medium',
        ],
        [
            'code' => 'R9101.00',
            'description' => 'Actividades de documentación e información realizadas por bibliotecas de todo tipo, salas de lectura, audición y proyección, archivos públicos abiertos al público en general o a determinadas categorías de personas, como estudiantes, científicos, empleados de la organización a la que pertenece la biblioteca, y gestión de archivos de la administración pública=> organización de fondos bibliográficos, catalogación de colecciones, mantenimiento y préstamo de libros, mapas, revistas, películas, discos, cintas grabadas, obras de arte, etcétera; actividades de búsqueda para atender a solicitudes de información, servicio de archivos fotográficos y bancos de imágenes.',
            'level' => 'low',
        ],
        [
            'code' => 'R9102.00',
            'description' => 'Actividades de museos de arte, orfebrería, muebles, trajes, cerámica, platería, museos de historia natural y de ciencias, museos tecnológicos, históricos, militares y al aire libre; se incluye la gestión de lugares y edificios históricos y otros museos especializados.',
            'level' => 'low',
        ],
        [
            'code' => 'R9103.01',
            'description' => 'Gestión de jardines botánicos y zoológicos, incluidos zoológicos infantiles.',
            'level' => 'high',
        ],
        [
            'code' => 'R9103.02',
            'description' => 'Gestión de reservas naturales, incluidas las actividades de preservación de la flora y fauna silvestres, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'R9200.01',
            'description' => 'Venta de boletos de lotería.',
            'level' => 'low',
        ],
        [
            'code' => 'R9200.02',
            'description' => 'Gestión (explotación) de máquinas de juegos de azar accionadas con monedas y explotación de casinos, incluidos casinos flotantes, billares, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'R9200.03',
            'description' => 'Gestión de sitios de Internet dedicados a los juegos de azar virtuales, videojuegos.',
            'level' => 'low',
        ],
        [
            'code' => 'R9200.04',
            'description' => 'Apuestas sobre carreras de caballos en el propio hipódromo y fuera del hipódromo y otros servicios de apuestas.',
            'level' => 'low',
        ],
        [
            'code' => 'R9311.01',
            'description' => 'Explotación de instalaciones para actividades deportivas bajo techo o al aire libre (abiertas, cerradas o techadas, con asientos para espectadores)=> campos y estadios de fútbol, hockey, béisbol, estadios de atletismo, piscinas, campos de golf, circuitos de carreras de automóviles, canódromos, hipódromos, pistas y estadios para deportes de invierno y pistas de hockey sobre hielo.',
            'level' => 'medium',
        ],
        [
            'code' => 'R9311.02',
            'description' => 'Explotación de instalaciones para actividades deportivas bajo techo o al aire libre (abiertas, cerradas o techadas, con asientos o sin ellos para espectadores)=> pabellones de boxeo y gimnasios.',
            'level' => 'medium',
        ],
        [
            'code' => 'R9311.03',
            'description' => 'Organización y gestión de competencias deportivas al aire libre o bajo techo con participación de deportistas profesionales o aficionados, por parte de organizaciones con instalaciones propias. Se incluyen la gestión de esas instalaciones y la dotación del personal necesario para su funcionamiento.',
            'level' => 'medium',
        ],
        [
            'code' => 'R9311.04',
            'description' => 'Explotación de instalaciones para actividades deportivas bajo techo o al aire libre (abiertas, cerradas o techadas, con asientos o sin ellos para espectadores)=> boleras.',
            'level' => 'low',
        ],
        [
            'code' => 'R9312.00',
            'description' => 'Actividades de clubes deportivos profesionales, semiprofesionales o de aficionados que ofrecen a sus miembros la oportunidad de participar en actividades deportivas, se incluyen las siguientes actividades=> clubes de fútbol, clubes de bolos, clubes de natación, clubes de golf, clubes de boxeo, clubes de físico culturismo, clubes de deportes de invierno, clubes de ajedrez, clubes de atletismo, clubes de tiro, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'R9319.01',
            'description' => 'Actividades de productores promotores y actividades relacionadas con la promoción de competencias deportivas, con o sin instalaciones.',
            'level' => 'medium',
        ],
        [
            'code' => 'R9319.02',
            'description' => 'Actividades por cuenta propia de deportistas y atletas, árbitros, jueces, cronometradores, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'R9319.03',
            'description' => 'Actividades de las ligas deportivas y de órganos reguladores.',
            'level' => 'medium',
        ],
        [
            'code' => 'R9319.04',
            'description' => 'Actividades de los guías de montaña.',
            'level' => 'medium',
        ],
        [
            'code' => 'R9319.05',
            'description' => 'Actividades relacionadas con carreras de caballos, galgos y automóviles.',
            'level' => 'medium',
        ],
        [
            'code' => 'R9319.06',
            'description' => 'Gestión de reservas y actividades de apoyo para la caza y pesca deportiva o recreativa.',
            'level' => 'medium',
        ],
        [
            'code' => 'R9321.00',
            'description' => 'Actividades de parques de atracción y parques temáticos, incluida la explotación de diversas atracciones mecánicas y acuáticas, juegos, espectáculos, exposiciones temáticas y lugares de picnics.',
            'level' => 'medium',
        ],
        [
            'code' => 'R9329.01',
            'description' => 'Actividades de parques recreativos y playas, incluido el alquiler de casetas, casilleros, sillas, hamacas; la gestión de instalaciones de transporte recreativo; por ejemplo, puertos deportivos, y el alquiler de equipo de esparcimiento y recreo como parte integral de los servicios de esparcimiento, bananas, lanchas, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'R9329.02',
            'description' => 'Actividades de explotación de ferias y exposiciones de carácter recreativo, incluido la explotación de juegos accionados con monedas.',
            'level' => 'low',
        ],
        [
            'code' => 'R9329.03',
            'description' => 'Actividades de explotación de discotecas y pistas de baile incluye karaokes, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'R9329.04',
            'description' => 'Actividades de productores o empresarios de espectáculos en vivo distintos de los artísticos o deportivos, aporten o no ellos mismos las instalaciones correspondientes.',
            'level' => 'medium',
        ],
        [
            'code' => 'R9329.09',
            'description' => 'Otras actividades de esparcimiento y recreativas (excepto las de parques de atracciones y parques temáticos) no clasificadas en otra parte, incluye la gestión de estaciones de esquí, galleras, plazas de toros, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'S9411.00',
            'description' => 'Actividades de organizaciones cuyos miembros se interesan principalmente por el desarrollo y la prosperidad de las empresas de un determinado sector empresarial o comercial incluido el sector agropecuario, o en la situación y el crecimiento económico de una determinada zona geográfica o subdivisión política, independientemente de la rama de actividad y actividades de cámaras de comercio, gremios y organizaciones similares. Incluye actividades de federaciones empresariales y patronales y la difusión de la información, establecimiento y fiscalización del cumplimiento de normas profesionales, representación ante organismos públicos, relaciones públicas y negociaciones laborales de las asociaciones empresariales y de empleadores.',
            'level' => 'low',
        ],
        [
            'code' => 'S9412.00',
            'description' => 'Actividades de las organizaciones cuyos miembros están interesados principalmente en una disciplina científica, práctica profesional o esfera técnica concreta, como=> colegios de médicos, abogados, contables, ingenieros, arquitectos, etcétera; actividades de asociaciones de especialistas en el campo científico, académico o cultural, como sociedades científicas, asociaciones de escritores, pintores, artistas de diversos tipos, periodistas, etcétera; difusión de información, establecimiento y fiscalización del cumplimiento de normas profesionales, representación ante organismos públicos y relaciones públicas de las asociaciones profesionales.',
            'level' => 'low',
        ],
        [
            'code' => 'S9420.00',
            'description' => 'Defensa de los intereses de los sindicatos y de sus afiliados; actividades de asociaciones cuyos afiliados son empleados interesados principalmente en dar a conocer sus opiniones sobre la situación laboral y salarial y en tomar medidas concertadas por conducto de su organización; actividades de sindicatos de empresas, sindicatos con filiales y organizaciones sindicales integradas por sindicatos afiliados y constituidas en función del oficio de sus miembros o en función de criterios geográficos, estructurales o de otra índole.',
            'level' => 'medium',
        ],
        [
            'code' => 'S9491.01',
            'description' => 'Actividades de las organizaciones religiosas o de particulares que prestan servicios directamente a los fieles en iglesias, mezquitas, templos, sinagogas y otros lugares de culto y servicios religiosos de honras fúnebres.',
            'level' => 'low',
        ],
        [
            'code' => 'S9491.02',
            'description' => 'Actividades de monasterios y conventos, actividades de retiro religioso.',
            'level' => 'low',
        ],
        [
            'code' => 'S9492.00',
            'description' => 'Actividades de organizaciones políticas y organizaciones auxiliares=> organizaciones juveniles vinculadas a un partido político, cuya finalidad es influir en los procesos de adopción de decisiones de los órganos públicos colocando en puestos políticos a miembros y simpatizantes del partido, y realizan actividades de información, relaciones públicas, recaudación de fondos, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'S9499.01',
            'description' => 'Actividades de organizaciones no afiliadas directamente a un partido político que promueven una causa o cuestión pública mediante campañas de educación del público, influencia política, recaudación de fondos, etcétera; como iniciativas ciudadanas y movimientos de protesta; actividades de movimientos ambientalistas o ecologista; actividades de organizaciones de apoyo a servicios comunitarios y educativos n.c.p.; actividades de organizaciones para la protección y del adelanto de grupos especiales; por ejemplo, grupos étnicos y minoritarios y actividades de asociaciones con fines patrióticos, incluidas asociaciones de veteranos de guerra.',
            'level' => 'low',
        ],
        [
            'code' => 'S9499.02',
            'description' => 'Actividades de asociaciones de consumidores.',
            'level' => 'low',
        ],
        [
            'code' => 'S9499.03',
            'description' => 'Actividades de asociaciones de automovilistas.',
            'level' => 'low',
        ],
        [
            'code' => 'S9499.04',
            'description' => 'Actividades de asociaciones que facilitan el contacto con otras personas con intereses similares, como clubes rotarios, logias masónicas, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'S9499.05',
            'description' => 'Actividades de asociaciones de jóvenes, asociaciones, clubes y organizaciones fraternales de estudiantes, etcétera, actividades de asociaciones que promueven actividades culturales o recreativas o reúnen a personas que comparten una afición (diferente de un deporte o juego), como clubes de poesía, literarios o de libros, clubes de historia, clubes de jardinería, clubes de cine y fotografía, clubes musicales y artísticos, clubes de artesanía y de coleccionistas, clubes sociales, clubes de carnaval, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'S9499.06',
            'description' => 'Actividades de concesión de donaciones realizadas por asociaciones u otras organizaciones.',
            'level' => 'low',
        ],
        [
            'code' => 'S9511.01',
            'description' => 'Reparación y mantenimiento de=> computadoras de escritorio, computadoras portátiles, servidores informáticos, computadoras de mano (asistentes digitales personales), unidades de disco magnético, unidades de memoria USB y otros dispositivos de almacenamiento; unidades de disco óptico (CD- RW, CD-ROM, DVD-ROM, DVD-RW), módems internos y externos, impresoras, pantallas, teclados, ratones, palancas de mando y bolas rodantes, proyectores informáticos, escáneres, incluidos lectores de código de barras.',
            'level' => 'low',
        ],
        [
            'code' => 'S9511.09',
            'description' => 'Reparación y mantenimiento de otras terminales informáticas especializadas, lectores de tarjetas inteligentes, cascos de realidad virtual, terminales informáticas, como monederos automáticos y terminales de punto de venta no accionadas mecánicamente.',
            'level' => 'low',
        ],
        [
            'code' => 'S9512.01',
            'description' => 'Reparación y mantenimiento de teléfonos inalámbricos, teléfonos celulares y aparatos de fax.',
            'level' => 'low',
        ],
        [
            'code' => 'S9512.02',
            'description' => 'Reparación y mantenimiento de emisores-receptores de radio, cámaras de televisión y de video de uso comercial.',
            'level' => 'low',
        ],
        [
            'code' => 'S9512.09',
            'description' => 'Reparación y mantenimiento de otro tipo de equipo de comunicaciones=> equipo de transmisión de comunicaciones (por ejemplo, enrutadores, puentes, módems).',
            'level' => 'low',
        ],
        [
            'code' => 'S9521.00',
            'description' => 'Reparación y mantenimiento de aparatos electrónicos de uso doméstico=> aparatos de televisión y de radio, grabadoras de video (VCR), reproductores de CD y cámaras de video para uso familiar.',
            'level' => 'low',
        ],
        [
            'code' => 'S9522.01',
            'description' => 'Reparación y mantenimiento de aparatos de uso doméstico, como refrigeradores, cocinas, lavadoras, secadores de ropa, aparatos de aire acondicionado, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'S9522.02',
            'description' => 'Reparación y mantenimiento de equipo doméstico y de jardinería, como segadoras de césped, bordeadores, soplantes para nieve y para hojas, cortasetos, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'S9523.01',
            'description' => 'Reparación y mantenimiento de calzado=> zapatos, botas, etcétera; colocación de tacones.',
            'level' => 'low',
        ],
        [
            'code' => 'S9523.02',
            'description' => 'Reparación y mantenimiento de artículos de cuero, maletas y artículos similares.',
            'level' => 'low',
        ],
        [
            'code' => 'S9524.01',
            'description' => 'Retapizado, reparación y restauración de muebles y accesorios domésticos, incluidos muebles de oficina.',
            'level' => 'low',
        ],
        [
            'code' => 'S9524.02',
            'description' => 'Montaje de muebles no empotrados.',
            'level' => 'low',
        ],
        [
            'code' => 'S9529.01',
            'description' => 'Reparación de bicicletas.',
            'level' => 'medium',
        ],
        [
            'code' => 'S9529.02',
            'description' => 'Reparación y arreglo de prendas de vestir.',
            'level' => 'low',
        ],
        [
            'code' => 'S9529.03',
            'description' => 'Reparación y arreglo de joyas, reparación de relojes de pulsera y de pared y de sus partes, como cajas y bastidores de todos los materiales; mecanismos, cronómetros, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'S9529.04',
            'description' => 'Reparación de instrumentos musicales y afinación de pianos.',
            'level' => 'low',
        ],
        [
            'code' => 'S9529.09',
            'description' => 'Reparación de otros efectos personales y enseres domésticos=> libros, juguetes y artículos similares, artículos deportivos (excepto armas deportivas), etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'S9601.01',
            'description' => 'Lavado y limpieza en seco, planchado, etcétera, de todo tipo de prendas de vestir (incluso de piel) y de productos textiles que se realizan con equipo mecánico, a mano o en máquinas accionadas con monedas para el público en general o para clientes industriales o comerciales, incluye actividades de reparación y arreglos menores de prendas de vestir y otros artículos textiles, si se realizan en combinación con las de limpieza, recogida y entrega de ropa por las lavanderías.',
            'level' => 'medium',
        ],
        [
            'code' => 'S9601.02',
            'description' => 'Lavado de alfombras y tapices con champú y limpieza de cortinas y colgaduras, se realicen o no en el local o la residencia del cliente.',
            'level' => 'medium',
        ],
        [
            'code' => 'S9601.03',
            'description' => 'Suministro de ropa blanca, uniformes de trabajo y artículos similares por las lavanderías y servicios de suministro de pañales.',
            'level' => 'medium',
        ],
        [
            'code' => 'S9602.00',
            'description' => 'Actividades de lavado, corte, recorte, peinado, teñido, coloración, ondulación y alisado del cabello y otras actividades similares para hombres y mujeres; afeitado y recorte de la barba; masajes faciales, manicura y pedicura, tatuajes, maquillaje, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'S9603.01',
            'description' => 'Actividades de sepultura e incineración de cadáveres humanos o animales y actividades conexas=> preparación de los despojos para su inhumación o cremación y servicios de embalsamiento y otros servicios de pompas fúnebres; prestación de servicios de inhumación y cremación, alquiler de locales especiales en funerarias.',
            'level' => 'medium',
        ],
        [
            'code' => 'S9603.02',
            'description' => 'Actividades de alquiler y venta de tumbas, mantenimiento de tumbas y mausoleos.',
            'level' => 'low',
        ],
        [
            'code' => 'S9609.01',
            'description' => 'Actividades de baños turcos, saunas y baños de vapor, centros de spa, solarios, salones de adelgazamiento, salones de masaje, baños públicos, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'S9609.02',
            'description' => 'Actividades de astrología y espiritismo.',
            'level' => 'low',
        ],
        [
            'code' => 'S9609.03',
            'description' => 'Actividades de clubes nocturnos (night clubs).',
            'level' => 'low',
        ],
        [
            'code' => 'S9609.04',
            'description' => 'Actividades de relación social, como las agencias que se encargan de la contratación de acompañantes o poner en contacto entre sí a personas que buscan compañía o amistad, y las agencias matrimoniales.',
            'level' => 'low',
        ],
        [
            'code' => 'S9609.05',
            'description' => 'Actividades de servicios para animales domésticos, como las residencias y peluquerías para animales, paseo y adiestramiento de animales.',
            'level' => 'low',
        ],
        [
            'code' => 'S9609.06',
            'description' => 'Actividades de organizaciones genealógicas.',
            'level' => 'low',
        ],
        [
            'code' => 'S9609.07',
            'description' => 'Actividades de limpiabotas (betuneros), porteadores de maletas, personas encargadas de estacionar vehículos, etcétera.',
            'level' => 'low',
        ],
        [
            'code' => 'S9609.08',
            'description' => 'Explotación de máquinas de servicios personales accionadas con monedas (fotomatones, básculas, aparatos para tomar la tensión, taquillas accionadas con monedas, etcétera).',
            'level' => 'low',
        ],
        [
            'code' => 'T9700.00',
            'description' => 'Actividades de los hogares como empleadores de personal doméstico, como sirvientes, cocineros, camareros, ayudantes de cámara, mayordomos, lavanderos, jardineros, porteros, mozos de cuadra, conductores, conserjes, institutrices, niñeras, preceptores, secretarios, etcétera. El personal doméstico empleado puede así declarar la actividad de su empleador en los censos o estudios, aunque el empleador sea un particular. El producto resultante de esa actividad es consumido por el propio hogar empleador.',
            'level' => 'low',
        ],
        [
            'code' => 'T9810.00',
            'description' => 'Actividades no diferenciadas de hogares como productores de bienes de subsistencia, es decir, las actividades de los hogares que producen diversos bienes para su propia subsistencia. Esas actividades comprenden la caza y la recolección, la agricultura, la construcción de viviendas y la confección de prendas de vestir y otros bienes producidos por los hogares para su propia subsistencia. Si los hogares se dedican a la producción de bienes para el mercado, se clasifican en la rama de producción correspondiente a esos bienes. Si se dedican principalmente a la producción de bienes de subsistencia específicos, se clasifican en la rama de producción correspondiente a esos bienes.',
            'level' => 'low',
        ],
        [
            'code' => 'T9820.00',
            'description' => 'Actividades no diferenciadas de hogares como productores de servicios se subsistencia, es decir, actividades de los hogares que producen diversos servicios para su propia subsistencia. Esas actividades comprenden la cocina, la enseñanza, el cuidado de los miembros de la familia y otros servicios producidos por los hogares para su propia subsistencia. Si los hogares también se dedican a la producción de diversos bienes para su propia subsistencia, se clasifican en las actividades no diferenciadas de hogares como productores de bienes para uso propio.',
            'level' => 'low',
        ],
        [
            'code' => 'U9900.01',
            'description' => 'Actividades de organizaciones internacionales, como las Naciones Unidas y los organismos especializados del sistema de las Naciones Unidas, órganos regionales, etcétera, el Fondo Monetario Internacional, el Banco Mundial, la Organización de Cooperación y Desarrollo Económicos, la Organización de Países Exportadores de Petróleo, las Comunidades Europeas, la Asociación Europea de Libre Comercio, etcétera.',
            'level' => 'medium',
        ],
        [
            'code' => 'U9900.02',
            'description' => 'Actividades de misiones diplomáticas y consulares cuando están determinadas por el país en el que se encuentran y no del país que representan.',
            'level' => 'medium',
        ],
    ];

    public function run(): void
    {
        foreach ($this->CIUUs as $ciiu) {
            CIIU::updateOrCreate(['code' => $ciiu['code']], $ciiu);
        }
    }
}
