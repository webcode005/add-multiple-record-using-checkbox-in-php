<?php 

if(isset($_POST['action']))
{
    $data = $_POST;
                                $to = $data["to"];
  
                              $course_id = $data["course_id"];
                      
                              $name = $data["name"];
                              $emp_id = $data["emp_id"];
                              $email = $data["email"];
                              $mobile = $data["mobile"];
                              $department = $data["department"];
                              $status = $data["approve"];
                              $cp_department = $data["cp_department"];

                      
                              $approve = $data['approve'];
  
                              $count=count($approve);
              
                       for($i=0;$i<$count;$i++)
                      
                      {
                              $approve_id =  $data['approve'][$i]; 
                          
                              // for laravel
                              
                              $save = new ExamParticipant;            
                          
                              $save->name = $data["name"][$approve_id]; 
                              $save->emp_id = $data["emp_id"][$approve_id];
                              $save->email = $data["email"][$approve_id];
                              $save->mobile = $data["mobile"][$approve_id];
                              $save->department = $data["department"][$approve_id];
                              $save->cp_department = $data["cp_department"];
                              $save->mail_send_to = json_encode($data["to"]);
                              $save->mail_send_date = date("Y-m-d H:i:s");
                              $save->course_id = $course_id;
                              $save->uploaded_by = $User_Id;
                              
                              $save->save(); 

                              // end laravel

                              // for core php

                              $name = $data["name"][$approve_id]; 
                              $emp_id = $data["emp_id"][$approve_id];
                              $email = $data["email"][$approve_id];
                              $mobile = $data["mobile"][$approve_id];
                              $department = $data["department"][$approve_id];
                              $cp_department = $data["cp_department"];
                              $mail_send_to = json_encode($data["to"]);
                              $mail_send_date = date("Y-m-d H:i:s");
                              $course_id = $course_id;
                              $uploaded_by = $User_Id;

                              $conn->query("insert into table_name ('column_name.....') values ('$valuesname',....)");

                              // end core php
                              
  
                      }
}



?>

<form method="post" action="save-dispatch-all">                                            

<table border="1" style="font-size:13px;text-align:center;" id="table_id">

    <tr>
       <th><input type="checkbox" id="send_all"  value="1" onclick="check_all('send_all','send');" />&nbsp;  Send All</th>
        <th>#</th>
        <th>PO No.</th>
        <th>Invoice Number</th>
        <th>ASC Name</th>
        <th>Courier Name & Docket Number</th>
        <th>Transporter Name & Vehicle Number</th>
        <th>By Hand - Person Name & Contact Number</th>
        <th>Number of cases/boxes</th>
        <th>Comments</th>
        <!--<th colspan="2">Send</th>-->
    </tr>

    <tbody>
    <?php   $srno = 1;
            foreach($invoice_master as $dispatch)
            {
                ?>
                <tr>
                <td>{{$ig++}}</td>
                <td class="name">{{ $user['name']}}</td>
                <td>{{ $user['emp_id']}}</td>
                <td>{{ $user['mobile']}}</td>
                <td>{{ $user['email']}}</td>
                <td>{{ $user['department_process']}}</td>
                <td><input type="checkbox" name="approve[]" value="{{ $user['id']}}"></td>
                <!-- <td><input type="checkbox" name="approve[{{ $user['id']}}]" value="{{ $user['id']}}"></td> -->
            </tr>
            <input type="hidden" value="{{ $user['name']}}" name="name[{{ $user['id']}}]">
            <input type="hidden" value="{{ $user['emp_id']}}" name="emp_id[{{ $user['id']}}]">
            <input type="hidden" value="{{ $user['mobile']}}" name="mobile[{{ $user['id']}}]">
            <input type="hidden" value="{{ $user['email']}}" name="email[{{ $user['id']}}]">
            <input type="hidden" value="{{ $user['id']}}" name="user_id[{{ $user['id']}}]">
            <input type="hidden" value="{{ $user['department_process']}}" name="department[{{ $user['id']}}]">
       <?php  
          }
    ?>
    </tbody>
</table>      

<button type="submit" name="action" value="Send" class="mt-2 btn btn-success">Send</button> 
     <button type="submit" name="action" value="Cancel" class="mt-2 btn btn-danger">Cancel</button>
 </form>    
