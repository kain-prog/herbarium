<?php $this->renderPartial('head'); ?>

<?php $this->renderPartial('header-atendente'); ?>

<div class="max-w-5xl mx-auto lg:px-8">

    <div class="bg-slate-100 py-14 px-2 sm:px-4">

        <nav class="flex gap-x-3 sm:gap-x-6 mb-8" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
            <button 
                type="button" 
                class="hs-tab-active:hover:text-white hs-tab-active:dark:text-white py-3 sm:py-3 px-3 sm:px-6 inline-flex items-center sm:gap-x-2 bg-zinc-50 border-1 border-[#6bc16a] text-xs sm:text-sm font-medium text-center text-gray-500 hover:text-[#2a895c] focus:outline-hidden focus:text-[#2a895c] rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-neutral-300 active rounded-tr-3xl rounded-none cursor-pointer" 
                id="btn-todos" 
                aria-selected="true" 
                data-hs-tab="#todos" 
                aria-controls="todos" 
                role="tab"
            >
                Todos
            </button>

            <button type="button" 
                class="hs-tab-active:hover:text-white hs-tab-active:dark:text-white py-3 sm:py-3 px-3 sm:px-6 inline-flex items-center sm:gap-x-2 bg-zinc-50 border-1 border-[#6bc16a] text-xs sm:text-sm font-medium text-center text-gray-500 hover:text-[#2a895c] focus:outline-hidden focus:text-[#2a895c] rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-neutral-300 rounded-tr-3xl rounded-none cursor-pointer" 
                id="btn-novos" 
                aria-selected="false" 
                data-hs-tab="#novos" 
                aria-controls="novos" 
                role="tab"
            >
                Novos
            </button>

            <button type="button" 
                class="hs-tab-active:hover:text-white hs-tab-active:dark:text-white py-3 sm:py-3 px-3 sm:px-6 inline-flex items-center sm:gap-x-2 bg-zinc-50 border-1 border-[#6bc16a] text-xs sm:text-sm font-medium text-center text-gray-500 hover:text-[#2a895c] focus:outline-hidden focus:text-[#2a895c] rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-neutral-300 rounded-tr-3xl rounded-none cursor-pointer" 
                id="btn-em-andamento" 
                aria-selected="false" 
                data-hs-tab="#andamento" 
                aria-controls="andamento" 
                role="tab"
            >
                Em Andamento
            </button>

            <button type="button" 
                class="hs-tab-active:hover:text-white hs-tab-active:dark:text-white py-3 sm:py-3 px-3 sm:px-6 inline-flex items-center sm:gap-x-2 bg-zinc-50 border-1 border-[#6bc16a] text-xs sm:text-sm font-medium text-center text-gray-500 hover:text-[#2a895c] focus:outline-hidden focus:text-[#2a895c] rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-neutral-300 rounded-tr-3xl rounded-none cursor-pointer" 
                id="btn-respondidos" 
                aria-selected="false" 
                data-hs-tab="#respondidos" 
                aria-controls="respondidos" 
                role="tab"
            >
                Respondidos
            </button>
        </nav>


        <div class="border-1 border-[#6bc16a] bg-zinc-50 rounded-2xl px-2 py-4 sm:p-4">

            <div id="todos" 
                role="tabpanel" 
                aria-labelledby="todos"
            >
                <?php if( count($relatos) > 0 ): ?>

                    <?php foreach( $relatos as $relato ): ?>
                        <a href="/acompanhe?protocolo=<?= $relato['protocolo'] ?>" class="py-2 px-4 justify-between flex items-center rounded-tl-xl rounded-br-xl border-b border-zinc-200 hover:bg-[#2a895c] text-[#2a895c] text-md sm:text-lg font-semibold hover:text-zinc-50 transition-all duration-150">
                            <div>
                                <p class="text-xs text-[#6bc16a]">Protocolo:</p>
                                <?= $relato['protocolo'] ?>
                            </div>

                            <div>
                                <p class="text-[10px] mb-0 font-normal text-zinc-50 px-4 py-1 rounded-2xl bg-[#6bc16a]"><?= ucfirst(str_replace('_', ' ', $relato['status'])) ?></p>
                            </div>
                        </a>
                    <?php endforeach; ?>

                <?php else: ?>

                    <p class="text-center text-sm text-zinc-500 font-normal"> Nenhum relato novo.</p>

                <?php endif; ?>
            </div>


            <div id="novos" 
                class="hidden" 
                role="tabpanel" 
                aria-labelledby="novos"
            >
                <?php if( count($relatos_novos) > 0 ): ?>

                    <?php foreach( $relatos_novos as $relato ): ?>
                        <a href="/acompanhe?protocolo=<?= $relato['protocolo'] ?>" class="py-2 px-4 flex rounded-tl-xl rounded-br-xl border-b border-zinc-200 hover:bg-[#2a895c] text-[#2a895c] text-md sm:text-lg font-semibold hover:text-zinc-50 transition-all duration-150">
                            <div>
                                <p class="text-xs text-[#6bc16a]">Protocolo:</p>
                                <?= $relato['protocolo'] ?>
                            </div>
                        </a>
                    <?php endforeach; ?>

                <?php else: ?>

                    <p class="text-center text-sm text-zinc-500 font-normal"> Nenhum relato novo.</p>

                <?php endif; ?>
            </div>

            <div id="andamento" 
                class="hidden" 
                role="tabpanel" 
                aria-labelledby="andamento"
            >
                <?php if(count($relatos_andamento) > 0 ): ?>
                    <?php foreach( $relatos_andamento as $relato ): ?>
                        <a href="/acompanhe?protocolo=<?= $relato['protocolo'] ?>" class="py-2 px-4 flex rounded-tl-xl rounded-br-xl border-b border-zinc-200 hover:bg-[#2a895c] text-[#2a895c] text-md sm:text-lg font-semibold hover:text-zinc-50 transition-all duration-150">
                            <div>
                                <p class="text-xs text-[#6bc16a]">Protocolo:</p>
                                <?= $relato['protocolo'] ?>
                            </div>
                        </a>
                    <?php endforeach; ?>

                <?php else: ?>

                    <p class="text-center text-zinc-500 font-semibold"> Nenhum relato em andamento.</p>

                <?php endif; ?>
            </div>

            <div id="respondidos" 
                class="hidden" 
                role="tabpanel" 
                aria-labelledby="respondidos"
            >
                <?php if(count($relatos_respondidos) > 0):?>

                    <?php foreach( $relatos_respondidos as $relato ): ?>
                        <a href="/acompanhe?protocolo=<?= $relato['protocolo'] ?>" class="py-2 px-4 flex rounded-tl-xl rounded-br-xl border-b border-zinc-200 hover:bg-[#2a895c] text-[#2a895c] text-md sm:text-lg font-semibold hover:text-zinc-50 transition-all duration-150">
                            <div>
                                <p class="text-xs text-[#6bc16a]">Protocolo:</p>
                                <?= $relato['protocolo'] ?>
                            </div>
                        </a>
                    <?php endforeach; ?>

                <?php else: ?>

                    <p class="text-center text-sm text-zinc-500 font-normal"> Nenhum relato respondido.</p>

                <?php endif; ?>
            </div>

        </div>
    </div>
</div>


<?php $this->renderPartial('footer'); ?>
