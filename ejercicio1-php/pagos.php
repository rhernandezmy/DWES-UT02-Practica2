<?php
/**
 * pagos.php

 * Ejemplo práctico con documentación integrada sobre:
 * - Arrays indexados
 * - Arrays asociativos
 * - Arrays multidimensionales
 */

/* ===============================================================
   📌 ARRAYS INDEXADOS (PHP)
   ---------------------------------------------------------------
   Un array indexado usa índices numéricos automáticos (0,1,2,3...).
   $nombres = ["Laura", "Carlos", "Sofia"];
   PHP asigna índices automáticamente:
       $nombres [0] = "Laura"
       $nombres [1] = "Carlos"
       $nombres [2] = "Sofia"
    En este archivo NO usamos arrays indexados directamente,
    pero sí forman parte de los ejemplos explicativos.
   =============================================================== */

   /* ===============================================================
   📌 ARRAYS ASOCIATIVOS (PHP)
   ---------------------------------------------------------------
   Un array asociativo usa *claves con nombre* en vez de índices
   numéricos.

   En este archivo los datos de cada socio SON arrays asociativos.
   Ejemplo real usado más abajo:

       "id" => 1,
       "nombre" => "Laura",
       "apellidos" => "Gómez Pérez",

   Cada clave identifica un dato.
   =============================================================== */

   /* ===============================================================
   📌 ARRAYS MULTIDIMENSIONALES (PHP)
   ---------------------------------------------------------------
   Son arrays que contienen otros arrays dentro (2 o más niveles).

   En este archivo el array principal $socios es MULTIDIMENSIONAL:
   - Nivel 1 → lista de socios
   - Nivel 2 → datos de cada socio (array asociativo)
   - Nivel 3 → pagos mensuales (otro array asociativo dentro)
   =============================================================== */
       
   /* ===============================================================
   📌 ARRAY MULTIDIMENSIONAL REAL DEL EJERCICIO
   =============================================================== */

$socios = [
    /* ----------------------------------------------------------------
      Cada índice principal (1, 2, 3...) identifica a un socio.
      Esto convierte al array en ASOCIATIVO en el primer nivel.
      ----------------------------------------------------------------- */
    1 => [
        // 👉 Este es un ARRAY ASOCIATIVO con los datos del socio
        "id" => 1,
        "nombre" => "Laura",
        "apellidos" => "Gómez Pérez",
        "dni" => "12345678A",
        "email" => "laura@example.com",
        "telefono" => "600111222",

        // 👉 "pagos" es un ARRAY ASOCIATIVO que contiene OTROS ARRAYS = MULTIDIMENSIONAL
        "pagos" => [
            /* 
               Aquí usamos otra vez arrays asociativos.
               La clave "2025-01" es un índice con formato AAAA-MM.
            */
            "2025-01" => [
                "mes" => "Enero",
                "importe" => 25.00,
                "estado" => "Pagado",
                "fecha_pago" => "2025-01-05"
            ],
            "2025-02" => [
                "mes" => "Febrero",
                "importe" => 25.00,
                "estado" => "Pagado",
                "fecha_pago" => null
            ]
        ]
    ],

    2 => [
        // 👉 Este es un ARRAY ASOCIATIVO con los datos del socio
        "id" => 2,
        "nombre" => "Carlos",
        "apellidos" => "Martínez Ruiz",
        "dni" => "23456789B",
        "email" => "carlos@example.com",
        "telefono" => "600222333",
        
        // 👉 "pagos" es un ARRAY ASOCIATIVO que contiene OTROS ARRAYS = MULTIDIMENSIONAL
        "pagos" => [
            /* 
               Aquí usamos otra vez arrays asociativos.
               La clave "2025-01" es un índice con formato AAAA-MM.
            */
            "2025-01" => [
                "mes" => "Enero",
                "importe" => 30.00,
                "estado" => "Pagado",
                "fecha_pago" => "2025-01-10"
            ],
            "2025-02" => [
                "mes" => "Febrero",
                "importe" => 30.00,
                "estado" => "Pagado",
                "fecha_pago" => "2025-02-08"
            ]
        ]
    ],

    3 => [
        // 👉 Este es un ARRAY ASOCIATIVO con los datos del socio
        "id" => 3,
        "nombre" => "Sofía",
        "apellidos" => "López Marín",
        "dni" => "34567890C",
        "email" => "sofia@example.com",
        "telefono" => "600333444",

        // 👉 "pagos" es un ARRAY ASOCIATIVO que contiene OTROS ARRAYS = MULTIDIMENSIONAL
        "pagos" => [
            /* 
               Aquí usamos otra vez arrays asociativos.
               La clave "2025-01" es un índice con formato AAAA-MM.
            */            
            "2025-01" => [
                "mes" => "Enero",
                "importe" => 20.00,
                "estado" => "Pagado",
                "fecha_pago" => null
            ],
            "2025-02" => [
                "mes" => "Febrero",
                "importe" => 20.00,
                "estado" => "Pagado",
                "fecha_pago" => null
            ]
        ]
    ]
];

