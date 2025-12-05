<?php
include "db_connect.php";


$action = "php/ajouter_animal.php";

$sql = " select * from  habitat";
$resultat = $cennect->query($sql);
$array_habitat = $resultat->fetch_all();


$sql = " select a.IdAnimal ,a.NomAnimal, a.Type_alimentaire ,h.NomHab,a.Url_image from animal as a join habitat as h where  a.IdHab=h.IdHab";
$resultat = $cennect->query($sql);
$array_animal = $resultat->fetch_all();

$hidden = "hidden";
$NomAnimal = "";
$Url_image = "";
$descriptionAnimal = '';
$idHab = 0;
$typeRegime = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter'])) {
    $hidden = "block";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['IdAnimal'])) {
    $hidden = "block";
    $IdAnimal = (int)$_POST['IdAnimal'];
    $action = "php/modifier_animal.php?IdAnimal=" . $IdAnimal;
    try {
        $sql = " select * from  animal where IdAnimal= " . $IdAnimal;
        $resultat = $cennect->query($sql);
        $animal_modify = $resultat->fetch_assoc();
        $NomAnimal =   $animal_modify['NomAnimal'];
        $url_image =   $animal_modify['Url_image'];
        $descriptionAnimal =  $animal_modify['Description_animal'];
        $typeRegime =  $animal_modify['Type_alimentaire'];
        $idHab = (int) $animal_modify['IdHab'];
    } catch (Exception $e) {
        print('Erreur de connexion à la base de données.');
    }
}

$log_file = "file_log.txt";
try {
    echo   2 / 0;
} catch (DivisionByZeroError $e) {
    error_log("jejj", 3, $log_file);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_POST["type-Alimentaire"]) || isset($_POST["Habitat"]) || isset($_POST["search"]) )) {

    if ($_POST["type-Alimentaire"] == "Tout-Type-Alimentaire"  && $_POST["Habitat"] == "Tout Habitat") {
        $sql = "   select a.IdAnimal ,a.NomAnimal, a.Type_alimentaire ,h.NomHab,a.Url_image from animal as a , habitat as h where  a.IdHab=h.IdHab and a.NomAnimal LIKE    '" . $_POST['search'] . "%'";
    } else 
    if ($_POST["type-Alimentaire"] != "Tout-Type-Alimentaire"  && $_POST["Habitat"] == "Tout Habitat") {
        $sql = "   select a.IdAnimal ,a.NomAnimal, a.Type_alimentaire ,h.NomHab,a.Url_image from animal as a ,
         habitat as h where  a.IdHab=h.IdHab and a.NomAnimal LIKE    '" . $_POST['search'] . "%' and a.Type_alimentaire='" . $_POST["type-Alimentaire"] . "'";
    } else

    if ($_POST["type-Alimentaire"] == "Tout-Type-Alimentaire"  && $_POST["Habitat"] != "Tout Habitat") {
        $sql = "   select a.IdAnimal ,a.NomAnimal, a.Type_alimentaire ,h.NomHab,a.Url_image from animal as a ,
         habitat as h where  a.IdHab=h.IdHab and a.NomAnimal LIKE    '" . $_POST['search'] . "%' and a.IdHab='" . $_POST["Habitat"] . "'";
    } else   $sql = "   select a.IdAnimal ,a.NomAnimal, a.Type_alimentaire ,h.NomHab,a.Url_image from animal as a ,
         habitat as h where  a.IdHab=h.IdHab and a.NomAnimal LIKE    '" . $_POST['search'] . "%' and a.IdHab='" . $_POST["Habitat"] . "'
          and a.Type_alimentaire='" . $_POST["type-Alimentaire"] . "'";
    $resultat = $cennect->query($sql);
    $array_animal = $resultat->fetch_all();
}
?>







