
//ApproveRequest
function approveRequest() {   
    cid=arguments[0];
    Swal.fire({
      title: 'Are you sure?',
      text: "You're going to approve request!",   
      showCancelButton: true,
      confirmButtonColor: "#4CBB17",
      confirmButtonText: 'Yes'
          }
        ).then((result) => {
        if (result['isConfirmed']){      
          $.ajax({
                  url:"approveRequest.php",
                  method:"POST",                 
                  data:{id: cid},
                  enctype: 'multipart/form-data',                                             
                  success:function(data){                                        
                  if(data == 1)
                  {
                      Swal.fire({
                          icon: "success",
                          text: "Request Approved...",
                          type: "success",
                          timer: 2000,
                          showConfirmButton: false
                          })
                  setTimeout(function(){ location.reload(); },100);	 
                  }                      
                  else{
                      Swal.fire({
                          type: "Error!",
                          text:'Try again later...',
                          icon:'error'
                          })
                  }
                  },
                  error:function(exception){
                  console.log('error');
                  console.log(exception);
                  }
               });
          //window.location.href="phpaction/removeAccount.php?id="+x;			
        }
        else{
            console.log("back");
            return false;
        }	
    })		
}

//RejectRequest
function rejectRequest() {   
    cid=arguments[0];
    Swal.fire({
      title: 'Are you sure?',
      text: "You're going to reject request!",   
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: 'Yes'
          }
        ).then((result) => {
        if (result['isConfirmed']){      
          $.ajax({
                  url:"rejectRequest.php",
                  method:"POST",                 
                  data:{id: cid},
                  enctype: 'multipart/form-data',                                             
                  success:function(data){                                        
                  if(data == 1)
                  {
                      Swal.fire({
                          icon: "success",
                          text: "Request Denied...",
                          type: "success",
                          timer: 2000,
                          showConfirmButton: false
                          })
                  setTimeout(function(){ location.reload(); },100);	 
                  }                      
                  else{
                      Swal.fire({
                          type: "Error!",
                          text:'Try again later...',
                          icon:'error'
                          })
                  }
                  },
                  error:function(exception){
                  console.log('error');
                  console.log(exception);
                  }
               });
          //window.location.href="phpaction/removeAccount.php?id="+x;			
        }
        else{
            console.log("back");
            return false;
        }	
    })		
}




    
//ApproveLeave
function approveRequest() {   
    cid=arguments[0];
    Swal.fire({
      title: 'Are you sure?',
      text: "You're going to approve attendance!",   
      showCancelButton: true,
      confirmButtonColor: "#4CBB17",
      confirmButtonText: 'Yes'
          }
        ).then((result) => {
        if (result['isConfirmed']){      
          $.ajax({
                  url:"approveLeave.php",
                  method:"POST",                 
                  data:{id: cid},
                  enctype: 'multipart/form-data',                                             
                  success:function(data){                                        
                  if(data == 1)
                  {
                      Swal.fire({
                          icon: "success",
                          text: "Attendance Approved...",
                          type: "success",
                          timer: 2000,
                          showConfirmButton: false
                          })
                  setTimeout(function(){ location.reload(); },100);	 
                  }                      
                  else{
                      Swal.fire({
                          type: "Error!",
                          text:'Try again later...',
                          icon:'error'
                          })
                  }
                  },
                  error:function(exception){
                  console.log('error');
                  console.log(exception);
                  }
               });
          //window.location.href="phpaction/removeAccount.php?id="+x;			
        }
        else{
            console.log("back");
            return false;
        }	
    })		
}

//RejectLeave
function rejectRequest() {   
    cid=arguments[0];
    Swal.fire({
      title: 'Are you sure?',
      text: "You're going to reject attendance!",   
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: 'Yes'
          }
        ).then((result) => {
        if (result['isConfirmed']){      
          $.ajax({
                  url:"rejectLeave.php",
                  method:"POST",                 
                  data:{id: cid},
                  enctype: 'multipart/form-data',                                             
                  success:function(data){                                        
                  if(data == 1)
                  {
                      Swal.fire({
                          icon: "success",
                          text: "Attendance Denied...",
                          type: "success",
                          timer: 2000,
                          showConfirmButton: false
                          })
                  setTimeout(function(){ location.reload(); },100);	 
                  }                      
                  else{
                      Swal.fire({
                          type: "Error!",
                          text:'Try again later...',
                          icon:'error'
                          })
                  }
                  },
                  error:function(exception){
                  console.log('error');
                  console.log(exception);
                  }
               });
          //window.location.href="phpaction/removeAccount.php?id="+x;			
        }
        else{
            console.log("back");
            return false;
        }	
    })		
}


// ShowProject
function editProject(){
    var id=arguments[0];
    // alert(id);
    $.ajax({
        method: "POST",        
        url: "showProject.php",
        data: {p_id:id}, // serializes the form's elements.        
        success: function(result){
            var data = jQuery.parseJSON(result);            
            $('#modalForEditProject').modal('show');
            $('#edit_date1').val(data.date1);                           
            $('#edit_p_id').val(id);                                    
        }
    });
}


//EditProject
$("#editProjectFrm").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    // alert("1");
    let myform = document.getElementById("editProjectFrm");
    let fd = new FormData(myform );
    $.ajax({
        method: "POST",
        dataType:"json",
        url: "editProject.php",
        data: fd, // serializes the form's elements.
        processData: false,
        contentType: false,
        success: function(data)
        {
            if(data == 1){
                Swal.fire({
                    icon: "success",
                    text: "Project updated...",
                    type: "success",
                    timer: 2000,
                    showConfirmButton: false
                  })                
                setTimeout(function(){ location.reload(); },1000);	 
            }
            else if(data == 2){                
                Swal.fire({
                    type: "Error!",
                text:'Redundant...',
                icon:'error'
                })
            }
            else{
                Swal.fire({
                    type: "Error!",
                text:'Try again later...',
                icon:'error'
                })
            }
        }
    });   
});


// ShowPayslip
function editPayslip(){
    var id=arguments[0];
    // alert(id);
    $.ajax({
        method: "POST",        
        url: "showPayslip.php",
        data: {e_id:id}, // serializes the form's elements.        
        success: function(result){
            var data = jQuery.parseJSON(result);            
            $('#modalForEditPayslip').modal('show');
            $('#edit_name').val(data.name);  
            $('#edit_supervisor').val(data.supervisor);
            $('#edit_designation').val(data.designation);
            $('#edit_salary').val(data.salary);                         
            $('#edit_e_id').val(id);                                    
        }
    });
}


//EditPayslip
$("#editPayslipFrm").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    // alert("1");
    let myform = document.getElementById("editPayslipFrm");
    let fd = new FormData(myform );
    $.ajax({
        method: "POST",
        dataType:"json",
        url: "editPayslip.php",
        data: fd, // serializes the form's elements.
        processData: false,
        contentType: false,
        success: function(data)
        {
            if(data == 1){
                Swal.fire({
                    icon: "success",
                    text: "PaySlip updated...",
                    type: "success",
                    timer: 2000,
                    showConfirmButton: false
                  })                
                setTimeout(function(){ location.reload(); },1000);	 
            }
            else if(data == 2){                
                Swal.fire({
                    type: "Error!",
                text:'Redundant...',
                icon:'error'
                })
            }
            else{
                Swal.fire({
                    type: "Error!",
                text:'Try again later...',
                icon:'error'
                })
            }
        }
    });   
});


