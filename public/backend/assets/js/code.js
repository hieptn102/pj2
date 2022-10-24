$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
                  Swal.fire({
                    title: 'Bạn chắc chắn?',
                    text: "Dữ liệu sẽ bị xóa?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Vâng xóa nó!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Xóa!',
                        'Đã xóa thành công.',
                        'success'
                      )
                    }
                  }) 


    });

  });