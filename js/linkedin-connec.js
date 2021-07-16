var valueFromBot;

authLinkedin = function liAuth() {
	IN.User.authorize(function(){
	});
}

function onLinkedInLoad() {
	IN.Event.on(IN, "auth", getProfileData);
}

// Handle the successful return from the API call
function onSuccess(data) {
	console.log(data);
}

// Handle an error response from the API call
function onError(error) {
	console.log(error);
}

// Use the API call wrapper to request the member's basic profile data
function getProfileData() {
	IN.API.Profile("me").fields("id", "first-name", "last-name", "location",
			"public-profile-url", "email-address", "pictureUrl", "summary", "positions").result(setConnections);
}

function setConnections(connections) {
	var member = connections.values[0];
	var id = member.id;
	/*var firstName = member.firstName;
	var lastName = member.lastName;
	var location = member.location.name;
	var profile = member.publicProfileUrl;
	var email = member.emailAddress;
	var photo=member.pictureUrl; */
	//var headline=member.headline;
//	var company = member.positions.values[0];
//	console.log(company);
//	console.log( member.location);
//	
//	console.log("Company Title: " + company.title);
//	console.log("Company Object: " + company.company.name);
	
	$.ajax({
		type : "GET", //Definimos o método HTTP usado
		url : "php/request_user.php",//Definindo o arquivo onde serão buscados os dados
		//data: "dados",
		data : "id=" + id,
		error : function(error, exception) {
			console.log("Erro ao carregar JSON! Tente de novo! "
					+ error.status + exception);
		},
		success : function(dados) {
			var user_info = JSON.parse(dados);
			
			if (user_info.length) {
				if(valueFromBot!=null){
					alert("Usuário já cadastrado anteriormente na SideJob!");
				}
				
				$.each(
				user_info,
				function(i, field) {
//					field.firstEdit = 0;
					console.log(field);
					window.localStorage.setItem("resumeData", JSON.stringify(field));
					window.self.location.href = "resume.html";
				});
			} else {
				if(valueFromBot!=null){
					Object.defineProperty(member, 'age', {
						  enumerable: true,   
						  configurable: true, 
						  writable: true,
						  value: valueFromBot["age"]
					});
					Object.defineProperty(member, 'hours', {
						  enumerable: true,   
						  configurable: true, 
						  writable: true,
						  value: valueFromBot["hours"]
					});
					 window.localStorage.setItem("registerData",  JSON.stringify(member));				
					 window.self.location.href = "register.html";	
				}else{
					alert("Usuário não cadastrado no SideJob, por favor, preencha as informações corretamente!");
					window.self.location.reload();
				}
			}
		}
	});

}
