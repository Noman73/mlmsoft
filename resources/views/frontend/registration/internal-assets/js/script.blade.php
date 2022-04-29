<script>
  //   var datatable;
  //   $(document).ready(function(){
  //       datatable= $('#datatable').DataTable({
  //       processing:true,
  //       serverSide:true,
  //       responsive:true,
  //       ajax:{
  //         url:"{{route('customer.index')}}"
  //       },
  //       columns:[
  //         {
  //           data:'DT_RowIndex',
  //           name:'DT_RowIndex',
  //           orderable:false,
  //           searchable:false
  //         },
  //         {
  //           data:'name',
  //           name:'name',
  //         },
  //         {
  //           data:'adress',
  //           name:'adress',
  //         },
  //         {
  //           data:'phone',
  //           name:'phone',
  //         },
  //         {
  //           data:'action',
  //           name:'action',
  //         }
  //       ]
  //   });
  // })
    

window.formRequest= function(){
    $('input,select').removeClass('is-invalid');
    let name=$('#name').val();
    let email=$('#email').val();
    let city=$('#city').val();
    let post_code=$('#post_code').val();
    let adress=$('#adress').val();
    let phone=$('#phone').val();
    let nid=$('#nid').val();
    let dateofbirth=$('#dateofbirth').val();
    let refference=$('#refference').val();
    let uplink=$('#uplink').val();
    let position=$('#position').val();
    let password=$('#password').val();
    let password_confirmation=$('#confirm_password').val();
    let image=document.getElementById('file').files;
    let id=$('#id').val();
    let formData= new FormData();
    formData.append('name',name);
    formData.append('email',email);
    formData.append('city',city);
    formData.append('post_code',post_code);
    formData.append('adress',adress);
    formData.append('phone',phone);
    formData.append('nid',nid);
    formData.append('refference',refference);
    formData.append('uplink',uplink);
    formData.append('position',position);
    formData.append('dateofbirth',dateofbirth);
    formData.append('password',password);
    formData.append('password_confirmation',password_confirmation);
    if(image[0]!=null){
      formData.append('image',image[0]);
    }
    $('#exampleModalLabel').text('Edit Customer');
    if(id!=''){
      formData.append('_method','PUT');
    }
    //axios post request
    if (id==''){
         axios.post("{{route('registration.store')}}",formData)
        .then(function (response){
            if(response.data.message){
                toastr.success(response.data.message)
                // datatable.ajax.reload();
                Clear();
                $('#modal').modal('hide');

                $('#message').text(response.data.response);
            }else if(response.data.error){
              var keys=Object.keys(response.data.error);
              keys.forEach(function(d){
                $('#'+d).addClass('is-invalid');
                $('#'+d+'_msg').text(response.data.error[d][0]);
              })
            }
        })
    }else{
      axios.post("{{URL::to('/registration')}}/"+id,formData)
        .then(function (response){
          if(response.data.message){
              toastr.success(response.data.message);
              datatable.ajax.reload();
              Clear();
          }else if(response.data.error){
              var keys=Object.keys(response.data.error);
              keys.forEach(function(d){
                $('#'+d).addClass('is-invalid')
                $('#'+d+'_msg').text(response.data.error[d][0]);
              })
            }
        })
    }
}
$(document).on("click","#modalBtn",  function(event){
    console.log('fire')
    Clear();
    $('#exampleModalLabel').text('Add New Customer');
    $('.password').removeClass('d-none')
});

    function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            document.getElementById('imagex').setAttribute('src', e.target.result)
          };
          reader.readAsDataURL(input.files[0]);
      }
    }
$(document).delegate(".editRow", "click", function(){
    Clear()
    $('.password').addClass('d-none')
    $('#exampleModalLabel').text('Edit Customer');
    let route=$(this).data('url');
    axios.get(route)
    .then((data)=>{
      var editKeys=Object.keys(data.data);
      editKeys.forEach(function(key){
        if(key=='name'){
          $('#'+'name').val(data.data[key]);
        }
         $('#'+key).val(data.data[key]);
         $('#modal').modal('show');
         $('#id').val(data.data.id);
      })
    })
});
$(document).delegate(".deleteRow", "click", function(){
    let route=$(this).data('url');
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value==true) {
        axios.delete(route)
        .then((data)=>{
          if(data.data.message){
            toastr.success(data.data.message);
            datatable.ajax.reload();
          }else if(data.data.warning){
            toastr.error(data.data.warning);
          }
        })
      }
    })
});

$('#dateofbirth').daterangepicker({
        showDropdowns: true,
        singleDatePicker: true,
        // parentEl: ".bd-example-modal-lg .modal-body",
        locale: {
            format: 'DD-MM-YYYY',
        }
  });

function Clear(){
  $("input").removeClass('is-invalid').val('');
  $(".invalid-feedback").text('');
  $('input').val('');
  $("select[name='status']").val('');
  $("select[name='role']").text('Select').trigger('change');
}
$("#refference").select2({
    theme:'bootstrap4',
    placeholder:'Select',
    allowClear:true,
    ajax:{
      url:"{{URL::to('/get-refferal')}}",
      type:'post',
      dataType:'json',
      delay:20,
      data:function(params){
        return {
          searchTerm:params.term,
          _token:"{{csrf_token()}}",
          }
      },
      processResults:function(response){
        
        return {
          results:response,
        }
      },
      cache:true,
    }
  })
  $("#uplink").select2({
    theme:'bootstrap4',
    placeholder:'Select',
    allowClear:true,
    ajax:{
      url:"{{URL::to('/get-refferal')}}",
      type:'post',
      dataType:'json',
      delay:20,
      data:function(params){
        return {
          searchTerm:params.term,
          _token:"{{csrf_token()}}",
          }
      },
      processResults:function(response){
        
        return {
          results:response,
        }
      },
      cache:true,
    }
  })

</script>
