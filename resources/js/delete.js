$(function(){
    $('.delete').click(function(){
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "DELETE",
                    url: deleteUrl + $(this).data("id") 
                  })
                    .done(function( data ) {
                        window.location.reload()
                    })
                    .fail(function (data){
                        console.error(data)
                        Swal.fire("Oops...", data.responseJSON.message, data.responseJSON.status)
                    })
            }
          });
    })
})