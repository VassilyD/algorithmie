function bestInvest() {
  var bratios = {};
  var cassecouille = Object.keys(Game.Objects);
  cassecouille.forEach(function(index){
    var item = Game.Objects[index];
    item.l.style.border = '0 none white';
    var ratio = item.storedCps / item.bulkPrice;
    bratios[index] = ratio;
  });
  var maxs = [];
  for(var i = 0; i <= 10; i++) {
    var max = ['', 0];
    var couple = Object.entries(bratios);
    couple.forEach(function(item){
      if(max[1] < item[1]) {
        max[0] = item[0];
        max[1] = item[1];
      }
    });
    maxs.unshift(max);
    bratios[max[0]] = -1;
  }
  var color = ['#000000', '#ffffff', '#ff0000', '#ff0080', '#ff00ff', '#8000ff', '#0000ff', '#0080ff', '#00ffff', '#00ff80', '#00ff00'];
  for(var i = 10; i >= 0; i--) {
    var tmp = maxs[i][0];
    tmp = Game.Objects[tmp];
    tmp.l.style.border = '5px solid ' + color[i];
  }
}
var SelectInvest = setInterval(bestInvest, 100);


// Sert à récupérer la position d'un élément
/* @author Patrick Poulain
* @see http://petitchevalroux.net
* @licence GPL
*
function getPosition(element)
{
  var left = 0;
  var top = 0;
  //On récupère l'élément
  var e = document.getElementById(element);
  //Tant que l'on a un élément parent
  while (e.offsetParent != undefined && e.offsetParent != null)
  {
    //On ajoute la position de l'élément parent
    left += e.offsetLeft + (e.clientLeft != null ? e.clientLeft : 0);
    top += e.offsetTop + (e.clientTop != null ? e.clientTop : 0);
    e = e.offsetParent;
  }
  return new Array(left,top);
}
var myPos = getPosition("bigCookie");
*/

// Simule un évènement de type clic sur le cookie
function simulateClick() {
  var evt = new MouseEvent('click', {
    view: window,
    bubbles: true,
    cancelable: true,
  });
  var cb = document.getElementById("bigCookie"); 
  var canceled = cb.dispatchEvent(evt);
}

// Permet de mettre fin à l'autoclic quand on évolue
var testtt = document.getElementById("legacyButton");
testtt.onmousedown = function(){
  clearInterval(myAutoClic); 
  clearInterval(SelectInvest);
};

// Lance l'autoclic
var myAutoClic = setInterval(simulateClick, 10);