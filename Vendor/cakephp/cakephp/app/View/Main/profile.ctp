<?php
    echo $this->Html->css('profile');
	echo $this->fetch('css');

?>

<?=$this->Flash->render();?>

<div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 mx-auto container">
	<div class="profile col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 my-auto text-center">
		<button name="sortA-Z" data-sort="aplhaAsc" data-function="sort" onclick="sortAplhabeticAsc()" class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 sortButton">A-Z</button>
		<button name="sortZ-A" data-sort="aplhaDesc" data-function="sort" onclick="sortAplhabeticDesc()" class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 sortButton">Z-A</button>
		<button name="sort1970-2000" data-sort="dateAsc" data-function="sort" onclick="sortDateAsc()" class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 sortButton">Date asc</button>
		<button name="sort2000-1970" data-sort="dateDesc" data-function="sort" onclick="sortDateDesc()" class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 sortButton">Date desc</button>
		<button name="sortFAV" data-sort="fav" data-function="sort" onclick="sortFav()" class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 sortButton">Favourite</button>
		<button class="addContact btn btn-light btn-lg btn-block mx-auto" data-function="add-contact">Add
			Contact</button>
		<div class="login"><?=$name?></div>
		<div class="contactsNumber">Number of contact: <?=$totalContacts?></div>
		<div class="settings">
			<a href="change-password" class="change-name">Change password</a><br />
		</div>
	</div>

	<div class="searchBar">
	<?php

		echo $this->Form->create(false, array('type' => 'get', 'default' => false));
		echo $this->Form->input('query', array('type' => 'text','id' => 'query', 'name' => 'query', 'label' => false, 'placeholder' => 'Search contact'));

	?>
	</div>
	
	<div class="contacts col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9">
		<div class="searchedContacts" id="searchedContacts"></div>
		<?php

            for($i = 0; $i < count($contacts); $i++) { 
                ?>
		<div class='row text-right' data-function='openContact'>
			<div class='col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12 text-left contact' data-function='created-date' data-timestamp='<?=strtotime($contacts[$i]['Contact']['created'])?>'>
				<i class='fas fa-sort-up arrow my-auto' id='arrow<?=$i?>'></i>
				<?php
                        echo "<span class='contactName'>".$contacts[$i]['Contact']['name']."</span> <span class='number'>- <a href='skype:".$contacts[$i]['Contact']['number']."?call'>".$contacts[$i]['Contact']['number']."</a></span><span class='createdDate' id='contact$i'>".strtotime($contacts[$i]['Contact']['created'])."</span>";
                        echo $this->Form->create('EditContact', array('url' => '/edit-contact', 'type' => 'post', 'class' => 'editContactForm'));
                        echo $this->Form->input("name", array('placeholder' => 'Edit Name And Surname', 'class' => 'nameInput input-field', 'label' => 'Name', 'value' => $contacts[$i]['Contact']['name']));
                        echo $this->Form->input("number", array('placeholder' => 'Edit Phone Number', 'class' => 'phoneNumber input-field', 'label' => 'Number', 'value' => $contacts[$i]['Contact']['number']));
                        echo $this->Form->input("secondNumber", array('placeholder' => 'Edit Second Phone Number', 'class' => 'secondPhoneNumber input-field', 'label' => 'Second Number', 'value' => $contacts[$i]['Contact']['secondNumber']));
                        echo $this->Form->input("address", array('placeholder' => 'Edit Address', 'class' => 'addressInput input-field', 'label' => 'Address', 'value' => $contacts[$i]['Contact']['address']));
                        echo $this->Form->input("company", array('placeholder' => 'Edit Company', 'class' => 'companyInput input-field', 'label' => 'Company', 'value' => $contacts[$i]['Contact']['company']));
                        echo $this->Form->input('contactId', array('value' => $contacts[$i]['Contact']['id'], 'type' => 'hidden'));
                        echo $this->Form->end("Save", array('div' => false, 'class' => 'submitBtn'));?>

			</div>
			<div class='icons col-xl-2 col-lg-2 col-md-2 col-sm-3 col-3'>
				<i data-function='favourite-contact'
					class='fas fa-star <?php if($contacts[$i]['Contact']['isFavourite']) echo "isFavourite";?>'
					id='<?= $contacts[$i]['Contact']['id'] ?>'></i>
				<i data-function='remove-contact' class='fas fa-trash' id='<?=$contacts[$i]['Contact']['id']?>'></i>
			</div>
		</div>
			<?php
				}
			?>

		<div class="paginationLinks">
				<?php 

				echo $this->Paginator->prev(
					'<< ' . __(''),
					array(),
					null,
					array('class' => 'prev disabled')
				);
				  
				echo $this->Paginator->numbers(array('first' => 'First page'));

				echo $this->Paginator->next(
					' >>' . __(''),
					array(),
					null,
					array('class' => 'next disabled')
				);
				
				?>
		</div>
		
	</div>

	<div class="modalDiv">
		<span data-function="close-modal" class="closeModal">X</span>
		<?php

        echo $this->Form->create('AddContact', array('url' => '/add-contact', 'type' => 'post', 'class' => 'addContactModal'));
        echo $this->Form->input("name", array('placeholder' => 'Name And Surname', 'class' => 'nameInput', 'label' => ''));
        echo $this->Form->input("number", array('placeholder' => 'Phone Number', 'class' => 'phoneNumber', 'label' => '', 'minlength' => '7'));
        echo $this->Form->input("secondNumber", array('placeholder' => 'Second Phone Number', 'class' => 'secondPhoneNumber', 'label' => ''));
        echo $this->Form->input("address", array('placeholder' => 'Address', 'class' => 'addressInput', 'label' => ''));
        echo $this->Form->input("company", array('placeholder' => 'Company', 'class' => 'companyInput', 'label' => ''));

        echo $this->Form->end('Add Contact', array('div' => false));
        ?>
	</div>

