<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/assets/styles/style.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/preline@3.2.3/variants.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/shadcn-ui@0.9.5/dist/index.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

  <style>
    /* Suaviza a transição do foco dos inputs */
    .focus-soft:focus {
      box-shadow: 0 0 0 4px rgba(107, 193, 106, 0.20);
      outline: none;
    }
  </style>
    <title><?= $title ? $title : 'Herbarium | Canal do Colaborador' ?></title>
</head>
<style>
  [aria-selected="true"] {
    background: #2a895c;
    color: #fff;
  }
</style>
<body>
<header class="bg-[#2a895c] py-8 px-2 flex justify-center items-center">
   <a href="https://herbarium.com.br/">
        <img class="w-full max-w-[280px] px-8 sm:max-w-[350px]" src="/assets/images/logo.png" alt="Logo do Herbarium">
   </a>
</header>
<main class="">
