<?php $this->renderPartial('head'); ?>

<?php $this->renderPartial('header-register'); ?>

<div class="w-full max-w-xl mx-auto">

      <section class="register-card bg-white rounded-2xl shadow-sm border border-zinc-200 overflow-hidden" aria-labelledby="form-title">
        <div class="bg-zinc-100 p-4 sm:p-5">
          <span class="inline-block bg-[#2a895c] text-white text-sm font-semibold px-4 py-2 rounded-tl-2xl rounded-br-2xl">
            Criar conta
          </span>
        </div>

        <form id="registerForm" class="p-6 sm:p-8 space-y-6" novalidate>
          <div>
            <label for="name" class="block text-sm font-semibold text-[#2a895c]">Nome completo</label>
            <div class="mt-2 relative">
              <input
                type="text"
                id="name"
                name="name"
                placeholder="Ex.: Maria Silva"
                class="w-full bg-white text-zinc-700 text-sm border border-[#6bc16a] rounded pl-10 pr-3 py-3 transition duration-200 focus-soft focus:border-[#6bc16a] placeholder:text-zinc-400"
                required
                minlength="3"
              />
              <i class="fa-solid fa-user absolute left-3 top-1/2 -translate-y-1/2 text-[#2a895c]"></i>
            </div>
            <p id="nameError" class="mt-1 text-xs text-red-600 hidden">Informe seu nome (mín. 3 caracteres).</p>
          </div>

          <div>
            <label for="username" class="block text-sm font-semibold text-[#2a895c]">Usuário</label>
            <div class="mt-2 relative">
              <input
                type="text"
                id="username"
                name="username"
                placeholder="Ex.: maria.silva"
                class="w-full bg-white text-zinc-700 text-sm border border-[#6bc16a] rounded pl-10 pr-3 py-3 transition duration-200 focus-soft focus:border-[#6bc16a] placeholder:text-zinc-400"
                required
                pattern="^[a-zA-Z0-9._-]{3,20}$"
              />
              <i class="fa-solid fa-id-badge absolute left-3 top-1/2 -translate-y-1/2 text-[#2a895c]"></i>
            </div>
            <p id="userError" class="mt-1 text-xs text-red-600 hidden">
              O usuário deve ter de 3 a 20 caracteres (letras, números, ponto, underline ou hífen).
            </p>
          </div>

          <div>
            <label for="password" class="block text-sm font-semibold text-[#2a895c]">Senha</label>
            <div class="mt-2 relative">
              <input
                type="password"
                id="password"
                name="password"
                placeholder="••••••••"
                class="w-full bg-white text-zinc-700 text-sm border border-[#6bc16a] rounded pl-10 pr-10 py-3 transition duration-200 focus-soft focus:border-[#6bc16a] placeholder:text-zinc-400"
                required
                minlength="6"
              />
              <i class="fa-solid fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-[#2a895c]"></i>
              <button
                type="button"
                id="togglePassword"
                class="absolute right-3 top-1/2 -translate-y-1/2 text-[#2a895c] hover:opacity-80"
                aria-label="Mostrar ou ocultar senha"
              >
                <i class="fa-regular fa-eye"></i>
              </button>
            </div>
            <p id="passError" class="mt-1 text-xs text-red-600 hidden">A senha deve ter ao menos 6 caracteres.</p>
          </div>

          <div id="feedback" class="hidden text-sm font-medium px-4 py-3 rounded border"></div>

          <div class="flex flex-col sm:flex-row gap-3">
            <button
              type="submit"
              id="submitBtn"
              class="cursor-pointer w-full bg-[#2a895c] text-white font-semibold py-4 rounded-none rounded-tl-2xl rounded-br-2xl hover:bg-[#6bc16a] transition duration-300 ease flex items-center justify-center gap-2"
            >
              <span>Criar conta</span>
              <span id="spinner" class="hidden w-4 h-4 border-2 border-white/60 border-t-white rounded-full animate-spin"></span>
            </button>

            <a href="/login"
               class="w-full sm:w-auto text-center bg-white border border-[#6bc16a] text-[#2a895c] font-semibold py-4 rounded-none rounded-tl-2xl rounded-br-2xl hover:bg-zinc-50 transition duration-300 ease">
              Já tenho conta
            </a>
          </div>
        </form>
      </section>

      <p class="text-center text-xs text-zinc-400 mt-6">
        © <?= date('Y'); ?> Herbarium. Todos os direitos reservados.
      </p>
    </div>
  </main>

  <script>
    gsap.from(".logo", { duration: 0.8, y: -12, opacity: 0, ease: "power2.out" });
    gsap.from(".register-card", { duration: 0.9, y: 24, opacity: 0, ease: "power2.out", delay: 0.1 });

    const togglePassword = document.getElementById('togglePassword');
    const passwordInput  = document.getElementById('password');
    togglePassword.addEventListener('click', () => {
      const isHidden = passwordInput.type === 'password';
      passwordInput.type = isHidden ? 'text' : 'password';
      togglePassword.innerHTML = isHidden
        ? '<i class="fa-regular fa-eye-slash"></i>'
        : '<i class="fa-regular fa-eye"></i>';
    });

    const nameInput   = document.getElementById('name');
    const userInput   = document.getElementById('username');
    const passInput   = document.getElementById('password');

    const nameError   = document.getElementById('nameError');
    const userError   = document.getElementById('userError');
    const passError   = document.getElementById('passError');

    const feedback    = document.getElementById('feedback');
    const submitBtn   = document.getElementById('submitBtn');
    const spinner     = document.getElementById('spinner');
    const form        = document.getElementById('registerForm');

    function showFeedback(type, msg) {
      feedback.classList.remove('hidden', 'text-red-700', 'bg-red-50', 'border-red-200', 'text-green-700', 'bg-green-50', 'border-green-200');
      if (type === 'error') {
        feedback.classList.add('text-red-700', 'bg-red-50', 'border-red-200');
      } else {
        feedback.classList.add('text-green-700', 'bg-green-50', 'border-green-200');
      }
      feedback.textContent = msg;
    }

    form.addEventListener('submit', async (e) => {
      e.preventDefault();

      nameError.classList.add('hidden');
      userError.classList.add('hidden');
      passError.classList.add('hidden');
      feedback.classList.add('hidden');

      const name  = nameInput.value.trim();
      const user  = userInput.value.trim();
      const pass  = passInput.value.trim();

      let hasError = false;

      if (!name || name.length < 3) {
        nameError.classList.remove('hidden');
        hasError = true;
      }

      const userRegex = /^[a-zA-Z0-9._-]{3,20}$/;
      if (!userRegex.test(user)) {
        userError.classList.remove('hidden');
        hasError = true;
      }

      if (!pass || pass.length < 6) {
        passError.classList.remove('hidden');
        hasError = true;
      }

      if (hasError) return;

      submitBtn.setAttribute('disabled', 'disabled');
      spinner.classList.remove('hidden');

      try {
        const resp = await fetch('/cadastro', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ nome: name, usuario: user, senha: pass })
        });

        const json = await resp.json();

        if (!resp.ok) {
          showFeedback('error', json.error || 'Não foi possível concluir o cadastro.');
        } else {
          showFeedback('success', 'Cadastro realizado com sucesso! Redirecionando...');
          setTimeout(() => { window.location.href = '/login'; }, 700);
        }
      } catch (err) {
        showFeedback('error', 'Erro de conexão. Tente novamente.');
        console.error(err);
      } finally {
        submitBtn.removeAttribute('disabled');
        spinner.classList.add('hidden');
      }
    });
  </script>


<?php $this->renderPartial('footer'); ?>