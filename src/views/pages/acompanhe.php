<?php $this->renderPartial('head'); ?>

<?php $this->renderPartial('header-acompanhe'); ?>

<div class="pt-12 pb-18 max-w-5xl mx-auto px-4 lg:px-8">

    <div class="bg-slate-100">

        <div class="shadow border-1 border-transparent border-b-[#6bc16a] py-8 px-4 sm:px-12 flex flex-col-reverse items-start gap-10 sm:p-8 sm:flex-row sm:justify-between sm:items-center">
            <div>
                <h2 class="mb-1 sm:mb-3 text-[#2a895c] text-md sm:text-lg font-semibold">Protocolo: <?= $protocolo ?></h2>
                <p class="text-xs sm:text-md text-zinc-400">Aberto em: <?= $created_at ?></p>
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

            <div id="messages" class="w-full px-2">

                <?php foreach ($mensagens as $msg): ?>
                    <?php if ($msg['autor'] === 'colaborador'): ?>
                        <div id="colaborador" class="max-w-xl w-fit flex flex-col items-end ml-auto mr-0 my-8 px-4 sm:px-8">
                            <h6 class="text-xs pr-2 mb-1"><?= $nome ?></h6>
                            <div class="break-all max-w-xl bg-[#2a895c] p-4 sm:p-8 rounded-xl text-zinc-50 mb-2 text-sm sm:text-md">
                                <?= htmlspecialchars($msg['texto']) ?>
                            </div>
                            <?php if (!empty($msg['data'])): ?>
                                <small class="text-zinc-400"><?= date('d/m/Y H:i', strtotime($msg['data'])) ?></small>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div id="atendente" class="max-w-xl w-fit flex flex-col items-left ml-0 mr-auto my-8 px:4 sm:px-8">
                            <div class="break-all max-w-xl bg-zinc-200 p-4 sm:p-8 rounded-xl text-zinc-600 mb-2 text-sm sm:text-md">
                                <?= htmlspecialchars($msg['texto']) ?>
                            </div>
                            <?php if (!empty($msg['data'])): ?>
                                <small class="text-zinc-400"><?= date('d/m/Y H:i', strtotime($msg['data'])) ?></small>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>

            </div>
        
        </div>

    </div>
    <div class="px-6 sm:px-12 py-6 bg-[#2a895c] rounded-bl-2xl rounded-br-2xl">
        <h3 class="font-semibold text-zinc-50 mb-3 text-md">Enviar nova mensagem:</h3>
        <textarea name="nova-mensagem" id="nova-mensagem" class="mt-2 w-full bg-zinc-50 text-zinc-600 text-sm border border-[#6bc16a] rounded-xl pl-3 pr-8 py-3 transition duration-300 ease focus:outline-none focus:border-[#6bc16a] hover:border-[#6bc16a] shadow-sm focus:shadow-md appearance-none" rows="6" placeholder="Digite sua resposta aqui..."></textarea>
        
        <div class="w-full flex flex-col sm:flex-row justify-center gap-4 sm:gap-8 py-5">
            <button 
                id="enviar-mensagem"
                type="button" 
                class="w-full bg-[#6bc16a] text-white font-semibold py-4 px-6 text-sm rounded-none rounded-tl-2xl rounded-br-2xl cursor-pointer hover:bg-[#6bc16a]/80 transition duration-300 ease"
            >
                Enviar Resposta
            </button>

            <?php if (!empty($isAtendente)): ?>
                <button 
                    id="encerrar-relato"
                    type="button" 
                    class="w-full bg-transparent border-1 border-zinc-400 text-white font-semibold py-4 px-6 text-sm rounded-none rounded-tl-2xl rounded-br-2xl cursor-pointer hover:bg-red-500 transition duration-300 ease"
                >
                    Encerrar e Avaliar
                </button>
            <?php endif; ?>
        </div>
    </div>

</div>

<?php $this->renderPartial('header-footer'); ?>


<script>
    const novaMensagem = document.querySelector('#nova-mensagem');

    const enviarMensagem = document.querySelector('#enviar-mensagem');
    const encerrarRelato = document.querySelector('#encerrar-relato');

    const protocolo = `<?php echo $protocolo; ?>`;
    const isAtendente = <?php echo $isAtendente ? 'true' : 'false'; ?>;

    enviarMensagem.addEventListener('click', async() => {

        if(!novaMensagem.value.trim()){
            alert('Por favor, digite uma mensagem antes de enviar.');
            return;
        }

        const data = {
            protocolo: protocolo,
            mensagem: novaMensagem.value,
            isAtendente: isAtendente
        };

        const response = await fetch('/acompanhe/send', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });

        if(response.ok){
            window.location.href = "/acompanhe?protocolo=" + protocolo;
        }

    });
</script>
