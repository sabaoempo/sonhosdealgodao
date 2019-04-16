<!DOCTYPE html>
<html lang = "utf-8">
    <head>
        <meta charset = "utf-8"/>
        <title>TESTE</title>
    </head>
    <body>
        <center>
            <form method = "POST" name = "formulario" action = "imprimeLucro.php">
                <fieldset id = "data"> <legend>Seleção de data de busca:</legend>
                            <input type = "radio" name = "periodo" id = "umaSemana" value = "Uma Semana"/><label for = "umaSemana">Uma Semana</label><br/>
                            <input type = "radio" name = "periodo" id = "umMes" value = "Um Mês"/><label for = "umMes">Um Mês</label>
                </fieldset>
                <input class = "button" type = "submit" name = "Submit" value = "enviar"> 
            </form>
        </center>
    </body>
</html>
