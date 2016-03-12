var clientes = [];
var MYAPP = MYAPP || { 
	myuser: function (name,username,mailname,password1) {
		this.Name= name;
		this.Username =username;
		this.Mailname=mailname;
		this.Password1=password1;
		this.save = function() {
			localStorage.setItem("users", JSON.stringify(users));
		};
	},

	saveClient: function() {
		var name = document.getElementById('username').value;
		var username = document.getElementById('lastname').value;
		var password = document.getElementById('password').value;
		var mailname = document.getElementById('mailname').value;
		var user1 = new MYAPP.myuser(name ,username,mailname,password);
		if ((name==null||name=="") ||(username==null||username=="")||(password==null||password=="")||(mailname==null||mailname=="")) {
			alert("error");
		}
		else {
			try {
				var retrievedObject = localStorage.getItem('users');
				var datePerson = JSON.parse(retrievedObject); //Parse the Data back into the object
				datePerson.push(user1);
				localStorage.setItem("users", JSON.stringify(datePerson));
				location.reload();
			} catch (e) {
				client2.push( user1);
				var client2=[];
				localStorage.setItem("users", JSON.stringify(client2));
				location.reload();
			}
		}
	},

	bindEvents: function() {
		jQuery('#save-client').click(
			MYAPP.saveClient();
			);
		alert("Error");
	},
};

jQuery(document).ready( function() {
	MYAPP.bindEvents();
}