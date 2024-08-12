<div class="container mx-auto">
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-2xl py-6">

        <form id="userForm">
            <div>
                <div class="border-b border-gray-300/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-300">Informações pessoais</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">
                        Informe um e-mail válido para receber a confirmação de cadastro.
                    </p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="name" class="block text-sm font-medium leading-6 text-gray-300">
                                Nome completo
                            </label>
                            <div class="mt-2">
                                <input type="text" name="name" id="name" autocomplete="given-name"
                                    class="px-4 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="cellphone" class="block text-sm font-medium leading-6 text-gray-300">
                                Telefone
                            </label>
                            <div class="mt-2">
                                <input id="cellphone" name="cellphone" type="cellphone" autocomplete="cellphone"
                                    class="px-4 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-300">
                                E-mail
                            </label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" autocomplete="email"
                                    class="px-4 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-300">
                                Senha (Vai ver a senha para não errar.)
                            </label>
                            <div class="mt-2">
                                <input type="text" name="password" id="password" autocomplete="family-name"
                                    class="px-4 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="border-b border-gray-300/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-300">Notificações</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">
                        Gostaria de receber noticias sobre seus filmes e artistas favoritos?
                    </p>

                    <div class="mt-10 space-y-10">
                        <fieldset>
                            <legend class="text-sm font-semibold leading-6 text-gray-300">Quais noticias gostaria de receber:</legend>
                            <div class="mt-6 space-y-6">

                                <div class="relative flex gap-x-3">
                                    <div class="flex h-6 items-center">
                                        <input id="news[movies]" name="news[movies]" type="checkbox"
                                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    </div>
                                    <div class="text-sm leading-6">
                                        <label for="news[movies]" class="font-medium text-gray-300">Filmes</label>
                                        <p class="text-gray-500">Enviaremos noticias sobre os melhores filmes do momento.</p>
                                    </div>
                                </div>

                                <div class="relative flex gap-x-3">
                                    <div class="flex h-6 items-center">
                                        <input id="news[artists]" name="news[artists]" type="checkbox"
                                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    </div>
                                    <div class="text-sm leading-6">
                                        <label for="news[artists]" class="font-medium text-gray-300">Artistas</label>
                                        <p class="text-gray-500">Enviaremos noticias sobre seus artistas favoritos</p>
                                    </div>
                                </div>

                            </div>
                        </fieldset>
                        <fieldset>
                            <legend class="text-sm font-semibold leading-6 text-gray-300">Por quais canais de comunicação gostaria de receber:</legend>
                            <div class="mt-6 space-y-6">

                                <div class="relative flex gap-x-3">
                                    <div class="flex h-6 items-center">
                                        <input id="notification[email]" name="notification[email]" type="checkbox"
                                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    </div>
                                    <div class="text-sm leading-6">
                                        <label for="notification[email]" class="font-medium text-gray-300">E-mail</label>
                                    </div>
                                </div>

                                <div class="relative flex gap-x-3">
                                    <div class="flex h-6 items-center">
                                        <input id="notification[whatsapp]" name="notification[whatsapp]" type="checkbox"
                                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    </div>
                                    <div class="text-sm leading-6">
                                        <label for="notification[whatsapp]" class="font-medium text-gray-300">Whatsapp</label>
                                    </div>
                                </div>

                            </div>
                        </fieldset>

                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" id="btnCancel" class="text-sm font-semibold leading-6 text-gray-300">Cancelar</button>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Salvar
                </button>
            </div>
        </form>

    </div>
</div>


<script>

    document.querySelector('[type=submit]')
        .addEventListener('click', async function (event) {
            event.preventDefault()

            try {
                const userForm = document.querySelector('#userForm')

                const url = "<?= baseUrl('auth/store') ?>";

                const response = await fetch(url, {
                    method: 'POST',
                    body: new FormData(userForm)
                })

                const result = await response.json()

                if (!response.ok)
                    throw new Error(result.error)

                console.log("Result: ", result)

                alert(result.message)

                window.location.href = "<?= baseUrl('auth/login') ?>";
            } catch (error) {
                console.error(error)
                alert(error)
            }

        })

        document.querySelector('#btnCancel')
        .addEventListener('click', async function (event) {
            event.preventDefault()

            window.history.back()
        })

</script>