<!DOCTYPE html>
<html lang="es" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bechtelar, Greenfelder and Conroy - SISAT</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'system-ui', '-apple-system', 'sans-serif'],
                        mono: ['JetBrains Mono', 'ui-monospace', 'SFMono-Regular', 'monospace'],
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Scrollbar sutil para modo oscuro */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #3f3f46;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #52525b;
        }
    </style>
</head>

<body class="min-h-screen bg-zinc-50 text-zinc-800 dark:bg-zinc-950 dark:text-zinc-100 flex">

    <!-- SIDEBAR PRINCIPAL -->
    <aside
        class="w-64 shrink-0 border-r border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900 flex flex-col justify-between sticky top-0 h-screen hidden lg:flex">
        <div class="p-4 space-y-6">
            <!-- Brand -->
            <div class="flex items-center gap-3 px-2">
                <div
                    class="size-8 rounded-lg bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 flex items-center justify-center font-bold shadow-xs">
                    <svg class="size-5" viewBox="0 0 40 42" fill="currentColor">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M17.2 5.633 8.6.855 0 5.633v26.51l16.2 9 16.2-9v-8.442l7.6-4.223V9.856l-8.6-4.777-8.6 4.777V18.3l-5.6 3.111V5.633ZM38 18.301l-5.6 3.11v-6.157l5.6-3.11V18.3Zm-1.06-7.856-5.54 3.078-5.54-3.079 5.54-3.078 5.54 3.079ZM24.8 18.3v-6.157l5.6 3.111v6.158L24.8 18.3Zm-1 1.732 5.54 3.078-13.14 7.302-5.54-3.078 13.14-7.3v-.002Zm-16.2 7.89 7.6 4.222V38.3L2 30.966V7.92l5.6 3.111v16.892ZM8.6 9.3 3.06 6.222 8.6 3.143l5.54 3.08L8.6 9.3Zm21.8 15.51-13.2 7.334V38.3l13.2-7.334v-6.156ZM9.6 11.034l5.6-3.11v14.6l-5.6 3.11v-14.6Z" />
                    </svg>
                </div>
                <span class="font-semibold text-sm tracking-tight">SISAT Platform</span>
            </div>

            <!-- Nav -->
            <nav class="space-y-1">
                <div class="px-3 py-1.5 text-xs font-medium text-zinc-400 uppercase tracking-wider">Plataforma</div>
                <a href="#"
                    class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-lg text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-800/60 hover:text-zinc-900 dark:hover:text-white transition">
                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    Dashboard
                </a>
                <a href="#"
                    class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-lg bg-zinc-100 dark:bg-zinc-800 text-zinc-900 dark:text-white">
                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path
                            d="M10 18v-7M11.119 2.205a2 2 0 0 1 1.762 0l7.84 3.846A.5.5 0 0 1 20.5 7h-17a.5.5 0 0 1-.22-.949zM14 18v-7M18 18v-7M3 22h18M6 18v-7" />
                    </svg>
                    Empresas
                </a>
            </nav>
        </div>

        <!-- User Profile Footer -->
        <div class="p-4 border-t border-zinc-200 dark:border-zinc-800">
            <div
                class="flex items-center gap-3 p-2 rounded-lg hover:bg-zinc-100 dark:hover:bg-zinc-800 cursor-pointer transition">
                <div
                    class="size-8 rounded-md bg-zinc-200 dark:bg-zinc-700 flex items-center justify-center text-xs font-semibold">
                    RA</div>
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-medium truncate">Roosevelt Remache</p>
                    <p class="text-xs text-zinc-500 truncate">rooseveltabrigo@gmail.com</p>
                </div>
            </div>
        </div>
    </aside>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="flex-1 min-w-0 p-6 lg:p-8 max-w-7xl mx-auto space-y-8">

        <!-- CABECERA DE EMPRESA -->
        <header class="space-y-4">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <div class="flex items-center gap-3 flex-wrap">
                        <h1 class="text-2xl font-semibold tracking-tight text-zinc-900 dark:text-white">
                            Bechtelar, Greenfelder and Conroy
                        </h1>
                        <span
                            class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-500/10 text-red-600 dark:text-red-400 border border-red-500/20">
                            <span class="size-1.5 rounded-full bg-red-500"></span>
                            Riesgo Alto
                        </span>
                    </div>
                    <div
                        class="mt-2 flex flex-wrap items-center gap-x-3 gap-y-1 text-sm text-zinc-500 dark:text-zinc-400">
                        <span class="font-mono">RUC: 56160607517</span>
                        <span>•</span>
                        <span>85 empleados</span>
                        <span>•</span>
                        <span class="font-mono">CIIU: B0810.21</span>
                    </div>
                </div>

                <!-- Resumen global rápido -->
                <div
                    class="flex items-center gap-4 bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-xl px-4 py-3">
                    <div>
                        <p class="text-xs text-zinc-500 dark:text-zinc-400">Cumplimiento Global</p>
                        <p class="text-lg font-semibold font-mono text-zinc-900 dark:text-white">8.33%</p>
                    </div>
                    <div class="h-8 w-px bg-zinc-200 dark:bg-zinc-800"></div>
                    <div>
                        <p class="text-xs text-zinc-500 dark:text-zinc-400">Ítems Completados</p>
                        <p class="text-lg font-semibold font-mono text-emerald-500">2 <span
                                class="text-xs text-zinc-500 font-normal">/ 24</span></p>
                    </div>
                </div>
            </div>

            <p class="text-sm text-zinc-600 dark:text-zinc-400 max-w-4xl">
                Extracción y dragado de arenas para la industria, arenas para la construcción, grava (ripio) y gravilla.
            </p>
            <div class="h-px bg-zinc-200 dark:bg-zinc-800 w-full"></div>
        </header>

        <!-- SECCIÓN 1: OBJETIVOS A CUMPLIR (Índice intacto y limpio) -->
        <section class="space-y-3">
            <div class="flex items-center justify-between">
                <h2 class="text-base font-semibold text-zinc-900 dark:text-white">Objetivos a cumplir</h2>
                <span class="text-xs text-zinc-500">10 componentes normativos</span>
            </div>

            <div class="space-y-2.5" id="objectives-container">
                <!-- Se renderiza dinámicamente con los mismos ítems exactos de tu vista -->
            </div>
        </section>

        <!-- SECCIÓN 2: ESTRUCTURA ORGANIZACIONAL Y PERSONAL (REDISEÑADA) -->
        <section class="space-y-4 pt-2">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h2 class="text-base font-semibold text-zinc-900 dark:text-white">Estructura Organizacional y
                        Personal</h2>
                    <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-0.5">Gestiona las áreas de trabajo, cargos y
                        nómina asignada para evaluaciones.</p>
                </div>
                <div class="flex items-center gap-2.5">
                    <button type="button" onclick="openModal('modal-area')"
                        class="inline-flex items-center gap-1.5 px-3 py-2 text-xs font-medium rounded-lg border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-800 text-zinc-700 dark:text-zinc-200 hover:bg-zinc-50 dark:hover:bg-zinc-700/80 transition cursor-pointer">
                        <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Nueva área
                    </button>
                    <button type="button" onclick="openModal('modal-employee')"
                        class="inline-flex items-center gap-1.5 px-3 py-2 text-xs font-medium rounded-lg bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 hover:bg-zinc-800 dark:hover:bg-zinc-200 transition shadow-xs cursor-pointer">
                        <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                        </svg>
                        Registrar empleado
                    </button>
                </div>
            </div>

            <!-- Contenedor Unificado Master-Detail -->
            <div
                class="rounded-xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900 overflow-hidden shadow-xs">
                <div class="grid grid-cols-1 lg:grid-cols-12">

                    <!-- PANEL IZQUIERDO: ÁREAS DE TRABAJO -->
                    <div
                        class="lg:col-span-3 border-b lg:border-b-0 lg:border-r border-zinc-200 dark:border-zinc-800 bg-zinc-50/50 dark:bg-zinc-900/50 p-3 flex flex-col justify-between">
                        <div class="space-y-1">
                            <div class="px-2.5 py-1.5 text-[11px] font-semibold uppercase tracking-wider text-zinc-400">
                                Áreas de Trabajo
                            </div>

                            <!-- Botón Todos -->
                            <button onclick="filterByArea('Todos')" id="btn-area-Todos"
                                class="area-btn w-full flex items-center justify-between px-2.5 py-2 rounded-lg text-sm font-medium bg-zinc-200/70 dark:bg-zinc-800 text-zinc-900 dark:text-white transition cursor-pointer">
                                <span class="flex items-center gap-2 truncate">
                                    <svg class="size-4 text-zinc-500 dark:text-zinc-400 shrink-0" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                                    </svg>
                                    Todos los empleados
                                </span>
                                <span
                                    class="text-xs font-mono px-1.5 py-0.5 rounded bg-white dark:bg-zinc-700 text-zinc-700 dark:text-zinc-200 shadow-2xs">85</span>
                            </button>

                            <div class="my-2 border-t border-zinc-200/70 dark:border-zinc-800"></div>

                            <!-- Lista de Áreas -->
                            <div id="areas-list" class="space-y-0.5">
                                <!-- Inyectado por JS -->
                            </div>
                        </div>

                        <div class="pt-4 mt-4 border-t border-zinc-200/70 dark:border-zinc-800">
                            <button onclick="openModal('modal-area')"
                                class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-lg border border-dashed border-zinc-300 dark:border-zinc-700 text-xs font-medium text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white hover:border-zinc-400 dark:hover:border-zinc-600 transition cursor-pointer">
                                <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                Agregar área de trabajo
                            </button>
                        </div>
                    </div>

                    <!-- PANEL DERECHO: TABLA DE EMPLEADOS -->
                    <div class="lg:col-span-9 flex flex-col justify-between">

                        <!-- Barra de herramientas de la tabla -->
                        <div
                            class="p-4 border-b border-zinc-200 dark:border-zinc-800 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                            <!-- Breadcrumb contextual -->
                            <div class="flex items-center gap-2 text-sm">
                                <span class="text-zinc-500 dark:text-zinc-400">Bechtelar, Greenfelder and Conroy</span>
                                <svg class="size-4 text-zinc-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span id="current-area-label"
                                    class="font-medium text-zinc-900 dark:text-white">Todos</span>
                            </div>

                            <!-- Buscador rápido -->
                            <div class="relative w-full sm:w-64">
                                <svg class="size-4 text-zinc-400 absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                                <input type="text" id="search-input" onkeyup="filterTable()"
                                    placeholder="Buscar nombre, cédula o cargo..."
                                    class="w-full pl-9 pr-3 py-1.5 text-xs rounded-lg border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-800/70 text-zinc-900 dark:text-zinc-100 placeholder-zinc-400 focus:outline-none focus:ring-2 focus:ring-zinc-500/30">
                            </div>
                        </div>

                        <!-- Tabla Responsiva -->
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr
                                        class="border-b border-zinc-200 dark:border-zinc-800 bg-zinc-50/60 dark:bg-zinc-900/40 text-[11px] font-semibold uppercase tracking-wider text-zinc-500 dark:text-zinc-400">
                                        <th class="py-3 px-4">Colaborador</th>
                                        <th class="py-3 px-4">Cédula</th>
                                        <th class="py-3 px-4">Área</th>
                                        <th class="py-3 px-4">Cargo</th>
                                        <th class="py-3 px-4 text-right">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="employees-tbody"
                                    class="divide-y divide-zinc-100 dark:divide-zinc-800/80 text-sm">
                                    <!-- Filas inyectadas por JS -->
                                </tbody>
                            </table>
                        </div>

                        <!-- Estado vacío (oculto por defecto) -->
                        <div id="empty-state" class="hidden py-12 px-4 text-center">
                            <p class="text-sm font-medium text-zinc-900 dark:text-white">No se encontraron colaboradores
                            </p>
                            <p class="text-xs text-zinc-500 mt-1">Intenta cambiar el filtro de área o el término de
                                búsqueda.</p>
                        </div>

                        <!-- Paginación Moderna -->
                        <div
                            class="px-4 py-3 border-t border-zinc-200 dark:border-zinc-800 bg-zinc-50/40 dark:bg-zinc-900/40 flex flex-col sm:flex-row items-center justify-between gap-3">
                            <p class="text-xs text-zinc-500 dark:text-zinc-400">
                                Mostrando <span id="showing-count" class="font-medium text-zinc-900 dark:text-white">1 a
                                    10</span> de <span class="font-medium text-zinc-900 dark:text-white">85</span>
                                resultados
                            </p>

                            <nav
                                class="inline-flex items-center gap-1 rounded-lg border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-800 p-1">
                                <button disabled
                                    class="size-7 flex items-center justify-center rounded-md text-zinc-300 dark:text-zinc-600 cursor-not-allowed">
                                    <svg class="size-4" viewBox="0 0 16 16" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9.78 4.22a.75.75 0 0 1 0 1.06L7.06 8l2.72 2.72a.75.75 0 1 1-1.06 1.06L5.47 8.53a.75.75 0 0 1 0-1.06l3.25-3.25a.75.75 0 0 1 1.06 0Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <button
                                    class="h-7 px-2.5 text-xs font-semibold rounded-md bg-zinc-900 dark:bg-zinc-700 text-white">1</button>
                                <button
                                    class="h-7 px-2.5 text-xs font-medium rounded-md text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-700/60">2</button>
                                <button
                                    class="h-7 px-2.5 text-xs font-medium rounded-md text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-700/60">3</button>
                                <span class="px-1.5 text-xs text-zinc-400">...</span>
                                <button
                                    class="h-7 px-2.5 text-xs font-medium rounded-md text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-700/60">9</button>
                                <button
                                    class="size-7 flex items-center justify-center rounded-md text-zinc-600 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-zinc-700/60">
                                    <svg class="size-4" viewBox="0 0 16 16" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- MODAL: NUEVA ÁREA -->
    <div id="modal-area" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-xs p-4">
        <div
            class="w-full max-w-md rounded-xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-6 shadow-xl space-y-5">
            <div class="flex items-start justify-between">
                <div>
                    <h3 class="text-base font-semibold text-zinc-900 dark:text-white">Crear área de trabajo</h3>
                    <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-1">Ingresa el nombre del departamento o área
                        operativa.</p>
                </div>
                <button onclick="closeModal('modal-area')"
                    class="text-zinc-400 hover:text-zinc-600 dark:hover:text-white">✕</button>
            </div>
            <div>
                <label class="block text-xs font-medium text-zinc-700 dark:text-zinc-300 mb-1.5">Nombre del área</label>
                <input type="text" placeholder="Ej. Producción y Planta"
                    class="w-full rounded-lg border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-800 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-zinc-500">
            </div>
            <div class="flex justify-end gap-2 pt-2">
                <button onclick="closeModal('modal-area')"
                    class="px-3.5 py-2 text-xs font-medium rounded-lg border border-zinc-300 dark:border-zinc-700 hover:bg-zinc-100 dark:hover:bg-zinc-800">Cancelar</button>
                <button onclick="closeModal('modal-area')"
                    class="px-3.5 py-2 text-xs font-medium rounded-lg bg-zinc-900 dark:bg-white text-white dark:text-zinc-900">Guardar
                    área</button>
            </div>
        </div>
    </div>

    <!-- MODAL: NUEVO EMPLEADO -->
    <div id="modal-employee"
        class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-xs p-4">
        <div
            class="w-full max-w-lg rounded-xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-6 shadow-xl space-y-5">
            <div class="flex items-start justify-between">
                <div>
                    <h3 class="text-base font-semibold text-zinc-900 dark:text-white">Registrar colaborador</h3>
                    <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-1">Asigna el trabajador a un área y cargo
                        específico.</p>
                </div>
                <button onclick="closeModal('modal-employee')"
                    class="text-zinc-400 hover:text-zinc-600 dark:hover:text-white">✕</button>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-medium text-zinc-400 mb-1">Área</label>
                    <select class="w-full rounded-lg border border-zinc-700 bg-zinc-800 px-3 py-2 text-sm">
                        <option>Administración y Finanzas</option>
                        <option>Operaciones y Logística</option>
                        <option>Tecnología e Informática</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium text-zinc-400 mb-1">Cargo</label>
                    <input type="text" placeholder="Ej. Analista"
                        class="w-full rounded-lg border border-zinc-700 bg-zinc-800 px-3 py-2 text-sm">
                </div>
                <div>
                    <label class="block text-xs font-medium text-zinc-400 mb-1">Nombres</label>
                    <input type="text" placeholder="John"
                        class="w-full rounded-lg border border-zinc-700 bg-zinc-800 px-3 py-2 text-sm">
                </div>
                <div>
                    <label class="block text-xs font-medium text-zinc-400 mb-1">Apellidos</label>
                    <input type="text" placeholder="Doe"
                        class="w-full rounded-lg border border-zinc-700 bg-zinc-800 px-3 py-2 text-sm">
                </div>
                <div>
                    <label class="block text-xs font-medium text-zinc-400 mb-1">Cédula</label>
                    <input type="text" placeholder="0912345678"
                        class="w-full rounded-lg border border-zinc-700 bg-zinc-800 px-3 py-2 text-sm font-mono">
                </div>
                <div>
                    <label class="block text-xs font-medium text-zinc-400 mb-1">Correo electrónico</label>
                    <input type="email" placeholder="correo@empresa.com"
                        class="w-full rounded-lg border border-zinc-700 bg-zinc-800 px-3 py-2 text-sm">
                </div>
            </div>
            <div class="flex justify-end gap-2 pt-2">
                <button onclick="closeModal('modal-employee')"
                    class="px-3.5 py-2 text-xs font-medium rounded-lg border border-zinc-700 hover:bg-zinc-800">Cancelar</button>
                <button onclick="closeModal('modal-employee')"
                    class="px-3.5 py-2 text-xs font-medium rounded-lg bg-white text-zinc-900">Guardar empleado</button>
            </div>
        </div>
    </div>

    <script>
        // DATOS EXACTOS DE TU VISTA ACTUAL
        const objectives = [
            {
                title: "1. Orientación y Planificación",
                items: [
                    { name: "Mapeo de procesos de la actividad laboral, métodos de trabajo (procedimientos)", progress: 0 },
                    { name: "Diagnóstico general de salud en el trabajo", progress: 0 },
                    { name: "Diagnóstico de salud física del trabajador", progress: 0 },
                    { name: "Diagnóstico de salud mental del trabajador", progress: 0 },
                    { name: "Revisión de los datos disponibles de enfermedades profesionales y accidentes", progress: 100 }
                ]
            },
            {
                title: "2. Análisis y Recopilación de Información",
                items: [
                    { name: "Elaboración de la línea base de identificación de peligros, evaluación de riesgos y establecimiento de medidas de control", progress: 0 },
                    { name: "Evaluación y control de la eficacia de los equipos de protección personal y colectiva", progress: 0 },
                    { name: "Evaluación y seguimiento de los sistemas de control diseñados para eliminar o reducir la exposición a riesgos laborales", progress: 0 },
                    { name: "Evaluación de higiene del trabajo seguimiento de las medidas de control implementadas", progress: 0 },
                    { name: "Inspección y seguimiento de los servicios de alimentación, hospedaje e instalaciones sanitarias", progress: 0 },
                    { name: "Matriz de exámenes ocupacionales de acuerdo con los riesgos laborales y puesto de trabajo", progress: 0 },
                    { name: "Evaluación médica y psicológica (aptitud laboral, condiciones de salud)", progress: 0 },
                    { name: "Evaluación médica pre-ocupacionales - inicio", progress: 0 },
                    { name: "Evaluación médica periódica", progress: 0 },
                    { name: "Evaluación médica de reintegro / especiales", progress: 0 },
                    { name: "Evaluación médica de retiro", progress: 0 },
                    { name: "Análisis de la vigilancia epidemiológica de la salud en el trabajo", progress: 0 },
                    { name: "Identificación del trabajador o grupos de exposición", progress: 0 },
                    { name: "Evaluación y seguimiento de las medidas de promoción de la salud y prevención de enfermedades relacionadas con el trabajo", progress: 0 },
                    { name: "Identificación y seguimiento de grupos prioritarios y en condición de vulnerabilidad", progress: 100 },
                    { name: "Informe epidemiológico de hallazgos y resultados de las evaluaciones de salud en el trabajo al empleador", progress: 0 }
                ]
            },
            {
                title: "3. Comunicación y Capacitación en Materia de Seguridad y Salud en el Trabajo",
                items: [
                    { name: "Comunicación al trabajador sobre los posibles efectos en la salud a consecuencia de los riesgos laborales identificados en su puesto de trabajo", progress: 0 },
                    { name: "Capacitación interna o externa dirigida al trabajador en materia de seguridad y salud en el trabajo", progress: 0 }
                ]
            },
            {
                title: "4. Acciones Preventivas para la Gestión de los Peligros y Riesgos para la Seguridad y Salud en el Trabajo",
                items: [
                    { name: "Control de riesgos laborales de acuerdo con la jerarquía de controles para la implementación de las medidas de prevención y protección (eliminación, sustitución, control de ingeniería, control administrativo, control sobre el trabajador)", progress: 0 },
                    { name: "Planes de seguridad de acuerdo con los riesgos laborales identificados en el lugar y/o centro de trabajo", progress: 0 }
                ]
            },
            {
                title: "5. Accidentes de Trabajo",
                items: [
                    { name: "Procedimiento para la ejecución de la investigación, reporte y datos de accidentes e incidentes de trabajo", progress: 0 }
                ]
            },
            {
                title: "6. Preparación y Respuesta ante Emergencias",
                items: [
                    { name: "Evaluación de riesgo de accidentes mayores, análisis de vulnerabilidades y amenazas", progress: 0 },
                    { name: "Planes de emergencia y contingencia", progress: 0 },
                    { name: "Plan de acción como respuesta ante una emergencia, atención prehospitalaria y evacuación médica", progress: 0 },
                    { name: "Programa de entrenamiento de primera respuesta para todo el personal", progress: 0 },
                    { name: "Programa de reclutamiento, selección, conformación, entrenamiento y evaluación técnica, médica y psicológica de brigadistas para respuesta especializada", progress: 0 },
                    { name: "Programa de dotación, inspección y mantenimiento de instalaciones, equipos y vehículos de emergencia", progress: 0 },
                    { name: "Ejecución de simulacros (mínimo una vez al año)", progress: 0 }
                ]
            },
            {
                title: "7. Enfermedades Profesionales y Relacionadas con el Trabajo",
                items: [
                    { name: "Análisis de hallazgos clínicos asociados con exposiciones específicas", progress: 0 },
                    { name: "Exclusión de factores no ocupacionales como posibles causas de enfermedades profesionales", progress: 0 },
                    { name: "Procedimiento para la ejecución de la investigación, reporte y datos de posibles enfermedades profesionales", progress: 0 }
                ]
            },
            {
                title: "8. Cuidado de la Salud General",
                items: [
                    { name: "Programa de inmunizaciones en coordinación con la Autoridad Sanitaria Nacional", progress: 0 },
                    { name: "Programas de salud pública vigentes aplicables a los lugares y/o centros de trabajo", progress: 0 },
                    { name: "Programa de atención primaria en salud en función de las necesidades de los lugares y/o centros de trabajo", progress: 0 },
                    { name: "Programa para el cuidado de la salud mental en el trabajo", progress: 0 }
                ]
            },
            {
                title: "9. Mantenimiento de Registros",
                items: [
                    { name: "Políticas, programas y lineamientos de salud en el trabajo", progress: 0 },
                    { name: "Registros de atenciones de salud", progress: 0 },
                    { name: "Registros de datos de exposiciones ocupacionales, detectadas, medidas y evaluadas", progress: 0 },
                    { name: "Registro de investigación, reporte y datos de presuntas enfermedades profesionales y enfermedades profesionales calificadas", progress: 0 },
                    { name: "Registro de investigación, reporte y datos de presuntos accidentes de trabajo y accidentes de trabajo calificados", progress: 0 },
                    { name: "Mantener actualizado el expediente de salud (Evaluaciones médicas y psicológicas, exámenes médicos, entre otros)", progress: 0 },
                    { name: "Evidencia del cumplimiento de políticas, programas y lineamientos de salud en el trabajo", progress: 0 },
                    { name: "Todos los demás registros en materia de seguridad y salud en el trabajo solicitados por los entes de control", progress: 0 }
                ]
            },
            {
                title: "10. Seguimiento y Evaluación",
                items: [
                    { name: "Programa de mejoramiento continuo de la calidad de los SISAT basados en los componentes antes descritos", progress: 0 },
                    { name: "Análisis del cumplimiento (auditoría interna) de la gestión de los SISAT de acuerdo con sus componentes por categoría", progress: 0 },
                    { name: "Identificación de necesidades para la modificación o desarrollo de nuevos servicios de salud en el trabajo", progress: 0 }
                ]
            }
        ];

        const areas = [
            { name: "Administración y Finanzas", count: 18 },
            { name: "Legal y Cumplimiento", count: 6 },
            { name: "Operaciones y Logística", count: 32 },
            { name: "Recursos Humanos", count: 8 },
            { name: "Seguridad y Salud en el Trabajo", count: 5 },
            { name: "Tecnología e Informática", count: 7 },
            { name: "Ventas y Mercadeo", count: 9 }
        ];

        const employees = [
            { id: 1183, name: "Adan Kub", cedula: "1955473182", area: "Tecnología e Informática", role: "Administrador de Base de Datos" },
            { id: 1168, name: "Alec Spencer", cedula: "5095748392", area: "Administración y Finanzas", role: "Director Financiero" },
            { id: 1178, name: "Alejandrin Davis", cedula: "3206443401", area: "Recursos Humanos", role: "Gerente de Talento Humano" },
            { id: 1189, name: "Armando Mayert", cedula: "6908933773", area: "Administración y Finanzas", role: "Auxiliar Contable" },
            { id: 1152, name: "Assunta Brakus", cedula: "6730737113", area: "Ventas y Mercadeo", role: "Director Comercial" },
            { id: 1151, name: "Aubree Ryan", cedula: "9564299855", area: "Administración y Finanzas", role: "Auxiliar Contable" },
            { id: 1190, name: "Augusta Miller", cedula: "2694757278", area: "Administración y Finanzas", role: "Analista de Tesorería" },
            { id: 1136, name: "Benjamin Batz", cedula: "5058227583", area: "Administración y Finanzas", role: "Analista de Tesorería" },
            { id: 1157, name: "Billie Reichert", cedula: "5540515279", area: "Administración y Finanzas", role: "Analista de Tesorería" },
            { id: 1172, name: "Brice Lehner", cedula: "1005021619", area: "Administración y Finanzas", role: "Auxiliar Contable" }
        ];

        let selectedArea = 'Todos';

        // Renderizar Objetivos
        function renderObjectives() {
            const container = document.getElementById('objectives-container');
            container.innerHTML = objectives.map(obj => {
                const completedCount = obj.items.filter(i => i.progress === 100).length;
                return `
                <div class="rounded-xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900 overflow-hidden">
                    <div class="border-b border-zinc-200 dark:border-zinc-800 px-5 py-3 flex items-center justify-between bg-zinc-50/50 dark:bg-zinc-900">
                        <h3 class="text-sm font-semibold text-zinc-800 dark:text-zinc-100">${obj.title}</h3>
                        <span class="text-xs font-mono text-zinc-500">${completedCount}/${obj.items.length}</span>
                    </div>
                    <div class="divide-y divide-zinc-100 dark:divide-zinc-800/80">
                        ${obj.items.map(item => `
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 px-5 py-3 hover:bg-zinc-50 dark:hover:bg-zinc-800/40 transition">
                                <p class="text-sm text-zinc-700 dark:text-zinc-300 leading-snug">${item.name}</p>
                                <div class="flex items-center gap-4 shrink-0">
                                    <div class="flex w-36 items-center gap-2.5">
                                        <div class="h-1.5 flex-1 overflow-hidden rounded-full bg-zinc-200 dark:bg-zinc-800">
                                            <div class="h-full rounded-full ${item.progress === 100 ? 'bg-emerald-500' : 'bg-zinc-900 dark:bg-white'}" style="width: ${item.progress}%"></div>
                                        </div>
                                        <span class="w-12 text-right font-mono text-xs tabular-nums ${item.progress === 100 ? 'text-emerald-500 font-medium' : 'text-zinc-500'}">
                                            ${item.progress.toFixed(2)}%
                                        </span>
                                    </div>
                                    <a href="#" class="inline-flex items-center gap-1 px-2.5 py-1 text-xs font-medium rounded-md text-zinc-700 dark:text-zinc-300 hover:bg-zinc-200/70 dark:hover:bg-zinc-800 transition">
                                        Detalles
                                        <svg class="size-3.5" viewBox="0 0 16 16" fill="currentColor"><path fill-rule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/></svg>
                                    </a>
                                </div>
                            </div>
                        `).join('')}
                    </div>
                </div>
                `;
            }).join('');
        }

        // Renderizar Áreas
        function renderAreas() {
            const list = document.getElementById('areas-list');
            list.innerHTML = areas.map(area => `
                <button onclick="filterByArea('${area.name}')" id="btn-area-${area.name}" class="area-btn w-full flex items-center justify-between px-2.5 py-2 rounded-lg text-sm font-medium text-zinc-600 dark:text-zinc-400 hover:bg-zinc-200/50 dark:hover:bg-zinc-800/60 hover:text-zinc-900 dark:hover:text-white transition cursor-pointer">
                    <span class="truncate pr-2">${area.name}</span>
                    <span class="text-xs font-mono text-zinc-400">${area.count}</span>
                </button>
            `).join('');
        }

        // Obtener iniciales
        function getInitials(name) {
            return name.split(' ').map(n => n[0]).slice(0, 2).join('').toUpperCase();
        }

        // Renderizar Tabla de Empleados
        function renderEmployees(data) {
            const tbody = document.getElementById('employees-tbody');
            const emptyState = document.getElementById('empty-state');

            if (data.length === 0) {
                tbody.innerHTML = '';
                emptyState.classList.remove('hidden');
                return;
            }

            emptyState.classList.add('hidden');
            tbody.innerHTML = data.map(emp => `
                <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800/40 transition group">
                    <td class="py-3 px-4">
                        <div class="flex items-center gap-3">
                            <div class="size-8 rounded-full bg-zinc-200 dark:bg-zinc-800 border border-zinc-300 dark:border-zinc-700 flex items-center justify-center text-xs font-semibold text-zinc-700 dark:text-zinc-300 shrink-0">
                                ${getInitials(emp.name)}
                            </div>
                            <span class="font-medium text-zinc-900 dark:text-zinc-100">${emp.name}</span>
                        </div>
                    </td>
                    <td class="py-3 px-4 font-mono text-xs text-zinc-500 dark:text-zinc-400 tabular-nums">
                        ${emp.cedula}
                    </td>
                    <td class="py-3 px-4">
                        <span class="inline-flex items-center px-2 py-0.5 rounded-md text-xs font-medium bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 border border-zinc-200 dark:border-zinc-700/80">
                            ${emp.area}
                        </span>
                    </td>
                    <td class="py-3 px-4 text-zinc-600 dark:text-zinc-300">
                        ${emp.role}
                    </td>
                    <td class="py-3 px-4 text-right">
                        <div class="inline-flex items-center justify-end gap-1">
                            <a href="#" title="Ver ficha médica y ocupacional" class="inline-flex items-center gap-1.5 px-2.5 py-1.5 rounded-md text-xs font-medium text-zinc-700 dark:text-zinc-300 bg-zinc-100/80 dark:bg-zinc-800 hover:bg-zinc-200 dark:hover:bg-zinc-700 transition">
                                <svg class="size-3.5" viewBox="0 0 16 16" fill="currentColor">
                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z"/>
                                    <path fill-rule="evenodd" d="M1.38 8.28a.87.87 0 0 1 0-.566 7.003 7.003 0 0 1 13.238.006.87.87 0 0 1 0 .566A7.003 7.003 0 0 1 1.379 8.28ZM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" clip-rule="evenodd"/>
                                </svg>
                                Ficha
                            </a>
                        </div>
                    </td>
                </tr>
            `).join('');
        }

        // Filtrar por Área
        function filterByArea(areaName) {
            selectedArea = areaName;
            document.getElementById('current-area-label').textContent = areaName;

            // Actualizar estilos de botones activos
            document.querySelectorAll('.area-btn').forEach(btn => {
                btn.classList.remove('bg-zinc-200/70', 'dark:bg-zinc-800', 'text-zinc-900', 'dark:text-white');
                btn.classList.add('text-zinc-600', 'dark:text-zinc-400');
            });

            const activeBtn = document.getElementById(`btn-area-${areaName}`);
            if (activeBtn) {
                activeBtn.classList.remove('text-zinc-600', 'dark:text-zinc-400');
                activeBtn.classList.add('bg-zinc-200/70', 'dark:bg-zinc-800', 'text-zinc-900', 'dark:text-white');
            }

            filterTable();
        }

        // Filtrar Tabla (Área + Buscador)
        function filterTable() {
            const query = document.getElementById('search-input').value.toLowerCase().trim();
            const filtered = employees.filter(emp => {
                const matchesArea = selectedArea === 'Todos' || emp.area === selectedArea;
                const matchesQuery = emp.name.toLowerCase().includes(query) ||
                    emp.cedula.includes(query) ||
                    emp.role.toLowerCase().includes(query);
                return matchesArea && matchesQuery;
            });
            renderEmployees(filtered);
        }

        // Modales
        function openModal(id) {
            const modal = document.getElementById(id);
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal(id) {
            const modal = document.getElementById(id);
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        // Inicializar vista
        renderObjectives();
        renderAreas();
        renderEmployees(employees);
    </script>
</body>

</html>