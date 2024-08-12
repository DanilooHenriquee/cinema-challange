<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-300">
            Entre em sua conta.
        </h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" id="authenticationForm">
            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-300">E-mail</label>
                <div class="mt-2">
                    <input id="email" name="email" type="email" autocomplete="email" required
                        class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-300">Senha</label>
                    <div class="text-sm">
                        <a id="forgotPassword" class="font-semibold text-indigo-600 hover:text-indigo-500 cursor-pointer">Esqueceu a senha?</a>
                    </div>
                </div>
                <div class="mt-2">
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <button type="submit"
                    class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Entrar
                </button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm text-gray-500">
            Não possui cadastro?
            <a href="<?= baseUrl('auth/create') ?>" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">
                Cadastre-se aqui!
            </a>
        </p>
    </div>
</div>

<script defer>

    document.querySelector('#forgotPassword')
        .addEventListener('click', function() {
            alert('Que pena amigo, crie outra conta!')
        })

    document.querySelector('[type=submit]')
        .addEventListener('click', async function (event) {
            event.preventDefault()

            try {
                const authenticationForm = document.querySelector('#authenticationForm')

                const url = "<?= baseUrl('auth/authentication') ?>";

                const response = await fetch(url, {
                    method: 'POST',
                    body: new FormData(authenticationForm)
                })

                const result = await response.json()

                if (!response.ok)
                    throw new Error(result.error)

                if (result.error)
                    throw new Error(result.message)

                alert(result.message)
            } catch (error) {
                console.error(error)
                alert(error)
            }
        })

</script>