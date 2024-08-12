<div class="bg-gray-50 flex items-center">
    <section class="relative flex items-center w-full h-96 bg-cover bg-center" 
        style="background-image: url('<?= baseUrl('assets/img/deadpool-hero.webp') ?>')"
    >
        <div class="absolute inset-0 bg-black opacity-60 z-10"></div>

        <div class="relative z-20 flex items-start justify-center w-full px-8 max-w-4xl space-x-8">

            <div class="w-48 bg-white rounded-lg overflow-hidden shadow-lg">
                <img src="<?= baseUrl($movie['image']) ?>" alt="Deadpool" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-bold mb-2"><?= $movie['title'] ?? '' ?></h2>
                    <p class="text-gray-700"><strong>Classificação:</strong> 16 anos</p>
                    <p class="text-gray-700"><strong>Gênero:</strong> Ação, Comédia</p>
                </div>
            </div>

            <div class="flex-1 text-white flex flex-col justify-center">
                <h1 class="text-5xl font-bold mb-6"><?= $movie['title'] ?? '' ?></h1>
                <p class="text-xl font-semibold mb-12">
                    <?= $movie['description'] ?? '' ?>
                </p>
            </div>
        </div>
    </section>
</div>

<div class="container mx-auto bg-white">
    <div class='bg-[#0d1829] py-20'>

        <p class="text-gray-300 font-semibold text-2xl mb-2"> Sessões </p>

        <div class="bg-gray-800 w-2/4 h-16 flex items-center px-4">
            <a class="showtime text-gray-400 font-semibold text-2xl cursor-pointer mr-10">
                12/08
            </a>

            <a class="showtime text-gray-400 font-semibold text-2xl cursor-pointer mr-10">
                13/08
            </a>

            <a class="text-gray-400 font-semibold text-2xl cursor-not-allowed mr-10" title="Disponível em breve">
                14/08
            </a>

            <a class="text-gray-400 font-semibold text-2xl cursor-not-allowed mr-10" title="Disponível em breve">
                15/08
            </a>

            <a class="text-gray-400 font-semibold text-2xl cursor-not-allowed mr-10" title="Disponível em breve">
                16/08
            </a>
        </div>

    </div>
</div>


<script>

    document.querySelectorAll('.showtime')
        .forEach(element => 
            element.addEventListener('click', function() {
                const movieId = this.dataset.id
                
                console.log("Clicou na sessão")
            }))

</script>