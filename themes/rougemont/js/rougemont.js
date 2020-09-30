'use strict';
/**
 * Interface statique, essentiellement pour la liseuse
 */


/*
// faire partir la barre fixe au scrolll ?
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-50px";
  }
  prevScrollpos = currentScrollPos;
}
*/
class Liser {

  static init(selector)
  {
    Liser.vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
    Liser.vh = Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0);
    Liser.noterefs = document.querySelectorAll('a.noteref');
    var bookpath = document.location.pathname.substr(0, document.location.pathname.lastIndexOf('/'));
    Liser.scrollMother = ('scrollTop' in document.documentElement)?document.documentElement:document.body;
    // store if book already visited
    var lastbook = sessionStorage.getItem('bookpath');
    if (lastbook != bookpath) sessionStorage.setItem('bookpath', bookpath);
    
    // accordeon
    var blocks = document.querySelectorAll(".c5block");
    for (var i = 0; i < blocks.length; i++) {
      var headers = blocks[i].querySelectorAll("h2, h4, h5");
      console.log(blocks[i]);
      console.log(headers);
      for (var z = 0; z < headers.length; z++) {
        const myblock = blocks[i];
        headers[z].addEventListener("click", function (event) {
          myblock.classList.toggle("show");
        }, false);
      }
    }
    
    
    var tocbut = document.getElementById("tocbut");
    var toc = document.getElementById("toc");
    if (tocbut && toc) {
      tocbut.addEventListener("click", function (event) {
        event.preventDefault();
        event.stopPropagation();
        // event.target maybe the svg
        if (tocbut.classList.contains("splash")) {
          tocbut.classList.remove("splash");
          toc.classList.remove("splash");
          return;
        }
        if (menubut && menu) {
          menubut.classList.remove("splash");
          menu.classList.remove("splash");
        }

        // show
        tocbut.classList.add("splash");
        toc.classList.add("splash");
        // ensure scroll into view
        var here = toc.querySelector("a.nav-selected");
        if (!here) here = toc.querySelector("li.here > a");
        if (!here) return;
        var hereY = here.offsetTop;
        if (hereY < toc.clientHeight + toc.scrollTop) return;
        toc.scrollTop = hereY + 100;
      });
      
      
      toc.addEventListener("click", function (event) {
        // attrappé par window, caché
      }, false);
    }

    var menubut = document.getElementById("menubut");
    var menu = document.getElementById("menu");
    if (menubut && menu) {
      menubut.addEventListener("click", function (event) {
        event.preventDefault();
        event.stopPropagation();
        if (menubut.classList.contains("splash")) {
          menubut.classList.remove("splash");
          menu.classList.remove("splash");
          return;
        }
        menubut.classList.add("splash");
        menu.classList.add("splash");
        if (tocbut && toc) {
          tocbut.classList.remove("splash");
          toc.classList.remove("splash");
        }

      });
      
    }

    window.addEventListener("click", function (event) {
      if (tocbut && toc) {
        tocbut.classList.remove("splash");
        toc.classList.remove("splash");
      }
      if (menubut && menu) {
        menubut.classList.remove("splash");
        menu.classList.remove("splash");
      }
    });
    
    
    Liser.sidebar = document.getElementById("sidebar");
    do {
      /*
      var scroll2text = 310;
      var pagetitle = document.querySelector("#text h1");
      // passer le bannière si même livre
      if (lastbook != bookpath);
      else if (pagetitle) {
        scroll2text = Liser.top(pagetitle) - 60; // petite barre
        var ccmbar = document.getElementById("ccm-toolbar");
        if (ccmbar) scroll2text -= ccmbar.offsetHeight;
        window.scroll(0, scroll2text);
      }
      */
      // sidebar
      if (!Liser.sidebar) break;
      if (Liser.vw < 992) break; // do not scroll in the sidebar if screen is too small
      var here = Liser.sidebar.querySelector("a.nav-selected");
      if (!here) here = Liser.sidebar.querySelector("li.here > a");
      if (!here) break;
      var hereY = here.offsetTop;
      if (hereY > Liser.sidebar.clientHeight + Liser.sidebar.scrollTop) {
        // var scrollto = hereY - (Liser.sidebar.clientHeight / 2);
        // avoid scroll intoview, too much effects on global scroll
        Liser.sidebar.scrollTop = hereY - (Liser.sidebar.clientHeight / 2);
      }
    } while(false);

