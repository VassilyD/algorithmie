function bestInvest() {
  var bratios = [];
  var maxs = [];
  var gainParSec = cpsMoy * Game.computedMouseCps + Game.cookiesPs;
  var cookiesTotal = Game.cookies;
  var tmp = Object.keys(Game.Objects);
  tmp.forEach(function(index){
    var item = Game.Objects[index];
    item.l.style.border = '0 none white';
    bratios.push([item.storedCps * Game.globalCpsMult, item.bulkPrice, index]);
  });
  function testBestInvest(item1, item2) {
    if(item1[1] + item2[1] <= cookiesTotal) return item1[1] / item1[0];
    else if(item1[1] <= cookiesTotal) return (item2[1] - (cookiesTotal - item1[1])) / (gainParSec + item1[0]); // 
    else return ((item1[1] - cookiesTotal) / gainParSec) + (item2[1] / (gainParSec + item1[0])); // 
  }
  function switchBestInvest(item, max, index) {
    for(var k = 0; k < 3; k++) {
      max[k] = item[k];
    }
    max[3] = index;
  }
  for(var i = 0; i <= 10; i++) {
    var max = [-1, 1e300, '', -1];
    for(var j in bratios) {
      item = bratios[j];
      //if(testBestInvest(item, max) == 0 && item[0] > max[0]) switchBestInvest(item, max, j);
      if(testBestInvest(item, max) < testBestInvest(max, item)) switchBestInvest(item, max, j);
    }
    maxs.unshift(max);
    bratios.splice(max[3], 1);
  }
  
  var color = ['#000000', '#ffffff', '#ff0000', '#ff0080', '#ff00ff', '#8000ff', '#0000ff', '#0080ff', '#00ffff', '#00ff80', '#00ff00'];
  for(var i = 10; i >= 0; i--) {
    var tmp = maxs[i][2];
    tmp = Game.Objects[tmp];
    tmp.l.style.border = '5px solid ' + color[i];
  }
}

//var inStorming = 0;
function goldenAutoClic(){
  var mytmpac = document.getElementsByClassName('shimmer');
  if(mytmpac.length != 0) {
    for(var i = 0; i < mytmpac.length; i++) {
      var evt = new MouseEvent('click', {
        view: window,
        bubbles: true,
        cancelable: true,
      });
      if (Game.HasAchiev('Fading luck')) {
        Game.shimmers[i].wrath = 0;
        /*if(Game.hasBuff('Cookie storm') === 0 && (Date.now() - inStorming) > 500) {
          Game.shimmers[i].force = Game.goldenCookieChoices[17];
        } else inStorming = Date.now();*/
        var canceled = mytmpac[i].dispatchEvent(evt);
        i--;
      } else if(Game.shimmers[i].life<Game.fps) {
        Game.shimmers[i].wrath = 0;
        /*if(Game.hasBuff('Cookie storm') === 0 && (Date.now() - inStorming) > 500) {
          Game.shimmers[i].force = Game.goldenCookieChoices[17];
        } else inStorming = Date.now();*/
        var canceled = mytmpac[i].dispatchEvent(evt);
        i--;
      }
    }
  }
}
function bestWrinklers() {
  var iDead = 0;
  var iSucked = 0;
  var tmpMax = Game.getWrinklersMax();
  for(var i = 0; i < tmpMax; i++) {
      if(Game.wrinklers[i].phase == 0) Game.wrinklers[i].phase = 1;
      if(Game.wrinklers[i].sucked > Game.wrinklers[iSucked].sucked) {
        iDead = iSucked;
        iSucked = i;
      }
      else if(Game.wrinklers[i].sucked > Game.wrinklers[iDead].sucked) iDead = i;
    }
  console.log(Game.wrinklers[iSucked]);
  console.log(Game.wrinklers[iDead]);
}

var nbcookiess = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
var nbcookies = Game.cookieClicks;
var cpsMoy = 0;
var myStatButton = document.getElementById('bakeryName');
var moyenDeMoyenner = true;
function myStatActu(){
  var oldcps = nbcookiess.shift();
  nbcookiess.push(Game.cookieClicks - nbcookies);
  nbcookies = Game.cookieClicks;
  var somme = 0;
  for(var i = 0; i < 10; i++) {
    somme += nbcookiess[i];
  }
  cpsMoy = (moyenDeMoyenner)?(somme / 10):nbcookiess[9];
  var tmp = document.createElement('div');
  tmp.style = "font-size:50%;";
  tmp.innerHTML = cpsMoy + ' clic/s => ' + Beautify(Game.computedMouseCps * cpsMoy) + ' Cookies/s !!!';
  tmp.onclick = function(){moyenDeMoyenner = (moyenDeMoyenner)?false:true;};
  if(typeof(myStatButton.childNodes[1]) !== 'undefined') myStatButton.removeChild(myStatButton.childNodes[1]);
  myStatButton.appendChild(tmp);
  var nbWrinklers = 0;
  var iSucked = 0;
  var iDead = 0;
  var tmpMax = Game.getWrinklersMax();
  for(var i = 0; i < tmpMax; i++) {
    if(Game.wrinklers[i].type == 0) Game.wrinklers[i].type = 1;
    if(Game.wrinklers[i].close == 1) nbWrinklers++;
    if(Game.wrinklers[i].sucked > Game.wrinklers[iSucked].sucked) {
      iDead = iSucked;
      iSucked = i;
    }
    else if(Game.wrinklers[i].sucked > Game.wrinklers[iDead].sucked) iDead = i;
  }
  if(nbWrinklers == tmpMax) Game.wrinklers[iDead].hp = 0;
}


