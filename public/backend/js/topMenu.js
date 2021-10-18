$(document).ready(function () {
    $(document).on('click','#addTopMenuBtn',function () {
        $('#topmenu-id').val('');
        $('#name').val('');
        $('#url').val('');
    });

    //Storing Sub category
    $(document).on('submit','#add-topmenu-form',function (e) {
        e.preventDefault();
        const name = $('#name').val();
        const url = $('#url').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '/admin/setting/topmenu/store',
            data: {
                name: name,
                url: url
            },
            success: (data) => {
                appendTableRow(data);
                $('.closeBtn').click();
                toastr.options = {
                    "timeOut": "2000",
                    "closeButton": true,
                };
                toastr['success']('T Successfully Added!!!');
            },
            error: (error) => {
                console.log(error);
            }
        })

    });
});
var id = '';
var tableRow = '';
$(document).ready(function () {
    $(document).on('click','.editBtn',function (e) {
        id = $(this).attr('data-id');
        tableRow = $(this).parent().parent();
        $.ajax({
            type: 'GET',
            url: `/admin/setting/${id}/topmenu/edit`,
            success: (data) => {
                console.log(data.url);
                $('#edit-name').val(data.name);
                $('#edit-url').val(data.url);
            },
            error: (error) => {
                console.log(error)
            }
        })
    });
});

$(document).ready(function () {
    $(document).on('submit','#edit-topmenu-form',function (e) {
        e.preventDefault();
        const name = $('#edit-name').val();
        const url = $('#edit-url').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'PATCH',
            url: `/admin/setting/${id}/topmenu/update`,
            data: {
                name: name,
                url: url
            },
            success: (data) => {
                let td = $(tableRow).find('td');
                $(td[0]).text(data.name);
                $(td[1]).text(data.url);
                $('.closeBtn').click();
                toastr.options = {
                    "timeOut": "2000",
                    "closeButton": true,
                };
                toastr['success']('Top Menu Successfully Updated!!!');
            },
            error: (error) => {
                console.log(error)
            }

        })
    })
});

//Status update ajax
$(document).ready(function () {
    $(document).on('change','.selectStatus',function () {
        let status = $(this).val();
        let id = $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            url: `/admin/setting/${id}/topmenu/statusUpdate`,
            data: {status: status},
            success: (data) => {
                toastr.options = {
                    "timeOut": "2000",
                    "closeButton": true,
                };
                toastr['success'](data);
            },
            error: (error) => {
                console.log(error);
            }
        })
    });
});

//Delete sub category Ajax
$(document).ready(function () {
    $(document).on('click', '.deleteBtn', function (e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        let tableRow = $(this).parent().parent();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success ml-2',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'DELETE',
                    url: `/admin/setting/${id}/topmenu/delete`,
                    success: (data) => {
                        $(tableRow).remove();
                        swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )

                    },
                    error: (error) => {
                        console.log(error);
                    }

                })


            }
            else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your file is safe :)',
                    'error'
                )
            }

        })
        // if (confirm('Are you sure want to delete this SubCategory!!!')){
        //     $.ajax({
        //         type: 'DELETE',
        //         url: `/admin/subcategory/${id}/delete`,
        //         success: (data) => {
        //             $(tableRow).remove();
        //             toastr.options = {
        //                 "timeOut": "2000",
        //                 "closeButton": true,
        //
        //             };
        //             toastr['error'](data);
        //         },
        //         error: (error) => {
        //             console.log(error);
        //         }
        //     })
        // }
    });

});

function appendTableRow(data) {
    $('tbody').append(`
        <tr>
            <td>${data.name}</td>
            <td>${data.url}</td>
            <td>
                <select name="" data-id="${data.id}" class="selectStatus">
                    <option value="1" selected>Active</option>
                    <option value="0" >Deactive</option>
                </select>
            </td>
            <td>
                <button data-id="${data.id}" data-toggle="modal" data-target="#editTopMenuModal" class="btn btn-primary btn-round mr-1 editBtn" style="cursor: pointer" type="button"><i class="fa fa-edit"></i> Edit</button>
                <button data-id="${data.id}" class="btn btn-danger btn-round deleteBtn" style="cursor: pointer" type="submit"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
    `);
    $(document).ready(function () {
        $('select').niceSelect();
    });
}

