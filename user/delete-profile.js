document.getElementById("deleteAccountBtn").addEventListener("click", function() {
    Swal.fire({
      title: 'Are you sure?',
      text: 'This action cannot be undone!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Delete',
      cancelButtonText: 'Cancel',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        deleteAccount();
      }
    });
  });

  function deleteAccount() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "delete-profile.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          var response = xhr.responseText;
          if (response === "success") {
            Swal.fire('Deleted!', 'Your account has been deleted.', 'success').then(() => {
              location.reload();
            });
          } else {
            Swal.fire('Error', 'An error occurred while deleting your account.', 'error');
          }
        } else {
          Swal.fire('Error', 'An error occurred while deleting your account.', 'error');
        }
      }
    };
    xhr.send();
  }