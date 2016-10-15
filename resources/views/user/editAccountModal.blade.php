<!-- Edit account modal -->
	<div class="modal fade" id="edit-account-modal" tabindex="-1" role="dialog" aria-labelledby="edit-account-modal">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        	<h4 class="modal-title" id="myModalLabel">Edit Account</h4>
		      	</div>
		      	<div class="modal-body">
		        	<div class="row">
		        		<p class="light-color" id="edit-account-error"></p>
						<form id="edit-account-form">
							<div class="row">
								<div class="six columns">
									<label for="edit-account">Account Name</label>
									<input type="text" name="account" id="edit-account" class="u-full-width" placeholder="Account name e.g. Facebook, Twitter etc" required maxlength="40">
									<p class="light-color" id="edit-account-error"></p>
								</div>
								<div class="six columns">
									<label for="edit-email">Email/Username</label>
									<input type="text" name="email" id="edit-email" class="u-full-width" placeholder="Email or username associated with account" required maxlength="40">
									<p class="light-color" id="edit-email-error"></p>
								</div>
							</div>
							<div class="row">
								<div class="six columns">
									<label for="edit-password">Password</label>
									<input type="password" name="password" id="edit-password" class="u-full-width" placeholder="Password to store" required maxlength="20">
									<p class="light-color" id="edit-password-error"></p>
								</div>
								<div class="six columns">
									<label for="edit-website">Website</label>
									<input type="text" name="website" id="edit-website" class="u-full-width" placeholder="Website for account" maxlength="40">
									<p class="light-color" id="edit-website-error"></p>
								</div>
							</div>

							<label for="edit-description">Description</label>
							<textarea name="description" id="edit-description" class="u-full-width" placeholder="Account description" maxlength="160"></textarea>
							<p class="light-color" id="edit-description-error"></p>
							<!-- CSRF Protection -->
							{{ csrf_field() }}
							<input type="hidden" id="edit-id">
							<button type="submit" class="button-primary">Edit Entry</button>
						</form>
		        	</div>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" data-dismiss="modal">Close</button>
		      	</div>
	    	</div>
	  	</div>
	</div>