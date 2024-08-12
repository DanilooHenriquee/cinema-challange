<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page not found</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <main class="grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="text-center">
            <p class="text-base font-semibold text-indigo-600">404</p>
            <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">Página não encontrada.</h1>
            <p class="mt-6 text-base leading-7 text-gray-600">Desculpe, não encontramos a página que você busca.</p>

            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="<?= baseUrl('home') ?>" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Voltar para página inical</a>
                <a href="#" class="text-sm font-semibold text-gray-900">Informe sobre o problema <span aria-hidden="true">&rarr;</span></a>
            </div>
        </div>
    </main>
</body>
</html>