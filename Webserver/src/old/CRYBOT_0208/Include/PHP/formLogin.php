

<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">

<article>
  <form class="frms">
        <fieldset><legend>Login</legend>
        <fieldset><legend>Grundinformation</legend>
            <input type="text" class="half" text="Vorname"value="Vorname">
            <input type="text" class="half" text="Nachname"value="Nachname">
            Geburtsdatum: <input type="date" name="Geburtsdatum" class = "full"
            value="2000-01-01"
            min="1920-01-01" 
            max="2005-12-31"
            ><br>
        </fieldset>
        <fieldset><legend>Adresse</legend>
            <input type="text"class="half" text="Strasse"value="Strasse">
            <input type="text"class="half" text="Ort"value="Ort">
        </fieldset>
        <fieldset><legend>Account</legend>
            <input type="email"class="half"value="Mailadresse"><br></br></br>
            Passwort: <br>
            <input type="password"class="half"value="password"><br></br></br>
            Passwort wiederholen: <br>
            <input type="password"class="half"value="password">
            <input type="text" class="half" text="secgen"value="code">
          </fieldset>
          <br>
          <input type="submit" class="submit">
        </form>


  </article>
</html>