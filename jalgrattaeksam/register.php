<h1>Registreerimine</h1>
<div>
  <form method="post" action="?">
    <label for="fname">Eesnimi</label>
    <input type="text" id="fname" name="firstName" placeholder="Your name.." required>

    <label for="lname">Perekonnanimi</label>
    <input type="text" id="lname" name="lastName" placeholder="Your last name.." required>

    <label for="country">Country</label>
    <select id="country" name="country">
      <option>Vali Riik</option>
      <option value="estonia">Estonia</option>
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>
  
    <input type="submit" name="register" value="Salvesta">
  </form>
</div>