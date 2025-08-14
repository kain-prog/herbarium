<?php $this->renderPartial('head'); ?>

<?php $this->renderPartial('header-colaborador'); ?>


<div class="pt-12 pb-18 max-w-4xl mx-auto px-1 lg:px-8">
    
    <nav class="flex gap-x-1" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
        <button type="button" class="hs-tab-active:hover:text-white hs-tab-active:dark:text-white py-3 px-3 md:px-4 inline-flex items-center gap-x-2 bg-transparent text-sm font-medium text-center text-gray-500 hover:text-[#2a895c] focus:outline-hidden focus:text-[#2a895c] rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-neutral-300 <?= !$isConsulta ? 'active' : '' ?> rounded-tl-3xl rounded-none cursor-pointer" id="item-1" aria-selected="<?= !$isConsulta ? 'true' : 'false' ?>" data-hs-tab="#novo-relato" aria-controls="novo-relato" role="tab">
            <i class="fa-solid fa-plus"></i>    
            Novo relato
        </button>
        <button type="button" class="hs-tab-active:hover:text-white hs-tab-active:dark:text-white py-3 px-3 md:px-4 inline-flex items-center gap-x-2 bg-transparent text-sm font-medium text-center text-gray-500 hover:text-[#2a895c] focus:outline-hidden focus:text-[#2a895c] rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-neutral-300 <?= !$isConsulta ? '' : 'active' ?> rounded-tr-3xl rounded-none cursor-pointer" id="item-2" aria-selected="<?= $isConsulta ? 'true' : 'false' ?>" data-hs-tab="#consulta" aria-controls="consulta" role="tab">
            <i class="fa-solid fa-magnifying-glass"></i>
            Consultar protocolo
        </button>
    </nav>

    <div class="mt-3">

        <div id="novo-relato" class="<?= !$isConsulta ? '' : 'hidden' ?> bg-slate-100 py-4 px-4 md:px-14" role="tabpanel" aria-labelledby="item-1">
            
            <div class="w-full mb-8">  
                <label for="tipo-relato" class="text-[#2a895c] font-semibold">Tipo de relato*</label>    
                <div class="relative mt-2">
                    <select
                        required
                        name="tipo-relato" 
                        id="tipo-relato"
                        class="w-full bg-zinc-50 text-zinc-600 text-sm border border-[#6bc16a] rounded pl-3 pr-8 py-3 transition duration-300 ease focus:outline-none focus:border-[#6bc16a] hover:border-[#6bc16a] shadow-sm focus:shadow-md appearance-none cursor-pointer">
                        <option disabled selected value="">Sugestão</option>
                        <option value="opcao2">Opção 1</option>
                        <option value="opcao3">Opção 2</option>
                    </select>
                    <i class="fa-solid fa-caret-down text-[#2a895c] h-5 w-5 ml-1 absolute top-3 right-2.5"></i>
                </div>
            </div>

            <div class="w-full mb-4 ">  
                <label for="descricao-relato" class="text-[#2a895c] font-semibold">Seu relato*</label>    
                <textarea required name="descricao-relato" id="descricao-relato" class="mt-2 w-full bg-zinc-50 text-zinc-600 text-sm border border-[#6bc16a] rounded pl-3 pr-8 py-3 transition duration-300 ease focus:outline-none focus:border-[#6bc16a] hover:border-[#6bc16a] shadow-sm focus:shadow-md appearance-none" rows="4" placeholder="Descreva sua mensagem em detalhes..."></textarea>
            </div>

            <div class="w-full mb-12">      
                <div
                    class="w-full bg-zinc-50 text-zinc-600 text-sm border border-[#6bc16a] rounded px-8 pt-4 pb-8 transition duration-300 ease focus:outline-none focus:border-[#6bc16a] hover:border-[#6bc16a] shadow-sm focus:shadow-md appearance-none"
                >
                    <div class="flex items-center gap-2 mb-12">
                        <input type="checkbox" name="anonimo" id="anonimo" required>
                        <label for="anonimo" class="font-semibold relative w-full">
                            <p class="text-[#2a895c] mb-0 w-full block">Enviar como anônimo</p>
                            <small class="absolute mb-0 w-full text-zinc-500">Se marcar esta opção, seus dados não serão enviados</small>
                        </label>
                    </div>

                    <div>
                        <label for="nome" class="text-[#2a895c] font-semibold">Seu nome (Opcional)</label>    
                        <input type="text" name="nome" id="nome" class="mt-2 w-full bg-transparent text-zinc-600 text-sm border border-[#6bc16a] rounded pl-3 pr-8 py-3 transition duration-300 ease focus:outline-none focus:border-[#6bc16a] hover:border-[#6bc16a] shadow-sm focus:shadow-md appearance-none" placeholder="Nome Completo" />
                    </div>
                </div>
            </div>

            <div class="w-full">
                <button 
                    id="criar-relato" 
                    class="w-full bg-[#2a895c] text-white font-semibold py-4 rounded-none rounded-tl-4xl cursor-pointer rounded-br-4xl hover:bg-[#6bc16a] transition duration-300 ease"
                >   
                    Enviar relato
                </button>
            </div>

        </div>

        <div id="consulta" class="<?= !$isConsulta ? 'hidden' : '' ?> bg-slate-100 py-4 px-8 md:py-8 md:px-14" role="tabpanel" aria-labelledby="item-2">
            <div>
                <label for="protocolo" class="text-[#2a895c] font-semibold">Número do Protocolo</label>    
                <div class="flex flex-col sm:flex-row gap-2">
                    <input 
                        type="text" 
                        name="protocolo" 
                        id="protocolo" 
                        class="mt-2 w-full text-zinc-600 bg-zinc-50 text-sm border border-[#6bc16a] rounded pl-3 pr-8 py-3 transition duration-300 ease focus:outline-none focus:border-[#6bc16a] hover:border-[#6bc16a] shadow-sm focus:shadow-sm appearance-none" 
                        placeholder="Insira o código recebido." 
                    />

                    <button 
                        id="verify-button"
                        class="mt-2 w-full sm:max-w-[190px] bg-[#2a895c] text-white font-semibold py-3 rounded-none rounded-tl-4xl cursor-pointer rounded-br-4xl hover:bg-[#6bc16a] transition duration-300 ease"
                    >
                        Verificar
                    </button>
                </div>

                <div id="protocolo-error" class="text-red-500 text-sm my-3 hidden"></div>
            </div>
        </div>
    </div>

