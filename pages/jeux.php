<?php

include "db_connect.php";

 

$sql = " select a.IdAnimal ,a.NomAnimal, a.Type_alimentaire ,h.NomHab
,a.Url_image from animal as a join habitat as h where  a.IdHab=h.IdHab order by rand() limit 3";
$resultat = $cennect->query($sql);

 

?>





<!DOCTYPE html>
<html class="light" lang="fr">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Formulaire Habitat (Ajout/Modification)</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
  <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
  <style>
    .material-symbols-outlined {
      font-variation-settings:
        'FILL' 0,
        'wght' 400,
        'GRAD' 0,
        'opsz' 24
    }
  </style>
  <script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary": "#13ec5b",
            "background-light": "#f6f8f6",
            "background-dark": "#102216",
            "text-light": "#0d1b12",
            "text-dark": "#e8f3ec",
            "subtle-light": "#4c9a66",
            "subtle-dark": "#a8c7b3",
            "border-light": "#cfe7d7",
            "border-dark": "#345941",
            "card-light": "#ffffff",
            "card-dark": "#1a3824"
          },
          fontFamily: {
            "display": ["Lexend", "sans-serif"]
          },
          borderRadius: {
            "DEFAULT": "0.25rem",
            "lg": "0.5rem",
            "xl": "0.75rem",
            "full": "9999px"
          },
        },
      },
    }
  </script>
</head>

<body class="bg-background-light dark:bg-background-dark font-display">
  <div class="relative flex h-auto min-h-screen w-full flex-col">
    <div class="flex h-full min-h-screen">
      <aside
        class="flex h-screen w-64 flex-col justify-between border-r border-border-light bg-foreground-light p-4 dark:border-border-dark dark:bg-foreground-dark sticky top-0">
        <div class="flex flex-col gap-2">
          <div class="flex items-center gap-3 px-1 py-2">
            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="Logo du Zoo"
              style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB0Lg1OEXJcVVLNu-F6WdrhKg3x_oITAykEs4sv1tonbmxNuSYelzNpbTz0uZeDE9pn5C1fVmaHtkBsSZswb9MqE4bPkadWEdAXoShGf6e9VFYxd2HUxueX0eXHhOxmEmwV81zxkOeXGuTh_FHL-eM-5x7tof3w167DposoHSNPe5IY9s-L-g1NpZN-optSF_VH8WfQOdshKb6i8QxLM0StObMwydCAiXrkhFc1W8izSSSn34g7N28pr0md3jJqxSnH434lfcrFMF8");'>
            </div>
            <div class="flex flex-col">
              <h1 class="text-base font-medium leading-normal text-text-light-primary dark:text-text-dark-primary">
                Zoo Manager</h1>
              <p class="text-sm font-normal leading-normal text-text-light-secondary dark:text-text-dark-secondary">
                Application de Gestion</p>
            </div>
          </div>
          <nav class="mt-4 flex flex-col gap-1">
            <a class="flex items-center gap-3 rounded-lg px-3 py-2.5 hover:bg-primary/10 dark:hover:bg-primary/20"
              href="index.php">
              <span class="material-symbols-outlined text-text-light dark:text-text-dark"
                style="font-variation-settings: 'FILL' 1;">dashboard</span>
              <span class="text-sm font-semibold leading-normal text-text-light dark:text-text-dark">Tableau
                de bord</span>
            </a>
            <a class="flex items-center gap-3 rounded-lg px-3 py-2.5 bg-primary/20 dark:bg-primary/30" href="gestion_des_animaux.php">
              <span class="material-symbols-outlined text-text-light dark:text-text-dark">pets</span>
              <span class="text-sm font-medium leading-normal text-text-light dark:text-text-dark">Gestion des
                animaux</span>
            </a>
            <a class="flex items-center gap-3 rounded-lg px-3 py-2.5 hover:bg-primary/10 dark:hover:bg-primary/20"
              href="gestion_des_habitats.php">
              <span class="material-symbols-outlined text-text-light dark:text-text-dark">eco</span>
              <span class="text-sm font-medium leading-normal text-text-light dark:text-text-dark">Gestion des
                habitats</span>
            </a>
            <a class="flex items-center gap-3 rounded-lg px-3 py-2.5 hover:bg-primary/10 dark:hover:bg-primary/20"
              href="Statistiques.php">
              <span class="material-symbols-outlined text-text-light dark:text-text-dark">bar_chart</span>
              <span class="text-sm font-medium leading-normal text-text-light dark:text-text-dark">Statistiques</span>
            </a>
            <a class="flex items-center gap-3 rounded-lg px-3 py-2.5 hover:bg-primary/10 dark:hover:bg-primary/20"
              href="jeux.php">
              <span class="material-symbols-outlined text-text-light dark:text-text-dark">joystick</span>
              <span class="text-sm font-medium leading-normal text-text-light dark:text-text-dark">Jeu
                animalier</span>
            </a>
          </nav>
        </div>
        <div class="flex flex-col gap-2">
          <a class="flex items-center gap-3 rounded-lg px-3 py-2.5 hover:bg-primary/10 dark:hover:bg-primary/20" href="#">
            <span class="material-symbols-outlined text-text-light dark:text-text-dark">settings</span>
            <span class="text-sm font-medium leading-normal text-text-light dark:text-text-dark">Paramètres</span>
          </a>
        </div>
      </aside>
      <main>
        <h1 class="tracking-light text-[32px] font-bold leading-tight px-4 text-center pb-3 pt-6 text-text-light dark:text-text-dark">Devine l’image de l’animal parmi les 3 images</h1>
        <div class="flex px-4 py-3 justify-center">
          <button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-12 px-5 bg-primary text-text-light gap-2 text-base font-bold leading-normal tracking-[0.015em] hover:opacity-90 transition-opacity">

            <span class="truncate"><?= $succes[1] ?></span>
          </button>
        </div>
        <div class="grid grid-cols-[repeat(auto-fit,minmax(158px,1fr))] gap-4 p-4">
           

        

        </div>
        <div class="flex flex-col gap-3 p-4">
          <div class="flex gap-6 justify-between">
            <p class="text-base font-medium leading-normal text-text-light dark:text-text-dark">Progression</p>
          </div>
          <div class="rounded-full bg-muted-light dark:bg-muted-dark">
            <?= $score . "/" . $foix_jeux  ?>
            <div class="h-2 rounded-full bg-gray-500" style="width: 100%;">
              <div class="h-2 rounded-full bg-primary" style="width: <?= ($score / $foix_jeux) * 100 ?>%;"> </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

</body>

</html>