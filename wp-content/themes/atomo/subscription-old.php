<?php
/**
 * Template Name: Subscription-old
 *
 * @package WordPress
 * @subpackage Atomo
 */

get_header(); ?>


<div class="container flex vertical align-center">
	<section class="issues flex-center vertical">
		<h2>Suscríbete</h2>
	</section>

	<form id="subscription-form" action="https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST">

		<input type=hidden name="oid" value="00D41000002IC5q">
		<input type=hidden name="retURL" value="http://www.fppchile.org">

		<!-- ---------------------------------------------------------------------- -->

		<!-- NOTA: Estos campos son elementos de depuraciÃ³n opcionales. Elimine -->

		<!-- los comentarios de estas lÃ­neas si desea realizar una prueba en el -->

		<!-- modo de depuraciÃ³n. -->

		<input type="hidden" name="debug" value=1>

		<!-- <input type="hidden" name="debugEmail" value="contacto@fppchile.org"> -->

		<!-- ---------------------------------------------------------------------- -->



		<div class="form-group">

			<input id="first_name" name="first_name" autofocus type="text" size="40" type="text"  class="form-control" placeholder="Nombres ..." aria-label="Nombres..." aria-describedby="basic-addon" onblur="setFocusToTextBox(this.name,3)" /></p>

		</div>

		<div class="form-group">

			<input id="last_name" name="last_name" size="40" type="text"  class="form-control" placeholder="Apellidos..." aria-label="Apellidos..." aria-describedby="basic-addon" onblur="setFocusToTextBox(this.name,3)" /></p>

		</div>

		<div class="form-group">

			<span class="dateInput dateOnlyInput"><input id="00N1M00000EuKGB" name="00N1M00000EuKGB" size="40" type="text" class="form-control" placeholder="Fec Nacimiento dd-mm-AAAA ..." aria-label="Fec. Nacimiento dd-mm-AAAA..." aria-describedby="basic-addon" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" onkeyup="formatDate(this.name)" onblur="setFocusToTextBox(this.name,10)"/></span></p>

		</div>

		<div class="form-group">

			<input id="email" name="email" size="40" type="text" class="form-control" placeholder="Correo ElectrÃ³nico ..." aria-label="Correo ElectrÃ³nico..." aria-describedby="basic-addon" onblur="validateEmail(this.name)" /></p>

		</div>

		<div class="form-group">

			<input id="phone" maxlength="40" name="phone" size="40" type="text" class="form-control" placeholder="TelÃ©fono de Contacto ..." aria-label="Telefono de contacto..." aria-describedby="basic-addon" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" onblur="setFocusToTextBox(this.name,7)" /></p>

		</div>

		<div class="form-group">

			<input id="00N1M00000EuKGG" name="00N1M00000EuKGG" type="text" wrap="soft" class="form-control" placeholder="Direccion (Calle, Numero, Dpto/Casa)..." aria-label="Direcccion..." aria-describedby="basic-addon" onblur="setFocusToTextBox(this.name,7)" ></textarea></p>

		</div>



		<div class="form-group">

			<input id="city" maxlength="40" name="city" size="40" type="text"class="form-control" placeholder="Comuna ..." aria-label="Comuna..." aria-describedby="basic-addon" onblur="setFocusToTextBox(this.name,4)" /></p>

		</div>

		<div class="form-group">

			<input id="state" maxlength="20" name="state" size="40" type="text" class="form-control" placeholder="Region/Estado ..." aria-label="Region/Estado..." aria-describedby="basic-addon" onblur="setFocusToTextBox(this.name,7)"  /></p>

		</div>

		<div class="form-group">

			<input id="00N1M00000EuKGL" maxlength="50" name="00N1M00000EuKGL" size="40" type="text" class="form-control" placeholder="Carrera ..." aria-label="Carrera..." aria-describedby="basic-addon"/></p>

		</div>

		<div class="form-group">

			<input id="00N1M00000EuKGQ" maxlength="100" name="00N1M00000EuKGQ" size="40" type="text" class="form-control" placeholder="Lugar de Estudios ..." aria-label="Lugar de Estudios..." aria-describedby="basic-addon"/></p>

		</div>

		<!--utm_source--><input type="hidden"  id="00N1M00000EuKGV" maxlength="150" name="00N1M00000EuKGV" size="40" type="text" /></p>

		<!--utm_medium--><input type="hidden" id="00N1M00000EuKkz" maxlength="150" name="00N1M00000EuKkz" size="40" type="text" /></p>

		<!--utm_campaign--><input type="hidden" id="00N1M00000EuKl4" maxlength="150" name="00N1M00000EuKl4" size="40" type="text" />

		<!--utm_term--><input type="hidden"  id="00N1M00000EuKlE" maxlength="150" name="00N1M00000EuKlE" size="40" type="text" />

		<!--utm_content--><button class="btn btn-secondary" type="submit" id="boton" disabled="true">Enviar</button-->

	</form>
</div>


<?php get_footer(); ?>
