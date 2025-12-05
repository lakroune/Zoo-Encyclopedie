 

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
  <link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    rel="stylesheet" />
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
</head>

<body class="font-display bg-background-light dark:bg-background-dark">
  <div class="relative flex min-h-screen w-full ">
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
    <div class="flex-1 flex flex-col">
      <header
        class="flex items-center justify-between whitespace-nowrap border-b border-solid border-primary/20 px-4 sm:px-6 py-3 lg:hidden">
        <div class="flex items-center gap-4 text-[#0d1b12] dark:text-gray-100">
          <button class="lg:hidden text-[#0d1b12] dark:text-white">
            <span class="material-symbols-outlined">menu</span>
          </button>
          <div class="flex items-center gap-2">
            <div class="size-6 text-primary">
              <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_6_535)">
                  <path clip-rule="evenodd"
                    d="M47.2426 24L24 47.2426L0.757355 24L24 0.757355L47.2426 24ZM12.2426 21H35.7574L24 9.24264L12.2426 21Z"
                    fill="currentColor" fill-rule="evenodd"></path>
                </g>
                <defs>
                  <clipPath id="clip0_6_535">
                    <rect fill="white" height="48" width="48"></rect>
                  </clipPath>
                </defs>
              </svg>
            </div>
            <h2 class="text-[#0d1b12] dark:text-gray-100 text-lg font-bold leading-tight tracking-[-0.015em]">ZooManager
            </h2>
          </div>
        </div>
        <div class="flex items-center gap-4">
          <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10"
            data-alt="Avatar of the user, showing a cartoon koala"
            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCipvhIJ7ylZ1tPCryTfHo6rUodiO-y-8C2NFW2STZO7q2Cgcn8SvzkYvJsImaA5JAy0FPpLsM1bM5DfOf_7MiVNbRUE04jNnG0ifwq7vmE4XM6hIywU2sqGPv5FPQa70fEc99Prjdv2Bo5IPf8teDv2MgLHg2Yh8iOESKX-tfYde_KENbZiiyS-2uR2QturW-UmDELge7a0kpgbKWI4UEhkenHlqSf1gfT3if7XedhVvmY-xc8ocn2rQYGcU9nSM2FNZSmz3c9z4w");'>
          </div>
        </div>
      </header>
      <main class="flex-1 p-4 sm:p-6 lg:p-8">
        <div class="flex flex-wrap justify-between items-start gap-4 mb-6">
          <div class="flex min-w-72 flex-col gap-2">
            <p class="text-[#0d1b12] dark:text-white text-4xl font-black leading-tight tracking-[-0.033em]">Gestion des
              Habitats</p>
            <p class="text-[#4c9a66] dark:text-primary/70 text-base font-normal leading-normal">Parcourez, ajoutez,
              modifiez ou supprimez des habitats.</p>
          </div>
          <button
            class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-[#0d1b12] text-sm font-bold leading-normal tracking-[0.015em] hover:bg-opacity-90 transition-colors gap-2">
            <span class="material-symbols-outlined text-xl">add</span>
            <span class="truncate">Ajouter un Habitat</span>
          </button>
        </div>
        <div class="mb-6">
          <label class="flex flex-col min-w-40 h-12 w-full">
            <div class="flex w-full flex-1 items-stretch rounded-lg h-full">
              <div
                class="text-[#4c9a66] dark:text-primary/70 flex bg-white dark:bg-background-dark border border-primary/20 dark:border-primary/30 items-center justify-center pl-4 rounded-l-lg border-r-0">
                <span class="material-symbols-outlined">search</span>
              </div>
              <input
                class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d1b12] dark:text-gray-100 focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-primary/20 dark:border-primary/30 bg-white dark:bg-background-dark h-full placeholder:text-[#4c9a66] dark:placeholder:text-primary/50 px-4 rounded-l-none border-l-0 pl-2 text-base font-normal leading-normal"
                placeholder="Rechercher un habitat par nom..." value="" />
            </div>
          </label>
        </div>
        <div class="text-lg font-bold leading-normal text-text-light-primary dark:text-text-dark-primary">
          <div class="grid grid-cols-[repeat(auto-fit,minmax(220px,1fr))] gap-5">
            <div class="group relative cursor-pointer overflow-hidden rounded-xl shadow-lg"
              data-alt="Photo d'un lion majestueux dans la savane">
              <img alt="Lion" class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDrxXP_qxENJV7OCSsQPfDHVmaJdMK0EPzXswtQNrdRMzXCXwUB2-mWQAgdGzG5ICfiiPL-99Psw5VYn9_N4gw1NobWh94_6Gy7dOGLE9aWfv9bQxfzHcsj4_TuIo-BKLQ-RSIwie8v85Vg-lE7ubr9W1e92T1AI2wukCmBxUEO8CNtuejM9k0oDXvIiR1vpptFkwjCbP8kQCnypICevKryo0Jplw35A_CTEZHUMnfm3TQcVOGoSy1O8LEISgD9NVaB5UEKIwKlsrM" />
              <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
              <p class="absolute bottom-4 left-4 text-white text-lg font-bold leading-tight">Lion</p>
            </div>
            <div class="group relative cursor-pointer overflow-hidden rounded-xl shadow-lg"
              data-alt="Une girafe se nourrissant des feuilles d'un arbre">
              <img alt="Girafe"
                class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAn1JKL41Gmc-2EcBCVYeBZ5Y_CdxjtuUVSt5SlJLUOS9tj7pm2aMFbNEiSyQWlP8ktt8mF0NFBQL5YrA_ck7VQ1ByFqNTNyBn4oZoPmAUdlkZ6x39Yr5RWfQweh4OA2j5j_IAx6nGH5Qc8DRUPEKgh5h_ac1bngrw6__LJq_jwFF2YPfgOCShH_fI0sVtijo-fWQT7jz_CHd48fHfYV4jxFXrZ6aylqQz7SSl70v0m2mjma3Ig7svkkHUWDEKqlLf53nViy_tsAFw" />
              <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
              <p class="absolute bottom-4 left-4 text-white text-lg font-bold leading-tight">Girafe</p>
            </div>
            <div class="group relative cursor-pointer overflow-hidden rounded-xl shadow-lg"
              data-alt="Un groupe de manchots empereurs sur la glace">
              <img alt="Manchot empereur"
                class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuA_CdJnvllMUyo4Ssg-2OTNSCLW-qGGqlxv-iGHHxl4I-yLg0mzmRuD1V3EaOX6or0brFflDWA_s_RTmZihrvF4pmQqZk40P7kmSBM3M0QC8_yU0fH0mUxwZ2N4uEhnC_6j3iL9kW5B7EBQ82QLwybH69eDFWus4XvSFU_r0MRFqiR3mgW8nl6pnzRfniZQVm3oETQYe5nOWcSsQHWNLvvS4g4KR0ebPz7rcRty4YwrtOV1DtQNEy-GL3SFJcKX1S-nY8zDIBFD0Ik" />
              <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
              <p class="absolute bottom-4 left-4 text-white text-lg font-bold leading-tight">Manchot empereur</p>
            </div>
            <div class="group relative cursor-pointer overflow-hidden rounded-xl shadow-lg"
              data-alt="Un tigre marchant dans la jungle">
              <img alt="Tigre"
                class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAD_SotOcitg50cHnKvBk2N4cmM6KAzEAUE7QEDkYgZP8YqV7th3cbBw9Ie2NCcyBFc6AfCB3Gz-x3wnDMwRIABIm9MxlU2c03FpZrqjDwN3F550K5Ts5z3QcPvW067ypXPrSotTPqtJo-c_O3ziowPeR4M6B22oBV6_XcoLGxvz4hEEaFZVQZT_1Wy-4nhfqxQoWF0PGngLNfSWqrPQfNZhqXYJikuI8NIL2AccCGfiHuQWV1RK4hCuoDI_qmi39zbmrYTi0iWN5s" />
              <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
              <p class="absolute bottom-4 left-4 text-white text-lg font-bold leading-tight">Tigre</p>
            </div>
            <div class="group relative cursor-pointer overflow-hidden rounded-xl shadow-lg"
              data-alt="Un panda géant mangeant du bambou">
              <img alt="Panda Géant"
                class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCSRBDwLNBQqYWkzcTxNoJM6UUkURWYiNSRyDA5TDt5G5EVgyDgXcm8ENoU2U_MfbrY9K11a_zIqrPRJZV6s8F2qcbLdsTRk8Oac4dxm99r7bDls1zKcfdFeBuxDAJLUtKL4zopIFtg2ppaBpImH7n54Rg2tuwKfcbH-eZwwDKVfUg5AaiRp7B1znPkOGzyAaSGxgEaL9YVoNcDRI6yQ34LtOEhiQR6KFqdH7xUxu43-duB0sr3tNmcr7_R_hYEW1i6MDX-0ghRtV0" />
              <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
              <p class="absolute bottom-4 left-4 text-white text-lg font-bold leading-tight">Panda Géant</p>
            </div>
            <div class="group relative cursor-pointer overflow-hidden rounded-xl shadow-lg"
              data-alt="Un serpent corail coloré sur des feuilles mortes">
              <img alt="Serpent Corail"
                class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCfiu87XrCduQKuDTSQXGcmlRZK0P9S6P4TrH-AuwPHnnHf9Gh8RVeVUUgrMWZfgFbG1Tla1OfGV6DzCrWyadtC7zONcv7Vdu16Vu-CKYKzQbjCCFEA-orJX4_XanM9KZrUuGU-uSS_duZl978y8DTmLG0VHGwljU2gW1J-LJAmTILdZTVkay_TZoZd7b1AoMZ_9KQbho9kjVlgpBQ-PCgc1dnGrZhVTtdiArT7__eoDKFIWXEbJenA4jyUtRn3EXgXvDMOTx5Cz54" />
              <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
              <p class="absolute bottom-4 left-4 text-white text-lg font-bold leading-tight">Serpent Corail</p>
            </div>
            <div class="group relative cursor-pointer overflow-hidden rounded-xl shadow-lg"
              data-alt="Un perroquet ara macao aux plumes vives perché sur une branche">
              <img alt="Ara Macao"
                class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBFaoMX9RrxBnM-YF6JhSmRiT89TDI5pxET5zRdx4zbCWVfnz4qLpq7iz0xCpXO88Y8JLV80X3e8v_kgjxTtWD8SE8CsOdhbZYg-pfvo3FcWV-2aT6DCUjdB67LnD6wOpCMIqhHk7tonnnJpC5FC6X_fLSMjelkWQwawxmRJYFKzS2s5hgmL7Zq2zkKaySck6z0q3VlG4bhKqZP73LcD3B7Hu4dAIYxV4YfuNhNYUNDt9KDWIUn0hFET6s4SGEplYqFTG7IBJ_Tlt4" />
              <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
              <p class="absolute bottom-4 left-4 text-white text-lg font-bold leading-tight">Ara Macao</p>
            </div>
            <div class="group relative cursor-pointer overflow-hidden rounded-xl shadow-lg"
              data-alt="Un poisson-clown nageant dans une anémone">
              <img alt="Poisson-Clown"
                class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAHUC-jvPBwRKmgO0in_XhtmNb3rp23qNl_b-v2eJQO1uLjcZ1mBGd8wlIJm7mXCIvrBKBVe3j6MVgbVWfvpZEwxeuT1fMvcrz27rsTg4bqDoui5OnrA1QOH_n-7WbZJWMZaypfK-Hnak4j4XrIiX37uoPJBa__K8VrdWEKY2TMT4KhiXb-uRz7KJ2KXCxLTOUAouq8j1HeLCMOXlSDiGORMoJ0hVJtPTF2AcdlkZqtijggoHOFRdwiQ3RoH8GpCn6ksAjWriUwhIE" />
              <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
              <p class="absolute bottom-4 left-4 text-white text-lg font-bold leading-tight">Poisson-Clown</p>
            </div>
            <div class="group relative cursor-pointer overflow-hidden rounded-xl shadow-lg"
              data-alt="Un éléphant d'Afrique avec ses grandes oreilles">
              <img alt="Éléphant d'Afrique"
                class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuA8qTSQAsQ6aH_9_MMnsO4oCF_kQl1H9KFG1B26_69LlDdiNV4dbi_13Ea0SqZjnnquea5Olqoi2myszoQyegL3kDrp8f47C6qfoWVGIP2Oti1MEtn4u-DLUHRk_r5waPzoV_VYSJG_aUW5tk7fULAkSXTeHOc3S5H5MdyX1RPbD0cSvewEYJ17uwx3bEM3BR7HAdFbIWRg8AIA2WTSJ2EnwoOuHdiUetw9sYabtiVBo4qObukhypEFsrcTfEdAdD9n26DBtRnycf4" />
              <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
              <p class="absolute bottom-4 left-4 text-white text-lg font-bold leading-tight">Éléphant d'Afrique</p>
            </div>
            <div class="group relative cursor-pointer overflow-hidden rounded-xl shadow-lg"
              data-alt="Un zèbre avec ses rayures noires et blanches distinctives">
              <img alt="Zèbre"
                class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuC313HASL1fI7_JjMth5eRAhAJH9CDFl1HLgQv5bbJV0JA_lDILqEpPu9jYaKWbDdoQ_Kfagx1tO2_BrpdQwfxnxcDeiGOH9qqM_xa4AZE1xqoj1FWjGn9nA5-m_ihGD1HxiDuhEzltybHgCFLie0SE3iG0kVOjkm9SXpZGhEfFOPuGVaxeVq3yUQyl2hVlLanMSVoIGNP3jLNZqbCMLlpsbo2LHbOosGnV3uV6m4Liud8fR6seMFp6PbCsk8XY8qsNL_B0vHjSVRc" />
              <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
              <p class="absolute bottom-4 left-4 text-white text-lg font-bold leading-tight">Zèbre</p>
            </div>
            <div class="group relative cursor-pointer overflow-hidden rounded-xl shadow-lg"
              data-alt="Une tortue géante marchant lentement sur l'herbe">
              <img alt="Tortue Géante"
                class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBCbfXakQkPYNJsso4bGkmK8p_Z_ybDOoDJ10p0RivOH9UX9bjoHKor7OLdONSu2nftpRBnQHJoT7St0ah8tiyxDMveCGSPlX83O4QxU6d6WokCWGBUFxE8hKjHAZWH-Hs0MUcrQoTfCsKRcDWBINubwdJGKdhqUBHWcsVd33aPTEUxJZgPTQG5wNL2qgh_YfGt04ZXOIS4dhKKaCjSqfqQThISZ4WfTmwttsrDHoD0R-SfKPXdjILV6-Ww2ChrlwCaRE4o6MUtPLE" />
              <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
              <p class="absolute bottom-4 left-4 text-white text-lg font-bold leading-tight">Tortue Géante</p>
            </div>
            <div class="group relative cursor-pointer overflow-hidden rounded-xl shadow-lg"
              data-alt="Un gorille au regard pensif dans la forêt">
              <img alt="Gorille"
                class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCgQuUYDPCHDMGv7Bqwzjm3-PXBYsbqI0I452eSRuRE2W2QuO5RGvINYB6MgQCqEKh8YIqSNrnz60-C-_uwDez5kqYnGPh5G8-1XOzmSy61xmmydt1oywy9z5MYA1RcDsk6bMsMjkS_DRabRbg3u4Urd9BaBYMKWy0mRTKBq-PzWRApoOB-RPRglhJr9b4OrIakPs4PdsCvWmmMZcaUTloUiYc_s3Q8nRB0VdFXRdZDz4wo52w2zFrFYSw-qh8ssWjrS8K4joP9fWw" />
              <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
              <p class="absolute bottom-4 left-4 text-white text-lg font-bold leading-tight">Gorille</p>
            </div>
          </div>
        </div>
        <div class="flex items-center justify-center p-4 mt-6">
          <a class="flex size-10 items-center justify-center text-[#0d1b12] dark:text-gray-300 hover:text-primary dark:hover:text-primary"
            href="#">
            <span class="material-symbols-outlined">chevron_left</span>
          </a>
          <a class="text-sm font-bold leading-normal tracking-[0.015em] flex size-10 items-center justify-center text-[#0d1b12] rounded-full bg-primary/30"
            href="#">1</a>
          <a class="text-sm font-normal leading-normal flex size-10 items-center justify-center text-[#0d1b12] dark:text-gray-300 rounded-full hover:bg-primary/20"
            href="#">2</a>
          <a class="text-sm font-normal leading-normal flex size-10 items-center justify-center text-[#0d1b12] dark:text-gray-300 rounded-full hover:bg-primary/20"
            href="#">3</a>
          <a class="text-sm font-normal leading-normal flex size-10 items-center justify-center text-[#0d1b12] dark:text-gray-300 rounded-full hover:bg-primary/20"
            href="#">4</a>
          <a class="flex size-10 items-center justify-center text-[#0d1b12] dark:text-gray-300 hover:text-primary dark:hover:text-primary"
            href="#">
            <span class="material-symbols-outlined">chevron_right</span>
          </a>
        </div>
      </main>
    </div>
  </div>

</body>

</html>