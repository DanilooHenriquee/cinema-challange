<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Cinema em casa</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-[#0d1829] text-gray-900">

    <header>

        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="relative flex h-16 items-center justify-between">
                    <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                        <!-- Mobile menu button-->
                        <button type="button"
                            class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <!--
                                Icon when menu is closed.

                                Menu open: "hidden", Menu closed: "block"
                            -->
                            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <!--
                                Icon when menu is open.

                                Menu open: "block", Menu closed: "hidden"
                            -->
                            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="flex flex-shrink-0 items-center">
                            <a href="<?= baseUrl('home') ?>">
                                <img class="h-8 w-auto"
                                src="<?= baseUrl('assets/img/logo.png') ?>"
                                alt="Deadpool">
                            </a>
                        </div>
                        <div class="hidden sm:ml-6 sm:block">
                            <div class="flex space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="<?= baseUrl('home') ?>" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white"
                                    aria-current="page">Home</a>
                                <a href="#"
                                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Filmes</a>
                                <a href="#"
                                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Noticias</a>
                            </div>
                        </div>
                    </div>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                        <a href="<?= baseUrl('auth/login') ?>" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">
                            <svg class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path d="M14 4L17.5 4C20.5577 4 20.5 8 20.5 12C20.5 16 20.5577 20 17.5 20H14M15 12L3 12M15 12L11 16M15 12L11 8" stroke="text-gray-300" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Entre ou cadastre-se
                        </a>
                    </div>

                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="sm:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pb-3 pt-2">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="<?= baseUrl('home') ?>" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white"
                        aria-current="page">Home</a>
                    <a href="#"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Filmes</a>
                    <a href="#"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Noticias</a>
                </div>
            </div>
        </nav>

    </header>

    <!-- Importa a view do controller -->

    <?php include $view; ?>

    <!-- Fim -->

    <footer class="bg-gray-800 text-gray-300" aria-labelledby="footer-heading">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="mx-auto max-w-7xl px-6 pb-8 pt-16 sm:pt-24 lg:px-8 lg:pt-32">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">

                <div class="mt-16 grid grid-cols-2 gap-8 xl:col-span-2 xl:mt-0">
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-sm font-semibold leading-6 text-white">Acessos rápidos</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                <li><a href="#" class="text-gray-300 hover:text-white">Sobre nós</a></li>
                                <li><a href="#" class="text-gray-300 hover:text-white">Noticias</a></li>
                                <li><a href="#" class="text-gray-300 hover:text-white">Filmes</a></li>
                                <li><a href="#" class="text-gray-300 hover:text-white">Fan para fan</a></li>
                            </ul>
                        </div>
                        <div class="mt-10 md:mt-0">
                            <h3 class="text-sm font-semibold leading-6 text-white">Entre em contato</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                <li><a href="#" class="text-gray-300 hover:text-white">Contatos</a></li>
                                <li><a href="#" class="text-gray-300 hover:text-white">Junte-se no Discord</a></li>
                                <li><a href="#" class="text-gray-300 hover:text-white">Twitter</a></li>
                                <li><a href="#" class="text-gray-300 hover:text-white">Instagram</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="mt-16 border-t border-gray-400/10 pt-8 sm:mt-20 lg:mt-24">
                <p class="text-xs leading-5 text-gray-400">&copy; 2024 Cinema em casa. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>


</body>

</html>