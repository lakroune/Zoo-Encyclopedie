<?php
include "db_connect.php";

$action = "php/ajouter_habitat.php";
 
$descriptionHab = '';
$idHab = 0;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idHab'])) {
  $hidden = "block";
  $idHab = (int)$_POST['idHab'];
  $action = "php/modifier_habitat.php?idHab=" . $idHab;

  $sql = " select * from  habitat where idHab= " . $idHab;

  try {
    $resultat = $cennect->query($sql);
    $habitat_modify = $resultat->fetch_assoc();
     
  } catch (Exception $e) {
    print('Erreur de connexion à la base de données.');
  }
}
?>


<!DOCTYPE html>
<html class="light" lang="fr">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Tableau de bord de gestion des habitats</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
  <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
  <style>
    .material-symbols-outlined {
      font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }
  </style>
  <script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary": "#13ec5b",
            "background-light": "#f6f8f6",
            "background-dark": "#102216",
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
          <a class="flex items-center gap-3 rounded-lg px-3 py-2.5 hover:bg-primary/10 dark:hover:bg-primary/20" href="index.php">
            <span class="material-symbols-outlined text-text-light dark:text-text-dark"
              style="font-variation-settings: 'FILL' 1;">dashboard</span>
            <span class="text-sm font-semibold leading-normal text-text-light dark:text-text-dark">Tableau
              de bord</span>
          </a>
          <a class="flex items-center gap-3 rounded-lg px-3 py-2.5 hover:bg-primary/10 dark:hover:bg-primary/20"
            href="gestion_des_animaux.php">
            <span class="material-symbols-outlined text-text-light dark:text-text-dark">eco</span>
            <span class="text-sm font-medium leading-normal text-text-light dark:text-text-dark">Gestion des
              animaux</span>
          </a>
          <a class="flex items-center gap-3 rounded-lg px-3 py-2.5 bg-primary/20 dark:bg-primary/30"
            href="gestion_des_habitats.php">
            <span class="material-symbols-outlined text-text-light dark:text-text-dark">pets</span>
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
      <div class="flex flex-col gap-2">
        <a class="flex items-center gap-3 rounded-lg px-3 py-2.5 hover:bg-primary/10 dark:hover:bg-primary/20"
          href="#">
          <span class="material-symbols-outlined text-text-light dark:text-text-dark">settings</span>
          <span
            class="text-sm font-medium leading-normal text-text-light dark:text-text-dark">Paramètres</span>
        </a>
      </div>
    </aside>
    <div class="flex-1 flex flex-col">

      <main class="flex-1 p-4 sm:p-6 lg:p-8 position : relative">
        <div class="flex flex-wrap justify-between items-start gap-4 mb-6">
          <div class="flex min-w-72 flex-col gap-2">
            <p class="text-[#0d1b12] dark:text-white text-4xl font-black leading-tight tracking-[-0.033em]">Gestion des Habitats</p>
            <p class="text-[#4c9a66] dark:text-primary/70 text-base font-normal leading-normal">Parcourez, ajoutez, modifiez ou supprimez des habitats.</p>
          </div>
          <button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-[#0d1b12] text-sm font-bold leading-normal tracking-[0.015em] hover:bg-opacity-90 transition-colors gap-2" id="ajouter-habitat">
            <span class="material-symbols-outlined text-xl">add</span>
            <span class="truncate">Ajouter un Habitat</span>
          </button>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-6">
          <?php foreach ($array_habitat as $habitat) { ?>
            <div class="flex flex-col gap-3 rounded-xl bg-white dark:bg-gray-900/50 border border-primary/20 dark:border-primary/30 shadow-sm transition-shadow hover:shadow-lg overflow-hidden">
              <div class="w-full bg-center bg-no-repeat aspect-video bg-cover" data-alt="Expansive grassy plains of the African Savanna with acacia trees under a blue sky."
                style='background-image: url("images/<?= $habitat[2] ?>");'></div>
              <div class="p-4 flex flex-col flex-1">
                <p class="text-[#0d1b12] dark:text-white text-lg font-bold leading-normal"> <?= $habitat[1] ?></p>
                <p class="text-[#4c9a66] dark:text-primary/70 text-sm font-normal leading-normal mt-1 flex-1"><?= $habitat[3] ?></p>
                <div class="flex items-center justify-end gap-2 mt-4">
                  <form action="" method="POST">
                    <input type="hidden" name="idHab" value="<?= $habitat[0]; ?>">
                    <button target="edit" data-id="<?= $habitat[0]; ?> class=" flex items-center justify-center size-9
                      rounded-lg hover:bg-primary/20 dark:hover:bg-primary/30 text-[#4c9a66] dark:text-primary/70
                      dark:hover:text-primary transition-colors">
                      <span class="material-symbols-outlined text-xl">edit</span>
                    </button>
                  </form>


                  <button target="delete" data-id="<?= $habitat[0]; ?>" class="flex items-center justify-center size-9 rounded-lg hover:bg-red-500/10 dark:hover:bg-red-500/20 text-red-600 dark:text-red-500 transition-colors">
                    <span class="material-symbols-outlined text-xl">delete</span>
                  </button>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>

      </main>
      <!-- model ajoute habitat -->

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
  <script src="js/script.js">

  </script>
  <script>
    $(document).ready(function() {
      $("button[target='delete']").on('click', function(e) {
        if (confirm('Voulez-vous vraiment supprimer cet habitat ?')) {
          const habitatId = $(this).data('id');
          $.ajax({
            url: 'php/supprimer_habitat.php',
            type: 'POST',
            data: {
              idHab: habitatId
            },
            success: function(response) {

              location.reload();

            }
          });
        }
      });
    });
  </script>

  <!-- Script pour l'aperçu de l'image -->
  <script>
    document.getElementById('image_habitat')?.addEventListener('change', function(e) {
      const file = e.target.files[0];
      const preview = document.getElementById('image-preview');
      const container = document.getElementById('preview-container');

      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          preview.style.backgroundImage = `url('${e.target.result}')`;
          preview.style.backgroundSize = 'cover';
          preview.style.backgroundPosition = 'center';
          preview.style.backgroundRepeat = 'no-repeat';

          // Cache le texte par défaut
          placeholder.style.display = 'none';
          container.classList.remove('hidden');
        }
        reader.readAsDataURL(file);
      } else {
        container.classList.add('hidden');
        preview.src = '';
      }
    });
  </script>
</body>


</html>