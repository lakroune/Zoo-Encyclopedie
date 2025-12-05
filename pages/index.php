<?php


include "db_connect.php";

$sql = " select a.IdAnimal ,a.Description_animal,a.NomAnimal, a.Type_alimentaire ,h.NomHab
,a.Url_image from animal as a join habitat as h where  a.IdHab=h.IdHab order by rand() limit 1";
$resultat = $cennect->query($sql);
$animal = $resultat->fetch_assoc();
$NomAnimal = $animal["NomAnimal"] ? $animal["NomAnimal"] : "";
$Type_alimentaire = $animal["Type_alimentaire"] ? $animal["Type_alimentaire"] : "";
$NomHab = $animal["NomHab"] ? $animal["NomHab"] : "";
$Url_image = $animal["Url_image"] ? $animal["Url_image"] : "";
$Description_animal = $animal["Description_animal"] ? $animal["Description_animal"] : "";

?>


<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Accueil — Zoo Manager</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Spline+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#13ec6d",
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
                        display: ["Spline Sans", "sans-serif"],
                    },
                    borderRadius: {
                        DEFAULT: "0.5rem",
                        lg: "1rem",
                        xl: "1.5rem",
                        full: "9999px"
                    },
                },
            },
        }
    </script>

    <style>
        .material-symbols-outlined {
            font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-text-light dark:text-text-dark">

    <div class="flex min-h-screen w-full">

        <!-- SIDE BAR -->
        <aside class="flex h-screen w-64 flex-col justify-between border-r border-border-light bg-foreground-light p-4 dark:border-border-dark dark:bg-foreground-dark sticky top-0">

            <div class="flex flex-col gap-2">
                <div class="flex items-center gap-3 px-1 py-2">
                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB0Lg1OEXJcVVLNu-F6WdrhKg3x_oITAykEs4sv1tonbmxNuSYelzNpbTz0uZeDE9pn5C1fVmaHtkBsSZswb9MqE4bPkadWEdAXoShGf6e9VFYxd2HUxueX0eXHhOxmEmwV81zxkOeXGuTh_FHL-eM-5x7tof3w167DposoHSNPe5IY9s-L-g1NpZN-optSF_VH8WfQOdshKb6i8QxLM0StObMwydCAiXrkhFc1W8izSSSn34g7N28pr0md3jJqxSnH434lfcrFMF8");'>
                    </div>

                    <div class="flex flex-col">
                        <h1 class="text-base font-semibold">Zoo Manager</h1>
                        <p class="text-sm text-text-muted-light dark:text-text-muted-dark">Application de gestion</p>
                    </div>
                </div>

                <nav class="mt-4 flex flex-col gap-1">

                    <a class="flex items-center gap-3 rounded-lg px-3 py-2.5 bg-primary/20"
                        href="index.php">
                        <span class="material-symbols-outlined">dashboard</span>
                        <span class="text-sm font-semibold">Accueil</span>
                    </a>
                    <a class="flex items-center gap-3 rounded-lg px-3 py-2.5 hover:bg-primary/10 transition"
                        href="gestion_des_animaux.php">
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">pets</span>
                        <span class="text-sm font-semibold"> Gestion des animaux</span>
                    </a>



                    <a class="flex items-center gap-3 rounded-lg px-3 py-2.5 hover:bg-primary/10 transition"
                        href="gestion_des_habitats.php">
                        <span class="material-symbols-outlined">eco</span>
                        <span class="text-sm font-semibold">Gestion des habitats</span>
                    </a>

                    <a class="flex items-center gap-3 rounded-lg px-3 py-2.5 hover:bg-primary/10 transition"
                        href="Statistiques.php">
                        <span class="material-symbols-outlined">bar_chart</span>
                        <span class="text-sm font-semibold">Statistiques</span>
                    </a>

                    <a class="flex items-center gap-3 rounded-lg px-3 py-2.5 hover:bg-primary/10 transition"
                        href="jeux.php">
                        <span class="material-symbols-outlined">joystick</span>
                        <span class="text-sm font-semibold">Jeu animalier</span>
                    </a>
                </nav>
            </div>



        </aside>

        <!-- MAIN CONTENT -->
        <div class="flex-1">

            <!-- SECTION ANIMAL -->
            <main class="px-4 sm:px-6 lg:px-8 py-8 md:py-12">
                <div class="mx-auto max-w-7xl">

                    <div class="mb-8 flex items-center justify-between">
                        <h1 class="text-3xl font-bold">En savoir plus sur cet animal</h1>

                        <div class="flex items-center gap-4">
                            <form action="">
                                <button class="flex items-center justify-center gap-2 rounded-lg h-11 px-4 border border-border-light dark:border-border-dark font-bold hover:bg-border-light dark:hover:bg-border-dark transition">
                                    <span class="truncate">Suivant</span>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 lg:gap-12 items-start">

                        <!-- IMAGE -->
                        <div class="lg:col-span-3 w-full aspect-[4/3] bg-center bg-cover rounded-xl shadow-md"
                            style='background-image: url("images/<?= $Url_image ?>");'>
                        </div>

                        <!-- INFO -->
                        <div class="lg:col-span-2 flex flex-col gap-6">

                            <div class="flex items-start justify-between">
                                <h2 class="text-3xl md:text-3xl font-black"><?= $NomAnimal ?></h2>

                                <button class="flex items-center justify-center h-10 w-10 rounded-full bg-primary/20 hover:bg-primary/30 transition">
                                    <span class="material-symbols-outlined">volume_up</span>
                                </button>
                            </div>

                            <div class="flex flex-col gap-4 border-y py-6 border-border-light dark:border-border-dark">

                                <!-- Diet -->
                                <div class="flex items-start gap-4">
                                    <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-primary/20">
                                        <span class="material-symbols-outlined text-primary text-3xl">restaurant</span>
                                    </div>
                                    <div>
                                        <h3 class="font-bold">Type alimentaire</h3>
                                        <p class="text-text-muted-light dark:text-text-muted-dark"><?= $Type_alimentaire ?></p>
                                    </div>
                                </div>

                                <!-- Habitat -->
                                <div class="flex items-start gap-4">
                                    <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-primary/20">
                                        <span class="material-symbols-outlined text-primary text-3xl">public</span>
                                    </div>
                                    <div>
                                        <h3 class="font-bold">Habitat assigné</h3>
                                        <p class="text-primary hover:underline" href="#"><?= $NomHab ?></p>
                                    </div>
                                </div>

                            </div>

                            <!-- Description -->
                            <div class="flex flex-col gap-3">
                                <h3 class="font-bold text-lg">Description</h3>
                                <p class="text-text-muted-light dark:text-text-muted-dark leading-relaxed">
                                    <?= $Description_animal ?>
                                </p>
                            </div>

                        </div>
                    </div>

                </div>
            </main>

            <!-- SHORTCUTS -->
            <main class="p-6 md:p-8 lg:p-10 overflow-y-auto">
                <div class="mx-auto max-w-7xl">

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">

                        <a class="flex flex-col items-center justify-center gap-4 rounded-xl border bg-foreground-light p-6 text-center hover:shadow-lg transition dark:bg-foreground-dark"
                            href="./gestion_des_animaux.php">
                            <div class="flex size-16 items-center justify-center rounded-xl bg-primary/20">
                                <span class="material-symbols-outlined text-3xl">pets</span>
                            </div>
                            <p class="font-semibold">Gérer les animaux</p>
                        </a>

                        <a class="flex flex-col items-center justify-center gap-4 rounded-xl border bg-foreground-light p-6 text-center hover:shadow-lg transition dark:bg-foreground-dark"
                            href="./gestion_des_habitats.php">
                            <div class="flex size-16 items-center justify-center rounded-xl bg-primary/20">
                                <span class="material-symbols-outlined text-3xl">eco</span>
                            </div>
                            <p class="font-semibold">Explorer les habitats</p>
                        </a>

                        <a class="flex flex-col items-center justify-center gap-4 rounded-xl border bg-foreground-light p-6 text-center hover:shadow-lg transition dark:bg-foreground-dark"
                            href="./Statistiques.php">
                            <div class="flex size-16 items-center justify-center rounded-xl bg-primary/20">
                                <span class="material-symbols-outlined text-3xl">bar_chart</span>
                            </div>
                            <p class="font-semibold">Voir les statistiques</p>
                        </a>

                        <a class="flex flex-col items-center justify-center gap-4 rounded-xl border bg-primary p-6 text-center text-white hover:opacity-90 transition"
                            href="./jeux.php">
                            <div class="flex size-16 items-center justify-center rounded-xl bg-white/30">
                                <span class="material-symbols-outlined text-3xl">joystick</span>
                            </div>
                            <p class="font-semibold">Lancer le jeu !</p>
                        </a>

                    </div>
                </div>
            </main>

        </div>
    </div>

</body>

</html>