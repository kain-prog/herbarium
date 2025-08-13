<?php $this->renderPartial('head'); ?>


<div class="pt-12 pb-18 max-w-4xl mx-auto px-4 lg:px-8">
    <h1 class="text-[#2a895c] font-bold text-3xl text-center mb-8">
        Bem-vindo(a) ao Canal do Colaborador Herbarium!
    </h1>

    <p class="text-center mb-2 text-zinc-400 font-semibold">
        Conte pra gente o que está funcionando bem e o que pode melhorar. 
    </p>

     <p class="text-center text-zinc-400 font-semibold">
        Seu relato pode ser anônimo e você recebe um protocolo para acompanhar a resposta. :)
    </p>
</div>

<div class="bg-zinc-100">
    <div class="pt-12 pb-14 max-w-4xl mx-auto px-4 lg:px-8">
        <h2 class="text-[#2a895c] font-bold text-4xl text-center mb-8">Como funciona:</h2>
    </div>

    <div class="overflow-auto lg:max-w-4xl mx-auto px-4 lg:px-8">
        <div class="w-[1200px] md:w-full max-w-4xl mx-auto flex gap-12 justify-between pb-4">
            <div class="w-full max-w-[33%]">
                <img class="mb-4 max-w-[110px]" src="/assets/images/1.png" alt="Ícone mensagem">
                <p class="text-zinc-400 text-sm">
                    Escolha o tipo de relato que deseja escrever (ex.: elogio, sugestão, crítica).
                </p>
            </div>

            <div class="w-full max-w-[33%]">
                <img class="mb-4 max-w-[110px]" src="/assets/images/2.png" alt="Ícone descrição">
                <p class="text-zinc-400 text-sm">
                    Descreva o seu relato com o máximo de detalhes possível.
                </p>
            </div>

            <div class="w-full max-w-[33%]">
                <img class="mb-4 max-w-[110px]" src="/assets/images/3.png" alt="Ícone anônimo">
                <p class="text-zinc-400 text-sm">
                    Se preferir, marque “Enviar como anônimo”.
                </p>
            </div>

            <div class="w-full max-w-[33%]">
                <img class="mb-4 max-w-[110px]" src="/assets/images/4.png" alt="Ícone envio">
                <p class="text-zinc-400 text-sm">
                    Envie. Você verá o número do protocolo e poderá consultar o andamento quando quiser.
                </p>
            </div>
        </div>
    </div>

    <div class="py-18 flex flex-col sm:flex-row gap-8 justify-center items-center max-w-4xl mx-auto px-4 lg:px-8">
        <a class="flex gap-4 md:gap-4 justify-center items-center px-6 py-4 text-md md:py-3 md:px-12 border-1 border-[#2a895c] text-[#2a895c] rounded-tl-3xl rounded-br-3xl hover:bg-[#6bc16a] hover:border-[#6bc16a] hover:text-zinc-50 transition duration-300" href="/relato">
            <i class="fa-solid fa-pencil"></i>
            <span class="">Enviar um relato</span>
        </a>
        <a class="flex gap-4 md:gap-4 justify-center items-center px-6 py-4 text-md md:py-3 md:px-12 border-1 border-[#2a895c] text-[#2a895c] rounded-tl-3xl rounded-br-3xl hover:bg-[#6bc16a] hover:border-[#6bc16a] hover:text-zinc-50 transition duration-300" href="/relato?tab=consulta">
            <i class="fa-solid fa-file-pen"></i>
            <span class="">Acompanhar Protocolo</span>
        </a>
    </div>


</div>

<div class="bg-[#172601]">
    <div class="pt-12 pb-12 max-w-4xl mx-auto px-4 lg:px-8">
        <div class="px-8 md:px14 border border-2 border-[#2a895c] py-12 rounded-tr-[80px] rounded-bl-[80px]">
            <h2 class="text-zinc-50 font-bold text-4xl text-center mb-8">Importante</h2>
            <p class="text-center text-zinc-50 font-normal text-lg max-w-3xl mx-auto">
                Este canal é confidencial e segue a LGPD. Denúncias de má-fé ou acusações sem fundamento podem 
                prejudicar outras pessoas — use com responsabilidade.
            </p>
        </div>
    </div>


</div>


<?php $this->renderPartial('footer'); ?>