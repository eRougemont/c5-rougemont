


Teinte = function() {
  var lastScrollY = 0;
  var noterefs = document.querySelectorAll('a.noteref');
  var noteBot = null;
  var shrinkable = null;
  var toc = null;
  var tocScroll = null;
  var linkLast = null;
  var footerHeight = null;
  var bookPath = document.location.pathname.substr(0, document.location.pathname.lastIndexOf('/'));
  var scrollMother = ('scrollTop' in document.documentElement)?document.documentElement:document.body;


  function init(selector)
  {
  
    console.log('scrollTop' in document.body);
    shrinkable = document.querySelector("header.shrinkable");
    if (shrinkable) {
      window.addEventListener('scroll', Teinte.shrink);
      shrink();
    }
    toc = document.querySelector("#sidebar .toclocal");
    if (toc) {
      
      
    
      var tocScrollTop = sessionStorage.getItem(bookPath+"TocScrollTop");
      
      
      toc.addEventListener('scroll', Teinte.tocStore, false);
      tocScroll = top(toc) - 50;
      // console.log(toc.parentNode.offsetWidth);
      toc.style.width = toc.parentNode.offsetWidth+"px";
      toc.lastBottom = 0;
      window.addEventListener('scroll', Teinte.tocFix);
      if (tocScrollTop) { // scroll window, tocFix, scroll toc
        scrollMother.scrollTop = tocScroll + 50;
        tocFix();
        toc.scrollTop = tocScrollTop;
      }
      else {
        tocFix();
        var aselected = toc.querySelector("a.nav-selected");
        if (aselected) {
          aselected.scrollIntoView();
          toc.scrollTop = toc.scrollTop - 30;
        }
      }
    }
    var text = document.querySelector("#text");
    if (text) {
      var width = getComputedStyle(text).width;
      noteBot = document.createElement("div");
      noteBot.id = "notebot";
      noteBot.style.display = "none";
      noteBot.style.width = width;
      text.appendChild(noteBot);
      window.addEventListener('resize', Teinte.resize);
      window.addEventListener('load', Teinte.scrollAnchor);
      window.addEventListener('hashchange', Teinte.scrollAnchor);
      window.addEventListener('scroll', Teinte.scrollPage);
      scrollPage();
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
      a.onclick = Teinte.sliderClick;
    }
    var footer = document.querySelector("#footer");
    if (footer) footerHeight = footer.clientHeight;
    var els = document.querySelectorAll("p.ccm-block-next-previous-previous-link, p.ccm-block-next-previous-next-link");
    for (var i = 0, max = els.length; i < max; i++) {
      els[i].title = els[i].innerText;
    }
  }

  function sliderClick(e)
  {
    let ref = this.ref;
    ref.parentNode.scrollLeft = ref.offsetLeft;
    let last = this.parentNode.lastLink;
    if (last) last.className = last.className.replace(/ *\bselected\b */g, "");
    this.className += " selected";
    this.parentNode.lastLink = this;
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
  function top(node)
  {
    var top = 0;
    do {
      top += node.offsetTop;
      node = node.offsetParent;
    } while(node && node.tagName.toLowerCase() != 'body');
    return top;
  }


  function resize(event)
  {
    var text = noteBot.parentNode;
    noteBot.style.width = getComputedStyle(text).width;
    if (toc) toc.style.width = getComputedStyle(toc.parentNode).width;
  };

  function isVisible(elem)
  {
    var bounding = elem.getBoundingClientRect();
    return (
      bounding.top >= 0
      && bounding.left >= 0
      && bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight)
      && bounding.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  };
  function tocStore()
  {
    if (toc.scrollTop) {
      sessionStorage.setItem(bookPath+"TocScrollTop", toc.scrollTop);
      console.log("set item "+bookPath+"TocScrollTop"+" :"+toc.scrollTop);
    }
  }
  function tocFix()
  {
    var bottom = footerHeight - (scrollMother.scrollHeight - scrollMother.scrollTop - scrollMother.clientHeight);
    if (bottom > 0) {
     toc.style.bottom = bottom+"px";
     if (toc.scrollTop) toc.scrollTop = toc.scrollTop + (bottom - toc.lastBottom);
     toc.lastBottom = bottom;
    }
    if (scrollMother.scrollTop >= tocScroll) {
      if (toc.className.match(/\bscrolled\b/));
    	else toc.className += " scrolled";
    } 
    else {
      toc.className = toc.className.replace(/\bscrolled\b/g, "");
    }
  }

  function shrink()
  {
    if (scrollMother.scrollTop > 50) {
      if (shrinkable.className.match(/\bshrinked\b/));
    	else shrinkable.className += " shrinked";
    } else {
      shrinkable.className = shrinkable.className.replace(/\bshrinked\b/g, "");
    }
  }

  function getScrollParent(node)
  {
    if (node == null) return null;
    if (node.scrollTop) return node;
    return getScrollParent(node.parentNode);
  }
  // scrol after anchor clicked
  function scrollAnchor()
  {
    let id = location.hash;
    if (!id) return;
    if (id[0] == "#") id = id.substring(1);
    let target = document.getElementById(id);
    if (!target) return;
    const scrollable = getScrollParent(target);
    if (!scrollable) return;
    if (scrollable.lastScroll == scrollable.scrollTop) return;
    var newScroll = scrollable.scrollTop - 100;
    scrollable.scrollTop = newScroll;
    scrollable.lastScroll = newScroll;
  };

  function scrollPage()
  {
    var up = false;
    var scrollY = window.pageYOffset || document.documentElement.scrollTop;
    if (scrollY < lastScrollY) up = true;
    lastScrollY = (scrollY <= 0) ? 0 : scrollY; // phone scroll coul be negative
    var count = 0;
    // hilite title
    var links=toc.getElementsByTagName("a");
    var path = window.location.href.split('#')[0];
    var pos = path.length + 1;
    for(var i=0; i < links.length; i++) {
      var href = links[i].href;
      if (href.indexOf(path) < 0) continue;
      var id = href.substr(pos);
      if (!id) continue;
      var div = document.getElementById(id);
      if (!div) continue;
      var bounding = div.getBoundingClientRect();
      var visible = bounding.top >= 0 || (bounding.bottom > 0 && bounding.bottom > (window.innerHeight || document.documentElement.clientHeight));
      // console.log(div.id+" "+visible+" "+bounding.top+" "+bounding.bottom);
      if (!visible) continue;
      if (links[i] == linkLast) break;
      if (linkLast) linkLast.className = linkLast.className.replace(/ *\bvisible\b */g, "");
      links[i].className += "visible";
      linkLast = links[i];
      break;
    }


    // bottom notes
    for (var i = 0, len = noterefs.length; i < len; i++) {
      var ref = noterefs[i];
      var id = ref.hash;
      if (id[0] = '#') id = id.substring(1);
      idCopy = id+"Copy";
      var noteCopy = document.getElementById(idCopy);
      if (isVisible(ref)) {
        count++;
        if (noteCopy) continue;
        var note = document.getElementById(id);
        if (!note) continue; // no note ? bad
        noteCopy = note.cloneNode(true);
        noteCopy.id = idCopy;
        if (up) noteBot.insertBefore(noteCopy, noteBot.firstChild); // prepend not for MS
        else noteBot.appendChild(noteCopy);
      }
      else {
        if (!noteCopy) continue;
        noteCopy.parentNode.removeChild(noteCopy);
      }
    }
    if(!count) noteBot.style.display = "none";
    else noteBot.style.display = "";
  };

  return {
    init:init,
    shrink:shrink,
    scrollAnchor:scrollAnchor,
    scrollPage:scrollPage,
    resize:resize,
    tocFix:tocFix,
    tocStore:tocStore,
    sliderClick:sliderClick,
  };
}();
