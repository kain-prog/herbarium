<?php
    session_start();
    $_SESSION['atendente'] = false;

    $protocolo = '123456789-ABC123';
    $created_at = '28 de julho de 2025';
?>


<?php
    $title = 'Canal do Colaborador';
    require __DIR__ . '/../../components/_head.php';
?>


<?php
    require __DIR__ . '/../../components/header-acompanhe.php';
?>


<div class="pt-12 pb-18 max-w-5xl mx-auto px-4 lg:px-8">

    <div class="bg-slate-100">

        <div class="shadow border-1 border-transparent border-b-[#6bc16a] py-8 px-12 flex flex-col-reverse items-start gap-10 sm:p-8 sm:flex-row sm:justify-between sm:items-center">
            <div>
                <h2 class="mb-3 text-[#2a895c] text-md sm:text-lg font-semibold">Protocolo: <?= $protocolo ?></h2>
                <p class="text-sm sm:text-md text-zinc-400">Aberto em: <?= $created_at ?></p>
            </div>

            <div>
                <a 
                    class="bg-[#2a895c] text-white font-semibold py-3 px-6 text-sm rounded-none rounded-tl-2xl rounded-br-2xl cursor-pointer hover:bg-[#6bc16a] transition duration-300 ease"
                    href="/relato?tab=consulta"
                >
                    Consultar outro
                </a>
            </div>
        </div>


        <div class="overflow-auto w-full h-[400px]">

            <div id="messages" class="w-full">

                <div id="colaborador" class="max-w-xl w-fit flex flex-col items-end ml-auto mr-0 my-8 px-10">
                    <div class="bg-[#2a895c] p-4 sm:p-8 rounded-xl text-zinc-50 mb-2 text-sm sm:text-md">
                        Gostaria de parabenizar a equipe de RH pela organização do evento de final de ano. Foi tudo impecável!
                    </div>
                    <small class="text-zinc-400">28/07/2025 10:30</small>
                </div>

                <div id="atendente" class="max-w-xl w-fit flex flex-col items-end ml-auto mr-0 my-8 px-10">
                    <div class="bg-[#2a895c] p-4 sm:p-8 rounded-xl text-zinc-50 mb-2 text-sm sm:text-md">
                        Gostaria de parabenizar a equipe de RH pela organização do evento de final de ano. Foi tudo impecável!
                    </div>
                    <small class="text-zinc-400">28/07/2025 10:30</small>
                </div>

                <div id="atendente" class="max-w-xl w-fit flex flex-col items-end ml-auto mr-0 my-8 px-10">
                    <div class="bg-[#2a895c] p-4 sm:p-8 rounded-xl text-zinc-50 mb-2 text-sm sm:text-md">
                        Gostaria de parabenizar a equipe de RH pela organização do evento de final de ano. Foi tudo impecável!
                    </div>
                    <small class="text-zinc-400">28/07/2025 10:30</small>
                </div>

                <div id="colaborador" class="max-w-xl w-fit flex flex-col items-end ml-auto mr-0 my-8 px-10">
                    <div class="bg-[#2a895c] p-4 sm:p-8 rounded-xl text-zinc-50 mb-2 text-sm sm:text-md">
                        Gostaria de parabenizar a equipe de RH pela organização do evento de final de ano. Foi tudo impecável!
                    </div>
                    <small class="text-zinc-400">28/07/2025 10:30</small>
                </div>

                <div id="atendente" class="max-w-xl w-fit flex flex-col items-left ml-0 mr-auto my-8 px-10">
                    <div class="bg-zinc-200 p-4 sm:p-8 rounded-xl text-zinc-600 mb-2 text-sm sm:text-md">
                        Atendimento finalizado
                    </div>
                    <small class="text-zinc-400">28/07/2025 10:30</small>
                </div>

            </div>
        
        </div>

    </div>
    <div class="px-12 py-6 bg-[#2a895c] rounded-bl-2xl rounded-br-2xl">
        <h3 class="font-semibold text-zinc-50 mb-3 text-md">Enviar nova mensagem:</h3>
        <textarea name="nova_mensagem-relato" id="mensagem-relato" class="mt-2 w-full bg-zinc-50 text-zinc-600 text-sm border border-[#6bc16a] rounded pl-3 pr-8 py-3 transition duration-300 ease focus:outline-none focus:border-[#6bc16a] hover:border-[#6bc16a] shadow-sm focus:shadow-md appearance-none" rows="4" placeholder="Digite sua resposta aqui..."></textarea>
        
        <div class="w-full flex flex-col sm:flex-row justify-center gap-4 sm:gap-8 py-5">
            <button type="button" class="w-full bg-[#6bc16a] text-white font-semibold py-3 px-6 text-sm rounded-none rounded-tl-2xl rounded-br-2xl cursor-pointer hover:bg-[#6bc16a]/80 transition duration-300 ease">
                Enviar Resposta
            </button>

            <?php if (isset($_SESSION['atendente']) && !empty($_SESSION['atendente'])): ?>
                <button type="button" class="w-full bg-red-600 text-white font-semibold py-3 px-6 text-sm rounded-none rounded-tl-2xl rounded-br-2xl cursor-pointer hover:bg-red-500 transition duration-300 ease">
                    Encerrar e Avaliar
                </button>
            <?php endif; ?>
        </div>
    </div>

</div>

<?php
require __DIR__ . '/../../components/_footer.php';
