var arDrone = require('ar-drone');
var client = arDrone.createClient();

client.takeoff();
console.log('Take off');

client
  .after(5000, function() {
	      this.clockwise(0.5);
	  	console.log('clock-wise turn')
	    })
  .after(3000, function() {
	      this.animate('flipLeft', 15);
	  	console.log('flip-left');
	    })
  .after(1000, function() {
	  	console.log('land');
	      this.stop();
	      this.land();
	  	process.exit();
	    });