</div>



<script>
	function sortAplhabeticAsc() {
        var contacts = $(".contacts");
		$.ajax({
			url: 'http://localhost/Phonebook/Vendor/cakephp/cakephp/sortAplhaAsc',
			dataType: 'json',
			error: function (request, status, error) {
				alert(request.responseText);
			}
		}).done(function (data) {
			contacts.children(":not(#searchedContacts):not(.paginationLinks)").remove();
			for (var i = 0; i < data.length; i++) {
                var date = data[i].Contact.created;
                date = new Date(date);
                var timestamp = date.getTime()/1000;
				
				$(".contacts").append(
					"<div class='row text-right' data-function='openContact'>\
						<div class='col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12 text-left contact' data-function='created-date' data-timestamp='"+timestamp+"'>\
							<i class='fas fa-sort-up arrow my-auto' id='arrow"+data[i].Contact.id+"'></i>\
							<span class='contactName'>"+data[i].Contact.name+"</span> <span class='number'>- "+data[i].Contact.number+"</span><span class='createdDate' id='contact"+data[i].Contact.id+"'>"+timestamp+"</span>\
							<form action='/Phonebook/Vendor/cakephp/cakephp/edit-contact' class='editContactForm' id='EditContactProfileForm' method='post' accept-charset='utf-8'>\
								<div style='display:none;'><input type='hidden' name='_method' value='POST'/></div>\
								<div class='input text'><label for='EditContactName'>Name</label><input name='data[EditContact][name]' placeholder='Edit Name And Surname' class='nameInput input-field' type='text' id='EditContactName' value='"+data[i].Contact.name+"'/></div>\
								<div class='input text'><label for='EditContactNumber'>Number</label><input name='data[EditContact][number]' placeholder='Edit Phone Number' class='phoneNumber input-field' type='text' id='EditContactNumber' value='"+data[i].Contact.number+"'/></div>\
								<div class='input text'><label for='EditContactSecondNumber'>Second Number</label><input name='data[EditContact][secondNumber]' placeholder='Edit Second Phone Number' class='secondPhoneNumber input-field' type='text' id='EditContactSecondNumber' value='"+data[i].Contact.secondNumber+"'/></div>\
								<div class='input text'><label for='EditContactAddress'>Address</label><input name='data[EditContact][address]' placeholder='Edit Address' class='addressInput input-field' type='text' id='EditContactAddress' value='"+data[i].Contact.address+"'/></div>\
								<div class='input text'><label for='EditContactCompany'>Company</label><input name='data[EditContact][company]' placeholder='Edit Company' class='companyInput input-field' type='text' id='EditContactCompany' value='"+data[i].Contact.company+"'/></div>\
								<input type='hidden' name='data[EditContact][contactId]' value='"+data[i].Contact.id+"' id='EditContactContactId'/>\
								<div class='submit'><input type='submit' value='Save'/></div>\
							</form>\
						</div>\
						<div class='icons col-xl-2 col-lg-2 col-md-2 col-sm-3 col-3'>\
							<i data-function='favourite-contact' class='fas fa-star' id='"+data[i].Contact.id+"'></i>\
							<i data-function='remove-contact' class='fas fa-trash' id='"+data[i].Contact.id+"'></i>\
						</div>\
					</div>\
				");
				if(data[i].Contact.isFavourite)
					$("#"+data[i].Contact.id+".fa-star").addClass("isFavourite");			

			}

			let div = $("*[data-function='openContact']");

			div.click(function () {
				$(this).toggleClass("open");
			});

			const rmBtn = $('*[data-function="remove-contact"]');

			rmBtn.click(function (event) {
				event.stopPropagation();
				event.stopImmediatePropagation();
				window.location = "remove-contact/" + $(this).attr('id');
			});

			//MAKING CONTACT FAVOURITE

			const favBtn = $('*[data-function="favourite-contact"]');

			favBtn.click(function (event) {
				event.stopPropagation();
				event.stopImmediatePropagation();
				window.location = "favourite-contact/" + $(this).attr('id');
				$(this).css("color", "yellow");
			});
			
		}).fail(function () {
			alert("NOT OK");
		});

	}

	function sortAplhabeticDesc() {
		var contacts = $(".contacts");
		$.ajax({
			url: 'http://localhost/Phonebook/Vendor/cakephp/cakephp/sortAplhaDesc',
			dataType: 'json',
			error: function (request, status, error) {
				alert(request.responseText);
			}
		}).done(function (data) {
			contacts.children(":not(#searchedContacts):not(.paginationLinks)").remove();
			for (var i = 0; i < data.length; i++) {
                var date = data[i].Contact.created;
                date = new Date(date);
                var timestamp = date.getTime()/1000;
				
				$(".contacts").append(
					"<div class='row text-right' data-function='openContact'>\
						<div class='col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12 text-left contact' data-function='created-date' data-timestamp='"+timestamp+"'>\
							<i class='fas fa-sort-up arrow my-auto' id='arrow"+data[i].Contact.id+"'></i>\
							<span class='contactName'>"+data[i].Contact.name+"</span> <span class='number'>- "+data[i].Contact.number+"</span><span class='createdDate' id='contact"+data[i].Contact.id+"'>"+timestamp+"</span>\
							<form action='/Phonebook/Vendor/cakephp/cakephp/edit-contact' class='editContactForm' id='EditContactProfileForm' method='post' accept-charset='utf-8'>\
								<div style='display:none;'><input type='hidden' name='_method' value='POST'/></div>\
								<div class='input text'><label for='EditContactName'>Name</label><input name='data[EditContact][name]' placeholder='Edit Name And Surname' class='nameInput input-field' type='text' id='EditContactName' value='"+data[i].Contact.name+"'/></div>\
								<div class='input text'><label for='EditContactNumber'>Number</label><input name='data[EditContact][number]' placeholder='Edit Phone Number' class='phoneNumber input-field' type='text' id='EditContactNumber' value='"+data[i].Contact.number+"'/></div>\
								<div class='input text'><label for='EditContactSecondNumber'>Second Number</label><input name='data[EditContact][secondNumber]' placeholder='Edit Second Phone Number' class='secondPhoneNumber input-field' type='text' id='EditContactSecondNumber' value='"+data[i].Contact.secondNumber+"'/></div>\
								<div class='input text'><label for='EditContactAddress'>Address</label><input name='data[EditContact][address]' placeholder='Edit Address' class='addressInput input-field' type='text' id='EditContactAddress' value='"+data[i].Contact.address+"'/></div>\
								<div class='input text'><label for='EditContactCompany'>Company</label><input name='data[EditContact][company]' placeholder='Edit Company' class='companyInput input-field' type='text' id='EditContactCompany' value='"+data[i].Contact.company+"'/></div>\
								<input type='hidden' name='data[EditContact][contactId]' value='"+data[i].Contact.id+"' id='EditContactContactId'/>\
								<div class='submit'><input type='submit' value='Save'/></div>\
							</form>\
						</div>\
						<div class='icons col-xl-2 col-lg-2 col-md-2 col-sm-3 col-3'>\
							<i data-function='favourite-contact' class='fas fa-star' id='"+data[i].Contact.id+"'></i>\
							<i data-function='remove-contact' class='fas fa-trash' id='"+data[i].Contact.id+"'></i>\
						</div>\
					</div>\
				");
				if(data[i].Contact.isFavourite)
					$("#"+data[i].Contact.id+".fa-star").addClass("isFavourite");			

			}
			
			let div = $("*[data-function='openContact']");

			div.click(function () {
				$(this).toggleClass("open");
			});

			const rmBtn = $('*[data-function="remove-contact"]');

			rmBtn.click(function (event) {
				event.stopPropagation();
				event.stopImmediatePropagation();
				window.location = "remove-contact/" + $(this).attr('id');
			});

			//MAKING CONTACT FAVOURITE

			const favBtn = $('*[data-function="favourite-contact"]');

			favBtn.click(function (event) {
				event.stopPropagation();
				event.stopImmediatePropagation();
				window.location = "favourite-contact/" + $(this).attr('id');
				$(this).css("color", "yellow");
			});
			
		}).fail(function () {
			alert("NOT OK");
		});
	}

	function sortDateAsc() {
		var contacts = $(".contacts");
		$.ajax({
			url: 'http://localhost/Phonebook/Vendor/cakephp/cakephp/sortDateAsc',
			dataType: 'json',
			error: function (request, status, error) {
				alert(request.responseText);
			}
		}).done(function (data) {
			contacts.children(":not(#searchedContacts):not(.paginationLinks)").remove();
			for (var i = 0; i < data.length; i++) {
                var date = data[i].Contact.created;
                date = new Date(date);
                var timestamp = date.getTime()/1000;
				
				$(".contacts").append(
					"<div class='row text-right' data-function='openContact'>\
						<div class='col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12 text-left contact' data-function='created-date' data-timestamp='"+timestamp+"'>\
							<i class='fas fa-sort-up arrow my-auto' id='arrow"+data[i].Contact.id+"'></i>\
							<span class='contactName'>"+data[i].Contact.name+"</span> <span class='number'>- "+data[i].Contact.number+"</span><span class='createdDate' id='contact"+data[i].Contact.id+"'>"+timestamp+"</span>\
							<form action='/Phonebook/Vendor/cakephp/cakephp/edit-contact' class='editContactForm' id='EditContactProfileForm' method='post' accept-charset='utf-8'>\
								<div style='display:none;'><input type='hidden' name='_method' value='POST'/></div>\
								<div class='input text'><label for='EditContactName'>Name</label><input name='data[EditContact][name]' placeholder='Edit Name And Surname' class='nameInput input-field' type='text' id='EditContactName' value='"+data[i].Contact.name+"'/></div>\
								<div class='input text'><label for='EditContactNumber'>Number</label><input name='data[EditContact][number]' placeholder='Edit Phone Number' class='phoneNumber input-field' type='text' id='EditContactNumber' value='"+data[i].Contact.number+"'/></div>\
								<div class='input text'><label for='EditContactSecondNumber'>Second Number</label><input name='data[EditContact][secondNumber]' placeholder='Edit Second Phone Number' class='secondPhoneNumber input-field' type='text' id='EditContactSecondNumber' value='"+data[i].Contact.secondNumber+"'/></div>\
								<div class='input text'><label for='EditContactAddress'>Address</label><input name='data[EditContact][address]' placeholder='Edit Address' class='addressInput input-field' type='text' id='EditContactAddress' value='"+data[i].Contact.address+"'/></div>\
								<div class='input text'><label for='EditContactCompany'>Company</label><input name='data[EditContact][company]' placeholder='Edit Company' class='companyInput input-field' type='text' id='EditContactCompany' value='"+data[i].Contact.company+"'/></div>\
								<input type='hidden' name='data[EditContact][contactId]' value='"+data[i].Contact.id+"' id='EditContactContactId'/>\
								<div class='submit'><input type='submit' value='Save'/></div>\
							</form>\
						</div>\
						<div class='icons col-xl-2 col-lg-2 col-md-2 col-sm-3 col-3'>\
							<i data-function='favourite-contact' class='fas fa-star' id='"+data[i].Contact.id+"'></i>\
							<i data-function='remove-contact' class='fas fa-trash' id='"+data[i].Contact.id+"'></i>\
						</div>\
					</div>\
				");
				if(data[i].Contact.isFavourite)
					$("#"+data[i].Contact.id+".fa-star").addClass("isFavourite");			

			}
			
			let div = $("*[data-function='openContact']");

			div.click(function () {
				$(this).toggleClass("open");
			});

			const rmBtn = $('*[data-function="remove-contact"]');

			rmBtn.click(function (event) {
				event.stopPropagation();
				event.stopImmediatePropagation();
				window.location = "remove-contact/" + $(this).attr('id');
			});

			//MAKING CONTACT FAVOURITE

			const favBtn = $('*[data-function="favourite-contact"]');

			favBtn.click(function (event) {
				event.stopPropagation();
				event.stopImmediatePropagation();
				window.location = "favourite-contact/" + $(this).attr('id');
				$(this).css("color", "yellow");
			});
			
		}).fail(function () {
			alert("NOT OK");
		});
	}

	function sortDateDesc() {
		var contacts = $(".contacts");
		$.ajax({
			url: 'http://localhost/Phonebook/Vendor/cakephp/cakephp/sortDateDesc',
			dataType: 'json',
			error: function (request, status, error) {
				alert(request.responseText);
			}
		}).done(function (data) {
			contacts.children(":not(#searchedContacts):not(.paginationLinks)").remove();
			for (var i = 0; i < data.length; i++) {
                var date = data[i].Contact.created;
                date = new Date(date);
                var timestamp = date.getTime()/1000;
				
				$(".contacts").append(
					"<div class='row text-right' data-function='openContact'>\
						<div class='col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12 text-left contact' data-function='created-date' data-timestamp='"+timestamp+"'>\
							<i class='fas fa-sort-up arrow my-auto' id='arrow"+data[i].Contact.id+"'></i>\
							<span class='contactName'>"+data[i].Contact.name+"</span> <span class='number'>- "+data[i].Contact.number+"</span><span class='createdDate' id='contact"+data[i].Contact.id+"'>"+timestamp+"</span>\
							<form action='/Phonebook/Vendor/cakephp/cakephp/edit-contact' class='editContactForm' id='EditContactProfileForm' method='post' accept-charset='utf-8'>\
								<div style='display:none;'><input type='hidden' name='_method' value='POST'/></div>\
								<div class='input text'><label for='EditContactName'>Name</label><input name='data[EditContact][name]' placeholder='Edit Name And Surname' class='nameInput input-field' type='text' id='EditContactName' value='"+data[i].Contact.name+"'/></div>\
								<div class='input text'><label for='EditContactNumber'>Number</label><input name='data[EditContact][number]' placeholder='Edit Phone Number' class='phoneNumber input-field' type='text' id='EditContactNumber' value='"+data[i].Contact.number+"'/></div>\
								<div class='input text'><label for='EditContactSecondNumber'>Second Number</label><input name='data[EditContact][secondNumber]' placeholder='Edit Second Phone Number' class='secondPhoneNumber input-field' type='text' id='EditContactSecondNumber' value='"+data[i].Contact.secondNumber+"'/></div>\
								<div class='input text'><label for='EditContactAddress'>Address</label><input name='data[EditContact][address]' placeholder='Edit Address' class='addressInput input-field' type='text' id='EditContactAddress' value='"+data[i].Contact.address+"'/></div>\
								<div class='input text'><label for='EditContactCompany'>Company</label><input name='data[EditContact][company]' placeholder='Edit Company' class='companyInput input-field' type='text' id='EditContactCompany' value='"+data[i].Contact.company+"'/></div>\
								<input type='hidden' name='data[EditContact][contactId]' value='"+data[i].Contact.id+"' id='EditContactContactId'/>\
								<div class='submit'><input type='submit' value='Save'/></div>\
							</form>\
						</div>\
						<div class='icons col-xl-2 col-lg-2 col-md-2 col-sm-3 col-3'>\
							<i data-function='favourite-contact' class='fas fa-star' id='"+data[i].Contact.id+"'></i>\
							<i data-function='remove-contact' class='fas fa-trash' id='"+data[i].Contact.id+"'></i>\
						</div>\
					</div>\
				");
				if(data[i].Contact.isFavourite)
					$("#"+data[i].Contact.id+".fa-star").addClass("isFavourite");			

			}
			
			let div = $("*[data-function='openContact']");

			div.click(function () {
				$(this).toggleClass("open");
			});

			const rmBtn = $('*[data-function="remove-contact"]');

			rmBtn.click(function (event) {
				event.stopPropagation();
				event.stopImmediatePropagation();
				window.location = "remove-contact/" + $(this).attr('id');
			});

			//MAKING CONTACT FAVOURITE

			const favBtn = $('*[data-function="favourite-contact"]');

			favBtn.click(function (event) {
				event.stopPropagation();
				event.stopImmediatePropagation();
				window.location = "favourite-contact/" + $(this).attr('id');
				$(this).css("color", "yellow");
			});
			
		}).fail(function () {
			alert("NOT OK");
		});
	}

	function sortFav() {
		var contacts = $(".contacts");
		$.ajax({
			url: 'http://localhost/Phonebook/Vendor/cakephp/cakephp/sortFav',
			dataType: 'json',
			error: function (request, status, error) {
				alert(request.responseText);
			}
		}).done(function (data) {
			contacts.children(":not(#searchedContacts):not(.paginationLinks)").remove();
			for (var i = 0; i < data.length; i++) {
                var date = data[i].Contact.created;
                date = new Date(date);
                var timestamp = date.getTime()/1000;
				
				$(".contacts").append(
					"<div class='row text-right' data-function='openContact'>\
						<div class='col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12 text-left contact' data-function='created-date' data-timestamp='"+timestamp+"'>\
							<i class='fas fa-sort-up arrow my-auto' id='arrow"+data[i].Contact.id+"'></i>\
							<span class='contactName'>"+data[i].Contact.name+"</span> <span class='number'>- "+data[i].Contact.number+"</span><span class='createdDate' id='contact"+data[i].Contact.id+"'>"+timestamp+"</span>\
							<form action='/Phonebook/Vendor/cakephp/cakephp/edit-contact' class='editContactForm' id='EditContactProfileForm' method='post' accept-charset='utf-8'>\
								<div style='display:none;'><input type='hidden' name='_method' value='POST'/></div>\
								<div class='input text'><label for='EditContactName'>Name</label><input name='data[EditContact][name]' placeholder='Edit Name And Surname' class='nameInput input-field' type='text' id='EditContactName' value='"+data[i].Contact.name+"'/></div>\
								<div class='input text'><label for='EditContactNumber'>Number</label><input name='data[EditContact][number]' placeholder='Edit Phone Number' class='phoneNumber input-field' type='text' id='EditContactNumber' value='"+data[i].Contact.number+"'/></div>\
								<div class='input text'><label for='EditContactSecondNumber'>Second Number</label><input name='data[EditContact][secondNumber]' placeholder='Edit Second Phone Number' class='secondPhoneNumber input-field' type='text' id='EditContactSecondNumber' value='"+data[i].Contact.secondNumber+"'/></div>\
								<div class='input text'><label for='EditContactAddress'>Address</label><input name='data[EditContact][address]' placeholder='Edit Address' class='addressInput input-field' type='text' id='EditContactAddress' value='"+data[i].Contact.address+"'/></div>\
								<div class='input text'><label for='EditContactCompany'>Company</label><input name='data[EditContact][company]' placeholder='Edit Company' class='companyInput input-field' type='text' id='EditContactCompany' value='"+data[i].Contact.company+"'/></div>\
								<input type='hidden' name='data[EditContact][contactId]' value='"+data[i].Contact.id+"' id='EditContactContactId'/>\
								<div class='submit'><input type='submit' value='Save'/></div>\
							</form>\
						</div>\
						<div class='icons col-xl-2 col-lg-2 col-md-2 col-sm-3 col-3'>\
							<i data-function='favourite-contact' class='fas fa-star' id='"+data[i].Contact.id+"'></i>\
							<i data-function='remove-contact' class='fas fa-trash' id='"+data[i].Contact.id+"'></i>\
						</div>\
					</div>\
				");
				if(data[i].Contact.isFavourite)
					$("#"+data[i].Contact.id+".fa-star").addClass("isFavourite");			

			}
			
			let div = $("*[data-function='openContact']");

			div.click(function () {
				$(this).toggleClass("open");
			});

			const rmBtn = $('*[data-function="remove-contact"]');

			rmBtn.click(function (event) {
				event.stopPropagation();
				event.stopImmediatePropagation();
				window.location = "remove-contact/" + $(this).attr('id');
			});

			//MAKING CONTACT FAVOURITE

			const favBtn = $('*[data-function="favourite-contact"]');

			favBtn.click(function (event) {
				event.stopPropagation();
				event.stopImmediatePropagation();
				window.location = "favourite-contact/" + $(this).attr('id');
				$(this).css("color", "yellow");
			});
			
		}).fail(function () {
			alert("NOT OK");
		});
	}

</script>



<!-- <button onclick="window.location.replace('delete-user');">Delete account</button><br/><br/><br/> -->
