
<?php
    $title = 'Herbarium | Canal do Colaborador';
    require __DIR__ . '/../../components/_head.php';
?>


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
    <div class="pt-12 pb-24 max-w-4xl mx-auto px-4 lg:px-8">
        <h2 class="text-[#2a895c] font-bold text-4xl text-center mb-8">Como funciona:</h2>
    </div>

    <div class="flex gap-8 justify-between max-w-4xl mx-auto px-4 lg:px-8">
        <div>
            <img class="mb-4" src="" alt="">
            <p class="text-zinc-400">
                Escolha o tipo de relato que deseja escrever (ex.: elogio, sugestão, crítica).
            </p>
        </div>

        <div>
            <img class="mb-4" src="" alt="">
            <p class="text-zinc-400">
                Descreva o seu relato com o máximo de detalhes possível.
            </p>
        </div>

        <div>
            <img class="mb-4" src="" alt="">
            <p class="text-zinc-400">
                Se preferir, marque “Enviar como anônimo”.
            </p>
        </div>

        <div>
            <img class="mb-4" src="" alt="">
            <p class="text-zinc-400">
                Envie. Você verá o número do protocolo e poderá consultar o andamento quando quiser.
            </p>
        </div>
    </div>

    <div class="flex gap-8 justify-center max-w-4xl mx-auto px-4 lg:px-8">
        <a href="/">Enviar um Relato</a>
        <a href="">Acompanhar Protocolo</a>
    </div>


</div>

<div class="bg-[#172601]">
    <div class="pt-12 pb-24 max-w-4xl mx-auto px-4 lg:px-8">
        <div class="px-8 md:px14 border border-2 border-[#2a895c] py-12 rounded-tr-[80px] rounded-bl-[80px]">
            <h2 class="text-zinc-50 font-bold text-4xl text-center mb-8">Importante</h2>
            <p class="text-center text-zinc-50 font-bold text-lg max-w-3xl mx-auto">Este canal é confidencial e segue a LGPD. Denúncias de má-fé ou acusações sem fundamento podem 
                prejudicar outras pessoas — use com responsabilidade.</p>
        </div>
    </div>


</div>

<nav>
    <a href="/">Home</a>
</nav>

<?php
require __DIR__ . '/../../components/_footer.php';
