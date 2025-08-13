<?php

$_SESSION['atendente'] = false;

session_start();

if (!isset($_SESSION['atendente']) || empty($_SESSION['atendente'])) {
    header('Location: /');
    exit;
}

?>


<?php
    $title = 'Herbarium | Painel do Atendente';
    require __DIR__ . '/../../components/_head.php';
?>



<?php
    require __DIR__ . '/../../components/header-atendente.php';
?>

<div class="max-w-5xl mx-auto px-4 lg:px-8">

    <div class="bg-slate-100 py-14 px-4">

        <nav class="flex gap-x-3 sm:gap-x-6 mb-8" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
            <button type="button" class="hs-tab-active:hover:text-white hs-tab-active:dark:text-white py-3 sm:py-3 px-3 sm:px-6 inline-flex items-center sm:gap-x-2 bg-zinc-50 border-1 border-[#6bc16a] text-xs sm:text-sm font-medium text-center text-gray-500 hover:text-[#2a895c] focus:outline-hidden focus:text-[#2a895c] rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-neutral-300 active rounded-tr-3xl rounded-none cursor-pointer" id="btn-todos" aria-selected="true" data-hs-tab="#novo-relato" aria-controls="novo-relato" role="tab">
                Todos
            </button>

            <button type="button" class="hs-tab-active:hover:text-white hs-tab-active:dark:text-white py-3 sm:py-3 px-3 sm:px-6 inline-flex items-center sm:gap-x-2 bg-zinc-50 border-1 border-[#6bc16a] text-xs sm:text-sm font-medium text-center text-gray-500 hover:text-[#2a895c] focus:outline-hidden focus:text-[#2a895c] rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-neutral-300 rounded-tr-3xl rounded-none cursor-pointer" id="btn-novos" aria-selected="false" data-hs-tab="#consulta" aria-controls="consulta" role="tab">
                Novos
            </button>

            <button type="button" class="hs-tab-active:hover:text-white hs-tab-active:dark:text-white py-3 sm:py-3 px-3 sm:px-6 inline-flex items-center sm:gap-x-2 bg-zinc-50 border-1 border-[#6bc16a] text-xs sm:text-sm font-medium text-center text-gray-500 hover:text-[#2a895c] focus:outline-hidden focus:text-[#2a895c] rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-neutral-300 rounded-tr-3xl rounded-none cursor-pointer" id="btn-em-analise" aria-selected="false" data-hs-tab="#consulta" aria-controls="consulta" role="tab">
                Em Análise
            </button>

            <button type="button" class="hs-tab-active:hover:text-white hs-tab-active:dark:text-white py-3 sm:py-3 px-3 sm:px-6 inline-flex items-center sm:gap-x-2 bg-zinc-50 border-1 border-[#6bc16a] text-xs sm:text-sm font-medium text-center text-gray-500 hover:text-[#2a895c] focus:outline-hidden focus:text-[#2a895c] rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-neutral-300 rounded-tr-3xl rounded-none cursor-pointer" id="btn-respondidos" aria-selected="false" data-hs-tab="#consulta" aria-controls="consulta" role="tab">
                Respondidos
            </button>
        </nav>


        <div class="border-1 border-[#6bc16a] bg-zinc-50 rounded-2xl py-8 px-4">


        </div>
    </div>
</div>

<?php
require __DIR__ . '/../../components/_footer.php';
