<?php

include "db_connect.php";

$sql = "select COUNT( idHab) as total_habitats from habitat";
$resultat = $cennect->query($sql);
$numbre_habitat = $resultat->fetch_assoc()["total_habitats"];

$sql = "select COUNT(*) as total_animal from animal";
$resultat = $cennect->query($sql);
$numbre_animal = $resultat->fetch_assoc()["total_animal"];


$sql = "select nomhab, count(nomhab) as counthab from habitat h, animal a where a.idhab = h.idhab group by nomhab order by counthab desc;";
$resultat = $cennect->query($sql);
$stats_habitats = $resultat->fetch_all();


$sql = "select Type_alimentaire,count(Type_alimentaire)  as counttype from animal group by Type_alimentaire";
$resultat = $cennect->query($sql);
$array_Type_alimentaire = $resultat->fetch_all();
$total_types = count($array_Type_alimentaire);
$Herbivore_count = 0;
$Omnivore_count = 0;
$Carnivore_count = 0;

foreach ($array_Type_alimentaire as $type_alimentaire) {
  if (strtolower($type_alimentaire[0]) == strtolower("Herbivore"))
    $Herbivore_count = $type_alimentaire[1];
  else  if (strtolower($type_alimentaire[0]) == strtolower("Omnivore"))
    $Omnivore_count = $type_alimentaire[1];
  else
    $Carnivore_count = $type_alimentaire[1];
}
$total = $Herbivore_count + $Omnivore_count + $Carnivore_count;


if ($total == 0) {
  $Herbivore_percentage = 0;
  $Omnivore_percentage = 0;
  $Carnivore_percentage = 0;
} else {
  $Herbivore_percentage = round(($Herbivore_count / $total) * 100);
  $Omnivore_percentage = round(($Omnivore_count / $total) * 100);
  $Carnivore_percentage = round(($Carnivore_count / $total) * 100);
}

$Herbivore_offset =  0;
$Omnivore_offset =  $Herbivore_percentage;
$Carnivore_offset = ($Herbivore_percentage + $Omnivore_percentage);

$array_circle = array();

array_push($array_circle, [$Herbivore_percentage, $Herbivore_offset, "#34D399", "Herbivore"]);
array_push($array_circle, [$Omnivore_percentage, $Omnivore_offset, "#FBBF24", "Omnivore"]);
array_push($array_circle, [$Carnivore_percentage, $Carnivore_offset, "#F87171", "Carnivore"]);






?>

<!DOCTYPE html>

<html class="light" lang="fr">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Tableau de bord des Statistiques (Animaux &amp; Habitats)</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&amp;display=swap" rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
    rel="stylesheet" />
  <script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary": "#13ec6d",
            "background-light": "#f6f8f7",
            "background-dark": "#102218",
          },
          fontFamily: {
            "display": ["Lexend"]
          },
          borderRadius: {
            "DEFAULT": "0.5rem",
            "lg": "1rem",
            "xl": "1.5rem",
            "full": "9999px"
          },
        },
      },
    }
  </script>
  <style>
    .material-symbols-outlined {
      font-variation-settings:
        'FILL' 0,
        'wght' 400,
        'GRAD' 0,
        'opsz' 24
    }
  </style>
</head>

