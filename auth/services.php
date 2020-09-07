<? 


top('Services');
?>

  <h1>Services</h1>


  <p></p>


<table style="margin-bottom: 100px;">

<tr>
<td>Service One</td>
<td>Service Two</td>
<td>Service Three</td>
</tr>

<tr>
<td>Price: <?=calc_promo(1)?>$</td>
<td>Price: <?=calc_promo(2)?>$</td>
<td>Price: <?=calc_promo(3)?>$</td>
</tr>

<tr>

<td>
<input type="hidden" value="1" id="sid1">
<button onclick="post_query('buy', 'services', 'sid1')">Buy</button>
</td>
<td>
<input type="hidden" value="2" id="sid2">
<button onclick="post_query('buy', 'services', 'sid2')">Buy</button>
</td>
<td>
<input type="hidden" value="3" id="sid3">
<button onclick="post_query('buy', 'services', 'sid3')">Buy</button>
</td>

</tr>

</table>


  <h1>Get promo</h1>

  <p><input id="code" type="text" placeholder="Promo"></p>
  <p><button onclick="post_query('buy', 'promo', 'code')">Send</button></p>


<? bottom()?>