// Sert à récupérer la position d'un élément
/* @author Patrick Poulain
* @see http://petitchevalroux.net
* @licence GPL
*/
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
// */

// Simule un évènement de type clic sur le cookie
function simulateClick() {
  var evt = new MouseEvent('click', {
    view: window,
    bubbles: true,
    cancelable: true
  });
  var tmpX = Game.mouseX;
  var tmpY = Game.mouseY;
  //Game.mouseX = Game.mouseX2 = myPos[0]*1 + 128;
  //Game.mouseY = Game.mouseY2 = myPos[1]*1 + 128;
  Game.mouseX = Game.mouseX2 = 0;
  Game.mouseY = Game.mouseY2 = myPos[1]*1 + 350;
  var cb = document.getElementById("bigCookie"); 
  var canceled = cb.dispatchEvent(evt);
  Game.mouseX = Game.mouseX2 = tmpX;
  Game.mouseY = Game.mouseY2 = tmpY;
}

function myStart(myInterval = ['myAutoClic', 'goldenAC', 'testNbCookiess']) {
  if(typeof(myInterval) === 'object') {
    var tmp = myInterval.length
    for(var i = 0; i < tmp; i++) {
      myStart(myInterval[i]);
    }
  } else {
    switch(myInterval) {
      case 'myAutoClic':
        if(myAutoClic === 0) myAutoClic = setInterval(simulateClick, 25);
        break;
      case 'SelectInvest':
        if(SelectInvest === 0) SelectInvest = setInterval(bestInvest, 100);
        break;
      case 'goldenAC':
        if(goldenAC === 0) goldenAC = setInterval(goldenAutoClic, 500);
        break;
      case 'testNbCookiess':
        if(testNbCookiess === 0) {
          nbcookies = Game.cookieClicks;
          testNbCookiess = setInterval(myStatActu, 1000);
        }
        break;
      default:
    } 
  }
}

function myStop(myInterval = ['myAutoClic', 'SelectInvest', 'goldenAC', 'testNbCookiess']) {
  if(typeof(myInterval) === 'object') {
    var tmp = myInterval.length
    for(var i = 0; i < tmp; i++) {
      myStop(myInterval[i]);
    }
  } else {
    switch(myInterval) {
      case 'myAutoClic':
        if(myAutoClic !== 0) {
          clearInterval(myAutoClic); 
          myAutoClic = 0;
        }
        break;
      case 'SelectInvest':
        if(SelectInvest !== 0) {
          clearInterval(SelectInvest); 
          SelectInvest = 0;
          var cassecouille = Object.keys(Game.Objects);
          cassecouille.forEach(function(index){
            var item = Game.Objects[index];
            item.l.style.border = '0 none white';
          });
        }
        break;
      case 'goldenAC':
        if(goldenAC !== 0) {
          clearInterval(goldenAC); 
          goldenAC = 0;
        }
        break;
      case 'testNbCookiess':
        if(testNbCookiess !== 0) {
          if(typeof(myStatButton.childNodes[1]) !== 'undefined') myStatButton.removeChild(myStatButton.childNodes[1]);
          nbcookiess = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
          clearInterval(testNbCookiess); 
          testNbCookiess = 0;
        }
        break;
      default:
    } 
  }
}

// Permet de mettre fin aux "cheats" quand on évolue
var tmp = document.getElementById("legacyButton");
tmp.onmousedown = function(){
  myStop();
  Game.removeClass("elderWrath");
}

// Permet de permuter les functions quand clic sur info
var tmp = document.getElementById("logButton");
tmp.onmousedown = function() {
  if(myAutoClic !== 0) {
    myStop();
    Game.removeClass("elderWrath");
  } else {
    myStart();
    Game.addClass("elderWrath");
  }
}

// Mets à jour la position du bigcookie
document.body.onresize = function() {
  myPos = getPosition("bigCookie");
}
// Lance les Différents cheats
var myAutoClic = 0;
var SelectInvest = 0;
var testNbCookiess = 0;
var goldenAC = 0;
Game.addClass("elderWrath");
myStart();