<body class="font-display bg-background-light dark:bg-background-dark">
  <div class="relative flex min-h-screen w-full">
    <!-- SideNavBar -->
    <aside
      class="flex h-screen w-64 flex-col justify-between border-r border-border-light bg-foreground-light p-4 dark:border-border-dark dark:bg-foreground-dark sticky top-0">
      <div class="flex flex-col gap-2">
        <div class="flex items-center gap-3 px-1 py-2">
          <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10"
            data-alt="Logo du Zoo"
            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB0Lg1OEXJcVVLNu-F6WdrhKg3x_oITAykEs4sv1tonbmxNuSYelzNpbTz0uZeDE9pn5C1fVmaHtkBsSZswb9MqE4bPkadWEdAXoShGf6e9VFYxd2HUxueX0eXHhOxmEmwV81zxkOeXGuTh_FHL-eM-5x7tof3w167DposoHSNPe5IY9s-L-g1NpZN-optSF_VH8WfQOdshKb6i8QxLM0StObMwydCAiXrkhFc1W8izSSSn34g7N28pr0md3jJqxSnH434lfcrFMF8");'>
          </div>
          <div class="flex flex-col">
            <h1
              class="text-base font-medium leading-normal text-text-light-primary dark:text-text-dark-primary">
              Zoo Encyclopedie</h1>
            <p
              class="text-sm font-normal leading-normal text-text-light-secondary dark:text-text-dark-secondary">
              Application éducatif</p>
          </div>
        </div>
        <nav class="mt-4 flex flex-col gap-1">
          <a class="flex items-center gap-3 rounded-lg px-3 py-2.5 hover:bg-primary/10 dark:hover:bg-primary/20"
            href="index.php">
            <span class="material-symbols-outlined text-text-light dark:text-text-dark"
              style="font-variation-settings: 'FILL' 1;">dashboard</span>
            <span class="text-sm font-semibold leading-normal text-text-light dark:text-text-dark">Accueil </span>
          </a>

          <a class="flex items-center gap-3 rounded-lg px-3 py-2.5 hover:bg-primary/10 dark:hover:bg-primary/20"
            href="gestion_des_animaux.php">
            <span class="material-symbols-outlined text-text-light dark:text-text-dark">pets</span>
            <span
              class="text-sm font-medium leading-normal text-text-light dark:text-text-dark">Gestion des
              animaux</span>
          </a>
          <a class="flex items-center gap-3 rounded-lg px-3 py-2.5 hover:bg-primary/10 dark:hover:bg-primary/20"
            href="gestion_des_habitats.php">
            <span class="material-symbols-outlined text-text-light dark:text-text-dark">eco</span>
            <span class="text-sm font-medium leading-normal text-text-light dark:text-text-dark">Gestion des
              habitats</span>
          </a>
          <a class="flex items-center gap-3 rounded-lg px-3 py-2.5 bg-primary/20 dark:bg-primary/30"
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

    </aside>
    <!-- Main Content -->
    <main class="flex-1 p-8">
      <div class="mx-auto max-w-7xl">
        <!-- PageHeading -->
        <div class="mb-8">
          <h1 class="text-4xl font-black tracking-tighter text-gray-900 dark:text-white">Tableau de bord des
            Statistiques</h1>
          <p class="text-base text-gray-500 dark:text-gray-400">Statistiques des animaux et des habitats</p>
        </div>
        <!-- Stats -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4 mb-8">
          <div
            class="flex flex-col gap-2 rounded-xl bg-white dark:bg-background-dark p-6 border border-gray-200 dark:border-gray-800">
            <p class="text-base font-medium text-gray-600 dark:text-gray-300">Total d'Animaux</p>
            <p class="text-4xl font-bold tracking-tight text-gray-900 dark:text-white">
              <?= $numbre_animal ?></p>
          </div>
          <div
            class="flex flex-col gap-2 rounded-xl bg-white dark:bg-background-dark p-6 border border-gray-200 dark:border-gray-800">
            <p class="text-base font-medium text-gray-600 dark:text-gray-300">Total d'Habitats</p>
            <p class="text-4xl font-bold tracking-tight text-gray-900 dark:text-white"><?= $numbre_habitat ?></p>
          </div>

        </div>
        <!-- Charts -->
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
          <div
            class="flex flex-col gap-4 rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-background-dark p-6">
            <div class="flex flex-col">
              <p class="text-lg font-semibold text-gray-900 dark:text-white">Répartition par Régime
                Alimentaire</p>
              <p class="text-sm text-gray-500 dark:text-gray-400">Pourcentage d'animaux par type de régime
              </p>
            </div>
            <div class="flex items-center justify-center py-6">
              <div class="relative flex h-52 w-52 items-center justify-center">
                <svg class="h-full w-full" viewbox="0 0 36 36">

                  <?php foreach ($array_circle as $angle) { ?>
                    <path class="stroke-[<?= $angle[2] ?>]"
                      d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831  a 15.9155 15.9155 0 0 1 0 -31.831 "
                      fill="none"
                      stroke-dasharray="<?= $angle[0]  ?>, 100"
                      stroke-dashoffset="-<?= $angle[1]; ?>"
                      stroke-width="3">
                    </path>
                  <?php  }; ?>

                </svg>
                <div class="absolute flex flex-col items-center">
                  <span class="text-3xl font-bold text-gray-900 dark:text-white"><?php echo $total_types; ?></span>
                  <span class="text-sm text-gray-500 dark:text-gray-400">Types</span>
                </div>
              </div>
            </div>
            <div class="flex justify-center gap-6 text-sm">

              <?php foreach ($array_circle as $type_alimentaire) { ?>
                <div class="flex items-center gap-2">
                  <div class="h-3 w-3 rounded-full bg-[<?= $type_alimentaire[2] ?>]"></div>
                  <span class="text-gray-700 dark:text-gray-300"><?= $type_alimentaire[3] . " " . $type_alimentaire[0] ?>%</span>
                </div>
              <?php } ?>
            </div>
          </div>
          <div
            class="flex min-w-72 flex-1 flex-col gap-4 rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-background-dark p-6">
            <div class="flex flex-col">
              <p class="text-lg font-semibold text-gray-900 dark:text-white">Nombre d'Animaux par Habitat
              </p>
              <p class="text-sm text-gray-500 dark:text-gray-400">Population dans chaque type d'habitat
              </p>
            </div>
            <div class="grid min-h-[240px] gap-x-4 gap-y-3 grid-cols-[auto_1fr] items-center py-3">
              <?php
              foreach ($stats_habitats as $stats) {
              ?>
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400"><?= $stats[0] ?></p>
                <div class="h-3 w-full rounded-full bg-gray-200 dark:bg-gray-700">
                  <div class="h-3 rounded-full bg-[#F59E0B]" style="width: <?= ($stats[1] / $numbre_animal) * 100 ?>%;"></div>
                </div>

              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</body>

</html>