<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Tableau de bord de gestion des animaux avec filtres</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&amp;display=swap" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#13ec5b",
                        "background-light": "#f6f8f6",
                        "background-dark": "#102216",
                        "card-light": "#ffffff",
                        "card-dark": "#1a2c20",
                        "text-light-primary": "#0d1b12",
                        "text-dark-primary": "#f0f0f0",
                        "text-light-secondary": "#4c9a66",
                        "text-dark-secondary": "#a2d8b4",
                        "border-light": "#e7f3eb",
                        "border-dark": "#2c4033",
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
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body class="font-display bg-background-light dark:bg-background-dark">
    <div class="relative flex h-auto min-h-screen w-full group/design-root ">
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
                            Zoo Manager</h1>
                        <p
                            class="text-sm font-normal leading-normal text-text-light-secondary dark:text-text-dark-secondary">
                            Application de Gestion</p>
                    </div>
                </div>
                <nav class="mt-4 flex flex-col gap-1">
                    <a class="flex items-center gap-3 rounded-lg px-3 py-2.5 hover:bg-primary/10 dark:hover:bg-primary/20"
                        href="index.php">
                        <span class="material-symbols-outlined text-text-light dark:text-text-dark"
                            style="font-variation-settings: 'FILL' 1;">dashboard</span>
                        <span class="text-sm font-semibold leading-normal text-text-light dark:text-text-dark">Accueil
                        </span>
                    </a>
                    <a class="flex items-center gap-3 rounded-lg px-3 py-2.5 bg-primary/20 dark:bg-primary/30"
                        href="gestion_des_animaux.php">
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
                        <span
                            class="text-sm font-medium leading-normal text-text-light dark:text-text-dark">Statistiques</span>
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
        <div class="flex-1 flex flex-col">

            <main class="flex-1 p-4 sm:p-6 lg:p-8 position : relative">
                <div class="mx-auto max-w-7xl   position : relative ">
                    <header class="flex flex-wrap items-center justify-between gap-4">
                        <div class="flex flex-col gap-1">
                            <h1
                                class="text-4xl font-black leading-tight tracking-[-0.033em] text-text-light-primary dark:text-text-dark-primary">
                                Tableau de bord des Animaux</h1>
                            <p
                                class="text-base font-normal leading-normal text-text-light-secondary dark:text-text-dark-secondary">
                                Gérez tous les animaux de votre zoo en un seul endroit.</p>
                        </div>
                        <form action="" method="POST">
                            <input type="hidden" value="ajouter" name="ajouter">
                            <button id="ajouter-animal"
                                class="hidden h-10 min-w-[84px] cursor-pointer items-center justify-center gap-2 overflow-hidden rounded-lg bg-primary px-4 text-sm font-bold leading-normal tracking-[0.015em] text-text-light-primary sm:flex">
                                <span class="material-symbols-outlined">add</span>
                                <span class="truncate">Ajouter un Animal</span>
                            </button>
                        </form>
                    </header>
                    <form action="" method="POST">
                        <div class="mt-8 flex flex-col gap-4 md:flex-row md:items-center">
                            <div class="flex-grow">
                                <label class="flex h-12 w-full min-w-40 flex-col">
                                    <div class="flex h-full w-full flex-1 items-stretch rounded-lg">
                                        <div
                                            class="flex items-center justify-center rounded-l-lg border-y border-l border-border-light bg-card-light pl-4 text-text-light-secondary dark:border-border-dark dark:bg-card-dark dark:text-text-dark-secondary">
                                            <button type="submit">
                                                <span class="material-symbols-outlined">search</span>
                                            </button>
                                        </div>
                                        <input name="search"
                                            class="form-input h-full w-full min-w-0 flex-1 resize-none overflow-hidden rounded-r-lg border border-border-light bg-card-light pl-2 text-base font-normal leading-normal text-text-light-primary placeholder:text-text-light-secondary focus:outline-0 focus:ring-2 focus:ring-primary/50 dark:border-border-dark dark:bg-card-dark dark:text-text-dark-primary dark:placeholder:text-text-dark-secondary"
                                            placeholder="Rechercher un animal..."  />
                                    </div>
                                </label>
                            </div>
                            <div class="flex flex-wrap gap-4">
                                <div class="flex-1">
                                    <label class="sr-only" for="habitat-filter">Filtrer par Habitat</label>
                                    <select name="Habitat"
                                        class="form-select h-12 w-full min-w-[180px] rounded-lg border border-border-light bg-card-light pr-8 text-sm font-medium text-text-light-primary focus:outline-none focus:ring-2 focus:ring-primary/50 dark:border-border-dark dark:bg-card-dark dark:text-text-dark-primary"
                                        id="habitat-filter">
                                        <option selected="">Tout Habitat</option>
                                        <?php
                                        foreach ($array_habitat as $habitat) {
                                            echo "  <option value='" . $habitat[0] . "'>" . $habitat[1] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="flex-1">
                                    <label class="sr-only" for="diet-filter">Filtrer par Type Alimentaire</label>
                                    <select name="type-Alimentaire"
                                        class="form-select h-12 w-full min-w-[180px] rounded-lg border border-border-light bg-card-light pr-8 text-sm font-medium text-text-light-primary focus:outline-none focus:ring-2 focus:ring-primary/50 dark:border-border-dark dark:bg-card-dark dark:text-text-dark-primary"
                                        id="diet-filter">
                                        <option value="Tout-Type-Alimentaire" selected>Tout Type Alimentaire</option>
                                        <option value="Carnivore">Carnivore</option>
                                        <option value="Herbivore">Herbivore</option>
                                        <option value="Omnivore">Omnivore</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="mt-8 grid grid-cols-[repeat(auto-fill,minmax(280px,1fr))] gap-6">

                        <?php foreach ($array_animal as $animal) { ?>
                            <div
                                class="group flex flex-col gap-4 rounded-xl border border-border-light bg-card-light p-4 transition-shadow hover:shadow-lg dark:border-border-dark dark:bg-card-dark dark:hover:shadow-primary/10">
                                <div class="relative aspect-[4/3] w-full overflow-hidden rounded-lg bg-cover bg-center bg-no-repeat"
                                    data-alt="A majestic lion with a golden mane resting in a savanna environment."
                                    style='background-image: url("images/<?= $animal[4] ?>");'>
                                    <div
                                        class="absolute inset-x-0 bottom-0 flex translate-y-full justify-end gap-2 p-2 transition-transform duration-300 group-hover:translate-y-0">
                                        <form action="" method="POST">
                                            <input type="hidden" name="IdAnimal" value="<?= $animal[0] ?>">
                                            <button target="edit"
                                                class="flex h-8 w-8 cursor-pointer items-center justify-center rounded-full bg-card-light/80 text-text-light-primary backdrop-blur-sm dark:bg-card-dark/80 dark:text-text-dark-primary"><span
                                                    class="material-symbols-outlined text-base">edit</span></button>
                                        </form>
                                        <button target="delete" id="delete-button" data-id="<?= $animal[0]; ?>"
                                            class="flex h-8 w-8 cursor-pointer items-center justify-center rounded-full bg-card-light/80 text-red-500 backdrop-blur-sm dark:bg-card-dark/80"><span
                                                class="material-symbols-outlined text-base">delete</span></button>
                                    </div>
                                </div>
                                <div>
                                    <p
                                        class="text-lg font-bold leading-normal text-text-light-primary dark:text-text-dark-primary">
                                        <?= $animal["1"] ?>
                                    </p>
                                    <div
                                        class="mt-1 flex items-center gap-4 text-text-light-secondary dark:text-text-dark-secondary">
                                        <span class="flex items-center gap-1 text-sm"><span
                                                class="material-symbols-outlined text-base">grass</span>
                                            <?= $animal["3"] ?>
                                        </span>
                                        <span class="flex items-center gap-1 text-sm"><span
                                                class="material-symbols-outlined text-base">restaurant</span>
                                            <?= $animal["2"] ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </main>
            <!-- medel ajoute animal -->



        </div>
        <section id="formulaire-animal-container"
            class="mx-auto <?= $hidden ?>  fixed inset-0 z-50 overflow-y-auto bg-background-light/80 backdrop-blur-sm position: fixed w-full bg-background-light   right: 0    "
            style="width: 600px;">

            <div class="rounded-xl bg-white p-6 shadow-sm dark:bg-primary-dark sm:p-8 md:p-10">
                <form action="<?= $action ?>" method="POST" enctype="multipart/form-data"
                    class="grid grid-cols-1 gap-x-8 gap-y-6 md:grid-cols-2">

                    <!-- Nom de l’animal -->
                    <div class="md:col-span-2">
                        <label class="flex flex-col" for="animal-name">
                            <span class="pb-2 text-base font-medium">Nom de l'animal</span>
                            <input name="nomAnimal"
                                class="h-12 w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg border border-gray-300 bg-background-light px-4 text-base font-normal placeholder:text-gray-500 focus:border-primary focus:outline-0 focus:ring-2 focus:ring-primary/50 dark:border-gray-600 dark:bg-background-dark dark:text-primary-light dark:placeholder:text-gray-400 dark:focus:border-accent"
                                id="animal-name" placeholder="Par exemple, Léo le Lion" value="<?= $NomAnimal; ?>" />
                        </label>
                    </div>

                    <!-- CHAMP DESCRIPTION (ajouté ici) -->
                    <div class="md:col-span-2">
                        <label class="flex flex-col" for="description">
                            <span class="pb-2 text-base font-medium">Description de l'animal</span>
                            <textarea name="description" rows="5"
                                class="w-full min-w-0 resize-none rounded-lg border border-gray-300 bg-background-light px-4 py-3 text-base font-normal placeholder:text-gray-500 focus:border-primary focus:outline-0 focus:ring-2 focus:ring-primary/50 dark:border-gray-600 dark:bg-background-dark dark:text-primary-light dark:placeholder:text-gray-400 dark:focus:border-accent"
                                id="description"
                                placeholder="Décrivez l’animal, son caractère, ses particularités physiques, son histoire…"><?= $descriptionAnimal ?></textarea>
                        </label>
                    </div>

                    <!-- Régime alimentaire -->
                    <div>
                        <label class="flex flex-col" for="diet">
                            <span class="pb-2 text-base font-medium">Régime alimentaire</span>
                            <div class="relative">
                                <select name="type-regime"
                                    class="h-12 w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg border border-gray-300 bg-background-light px-4 pr-10 text-base font-normal focus:border-primary focus:outline-0 focus:ring-2 focus:ring-primary/50 dark:border-gray-600 dark:bg-background-dark dark:text-primary-light dark:focus:border-accent"
                                    id="diet">
                                    <option value="" disabled>Sélectionnez un régime</option>
                                    <option value="carnivore" <?= (isset($typeRegime) && $typeRegime == 'carnivore')
                                                                    ? 'selected' : '' ?>>Carnivore</option>
                                    <option value="herbivore" <?= (isset($typeRegime) && $typeRegime == 'herbivore')
                                                                    ? 'selected' : '' ?>>Herbivore</option>
                                    <option value="omnivore" <?= (isset($typeRegime) && $typeRegime == 'omnivore')
                                                                    ? 'selected' : '' ?>>Omnivore</option>
                                </select>
                            </div>
                        </label>
                    </div>

                    <!-- Habitat naturel -->
                    <div>
                        <label class="flex flex-col" for="habitat">
                            <span class="pb-2 text-base font-medium">Habitat naturel</span>
                            <div class="relative">
                                <select name="idHab"
                                    class="h-12 w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg border border-gray-300 bg-background-light px-4 pr-10 text-base font-normal focus:border-primary focus:outline-0 focus:ring-2 focus:ring-primary/50 dark:border-gray-600 dark:bg-background-dark dark:text-primary-light dark:focus:border-accent"
                                    id="habitat">
                                    <option value="" disabled>Sélectionnez un habitat</option>
                                    <?php
                                    foreach ($array_habitat as $habitat) {
                                        $selected = (isset($idHab) && $idHab == $habitat[0]) ? 'selected' : '';
                                        echo "<option value='{$habitat[0]}' $selected>{$habitat[1]}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </label>
                    </div>

                    <!-- Photo de l’animal -->
                    <div class="md:col-span-2 max-w-2xl" style="width: 250px;">
                        <label class="pb-2 text-base font-medium" for="animal-photo">Photo de l'animal</label>
                        <div id="image-preview"
                            style="background-image:url('images/<?= $url_image ?>');  background-size: cover;"
                            class="relative flex cursor-pointer flex-col items-center gap-4 rounded-lg border-2 border-dashed border-gray-300 px-6 py-10 transition-colors hover:border-primary dark:border-gray-600 dark:hover:border-accent">
                            <span class="material-symbols-outlined text-4xl text-primary dark:text-primary-light">
                                cloud_upload
                            </span>
                            <div class="flex max-w-md flex-col items-center gap-1 text-center">
                                <p class="text-base font-bold text-gray-700 dark:text-gray-200">Cliquez ou
                                    glissez-déposez une photo</p>
                                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">PNG, JPG, GIF jusqu’à
                                    10Mo</p>
                            </div>
                            <input name="image" type="file"
                                class="absolute inset-0 h-full w-full cursor-pointer opacity-0" id="image_animal">
                        </div>
                    </div>

                    <!-- Boutons -->
                    <div
                        class="mt-6 flex flex-col-reverse items-center gap-4 border-t border-gray-200 pt-6 dark:border-gray-700 md:col-span-2 md:flex-row md:justify-end">
                        <form action="" method="GET">
                            <button id="annuler-animal"
                                class="h-12 w-full cursor-pointer items-center justify-center rounded-lg bg-transparent px-6 text-base font-bold text-gray-700 transition-colors hover:bg-gray-200 dark:text-gray-200 dark:hover:bg-gray-700 md:w-auto"
                                type="submit">
                                Annuler
                            </button>
                        </form>
                        <button id="enregistrer-animal"
                            class="flex h-12 w-full cursor-pointer items-center justify-center gap-2 rounded-lg bg-primary px-6 text-base font-bold text-white shadow-sm transition-colors hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary/50 focus:ring-offset-2 dark:bg-accent dark:text-primary dark:hover:bg-accent/90 dark:focus:ring-accent/50 md:w-auto"
                            type="submit">
                            <span class="material-symbols-outlined">save</span>
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <script>
        $(document).ready(function() {
            $("button[target='delete']").on('click', function() {
                if (confirm("voullez vous vriement supprimer")) {
                    const IdAnimal = $(this).data('id');
                    $.ajax({
                        url: 'php/supprimer_animal.php',
                        type: 'POST',
                        data: {
                            IdAnimal: IdAnimal
                        },
                        success: function(response) {

                            location.reload();

                        }
                    });
                }
            });
        });
    </script>
    <script src="js/script2.js"></script>
    <!-- Script pour l'aperçu de l'image -->
    <script>
        document.getElementById('image_animal').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('image-preview');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.style.backgroundImage = `url('${e.target.result}')`;
                    placeholder.style.display = 'none';
                    container.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
            }
        });
    </script>

</body>

</html>