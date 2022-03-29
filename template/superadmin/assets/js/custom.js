function changestatus(ids, status, urls, table, field, idField=''){
        
    var idField = (idField!='') ? idField : '';
    swal({
        title: "Are you sure you want to change the status?",
        // text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
           var formData = {
                'ids': ids,
                'status': status,
                'table': table,
                'field': field,
                'idField': idField,
            };
            $.ajax({
                type: 'POST',
                url: urls,
                dataType: 'json',
                async: false,
                data: formData,
                success: function(data) {
                    console.log(data)
                    if(data.isSuccess == true){
                        refreshPge();   
                    }else if(data.isSuccess == false && data.error == 'error' && data.message != ''){
                      swal(data.message);
                    }else{
                      swal("Server error, please try again !");
                    }
                },
            });
        } 
    });
}
function refreshPge() {
    window.location.href = window.location.href;
}
