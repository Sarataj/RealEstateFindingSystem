<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title> Live Chat</title>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
				
		<script src="https://www.gstatic.com/firebasejs/5.8.3/firebase.js"></script>
		<script>
		  // Initialize Firebase
		  var config = {
			apiKey: "AIzaSyA0g6pqqG5m_w82sPSRDeUGSfYXtPWTJqM",
			authDomain: "chat-app-2d70e.firebaseapp.com",
			databaseURL: "https://chat-app-2d70e.firebaseio.com",
			projectId: "chat-app-2d70e",
			storageBucket: "chat-app-2d70e.appspot.com",
			messagingSenderId: "127548898472"
		  };
		  firebase.initializeApp(config);
		</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/angularFire/2.3.0/angularfire.min.js"> </script>
		
	</head>
	<body ng-app="myApp" ng-controller="myCtrl">
			<div class="w3-container w3-indigo">
			<h1>Live Chat</h1>
			</div>
				
				
			<div class="w3-panel">
			  <ul id="list" class="w3-ul">
				<li ng-repeat="n in names" class="w3-blue w3-panel w3-padding-16 w3-round-xxlarge">{{n.$value}}</li>
			  </ul>
			</div>

			<form onsubmit="print_msg(event)" class="w3-panel"><p>
			 <input id="msg" class="w3-input" type="text" placeholder="Write your message...">
			<!--<input type="button" class="w3-btn w3-blue" onclick="print_msg(event)" value="Submit"> -->
			</p></form>

				<script>
				var db = firebase.database().ref();
				var app = angular.module('myApp', ['firebase']);
					app.controller('myCtrl', function($scope, $firebaseArray) {
					  $scope.names= $firebaseArray(db.child('message'))
					});
				
					//var name="Sarataj";
					var list=document.getElementById('list');
					function print_msg(e){
					e.preventDefault();
						var message = document.getElementById('msg');
						//list.innerHTML += "<li class='w3-blue w3-panel w3-padding-16 w3-round-xxlarge'>" + message.value + "</li>";
						//console.log(message.value);
						//console.log("Hello "+ name);
						
						db.child('message').push(message.value);
						
						message.value='';
				}
				
				
				
				</script>



	</body>
</html>