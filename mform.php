<html>
<head>
<script>
    submitform = function(){
    //alert("saa");
document.getElementById("form1").submit();
document.getElementById("form2").submit();

var name = document.getElementById('name').value;
var job = document.getElementById('job').value;
console.log(name);
console.log(job);
}
</script></head>
<body>
  
<form id="form1" action="" method="post" >
     <fieldset>
     <legend>test</legend>
     <label>name*<small></small></label><input autocomplete="off" type="text" name="name" required="required" id='name'/>                               
     </fieldset>
     </form>
     <form id="form2" action="" method="post" >
     <fieldset>
     <legend>job</legend>
     <label>job *<small></small></label><input autocomplete="off" type="text" name="job" required="required" id='job'/>
    
     </fieldset>
     </form>
                            
                                  
<button class="button button-gray" onclick="submitform()"><span class="accept"></span></button>




</body>
</html>