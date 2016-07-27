window.onload = function() {
  var time     = new Date(),
      midnight = new Date();
  midnight.setHours(0);
  midnight.setMinutes(0);
  midnight.setSeconds(0);

  // Seconds/Minutes/Hours from today:
  var seconds = (time.getTime() - midnight.getTime()) / 1000,
      minutes = seconds / 60,
      hours   = minutes / 60;

  document.getElementById('offset-hours').style.transform   = 'rotate(' + (hours % 12 / 12 * 360) + 'deg)';
  document.getElementById('offset-minutes').style.transform = 'rotate(' + (minutes    / 60 * 360) + 'deg)';
  document.getElementById('offset-seconds').style.transform = 'rotate(' + (seconds    / 60 * 360) + 'deg)';
  
  document.getElementById('date-display').getElementsByTagName('text')[0].innerHTML = time.getDate();
};
