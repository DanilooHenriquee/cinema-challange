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

        <p class="text-gray-400 text-xl mb-6"> Selecione o dia que gostaria de assistir o filme </p>

        <p class="text-gray-300 font-semibold text-2xl mb-2"> Sessões </p>

        <div class="bg-gray-800 w-3/4 h-16 flex items-center px-4">

            <?php foreach($showtimes as $showtime): ?>
                <a data-date="<?= $showtime['date'] ?? '' ?>" class="showtime text-gray-400 font-semibold text-2xl cursor-pointer mr-10">
                    <?= date('d/m', strtotime($showtime['date'])) ?? '' ?>
                </a>
            <?php endforeach ?>

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

        <div id="times">

        </div>

        <div id="seats" class="hidden bg-gray-800 w-3/4 mt-4 py-4 justify-items-center grid grid-cols-10 gap-2">

        </div>

        <button id="btnCheckout" class="hidden mt-4 bg-green-800 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 transition ease-in-out duration-150">
            Finalizar compra
        </button>

    </div>
</div>

<!-- Usuário esta logado? -->
<?php if (isset($user) && !empty($user)): ?>
    <input type="hidden" id="userId" value="<?= $user['id'] ?? '' ?>">
    <input type="hidden" id="userName" value="<?= $user['name'] ?? '' ?>">
<?php endif ?>

<script>

    const halls = {}

    let selectedSeats;

    document.querySelectorAll('.showtime')
        .forEach(element => 
            element.addEventListener('click', async function() {

                try {

                    document.querySelectorAll('.showtime')
                        .forEach(showtimeElement => {
                            showtimeElement.classList.remove('text-green-800')
                            showtimeElement.classList.add('text-gray-400')
                        })

                    this.classList.add('text-green-800')

                    const showtimeDate = this.dataset.date

                    const url = "<?= baseUrl('showtime/getAvailableHours') ?>";

                    const response = await fetch(url, {
                        method: 'POST',
                        body: JSON.stringify({showtimeDate})
                    })

                    const result = await response.json()

                    if (!response.ok)
                        throw new Error(result.error)

                    console.log("ResultShowtime: ", result)

                    result.showtimes.forEach(item => {

                        if (halls.hasOwnProperty(item.time)) {
                            halls[item.time].push(item)
                        } else {
                            halls[item.time] = [item]
                        }
                    })

                    console.log("halls", halls)

                    const order = sortObjectByTimeKeys(halls)

                    renderTimeOptions(order)

                } catch (error) {
                    console.error(error)
                    alert(error)
                }

            }))

    function convertToSeconds(time) {
        const [hours, minutes, seconds] = time.split(':').map(Number);
        return hours * 3600 + minutes * 60 + seconds;
    }

    function sortObjectByTimeKeys(obj) {

        const sortedKeys = Object.keys(obj).sort((a, b) => convertToSeconds(a) - convertToSeconds(b));

        const sortedObject = {};
        sortedKeys.forEach(key => {
            sortedObject[key] = obj[key];
        });
        
        return sortedObject;
    }

    function renderTimeOptions(data) {

        const html = `<div class="bg-gray-800 w-3/4 h-16 flex items-center px-4 mt-4">
            ${Object.entries(data).map(([index]) => {
                return `<a data-time="${index}" class="time text-gray-400 font-semibold text-2xl cursor-pointer mr-10">
                    ${index}
                </a>`
            }).join('')}
        </div>`

        document.querySelector('#times').innerHTML = html

        timeEventListener()
    }

    function timeEventListener() {
        document.querySelectorAll('.time')
            .forEach(item => {

                item.addEventListener('click', async function() {

                    try {

                        document.querySelectorAll('.time')
                            .forEach(timeElement => {
                                timeElement.classList.remove('text-green-800')
                                timeElement.classList.add('text-gray-400')
                            })

                        this.classList.add('text-green-800')

                        const time = this.dataset.time

                        const hallId = halls[time][0].hall_id
                        const showtimeId = halls[time][0].id

                        const url = "<?= baseUrl('seat/getSeatsByShowtimeId') ?>";

                        const response = await fetch(url, {
                            method: 'POST',
                            body: JSON.stringify({hallId, showtimeId})
                        })

                        const result = await response.json()

                        console.log(result.seats)

                        renderSeats(result.seats, showtimeId)

                        if (!response.ok)
                            throw new Error(result.error)

                    } catch (error) {
                        console.error(error)
                        alert(error)
                    }
                })
            })
    }


    document.querySelector('#btnCheckout')
        .addEventListener('click', async function() {

            try {

                if (selectedSeats.size == 0) {
                    alert('Você precisa escolher algum lugar para finalizar a compra!')
                    return
                }

                const userId = document.querySelector('#userId').value
                const userName = document.querySelector('#userName').value

                if (userName == 'guest') {
                    alert('Você precisa estar logado para comprar um ingresso \n caso tenha efetuado o login recarregue a página.')
                    window.open("<?= baseUrl('auth/login') ?>", '_blank')

                    return
                }

                const showtimeId = document.querySelector('#seats').dataset.showtime

                console.log("Todos itens: ", "user_id", userId, 'showtimeId', showtimeId, 'seat_id', [...selectedSeats])

                const url = "<?= baseUrl('ticket/store') ?>";

                const response = await fetch(url, {
                    method: 'POST',
                    body: JSON.stringify({userId, showtimeId, seatId: [...selectedSeats]})
                })

                const result = await response.json()

                if (!response.ok)
                    throw new Error(result.error)

                alert(result.message)

                location.reload() 

            } catch (error) {
                console.error(error)
                alert(error)
            }
        })

    function createSeatElement(seat) {

        const seatElement = document.createElement('div')

        const className = seat.available == 0 ? 'seat bg-gray-500 cursor-not-allowed opacity-50' : ''

        seatElement.className = `${className} w-12 h-12 flex items-center justify-center bg-gray-300 border border-gray-500 rounded cursor-pointer`
        seatElement.innerText = seat.seat_code
        seatElement.dataset.id = seat.id

        if (seat.available == 0)
            return seatElement

        seatElement.addEventListener('click', function() {

            if (selectedSeats.has(seat.id)) {
                selectedSeats.delete(seat.id)
                seatElement.classList.remove('bg-green-500')
                seatElement.classList.add('bg-gray-300')
            } else {
                selectedSeats.add(seat.id)
                seatElement.classList.remove('bg-gray-300')
                seatElement.classList.add('bg-green-500')
            }

            console.log(Array.from(selectedSeats))

        })

        return seatElement
    }

    function renderSeats(seats, showtimeId) {

        selectedSeats = new Set()

        const seatsContainer = document.getElementById('seats')

        seatsContainer.innerHTML = ''

        seats.forEach(seat => {

            const seatElement = createSeatElement(seat)

            seatsContainer.dataset.showtime = showtimeId
            seatsContainer.appendChild(seatElement)

            document.querySelector('#seats').classList.remove('hidden')
            document.querySelector('#btnCheckout').classList.remove('hidden')
        })
    }

</script>