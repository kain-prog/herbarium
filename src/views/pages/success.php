<?php $this->renderPartial('head'); ?>

<?php $this->renderPartial('header-colaborador'); ?>


<div class="pt-8 pb-18 max-w-5xl mx-auto px-0 lg:px-8">

  <div class="bg-slate-100 py-4 px-8 sm:px-12 sm:py-12 rounded-xl">

    <div class="border border-[#6bc16a] rounded-3xl px-4 sm:px-12 py-12 sm:py-12 relative z-[10]">

      <div class="absolute top-[-30px] left-[50%] translate-x-[-50%] z-[50] bg-slate-100">
          <i class="fa-solid fa-circle-check text-[#6bc16a] text-6xl" style="width:100% !important;"></i>
      </div>

      <div class="px-4">

        <h2 class="text-[#2a895c] text-center text-xl sm:text-3xl font-semibold mb-4">Relato Enviado com Sucesso!</h2>

        <p class="text-zinc-500 text-center text-md sm:text-lg mb-10">Dentro de 5 dias úteis você receberá o retorno.</p>

        <p class="text-xs sm:text-sm text-[#6bc16a] font-semibold text-center mb-4">Acompanhe com o número do protocolo:</p>

        <div class="flex items-center justify-center relative mt-2 max-w-lg mx-auto">
            <input 
                type="text" 
                name="protocolo" 
                id="nome" 
                disabled
                class="mt-2 pl-2 sm:pl-8 w-full bg-zinc-100 text-zinc-600 text-sm border border-zinc-300 rounded pl-3 pr-8 py-3 transition duration-300 ease focus:outline-none focus:border-[#6bc16a] shadow-sm focus:shadow-md appearance-none"
                value="<?= $protocolo; ?>" 
            />

            <i class="fa-solid fa-copy absolute right-3 top-1/2 transform -translate-y-1/2 text-[#2a895c] text-md cursor-pointer"></i>
        </div>

        <div id="copy" class="hidden">
            <p>Protocolo copiado!</p>
        </div>

        <a
          href="/acompanhe?protocolo=<?= $protocolo; ?>"
          id="verificar"
          class="cursor-pointer text-center max-w-lg block mx-auto mt-6 w-full bg-[#2a895c] rounded-tl-2xl rounded-br-2xl text-lg text-white text-sm font-semibold py-4 transition duration-300 ease hover:bg-[#5aa054] focus:outline-none focus:ring-2 focus:ring-[#6bc16a] focus:ring-opacity-50"
        >
          Verificar
        </a>
      </div>

    </div>

  </div>

</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const copyIcon = document.querySelector('.fa-copy');
    const input = document.querySelector('input#nome');
    const copyMsg = document.querySelector('#copy');

    if (copyIcon && input && copyMsg) {
      copyIcon.addEventListener('click', () => {
        navigator.clipboard.writeText(input.value).then(() => {
          copyMsg.classList.remove('hidden');
          copyMsg.classList.add('text-center', 'text-[#6bc16a]', 'font-medium', 'my-4', 'text-sm');

          setTimeout(() => {
            copyMsg.classList.add('hidden');
          }, 3000);
        }).catch(err => {
          console.error('Erro ao copiar texto:', err);
        });
      });
    }
  });
</script>

<?php $this->renderPartial('footer'); ?>
