// $(function() {
//     $('#search_input').on('input', function(event) {
//         event.preventDefault();

        
//         let search_input = $(this).val();

//         $.ajax({
//             method: "GET",
//             url: "{{ url('users') }}/",
//             data: {search_input:search_input},
//         })
//         .done(function (response) {
//             $('#item_wrapper').empty();
//             $.each(response.data, function (index, user) {
//                 const html = 
//                 '<tr>' +
//                 '<th scope="row">'+ user.id +'</th>' +
//                 '<td>'+ user.name +'</td>' +
//                 '<td>'+ user.surname +'</td>' +
//                 '<td>'+ user.email +'</td>' +
//                 '<td>'+ user.phone_number +'</td>' +
//                 '<td>'+ user.pass_type +'</td>' +
//                 '<td>' +
//                     '<a href="{{ route("users.edit", $user->id) }}">'
//                         '<button class="btn btn-success btn-sm ">'
//                             '<i class="fa-solid fa-pen-to-square"></i>'
//                         '</button>'
//                     '</a>'
//                     '<button class="btn btn-danger btn-sm delete" data-id="{{ $user->id }}">'
//                         '<i class="fa-solid fa-trash-can"></i>'
//                     '</button>'
//                 '</td>'
//             '</tr>'

//                 $('#item_wrapper').append(html);
//             });
//         });
//     });
// });