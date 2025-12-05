<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Tableau de bord principal du Zoo avec navigation</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Spline+Sans:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#13ec6d",
                        "background-light": "#f6f8f7",
                        "background-dark": "#102218",
                        "foreground-light": "#f8fcfa",
                        "foreground-dark": "#182c21",
                        "text-light": "#0d1b13",
                        "text-dark": "#e8f3ed",
                        "text-muted-light": "#4c9a6c",
                        "text-muted-dark": "#a0c7b1",
                        "border-light": "#cfe7d9",
                        "border-dark": "#2a4d38",
                    },
                    fontFamily: {
                        "display": ["Spline Sans", "sans-serif"]
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
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-text-light dark:text-text-dark">
    <div class="flex min-h-screen w-full">
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
        <main class="flex-1 p-6 md:p-8 lg:p-10 overflow-y-auto">
            <div class="mx-auto max-w-7xl">
                <div class="mb-8 flex flex-wrap justify-between gap-3">
                    <div class="flex min-w-72 flex-col gap-2">
                        <h1
                            class="text-4xl font-black leading-tight tracking-[-0.033em] text-text-light dark:text-text-dark">
                            Tableau de Bord Principal</h1>
                        <p class="text-base font-normal leading-normal text-text-muted-light dark:text-text-muted-dark">
                            Aperçu général de l'activité du zoo</p>
                    </div>
                </div>
                <div class="mb-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <div
                        class="flex flex-col gap-2 rounded-xl border border-border-light bg-foreground-light p-6 dark:border-border-dark dark:bg-foreground-dark">
                        <p class="text-base font-medium leading-normal text-text-light dark:text-text-dark">Total
                            d'Animaux</p>
                        <p class="text-3xl font-bold leading-tight tracking-tight text-text-light dark:text-text-dark">
                            152</p>
                    </div>
                    <div
                        class="flex flex-col gap-2 rounded-xl border border-border-light bg-foreground-light p-6 dark:border-border-dark dark:bg-foreground-dark">
                        <p class="text-base font-medium leading-normal text-text-light dark:text-text-dark">Nombre
                            d'Habitats</p>
                        <p class="text-3xl font-bold leading-tight tracking-tight text-text-light dark:text-text-dark">
                            24</p>
                    </div>
                    <div
                        class="flex flex-col gap-2 rounded-xl border border-border-light bg-foreground-light p-6 dark:border-border-dark dark:bg-foreground-dark">
                        <p class="text-base font-medium leading-normal text-text-light dark:text-text-dark">Espèces
                            Différentes</p>
                        <p class="text-3xl font-bold leading-tight tracking-tight text-text-light dark:text-text-dark">
                            78</p>
                    </div>
                </div>
                <div class="mb-8 grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <div
                        class="flex flex-col gap-4 rounded-xl border border-border-light bg-foreground-light p-6 dark:border-border-dark dark:bg-foreground-dark">
                        <div class="flex flex-col gap-1">
                            <p class="text-base font-medium leading-normal text-text-light dark:text-text-dark">Animaux
                                par Régime Alimentaire</p>
                            <div class="flex items-baseline gap-2">
                                <p
                                    class="truncate text-[32px] font-bold leading-tight tracking-tight text-text-light dark:text-text-dark">
                                    78 espèces</p>
                                <div class="flex items-center gap-1">
                                    <p
                                        class="text-base font-normal leading-normal text-text-muted-light dark:text-text-muted-dark">
                                        Aperçu</p>
                                    <p class="text-base font-medium leading-normal text-green-600 dark:text-green-400">
                                        +2%</p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="grid min-h-[180px] grid-flow-col items-end justify-items-center gap-6 grid-rows-[1fr_auto] px-3">
                            <div class="w-full bg-primary/30" style="height: 30%;"></div>
                            <p
                                class="text-[13px] font-bold leading-normal tracking-[0.015em] text-text-muted-light dark:text-text-muted-dark">
                                Carnivore</p>
                            <div class="w-full bg-primary/30" style="height: 70%;"></div>
                            <p
                                class="text-[13px] font-bold leading-normal tracking-[0.015em] text-text-muted-light dark:text-text-muted-dark">
                                Herbivore</p>
                            <div class="w-full bg-primary/30" style="height: 100%;"></div>
                            <p
                                class="text-[13px] font-bold leading-normal tracking-[0.015em] text-text-muted-light dark:text-text-muted-dark">
                                Omnivore</p>
                        </div>
                    </div>
                    <div
                        class="flex flex-col gap-4 rounded-xl border border-border-light bg-foreground-light p-6 dark:border-border-dark dark:bg-foreground-dark">
                        <div class="flex flex-col gap-1">
                            <p class="text-base font-medium leading-normal text-text-light dark:text-text-dark">Animaux
                                par Habitat</p>
                            <div class="flex items-baseline gap-2">
                                <p
                                    class="truncate text-[32px] font-bold leading-tight tracking-tight text-text-light dark:text-text-dark">
                                    152 animaux</p>
                                <div class="flex items-center gap-1">
                                    <p
                                        class="text-base font-normal leading-normal text-text-muted-light dark:text-text-muted-dark">
                                        Aperçu</p>
                                    <p class="text-base font-medium leading-normal text-red-600 dark:text-red-400">-1%
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="grid min-h-[180px] grid-cols-[auto_1fr] items-center gap-x-4 gap-y-6 py-3">
                            <p
                                class="text-[13px] font-bold leading-normal tracking-[0.015em] text-text-muted-light dark:text-text-muted-dark">
                                Savane</p>
                            <div class="h-2 rounded-full bg-background-light dark:bg-background-dark">
                                <div class="h-full rounded-full bg-primary/80" style="width: 30%;"></div>
                            </div>
                            <p
                                class="text-[13px] font-bold leading-normal tracking-[0.015em] text-text-muted-light dark:text-text-muted-dark">
                                Jungle</p>
                            <div class="h-2 rounded-full bg-background-light dark:bg-background-dark">
                                <div class="h-full rounded-full bg-primary/80" style="width: 20%;"></div>
                            </div>
                            <p
                                class="text-[13px] font-bold leading-normal tracking-[0.015em] text-text-muted-light dark:text-text-muted-dark">
                                Aquatique</p>
                            <div class="h-2 rounded-full bg-background-light dark:bg-background-dark">
                                <div class="h-full rounded-full bg-primary/80" style="width: 30%;"></div>
                            </div>
                            <p
                                class="text-[13px] font-bold leading-normal tracking-[0.015em] text-text-muted-light dark:text-text-muted-dark">
                                Montagne</p>
                            <div class="h-2 rounded-full bg-background-light dark:bg-background-dark">
                                <div class="h-full rounded-full bg-primary/80" style="width: 50%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <h2
                    class="mb-4 text-[22px] font-bold leading-tight tracking-[-0.015em] text-text-light dark:text-text-dark">
                    Raccourcis</h2>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    <a class="flex flex-col items-center justify-center gap-4 rounded-xl border border-border-light bg-foreground-light p-6 text-center transition-shadow hover:shadow-lg dark:border-border-dark dark:bg-foreground-dark"
                        href="#">
                        <div
                            class="flex size-16 items-center justify-center rounded-xl bg-primary/20 dark:bg-primary/30">
                            <span
                                class="material-symbols-outlined text-3xl text-text-light dark:text-text-dark">pets</span>
                        </div>
                        <p class="font-semibold text-text-light dark:text-text-dark">Gérer les Animaux</p>
                    </a>
                    <a class="flex flex-col items-center justify-center gap-4 rounded-xl border border-border-light bg-foreground-light p-6 text-center transition-shadow hover:shadow-lg dark:border-border-dark dark:bg-foreground-dark"
                        href="#">
                        <div
                            class="flex size-16 items-center justify-center rounded-xl bg-primary/20 dark:bg-primary/30">
                            <span
                                class="material-symbols-outlined text-3xl text-text-light dark:text-text-dark">eco</span>
                        </div>
                        <p class="font-semibold text-text-light dark:text-text-dark">Explorer les Habitats</p>
                    </a>
                    <a class="flex flex-col items-center justify-center gap-4 rounded-xl border border-border-light bg-foreground-light p-6 text-center transition-shadow hover:shadow-lg dark:border-border-dark dark:bg-foreground-dark"
                        href="#">
                        <div
                            class="flex size-16 items-center justify-center rounded-xl bg-primary/20 dark:bg-primary/30">
                            <span
                                class="material-symbols-outlined text-3xl text-text-light dark:text-text-dark">bar_chart</span>
                        </div>
                        <p class="font-semibold text-text-light dark:text-text-dark">Voir les Statistiques</p>
                    </a>
                    <a class="flex flex-col items-center justify-center gap-4 rounded-xl border border-border-light bg-primary p-6 text-center text-text-light transition-opacity hover:opacity-90 dark:border-border-dark dark:text-background-dark"
                        href="#">
                        <div class="flex size-16 items-center justify-center rounded-xl bg-white/30">
                            <span class="material-symbols-outlined text-3xl">joystick</span>
                        </div>
                        <p class="font-semibold">Lancer le Jeu !</p>
                    </a>
                </div>
            </div>
        </main>
    </div>

</body>

</html>