/* ===============================================================
   INICIO DE LA PARTE HTML + PHP PARA MOSTRAR DATOS Y PAGOS
   =============================================================== */

// Cambiar el índice para mostrar otro socio
$socio = $socios[2];

// Generamos los 12 meses del año automáticamente
$year = date("Y");
$meses = [
    1=>"Enero",2=>"Febrero",3=>"Marzo",4=>"Abril",5=>"Mayo",6=>"Junio",
    7=>"Julio",8=>"Agosto",9=>"Septiembre",10=>"Octubre",11=>"Noviembre",12=>"Diciembre"
];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Agregamos CSS para diferenciar los estados -->
    <meta charset="UTF-8">
    <title>Pagos del socio</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        table { border-collapse: collapse; width: 60%; }
        th, td { border: 1px solid #444; padding: 8px; text-align: center; }
        th { background: #eee; }

        /* Estilos según el estado del pago */
        .pagado {
            color: green;
            font-weight: bold;
        }
        .pendiente {
            color: red;
            background-color: #fdd;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h1>Datos del socio</h1>

<p><strong>Nombre:</strong> <?= $socio["nombre"] . " " . $socio["apellidos"] ?></p>
<p><strong>DNI:</strong> <?= $socio["dni"] ?></p>
<p><strong>Dirección:</strong> <?= $socio["direccion"] ?></p>
<p><strong>Teléfono:</strong> <?= $socio["telefono"] ?></p>
<p><strong>Email:</strong> <?= $socio["email"] ?></p>

<hr>

<h2>Pagos del año <?= $year ?></h2>

<table>
    <tr>
        <th>Mes</th>
        <th>Importe</th>
        <th>Estado</th>
        <th>Fecha de Pago</th>
    </tr>

    <?php
    $totalAbonado = 0; // Inicializamos total

    for ($i = 1; $i <= 12; $i++) {
        $code = $year . "-" . str_pad($i, 2, "0", STR_PAD_LEFT);

        if (isset($socio["pagos"][$code])) {
            $pago = $socio["pagos"][$code];
        } else {
            $pago = [
                "mes" => $meses[$i],
                "importe" => 0, // Aquí ponemos 0 para meses pendientes
                "estado" => "Pendiente",
                "fecha_pago" => null
            ];
        }

        // Sumamos solo si el pago está Pagado
        if ($pago['estado'] === "Pagado") {
            $totalAbonado += floatval($pago['importe']); // Convertimos a número por seguridad
        }

        $claseEstado = strtolower($pago['estado']);
        echo "<tr>";
        echo "<td>{$pago['mes']}</td>";
        echo "<td>" . ($pago['importe'] != 0 ? number_format($pago['importe'], 2) . " €" : "-") . "</td>";
        echo "<td class='{$claseEstado}'>{$pago['estado']}</td>";
        echo "<td>" . ($pago['fecha_pago'] ? $pago['fecha_pago'] : "-") . "</td>";
        echo "</tr>";
    }

        // Fila del total abonado
    echo "<tr>";
    echo "<td colspan='3'><strong>Total abonado:</strong></td>";
    echo "<td><strong>" . number_format($totalAbonado, 2) . " €</strong></td>";
    echo "</tr>";
    ?>
</table>

</body>
</html>


