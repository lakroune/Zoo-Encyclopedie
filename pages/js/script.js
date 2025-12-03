document.getElementById('ajouter-habitat').addEventListener('click', function () {
    document.getElementById('formulaire-habitat-container').classList.remove('hidden');
});
document.getElementById('annuler-habitat').addEventListener('click', function () {
    document.getElementById('formulaire-habitat-container').classList.add('hidden');
    document.getElementById('namehabitat').value = '';
    document.getElementById('descriptionhabitat').value = '';
});
document.getElementById('enregistrer-habitat').addEventListener('click', function () {

    if (document.getElementById('namehabitat').value != '' && document.getElementById('descriptionhabitat').value != '') {
        document.getElementById('formulaire-habitat').submit();
        document.getElementById('formulaire-habitat-container').classList.add('hidden');
        document.getElementById('namehabitat').value = '';
        document.getElementById('descriptionhabitat').value = '';
    }
    else {
        alert('Veuillez remplir tous les champs');
    }
});

 