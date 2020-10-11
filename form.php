<!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8" />
                <meta name="viewport" content="width=device-width" />
                <title>Form : Prise de contact</title>
		<style>
			label {
				display: inline-block;
				width: 100px;
				text-align: right;
				margin-right: 6px;
			}

			input, textarea, select {
				margin-bottom: 6px;
				vertical-align: top;
				padding: 2px 6px;
			}

			input[type="submit"] {
				margin-left: 110px;
			}
		</style>
        </head>

        <body>
                <form method="post" action="thanks.php">
                        <label for="lastName">Nom :</label> <input required type="text" name="lastName" id="lastName" /><br />
                        <label for="firstName">Prenom :</label> <input required type="text" name="firstName" id="firstName" /><br />
                        <label for="e-mail">E-mail :</label> <input required type="email" name="e-mail" id="e-mail" /><br />
                        <label for="phone">Téléphone :</label> <input required type="tel" name="phone" id="phone" /><br />
                        <label for="topic">Sujet :</label>
                        <select name="topic" id="topic">
				<option>---</option>
                                <option>votre inscription pôle emploi</option>
                                <option>la création de votre compte Bred</option>
                                <option>la demande de renouvellement de titre de séjour</option>
                                <option>demande de renouvellement de la carte d'identité</option>
                        </select><br />
                        <label for="message">Message :</label>
                        <textarea required name="message" id="message"></textarea><br />
                        <input type="submit" value="Envoyer" />
                </form>
        </body>
</html>
