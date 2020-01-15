
<html>
<head> 
   <script type = "text/javascript">
   function submitForm() {
      
    var retVal = confirm("Do you really want to submit this form ?");
    if( retVal == true ) {
      return true;
   }
   else {
      document.write ("User does not want to submit this form!");
      return false;
   }
  } 
</script>      
</head>

<body>     
   <form onsubmit="return submitForm()">
      <button type="submit"  class="btn btn-success">submit</button>
   </form>      
</body>
</html>