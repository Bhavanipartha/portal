
/* ----------------- PROJECT FUNCTIONS ------------------ */

// Show Project
function editProject(p_id) {
  console.log("🛠 editProject() called with p_id:", p_id);

  $.ajax({
    type: "POST",
    url: "showProject.php",
    data: { p_id },
    dataType: "json",
    beforeSend: function () {
      console.log("📤 Sending request to showProject.php with data:", { p_id });
    },
    success: function (data) {
      console.log("✅ AJAX success. Raw data received:", data);

      if (!data || !data.p_id) {
        console.error("❌ No record found / invalid JSON:", data);
        return;
      }

      $('#edit_prj_name').val(data.prj_name);
      $('#edit_s_date').val(data.s_date);
      $('#edit_e_date').val(data.e_date);
      $('#edit_name').val(data.name);
      $('#edit_p_id').val(data.p_id);

      const el = document.getElementById('modalForEditProject');
    var myModal = new bootstrap.Modal(document.getElementById('modalForEditProject'));
myModal.show();

    },
    error: function (xhr) {
      console.error("🚨 AJAX error:", xhr.status, xhr.responseText);
    }
  });
}

// Edit Project Submit
// Edit Project Submit
$("#editProjectFrm").submit(function(e) {
  e.preventDefault();

  // Copy the value of disabled select to hidden input
  $('#edit_prj_name_hidden').val($('#edit_prj_name').val());

  let fd = new FormData(this);

  $.ajax({
    url: "editProject.php",
    method: "POST",
    data: fd,
    processData: false,
    contentType: false,
    dataType: "json",
    success: function (data) {
      console.log("✅ Parsed JSON:", data);
      if (data == 1) {
        Swal.fire({
          icon: "success",
          text: "Project updated successfully!",
          timer: 2000,
          showConfirmButton: false
        });
        setTimeout(() => location.reload(), 1000);
      } else if (data == 2) {
        Swal.fire({ icon: "error", text: "Duplicate end date found!" });
      } else {
        Swal.fire({ icon: "error", text: "Update failed!" });
      }
    },
    error: function (xhr) {
      console.error("❌ Response text:", xhr.responseText);
    }
  });
});


// Delete Project
function deleteProject(p_id) {
  Swal.fire({
    title: 'Are you sure?',
    text: "This will permanently delete the project!",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "deleteProject.php",
        method: "POST",
        data: { p_id },
        success: function(data) {
          if (data == 1) {
            Swal.fire({
              icon: "success",
              text: "Project deleted...",
              timer: 2000,
              showConfirmButton: false
            });
            setTimeout(() => location.reload(), 1000);
          } else {
            Swal.fire({ icon: "error", text: 'Try again later...' });
          }
        },
        error: function(exception) {
          console.log('Error:', exception);
        }
      });
    }
  });
}



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


