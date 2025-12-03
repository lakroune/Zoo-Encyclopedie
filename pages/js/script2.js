document.getElementById('ajouter-animal').addEventListener('click', function () {
    document.getElementById('formulaire-animal-container').classList.remove('hidden');
});
document.getElementById('annuler-animal').addEventListener('click', function () {
    document.getElementById('formulaire-animal-container').classList.add('hidden');
    document.getElementById('nameanimal').value = '';
    document.getElementById('descriptionanimal').value = '';
});
document.getElementById('enregistrer-animal').addEventListener('click', function () {
    if (document.getElementById('nameanimal').value != '' && document.getElementById('descriptionanimal').value != '') {
        document.getElementById('formulaire-animal').submit();
        document.getElementById('formulaire-animal-container').classList.add('hidden');
        document.getElementById('nameanimal').value = '';
        document.getElementById('descriptionanimal').value = '';
    }
    else {
        alert('Veuillez remplir tous les champs');
    }
});

 