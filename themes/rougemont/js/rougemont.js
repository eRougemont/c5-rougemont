
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

  static init()
  {
    Liser.vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
    Liser.vh = Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0);
    Liser.noterefs = document.querySelectorAll('a.noteref');
    var bookpath = document.location.pathname.substr(0, document.location.pathname.lastIndexOf('/'));
    Liser.scrollMother = ('scrollTop' in document.documentElement)?document.documentElement:document.body;
    // store if book already visited
    var lastbook = sessionStorage.getItem('bookpath');
    if (lastbook != bookpath) sessionStorage.setItem('bookpath', bookpath);
    
    Liser.path = window.location.href.split('#')[0];

    // bulle au survol pour lien tronqués (ellipsis)
    var els = document.querySelectorAll("p.ccm-block-next-previous-previous-link, p.ccm-block-next-previous-next-link");
    for (var i = 0, max = els.length; i < max; i++) {
      els[i].title = els[i].innerText;
    }
    // page d’accueil
    var ddr1972ao = document.querySelector("body.accueil #ddr1972ao");
    if (ddr1972ao) {
      ddr1972ao.parentNode.scrollLeft = ddr1972ao.offsetLeft;
    }
    Liser.navcovers();
    Liser.accordeon();
    Liser.toc();
    Liser.menu();
    Liser.notebox();
    Liser.sidebar();
    Liser.qtitles();
  }

  static qtitles(event)
  {
    var q = document.getElementById("titles");
    if(!q) return;
    Liser.q = q;
    
    Liser.results = document.getElementById("results");
    if (!Liser.results) return;
    Liser.results_progress = q.form.querySelector(".progress");
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
    q.addEventListener('click', function(e) { // focus do not work on mobile
      results.style.display = 'block';
      q.form.classList.add('focus');
      q.dispatchEvent(new Event('input')); // prendre les premiers résultats
    });
    window.addEventListener('click', Liser.resblur);
    q.form.addEventListener('click', (event) => { event.stopPropagation();}); // do not go to body
    q.form.reset.addEventListener('click', Liser.resblur);
    results.addEventListener("touchstart", function (event) {
      // si on défile la liste de résultats sur du tactile, désafficher le clavier
      q.blur();
    });
  }

  static resblur(e)
  {
    if (results && results.style.display == 'block') results.style.display = 'none';
    if (Liser.q) Liser.q.form.classList.remove('focus');

    /*
    console.log(results);
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
    */
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


  static navcovers()
  {
    var navcovers = document.querySelector("nav.covers");
    if (!navcovers) return false;
    var selectfilter = document.querySelector("select.filter");
    if (selectfilter) {
      navcovers.classorig = navcovers.className;
      selectfilter.selectedIndex = null
      selectfilter.addEventListener("input", function (event) {
        navcovers.className = navcovers.classorig +" "+ selectfilter.options[selectfilter.selectedIndex].value;
      }, false);
    }
    var coverlast = navcovers.querySelector(".last_page");
    if (coverlast) {
      coverlast.addEventListener("click", function (event) {
        navcovers.scrollLeft = navcovers.scrollWidth;
      }, false);
    }
    var coverfirst = navcovers.querySelector(".first_page");
    if (coverfirst) {
      coverfirst.addEventListener("click", function (event) {
        navcovers.scrollLeft = 0;
      }, false);
    }
  }
  
  static accordeon()
  {
    // accordeon
    var blocks = document.querySelectorAll(".c5block");
    for (var i = 0; i < blocks.length; i++) {
      var headers = blocks[i].querySelectorAll("h2, h4, h5");
      for (var z = 0; z < headers.length; z++) {
        const myblock = blocks[i];
        headers[z].addEventListener("click", function (event) {
          myblock.classList.toggle("show");
        }, false);
      }
    }
  }
  
  static toc()
  {
    var tocbut = document.getElementById("tocbut");
    var toc = document.getElementById("toc");
    if (!tocbut || !toc) return;
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
    window.addEventListener("click", function (event) {
      tocbut.classList.remove("splash");
      toc.classList.remove("splash");
    });
 
  }
  
  static menu()
  {
    var menubut = document.getElementById("menubut");
    var menu = document.getElementById("menu");
    if (!menubut || !menu) return false;
    var tocbut = document.getElementById("tocbut");
    var toc = document.getElementById("toc");
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
    window.addEventListener("click", function (event) {
      menubut.classList.remove("splash");
      menu.classList.remove("splash");
    });
  }
  
  static sidebar()
  {
    var sidebar = document.getElementById("sidebar");
    if (!sidebar) return false;
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
    Liser.sidebar = sidebar;
    Liser.sidebarLinks = Liser.sidebar.getElementsByTagName("a");
    window.addEventListener('scroll', Liser.sidebarScroll);

    
    if (Liser.vw < 992) return; // do not scroll in the sidebar if screen is too small
    var here = sidebar.querySelector("a.nav-selected");
    if (!here) here = sidebar.querySelector("li.here > a");
    if (!here) return;
    var hereY = here.offsetTop;
    if (hereY > Liser.sidebar.clientHeight + Liser.sidebar.scrollTop) {
      // var scrollto = hereY - (Liser.sidebar.clientHeight / 2);
      // avoid scroll intoview, too much effects on global scroll
      Liser.sidebar.scrollTop = hereY - (Liser.sidebar.clientHeight / 2);
    }

  
  }
  
  static sidebarScroll(e)
  {
    var pos = Liser.path.length + 1;
    // loop from the end, to get the smallest section container if nested sections
    for(var i = Liser.sidebarLinks.length - 1; i >= 0 ; i--) {
      var a = Liser.sidebarLinks[i];
      var href = a.href;
      if (href.indexOf(Liser.path) < 0) continue;
      var id = href.substr(pos);
      if (!id) continue;
      var div = document.getElementById(id);
      if (!div) continue;
      var bounding = div.getBoundingClientRect();
      var visible = bounding.top <= (window.innerHeight || document.documentElement.clientHeight) - 200 || (bounding.bottom > 0 && bounding.bottom < (window.innerHeight || document.documentElement.clientHeight));
      if (visible) break;
    }
    if (!visible) return;
    if (Liser.linkLast == a) return;
    // clean last link hilited
    if (Liser.linkLast) Liser.linkLast.classList.remove("visible");
    a.classList.add("visible");
    Liser.linkLast = a; // keep pointer on this link
    // update running head
    var runhead = document.getElementById('runhead');
    if (!runhead) return;
    var head = div.querySelector("h1, h2, h3, h4, h5, h6");
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
  }
  
  static notebox()
  {
    var notebox = document.getElementById("notebox");
    if(!notebox) return false;
    Liser.notebox = notebox;
    var text = this.notebox.parentNode;
    notebox.style.width = getComputedStyle(text).width;
    window.addEventListener('resize', Liser.noteboxResize); // garder la largeur relative de la boîte à notes
    window.addEventListener('scroll', Liser.noteboxScroll);
    // scrollPage(); // non, trop long au démarrage
  }
  
  static noteboxResize(event)
  {
    // garder la largeur de la boite à notes
    var text = this.notebox.parentNode;
    notebox.style.width = getComputedStyle(text).width;
  }

  
  static noteboxScroll()
  {
    var up = false;
    var scrollY = window.pageYOffset || document.documentElement.scrollTop;
    if (scrollY < Liser.lastScrollY) up = true;
    Liser.lastScrollY = (scrollY <= 0) ? 0 : scrollY; // phone scroll could be negative

    
    // les premières notes sont elles en vue ?
    var id = Liser.noterefs[0].hash;
    if (id[0] == '#') id = id.substring(1);
    var note = document.getElementById(id);
    if (Liser.isVisible(note)) {
      Liser.notebox.innerHTML = "";
      Liser.notebox.style.visibility = "hidden";
      return;
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
  
}
window.addEventListener("load", Liser.init, false);

/*

    // Des liens dans le diaporama à l’accueil
    var links = document.querySelectorAll(".slider-nav a");
    for (var i = 0, max = links.length; i < max; i++) {
      let a = links[i];
      let id = a.hash;
      if (!id) continue;
      if (id[0] == "#") id = id.substring(1);
      const ref = document.getElementById(id);
      if (!ref) continue;
      a.ref = ref;
      a.onclick = function(e) {
        let slider = this.ref.parentNode;
        slider.scrollLeft = this.ref.offsetLeft;
        if (slider.lastLink) slider.lastLink.classList.remove("selected");
        slider.lastLink = this;
        this.classList.add("selected");
        e.preventDefault();
        return false; // stop propagation
      }
    }
*/

