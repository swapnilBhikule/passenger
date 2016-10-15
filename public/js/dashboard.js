	$(document).ready(function() {
		$("#new-entry-form").submit(function(e) {
			e.preventDefault();
			var account 	= $("#account").val();
			var email 		= $("#email").val();
			var password 	= $("#password").val();
			var website  	= $("#website").val();
			var description = $("#description").val();

			// Validate data
			if( ! validate(account, 1, 20) )
			{
				$("#account-error").html("The account name must be between 1 and 20 characters long.");
				return;
			}
			if( ! validate(email, 5, 40) )
			{
				$("#email-error").html("The email must be between 5 and 40 characters long.");
				return;
			}
			if( ! validate(password, 1, 20) )
			{
				$("#password-error").html("The password must be between 1 and 20 characters long.");
				return;
			}
			if( ! validate(website, 0, 40) )
			{
				$("#website-error").html("The website may not be greater than 40 characters long.");
				return;
			}
			if( ! validate(description, 0, 160) )
			{
				$("#description-error").html("The description may not be greater than 160 characters long.");
				return;
			}

			$.post(
				"//passenger.dev/post-add-account",
				{
					account: account,
					email: email,
					password: password,
					website: website,
					description: description
				},
				function(data) {
					if( data ) {
						// get table tag
						var table 	= document.getElementById("vault-table");;
						var row 	= table.insertRow(1);

						row.id 		= "row-" + data;

						var cell1 	= row.insertCell(0);
						var cell2 	= row.insertCell(1);
						var cell3 	= row.insertCell(2);
						var cell4 	= row.insertCell(3);
						var cell5 	= row.insertCell(4);
						var cell6 	= row.insertCell(5);

						cell1.id 	= "account-" + data;
						cell2.id 	= "email-" + data;
						cell3.id 	= "password-" + data;
						cell5.id 	= "description-" + data;

						cell1.innerHTML = account;
						cell2.innerHTML = email;
						cell3.innerHTML = password;
						cell4.innerHTML = '<a href="http://'+ website +'" id="website-'+ data +'">' + website + '</a>';
						cell5.innerHTML = description;
						cell6.innerHTML = '<button type="button" class="round-button delete-link" id="delete-'+ data +'">' +
										  '&#10005;' +
										  '</button> ' +
										  '<button type="button" class="round-button edit-link" id="edit-'+ data +'">' +
										  '&#9998;' +
										  '</button>';

						$("#account").val('');
						$("#email").val('');
						$("#password").val('');
						$("#website").val('');
						$("#description").val('');

						$('#new-account-modal').modal('hide');
					}
					else {
						$("#account-error").html('Something went wrong while adding new account.');
					}
				}
			);
		});

		$(document).on("click", ".delete-link", function() {
			var button_id = $(this).attr('id');
			var id 		  = button_id.substring(7, 20);
			var row 	  = document.getElementById('row-' + id);

			$.post(
				"//passenger.dev/post-delete-account",
				{ id: id },
				function(flag) {
					if(flag) {
						row.parentNode.removeChild(row);
					}
					else {
						// error info
					}
				}
			);
		});

		$(document).on("click", ".edit-link", function() {
			var button_id = $(this).attr('id');
			var id 		  = button_id.substring(5, 20);
			var row 	  = document.getElementById('row-' + id);

			console.log("button: " + button_id);

			var account_name = $("#account-" + id).html().trim();
			var email 		 = $("#email-" + id).html().trim();
			var password 	 = $("#password-" + id).html().trim();
			var website 	 = $("#website-" + id).html().trim();
			var description  = $("#description-" + id).html().trim();

			$("#edit-id").val(id);
			$("#edit-account").val(account_name);
			$("#edit-email").val(email);
			$("#edit-password").val(password);
			$("#edit-website").val(website);
			$("#edit-description").val(description);

			$('#edit-account-modal').modal('show');
		});

		$("#edit-account-form").submit(function(e) {
			e.preventDefault();

			var id 				= $("#edit-id").val();
			var account 		= $("#edit-account").val();
			var email 			= $("#edit-email").val();
			var password 		= $("#edit-password").val();
			var website 		= $("#edit-website").val();
			var description 	= $("#edit-description").val();

			// Validate data
			if( ! validate(id, 1, 20) )
			{
				return;
			}
			if( ! validate(account, 1, 20) )
			{
				$("#edit-account-error").html("The account name must be between 1 and 20 characters long.");
				return;
			}
			if( ! validate(email, 5, 40) )
			{
				$("#edit-email-error").html("The email must be between 5 and 40 characters long.");
				return;
			}
			if( ! validate(password, 1, 20) )
			{
				$("#edit-password-error").html("The password must be between 1 and 20 characters long.");
				return;
			}
			if( ! validate(website, 0, 40) )
			{
				$("#edit-website-error").html("The website may not be greater than 40 characters long.");
				return;
			}
			if( ! validate(description, 0, 160) )
			{
				$("#edit-description-error").html("The description may not be greater than 160 characters long.");
				return;
			}

			$.post(
				"//passenger.dev/post-edit-account",
				{ id: id, account: account, email: email, password: password, website: website, description: description },
				function(flag) {
					if(flag) {
						$("#account-" + id).html(account);
						$("#email-" + id).html(email);
						$("#password-" + id).html(password);
						$("#website-" + id).html(website);
						$("#description-" + id).html(description);

						$('#edit-account-modal').modal('hide');
					}
					else {
						$("#edit-account-error").html('Something went wrong while editing account.');
					}
				}
			);
		});

		function validate(string, min, max)
		{
			if( string.trim().length < min || string.trim().length > max )
			{
				return false;
			}

			return true;
		}
	});