    Liser.notebox = document.getElementById("notebox");
    if (Liser.notebox) {
      var text = this.notebox.parentNode;
      notebox.style.width = getComputedStyle(text).width;
      window.addEventListener('resize', Liser.resize); // garder la largeur relative de la boîte à notes
      window.addEventListener('scroll', Liser.scrollPage);
      // scrollPage(); // non, trop long au démarrage
    }
    // Des liens dans le diaporama à l’accueil
    var links = document.querySelectorAll(".slider-nav a");
    for (var i = 0, max = links.length; i < max; i++) {
      let a = links[i];
      let id = a.hash;
      if (!id) return;
      if (id[0] == "#") id = id.substring(1);
      let ref = document.getElementById(id);
      if (!ref) continue;
      a.ref = ref;
      a.onclick = Liser.sliderClick;
    }
    /*
    var footer = document.getElementById("footer");
    if (footer) footerHeight = footer.clientHeight;
    */
    // bulle au survol pour lien tronqués (ellipsis)
    var els = document.querySelectorAll("p.ccm-block-next-previous-previous-link, p.ccm-block-next-previous-next-link");
    for (var i = 0, max = els.length; i < max; i++) {
      els[i].title = els[i].innerText;
    }
    // la recherche
    do {
      var q = document.getElementById("titles");
      if (!q) {
        console.log("Pas de recherche ici ?");
        break;
      }
      Liser.results = document.getElementById("results");
      Liser.results_progress = q.form.querySelector(".progress");
      if (!Liser.results) break;
      Liser.header = document.getElementById("header");
      
      q.addEventListener('input', function(e) {
        var query = this.value;
        if (!query);
        else if (query.slice(-1) != ' ') query += '*';
        if(Liser.results_progress) Liser.results_progress.style.visibility = 'visible';
        fetch(CCM_REL+"/data/titles?q="+query, {
          headers: {
            'Cache-Control': 'no-cache',
            'Pragma': 'no-cache'
          }
        }).then(response => {
          return response.text()
        })
        .then(data => {
          results.innerHTML = data;
          if(Liser.results_progress) Liser.results_progress.style.visibility = 'hidden';
        });
        
      });
      q.addEventListener('focus', function(e) {
        // afficher les résultats dans la page normale, pour bien défiler au tel
        window.oldScrollY = window.scrollY;
        header.style.position = "relative";
        document.body.style.paddingTop = 0;
        document.body.style.marginTop = 0;
        results.style.display = 'block';
        window.scrollTo(0, 0);
        q.dispatchEvent(new Event('input')); // prendre les premiers résultats
      });
      window.addEventListener('click', Liser.resblur); // do not inform body
      q.form.addEventListener('click', (event) => { event.stopPropagation();}); // do not inform body
      q.form.reset.addEventListener('click', Liser.resblur);
      results.addEventListener("touchstart", function (event) {
        // si on défile la liste de résultats sur du tactile, désafficher le clavier
        q.blur();
      });
      
    } while (false);
  }
  
  /** afficher les résultats */
   
  static resfocus(e)
  {
  
  }
  static resblur(e)
  {
    results.style.display = null; 
    header.style.position = null;
    // rétablir la barre en fixed
    header.style.position = null;
    document.body.style.paddingTop = null;
    document.body.style.marginTop = null;
    // si les résultats ont tout scrollé, revenir à la position initiale
    if (window.oldScrollY) {
      window.scrollTo(0, window.oldScrollY);
      window.oldScrollY = null;
    }
    // results.innerHTML = ''; // et si on gardait ?
    var release = e.target;
    // <button> with <svg> image
    while (release && release.namespaceURI == "http://www.w3.org/2000/svg") release = release.parentNode;
    if (release && release.blur) release.blur();
  }

  /**
   * Get and display results
   */
  static suggest(e)
  {
    var query = e.target.value;
    if(!query) return Liser.resblur();
    if (query.slice(-1) != ' ') query += '*';
    fetch(CCM_REL+"/data/titles?q="+query, {
      headers: {
        'Cache-Control': 'no-cache',
        'Pragma': 'no-cache'
      }
    }).then(response => {
      return response.text()
    })
    .then(data => {
      results.innerHTML = data;
    });
  }

  static sliderClick(e)
  {
    let ref = Liser.ref;
    ref.parentNode.scrollLeft = ref.offsetLeft;
    let last = Liser.parentNode.lastLink;
    if (last) last.className = last.className.replace(/\bselected\b/g, "");
    Liser.className += " selected";
    Liser.parentNode.lastLink = this;
    e.preventDefault();
    return false; // stop propagation
  }

  /**
   * Get an absolute y coordinate for an object
   * [FG] : buggy with absolute object
   * <http://www.quirksmode.org/js/findpos.html>
   *
   * @param object element
   */
  static top(node)
  {
    var top = 0;
    do {
      top += node.offsetTop;
      node = node.offsetParent;
    } while(node && node.tagName.toLowerCase() != 'body');
    return top;
  }


  static resize(event)
  {
    // garder la largeur de la boite à notes
    var text = this.notebox.parentNode;
    notebox.style.width = getComputedStyle(text).width;
  }

  static isVisible(elem)
  {
    var bounding = elem.getBoundingClientRect();
    return (
      bounding.top >= 0
      && bounding.left >= 0
      && bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight)
      && bounding.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }
  
  /* CSS sticky marche mieux
  static scrollFix()
  {
    var bottom = footerHeight - (scrollMother.scrollHeight - scrollMother.scrollTop - scrollMother.clientHeight);
    if (bottom > 0) {
      sidebar.style.bottom = bottom+"px";
      if (sidebar.scrollTop) sidebar.scrollTop = sidebar.scrollTop + (bottom - sidebar.lastBottom);
      sidebar.lastBottom = bottom;
    }
  }
  */

  static shrink()
  {
    if (scrollMother.scrollTop > 50) {
      if (document.body.className.match(/\bshrink\b/));
    	else document.body.className += " shrink";
    } else {
      document.body.className = document.body.className.replace(/ *\bshrink\b */g, "");
    }
  }

  static getScrollParent(node)
  {
    if (node == null) return null;
    if (node.scrollTop) return node;
    return getScrollParent(node.parentNode);
  }
  
  static scrollPage()
  {
    var up = false;
    var scrollY = window.pageYOffset || document.documentElement.scrollTop;
    if (scrollY < Liser.lastScrollY) up = true;
    Liser.lastScrollY = (scrollY <= 0) ? 0 : scrollY; // phone scroll could be negative
    var count = 0;
    // hilite title in toc
    do {
      if (!Liser.sidebar) break;
      var links = Liser.sidebar.getElementsByTagName("a");
      var path = window.location.href.split('#')[0];
      var pos = path.length + 1;
      // loop from the end, to get the smallest section container if nested sections
      for(var i = links.length - 1; i >= 0 ; i--) {
        var href = links[i].href;
        if (href.indexOf(path) < 0) continue;
        var id = href.substr(pos);
        if (!id) continue;
        var div = document.getElementById(id);
        if (!div) continue;
        var bounding = div.getBoundingClientRect();
        var visible = bounding.top <= (window.innerHeight || document.documentElement.clientHeight) - 200 || (bounding.bottom > 0 && bounding.bottom < (window.innerHeight || document.documentElement.clientHeight));
        if (visible) break;
      }
      if (!visible) break;
      if (Liser.linkLast == links[i]) break;
      // clean last link hilited
      if (Liser.linkLast) Liser.linkLast.className = Liser.linkLast.className.replace(/ *\bvisible\b */g, "");
      links[i].className = links[i].className.replace(/ *\bvisible\b */g, "") + " visible";
      Liser.linkLast = links[i]; // keep pointer on this link
      // update running head
      var runhead = document.getElementById('runhead');
      if (!runhead) break;
      var head = div.querySelector("h1, h2, h3, h4, h5,");
      if (head) {
        runhead.href = "#"+id;
        var html = head.innerHTML;
        html = html.replace(/<br( [^>]*)?\/?>/g, " — ")
        runhead.innerHTML = html;
      }
      else {
        runhead.innerHTML = "";
        runhead.href = "";
      }
    } while(false);


    // le notebox
    do {
      if (!Liser.notebox) break;
      // les premières notes sont elles en vue ?
      var id = Liser.noterefs[0].hash;
      if (id[0] == '#') id = id.substring(1);
      var note = document.getElementById(id);
      if (Liser.isVisible(note)) {
        Liser.notebox.innerHTML = "";
        Liser.notebox.style.visibility = "hidden";
        break;
      }
      var count = 0;
      for (var i = 0, len = Liser.noterefs.length; i < len; i++) {
        var ref = Liser.noterefs[i];
        var id = ref.hash;
        if (id[0] == '#') id = id.substring(1);
        var idCopy = id+"Copy";
        var noteCopy = document.getElementById(idCopy);
        if (Liser.isVisible(ref)) {
          
          count++;
          if (noteCopy) continue; // déjà affichée
          var note = document.getElementById(id);
          if (!note) continue; // no note ? bad
          noteCopy = note.cloneNode(true);
          noteCopy.id = idCopy;
          if (up) Liser.notebox.insertBefore(noteCopy, Liser.notebox.firstChild); // prepend not for MS
          else Liser.notebox.appendChild(noteCopy);
        }
        else {
          if (!noteCopy) continue;
          noteCopy.parentNode.removeChild(noteCopy);
        }
      }
      if(!count) Liser.notebox.style.visibility = "hidden";
      else Liser.notebox.style.visibility = "visible";
    } while (false);
  }
}
window.addEventListener("load", Liser.init, false);