</div>

<script>

    const tipoRelato = document.querySelector('#tipo-relato');
    const descricaoRelato = document.querySelector('#descricao-relato');
    const isAnonimo = document.querySelector('#anonimo');
    const nome = document.querySelector('#nome');

    const sendButton = document.querySelector('#criar-relato');

    sendButton.addEventListener('click', async() => {

        if (!tipoRelato.value || !descricaoRelato.value) {
            alert('Preencha todos os campos obrigatórios.');
            return;
        }

        const body = {
            tipo: tipoRelato.value,
            descricao: descricaoRelato.value,
            anonimo: isAnonimo.checked,
            nome: nome.value
        }

        const data = await fetch('/relato', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(body)
        });

        const json = await data.json();
        window.location.href = `/enviado?protocolo=${json.protocolo}`;

    });


    const verifyButton = document.querySelector('#verify-button');
    const protocolo = document.querySelector('#protocolo');

    verifyButton.addEventListener('click', async() => {

        const body = {
            protocolo: protocolo.value
        }

        const data = await fetch('/acompanhe', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(body)
        });
        
        if(!data.ok){
            const json = await data.json();
            document.querySelector('#protocolo-error').textContent = json.error;
            document.querySelector('#protocolo-error').classList.remove('hidden');
            return;
        }

        const json = await data.json();
        window.location.href = `/acompanhe?protocolo=${json.protocolo}`;

    });

    document.addEventListener('DOMContentLoaded', () => {
        const params = new URLSearchParams(window.location.search);
        const tab = params.get('tab');

        if (tab === 'consulta') {
        const btn = document.querySelector('[data-hs-tab="#consulta"]');
        if (btn) btn.click();
        }

        if (tab === 'novo') {
        const btn = document.querySelector('[data-hs-tab="#novo-relato"]');
        if (btn) btn.click();
        }
    });
</script>

<?php $this->renderPartial('footer'); ?>
