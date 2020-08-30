<? 

top('History');

$_SESSION['loader'] = 0;

?>

  <script>

   function load_history(){
      $.get( 'loader', function( data ) {
         $('#space').append(data);
      })
   }

  </script>

<button onclick="load_history()" > Download </button>

<div id="space"></div>





<? bottom()?>