<!-- Add account modal -->
	<div class="modal fade" id="new-account-modal" tabindex="-1" role="dialog" aria-labelledby="new-account-modal">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        	<h4 class="modal-title" id="myModalLabel">Add new entry</h4>
		      	</div>
		      	<div class="modal-body">
		        	<div class="row">
		        		<p class="light-color" id="account-error"></p>
						<form id="new-entry-form">
							<div class="row">
								<div class="six columns">
									<label for="account">Account Name</label>
									<input type="text" name="account" id="account" class="u-full-width" placeholder="Account name e.g. Facebook, Twitter etc" required maxlength="40">
									<p class="light-color" id="account-error"></p>
								</div>
								<div class="six columns">
									<label for="email">Email/Username</label>
									<input type="text" name="email" id="email" class="u-full-width" placeholder="Email or username associated with account" required maxlength="40">
									<p class="light-color" id="email-error"></p>
								</div>
							</div>
							<div class="row">
								<div class="six columns">
									<label for="password">Password</label>
									<input type="password" name="password" id="password" class="u-full-width" placeholder="Password to store" required maxlength="20">
									<p class="light-color" id="password-error"></p>
								</div>
								<div class="six columns">
									<label for="website">Website</label>
									<input type="text" name="website" id="website" class="u-full-width" placeholder="Website for account" maxlength="40">
									<p class="light-color" id="website-error"></p>
								</div>
							</div>

							<label for="description">Description</label>
							<textarea name="description" id="description" class="u-full-width" placeholder="Account description" maxlength="160"></textarea>
							<p class="light-color" id="description-error"></p>
							<!-- CSRF Protection -->
							{{ csrf_field() }}
							<button type="submit" class="button-primary">Add Entry</button>
						</form>
		        	</div>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" data-dismiss="modal">Close</button>
		      	</div>
	    	</div>
	  	</div>
	</div>