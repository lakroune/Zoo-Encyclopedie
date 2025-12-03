<?php
include "db_connect.php";


$sql = " select * from  habitat";
$resultat = $cennect->query($sql);
$array_habitat = $resultat->fetch_all();

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
            <aside class="flex w-64 flex-col gap-y-6 border-r border-border-light dark:border-border-dark bg-card-light dark:bg-card-dark p-4">
                <div class="flex items-center gap-3">
                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="Avatar de l'utilisateur" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDz1q8yYp6LmkLqIPlNKhYJVwNuqbeAZ__5zEECzs2hwh53LJxBeGrKX_ySSsXcJ1f36HPpew6wSVqT1I4BvpL_o_p-KxiYCHorVNF6j7zKTSNhA7uZycWCRU9JIqYM7FlUrO48b8sk3fQz_JUHLCkfzyBlbjRIY3VQyxfecOTm-IzorJUxwBExG1WNj_5v5WRy3Zs22e3CNxTaD_ZD_cMJdYi1U1DzwOAG_mKTOt6GTf9r8RVdXuoRPnPGsMo6Z-yUJ3Iv3wlCedA");'></div>
                    <div class="flex flex-col">
                        <h1 class="text-text-light dark:text-text-dark text-base font-medium leading-normal">Zoo Manager</h1>
                        <p class="text-subtle-light dark:text-subtle-dark text-sm font-normal leading-normal">Gestionnaire</p>
                    </div>
                </div>
                <nav class="flex flex-col gap-2">
                    <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/20 text-text-light dark:text-text-dark" href="#">
                        <span class="material-symbols-outlined text-2xl">dashboard</span>
                        <p class="text-sm font-medium leading-normal">Dashboard</p>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/20 text-text-light dark:text-text-dark" href="#">
                        <span class="material-symbols-outlined text-2xl">pets</span>
                        <p class="text-sm font-medium leading-normal">Animaux</p>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/20 text-text-light dark:text-text-dark" href="#">
                        <span class="material-symbols-outlined text-2xl" style="font-variation-settings: 'FILL' 1;">park</span>
                        <p class="text-sm font-medium leading-normal">Habitats</p>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/20 text-text-light dark:text-text-dark" href="#">
                        <span class="material-symbols-outlined text-2xl">school</span>
                        <p class="text-sm font-medium leading-normal">Éducateurs</p>
                    </a>
                </nav>
                <div class="mt-auto flex flex-col gap-4">
                    <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/20 text-text-light dark:text-text-dark" href="#">
                        <span class="material-symbols-outlined text-2xl">settings</span>
                        <p class="text-sm font-medium leading-normal">Paramètres</p>
                    </a>
                    <button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-text-light text-sm font-bold leading-normal tracking-[0.015em]">
                        <span class="truncate">Déconnexion</span>
                    </button>
                </div>
            </aside>
            <main class="flex-1 p-6 lg:p-10">
                <div class="mx-auto max-w-4xl">
                    <div class="mb-8 flex items-start justify-between">
                        <div class="flex min-w-72 flex-col gap-2">
                            <h1 class="text-text-light dark:text-text-dark text-4xl font-black leading-tight tracking-[-0.033em]">Formulaire Habitat</h1>
                            <p class="text-subtle-light dark:text-subtle-dark text-base font-normal leading-normal">Ajoutez ou modifiez les informations d'un habitat.</p>
                        </div>
                    </div>
                    <div class="bg-card-light dark:bg-card-dark rounded-xl border border-border-light dark:border-border-dark">
                        <form class="flex flex-col">
                            <div class="p-6 lg:p-8 space-y-8">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-6 items-start">
                                    <div class="flex flex-col gap-1">
                                        <label class="text-text-light dark:text-text-dark text-base font-medium leading-normal" for="habitat-name">Nom</label>
                                        <p class="text-subtle-light dark:text-subtle-dark text-sm">Le nom officiel de l'habitat.</p>
                                    </div>
                                    <div class="md:col-span-2">
                                        <input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-text-light dark:text-text-dark focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark h-14 placeholder:text-subtle-light dark:placeholder:text-subtle-dark p-[15px] text-base font-normal leading-normal" id="habitat-name" placeholder="Ex: Savane Africaine" type="text" value="" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-6 items-start">
                                    <div class="flex flex-col gap-1">
                                        <label class="text-text-light dark:text-text-dark text-base font-medium leading-normal" for="habitat-description">Description</label>
                                        <p class="text-subtle-light dark:text-subtle-dark text-sm">Une description détaillée de l'habitat, sa faune, sa flore, etc.</p>
                                    </div>
                                    <div class="md:col-span-2">
                                        <textarea class="form-textarea flex w-full min-w-0 flex-1 resize-y overflow-hidden rounded-lg text-text-light dark:text-text-dark focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark min-h-36 placeholder:text-subtle-light dark:placeholder:text-subtle-dark p-[15px] text-base font-normal leading-normal" id="habitat-description" placeholder="Décrivez les caractéristiques de l'habitat..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col-reverse sm:flex-row flex-1 gap-3 justify-end p-6 bg-background-light dark:bg-background-dark border-t border-border-light dark:border-border-dark rounded-b-xl">
                                <button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-5 bg-transparent text-subtle-light dark:text-subtle-dark text-base font-bold leading-normal tracking-[0.015em] hover:bg-primary/10 dark:hover:bg-primary/20" type="button">
                                    <span class="truncate">Annuler</span>
                                </button>
                                <button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-5 bg-primary text-text-light text-base font-bold leading-normal tracking-[0.015em] hover:opacity-90 gap-2" type="submit">
                                    <span class="material-symbols-outlined text-xl">save</span>
                                    <span class="truncate">Enregistrer les modifications</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
            <section class="flex-1 p-6 lg:p-10 <?= $hidden ?> fixed inset-0 bg-background-light dark:bg-background-dark z-50 overflow-y-auto"
        id="formulaire-habitat-container">
        <div class="mx-auto max-w-4xl">
          <div class="mb-8 flex items-start justify-between">
            <div class="flex min-w-72 flex-col gap-2">
              <h1 class="text-text-light dark:text-text-dark text-4xl font-black leading-tight tracking-[-0.033em]">
                Formulaire Habitat
              </h1>
              <p class="text-subtle-light dark:text-subtle-dark text-base font-normal leading-normal">
                Ajoutez ou modifiez les informations d'un habitat.
              </p>
            </div>
          </div>

          <div class="bg-card-light dark:bg-card-dark rounded-xl border border-border-light dark:border-border-dark">
            <form action="<?= $action ?>"
              id="formulaire-habitat"
              method="post"
              enctype="multipart/form-data"
              class="flex flex-col">

              <div class="p-6 lg:p-8 space-y-8">

                <!-- Nom de l'habitat -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-6 items-start">
                  <div class="flex flex-col gap-1">
                    <label class="text-text-light dark:text-text-dark text-base font-medium" for="namehabitat">
                      Nom
                    </label>
                    <p class="text-subtle-light dark:text-subtle-dark text-sm">
                      Le nom officiel de l'habitat.
                    </p>
                  </div>
                  <div class="md:col-span-2">
                    <input name="name"
                      id="namehabitat"
                      value="<?= $nameHab  ?>"
                      class="form-input w-full h-14 rounded-lg border border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark px-4 text-base focus:outline-none focus:ring-2 focus:ring-primary/50 placeholder:text-subtle-light dark:placeholder:text-subtle-dark"
                      placeholder="Ex: Savane Africaine"
                      type="text" required />
                  </div>
                </div>

                <!-- Description -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-6 items-start">
                  <div class="flex flex-col gap-1">
                    <label class="text-text-light dark:text-text-dark text-base font-medium" for="descriptionhabitat">
                      Description
                    </label>
                    <p class="text-subtle-light dark:text-subtle-dark text-sm">
                      Une description détaillée de l'habitat, sa faune, sa flore, etc.
                    </p>
                  </div>
                  <div class="md:col-span-2">
                    <textarea name="description"
                      id="descriptionhabitat"
                      rows="6"
                      class="form-textarea w-full min-h-36 rounded-lg border border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark px-4 py-3 text-base resize-y focus:outline-none focus:ring-2 focus:ring-primary/50 placeholder:text-subtle-light dark:placeholder:text-subtle-dark"
                      placeholder="Décrivez les caractéristiques de l'habitat..."
                      required><?= ($descriptionHab ?? '') ?></textarea>
                  </div>
                </div>

                <!-- Image de l'habitat -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-6 items-start">
                  <div class="flex flex-col gap-1">
                    <label class="text-text-light dark:text-text-dark text-base font-medium">
                      Image de l'habitat
                    </label>
                    <p class="text-subtle-light dark:text-subtle-dark text-sm">
                      Image représentative (JPG, PNG, GIF - max 10 Mo)
                    </p>
                  </div>
                  <div class="md:col-span-2">



                    <!-- Champ upload -->
                    <div id="image-preview" style="background-image:url('images/<?= $url_image ?>');" class="relative border-2 border-dashed border-border-light dark:border-border-dark rounded-lg p-8 text-center hover:border-primary/50 dark:hover:border-primary/50 transition-colors">
                      <input type="file"
                        name="image_habitat"
                        id="image_habitat"
                        accept="image/jpeg,image/png,image/gif"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                      <div class="space-y-3">
                        <span class="material-symbols-outlined text-5xl text-primary/70">cloud_upload</span>
                        <p class="text-base font-medium text-text-light dark:text-text-dark">
                          Glissez une image ici ou cliquez pour sélectionner
                        </p>
                        <p class="text-sm text-subtle-light dark:text-subtle-dark">
                          JPG, PNG ou GIF • Max 10 Mo
                        </p>
                      </div>
                    </div>


                  </div>
                </div>


                <input type="hidden" name="idHab" value="<?= $idHab   ?>">

              </div>

              <!-- Boutons -->
              <div class="flex flex-col-reverse sm:flex-row gap-3 justify-end p-6 bg-background-light dark:bg-background-dark border-t border-border-light dark:border-border-dark rounded-b-xl">
                <button type="button"
                  id="annuler-habitat"
                  class="h-12 px-6 rounded-lg bg-transparent border border-border-light dark:border-border-dark text-text-light dark:text-text-dark font-bold hover:bg-primary/10 dark:hover:bg-primary/20 transition">
                  Annuler
                </button>
                <button type="submit"
                  class="h-12 px-6 rounded-lg bg-primary text-white font-bold hover:opacity-90 flex items-center gap-2 transition">
                  <span class="material-symbols-outlined text-xl">save</span>
                  Enregistrer
                </button>
              </div>
            </form>
          </div>
        </div>
      </section>
        </div>
    </div>

</body>

</html>