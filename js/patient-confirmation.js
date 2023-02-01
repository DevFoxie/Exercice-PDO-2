function showConfirmDialog() {
    swal({
      title: "Êtes-vous sûr ?",
      text: "Voulez-vous vraiment créer une nouvelle fiche patient avec les informations fournies ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willCreate) => {
      if (willCreate) {
        swal("La nouvelle fiche patient a été créée avec succès !", {
          icon: "success",
        });
        return true;
      } else {
        swal("La création de la nouvelle fiche patient a été annulée.");
        return false;
      }
    });
  }