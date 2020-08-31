<? 

top('History');

$_SESSION['loader'] = 0;

?>

<script type="text/javascript">

   
   function load_history(){
      $.get( '/loader', function( data ) {

         if( data == 'empty' ) 
            $('#space').text( 'history empty!' );
         
         else if( data != 'end' ) 
            $('#space').append( data );
            
      }
      );
   };

   document.addEventListener('DOMContentLoaded', function(){ 
      load_history();
   });


</script>

<button onclick="load_history()" > Download </button>

<div id="space"></div>





<? bottom()?>